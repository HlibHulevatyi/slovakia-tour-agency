<?php
declare(strict_types=1);

namespace App\Models;

// FAQ
final class Faq extends Model
{
    protected static string $table = 'faq';

    public static function all(string $orderBy = 'sort_order ASC, id ASC'): array
    {
        return parent::all($orderBy);
    }
}
