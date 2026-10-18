<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["students"])) {
    $_SESSION["students"] =
        [
            [
                "id" => 1,
                "schoolNo" => "0001",
                "name" => "Mehmet Efe",
                "surname" => "Özcan",
                "departmant" => "Bilgisayar ve Öğretim Teknolohileri Öğretmenliği",
                "phone" => "05519414940",
                "email" => "ozcanmehmetefe@gmail.com",
            ]
        ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    deleteStudent((int) $_POST['id']);

    header("Location: index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids = array_column($_SESSION['students'] ?? [], 'id');

    $_SESSION['students'][] = [
        'id' => $ids ? max($ids) + 1 : 1,
        'schoolNo' => trim($_POST['schoolNo'] ?? 0),
        'name' => trim($_POST['name'] ?? ''),
        'surname' => trim($_POST['surname'] ?? ''),
        'departmant' => trim($_POST['departmant'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
    ];

    header("Location: index.php");
    exit;
}


function getStudents(): array
{
    return $_SESSION["students"] ?? [];
}
function deleteStudent(int $id): void
{
    $_SESSION['students'] = array_values(array_filter(
        $_SESSION['students'],
        fn($student) => $student['id'] !== $id
    ));
}



?>