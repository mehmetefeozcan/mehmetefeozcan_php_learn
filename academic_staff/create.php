<?php
include_once __DIR__ . "/store.php";

$pageTitle = "Öğretim Elemanı Ekle";
$pagePath = "/academic_staff_legacy/index.php";

$staffCount = 1;

if (isset($_GET["staffCount"])) {
    $staffCount = intval($_GET["staffCount"]);
    if ($staffCount < 1)
        $staffCount = 1;
}
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
        <div class="w-25">
            <form action="" method="GET">
                <label for="staffCount" class="form-label">Öğretim Elemanı Sayısı</label>
                <select class="form-control col" id="staffCount" name="staffCount" required
                    onchange="this.form.submit()">
                    <option value="1" <?= $staffCount == 1 ? 'selected' : '' ?>>1</option>
                    <option value="2" <?= $staffCount == 2 ? 'selected' : '' ?>>2</option>
                    <option value="3" <?= $staffCount == 3 ? 'selected' : '' ?>>3</option>
                </select>
            </form>
        </div>

        <form action="store.php" method="post" class="mt-4 d-flex gap-4 row">
            <?php for ($x = 1; $x <= $staffCount; $x++): ?>
                <div class="container rounded-4 bg-white p-4">
                    <p> <?= $x ?>. </p>
                    <div class="row gap-2">
                        <div class="col">
                            <label for="registirationNo_<?= $x ?>" class="form-label">Sicil No</label>
                            <input type="text" inputmode="numeric" class="form-control" id="regististrationNo_<?= $x ?>"
                                name="registirationNo[]" placeholder="Sicil no giriniz" required>
                        </div>
                        <span class="col">
                            <label for="email_<?= $x ?>" class="form-label">E-Posta</label>
                            <input type="email" class="form-control" id="email_<?= $x ?>" name="email[]"
                                placeholder="E-Posta giriniz" required>
                        </span>
                    </div>
                    <div class="row mt-4 gap-2">
                        <span class="col">
                            <label for="name_<?= $x ?>" class="form-label">Ad</label>
                            <input type="text" class="form-control" id="name_<?= $x ?>" name="name[]"
                                placeholder="Ad giriniz" required>
                        </span>
                        <span class="col">
                            <label for="surname_<?= $x ?>" class="form-label">Soyad</label>
                            <input type="text" class="form-control" id="surname_<?= $x ?>" name="surname[]"
                                placeholder="Soyad giriniz" required>
                        </span>
                    </div>
                </div>
            <?php endfor ?>
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