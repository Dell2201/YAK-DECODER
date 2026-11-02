<?php
// Compare two stress-test JSON outputs row by row.
$a = json_decode(stream_get_contents(fopen($argv[1], 'rb')), true);
$b = json_decode(stream_get_contents(fopen($argv[2], 'rb')), true);
if (!is_array($a) || !is_array($b)) { fwrite(STDERR, "bad json\n"); exit(1); }
$diffs = 0;
foreach ($a['rows'] as $i => $rowA) {
    $rowB = $b['rows'][$i];
    foreach ($rowA as $k => $v) {
        if ($v !== $rowB[$k]) {
            $diffs++;
            echo 'row ' . $i . ' input=[' . implode(',', $rowA['input']) . "] key '" . $k . "':\n";
            echo '  A: ', json_encode($v, JSON_UNESCAPED_UNICODE), "\n";
            echo '  B: ', json_encode($rowB[$k], JSON_UNESCAPED_UNICODE), "\n";
        }
    }
}
if ($a['coverage'] !== $b['coverage']) {
    echo "coverage differs\n";
    $diffs++;
}
echo $diffs === 0 ? "IDENTICAL\n" : "$diffs differing keys\n";
