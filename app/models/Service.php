<?php
declare(strict_types=1);

namespace App\Models;

// služby
final class Service extends Model
{
    protected static string $table = 'services';

    public static function all(string $orderBy = 'sort_order ASC, id ASC'): array
    {
        return parent::all($orderBy);
    }
}
