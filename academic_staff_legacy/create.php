<?php
include_once __DIR__ . "/store.php";

$pageTitle = "Öğretim Elemanı Ekle";
$pagePath = "/academic_staff_legacy/index.php";
?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include_once "../config/head_config.php" ?>
</head>

<body>
    <?php include_once COMPONENTS_PATH . "/layout/header.php" ?>

    <div class="container p-4 bg-light mt-4 rounded-3">
        <div class="row justify-content-between">
            <span class="col-auto">
                <h3>
                    <?php echo $pageTitle ?>
                </h3>
            </span>
            <span class="col-auto">
                <a href="index.php" class="btn btn-sm btn-light">Geri Dön</a>
            </span>
        </div>
        <form action="store.php" method="post">
            <div class="row mt-4 gap-2">
                <div class="col">
                    <label for="registirationNo" class="form-label">Sicil No</label>
                    <input type="text" inputmode="numeric" class="form-control" id="registirationNo"
                        name="registirationNo" placeholder="Sicil no giriniz" required>
                </div>
                <span class="col">
                    <label for="email" class="form-label">E-Posta</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="E-Posta giriniz"
                        required>
                </span>
            </div>
            <div class="row mt-4 gap-2">
                <span class="col">
                    <label for="name" class="form-label">Ad</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ad giriniz" required>
                </span>
                <span class="col">
                    <label for="surname" class="form-label">Soyad</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Soyad giriniz"
                        required>
                </span>
            </div>
            <div class="row justify-content-end mt-4">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
            </div>
        </form>
    </div>
    <?php include_once "../config/script_config.php" ?>
</body>

</html>