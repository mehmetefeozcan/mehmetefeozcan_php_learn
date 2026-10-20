<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number1 = (int) $_POST['number1'];
    $number2 = (int) $_POST['number2'];
    $processType = $_POST['processType'];


    switch ($processType) {
        case 'addition':
            echo '' . $number1 + $number2 . '';
            break;
        case 'division':
            echo '' . $number1 / $number2 . '';
            break;
        case 'subtraction':
            echo '' . $number1 - $number2 . '';
            break;
        case 'multiply':
            echo '' . $number1 * $number2 . '';
            break;

    }

    exit;
}

$processTypes = ["addition" => "Topla", "division" => "Bölme", "subtraction" => "Çıkarma", "multiply" => "Çarpma"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ÇerÇöp İşler</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-4 rounded-4 p-4 bg-light d-flex justify-content-center">
        <form action="index.php" method="post" class="d-flex flex-column row-gap-3 mb-3 w-25">
            <div class="d-flex gap-4 justify-content-center">
                <h4 class="col-auto">Sayı 1:</h4>
                <input type="number" class="col-auto form-control" name="number1">
            </div>
            <div class="d-flex gap-4 justify-content-center">
                <h4 class="col-auto">Sayı 2:</h4>
                <input type="number" class="col-auto form-control" name="number2">
            </div>
            <div class="d-flex gap-4 justify-content-center">
                <h4 class="col-auto">İşlem Türü</h4>
                <select name="processType" id="processType" class="form-select col-auto ">
                    <option selected disabled>işlem Türü Seçin</option>
                    <?php foreach ($processTypes as $key => $value): ?>
                        <option value="<?= $key ?>"><?= $value ?> </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-secondary">Hesapla</button>
            </div>
        </form>
    </div>
</body>

</html>