<?php // galéria ?>
<h1>Galéria</h1>
<p class="lead text-muted">Pozrite si fotografie z miest, kam Vás vezmeme.</p>

<?php if (empty($images)): ?>
    <p class="text-muted">Zatiaľ žiadne fotografie.</p>
<?php endif; ?>

<div class="row g-3">
    <?php foreach ($images as $img):
        $url = image_url($img['image'] ?? null, $baseUrl);
        if (!$url) continue; ?>
        <div class="col-6 col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="<?= $url ?>" class="card-img-top"
                     style="height:220px;object-fit:cover;"
                     alt="<?= htmlspecialchars($img['title']) ?>">
                <div class="card-body p-3">
                    <h6 class="mb-1"><?= htmlspecialchars($img['title']) ?></h6>
                    <?php if (!empty($img['description'])): ?>
                        <small class="text-muted"><?= htmlspecialchars($img['description']) ?></small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
