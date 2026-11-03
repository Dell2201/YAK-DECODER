<?php
ini_set('display_errors', '0');
ini_set('log_errors', '0');
set_time_limit(35);
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: no-referrer');

function respond(array $data, int $status): void
{
    http_response_code($status);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    respond(['ok' => false, 'error' => 'Используйте кнопку «Декодировать» на странице сайта.'], 405);
}
$contentType = strtolower(trim(explode(';', $_SERVER['CONTENT_TYPE'] ?? '')[0]));
if ($contentType !== 'application/json') {
    respond(['ok' => false, 'error' => 'Ожидается запрос в формате JSON.'], 415);
}
$body = file_get_contents('php://input', false, null, 0, 33554433);
if ($body === false || strlen($body) > 33554432) {
    respond(['ok' => false, 'error' => 'Запрос слишком большой. Допустимый размер кода — 5 МБ.'], 413);
}
$input = json_decode($body, true);
if (!is_array($input) || !isset($input['code']) || !is_string($input['code'])) {
    respond(['ok' => false, 'error' => 'Передайте PHP-код в текстовом поле.'], 400);
}
$code = $input['code'];
if (trim($code) === '') {
    respond(['ok' => false, 'error' => 'Сначала вставьте PHP-код.'], 422);
}
if (strlen($code) > 5242880) {
    respond(['ok' => false, 'error' => 'Код слишком большой. Допустимый размер — 5 МБ.'], 413);
}
if (array_key_exists('requireYakSignature', $input) && !is_bool($input['requireYakSignature'])) {
    respond(['ok' => false, 'error' => 'Параметр проверки подписи должен быть логическим значением.'], 400);
}
if (array_key_exists('completeFile', $input) && !is_bool($input['completeFile'])) {
    respond(['ok' => false, 'error' => 'Параметр обработки полного файла должен быть логическим значением.'], 400);
}
$phpVersion = array_key_exists('phpVersion', $input) ? $input['phpVersion'] : '7.4';
if (!is_string($phpVersion) || !in_array($phpVersion, ['7.4', '8.1', '8.2', '8.3'], true)) {
    respond(['ok' => false, 'error' => 'Выберите допустимую версию PHP: 7.4, 8.1, 8.2 или 8.3.'], 400);
}
$requireYakSignature = $input['requireYakSignature'] ?? false;
$yakSignature = 'Obfuscated by YAK Pro - Php Obfuscator';
if ($requireYakSignature && strpos($code, $yakSignature) === false) {
    respond(['ok' => false, 'errorCode' => 'yak_signature_missing',
        'error' => 'В коде не найдена подпись «' . $yakSignature . '». Снимите флажок, чтобы разрешить обработку без подписи.'], 422);
}
try {
    require dirname(__DIR__) . '/app/DecoderProcess.php';
    $decoder = new DecoderProcess();
    $result = $decoder->decode($code, $input['completeFile'] ?? false, $phpVersion);
    $status = $result['ok'] ? 200 : ($result['status'] ?? 500);
    unset($result['status']);
    respond($result, $status);
} catch (Throwable $error) {
    $message = $error instanceof RuntimeException ? $error->getMessage() : 'Не удалось обработать код. Попробуйте ещё раз.';
    respond(['ok' => false, 'error' => $message], 503);
}
