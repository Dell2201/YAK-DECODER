<?php
// Diagnostic: run Deobfuscator on a file, report stats/failures/goto counts.
require dirname(__DIR__) . '/lib/decoder/Deobfuscator.php';

$path = $argv[1];
$code = file_get_contents($path);
if (substr($code, 0, 3) === "\xEF\xBB\xBF") {
    $code = substr($code, 3);
}

function countGotos(string $code): int
{
    $count = 0;
    foreach (token_get_all($code) as $token) {
        if (is_array($token) && $token[0] === T_GOTO) {
            $count++;
        }
    }
    return $count;
}

$t0 = microtime(true);
$decoder = new Deobfuscator();
try {
    $decoded = $decoder->processFile($code);
} catch (Throwable $e) {
    echo "EXCEPTION: " . get_class($e) . ": " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine() . "\n";
    exit(1);
}
$dt = microtime(true) - $t0;
echo "time: " . round($dt, 2) . "s\n";
echo "stats: " . json_encode($decoder->stats) . "\n";
echo "goto before: " . countGotos($code) . ", after: " . countGotos($decoded) . "\n";
echo "lastError: " . var_export($decoder->lastError, true) . "\n";
echo "failures (" . count($decoder->failures) . "):\n";
foreach (array_slice($decoder->failures, 0, 40) as $f) {
    echo "  line {$f['line']}: {$f['reason']}\n";
}
echo "trace (" . count($decoder->trace) . "):\n";
foreach ($decoder->trace as $t) {
    $line = "  [{$t['kind']}] ctx={$t['ctx']} n={$t['n']}";
    if (isset($t['reason'])) $line .= " reason={$t['reason']}";
    echo $line . "\n";
}
file_put_contents($argv[2] ?? 'diag-out.php', $decoded);
