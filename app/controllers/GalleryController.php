<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Gallery;

// galéria
final class GalleryController extends Controller
{
    public function index(): void
    {
        $this->view('gallery', [
            'title'  => 'Galéria',
            'images' => Gallery::all(),
        ]);
    }
}
