<?php
// Extract one function from the obfuscated file and run it with a driver.
require dirname(__DIR__) . '/lib/decoder/autoload.php';

use PhpParser\Node\Stmt;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

$target = $argv[2];
$args = array_slice($argv, 3);
$code = file_get_contents($argv[1]);
$parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
$stmts = $parser->parse($code);

$finder = new PhpParser\NodeFinder();
$hit = null;
$fn = null;
foreach ($stmts as $s) {
    if ($s instanceof Stmt\Namespace_) {
        foreach ($s->stmts as $n) {
            if ($n instanceof Stmt\Function_ && $n->name->toString() === 'FmDTFfJzaEhDlWUh') $hit = $n;
            if ($n instanceof Stmt\Function_ && $n->name->toString() === $target) $fn = $n;
        }
    }
}
if ($fn === null) { fwrite(STDERR, "function not found\n"); exit(1); }

$pp = new Standard();
$out = "<?php\nnamespace yak_test;\n" . $pp->prettyPrint([$hit]) . "\n" . $pp->prettyPrint([$fn]) . "\n";
$out .= '$__res = ' . $target . '(' . implode(', ', array_map(function ($a) {
    return var_export(strpos($a, 'B:') === 0 ? true : (strpos($a, 'b:') === 0 ? false : (int) $a), true);
}, $args)) . ");\necho json_encode(\$__res, JSON_UNESCAPED_UNICODE), \"\\n\";\n";
file_put_contents(__DIR__ . '/_fn_extract.php', $out);
require __DIR__ . '/_fn_extract.php';
