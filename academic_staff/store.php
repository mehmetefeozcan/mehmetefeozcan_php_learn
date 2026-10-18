<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["academicStaffs"])) {
    $_SESSION["academicStaffs"] = [
        [
            "id" => 1,
            "registirationNo" => "0001",
            "name" => "a",
            "surname" => "a",
            "email" => "a@a.com",
        ]
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    deleteAcademicStaff((int) $_POST['id']);

    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids = array_column($_SESSION['academicStaffs'], 'id');

    $_SESSION['academicStaffs'][] = [
        "id" => $ids ? max($ids) + 1 : 1,
        "registirationNo" => trim($_POST["registirationNo"] ?? "0000"),
        "name" => trim($_POST["name"] ?? ""),
        "surname" => trim($_POST["surname"] ?? ""),
        "email" => trim($_POST["email"] ?? ""),
    ];



    header('Location: index.php');
    exit;
}


function getAcademicStaff(): array
{
    return $_SESSION['academicStaffs'] ?? [];
}
function deleteAcademicStaff(int $id): void
{
    $_SESSION['academicStaffs'] = array_values(array_filter(
        $_SESSION['academicStaffs'],
        fn($i) => $i['id'] !== $id
    ));
}
?>