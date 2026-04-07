<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;
use App\Models\Comment;

// blog
final class BlogController extends Controller
{
    public function index(): void
    {
        $this->view('blog/index', [
            'title'    => 'Blog',
            'articles' => Article::published(50),
        ]);
    }

    public function show(string $slug): void
    {
        $article = Article::findBySlug($slug);
        if (!$article) {
            http_response_code(404);
            $this->view('errors/404', ['title' => 'Nenájdené']);
            return;
        }

        // 3 podobné články
        $related = array_values(array_filter(
            Article::published(6),
            fn($a) => (int)$a['id'] !== (int)$article['id']
        ));
        $related = array_slice($related, 0, 3);

        $this->view('blog/show', [
            'title'    => $article['title'],
            'article'  => $article,
            'comments' => Comment::forArticle((int)$article['id']),
            'related'  => $related,
        ]);
    }

    public function comment(string $slug): void
    {
        $article = Article::findBySlug($slug);
        if (!$article) {
            http_response_code(404);
            return;
        }
        $author = trim((string)($_POST['author_name'] ?? ''));
        $body   = trim((string)($_POST['body'] ?? ''));
        if ($author !== '' && $body !== '') {
            Comment::add((int)$article['id'], mb_substr($author, 0, 80), $body);
        }
        $this->redirect('/blog/' . $slug . '#comments');
    }
}
