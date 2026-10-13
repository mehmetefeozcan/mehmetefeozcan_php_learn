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
            <div class="row justify-content-end">
                <div class="col-2 ">
                    <a href="../classprogram/create.php" class="btn btn-primary w-100 text-white">
                        Ders Ekle
                    </a>
                </div>
            </div>

            <table class="table table-striped text-secondary mt-4">
                <thead>
                    <tr>
                        <th>Ders Kodu</th>
                        <th>Ders Adı</th>
                        <th>Dersi Veren</th>
                        <th>Ders Günü</th>
                        <th>Ders Saati</th>
                        <th></th>
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
                        <td>
                            <button type="button" class="btn  btn-primary" data-bs-toggle="modal"
                                data-bs-target="#lessonDetailModal" data-bs-course-name="Web Tabanlı Programlama">
                                Detay
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td> <a href="https://ebs.iuc.edu.tr/home/izlence/?id=uNT0BSZFixo%3d&bid=LItQcsKWwWc%3d"
                                target="_blank" class="text-black">
                                Eğitimde Modelleme ve Tasarım
                            </a>
                        </td>
                        <td>Öğr. Gör. Dr. Doğan Aydın</td>
                        <td>Pazartesi</td>
                        <td>13.00-16.00</td>
                        <td><button type="button" class="btn  btn-primary" data-bs-toggle="modal"
                                data-bs-target="#lessonDetailModal"
                                data-bs-course-name="Eğitimde Modelleme ve Tasarım">Detay</button></td>
                    </tr>
                    <tr>
                        <td>#3</td>
                        <td><a href="https://ebs.iuc.edu.tr/home/izlence/?id=%2bYJbaGe0niw%3d&bid=LItQcsKWwWc%3d"
                                target="_blank" class="text-black">Eğitimde Yapay Zeka Uygulamaları</a></td>
                        <td>Doç. Dr. Özgür Yılmaz</td>
                        <td>Pazartesi</td>
                        <td>11.30-13.00</td>
                        <td><button type="button" class="btn  btn-primary" data-bs-toggle="modal"
                                data-bs-target="#lessonDetailModal"
                                data-bs-course-name="Eğitimde Yapay Zeka Uygulamaları">Detay</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="lessonDetailModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="lessonModalTitle"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the
                    librarian at St Bride Printing Library in London, took a 1914 Cicero translation and scrambled it to
                    make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to
                    these sheets and more recently with desktop publishing software like Aldus PageMaker and Microsoft
                    Word including versions of Lorem Ipsum.
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
</body>
<script>
    const dersModal = document.getElementById('lessonDetailModal');
    if (dersModal) {
        dersModal.addEventListener('show.bs.modal', event => {
            // Modalı açan butonu yakalıyoruz
            const button = event.relatedTarget;
            // Butondaki data-bs-course-name değerini alıyoruz
            const courseName = button.getAttribute('data-bs-course-name');

            // Modal içindeki güçlü (strong) etiketi bulup ders adını yazdırıyoruz
            const modalBodyTitle = dersModal.querySelector('#lessonModalTitle');
            modalBodyTitle.textContent = courseName;
        });
    }

</script>

</html>