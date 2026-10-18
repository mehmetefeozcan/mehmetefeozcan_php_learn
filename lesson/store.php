<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['lessons'])) {
    $_SESSION['lessons'] = [
        [
            "id" => 1,
            "code" => "AEBO3002",
            "title" => "Web Tabanlı Programlama",
            "link" => "https://ebs.iuc.edu.tr/home/izlence/?id=l%2bfCmVf1BQM%3d&bid=LItQcsKWwWc%3d",
            "academicStaff" => "Prof. Dr. İrfan Şimşek",
            "classDay" => "Salı",
            "classTime" => "13.45-16.45",
            "detail" => "Internet üzerinde kullanılan programlama dilleri, Internet programlama istemci sunucu mimariye giriş, Web sunucusu kurulumu, programlama diline ayarları, Internet programlama için kullanılan editörler ve program geliştirme ortamları, Programlamaya giriş, değişkenler, sabitler, diziler, programlamda kullanılan fonksiyonlar, (karakter, sayısal, mantıksal, tarih vb.), program akış kontrol deyimleri (if, switch, case vb.) ve kullanımı, program döngü deyimleri ve kullanımı (dowhile, for, loop vb.), sunucu ve ortam değişkenleri ve kullanımı, internet programlamada çerez kavramı ve kullanım alanları, internet üzerinden HTTP istek ve cevaplarının gönderilmesi, internet üzerinden veritabanına bağlanmak ve işlemler gerçekleştirmek, veri tabanında bulunan bilgilerin listelenmesi, sıralanması, değiştirilmesi, eğitim amaçlı dinamik bir internet uygulamasının geliştirilmesi.",
            "credit" => 3
        ],
        [
            "id" => 2,
            "code" => "AEBO3001",
            "title" => "Eğitimde Modelleme ve Tasarım",
            "link" => "https://ebs.iuc.edu.tr/home/izlence/?id=uNT0BSZFixo%3d&bid=LItQcsKWwWc%3d",
            "academicStaff" => "Öğr. Gör. Dr. Doğan Aydın",
            "classDay" => "Pazartesi",
            "classTime" => "13.00-16.00",
            "detail" => "Üç boyutlu modelleme ve animasyon teknikleri ve yöntemleri. Vektör sistemi içinde üçüncü boyut. Doku, ışık, kamera ve hareket.",
            "credit" => 3
        ],
        [
            "id" => 3,
            "code" => "AESEBO04",
            "title" => "Eğitimde Yapay Zeka Uygulamaları",
            "link" => "https://ebs.iuc.edu.tr/home/izlence/?id=%2bYJbaGe0niw%3d&bid=LItQcsKWwWc%3d",
            "academicStaff" => "Doç. Dr. Özgür Yılmaz",
            "classDay" => "Pazartesi",
            "classTime" => "11.30-13.00",
            "detail" => "Zekâ ve özellikleri; yapay zekânın tarihçesi, güncel durumu ve uygulama alanları; uzman sistemler; uzman sistemlerin kullanım alanları, bileşenleri, özellikleri, tasarımı; uzman sistemlerin eğitimde kullanımı; zeki öğrenme sistemleri; eğitimde büyük veri; öğrenme analitikleri; eğitsel ajan; uyarlanabilir öğrenme ve uyarlanabilir ölçme; mantıksal programlamada program geliştirme.",
            "credit" => 2
        ]
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    deleteLesson((int) $_POST['id']);

    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids = $ids ? array_column($_SESSION['lessons'], 'id') : [];

    $_SESSION['lessons'][] = [
        'id' => $ids ? max($ids) + 1 : 1,
        'code' => trim($_POST['lessonCode'] ?? ''),
        'title' => trim($_POST['lessonName'] ?? ''),
        'link' => trim($_POST['lessonDetailLink'] ?? ''),
        'academicStaff' => trim($_POST['lessonStaff'] ?? ''),
        'classDay' => trim($_POST['classDay'] ?? ''),
        'classTime' => trim($_POST['classStartTime'] ?? ''),
        'detail' => trim($_POST['lessonDetail'] ?? ''),
        'credit' => (int) ($_POST['lessonCredit'] ?? 0),
    ];

    header("Location: index.php");
    exit;
}

function getLessons(): array
{
    return $_SESSION['lessons'] ?? [];
}

function deleteLesson(int $id): void
{
    $_SESSION['lessons'] = array_values(array_filter(
        $_SESSION['lessons'],
        fn($lesson) => $lesson['id'] !== $id
    ));
}
?>