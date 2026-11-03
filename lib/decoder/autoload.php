<?php
// Minimal PSR-4 autoloader for the vendored nikic/php-parser (v5.9.0).
spl_autoload_register(function ($class) {
    $prefix = 'PhpParser\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }
    $rel = str_replace('\\', '/', substr($class, strlen($prefix)));
    $file = __DIR__ . '/vendor/php-parser5/lib/PhpParser/' . $rel . '.php';
    if (is_file($file)) {
        require $file;
    }
});
