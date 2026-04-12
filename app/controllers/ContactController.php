<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

// kontaktný formulár
final class ContactController extends Controller
{
    public function show(): void
    {
        $this->view('contact', ['title' => 'Kontakt', 'errors' => [], 'old' => []]);
    }

    public function send(): void
    {
        $name    = trim((string)($_POST['name'] ?? ''));
        $email   = trim((string)($_POST['email'] ?? ''));
        $message = trim((string)($_POST['message'] ?? ''));

        // validácia
        $errors = [];
        if ($name === '')    { $errors[] = 'Meno je povinné.'; }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = 'Neplatný e-mail.'; }
        if (mb_strlen($message) < 5) { $errors[] = 'Správa je príliš krátka.'; }

        // chyba - znova formulár s vyplnenými hodnotami
        if ($errors) {
            $this->view('contact', [
                'title'  => 'Kontakt',
                'errors' => $errors,
                'old'    => compact('name', 'email', 'message'),
            ]);
            return;
        }

        Contact::create(compact('name', 'email', 'message'));
        $this->redirect('/dakujeme');
    }

    public function thanks(): void
    {
        $this->view('thanks', ['title' => 'Ďakujeme']);
    }
}
