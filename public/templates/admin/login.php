<?php
// login form
use App\Core\Auth;

$csrf = Auth::csrfToken(); // CSRF
?>
<div class="row justify-content-center">
    <div class="col-md-5">
        <h1 class="mb-4">Prihlásenie</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= $baseUrl ?>/admin/login">
            <input type="hidden" name="csrf" value="<?= $csrf ?>">
            <div class="mb-3">
                <label class="form-label">Meno</label>
                <input class="form-control" name="username" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Heslo</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button class="btn btn-primary w-100">Prihlásiť</button>
        </form>
    </div>
</div>
