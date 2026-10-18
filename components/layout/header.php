<?php
$menuList = [
    ["id" => 1, "name" => "Ana Sayfa", "route" => "/index.php"],
    ["id" => 2, "name" => "Dersler", "route" => "/lessons/index.php"],
    ["id" => 3, "name" => "Öğrenci", "route" => "/student/index.php"],
    ["id" => 3, "name" => "Öğretim Elemanı", "route" => "/academic_staff/index.php"],
];

$pagePath ??= "";
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://hayef.iuc.edu.tr/" target="_blank">
            <img src="<?= PUBLIC_IMAGES_URL ?>/hayef_logo.png" alt="Hayef Logo" id="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <?php foreach ($menuList as $item): ?>
                    <li class="nav-item ">
                        <a class="nav-link <?= $pagePath == $item['route'] ? 'active' : '' ?>"
                            href="<?= BASE_URL . $item['route']; ?>">
                            <?= $item['name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <form class="d-flex">
                <button class="btn btn-primary" type="button">Giriş yap</button>
            </form>
        </div>
    </div>
</nav>

<style>
    #logo {
        max-width: 64px;
        height: auto;
    }
</style>