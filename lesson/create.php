<?php
$pageTitle = "Yeni Ders Oluştur";
$pagePath = "/lesson/index.php";

$academicStaffList = [
    ["id" => 1, "name" => "Prof. Dr. İrfan Şimşek"],
    ["id" => 2, "name" => "Öğr. Gör. Dr. Doğan Aydın"],
    ["id" => 3, "name" => "Doç. Dr. Özgür Yılmaz"]
];

$dayList = [
    ["id" => 1, "name" => "Pazartesi"],
    ["id" => 2, "name" => "Salı"],
    ["id" => 3, "name" => "Çarşamba"],
    ["id" => 4, "name" => "Perşembe"],
    ["id" => 5, "name" => "Cuma"]
];

$timeList = [
    "09:00",
    "09:30",
    "10:00",
    "10:30",
    "11:00",
    "11:30",
    "12:00",
    "12:30",
    "13:00",
    "13:30",
    "14:00",
    "14:30",
    "15:00",
    "15:30",
    "16:00",
    "16:30"
];

$durationList = [
    "60",
    "90",
    "120",
    "150",
    "180"
];
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
        <form action="store.php" method="POST">
            <div class="mt-4">
                <label for="lessonCode" class="form-label">Ders Kodu</label>
                <input type="text" class="form-control" id="lessonCode" name="lessonCode"
                    placeholder="Ders kodu giriniz" required>
            </div>
            <div class="mt-4">
                <label for="lessonName" class="form-label">Ders Adı</label>
                <input type="text" class="form-control" id="lessonName" name="lessonName" placeholder="Ders adı giriniz"
                    required>
            </div>
            <div class="mt-4">
                <label for="lessonCredit" class="form-label">Ders Kredisi</label>
                <input type="number" class="form-control" id="lessonCredit" name="lessonCredit"
                    placeholder="Ders kredisi giriniz" required>
            </div>
            <div class="mt-4">
                <label for="lessonStaff" class="form-label">Öğretim Üyesi</label>
                <select class="form-select" aria-label="Öğretim üyesi seçiniz" id="lessonStaff" name="lessonStaff"
                    required>
                    <option value="">Öğretim üyesi seçiniz</option>
                    <?php foreach ($academicStaffList as $i): ?>
                        <option value="<?= $i['name'] ?>">
                            <?= $i['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="mt-4 row gap-2">
                <span class="col-auto">
                    <label for="classDay" class="form-label">Ders Günü</label>
                    <select class="form-select" aria-label="Ders günü seçiniz" id="classDay" name="classDay" required>
                        <option value="">Ders günü seçiniz</option>
                        <?php foreach ($dayList as $i): ?>
                            <option value="<?= $i['name'] ?>">
                                <?= $i['name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </span>
                <span class="col-auto">
                    <label for="classStartTime" class="form-label">Dersin Başlangıç Saati</label>
                    <select class="form-select" aria-label="Dersin başlangıç saatini seçiniz" id="classStartTime"
                        name="classStartTime" required>
                        <option value="">Saat seçiniz</option>
                        <?php foreach ($timeList as $i): ?>
                            <option value="<?= $i ?>">
                                <?= $i ?>
                            </option>
                        <?php endforeach ?>

                    </select>
                </span>
                <span class="col-auto">
                    <label for="classDuration" class="form-label">Ders Süresi</label>
                    <select class="form-select" aria-label="Ders süresi seçiniz" id="classDuration" name="classDuration"
                        required>
                        <option value="">Saat seçiniz</option>
                        <?php foreach ($durationList as $i): ?>
                            <option value="<?= $i ?>">
                                <?= $i ?> dk
                            </option>
                        <?php endforeach ?>
                    </select>
                </span>
                <span class="col">
                    <label for="lessonDetailLink" class="form-label">EBS Linki</label>
                    <input type="text" class="form-control" id="lessonDetailLink" name="lessonDetailLink"
                        placeholder="Link giriniz">
                </span>
            </div>

            <div class="mt-4">
                <label for="lessonDetail" class="form-label">Ders Detayları</label>
                <textarea class="form-control" id="lessonDetail" name="lessonDetail"
                    placeholder="Ders detayları giriniz" rows="5"></textarea>
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