<?php // pätka ?>
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5>🏔️ <?= htmlspecialchars($appName) ?></h5>
                <p class="small text-white-50 mb-0">
                    Cestovná agentúra so zameraním na turistiku
                    a kultúrne pamiatky Slovenska.
                </p>
            </div>
            <div class="col-md-4">
                <h6>Navigácia</h6>
                <ul class="list-unstyled small">
                    <li><a class="text-white-50 text-decoration-none" href="<?= $baseUrl ?>/">Domov</a></li>
                    <li><a class="text-white-50 text-decoration-none" href="<?= $baseUrl ?>/o-nas">O nás</a></li>
                    <li><a class="text-white-50 text-decoration-none" href="<?= $baseUrl ?>/blog">Blog</a></li>
                    <li><a class="text-white-50 text-decoration-none" href="<?= $baseUrl ?>/galeria">Galéria</a></li>
                    <li><a class="text-white-50 text-decoration-none" href="<?= $baseUrl ?>/kontakt">Kontakt</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6>Kontakt</h6>
                <p class="small text-white-50 mb-1">📍 Trieda Andreja Hlinku 1, Nitra<br></p>
                <p class="small text-white-50 mb-1">📞 +421 952 123 456</p>
                <p class="small text-white-50 mb-0">✉️ info@slovakia-tour.sk</p>
            </div>
        </div>
        <hr class="text-white-50">
        <div class="text-center small text-white-50">
            &copy; <?= date('Y') ?> <?= htmlspecialchars($appName) ?> – všetky práva vyhradené
        </div>
    </div>
</footer>
