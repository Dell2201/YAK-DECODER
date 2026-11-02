<?php
// usage: php -n decode_with.php <libRoot> <in.php> <out.php> [dump]
$lib = rtrim($argv[1], "/\\");
$in = $argv[2];
$out = $argv[3];
$dump = isset($argv[4]);
require $lib . '/Deobfuscator.php';

$d = new Deobfuscator();
$src = file_get_contents($in);
$code = $d->processFile($src);
file_put_contents($out, $code);
echo 'lib: ', $lib, "\n";
echo 'stats: ', json_encode($d->stats), "\n";
echo 'goto before: ', substr_count($src, 'goto '), ', after: ', substr_count($code, 'goto '), "\n";
echo 'failures (', count($d->failures), "):\n";
foreach ($d->failures as $f) { echo '  line ', $f['line'], ': ', $f['reason'], "\n"; }
if ($dump && property_exists($d, 'trace')) {
    echo 'trace (', count($d->trace), "):\n";
    foreach ($d->trace as $t) {
        echo '  [', $t['kind'], '] ', $t['ctx'] ?? '', ' n=', $t['n'] ?? '', isset($t['reason']) ? ' :: ' . $t['reason'] : '', "\n";
    }
}
