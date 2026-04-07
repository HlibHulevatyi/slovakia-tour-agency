<?php // detail článku ?>
<article class="mb-5">
    <a href="<?= $baseUrl ?>/blog" class="text-decoration-none">← Späť na blog</a>
    <h1 class="mt-2"><?= htmlspecialchars($article['title']) ?></h1>
    <p class="text-muted">
        Publikované <?= htmlspecialchars($article['created_at']) ?>
    </p>
    <?php $img = image_url($article['image'] ?? null, $baseUrl); ?>
    <?php if ($img): ?>
        <img src="<?= $img ?>" class="img-fluid rounded mb-4" alt="">
    <?php endif; ?>
    <p class="lead"><?= htmlspecialchars($article['perex']) ?></p>
    <div class="article-body">
        <?= nl2br(htmlspecialchars($article['content'])) ?>
    </div>
</article>

<?php if (!empty($related)): ?>
<section class="mb-5">
    <h3>Mohlo by Vás zaujímať</h3>
    <div class="row g-3 mt-1">
        <?php foreach ($related as $r):
            $rImg = image_url($r['image'] ?? null, $baseUrl); ?>
            <div class="col-md-4">
                <a href="<?= $baseUrl ?>/blog/<?= htmlspecialchars($r['slug']) ?>" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        <?php if ($rImg): ?>
                            <img src="<?= $rImg ?>" class="card-img-top" style="height:140px;object-fit:cover;" alt="">
                        <?php endif; ?>
                        <div class="card-body p-2">
                            <small class="fw-bold"><?= htmlspecialchars($r['title']) ?></small>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<hr>
<section id="comments" class="mt-4">
    <h3>Komentáre (<?= count($comments) ?>)</h3>

    <?php if (empty($comments)): ?>
        <p class="text-muted">Buďte prvý kto pridá komentár.</p>
    <?php endif; ?>

    <?php foreach ($comments as $c): ?>
        <div class="border rounded p-3 mb-2 bg-light">
            <strong><?= htmlspecialchars($c['author_name']) ?></strong>
            <small class="text-muted">· <?= htmlspecialchars($c['created_at']) ?></small>
            <p class="mb-0 mt-1"><?= nl2br(htmlspecialchars($c['body'])) ?></p>
        </div>
    <?php endforeach; ?>

    <form method="post" action="<?= $baseUrl ?>/blog/<?= htmlspecialchars($article['slug']) ?>/comment" class="mt-3">
        <div class="mb-2">
            <input class="form-control" name="author_name" placeholder="Vaše meno" required maxlength="80">
        </div>
        <div class="mb-2">
            <textarea class="form-control" name="body" placeholder="Váš komentár" required rows="3"></textarea>
        </div>
        <button class="btn btn-primary btn-sm">Pridať komentár</button>
    </form>
</section>
