<?php
declare(strict_types=1);

namespace App\Models;

// articles
final class Article extends Model
{
    protected static string $table = 'articles';

    // publikované, najnovšie prvé
    public static function published(int $limit = 100): array
    {
        $stmt = self::db()->prepare(
            'SELECT * FROM articles WHERE is_published = 1 ORDER BY created_at DESC LIMIT :lim'
        );
        $stmt->bindValue(':lim', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function findBySlug(string $slug): ?array
    {
        $stmt = self::db()->prepare('SELECT * FROM articles WHERE slug = :slug LIMIT 1');
        $stmt->execute(['slug' => $slug]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public static function create(array $data): int
    {
        $sql = 'INSERT INTO articles (title, slug, perex, content, image, author_id, is_published)
                VALUES (:title, :slug, :perex, :content, :image, :author_id, :is_published)';
        $stmt = self::db()->prepare($sql);
        $stmt->execute([
            'title'        => $data['title'],
            'slug'         => $data['slug'],
            'perex'        => $data['perex'],
            'content'      => $data['content'],
            'image'        => $data['image'] ?: null,
            'author_id'    => $data['author_id'],
            'is_published' => $data['is_published'] ?? 1,
        ]);
        return (int) self::db()->lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $sql = 'UPDATE articles
                SET title=:title, slug=:slug, perex=:perex, content=:content,
                    image=:image, is_published=:is_published
                WHERE id=:id';
        $stmt = self::db()->prepare($sql);
        return $stmt->execute([
            'id'           => $id,
            'title'        => $data['title'],
            'slug'         => $data['slug'],
            'perex'        => $data['perex'],
            'content'      => $data['content'],
            'image'        => $data['image'] ?: null,
            'is_published' => $data['is_published'] ?? 1,
        ]);
    }

    // "Vysoké Tatry" -> "vysoke-tatry"
    public static function slugify(string $text): string
    {
        $from = ['á','ä','č','ď','é','í','ľ','ĺ','ň','ó','ô','ŕ','š','ť','ú','ý','ž',
                 'Á','Ä','Č','Ď','É','Í','Ľ','Ĺ','Ň','Ó','Ô','Ŕ','Š','Ť','Ú','Ý','Ž'];
        $to   = ['a','a','c','d','e','i','l','l','n','o','o','r','s','t','u','y','z',
                 'a','a','c','d','e','i','l','l','n','o','o','r','s','t','u','y','z'];
        $text = strtolower(str_replace($from, $to, $text));
        $text = preg_replace('~[^a-z0-9]+~', '-', $text) ?? '';
        return trim($text, '-');
    }
}
