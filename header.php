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


        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
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
        </div>

        <div>
            <button type="button" class="btn btn-light" onclick="location.href='/mehmetefeozcan/login/'">
                Giriş Yap
            </button>

        </div>
    </div>
</nav>