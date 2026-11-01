<?php
/**
 * CFG structurer: rebuilds if/else/while/for from the flattened goto graph.
 *
 * This is the same approach as the Python prototype (dominance based), ported
 * to work on php-parser nodes:
 *   - statements are split into basic blocks at labels / gotos / branches,
 *   - loops are found through dominators,
 *   - branches use postdominators, with region-limited early-return joins,
 *   - a body is only returned when every reachable statement survived,
 *     otherwise the caller keeps the original code.
 */

require_once __DIR__ . '/autoload.php';

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Scalar;
use PhpParser\Node\Stmt;

class RegionFailed extends Exception
{
}

class CfgBlock
{
    public $labels = [];
    public $stmts = [];
    public $term = null;   // null | ['goto', name] | ['branch', Expr, targetName] | ['end']
    public $fall = null;
    public $succ = [];

    public function id(): int
    {
        return spl_object_id($this);
    }

    public function __toString(): string
    {
        return 'B' . $this->id() . '[' . implode(',', $this->labels) . ']';
    }
}

class CfgStructurer
{
    /** @var CfgBlock[] */
    public $blocks = [];
    public $entry = null;
    /** @var array<string,CfgBlock> */
    public $labelBlock = [];
    /** @var array<string,bool> labels that are jump targets */
    public $targeted = [];
    /** @var array<string,bool> labels belonging to the enclosing region */
    public $outer = [];

    public $reach = [];
    public $nodeSet = [];
    public $dom = [];
    public $nodes = [];
    public $loops = [];
    public $preds = [];
    public $controls = [];
    public $placed = [];
    public $emitCounts = [];
    public $dups = 0;
    public $errors = [];
    private $postdomCache = [];

    private const MAX_BLOCK_EMITS = 8;
    private const MAX_DUP_TOTAL = 120;

    /** @var string|null label used by `break` in the enclosing loop */
    public $breakLabel = null;
    /** @var string|null label used by `continue` in the enclosing loop */
    public $contLabel = null;

    public function __construct(array $stmts, array $outer = [], ?string $breakLabel = null, ?string $contLabel = null, array $controls = [])
    {
        $this->controls = $controls;
        $outer = array_merge($outer, array_keys($controls));
        foreach ($outer as $name) {
            if ($name !== null) {
                $this->outer[$name] = true;
            }
        }
        $this->breakLabel = $breakLabel;
        $this->contLabel = $contLabel;
        $this->build($stmts);
    }

    // ------------------------------------------------------------------
    // graph construction
    // ------------------------------------------------------------------

    private function isGotoIf(Node $node): bool
    {
        return $node instanceof Stmt\If_
            && $node->else === null
            && count($node->elseifs) === 0
            && count($node->stmts) === 1
            && $node->stmts[0] instanceof Stmt\Goto_;
    }

    private function build(array $stmts): void
    {
        // aliases: label-only blocks that jump elsewhere
        $labels = [];
        foreach ($stmts as $i => $s) {
            if ($s instanceof Stmt\Label) {
                $labels[$s->name->name] = $i;
            }
        }
        $targeted = [];
        $finder = new \PhpParser\NodeFinder();
        foreach ($finder->findInstanceOf($stmts, Stmt\Goto_::class) as $jump) {
            $targeted[$jump->name->name] = true;
        }
        $this->targeted = $targeted;

        $blocks = [];
        $cur = null;
        foreach ($stmts as $s) {
            if ($s instanceof Stmt\Label) {
                if (isset($targeted[$s->name->name])) {
                    $cur = new CfgBlock();
                    $blocks[] = $cur;
                    $cur->labels[] = $s->name->name;
                    $this->labelBlock[$s->name->name] = $cur;
                }
                continue;
            }
            if ($s instanceof Stmt\Goto_) {
                if ($cur === null) {
                    $cur = new CfgBlock();
                    $blocks[] = $cur;
                }
                $cur->term = ['goto', $s->name->name];
                $cur = null;
                continue;
            }
            if ($s instanceof Stmt\Return_ || $s instanceof Stmt\Throw_) {
                if ($cur === null) {
                    $cur = new CfgBlock();
                    $blocks[] = $cur;
                }
                $cur->stmts[] = $s;
                $cur->term = ['end'];
                $cur = null;
                continue;
            }
            if ($this->isGotoIf($s)) {
                if ($cur === null) {
                    $cur = new CfgBlock();
                    $blocks[] = $cur;
                }
                $cur->term = ['branch', $s->cond, $s->stmts[0]->name->name];
                $cur = null;
                continue;
            }
            if ($cur === null) {
                $cur = new CfgBlock();
                $blocks[] = $cur;
            }
            $cur->stmts[] = $s;
            if ($s instanceof Stmt\Foreach_ || $s instanceof Stmt\Switch_) {
                $cur = null;
            }
        }
        if ($blocks) {
            $last = end($blocks);
            if ($last->term === null && !$last->stmts) {
                array_pop($blocks);
            }
        }
        foreach ($blocks as $i => $b) {
            $b->fall = $blocks[$i + 1] ?? null;
        }
        $this->blocks = $blocks;
        foreach ($blocks as $b) {
            $this->preds[$b->id()] = [];
        }
        $this->entry = $blocks[0] ?? null;

        foreach ($blocks as $b) {
            if ($b->term === null) {
                $b->succ = [$this->resolveBlock($b->fall)];
            } elseif ($b->term[0] === 'end') {
                $b->succ = [];
            } elseif ($b->term[0] === 'goto') {
                $b->succ = [$this->target($b->term[1])];
            } else {
                $b->succ = [$this->target($b->term[2]), $this->resolveBlock($b->fall)];
            }
        }
        foreach ($blocks as $b) {
            foreach ($b->succ as $s) {
                if ($s instanceof CfgBlock) {
                    $this->preds[$s->id()][] = $b;
                }
            }
        }

    }

    /** Resolve a label name / jump target to a block (or a marker). */
    private function target(string $name)
    {
        if (isset($this->labelBlock[$name])) {
            return $this->resolveBlock($this->labelBlock[$name]);
        }
        if (isset($this->outer[$name])) {
            return 'OUTER:' . $name;
        }
        throw new RegionFailed('unknown jump target: ' . $name);
    }

    /** Normalize both explicit jumps and fall-through edges to the same block. */
    private function resolveBlock($block)
    {
        $seen = [];
        while ($block instanceof CfgBlock && !$block->stmts && !isset($seen[$block->id()])) {
            $seen[$block->id()] = true;
            if ($block->term !== null && $block->term[0] === 'goto') {
                $name = $block->term[1];
                if (!isset($this->labelBlock[$name])) {
                    if (isset($this->outer[$name])) {
                        return 'OUTER:' . $name;
                    }
                    throw new RegionFailed('unknown jump target: ' . $name);
                }
                $block = $this->labelBlock[$name];
            } elseif ($block->term === null && $block->fall instanceof CfgBlock) {
                $block = $block->fall;
            } else {
                break;
            }
        }
        return $block;
    }

    public function reachable(): array
    {
        $seen = [];
        $stack = [$this->entry];
        while ($stack) {
            $b = array_pop($stack);
            if (!$b instanceof CfgBlock || isset($seen[$b->id()])) {
                continue;
            }
            $seen[$b->id()] = $b;
            foreach ($b->succ as $s) {
                if ($s instanceof CfgBlock && !isset($seen[$s->id()])) {
                    $stack[] = $s;
                }
            }
        }
        return $seen;
    }

    public function dominators(array $nodes): array
    {
        if (count($nodes) > 4000) {
            throw new RegionFailed('too many blocks: ' . count($nodes));
        }
        $nodeSet = [];
        foreach ($nodes as $n) {
            $nodeSet[$n->id()] = $n;
        }
        $dom = [];
        foreach ($nodes as $n) {
            $dom[$n->id()] = $nodeSet;
        }
        if (!isset($dom[$this->entry->id()])) {
            return $dom;
        }
        $dom[$this->entry->id()] = [$this->entry->id() => $this->entry];
        $changed = true;
        while ($changed) {
            $changed = false;
            foreach ($nodes as $n) {
                if ($n === $this->entry) {
                    continue;
                }
                $preds = [];
                foreach ($this->preds[$n->id()] ?? [] as $p) {
                    if (isset($dom[$p->id()])) {
                        $preds[] = $p;
                    }
                }
                if (!$preds) {
                    continue;
                }
                $new = null;
                foreach ($preds as $p) {
                    $new = $new === null ? $dom[$p->id()] : array_intersect_key($new, $dom[$p->id()]);
                }
                $new[$n->id()] = $n;
                if ($new !== $dom[$n->id()]) {
                    $dom[$n->id()] = $new;
                    $changed = true;
                }
            }
        }
        return $dom;
    }

    public function findLoops(): array
    {
        // A back edge in a reducible graph must target a dominator.
        // Reject multiple-entry cycles before recursive emission starts.
        $colors = [];
        $stack = $this->entry === null ? [] : [[$this->entry, 0]];
        while ($stack) {
            $index = count($stack) - 1;
            [$node, $edge] = $stack[$index];
            $colors[$node->id()] = 1;
            if ($edge >= count($node->succ)) {
                $colors[$node->id()] = 2;
                array_pop($stack);
                continue;
            }
            $stack[$index][1]++;
            $next = $node->succ[$edge];
            if (!$next instanceof CfgBlock) {
                continue;
            }
            $color = $colors[$next->id()] ?? 0;
            if ($color === 1 && !isset($this->dom[$node->id()][$next->id()])) {
                throw new RegionFailed('irreducible control flow');
            }
            if ($color === 0) {
                $stack[] = [$next, 0];
            }
        }
        $this->nodeSet = [];
        foreach ($this->nodes as $n) {
            $this->nodeSet[$n->id()] = $n;
        }
        $loops = [];
        foreach ($this->nodes as $b) {
            foreach ($b->succ as $s) {
                if ($s instanceof CfgBlock
                    && isset($this->dom[$b->id()][$s->id()])
                ) {
                    $loop = [$s->id() => $s];
                    $stack = [$b];
                    while ($stack) {
                        $n = array_pop($stack);
                        if (isset($loop[$n->id()])) {
                            continue;
                        }
                        $loop[$n->id()] = $n;
                        foreach ($this->preds[$n->id()] ?? [] as $p) {
                            if (isset($this->nodeSet[$p->id()])) {
                                $stack[] = $p;
                            }
                        }
                    }
                    $key = $s->id();
                    if (!isset($loops[$key])) {
                        $loops[$key] = ['header' => $s, 'nodes' => []];
                    }
                    $loops[$key]['nodes'] += $loop;
                }
            }
        }
        // Natural loops omit paths ending in break/return. Include those paths
        // up to the header/latch exit so their side effects stay inside the loop.
        foreach ($loops as &$info) {
            $header = $info['header'];
            $exit = null;
            if ($header->term !== null && $header->term[0] === 'branch') {
                foreach ($header->succ as $next) {
                    if ($next instanceof CfgBlock && !isset($info['nodes'][$next->id()])) {
                        $exit = $next;
                    }
                }
            }
            if ($exit === null) {
                foreach ($info['nodes'] as $node) {
                    if ($node->term === null || $node->term[0] !== 'branch'
                        || !in_array($header, $node->succ, true)) {
                        continue;
                    }
                    foreach ($node->succ as $next) {
                        if ($next instanceof CfgBlock && !isset($info['nodes'][$next->id()])) {
                            $exit = $next;
                        }
                    }
                }
            }
            if ($exit === null) {
                continue;
            }
            $seen = [];
            $stack = [$header];
            while ($stack) {
                $node = array_pop($stack);
                if (!$node instanceof CfgBlock || $node === $exit
                    || isset($seen[$node->id()])
                    || !isset($this->dom[$node->id()][$header->id()])) {
                    continue;
                }
                $seen[$node->id()] = true;
                $info['nodes'][$node->id()] = $node;
                foreach ($node->succ as $next) {
                    $stack[] = $next;
                }
            }
        }
        unset($info);
        return $loops;
    }

    /** Common postdominator in the current region, with a virtual exit. */
    private function merge($T, $F, ?object $loop)
    {
        if (!$T instanceof CfgBlock || !$F instanceof CfgBlock) {
            return null;
        }
        $cacheKey = $loop === null ? 0 : $loop->header->id();
        if (!isset($this->postdomCache[$cacheKey])) {
            $region = $loop === null ? $this->reach : $loop->nodes;
            $all = [0 => true];
            foreach ($region as $id => $node) {
                $all[$id] = true;
            }
            $sets = [0 => [0 => true]];
            foreach ($region as $id => $node) {
                $sets[$id] = $all;
            }
            do {
                $changed = false;
                foreach (array_reverse($region, true) as $id => $node) {
                    $common = null;
                    $successors = $node->succ ?: [null];
                    foreach ($successors as $next) {
                        $nextId = $next instanceof CfgBlock && isset($region[$next->id()])
                            && ($loop === null || $next !== $loop->header) ? $next->id() : 0;
                        $common = $common === null ? $sets[$nextId]
                            : array_intersect_key($common, $sets[$nextId]);
                    }
                    $common[$id] = true;
                    if (count($common) !== count($sets[$id]) || array_diff_key($common, $sets[$id])) {
                        $sets[$id] = $common;
                        $changed = true;
                    }
                }
            } while ($changed);
            $this->postdomCache[$cacheKey] = $sets;
        }
        $sets = $this->postdomCache[$cacheKey];
        $common = array_intersect_key($sets[$T->id()] ?? [], $sets[$F->id()] ?? []);
        $best = null;
        $bestDepth = -1;
        foreach ($common as $id => $_) {
            if ($id !== 0 && count($sets[$id]) > $bestDepth) {
                $best = $this->reach[$id];
                $bestDepth = count($sets[$id]);
            }
        }
        if ($best !== null) {
            return $best;
        }
        // Early return/throw paths need not pass through a continuation join.
        // Search only this iteration: following a back edge would select a
        // loop increment as a false join and duplicate its side effects.
        $left = $this->calculateRegionDistances($T, $loop);
        $right = $this->calculateRegionDistances($F, $loop);
        $score = PHP_INT_MAX;
        foreach (array_intersect_key($left, $right) as $id => $distance) {
            $nextScore = $distance + $right[$id];
            if ($nextScore < $score) {
                $best = $this->reach[$id];
                $score = $nextScore;
            }
        }
        return $best;
    }

    private function calculateRegionDistances(CfgBlock $start, ?object $loop): array
    {
        $distance = [];
        $queue = [[$start, 0]];
        for ($i = 0; $i < count($queue); $i++) {
            [$block, $depth] = $queue[$i];
            if (!$block instanceof CfgBlock || isset($distance[$block->id()])
                || ($loop !== null && ($block === $loop->header
                    || !isset($loop->nodes[$block->id()])))) {
                continue;
            }
            $distance[$block->id()] = $depth;
            foreach ($block->succ as $next) {
                $queue[] = [$next, $depth + 1];
            }
        }
        return $distance;
    }

    // ------------------------------------------------------------------
    // emission
    // ------------------------------------------------------------------

    public function emitRegion(): array
    {
        if (!$this->entry) {
            return [];
        }
        [$out, ] = $this->emit($this->entry, [], null);
        return $out;
    }

    private function isStop($cur, array $stop): bool
    {
        return $cur instanceof CfgBlock && isset($stop[$cur->id()]);
    }

    private function emit($cur, array $stop, ?object $loop, bool $allowFirst = false): array
    {
        $out = [];
        $firstIter = $allowFirst;
        $guard = 0;

        while ($cur instanceof CfgBlock && ($allowFirst || !$this->isStop($cur, $stop))) {
            $allowFirst = false;
            if (++$guard > 50000) {
                throw new RegionFailed('runaway');
            }
            if ($loop !== null && !isset($loop->nodes[$cur->id()])) {
                if ($loop->exit !== null && $loop->exit !== $cur) {
                    throw new RegionFailed('multiple loop exits');
                }
                $loop->exit = $cur;
                $out[] = new Stmt\Break_();
                return [$out, $cur];
            }
            if ($loop !== null && $cur === $loop->header && !$firstIter) {
                $out[] = new Stmt\Continue_();
                return [$out, $cur];
            }
            $firstIter = false;

            if (isset($this->loops[$cur->id()])
                && ($loop === null || $cur !== $loop->header)
                && ($loop === null || isset($loop->nodes[$cur->id()]))) {
                [$body, $after] = $this->emitLoop($cur, $loop);
                foreach ($body as $__x) { $out[] = $__x; }
                $cur = $after;
                continue;
            }

            $cnt = ($this->emitCounts[$cur->id()] ?? 0) + 1;
            $this->emitCounts[$cur->id()] = $cnt;
            if ($cnt > 1) {
                $this->dups++;
                if ($cnt > self::MAX_BLOCK_EMITS || $this->dups > self::MAX_DUP_TOTAL) {
                    throw new RegionFailed('duplication limit at ' . $cur);
                }
            }
            $this->placed[$cur->id()] = true;

            foreach ($cur->stmts as $statement) {
                if ($statement instanceof Stmt\Foreach_ || $statement instanceof Stmt\Switch_) {
                    $this->attachNativeControls($statement, $cur->succ[0] ?? null, $loop);
                }
                $out[] = $statement;
            }

            if ($cur->term === null) {
                $cur = $cur->fall;
                continue;
            }
            if ($cur->term[0] === 'end') {
                return [$out, null];
            }
            if ($cur->term[0] === 'goto') {
                $tgt = $cur->succ[0];
                if (is_string($tgt)) {
                    return [array_merge($out, $this->emitControl($tgt, $loop)), null];
                }
                if ($this->isStop($tgt, $stop)) {
                    return [$out, $tgt];
                }
                if ($loop !== null) {
                    if ($tgt === $loop->header) {
                        $out[] = new Stmt\Continue_();
                        return [$out, $tgt];
                    }
                    if (!isset($loop->nodes[$tgt->id()])) {
                        if ($loop->exit !== null && $loop->exit !== $tgt) {
                            throw new RegionFailed('multiple loop exits');
                        }
                        $loop->exit = $tgt;
                        $out[] = new Stmt\Break_();
                        return [$out, $tgt];
                    }
                }
                $cur = $tgt;
                continue;
            }
            $cur = $this->emitBranch($cur, $stop, $loop, $out);
            if ($cur === null) {
                return [$out, null];
            }
        }
        if (is_string($cur)) {
            $out = array_merge($out, $this->emitControl($cur, $loop));
        }
        return [$out, $cur];
    }

    private function emitControl(string $target, ?object $loop): array
    {
        if (strpos($target, 'OUTER:') !== 0) {
            throw new RegionFailed('unresolved transfer: ' . $target);
        }
        $name = substr($target, 6);
        $control = $this->controls[$name] ?? null;
        if ($control === null && $name === $this->breakLabel) {
            $control = ['kind' => 'break', 'depth' => 1];
        } elseif ($control === null && $name === $this->contLabel) {
            $control = ['kind' => 'continue', 'depth' => 1];
        }
        if ($control === null) {
            throw new RegionFailed('unknown outer control: ' . $name);
        }
        $depth = $control['depth'];
        for ($parent = $loop; $parent !== null; $parent = $parent->parent) {
            $depth++;
        }
        $number = $depth > 1 ? new Scalar\LNumber($depth) : null;
        return [$control['kind'] === 'break' ? new Stmt\Break_($number) : new Stmt\Continue_($number)];
    }

    private function attachNativeControls(Node $statement, $after, ?object $loop): void
    {
        $seen = [];
        while ($after instanceof CfgBlock && !$after->stmts
            && $after->term !== null && $after->term[0] === 'goto'
            && !isset($seen[$after->id()])) {
            $seen[$after->id()] = true;
            $after = $after->succ[0];
        }
        $contexts = [];
        for ($parent = $loop; $parent !== null; $parent = $parent->parent) {
            $contexts[] = $parent;
        }
        $controls = $this->controls;
        foreach ($controls as &$control) {
            $control['depth'] += count($contexts) + 1;
        }
        unset($control);
        foreach ($this->labelBlock as $label => $_) {
            $target = $this->target($label);
            if ($target === $after) {
                $controls[$label] = ['kind' => 'break', 'depth' => 1];
                continue;
            }
            foreach ($contexts as $level => $context) {
                if ($target === $context->exit) {
                    $controls[$label] = ['kind' => 'break', 'depth' => $level + 2];
                    break;
                }
                if ($target === $context->header) {
                    $controls[$label] = ['kind' => 'continue', 'depth' => $level + 2];
                    break;
                }
            }
        }
        if ($statement instanceof Stmt\Foreach_) {
            $last = end($statement->stmts);
            if ($last instanceof Stmt\Label) {
                $controls[$last->name->name] = ['kind' => 'continue', 'depth' => 1];
            }
        }
        $statement->setAttribute('deob_controls', $controls);
    }

    private function emitBranch(CfgBlock $b, array $stop, ?object $loop, array &$out)
    {
        $cond = $b->term[1];
        $T = $b->succ[0];
        $F = $b->succ[1];

        $M = $this->merge($T, $F, $loop);
        if ($M === null) {
            [$then] = $this->emit($T, $stop + ['OUT' => true], $loop);
            [$else] = $this->emit($F, $stop + ['OUT' => true], $loop);
            if ($then && $else) {
                $out[] = new Stmt\If_($cond, ['stmts' => $then, 'else' => new Stmt\Else_($else)]);
            } elseif ($then) {
                $out[] = new Stmt\If_($cond, ['stmts' => $then]);
            } elseif ($else) {
                $out[] = new Stmt\If_($this->negate($cond), ['stmts' => $else]);
            }
            return null;
        }
        if ($M === $T) {
            [$inner, ] = $this->emit($F, $stop + [$M->id() => $M], $loop);
            $out[] = new Stmt\If_($this->negate($cond), ['stmts' => $inner]);
            return $M;
        }
        if ($M === $F) {
            [$inner, ] = $this->emit($T, $stop + [$M->id() => $M], $loop);
            $out[] = new Stmt\If_($cond, ['stmts' => $inner]);
            return $M;
        }
        [$then] = $this->emit($T, $stop + [$M->id() => $M], $loop);
        [$else] = $this->emit($F, $stop + [$M->id() => $M], $loop);
        if ($then && $else) {
            $out[] = new Stmt\If_($cond, ['stmts' => $then, 'else' => new Stmt\Else_($else)]);
        } elseif ($then) {
            $out[] = new Stmt\If_($cond, ['stmts' => $then]);
        } elseif ($else) {
            $out[] = new Stmt\If_($this->negate($cond), ['stmts' => $else]);
        }
        return $M;
    }

    private function emitLoop(CfgBlock $header, ?object $parent): array
    {
        $lnodes = $this->loops[$header->id()]['nodes'];
        $loop = (object)['header' => $header, 'nodes' => $lnodes, 'exit' => null, 'parent' => $parent];

        $cond = null;
        $entry = null;
        if ($header->term !== null && $header->term[0] === 'branch') {
            $T = $header->succ[0];
            $F = $header->succ[1];
            if (!($T instanceof CfgBlock) || !isset($lnodes[$T->id()])) {
                if ($F instanceof CfgBlock) {
                    $cond = $this->negate($header->term[1]);
                    $entry = $F;
                    $loop->exit = $T;
                }
            } elseif (!($F instanceof CfgBlock) || !isset($lnodes[$F->id()])) {
                if ($T instanceof CfgBlock) {
                    $cond = $header->term[1];
                    $entry = $T;
                    $loop->exit = $F;
                }
            }
        }
        if ($entry === null) {
            // do { ... } while (...)  /  while (true)
            $latch = null;
            $dcond = null;
            $lexit = null;
            foreach ($lnodes as $n) {
                if ($n === $header || $n->term === null || $n->term[0] !== 'branch') {
                    continue;
                }
                $s0 = $n->succ[0];
                $s1 = $n->succ[1];
                if ($s0 === $header && !($s1 instanceof CfgBlock && isset($lnodes[$s1->id()]))) {
                    $latch = $n;
                    $dcond = $n->term[1];
                    $lexit = $s1;
                    break;
                }
                if ($s1 === $header && !($s0 instanceof CfgBlock && isset($lnodes[$s0->id()]))) {
                    $latch = $n;
                    $dcond = $this->negate($n->term[1]);
                    $lexit = $s0;
                    break;
                }
            }
            if ($latch !== null) {
                foreach ($this->preds[$header->id()] ?? [] as $predecessor) {
                    if ($predecessor !== $latch && isset($lnodes[$predecessor->id()])) {
                        // A jump to the body bypasses the latch condition.
                        // Native do-while continue would evaluate that condition.
                        $latch = null;
                        break;
                    }
                }
            }
            $stopSet = [$header->id() => $header];
            if ($latch) {
                $stopSet[$latch->id()] = $latch;
            }
            if ($latch !== null) {
                $loop->exit = $lexit;
            }
            [$inner, ] = $this->emit($header, $stopSet, $loop, true);
            while ($inner && end($inner) instanceof Stmt\Continue_
                && (end($inner)->num === null || end($inner)->num instanceof Scalar\LNumber && end($inner)->num->value === 1)) {
                array_pop($inner);
            }
            if ($latch !== null) {
                $loop->exit = $lexit;
                foreach ($latch->stmts as $statement) {
                    $inner[] = $statement;
                }
                return [[new Stmt\Do_($dcond, $inner)], $loop->exit];
            }
            return [[new Stmt\While_(new Expr\ConstFetch(new Node\Name('true')), $inner)], $loop->exit];
        }

        $this->placed[$header->id()] = true;
        $body0 = $header->stmts;
        [$inner, ] = $this->emit($entry, [$header->id() => $header], $loop);
        $body = $body0; foreach ($inner as $__x) { $body[] = $__x; }
        while ($body && end($body) instanceof Stmt\Continue_
            && (end($body)->num === null || end($body)->num instanceof Scalar\LNumber && end($body)->num->value === 1)) {
            array_pop($body);
        }
        if ($body0) {
            $body = $body0;
            $body[] = new Stmt\If_($this->negate($cond), ['stmts' => [new Stmt\Break_()]]);
            foreach ($inner as $statement) {
                $body[] = $statement;
            }
            $cond = new Expr\ConstFetch(new Node\Name('true'));
        }
        return [[new Stmt\While_($cond, $body)], $loop->exit];
    }

    private function negate(Expr $e): Expr
    {
        return $e instanceof Expr\BooleanNot ? $e->expr : new Expr\BooleanNot($e);
    }
}
