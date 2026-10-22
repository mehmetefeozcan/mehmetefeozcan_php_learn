<?php
include_once __DIR__ . "/store.php";
include_once dirname(__DIR__) . "/lesson/store.php";
include_once dirname(__DIR__) . "/student/store.php";

$pageTitle = "Sınav Sonuçları";
$pagePath = "/exam_legacy/index.php";


$lessons = getLessons();
$students = getStudents();
?>


<!DOCTYPE html>
<html lang="tr">

<head>

    <?php include_once '../config/head_config.php' ?>
</head>

<body>
    <?php include_once COMPONENTS_PATH . '/layout/header.php' ?>
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
                    <label for="lesson" class="form-label">Ders</label>
                    <select class="form-select" aria-label="Ders seçiniz" id="lesson" name="lesson" required>
                        <option value="">Ders seçiniz</option>
                        <?php foreach ($lessons as $i): ?>
                            <option value="<?= $i['title'] ?>">
                                <?= $i['title'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <span class="col">
                    <label for="student" class="form-label">Öğrenci</label>
                    <select class="form-select" aria-label="Öğrenci seçiniz" id="student" name="student" required>
                        <option value="">Öğrenci seçiniz</option>
                        <?php foreach ($students as $i): ?>
                            <option value="<?= $i['name'] ?>">
                                <?= $i['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </span>
            </div>
            <div class="row mt-4 gap-2">
                <span class="col">
                    <label for="note" class="form-label">Vize Notu</label>
                    <input type="number" class="form-control" id="note" name="note" placeholder="Vize Notu giriniz"
                        required>
                </span>
                <span class="col">
                    <label for="note" class="form-label">Final Notu</label>
                    <input type="number" class="form-control" id="note" name="note" placeholder="Final Notu giriniz"
                        required>
                </span>
                <span class="col">
                    <label for="note" class="form-label">Değerlendirme Notu</label>
                    <input type="number" class="form-control" id="note" name="note"
                        placeholder="Değerlendirme Notu giriniz" required>
                </span>
            </div>
            <div class="row justify-content-end mt-4">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
            </div>
        </form>
    </div>
    <?php include_once '../config/script_config.php' ?>
</body>

</html>