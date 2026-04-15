<?php
// admin: zoznam článkov
use App\Core\Auth;

$csrf = Auth::csrfToken();
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Správa článkov</h1>
    <a class="btn btn-success" href="<?= $baseUrl ?>/admin/articles/create">+ Nový článok</a>
</div>

<table class="table table-striped align-middle">
    <thead>
    <tr><th>ID</th><th>Názov</th><th>Slug</th><th>Publikovaný</th><th>Vytvorený</th><th></th></tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $a): ?>
        <tr>
            <td><?= (int)$a['id'] ?></td>
            <td><?= htmlspecialchars($a['title']) ?></td>
            <td><code><?= htmlspecialchars($a['slug']) ?></code></td>
            <td><?= $a['is_published'] ? '✅' : '❌' ?></td>
            <td><?= htmlspecialchars($a['created_at']) ?></td>
            <td class="text-end">
                <a class="btn btn-sm btn-primary" href="<?= $baseUrl ?>/admin/articles/<?= (int)$a['id'] ?>/edit">Upraviť</a>
                <form method="post" action="<?= $baseUrl ?>/admin/articles/<?= (int)$a['id'] ?>/delete"
                      class="d-inline" onsubmit="return confirm('Naozaj zmazať?')">
                    <input type="hidden" name="csrf" value="<?= $csrf ?>">
                    <button class="btn btn-sm btn-danger">Zmazať</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
