<?php
declare(strict_types=1);

namespace App\Models;

// komentáre pod článkami
final class Comment extends Model
{
    protected static string $table = 'comments';

    public static function forArticle(int $articleId): array
    {
        $stmt = self::db()->prepare(
            'SELECT * FROM comments WHERE article_id = :a ORDER BY created_at DESC'
        );
        $stmt->execute(['a' => $articleId]);
        return $stmt->fetchAll();
    }

    public static function add(int $articleId, string $author, string $body): int
    {
        $stmt = self::db()->prepare(
            'INSERT INTO comments (article_id, author_name, body) VALUES (:a, :n, :b)'
        );
        $stmt->execute(['a' => $articleId, 'n' => $author, 'b' => $body]);
        return (int) self::db()->lastInsertId();
    }
}
