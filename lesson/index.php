<?php
require_once __DIR__ . "/store.php";

$pageTitle = "Dersler";
$pagePath = "/lesson/index.php";

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
                <a class="btn btn-primary btn-sm rounded-2" href="create.php" role="button">Yeni Ders Oluştur</a>
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
                <?php foreach ($tableItems as $i): ?>
                    <tr>
                        <td scope="row" class="align-middle text-start">#<?= htmlspecialchars($i['id']) ?> </td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($i['code']) ?> </td>
                        <td scope="row" class="align-middle text-start"><a href="<?= $i['link'] ?>" target="_blank"
                                class="text-black">
                                <?= htmlspecialchars($i['title']) ?>
                            </a></td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($i['academicStaff']) ?>
                        </td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($i['credit']) ?> </td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($i['classDay']) ?> </td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($i['classTime']) ?> </td>
                        <td scope="row" class="align-middle text-start row gap-2">
                            <button type="button" class="btn btn-secondary btn-sm col" data-bs-toggle="modal"
                                data-bs-target="#lessonInfoModal" data-bs-title="<?= htmlspecialchars($i['title']) ?>"
                                data-bs-staff="<?= htmlspecialchars($i['academicStaff']) ?>"
                                data-bs-day="<?= htmlspecialchars($i['classDay']) ?>"
                                data-bs-time="<?= htmlspecialchars($i['classTime']) ?>"
                                data-bs-detail="<?= htmlspecialchars($i['detail']) ?>"
                                data-bs-link="<?= htmlspecialchars($i['link']) ?>">
                                Detaylar
                            </button>

                            <form action="store.php" method="POST" class="col p-0"
                                onsubmit="return confirm('Bu dersi silmek istediğinize emin misiniz?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($i['id']) ?>">
                                <button type="submit" class="btn btn-danger btn-sm w-100">Sil</button>
                            </form>
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
        var link = button.getAttribute('data-bs-link');

        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalStaff').textContent = staff;
        document.getElementById('modalDay').textContent = day;
        document.getElementById('modalTime').textContent = time;
        document.getElementById('modalDetail').textContent = detail;
        document.getElementById('modalLink').href = link;

        console.log(document.getElementById('modalLink'));

    });
</script>

</html>