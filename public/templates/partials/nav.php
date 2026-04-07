<?php // navigácia ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= $baseUrl ?>/">🏔️ <?= htmlspecialchars($appName) ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/">Domov</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/o-nas">O nás</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/galeria">Galéria</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/kontakt">Kontakt</a></li>
                <?php if (\App\Core\Auth::check()): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/admin">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/admin/logout">Odhlásiť</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $baseUrl ?>/admin/login">Prihlásiť</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
