<?php
// Only this application file is executed. Submitted PHP is parsed, never included.
ini_set('display_errors', 'stderr');
require dirname(__DIR__) . '/lib/decoder/Deobfuscator.php';

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

try {
    $code = stream_get_contents(STDIN, 5242881);
    if ($code === false || strlen($code) > 5242880) {
        throw new RuntimeException('Код слишком большой. Допустимый размер — 5 МБ.');
    }
    if (substr($code, 0, 3) === "\xEF\xBB\xBF") {
        $code = substr($code, 3);
    }
    $start = ltrim($code);
    $completeFile = in_array('--complete-file', $argv, true);
    if (!$completeFile && strncasecmp($start, '<?php', 5) !== 0 && strncmp($start, '<?=', 3) !== 0) {
        $code = "<?php\n" . $code;
    }
    $decoder = new Deobfuscator();
    $decoded = $decoder->processFile($code);
    $result = ['ok' => true, 'code' => $decoded,
        'gotoBefore' => countGotos($code), 'gotoAfter' => countGotos($decoded)];
} catch (PhpParser\Error $error) {
    $result = ['ok' => false, 'status' => 422,
        'error' => 'Ошибка синтаксиса PHP: ' . $error->getMessage()];
} catch (Throwable $error) {
    $result = ['ok' => false, 'status' => 500,
        'error' => 'Не удалось обработать этот фрагмент PHP-кода.'];
}
echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE | JSON_THROW_ON_ERROR);
