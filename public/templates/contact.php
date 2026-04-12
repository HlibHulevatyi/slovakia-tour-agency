<?php // kontakt ?>
<h1 class="mb-4">Kontakt</h1>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 bg-light h-100">
            <div class="card-body text-center">
                <div style="font-size:2.5rem">📍</div>
                <h5 class="mt-2">Adresa</h5>
                <p class="mb-0 text-muted">
                    Trieda Andreja Hlinku 1<br>
                    949 74 Nitra<br>
                    Slovenská republika
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 bg-light h-100">
            <div class="card-body text-center">
                <div style="font-size:2.5rem">📞</div>
                <h5 class="mt-2">Telefón &amp; e-mail</h5>
                <p class="mb-0 text-muted">
                    +421 952 123 456<br>
                    <a href="mailto:info@slovakia-tour.sk">info@slovakia-tour.sk</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 bg-light h-100">
            <div class="card-body text-center">
                <div style="font-size:2.5rem">🕒</div>
                <h5 class="mt-2">Otváracie hodiny</h5>
                <p class="mb-0 text-muted">
                    Po – Pi: 9:00 – 17:00<br>
                    So: 9:00 – 12:00<br>
                    Ne: zatvorené
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-7">
        <h3>Napíšte nám</h3>
        <p class="text-muted">Ozveme sa Vám do 24 hodín v pracovných dňoch.</p>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= $baseUrl ?>/kontakt" class="row g-3">
            <div class="col-12">
                <label class="form-label">Meno a priezvisko</label>
                <input class="form-control" name="name" required maxlength="100"
                       value="<?= htmlspecialchars($old['name'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" required maxlength="150"
                       value="<?= htmlspecialchars($old['email'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Vaša správa</label>
                <textarea class="form-control" name="message" rows="6" required minlength="5"><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary">Odoslať správu</button>
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <h3>Kde nás nájdete</h3>
        <div class="ratio ratio-4x3 rounded overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5045.987706495174!2d18.08654575316289!3d48.307917211634546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1suk!2ssk!4v1778616575541!5m2!1suk!2ssk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <small class="text-muted">Nitra, mapa © Google maps</small>
    </div>
</div>
