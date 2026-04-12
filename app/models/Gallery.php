<?php
declare(strict_types=1);

namespace App\Models;

// fotky
final class Gallery extends Model
{
    protected static string $table = 'gallery';

    // sort podľa poradia
    public static function all(string $orderBy = 'sort_order ASC, id ASC'): array
    {
        return parent::all($orderBy);
    }
}
