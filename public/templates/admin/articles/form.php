<?php
// formulár - create + edit
use App\Core\Auth;

$csrf   = Auth::csrfToken();
$isEdit = !empty($article['id']);
$action = $isEdit
    ? $baseUrl . '/admin/articles/' . (int)$article['id'] . '/edit'
    : $baseUrl . '/admin/articles/create';
?>
<h1><?= $isEdit ? 'Úprava článku' : 'Nový článok' ?></h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="<?= $action ?>" style="max-width:800px">
    <input type="hidden" name="csrf" value="<?= $csrf ?>">
    <div class="mb-3">
        <label class="form-label">Názov</label>
        <input class="form-control" name="title" required
               value="<?= htmlspecialchars($article['title'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Slug (nepovinný, doplní sa automaticky)</label>
        <input class="form-control" name="slug"
               value="<?= htmlspecialchars($article['slug'] ?? '') ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Perex</label>
        <textarea class="form-control" name="perex" rows="2" required><?= htmlspecialchars($article['perex'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Obsah</label>
        <textarea class="form-control" name="content" rows="8" required><?= htmlspecialchars($article['content'] ?? '') ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Obrázok (názov súboru v <code>public/assets/img/</code>)</label>
        <input class="form-control" name="image"
               value="<?= htmlspecialchars($article['image'] ?? '') ?>">
    </div>
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="pub" name="is_published" value="1"
            <?= ($article['is_published'] ?? 1) ? 'checked' : '' ?>>
        <label for="pub" class="form-check-label">Publikované</label>
    </div>
    <button class="btn btn-primary">Uložiť</button>
    <a class="btn btn-secondary" href="<?= $baseUrl ?>/admin/articles">Späť</a>
</form>
