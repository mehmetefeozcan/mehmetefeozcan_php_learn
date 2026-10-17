<?php
require_once __DIR__ . "/store.php";

$pageTitle = "Dersler";
$pagePath = "/lessons/index.php";

$tableItems = getLessons();
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
            <div class="col-auto">
                <a class="btn btn-primary btn-sm" href="create.php" role="button">Yeni Ders Oluştur</a>
            </div>
        </div>
        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Kod</th>
                    <th scope="col">Ders Adı</th>
                    <th scope="col">Dersi Veren</th>
                    <th scope="col">Kredi</th>
                    <th scope="col">Ders Günü</th>
                    <th scope="col">Ders Saati</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableItems as $item): ?>
                    <tr>
                        <td scope="row" class="align-middle text-start">#<?= $item['id'] ?> </td>
                        <td scope="row" class="align-middle text-start"><?= $item['code'] ?> </td>
                        <td scope="row" class="align-middle text-start"><?= $item['title'] ?> </td>
                        <td scope="row" class="align-middle text-start"><?= $item['academicStaff'] ?> </td>
                        <td scope="row" class="align-middle text-start"><?= $item['credit'] ?> </td>
                        <td scope="row" class="align-middle text-start"><?= $item['classDay'] ?> </td>
                        <td scope="row" class="align-middle text-start"><?= $item['classTime'] ?> </td>
                        <td scope="row" class="align-middle text-start">
                            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#lessonInfoModal" data-bs-title="<?= htmlspecialchars($item['title']) ?>"
                                data-bs-staff="<?= htmlspecialchars($item['academicStaff']) ?>"
                                data-bs-day="<?= htmlspecialchars($item['classDay']) ?>"
                                data-bs-time="<?= htmlspecialchars($item['classTime']) ?>"
                                data-bs-detail="<?= htmlspecialchars($item['detail']) ?>">
                                Detaylar
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?php include_once COMPONENTS_PATH . "/modal/lesson_info_modal.php" ?>

</body>
<?php include_once "../config/script_config.php" ?>

<script>
    var infoModal = document.getElementById('lessonInfoModal');
    infoModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var title = button.getAttribute('data-bs-title');
        var staff = button.getAttribute('data-bs-staff');
        var day = button.getAttribute('data-bs-day');
        var time = button.getAttribute('data-bs-time');
        var detail = button.getAttribute('data-bs-detail');

        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalStaff').textContent = staff;
        document.getElementById('modalDay').textContent = day;
        document.getElementById('modalTime').textContent = time;
        document.getElementById('modalDetail').textContent = detail;
    });
</script>

</html>