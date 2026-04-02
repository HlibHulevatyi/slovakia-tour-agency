<?php
declare(strict_types=1);

namespace App\Core;

// base controller
abstract class Controller
{
    // vykreslí view + zabalí do layoutu
    protected function view(string $template, array $data = []): void
    {
        $config  = require dirname(__DIR__, 2) . '/config/config.php';
        $appName = $config['app']['name'];
        $baseUrl = $config['app']['base_url'];

        // $data -> premenné v šablóne
        extract($data, EXTR_SKIP);

        $templatesDir = dirname(__DIR__, 2) . '/public/templates/';
        $viewFile     = $templatesDir . $template . '.php';

        if (!is_file($viewFile)) {
            throw new \RuntimeException("Šablóna nenájdená: $template");
        }

        // výstup šablóny -> $content -> layout
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        require $templatesDir . 'layout.php';
    }

    protected function redirect(string $path): void
    {
        $config = require dirname(__DIR__, 2) . '/config/config.php';
        header('Location: ' . $config['app']['base_url'] . $path);
        exit;
    }

    // escape proti XSS
    protected function e(?string $value): string
    {
        return htmlspecialchars((string)$value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}
