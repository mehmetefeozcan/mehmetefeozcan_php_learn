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
            'viseNote' => 100, // :D
            'finalNote' => 100, // :D
            'reviewNote' => 100, // :D
            'successNote' => 100, // :D
            'letterNote' => 'AA', // :D
            'status' => 'Geçti', // :D
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

    $viseNote = (int) $_POST['viseNote'] ?? 0;
    $finalNote = (int) $_POST['finalNote'] ?? 0;
    $reviewNote = (int) $_POST['reviewNote'] ?? 0;
    $successNote = $viseNote * 0.4 + $finalNote * 0.5 + $reviewNote * 0.1;

    $letterNote = 'AA';
    if ($successNote > 88) {
        $letterNote = 'AA';
    } elseif ($successNote > 80) {
        $letterNote = 'BA';
    } elseif ($successNote > 73) {
        $letterNote = 'BB';
    } elseif ($successNote > 66) {
        $letterNote = 'CB';
    } elseif ($successNote > 60) {
        $letterNote = 'CC';
    } elseif ($successNote > 55) {
        $letterNote = 'DC';
    } elseif ($successNote > 50) {
        $letterNote = 'DD';
    } elseif ($successNote > 0) {
        $letterNote = 'FF';
    } else {
        $letterNote = 'FD';
    }

    $_SESSION['exams'][] = [
        'id' => $ids ? max($ids) + 1 : 1,
        'lesson' => trim($_POST['lesson'] ?? ''),
        'student' => trim($_POST['student'] ?? ''),
        'viseNote' => $viseNote,
        'finalNote' => $finalNote,
        'reviewNote' => $reviewNote,
        'successNote' => $successNote,
        'letterNote' => $letterNote,
        'status' => $finalNote > 50 && $successNote > 50 ? 'Geçti' : 'Kaldı',
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