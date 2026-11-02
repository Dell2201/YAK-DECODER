<?php
/**
 * YAK Pro (yakpro-po 2.x) deobfuscator on top of nikic/php-parser.
 *
 * The obfuscator flattens control flow: each statement list is shuffled into
 * `label: <stmt>; goto next;` chunks, branches/loops become goto templates,
 * and break N / continue N become gotos to the N-th enclosing loop's labels.
 * Strings are printed as \xHH / \OOO escapes (php-parser decodes them).
 *
 * This class owns region selection and safety: every statement list (function
 * bodies, closures, foreach/switch bodies, top-level code) is attempted as a
 * region; nested bodies convert first and their results survive a failure of
 * the enclosing region. CfgStructurer rebuilds the structured code from the
 * CFG (dominators, loops, regions, multi-level break/continue, `for` shapes).
 *
 * A region is restructured only when the CFG emission succeeds and the
 * payload check passes; a failure keeps the original shape of that region.
 * A restructured region may keep goto soup in nested bodies that failed
 * independently, as long as no kept body jumps to a label of the
 * restructured region itself (those labels disappear; see
 * keptGotosAreStable / cross-level revert).
 */

require __DIR__ . '/autoload.php';
require __DIR__ . '/CfgStructurer.php';

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

class Deobfuscator
{
    public $lastError = null;
    public $failures = [];
    public $stats = ['converted' => 0, 'kept' => 0];
    public $removedBlocks = [];
    public $trace = [];
    private $ctxStack = [];
    /** @var array[] label scopes of nested bodies kept as-is during a region walk */
    private $scopeStack = [];
    /** true while converting nested bodies before a region emission */
    private $preWalk = false;

    private function ctxDesc($s): string
    {
        if ($s instanceof Stmt\Function_) return 'function ' . $s->name->toString();
        if ($s instanceof Stmt\ClassMethod_) return 'method ' . $s->name->toString();
        if ($s instanceof Stmt\Class_) return 'class ' . $s->name->toString();
        if ($s instanceof Expr\Closure) return 'closure';
        if ($s instanceof Stmt\Foreach_) return 'foreach';
        if ($s instanceof Stmt\Switch_) return 'switch';
        if ($s instanceof Stmt\If_) return 'if';
        if ($s instanceof Stmt\TryCatch) return 'try';
        if ($s instanceof Stmt\Namespace_) return 'namespace';
        return $s->getType();
    }

    public function processFile(string $code): string
    {
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $stmts = $parser->parse($code);
        $comments = new \PhpParser\NodeTraverser();
        $comments->addVisitor(new class extends \PhpParser\NodeVisitorAbstract {
            public function enterNode(Node $node) {
                $comments = array_filter($node->getComments(), function ($comment) {
                    return strpos($comment->getText(), 'Obfuscated by YAK Pro') === false;
                });
                $node->setAttribute('comments', array_values($comments));
            }
        });
        $stmts = $comments->traverse($stmts);
        $stmts = $this->processTopLevel($stmts);
        $pp = new DeobPrinter();
        return $pp->prettyPrintFile($stmts);
    }

    // ------------------------------------------------------------------
    // traversal
    // ------------------------------------------------------------------

    private function processTopLevel(array $stmts): array
    {
        // Preserve completed class/function bodies if file-level reconstruction fails.
        $stmts = $this->processNested($stmts);
        return $this->listNeedsWork($stmts) ? $this->processBody($stmts) : $stmts;
    }

    public function processBody(array $stmts, ?string $breakLabel = null, ?string $contLabel = null, array $controls = []): array
    {
        $ctx = implode(' > ', $this->ctxStack);
        if (!$this->preWalk) {
            $this->trace[] = ['ctx' => $ctx, 'n' => count($stmts), 'kind' => 'attempt'];
        }
        if (!$this->listNeedsWork($stmts) && (!$controls || !$this->hasGotoOrLabel($stmts))) {
            return $this->processNested($stmts);
        }
        if (count($stmts) > 6000) {   // pathological method: keep as is
            if (!$this->preWalk) {
                $this->stats['kept']++;
                $this->trace[] = ['ctx' => $ctx, 'n' => count($stmts), 'kind' => 'kept', 'reason' => 'too big'];
            }
            return $stmts;
        }
        // Labels defined in this region before any nested conversion.
        $preLabels = $this->labelNames($stmts);
        // Convert nested bodies first: functions, closures, if bodies and
        // self-contained foreach/switch bodies stay converted even when this
        // region later reverts to its original shape. These attempts are
        // quiet: bodies that need the region's loop controls are retried (and
        // properly recorded) after emission.
        $savedPreWalk = $this->preWalk;
        $this->preWalk = true;
        try {
            $stmts = $this->processNested($stmts);
        } finally {
            $this->preWalk = $savedPreWalk;
        }
        // Controls attached by an earlier (pre-walk) emission of an
        // enclosing region refer to a CFG that no longer exists; drop them
        // so the retry below uses this region's own context.
        $this->stripStaleControls($stmts);
        $original = $stmts;
        $cloner = new \PhpParser\NodeTraverser();
        $cloner->addVisitor(new \PhpParser\NodeVisitor\CloningVisitor());
        $work = $cloner->traverse($stmts);
        try {
            $st = new CfgStructurer($work, array_values(array_filter([$breakLabel, $contLabel])), $breakLabel, $contLabel, $controls);
            $st->reach = $st->reachable();
            $st->nodes = array_values($st->reach);
            $st->dom = $st->dominators($st->nodes);
            $st->loops = $st->findLoops();
            // Snapshot payload before emission, including branch conditions.
            $expected = [];
            foreach ($st->reach as $block) {
                $this->collectPayload($block->stmts, $expected);
                if ($block->term !== null && $block->term[0] === 'branch') {
                    $this->collectPayload($block->term[1], $expected);
                }
            }
            $result = $st->emitRegion();
            $actual = [];
            $this->collectPayload($result, $actual);
            ksort($expected);
            ksort($actual);
            if ($expected !== $actual) {
                $diff = [];
                foreach ($expected as $k => $v) {
                    if (($actual[$k] ?? 0) !== $v) { $diff[] = "$k exp=$v act=" . ($actual[$k] ?? 0); }
                }
                foreach ($actual as $k => $v) {
                    if (!isset($expected[$k])) { $diff[] = "$k exp=0 act=$v"; }
                }
                throw new RegionFailed('payload mismatch (loss or duplication): ' . implode('; ', array_slice($diff, 0, 12)));
            }
        } catch (Throwable $e) {
            if (!$this->preWalk) {
                $this->lastError = $e->getMessage();
                $this->failures[] = ['line' => $original[0]->getStartLine(), 'reason' => $this->lastError];
                $this->stats['kept']++;
                $this->trace[] = ['ctx' => $ctx, 'n' => count($original), 'kind' => 'kept', 'reason' => $this->lastError];
            }
            return $original;
        }

        $auditCount = count($this->removedBlocks);
        // Retry obfuscated foreach/switch bodies with the loop controls
        // attached during emission; remember bodies that stay obfuscated.
        $this->scopeStack[] = [];
        $result = $this->processNested($result);
        $keptScopes = array_pop($this->scopeStack);

        if ($this->hasGotoOrLabel($result)) {
            if (!$this->keptGotosAreStable($result, $keptScopes, $preLabels)) {
                // A kept body jumps to a label of this region or of a
                // restructured sibling; restructuring would orphan that jump.
                $this->removedBlocks = array_slice($this->removedBlocks, 0, $auditCount);
                $this->lastError = 'cross-level goto in kept nested body';
                $this->failures[] = ['line' => $original[0]->getStartLine(), 'reason' => $this->lastError];
                $this->stats['kept']++;
                $this->trace[] = ['ctx' => $ctx, 'n' => count($original), 'kind' => 'kept', 'reason' => $this->lastError];
                return $original;
            }
            // Partial success: the region itself is structured; remaining
            // gotos belong to nested bodies that recorded their own failures.
            if (!$this->preWalk) {
                $this->trace[] = ['ctx' => $ctx, 'n' => count($original), 'kind' => 'converted', 'partial' => true];
            }
        } elseif (!$this->preWalk) {
            $this->trace[] = ['ctx' => $ctx, 'n' => count($original), 'kind' => 'converted'];
        }
        // Kept bodies remain unrestructured inside the emitted result, so
        // their labels stay available to the enclosing region.
        if ($this->scopeStack) {
            $this->scopeStack[count($this->scopeStack) - 1] = array_merge(
                $this->scopeStack[count($this->scopeStack) - 1],
                $keptScopes
            );
        }
        $printer = new DeobPrinter();
        foreach ($st->blocks as $block) {
            if (isset($st->reach[$block->id()])) {
                continue;
            }
            $code = $printer->prettyPrint($block->stmts);
            if ($block->term !== null && $block->term[0] === 'branch') {
                $code .= "\n" . $printer->prettyPrintExpr($block->term[1]) . ';';
            }
            if ($code !== '') {
                $this->removedBlocks[] = ['labels' => $block->labels, 'code' => $code];
            }
        }
        $this->stats['converted']++;
        return $result;
    }

    /** Count semantic AST atoms; control-flow wrappers may be rebuilt. */
    private function collectPayload($value, array &$counts): void
    {
        if (is_array($value)) {
            foreach ($value as $item) {
                $this->collectPayload($item, $counts);
            }
            return;
        }
        if ($value instanceof Stmt\Goto_ || $value instanceof Stmt\Label
            || $value instanceof Stmt\Break_ || $value instanceof Stmt\Continue_
            || $value instanceof Stmt\Nop) {
            return;
        }
        if ($value instanceof Node) {
            // Synthetic while(true) needs no original condition atom.
            if ($value instanceof Stmt\While_ && $value->cond instanceof Expr\ConstFetch
                && strtolower($value->cond->name->toString()) === 'true'
                && $value->cond->getStartLine() === -1) {
                $this->collectPayload($value->stmts, $counts);
                return;
            }
            if ($value instanceof Expr && !$value instanceof Expr\BooleanNot
                || $value instanceof Node\Scalar
                || $value instanceof Node\Name || $value instanceof Node\Identifier
                || $value instanceof Stmt\Return_ || $value instanceof Stmt\Throw_) {
                $key = $value->getType();
                $counts[$key] = ($counts[$key] ?? 0) + 1;
            }
            foreach ($value->getSubNodeNames() as $name) {
                $this->collectPayload($value->$name, $counts);
            }
            return;
        }
        if ($value !== null) {
            $key = serialize($value);
            $counts[$key] = ($counts[$key] ?? 0) + 1;
        }
    }

    /** Recurse into nested statement lists (if/try/closure/foreach bodies). */
    private function processNested(array $stmts): array
    {
        foreach ($stmts as $s) {
            if (!$s instanceof Node) {
                continue;
            }
            $this->ctxStack[] = $this->ctxDesc($s);
            try {
                $controls = $s->getAttribute('deob_controls');
                if ($controls !== null && $s instanceof Stmt\Foreach_) {
                    $s->stmts = $this->attemptNested($s->stmts, $controls);
                    continue;
                }
                if ($controls !== null && $s instanceof Stmt\Switch_) {
                    foreach ($s->cases as $case) {
                        $case->stmts = $this->attemptNested($case->stmts, $controls);
                    }
                    continue;
                }
                foreach ($s->getSubNodeNames() as $name) {
                    $v = $s->$name;
                    if (is_array($v) && isset($v[0]) && $v[0] instanceof Node) {
                        // A lone goto is only convertible with the loop
                        // controls attached after region emission.
                        $loneGoto = count($v) === 1 && $v[0] instanceof Stmt\Goto_;
                        if ($this->listNeedsWork($v) && !$loneGoto) {
                            $s->$name = $this->attemptNested($v, $this->seedControls($s, $v, $name));
                        } else {
                            $this->processNested($v);
                        }
                    } elseif ($v instanceof Node) {
                        $this->processNested([$v]);
                    }
                }
            } finally {
                array_pop($this->ctxStack);
            }
        }
        return $stmts;
    }

    /** Remove deob_controls attributes left by earlier region emissions. */
    private function stripStaleControls(array $stmts): void
    {
        foreach ($this->findForeachSwitch($stmts) as $node) {
            $node->setAttribute('deob_controls', null);
        }
    }

    /** @return Stmt\Foreach_[]|Stmt\Switch_[] */
    private function findForeachSwitch(array $stmts): array
    {
        $found = [];
        foreach ((new \PhpParser\NodeFinder())->findInstanceOf($stmts, Node::class) as $node) {
            if ($node instanceof Stmt\Foreach_ || $node instanceof Stmt\Switch_) {
                $found[] = $node;
            }
        }
        return $found;
    }

    /** Attempt a nested body; remember it as a stable label scope when kept. */
    private function attemptNested(array $stmts, array $controls = [])
    {
        $result = $controls ? $this->processBody($stmts, null, null, $controls) : $this->processBody($stmts);
        if ($result === $stmts && $this->scopeStack) {
            $this->scopeStack[count($this->scopeStack) - 1][] = $result;
        }
        return $result;
    }

    /**
     * Loop controls for a foreach body attempted without emission context:
     * falling off the end of the body (a jump to its trailing label) is a
     * `continue` of the foreach itself.
     */
    private function seedControls(Node $owner, array $body, string $name): array
    {
        $controls = [];
        if ($owner instanceof Stmt\Foreach_ && $name === 'stmts'
            && count($body) && end($body) instanceof Stmt\Label) {
            $controls[end($body)->name->name] = ['kind' => 'continue', 'depth' => 1];
        }
        return $controls;
    }
    /** All label names defined anywhere inside the given statements. */
    private function labelNames(array $stmts): array
    {
        $names = [];
        foreach ($this->findLabels($stmts) as $label) {
            $names[$label->name->name] = true;
        }
        return $names;
    }

    /** @return Stmt\Label[] */
    private function findLabels(array $stmts): array
    {
        return (new \PhpParser\NodeFinder())->findInstanceOf($stmts, Stmt\Label::class);
    }

    /**
     * After a successful emission, remaining gotos may only live in nested
     * bodies kept as-is. Their targets must be defined inside those kept
     * bodies or outside this region entirely; labels of the restructured
     * region itself (or of restructured siblings) no longer exist where the
     * original code expected them.
     */
    private function keptGotosAreStable(array $result, array $keptScopes, array $preLabels): bool
    {
        $stable = [];
        foreach ($keptScopes as $scope) {
            foreach ($this->findLabels($scope) as $label) {
                $stable[$label->name->name] = true;
            }
        }
        $gotos = (new \PhpParser\NodeFinder())->findInstanceOf($result, Stmt\Goto_::class);
        foreach ($gotos as $goto) {
            $name = $goto->name->name;
            if (isset($stable[$name])) {
                continue;
            }
            if (isset($preLabels[$name])) {
                return false;
            }
            // Defined outside this region: unaffected by the restructure.
        }
        return true;
    }

    private function listNeedsWork(array $stmts): bool
    {
        foreach ($stmts as $s) {
            if ($s instanceof Stmt\Goto_ || $s instanceof Stmt\Label) {
                return true;
            }
            if ($s instanceof Stmt\If_ && $this->isSingleGoto($s) !== null) {
                return true;
            }
        }
        return false;
    }

    public function hasGotoOrLabel($node): bool
    {
        if (is_array($node)) {
            foreach ($node as $x) {
                if ($this->hasGotoOrLabel($x)) {
                    return true;
                }
            }
            return false;
        }
        if (!$node instanceof Node) {
            return false;
        }
        if ($node instanceof Stmt\Goto_ || $node instanceof Stmt\Label) {
            return true;
        }
        foreach ($node->getSubNodeNames() as $name) {
            $v = $node->$name;
            if (is_array($v) || $v instanceof Node) {
                if ($this->hasGotoOrLabel($v)) {
                    return true;
                }
            }
        }
        return false;
    }

    private function isSingleGoto(Stmt\If_ $if): ?string
    {
        if ($if->else !== null || count($if->elseifs) !== 0) {
            return null;
        }
        if (count($if->stmts) === 1 && $if->stmts[0] instanceof Stmt\Goto_) {
            return $if->stmts[0]->name->name;
        }
        return null;
    }

}

/** Prints string literals readably while keeping the exact byte value. */
class DeobPrinter extends Standard
{
    protected function pScalar_String(Node\Scalar\String_ $node)
    {
        $v = $node->value;
        if ($v === '') {
            return "''";
        }
        $needsDouble = false;
        for ($i = 0, $l = strlen($v); $i < $l; $i++) {
            $o = ord($v[$i]);
            if ($o < 0x20 || $o === 0x7f) {
                $needsDouble = true;
                break;
            }
        }
        if (!$needsDouble) {
            return "'" . str_replace(['\\', "'"], ['\\\\', "\\'"], $v) . "'";
        }
        $map = ["\\" => '\\\\', '"' => '\\"', '$' => '\\$', "\n" => '\\n',
                "\r" => '\\r', "\t" => '\\t', "\v" => '\\v', "\f" => '\\f',
                "\x1b" => '\\e'];
        $s = '';
        for ($i = 0, $l = strlen($v); $i < $l; $i++) {
            $c = $v[$i];
            $o = ord($c);
            if (isset($map[$c])) {
                $s .= $map[$c];
            } elseif ($o < 0x20 || $o === 0x7f) {
                $s .= sprintf('\\x%02x', $o);
            } else {
                $s .= $c;
            }
        }
        return '"' . $s . '"';
    }
}













