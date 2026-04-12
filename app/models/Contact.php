<?php
declare(strict_types=1);

namespace App\Models;

// správy z kontaktu
final class Contact extends Model
{
    protected static string $table = 'contacts';

    public static function create(array $data): int
    {
        $stmt = self::db()->prepare(
            'INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)'
        );
        $stmt->execute([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'message' => $data['message'],
        ]);
        return (int) self::db()->lastInsertId();
    }
}
