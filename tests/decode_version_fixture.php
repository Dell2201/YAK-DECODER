<?php
// Test-only bridge. Never includes or executes the submitted fixture.
require dirname(__DIR__) . '/app/DecoderProcess.php';
$result = (new DecoderProcess())->decode(file_get_contents($argv[1]), true, $argv[3]);
if (!empty($result['ok'])) {
    file_put_contents($argv[2], $result['code']);
    unset($result['code']);
}
echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
