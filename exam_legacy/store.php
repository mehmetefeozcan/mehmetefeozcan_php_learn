<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['exams'])) {
    $_SESSION['exams'] = [
        [
            'id' => 1,
            'lesson' => "Web Tabanlı Programlama",
            'student' => "Mehmet Efe Özcan",
            'examType' => 'Vize',
            'note' => 100, // :D
        ]
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete') {
    deleteExam((int) $_POST['id']);

    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids = array_column($_SESSION['exams'] ?? [], 'id');

    $_SESSION['exams'][] = [
        'id' => $ids ? max($ids) + 1 : 1,
        'lesson' => trim($_POST['lesson'] ?? ''),
        'student' => trim($_POST['student'] ?? ''),
        'examType' => trim($_POST['examType'] ?? ''),
        'note' => trim($_POST['note'] ?? 0)
    ];

    header('Location: index.php');
    exit;
}


function getExams(): array
{
    return $_SESSION['exams'] ?? [];
}

function deleteExam(int $id): void
{

    $_SESSION['exams'] = array_values(array_filter(
        $_SESSION['exams'],
        fn($exam) => $exam['id'] !== $id
    ));
}
?>