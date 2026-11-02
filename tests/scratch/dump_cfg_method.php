<?php
// usage: php -n dump_cfg_method.php <libRoot> <file> <methodName>
$lib = rtrim($argv[1], "/\\");
[, , $in, $method] = $argv + [null, null, null, null];
require $lib . '/Deobfuscator.php';

use PhpParser\Node;
use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$ast = $parser->parse(file_get_contents($in));
$finder = new \PhpParser\NodeFinder();
$m = $finder->findFirst($ast, function ($n) use ($method) {
    return $n instanceof Stmt\ClassMethod && $n->name->toString() === $method;
});
$body = $m->stmts;
$cloner = new \PhpParser\NodeTraverser();
$cloner->addVisitor(new \PhpParser\NodeVisitor\CloningVisitor());
$work = $cloner->traverse($body);

$st = new CfgStructurer($work, [], null, null, []);
$st->reach = $st->reachable();
$st->nodes = array_values($st->reach);
$st->dom = $st->dominators($st->nodes);
$st->loops = $st->findLoops();
$pp = new Standard();

echo "blocks (id | labels | stmts | term | succ):\n";
foreach ($st->blocks as $b) {
    $lbl = implode(',', $b->labels);
    $stmts = [];
    foreach ($b->stmts as $s) { $stmts[] = $pp->prettyPrint([$s]); }
    $term = '';
    if ($b->term !== null) {
        $term = $b->term[0] === 'branch'
            ? 'branch(' . $pp->prettyPrintExpr($b->term[1]) . ')'
            : $b->term[0] . (isset($b->term[1]) && is_string($b->term[1]) ? ' ' . $b->term[1] : '');
    }
    $succ = [];
    foreach ($b->succ as $s) { $succ[] = is_string($s) ? $s : $s->id(); }
    $reach = isset($st->reach[$b->id()]) ? 'R' : '-';
    echo '  ', $b->id(), " [$reach] L{$lbl} | {", implode('; ', $stmts), "} | {$term} | -> ", implode(', ', $succ), "\n";
}
echo "preds:\n";
foreach ($st->preds as $id => $ps) {
    $list = [];
    foreach ($ps as $p) { $list[] = $p->id(); }
    echo "  $id <- ", implode(',', $list), "\n";
}
echo "loops:\n";
foreach ($st->loops as $hid => $info) {
    $nodes = [];
    foreach ($info['nodes'] as $n) { $nodes[] = $n->id(); }
    echo "  header=$hid nodes={", implode(',', $nodes), "}\n";
}
echo "entry: ", $st->entry ? $st->entry->id() : '-', "\n";
