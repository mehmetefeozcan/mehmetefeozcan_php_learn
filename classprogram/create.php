<?php $activePage = 'classprogram';
$pageTitle = 'Yeni Ders Ekle'; ?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include __DIR__ . '/../head.php'; ?>
</head>



<body>
    <?php include __DIR__ . '/../header.php'; ?>

    <div class="container pt-4">
        <div class="row justify-content-between align-items-center w-100">
            <h1 class="w-auto m-0">
                <?= $pageTitle ?>
            </h1>

            <a href="../classprogram/index.php" class="w-auto btn btn-primary text-white">
                Geri Dön

            </a>
        </div>

        <div class="mt-4 row gap-3">
            <!-- Ders Kodu -->
            <div class="col-12">
                <h4>Ders Kodu</h4>
                <input type="text" class="form-control rounded" id="lessonCode" placeholder="Ders Kodu Giriniz"
                    name="lessonCode">
            </div>
            <!-- Ders Adı -->
            <div class="col-12">
                <h4>Ders Adı</h4>
                <input type="text" class="form-control rounded" id="lessonName" placeholder="Ders Adı Giriniz"
                    name="lessonName">
            </div>
            <!-- Kredi -->
            <div class="col-12">
                <h4>Kredi</h4>
                <input type="number" class="form-control rounded" id="lessonCredit" placeholder="Ders Kredisi Giriniz"
                    name="lessonCredit">
            </div>
            <!-- Öğretim Üyesi -->
            <div class="col-12">
                <h4>Dersin Öğretim Üyesi</h4>

                <select class="form-select rounded">
                    <option selected disabled>Öğretim Üyesi Seçiniz</option>
                    <option>Prof. Dr. İrfan Şimşek</option>
                    <option>Öğr. Gör. Dr. Doğan Aydın</option>
                    <option>Doç. Dr. Özgür Yılmaz</option>
                </select>
            </div>
            <!-- Ders Detayı -->
            <div class="col-12">
                <h4>Dersin Detayları</h4>
                <textarea name="lessonDetails" id="lessonDetails" class="form-control rounded"
                    placeholder="Ders Detayı Giriniz" rows="3"></textarea>

            </div>
            <a href="../classprogram/index.php" class="w-auto btn btn-primary text-white">
                Kaydet

            </a>
        </div>

    </div>
</body>

</html>