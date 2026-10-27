<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    deleteAcademicStaff((int) $_POST['id']);

    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids = array_column($_SESSION['academicStaffs'] ?? [], 'id');
    $maxId = $ids ? max($ids) + 1 : 1;


    $registirationNoList = $_POST['registirationNo'];
    $nameList = $_POST['name'];
    $surnameList = $_POST['surname'];
    $emailList = $_POST['email'];

    $count = count($registirationNoList);

    for ($i = 0; $i < $count; $i++) {
        $_SESSION['academicStaffs'][] = [
            "id" => $maxId,
            "registirationNo" => trim($registirationNoList[$i] ?? "0000"),
            "name" => trim($nameList[$i] ?? ""),
            "surname" => trim($surnameList[$i] ?? ""),
            "email" => trim($emailList[$i] ?? ""),
        ];

        $maxId++;

    }




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