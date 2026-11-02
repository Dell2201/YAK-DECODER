<?php
// Debug: run CfgStructurer::emitRegion directly and print the result.
require dirname(__DIR__) . '/lib/decoder/Deobfuscator.php';

use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

$code = file_get_contents($argv[1]);
$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$root = $parser->parse($code);

$finder = new \PhpParser\NodeFinder();
foreach ($finder->findInstanceOf($root, Stmt\Function_::class) as $fn) {
    if (strpos($code, 'goto') === false) continue;
    // take the LAST function with goto (the fixture's target)
    $body = $fn->stmts;
    $has = (new \PhpParser\NodeFinder())->findFirstInstanceOf($fn->stmts, Stmt\Goto_::class);
    if ($has !== null) { $target = $fn; }
}
$body = $target->stmts;

$cloner = new \PhpParser\NodeTraverser();
$cloner->addVisitor(new \PhpParser\NodeVisitor\CloningVisitor());
$body = $cloner->traverse($body);

$st = new CfgStructurer($body, [], null, null, []);
$st->reach = $st->reachable();
$st->nodes = array_values($st->reach);
$st->dom = $st->dominators($st->nodes);
$st->loops = $st->findLoops();
$result = $st->emitRegion();
$pp = new Standard();
echo $pp->prettyPrint($result), "\n";
