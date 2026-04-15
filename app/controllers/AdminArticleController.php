<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Models\Article;

// CRUD nad článkami v admine
final class AdminArticleController extends Controller
{
    // guard pred každou akciou
    public function __construct()
    {
        Auth::requireLogin();
    }

    public function index(): void
    {
        $this->view('admin/articles/index', [
            'title'    => 'Správa článkov',
            'articles' => Article::all(),
        ]);
    }

    public function create(): void
    {
        $this->view('admin/articles/form', [
            'title'   => 'Nový článok',
            'article' => null,
            'errors'  => [],
        ]);
    }

    public function store(): void
    {
        if (!Auth::checkCsrf($_POST['csrf'] ?? null)) {
            http_response_code(400);
            echo 'CSRF';
            return;
        }
        $data = $this->collect();
        $errors = $this->validate($data);
        if ($errors) {
            $this->view('admin/articles/form', [
                'title'   => 'Nový článok',
                'article' => $data,
                'errors'  => $errors,
            ]);
            return;
        }
        $data['author_id'] = Auth::user()['id'];
        // slug zo title ak prázdny
        if (empty($data['slug'])) {
            $data['slug'] = Article::slugify($data['title']);
        }
        Article::create($data);
        $this->redirect('/admin/articles');
    }

    public function edit(int $id): void
    {
        $article = Article::find($id);
        if (!$article) { http_response_code(404); return; }
        $this->view('admin/articles/form', [
            'title'   => 'Úprava článku',
            'article' => $article,
            'errors'  => [],
        ]);
    }

    public function update(int $id): void
    {
        if (!Auth::checkCsrf($_POST['csrf'] ?? null)) {
            http_response_code(400); echo 'CSRF'; return;
        }
        if (!Article::find($id)) { http_response_code(404); return; }

        $data = $this->collect();
        $errors = $this->validate($data);
        if ($errors) {
            $data['id'] = $id;
            $this->view('admin/articles/form', [
                'title'   => 'Úprava článku',
                'article' => $data,
                'errors'  => $errors,
            ]);
            return;
        }
        if (empty($data['slug'])) {
            $data['slug'] = Article::slugify($data['title']);
        }
        Article::update($id, $data);
        $this->redirect('/admin/articles');
    }

    // delete cez POST kvôli CSRF
    public function destroy(int $id): void
    {
        if (!Auth::checkCsrf($_POST['csrf'] ?? null)) {
            http_response_code(400); echo 'CSRF'; return;
        }
        Article::delete($id);
        $this->redirect('/admin/articles');
    }

    private function collect(): array
    {
        return [
            'title'        => trim((string)($_POST['title'] ?? '')),
            'slug'         => trim((string)($_POST['slug'] ?? '')),
            'perex'        => trim((string)($_POST['perex'] ?? '')),
            'content'      => trim((string)($_POST['content'] ?? '')),
            'image'        => trim((string)($_POST['image'] ?? '')),
            'is_published' => isset($_POST['is_published']) ? 1 : 0,
        ];
    }

    private function validate(array $d): array
    {
        $errors = [];
        if (mb_strlen($d['title']) < 3)   { $errors[] = 'Názov musí mať aspoň 3 znaky.'; }
        if (mb_strlen($d['perex']) < 10)  { $errors[] = 'Perex musí mať aspoň 10 znakov.'; }
        if (mb_strlen($d['content']) < 20){ $errors[] = 'Obsah je príliš krátky.'; }
        return $errors;
    }
}
