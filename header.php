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
        <a class="navbar-brand" href="<?= $base ?>/">
            <img src="<?= $base ?>/public/hayef_logo.png" alt="HAYEF logo" width="72" height="72">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Desktop Header -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav col-10">
                <?php foreach ($menu as $key => $item): ?>
                    <?php $isActive = $activePage === $key; ?>
                    <li class="nav-item">
                        <a class="nav-link<?= $isActive ? ' active' : '' ?>" <?= $isActive ? 'aria-current="page"' : '' ?>
                            href="
                        <?= htmlspecialchars($item['href']) ?>">
                            <?= htmlspecialchars($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn btn-light col-2" onclick="location.href='/mehmetefeozcan/login/'">
                Giriş Yap
            </button>
        </div>



    </div>
</nav>