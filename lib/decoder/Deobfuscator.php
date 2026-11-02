<?php
/**
 * YAK Pro (yakpro-po 2.x) deobfuscator on top of nikic/php-parser.
 *
 * Inverts the obfuscator's own AST rewrites (see the 2.x sources):
 *
 *  - shuffle_statements(): each statement becomes  label: <stmt>; goto next;
 *    and the chunks are randomly permuted. The original order is still encoded
 *    in the goto chain, so we follow it ("unshuffle").
 *  - if/else/while/for/do become fixed goto templates, folded back here.
 *  - break N / continue N become gotos to the N-th enclosing loop's labels.
 *  - strings were printed as \xHH / \OOO escapes (php-parser decodes them).
 *
 * A body is replaced only if the conversion is complete; otherwise the
 * original body is kept. Payload checks prevent missing/duplicated atoms;
 * differential execution tests separately check representative control flow.
 */

require __DIR__ . '/autoload.php';
require __DIR__ . '/CfgStructurer.php';

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Scalar;
use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

class Deobfuscator
{
    private $alias = [];
    private $unresolved = false;
    public $failLabel = null;
    public $lastError = null;
    public $failures = [];
    public $stats = ['converted' => 0, 'kept' => 0];
    public $removedBlocks = [];

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
        if (!$this->listNeedsWork($stmts) && (!$controls || !$this->hasGotoOrLabel($stmts))) {
            return $this->processNested($stmts);
        }
        if (count($stmts) > 6000) {   // pathological method: keep as is
            $this->stats['kept']++;
            return $stmts;
        }
        $original = $stmts;
        $cloner = new \PhpParser\NodeTraverser();
        $cloner->addVisitor(new \PhpParser\NodeVisitor\CloningVisitor());
        $stmts = $cloner->traverse($stmts);
        try {
            $st = new CfgStructurer($stmts, array_values(array_filter([$breakLabel, $contLabel])), $breakLabel, $contLabel, $controls);
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
                throw new RegionFailed('payload mismatch (loss or duplication)');
            }
        } catch (Throwable $e) {
            $this->lastError = $e->getMessage();
            $this->failures[] = ['line' => $stmts[0]->getStartLine(), 'reason' => $this->lastError];
            $this->stats['kept']++;
            return $original;
        }

        $auditCount = count($this->removedBlocks);
        $result = $this->processNested($result);

        if ($this->hasGotoOrLabel($result)) {
            $this->removedBlocks = array_slice($this->removedBlocks, 0, $auditCount);
            $this->lastError = 'has-goto';
            $this->failures[] = ['line' => $stmts[0]->getStartLine(), 'reason' => $this->lastError];
            $this->stats['kept']++;
            return $original;
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
            $controls = $s->getAttribute('deob_controls');
            if ($controls !== null && $s instanceof Stmt\Foreach_) {
                $s->stmts = $this->processBody($s->stmts, null, null, $controls);
                continue;
            }
            if ($controls !== null && $s instanceof Stmt\Switch_) {
                foreach ($s->cases as $case) {
                    $case->stmts = $this->processBody($case->stmts, null, null, $controls);
                }
                continue;
            }
            foreach ($s->getSubNodeNames() as $name) {
                $v = $s->$name;
                if (is_array($v) && isset($v[0]) && $v[0] instanceof Node) {
                    if ($this->listNeedsWork($v)) {
                        $s->$name = $this->processBody($v);
                    } else {
                        $this->processNested($v);
                    }
                } elseif ($v instanceof Node) {
                    $this->processNested([$v]);
                }
            }
        }
        return $stmts;
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

    // ------------------------------------------------------------------
    // 1. unshuffle
    // ------------------------------------------------------------------

    public function unshuffle(array $stmts): ?array
    {
        if (!$stmts || !$stmts[0] instanceof Stmt\Goto_) {
            return null;
        }
        $pos = [];
        foreach ($stmts as $i => $s) {
            if ($s instanceof Stmt\Label) {
                $pos[$s->name->name] = $i;
            }
        }
        if (!isset($pos[$stmts[0]->name->name])) {
            return null;
        }
        $this->alias = $this->resolveAliases($stmts, $pos);
        $alias = $this->alias;

        $flat = [];
        $seen = [];
        $n = count($stmts);

        $emit = function (int $start) use (&$flat, $stmts, $n, $alias, $pos) {
            $end = $start + 1;
            while ($end < $n && !$stmts[$end] instanceof Stmt\Label) {
                $end++;
            }
            $chunk = array_slice($stmts, $start, $end - $start);
            $link = null;
            if ($chunk && end($chunk) instanceof Stmt\Goto_) {
                $link = array_pop($chunk)->name->name;
            }
            foreach ($chunk as $c) {
                $flat[] = $c;
            }
            if ($link === null) {
                return null;
            }
            $resolved = $alias[$link] ?? $link;
            return $pos[$resolved] ?? ($pos[$link] ?? null);
        };

        $cur = $pos[$stmts[0]->name->name];
        while ($cur !== null && !isset($seen[$cur])) {
            $seen[$cur] = true;
            $cur = $emit($cur);
        }
        // blocks reachable only through jumps: keep them so labels stay defined
        foreach ($pos as $name => $start) {
            if (isset($seen[$start])) {
                continue;
            }
            $c = $start;
            while ($c !== null && !isset($seen[$c])) {
                $seen[$c] = true;
                $c = $emit($c);
            }
        }
        return $flat;
    }

    private function resolveAliases(array $stmts, array $pos): array
    {
        $n = count($stmts);
        $alias = [];
        foreach ($pos as $name => $i) {
            $j = $i;
            while ($j < $n && $stmts[$j] instanceof Stmt\Label) {
                $j++;
            }
            if ($j < $n && $stmts[$j] instanceof Stmt\Goto_
                && ($j + 1 >= $n || $stmts[$j + 1] instanceof Stmt\Label)) {
                $alias[$name] = $stmts[$j]->name->name;
            }
        }
        foreach ($alias as $k => $v) {
            $guard = [$k => true];
            while (isset($alias[$v]) && !isset($guard[$v])) {
                $guard[$v] = true;
                $v = $alias[$v];
            }
            $alias[$k] = $v;
        }
        return $alias;
    }

    private function target(string $name): string
    {
        return $this->alias[$name] ?? $name;
    }

    // ------------------------------------------------------------------
    // 2. fold templates
    // ------------------------------------------------------------------

    private function labelIndex(array $s, string $name, int $from, int $to): ?int
    {
        $name = $this->target($name);
        for ($i = $from; $i < $to; $i++) {
            if ($s[$i] instanceof Stmt\Label && $s[$i]->name->name === $name) {
                return $i;
            }
        }
        return null;
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

    private function negate(Expr $e): Expr
    {
        return $e instanceof Expr\BooleanNot ? $e->expr : new Expr\BooleanNot($e);
    }

    /** Resolve a goto to break/continue of one of the enclosing loops. */
    private function jumpToLoopControl(string $t, array $loops): ?Node
    {
        $n = count($loops);
        for ($k = $n - 1, $depth = 1; $k >= 0; $k--, $depth++) {
            $lp = $loops[$k];
            if ($t === $lp['break']) {
                return new Stmt\Break_($depth > 1 ? new Scalar\LNumber($depth) : null);
            }
            if ($lp['continue'] !== null && $t === $lp['continue']) {
                return new Stmt\Continue_($depth > 1 ? new Scalar\LNumber($depth) : null);
            }
        }
        return null;
    }

    private function build(array $s, int $from, int $to, array $loops): array
    {
        $out = [];
        $i = $from;
        while ($i < $to) {
            $st = $s[$i];

            if ($st instanceof Stmt\Label) {
                $loopInfo = $this->detectLoop($s, $i, $to);
                if ($loopInfo !== null) {
                    [$header, $if, $breakIdx, $contIdx, $exprRange] = $loopInfo;
                    $breakLabel = $this->target($if->stmts[0]->name->name);
                    $contLabel = $exprRange !== null ? $s[$contIdx]->name->name : $header;
                    $ctx = ['break' => $breakLabel, 'continue' => $contLabel];
                    $inner = array_merge($loops, [$ctx]);
                    $body = $this->build($s, $i + 2, $contIdx, $inner);
                    $cond = $if->cond instanceof Expr\BooleanNot ? $if->cond->expr : $if->cond;
                    if ($exprRange !== null) {
                        $incr = $this->build($s, $exprRange[0], $exprRange[1], $inner);
                        $out[] = new Stmt\For_([], [$cond], $incr, $body);
                    } else {
                        $out[] = new Stmt\While_($cond, $body);
                    }
                    $i = $breakIdx + 1;
                    continue;
                }
                $i++;
                continue;
            }

            if ($st instanceof Stmt\Goto_) {
                $t = $this->target($st->name->name);
                if ($i + 1 < $to && $s[$i + 1] instanceof Stmt\Label
                    && $s[$i + 1]->name->name === $t) {
                    $i++;
                    continue;
                }
                $ctrl = $this->jumpToLoopControl($t, $loops);
                if ($ctrl !== null) {
                    $out[] = $ctrl;
                    $i++;
                    continue;
                }
                $this->unresolved = true;
                if ($this->failLabel === null) {
                    $this->failLabel = $t . ' at i=' . $i . ' to=' . $to;
                }
                $out[] = $st;
                $i++;
                continue;
            }

            if ($st instanceof Stmt\If_ && ($tgt = $this->isSingleGoto($st)) !== null) {
                $tpos = $this->labelIndex($s, $tgt, $i + 1, $to);
                if ($tpos === null) {
                    $body = $this->build($s, $i + 1, $to, $loops);
                    $out[] = new Stmt\If_($this->negate($st->cond), ['stmts' => $body]);
                    return $out;
                }
                $prev = $this->lastMeaningful($s, $i + 1, $tpos);
                if ($prev !== null && $s[$prev] instanceof Stmt\Goto_) {
                    $elseBody = $this->build($s, $i + 1, $prev, $loops);
                    $mergeLabel = $s[$prev]->name->name;
                    $mpos = $this->labelIndex($s, $mergeLabel, $tpos + 1, $to);
                    if ($mpos !== null) {
                        $thenBody = $this->build($s, $tpos + 1, $mpos, $loops);
                        $out[] = new Stmt\If_($st->cond, [
                            'stmts' => $thenBody,
                            'else' => new Stmt\Else_($elseBody),
                        ]);
                        $i = $mpos + 1;
                        continue;
                    }
                }
                $body = $this->build($s, $i + 1, $tpos, $loops);
                $out[] = new Stmt\If_($this->negate($st->cond), ['stmts' => $body]);
                $i = $tpos + 1;
                continue;
            }

            if ($st instanceof Stmt\Foreach_ || $st instanceof Stmt\Switch_) {
                $j = $i + 1;
                $after = [];
                while ($j < $to && $s[$j] instanceof Stmt\Label) {
                    $after[] = $s[$j]->name->name;
                    $j++;
                }
                if ($st instanceof Stmt\Foreach_) {
                    $ctx = $after
                        ? ['break' => $this->target($after[0]), 'continue' => null]
                        : null;
                    $st->stmts = $this->rebuildShuffled($st->stmts, $ctx === null ? $loops : array_merge($loops, [$ctx]));
                } else {
                    $ctx = count($after) >= 2
                        ? ['break' => $this->target($after[1]), 'continue' => $this->target($after[0])]
                        : null;
                    $inner = $ctx === null ? $loops : array_merge($loops, [$ctx]);
                    foreach ($st->cases as $case) {
                        $case->stmts = $this->rebuildShuffled($case->stmts, $inner);
                    }
                }
                $out[] = $st;
                $i = $j;
                continue;
            }

            $out[] = $st;
            $i++;
        }
        return $out;
    }

    private function rebuildShuffled(array $stmts, array $loops): array
    {
        $flat = $this->unshuffle($stmts);
        if ($flat === null) {
            return $stmts;
        }
        $saved = $this->unresolved;
        $this->unresolved = false;
        $res = $this->build($flat, 0, count($flat), $loops);
        if ($this->unresolved || $this->hasGotoOrLabel($res)) {
            $this->unresolved = $saved;
            return $stmts;
        }
        return $res;
    }

    private function lastMeaningful(array $s, int $from, int $to): ?int
    {
        for ($i = $to - 1; $i >= $from; $i--) {
            if (!$s[$i] instanceof Stmt\Label) {
                return $i;
            }
        }
        return null;
    }

    private function detectLoop(array $s, int $i, int $to): ?array
    {
        $header = $s[$i]->name->name;
        if ($i + 1 >= $to || !$s[$i + 1] instanceof Stmt\If_) {
            return null;
        }
        $if = $s[$i + 1];
        $tgt = $this->isSingleGoto($if);
        if ($tgt === null) {
            return null;
        }
        $breakIdx = $this->labelIndex($s, $this->target($tgt), $i + 2, $to);
        if ($breakIdx === null) {
            return null;
        }
        $back = null;
        for ($j = $i + 2; $j < $breakIdx; $j++) {
            if ($s[$j] instanceof Stmt\Goto_ && $this->target($s[$j]->name->name) === $header) {
                $back = $j;
            }
        }
        if ($back === null) {
            return null;
        }
        for ($k = $back - 1; $k > $i + 1; $k--) {
            if ($s[$k] instanceof Stmt\Label) {
                return [$header, $if, $breakIdx, $k, [$k + 1, $back]];
            }
        }
        return [$header, $if, $breakIdx, $back, null];
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













