<?php
// Dump the label/goto graph of one function from an obfuscated file.
require dirname(__DIR__) . '/lib/decoder/autoload.php';

use PhpParser\Node;
use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;

$target = $argv[2] ?? 'tkFCMDgCO385wZ4a';
$code = file_get_contents($argv[1]);
$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$stmts = $parser->parse($code);

$finder = new PhpParser\NodeFinder();
foreach ($finder->findInstanceOf($stmts, Stmt\Function_::class) as $fn) {
    if ($fn->name->toString() !== $target) {
        continue;
    }
    foreach ($fn->stmts as $s) {
        echo stmtDesc($s), "\n";
    }
}

function stmtDesc($s): string
{
    if ($s instanceof Stmt\Label) {
        return $s->name->name . ':';
    }
    if ($s instanceof Stmt\Goto_) {
        return '    goto ' . $s->name->name . ';';
    }
    if ($s instanceof Stmt\If_) {
        $out = '    if (' . exprShort($s->cond) . ') { goto ' . $s->stmts[0]->name->name . '; }';
        return $out;
    }
    if ($s instanceof Stmt\Foreach_) {
        $out = "    foreach (...) {\n";
        foreach ($s->stmts as $fs) {
            $out .= '  ' . stmtDesc($fs) . "\n";
        }
        return $out . "    }";
    }
    $pp = new PhpParser\PrettyPrinter\Standard();
    return '    ' . trim(preg_replace('/\s+/', ' ', $pp->prettyPrint([$s])));
}

function exprShort($e): string
{
    $pp = new PhpParser\PrettyPrinter\Standard();
    return trim(preg_replace('/\s+/', ' ', $pp->prettyPrintExpr($e)));
}
