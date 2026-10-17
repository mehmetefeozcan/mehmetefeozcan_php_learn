<?php
$pageTitle = "Yeni Ders Oluştur";
$pagePath = "/lessons/index.php";

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
        <h3>
            <?php echo $pageTitle ?>
        </h3>
        <div class="mt-4">
            <label for="lessonNameInput" class="form-label">Ders Adı</label>
            <input type="text" class="form-control" id="lessonNameInput" placeholder="Ders adı giriniz">
        </div>
        <div class="mt-4">
            <label for="lessonCreditInput" class="form-label">Ders Kredisi</label>
            <input type="number" class="form-control" id="lessonCreditInput" placeholder="Ders kredisi giriniz">
        </div>
        <div class="mt-4">
            <label for="lessonStaffInput" class="form-label">Öğretim Üyesi</label>
            <select class="form-select" aria-label="Öğretim üyesi seçiniz" id="lessonStaffInput" class="form-control">
                <option selected disabled>Öğretim üyesi seçiniz</option>
                <?php foreach ($academicStaffList as $staff): ?>
                    <option value="<?= $staff['name'] ?>"><?= $staff['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mt-4 row gap-2">
            <span class="col-auto">
                <label for="classDayInput" class="form-label">Ders Günü</label>
                <select class="form-select" aria-label="Ders günü seçiniz" id="classDayInput" class="form-control">
                    <option selected disabled>Ders günü seçiniz</option>
                    <?php foreach ($dayList as $day): ?>
                        <option value="<?= $day['name'] ?>">
                            <?= $day['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </span>
            <span class="col-auto">
                <label for="classStartTimeInput" class="form-label">Dersin Başlangıç Saati</label>
                <select class="form-select" aria-label="Dersin başlangıç saatini seçiniz" id="classStartTimeInput"
                    class="form-control">
                    <option selected disabled>Saat seçiniz</option>
                    <?php foreach ($timeList as $time): ?>
                        <option value="<?= $time ?>">
                            <?= $time ?>
                        </option>
                    <?php endforeach ?>

                </select>
            </span>
            <span class="col-auto">
                <label for="classDurationInput" class="form-label">Ders Süresi</label>
                <select class="form-select" aria-label="Ders süresi seçiniz" id="classDurationInput"
                    class="form-control">
                    <option selected disabled>Saat seçiniz</option>
                    <?php foreach ($durationList as $duration): ?>
                        <option value="<?= $duration ?>">
                            <?= $duration ?> dk
                        </option>
                    <?php endforeach ?>
                </select>
            </span>
            <span class="col">
                <label for="lessonDetailLink" class="form-label">EBS Linki</label>
                <input type="text" class="form-control" id="lessonDetailLink" placeholder="Link giriniz">
            </span>
        </div>

        <div class="mt-4">
            <label for="lessonDetailInput" class="form-label">Ders Detayları</label>
            <textarea class="form-control" id="lessonDetailInput" placeholder="Ders detayları giriniz"
                class="form-control" rows="5"></textarea>
        </div>
        <div class="row justify-content-end mt-4">
            <div class="col-auto">
                <a class="btn btn-success" href="create.php" role="button">Yeni Ders Oluştur</a>
            </div>
        </div>

    </div>
</body>
<?php include_once "../config/script_config.php" ?>

</html>