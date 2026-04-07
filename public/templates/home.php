<?php
// domov

// na karusel iba články s obrázkom
$withImages = array_values(array_filter($latest, fn($a) => image_url($a['image'] ?? null, $baseUrl) !== null));
?>
<?php if (!empty($withImages)): ?>
<header id="mainCarousel" class="carousel slide mb-5 rounded shadow-sm" data-bs-ride="carousel">
    <div class="carousel-inner rounded">
        <?php foreach ($withImages as $i => $a): ?>
            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                <img src="<?= image_url($a['image'], $baseUrl) ?>"
                     class="d-block w-100" style="max-height:480px;object-fit:cover;"
                     alt="<?= htmlspecialchars($a['title']) ?>">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5><?= htmlspecialchars($a['title']) ?></h5>
                    <p><?= htmlspecialchars($a['perex']) ?></p>
                    <a href="<?= $baseUrl ?>/blog/<?= htmlspecialchars($a['slug']) ?>"
                       class="btn btn-light btn-sm">Zistiť viac</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</header>
<?php endif; ?>

<section class="text-center mb-5">
    <h1 class="display-5 fw-bold">Objavte krásy Slovenska s nami</h1>
    <p class="lead text-muted">
        Cestovná agentúra Slovakia Tour vás prevedie najkrajšími miestami našej krajiny.
        Tatry, hrady, kúpele aj gastronómia – všetko na jednom mieste.
    </p>
</section>

<section class="mb-5">
    <h2 class="mb-4 text-center">Naše služby</h2>
    <div class="row g-4">
        <?php foreach ($services as $s): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div style="font-size:3rem"><?= htmlspecialchars($s['icon']) ?></div>
                        <h5 class="card-title mt-2"><?= htmlspecialchars($s['title']) ?></h5>
                        <p class="card-text text-muted"><?= htmlspecialchars($s['description']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="mb-5">
    <h2 class="mb-4">Najnovšie články</h2>
    <div class="row g-4">
        <?php foreach ($latest as $a):
            $img = image_url($a['image'] ?? null, $baseUrl); ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <?php if ($img): ?>
                        <img src="<?= $img ?>" class="card-img-top" style="height:200px;object-fit:cover;" alt="">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($a['title']) ?></h5>
                        <p class="card-text text-muted small"><?= htmlspecialchars($a['perex']) ?></p>
                        <a href="<?= $baseUrl ?>/blog/<?= htmlspecialchars($a['slug']) ?>" class="btn btn-primary btn-sm">Čítať viac</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-3">
        <a href="<?= $baseUrl ?>/blog" class="btn btn-outline-primary">Všetky články</a>
    </div>
</section>

<?php if (!empty($testimonials)): ?>
<section class="mb-5 bg-light p-4 rounded">
    <h2 class="mb-4 text-center">Čo o nás hovoria zákazníci</h2>
    <div class="row g-4">
        <?php foreach ($testimonials as $t): ?>
            <div class="col-md-4">
                <blockquote class="blockquote h-100">
                    <p class="fs-6">"<?= htmlspecialchars($t['body']) ?>"</p>
                    <footer class="blockquote-footer mt-2">
                        <?= htmlspecialchars($t['author']) ?>
                        <?php if ($t['city']): ?>, <cite><?= htmlspecialchars($t['city']) ?></cite><?php endif; ?>
                        – <?= str_repeat('★', (int)$t['rating']) ?>
                    </footer>
                </blockquote>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<section class="text-center py-4 mb-3">
    <h3>Máte záujem o zájazd?</h3>
    <p class="text-muted">Napíšte nám a my Vám pripravíme program na mieru.</p>
    <a href="<?= $baseUrl ?>/kontakt" class="btn btn-primary btn-lg">Kontaktovať nás</a>
</section>
