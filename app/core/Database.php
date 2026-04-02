<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

// singleton PDO - 1 connection per request
final class Database
{
    private static ?PDO $pdo = null;

    public static function connection(): PDO
    {
        if (self::$pdo instanceof PDO) {
            return self::$pdo;
        }

        $config = require dirname(__DIR__, 2) . '/config/config.php';
        $db = $config['db'];

        $dsn = sprintf(
            'mysql:host=%s;port=%d;dbname=%s;charset=%s',
            $db['host'], $db['port'], $db['name'], $db['charset']
        );

        try {
            self::$pdo = new PDO($dsn, $db['user'], $db['pass'], [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false, // real prepared statements
            ]);
        } catch (PDOException $e) {
            throw new RuntimeException('DB error: ' . $e->getMessage(), 0, $e);
        }

        return self::$pdo;
    }

    // singleton - zakážeme new + clone
    private function __construct() {}
    private function __clone() {}
}
