<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

// base model - spoločné CRUD metódy
abstract class Model
{
    // názov tabuľky doplní potomok
    protected static string $table = '';

    protected static function db(): PDO
    {
        return Database::connection();
    }

    public static function all(string $orderBy = 'id DESC'): array
    {
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY ' . $orderBy;
        return self::db()->query($sql)->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = self::db()->prepare('SELECT * FROM ' . static::$table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public static function delete(int $id): bool
    {
        $stmt = self::db()->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
