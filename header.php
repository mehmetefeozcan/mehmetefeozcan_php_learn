<?php
$activePage ??= '';
$base = '/mehmetefeozcan';
$menu = [
    'home' => ['label' => 'Ana Sayfa', 'href' => "$base/"],
    'classprogram' => ['label' => 'Ders Programı', 'href' => "$base/classprogram/"],
];
?>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://hayef.iuc.edu.tr/tr/_" target="_blank">
            <img src="<?= $base ?>/public/hayef_logo.png" alt="HAYEF logo" width="72" height="72">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center text-lg-start" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center align-items-lg-start">
                <?php foreach ($menu as $key => $item): ?>
                    <?php $isActive = $activePage === $key; ?>
                    <li class="nav-item">
                        <a class="nav-link<?= $isActive ? ' active' : '' ?>" <?= $isActive ? 'aria-current="page"' : '' ?>
                            href="<?= htmlspecialchars($item['href']) ?>">
                            <?= htmlspecialchars($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <button type="button" class="btn btn-light login-btn mt-2 mt-lg-0"
                onclick="location.href='/mehmetefeozcan/login/'">
                Giriş Yap
            </button>
        </div>
    </div>
</nav>