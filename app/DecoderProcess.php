<?php

final class DecoderProcess
{
    public function decode(string $code, bool $completeFile = false, string $phpVersion = '7.4'): array
    {
        if (!function_exists('proc_open')) {
            throw new RuntimeException('На сервере необходимо разрешить функцию proc_open.');
        }
        $bundledBinary = dirname(__DIR__) . '/runtime/php/php.exe';
        $binary = PHP_OS_FAMILY === 'Windows' && is_file($bundledBinary)
            ? $bundledBinary : getenv('YAK_PHP_BINARY');
        if (!$binary) {
            $binary = PHP_BINDIR . DIRECTORY_SEPARATOR . (PHP_OS_FAMILY === 'Windows' ? 'php.exe' : 'php');
        }
        if (!is_file($binary)) {
            throw new RuntimeException('Не найден PHP CLI. Укажите его путь в YAK_PHP_BINARY.');
        }
        $syntaxPaths = ['7.4' => 'php', '8.1' => 'php81', '8.2' => 'php82', '8.3' => 'php83'];
        if (!isset($syntaxPaths[$phpVersion])) {
            throw new RuntimeException('Недопустимая версия PHP для проверки синтаксиса.');
        }
        $syntaxBinary = dirname(__DIR__) . '/runtime/' . $syntaxPaths[$phpVersion] . '/php.exe';
        if (!is_file($syntaxBinary)) {
            throw new RuntimeException('Не найден комплект PHP ' . $phpVersion . ' для проверки синтаксиса.');
        }
        $command = [$binary, '-n', '-d', 'memory_limit=2G', '-d', 'max_execution_time=20',
            '-d', 'display_errors=stderr', '-d', 'log_errors=0', __DIR__ . '/worker.php'];
        $command[] = '--php-version=' . $phpVersion;
        if ($completeFile) {
            $command[] = '--complete-file';
        }
        $output = $this->runProcess($command, $code, 25, 67108864);
        $result = json_decode($output['stdout'], true);
        if (!is_array($result) || !isset($result['ok'])) {
            throw new RuntimeException('Не хватило ресурсов для обработки кода. Попробуйте меньший фрагмент.');
        }
        if (!$result['ok']) {
            return $result;
        }

        $diagnostic = $this->checkSyntax($syntaxBinary, $result['code']);
        if ($diagnostic !== '') {
            return ['ok' => false, 'status' => 422,
                'error' => 'Выходной код не прошёл php --syntax-check (PHP ' . $phpVersion . '). Исходный код сохранён. ' . $diagnostic];
        }
        $result['syntaxChecked'] = true;
        $result['syntaxPhpVersion'] = $phpVersion;
        return $result;
    }

    private function checkSyntax(string $binary, string $code): string
    {
        $path = tempnam(sys_get_temp_dir(), 'yak_syntax_');
        if ($path === false) {
            throw new RuntimeException('Не удалось подготовить проверку синтаксиса.');
        }
        try {
            if (file_put_contents($path, $code) !== strlen($code)) {
                throw new RuntimeException('Не удалось подготовить файл для проверки синтаксиса.');
            }
            $command = [$binary, '-n', '-d', 'memory_limit=512M', '-d', 'display_errors=stderr',
                '-d', 'log_errors=0', '--syntax-check', $path];
            $check = $this->runProcess($command, '', 5, 65536);
            if ($check['exitCode'] === 0) {
                return '';
            }
            $diagnostic = trim($check['stderr'] . "\n" . $check['stdout']);
            return $diagnostic === '' ? 'PHP сообщил об ошибке синтаксиса.'
                : str_replace($path, 'результат.php', $diagnostic);
        } finally {
            unlink($path);
        }
    }

    /** Execute application-owned commands; user PHP is only input or a lint target. */
    private function runProcess(array $command, string $input, int $seconds, int $outputLimit): array
    {
        $outputPath = tempnam(sys_get_temp_dir(), 'yak_output_');
        $errorPath = tempnam(sys_get_temp_dir(), 'yak_error_');
        $process = null;
        $pipes = [];
        try {
            if ($outputPath === false || $errorPath === false) {
                throw new RuntimeException('Не удалось подготовить обработку кода.');
            }
            $descriptors = [0 => ['pipe', 'r'], 1 => ['file', $outputPath, 'w'], 2 => ['file', $errorPath, 'w']];
            $process = proc_open($command, $descriptors, $pipes, __DIR__, null, ['bypass_shell' => true, 'create_no_window' => true]);
            if (!is_resource($process)) {
                throw new RuntimeException('Не удалось запустить обработку PHP-кода.');
            }
            $offset = 0;
            while ($offset < strlen($input)) {
                $written = fwrite($pipes[0], substr($input, $offset, 65536));
                if ($written === false || $written === 0) {
                    throw new RuntimeException('Не удалось передать код на обработку.');
                }
                $offset += $written;
            }
            fclose($pipes[0]);
            unset($pipes[0]);
            $deadline = microtime(true) + $seconds;
            do {
                $state = proc_get_status($process);
                if (!$state['running']) {
                    break;
                }
                if (microtime(true) > $deadline) {
                    proc_terminate($process);
                    throw new RuntimeException('Обработка заняла слишком много времени. Попробуйте меньший фрагмент.');
                }
                clearstatcache(true, $outputPath);
                clearstatcache(true, $errorPath);
                if (filesize($outputPath) + filesize($errorPath) > $outputLimit) {
                    proc_terminate($process);
                    throw new RuntimeException('Результат слишком большой. Попробуйте меньший фрагмент.');
                }
                usleep(25000);
            } while (true);
            $stdout = file_get_contents($outputPath);
            $stderr = file_get_contents($errorPath);
            if ($stdout === false || $stderr === false
                || strlen($stdout) + strlen($stderr) > $outputLimit) {
                throw new RuntimeException('Не удалось прочитать результат обработки кода.');
            }
            return ['stdout' => $stdout, 'stderr' => $stderr, 'exitCode' => $state['exitcode']];
        } finally {
            foreach ($pipes as $pipe) {
                if (is_resource($pipe)) {
                    fclose($pipe);
                }
            }
            if (is_resource($process)) {
                $state = proc_get_status($process);
                if ($state['running']) {
                    proc_terminate($process);
                }
                proc_close($process);
            }
            foreach ([$outputPath, $errorPath] as $path) {
                if (is_string($path) && is_file($path)) {
                    unlink($path);
                }
            }
        }
    }
}
