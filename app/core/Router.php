<?php
declare(strict_types=1);

namespace App\Core;

// URL -> kontrolér
final class Router
{
    private array $routes = ['GET' => [], 'POST' => []];

    public function get(string $path, array|callable $handler): void
    {
        $this->routes['GET'][$this->normalize($path)] = $handler;
    }

    public function post(string $path, array|callable $handler): void
    {
        $this->routes['POST'][$this->normalize($path)] = $handler;
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = $this->normalize(parse_url($uri, PHP_URL_PATH) ?? '/');

        // exact match
        if (isset($this->routes[$method][$path])) {
            $this->invoke($this->routes[$method][$path], []);
            return;
        }
        // routy s parametrami {slug}, {id}
        foreach ($this->routes[$method] as $route => $handler) {
            $pattern = '#^' . preg_replace('#\{([a-zA-Z_]+)\}#', '(?P<$1>[^/]+)', $route) . '$#';
            if (preg_match($pattern, $path, $m)) {
                $params = array_filter($m, 'is_string', ARRAY_FILTER_USE_KEY);
                $this->invoke($handler, $params);
                return;
            }
        }

        http_response_code(404);
        echo '<h1>404 - Stránka nenájdená</h1>';
    }

    private function invoke(array|callable $handler, array $params): void
    {
        // číselné parametre castneme na int
        $args = array_map(
            static fn($v) => is_string($v) && ctype_digit($v) ? (int)$v : $v,
            array_values($params)
        );

        if (is_array($handler)) {
            [$class, $method] = $handler;
            $controller = new $class();
            $controller->$method(...$args);
            return;
        }
        $handler(...$args);
    }

    // /blog/ == /blog
    private function normalize(string $path): string
    {
        $path = '/' . trim($path, '/');
        return $path === '/' ? '/' : rtrim($path, '/');
    }
}
