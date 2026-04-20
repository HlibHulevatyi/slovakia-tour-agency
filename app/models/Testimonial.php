<?php
declare(strict_types=1);

namespace App\Models;

// referencie zákazníkov
final class Testimonial extends Model
{
    protected static string $table = 'testimonials';

    public static function latest(int $limit = 6): array
    {
        $stmt = self::db()->prepare(
            'SELECT * FROM testimonials ORDER BY created_at DESC LIMIT :lim'
        );
        $stmt->bindValue(':lim', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
