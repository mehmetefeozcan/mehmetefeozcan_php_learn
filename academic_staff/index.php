<?php
include_once __DIR__ . "/store.php";

$pageTitle = "Öğretim Elemanları";
$pagePath = "/academic_staff/index.php";


$tableItems = getAcademicStaff();
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
                <a class="btn btn-primary btn-sm rounded-2" href="create.php" role="button"> Öğretim Elemanı Ekle</a>
            </div>
        </div>
        <table class="table table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Sicil No</th>
                    <th scope="col">Ad</th>
                    <th scope="col">Soyad</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableItems as $i): ?>
                    <tr>
                        <td scope="row" class="align-middle text-start">#
                            <?= htmlspecialchars($i['id']) ?>
                        </td>
                        <td scope="row" class="align-middle text-start">
                            <?= htmlspecialchars($i['registirationNo']) ?>
                        </td>
                        <td scope="row" class="align-middle text-start">
                            <?= htmlspecialchars($i['name']) ?>
                        </td>
                        <td scope="row" class="align-middle text-start">
                            <?= htmlspecialchars($i['surname']) ?>
                        </td>
                        <td scope="row" class="align-middle text-start">
                            <?= htmlspecialchars($i['email']) ?>
                        </td>
                        <td scope="row" class="align-middle text-start row gap-2">
                            <form action="store.php" method="POST" class="col p-0"
                                onsubmit="return confirm('Bu öğretim elemanını silmek istediğinize emin misiniz?');">
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
    <?php include_once "../config/script_config.php" ?>
</body>

</html>