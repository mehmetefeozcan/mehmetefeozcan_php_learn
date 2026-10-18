<?php
require_once __DIR__ . "/store.php";

$pageTitle = "Öğrenciler";
$pagePath = "/student/index.php";


$tableItems = getStudents();
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
                <a class="btn btn-primary btn-sm rounded-2" href="create.php" role="button">Yeni Öğrenci Oluştur</a>
            </div>
        </div>

        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Okul NO</th>
                    <th scope="col">Ad</th>
                    <th scope="col">Soyad</th>
                    <th scope="col">Bölüm </th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableItems as $item): ?>
                    <tr>
                        <td scope="row" class="align-middle text-start">#<?= htmlspecialchars($item['id']) ?></td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($item['schoolNo']) ?></td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($item['name']) ?></td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($item['surname']) ?></td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($item['departmant']) ?></td>
                        <td scope="row" class="align-middle text-start">
                            <?= htmlspecialchars($item['phone']) ?>
                        </td>
                        <td scope="row" class="align-middle text-start"><?= htmlspecialchars($item['email']) ?></td>
                        <td scope="row" class="align-middle text-start row gap-2">
                            <form action="store.php" method="post" class="col p-0"
                                onsubmit="return confirm('Bu öğrenciyi silmek istediğinize emin misiniz?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Sil</button>

                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
<?php include_once "../config/script_config.php" ?>

</html>