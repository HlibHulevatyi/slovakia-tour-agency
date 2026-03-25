<?php
declare(strict_types=1);

// URL k obrázku ak existuje, inak null
function image_url(?string $filename, string $baseUrl): ?string
{
    if (!$filename) {
        return null;
    }
    $dir = dirname(__DIR__) . '/public/assets/img/';

    if (is_file($dir . $filename)) {
        return $baseUrl . '/assets/img/' . rawurlencode($filename);
    }

    // bez prípony - skúsime bežné
    if (!pathinfo($filename, PATHINFO_EXTENSION)) {
        foreach (['jpg', 'jpeg', 'png', 'webp', 'gif'] as $ext) {
            $candidate = $filename . '.' . $ext;
            if (is_file($dir . $candidate)) {
                return $baseUrl . '/assets/img/' . rawurlencode($candidate);
            }
        }
    }

    return null;
}
