<?php // zoznam článkov ?>
<h1 class="mb-2">Blog</h1>
<p class="lead text-muted">
    Tipy na výlety, sprievodcovia po pamiatkach a inšpirácie pre Vašu dovolenku.
</p>

<?php if (empty($articles)): ?>
    <p class="text-muted">Zatiaľ žiadne články.</p>
<?php endif; ?>

<div class="row g-4">
    <?php foreach ($articles as $a):
        $img = image_url($a['image'] ?? null, $baseUrl); ?>
        <div class="col-md-6">
            <article class="card h-100 shadow-sm">
                <?php if ($img): ?>
                    <img src="<?= $img ?>" class="card-img-top" style="height:220px;object-fit:cover;" alt="">
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                    <h3 class="h5"><?= htmlspecialchars($a['title']) ?></h3>
                    <small class="text-muted mb-2"><?= htmlspecialchars($a['created_at']) ?></small>
                    <p class="flex-grow-1"><?= htmlspecialchars($a['perex']) ?></p>
                    <a href="<?= $baseUrl ?>/blog/<?= htmlspecialchars($a['slug']) ?>"
                       class="btn btn-outline-primary btn-sm align-self-start">Čítať celý článok</a>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>
