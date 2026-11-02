<?php
// Extract a function (with the hit() helper) into a standalone fixture file.
require dirname(__DIR__) . '/lib/decoder/autoload.php';

use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

$target = $argv[2];
$source = $argv[1];
$code = file_get_contents($source);
$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$stmts = $parser->parse($code);

$finder = new PhpParser\NodeFinder();
$hit = null;
$fn = null;
foreach ($stmts as $s) {
    if (!$s instanceof Stmt\Namespace_) continue;
    foreach ($s->stmts as $n) {
        if ($n instanceof Stmt\Function_ && $n->name->toString() === 'FmDTFfJzaEhDlWUh') $hit = $n;
        if ($n instanceof Stmt\Function_ && $n->name->toString() === $target) $fn = $n;
    }
}
if ($fn === null) { fwrite(STDERR, "function not found\n"); exit(1); }

$pp = new Standard();
$out = "<?php\nnamespace repro;\n" . $pp->prettyPrint([$hit]) . "\n" . $pp->prettyPrint([$fn]) . "\n";
$arg = $argv[3] ?? '3';
$flag = ($argv[4] ?? 'false') === 'true';
$out .= "echo json_encode(" . $target . "(" . (int)$arg . ", " . ($flag ? 'true' : 'false') . ")), \"\\n\";\n";
file_put_contents($argv[5] ?? 'fixture.php', $out);
echo "written\n";
