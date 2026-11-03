<?php
// Compare the complete stress output, including extra rows and fields.
if ($argc !== 3 || !is_readable($argv[1]) || !is_readable($argv[2])) {
    fwrite(STDERR, "Expected two readable JSON files\n");
    exit(1);
}
$a = json_decode(file_get_contents($argv[1]), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    fwrite(STDERR, "Invalid first JSON file\n");
    exit(1);
}
$b = json_decode(file_get_contents($argv[2]), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    fwrite(STDERR, "Invalid second JSON file\n");
    exit(1);
}
foreach ([$a, $b] as $output) {
    if (!is_array($output) || !isset($output['rows'], $output['coverage'])
        || !is_array($output['rows']) || !is_array($output['coverage'])) {
        fwrite(STDERR, "Expected rows and coverage in stress output\n");
        exit(1);
    }
}
if ($a !== $b) {
    echo "JSON differs: rows, fields, values or coverage\n";
    exit(1);
}
echo "IDENTICAL\n";
