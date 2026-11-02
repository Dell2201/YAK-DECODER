<?php
// Debug: dump a switch-case region CFG with loop controls, then emit it.
require dirname(__DIR__) . '/lib/decoder/Deobfuscator.php';

use PhpParser\Node\Stmt;
use PhpParser\NodeFinder;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

$caseIndex = (int)($argv[2] ?? 1);
$code = file_get_contents($argv[1]);
$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$root = $parser->parse($code);

$finder = new NodeFinder();
$switches = $finder->findInstanceOf($root, Stmt\Switch_::class);
if (!$switches) { fwrite(STDERR, "no switch\n"); exit(1); }
$switch = $switches[0];
$body = $switch->cases[$caseIndex]->stmts;

// Controls as attachNativeControls would compute them for the foreach body:
// labels of the foreach body that resolve to the block after the switch.
$controls = [];
foreach ($argv as $k => $arg) {
    if (strpos($arg, 'ctrl:') === 0) {
        $controls[substr($arg, 5)] = ['kind' => 'break', 'depth' => 1];
    }
}

$cloner = new \PhpParser\NodeTraverser();
$cloner->addVisitor(new \PhpParser\NodeVisitor\CloningVisitor());
$body = $cloner->traverse($body);

$st = new CfgStructurer($body, [], null, null, $controls);
$st->reach = $st->reachable();
$st->nodes = array_values($st->reach);
$st->dom = $st->dominators($st->nodes);
$st->loops = $st->findLoops();

$pp = new Standard();
$desc = function ($b) { return $b instanceof CfgBlock ? 'B' . $b->id() . '[' . implode(',', $b->labels) . ']' : var_export($b, true); };
foreach ($st->blocks as $b) {
    $inReach = isset($st->reach[$b->id()]) ? '' : ' UNREACHABLE';
    $stmts = $b->stmts ? ($pp->prettyPrint($b->stmts)) : 'empty';
    $term = 'fall';
    if ($b->term !== null) {
        $term = $b->term[0] === 'goto' ? 'goto ' . $b->term[1]
            : ($b->term[0] === 'end' ? 'END' : 'branch(' . $pp->prettyPrintExpr($b->term[1]) . ') -> ' . $b->term[2]);
    }
    $succ = [];
    foreach ($b->succ as $s) { $succ[] = $desc($s); }
    echo $desc($b), " ($stmts | $term)$inReach succ={", implode(', ', $succ), "}\n";
}
echo "\nloops:\n";
foreach ($st->loops as $l) {
    echo '  header ', $desc($l['header']), ' nodes: ';
    $names = [];
    foreach ($l['nodes'] as $n) { $names[] = 'B' . $n->id(); }
    echo implode(' ', $names), "\n";
}
echo "\n=== emission:\n";
try {
    $result = $st->emitRegion();
    echo $pp->prettyPrint($result), "\n";
} catch (Throwable $e) {
    echo 'EMISSION FAILED: ', $e->getMessage(), "\n";
}
