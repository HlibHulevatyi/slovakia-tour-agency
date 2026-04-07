<?php // O nás ?>
<section class="mb-5">
    <h1 class="display-5 fw-bold">O agentúre Slovakia Tour</h1>
    <p class="lead">
        Sme cestovná agentúra so sídlom v Bratislave, ktorá sa od roku 2015
        špecializuje na domáci cestovný ruch po krásach Slovenska.
    </p>
</section>

<section class="mb-5">
    <h2>Naša misia</h2>
    <p>
        Veríme, že Slovensko patrí medzi krajiny s najbohatším prírodným
        a kultúrnym dedičstvom v Európe. Vysoké Tatry, hrady ako Spišský či
        Oravský, kúpele Piešťany alebo tradičná drevená architektúra –
        to všetko sú poklady, ktoré sa oplatí ukázať svetu.
    </p>
    <p>
        Našou misiou je organizovať autentické zájazdy s rodenými sprievodcami,
        ktorí poznajú nielen pamiatky, ale aj príbehy, miestnu kuchyňu a kultúru.
    </p>
</section>

<section class="mb-5">
    <h2>V číslach</h2>
    <div class="row g-4 text-center">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3">
                <div class="display-4 fw-bold text-primary">10+</div>
                <div class="text-muted">rokov skúseností</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3">
                <div class="display-4 fw-bold text-primary">5 000+</div>
                <div class="text-muted">spokojných klientov</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3">
                <div class="display-4 fw-bold text-primary">40+</div>
                <div class="text-muted">destinácií</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm p-3">
                <div class="display-4 fw-bold text-primary">12</div>
                <div class="text-muted">sprievodcov</div>
            </div>
        </div>
    </div>
</section>

<section class="mb-5">
    <h2 class="mb-4">Čo ponúkame</h2>
    <div class="row g-4">
        <?php foreach ($services as $s): ?>
            <div class="col-md-6">
                <div class="d-flex">
                    <div class="me-3" style="font-size:2.5rem"><?= htmlspecialchars($s['icon']) ?></div>
                    <div>
                        <h5 class="mb-1"><?= htmlspecialchars($s['title']) ?></h5>
                        <p class="text-muted mb-0"><?= htmlspecialchars($s['description']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php if (!empty($faqs)): ?>
<section class="mb-5">
    <h2 class="mb-4">Často kladené otázky</h2>
    <div class="accordion" id="faqAcc">
        <?php foreach ($faqs as $i => $f): ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button <?= $i === 0 ? '' : 'collapsed' ?>" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq<?= $i ?>">
                        <?= htmlspecialchars($f['question']) ?>
                    </button>
                </h2>
                <div id="faq<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>"
                     data-bs-parent="#faqAcc">
                    <div class="accordion-body"><?= nl2br(htmlspecialchars($f['answer'])) ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<section class="text-center bg-light p-4 rounded">
    <h3>Pridajte sa k nám</h3>
    <p class="text-muted">Vyplňte kontaktný formulár a my sa ozveme do 24 hodín.</p>
    <a href="<?= $baseUrl ?>/kontakt" class="btn btn-primary">Kontakt</a>
</section>
