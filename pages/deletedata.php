<?php
session_start();

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    if (isset($_SESSION['students']) && isset($_SESSION['students'][$student_id])) {
        unset($_SESSION['students'][$student_id]);

        header("Location: showdata.php?status=deleted");
        exit();
    } else {
        header("Location: showdata.php?status=notfound");
        exit();
    }
} else {
    header("Location: showdata.php");
    exit();
}
?>