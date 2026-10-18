<?php
$pageTitle = "Hoşgeldiniz";
$pagePath = "/index.php";
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include_once "./config/head_config.php" ?>
</head>

<body>
    <?php include_once COMPONENTS_PATH . "/layout/header.php" ?>

    <div class="container mt-4 d-grid gap-4">
        <h1>Hoşgeldiniz</h1>

        <div class="container rounded-4 p-4 bg-light ">
            <h4>Dersler</h4>
            <p>Dersleri görüntülemek ve yönetmek için <a href="<?= BASE_URL ?>/lesson/index.php">tıklayınız.</a></p>
        </div>
        <div class="container rounded-4 p-4 bg-light ">
            <h4>Öğrenci</h4>
            <p>Öğrencileri görüntülemek ve yönetmek için <a href="<?= BASE_URL ?>/student/index.php">tıklayınız.</a></p>
        </div>
        <div class="container rounded-4 p-4 bg-light ">
            <h4>Öğretim Elemanı</h4>
            <p>Öğretim elemanlarını ve yönetmek için <a href="<?= BASE_URL ?>/academic_staff/index.php">tıklayınız.</a>
            </p>
        </div>
        <div class="container rounded-4 p-4 bg-light ">
            <h4>Sınavlar</h4>
            <p>Sınavları görüntülemek ve yönetmek için <a href="<?= BASE_URL ?>/exam/index.php">tıklayınız.</a></p>
        </div>
    </div>
</body>
<?php include_once "./config/script_config.php" ?>

</html>