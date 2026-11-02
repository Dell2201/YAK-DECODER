<?php
// Dump the CFG of a region the way CfgStructurer sees it (debug tool).
require dirname(__DIR__) . '/lib/decoder/Deobfuscator.php';

use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

$code = file_get_contents($argv[1]);
if (substr($code, 0, 3) === "\xEF\xBB\xBF") {
    $code = substr($code, 3);
}
$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$root = $parser->parse($code);

// find the first function-like node with goto, else top-level list
$finder = new \PhpParser\NodeFinder();
class Deobfuscator_Hack extends Deobfuscator
{
    public function hasGotoOrLabelPublic($n): bool
    {
        return $this->hasGotoOrLabel($n);
    }
}
$body = null;
$target = null;
foreach ($finder->findInstanceOf($root, Stmt\Function_::class) as $fn) {
    if ((new Deobfuscator_Hack())->hasGotoOrLabelPublic($fn->stmts)) {
        $target = $fn;
        break;
    }
}
if ($target === null) {
    $body = $root;
} else {
    $body = $target->stmts;
}

$cloner = new \PhpParser\NodeTraverser();
$cloner->addVisitor(new \PhpParser\NodeVisitor\CloningVisitor());
$body = $cloner->traverse($body);

$st = new CfgStructurer($body, [], null, null, []);
$st->reach = $st->reachable();
$st->nodes = array_values($st->reach);
$st->dom = $st->dominators($st->nodes);
$st->loops = $st->findLoops();

$pp = new Standard();
$desc = function ($b) use ($pp) {
    if (!$b instanceof CfgBlock) return var_export($b, true);
    return 'B' . $b->id() . '[' . implode(',', $b->labels) . ']';
};
foreach ($st->blocks as $b) {
    $inReach = isset($st->reach[$b->id()]) ? '' : ' UNREACHABLE';
    $stmts = $b->stmts ? count($b->stmts) . ' stmts' : 'empty';
    $term = 'fall';
    if ($b->term !== null) {
        $term = $b->term[0] === 'goto' ? 'goto ' . $b->term[1]
            : ($b->term[0] === 'end' ? 'END' : 'branch(' . $pp->prettyPrintExpr($b->term[1]) . ') -> ' . $b->term[2]);
    }
    $succ = [];
    foreach ($b->succ as $s) { $succ[] = $desc($s); }
    echo $desc($b), " ($stmts, $term)$inReach succ={", implode(', ', $succ), "}\n";
}
echo "\nloops:\n";
foreach ($st->loops as $id => $l) {
    echo '  header ', $desc($l['header']), ' nodes: ';
    $names = [];
    foreach ($l['nodes'] as $n) { $names[] = 'B' . $n->id(); }
    echo implode(' ', $names), "\n";
}
