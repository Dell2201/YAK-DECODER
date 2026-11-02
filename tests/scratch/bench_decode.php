<?php
// usage: php -n bench_decode.php <libRoot> <in.php> [repeat]
$lib = rtrim($argv[1], "/\\");
[, , $in] = $argv + [null, null, null];
$repeat = max(1, (int)($argv[3] ?? 1));
require $lib . '/Deobfuscator.php';

$src = file_get_contents($in);
$t0 = microtime(true);
for ($i = 0; $i < $repeat; $i++) {
    $d = new Deobfuscator();
    $code = $d->processFile($src);
    unset($d, $code);
}
$t1 = microtime(true);
printf("%s\n  time: %.2fs  peak_mem: %.1f MiB  in: %.2f MiB\n",
    basename($in), $t1 - $t0, memory_get_peak_usage(true) / 1048576, strlen($src) / 1048576);
