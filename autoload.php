<?php
declare(strict_types=1);

// globálne helpery
require __DIR__ . '/app/helpers.php';

// App\Core\Database -> app/core/Database.php
spl_autoload_register(static function (string $class): void {
    $prefix  = 'App\\';
    $baseDir = __DIR__ . '/app/';

    if (!str_starts_with($class, $prefix)) {
        return;
    }

    $relative  = substr($class, strlen($prefix));
    $parts     = explode('\\', $relative);
    $className = array_pop($parts);
    $folders   = array_map('strtolower', $parts);
    $path      = $folders ? implode('/', $folders) . '/' : '';

    $file = $baseDir . $path . $className . '.php';
    if (is_file($file)) {
        require $file;
    }
});
