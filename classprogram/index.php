<?php $activePage = 'classprogram';
$pageTitle = 'Ders Programı'; ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include __DIR__ . '/../head.php'; ?>
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
                        <td>Prof. Dr. İrfan Şimşek</td>
                        <td>Salı</td>
                        <td>13.45-16.45</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td> <a href="https://ebs.iuc.edu.tr/home/izlence/?id=uNT0BSZFixo%3d&bid=LItQcsKWwWc%3d"
                                target="_blank" class="text-black">Eğitimde Modelleme ve Tasarım</a></td>
                        <td>Öğr. Gör. Dr. Doğan Aydın</td>
                        <td>Pazartesi</td>
                        <td>13.00-16.00</td>
                    </tr>
                    <tr>
                        <td>#3</td>
                        <td><a href="https://ebs.iuc.edu.tr/home/izlence/?id=%2bYJbaGe0niw%3d&bid=LItQcsKWwWc%3d"
                                target="_blank" class="text-black">Eğitimde Yapay Zeka Uygulamaları</a></td>
                        <td>Doç. Dr. Özgür Yılmaz</td>
                        <td>Pazartesi</td>
                        <td>11.30-13.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>