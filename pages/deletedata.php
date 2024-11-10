<?php
session_start();

// Check if the student_id is set in the URL
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Check if students session exists and if the student ID is valid
    if (isset($_SESSION['students']) && isset($_SESSION['students'][$student_id])) {
        // Remove the student from the session
        unset($_SESSION['students'][$student_id]);

        // Redirect back to showdata.php with a success message
        header("Location: showdata.php?status=deleted");
        exit();
    } else {
        // Redirect back with an error message if student not found
        header("Location: showdata.php?status=notfound");
        exit();
    }
} else {
    // Redirect back if no student ID is provided
    header("Location: showdata.php");
    exit();
}
?>