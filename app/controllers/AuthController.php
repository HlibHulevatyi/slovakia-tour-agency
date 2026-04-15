<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Models\User;

// login + logout
final class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->view('admin/login', ['title' => 'Prihlásenie', 'error' => null]);
    }

    public function login(): void
    {
        $username = trim((string)($_POST['username'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        // CSRF
        if (!Auth::checkCsrf($_POST['csrf'] ?? null)) {
            $this->view('admin/login', ['title' => 'Prihlásenie', 'error' => 'Neplatný CSRF token.']);
            return;
        }

        // meno + bcrypt heslo
        $user = User::findByUsername($username);
        if (!$user || !User::verifyPassword($password, $user['password_hash'])) {
            $this->view('admin/login', ['title' => 'Prihlásenie', 'error' => 'Nesprávne meno alebo heslo.']);
            return;
        }

        Auth::login((int)$user['id'], $user['username']);
        $this->redirect('/admin');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/admin/login');
    }
}
