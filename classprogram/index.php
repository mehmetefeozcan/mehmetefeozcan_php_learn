<?php $activePage = 'classprogram'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ders Programı</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <?php include __DIR__ . '/../header.php'; ?>

    <div class="container pt-4">
        <h1>BÖTE Ders Programı</h1>
        <div class="container p-4 mt-4 rounded bg-body-tertiary">
            <table class="table table-striped text-secondary">
                <thead>
                    <tr>
                        <th>Ders Kodu</th>
                        <th>Ders Adı</th>
                        <th>Dersi Veren</th>
                        <th>Ders Günü</th>
                        <th>Ders Saati</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#1</td>
                        <td><a href="https://ebs.iuc.edu.tr/home/izlence/?id=l%2bfCmVf1BQM%3d&bid=LItQcsKWwWc%3d"
                                target="_blank" class="text-black">Web Tabanlı Programlama</a></td>
                        <td>İrfan Şimşek</td>
                        <td>Salı</td>
                        <td>13.45-16.45</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td> <a href="https://ebs.iuc.edu.tr/home/izlence/?id=uNT0BSZFixo%3d&bid=LItQcsKWwWc%3d"
                                target="_blank" class="text-black">Eğitimde Modelleme ve Tasarım</a></td>
                        <td>Doğan Aydın</td>
                        <td>Pazartesi</td>
                        <td>13.00-16.00</td>
                    </tr>
                    <tr>
                        <td>#3</td>
                        <td><a href="https://ebs.iuc.edu.tr/home/izlence/?id=%2bYJbaGe0niw%3d&bid=LItQcsKWwWc%3d"
                                target="_blank" class="text-black">Eğitimde Yapay Zeka Uygulamaları</a></td>
                        <td>Özgür Yılmaz</td>
                        <td>Pazartesi</td>
                        <td>11.30-13.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>