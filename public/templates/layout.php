<?php // layout ?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <?php require __DIR__ . '/partials/head.php'; ?>
</head>
<body>
    <?php require __DIR__ . '/partials/nav.php'; ?>

    <main class="container mt-5 pt-5">
        <?= $content ?>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
