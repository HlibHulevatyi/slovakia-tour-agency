<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;

// home + O nás
final class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home', [
            'title'        => 'Domov',
            'latest'       => Article::published(3),
            'services'     => Service::all(),
            'testimonials' => Testimonial::latest(3),
        ]);
    }

    public function about(): void
    {
        $this->view('about', [
            'title'    => 'O nás',
            'services' => Service::all(),
            'faqs'     => Faq::all(),
        ]);
    }
}
