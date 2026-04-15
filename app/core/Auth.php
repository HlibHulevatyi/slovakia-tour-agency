<?php
declare(strict_types=1);

namespace App\Core;

// sessions + bcrypt heslá + CSRF
final class Auth
{
    public static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login(int $userId, string $username): void
    {
        self::start();
        // nový session ID - ochrana proti session fixation
        session_regenerate_id(true);
        $_SESSION['user'] = ['id' => $userId, 'username' => $username];
    }

    public static function logout(): void
    {
        self::start();
        $_SESSION = [];
        session_destroy();
    }

    public static function check(): bool
    {
        self::start();
        return isset($_SESSION['user']);
    }

    public static function user(): ?array
    {
        self::start();
        return $_SESSION['user'] ?? null;
    }

    // guard - neprihláseného presmeruje na login
    public static function requireLogin(string $redirectTo = '/admin/login'): void
    {
        if (!self::check()) {
            $config = require dirname(__DIR__, 2) . '/config/config.php';
            header('Location: ' . $config['app']['base_url'] . $redirectTo);
            exit;
        }
    }

    // 32 bajtov náhodný token v session
    public static function csrfToken(): string
    {
        self::start();
        if (empty($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf'];
    }

    // hash_equals - timing-safe porovnanie
    public static function checkCsrf(?string $token): bool
    {
        self::start();
        return is_string($token) && isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $token);
    }
}
