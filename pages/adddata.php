<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $campus = $_POST['campus'];
    $college = $_POST['college'];

    $new_student = [
        'name' => $name,
        'age' => $age,
        'gender' => $gender,
        'course' => $course,
        'campus' => $campus,
        'college' => $college
    ];

    if (!isset($_SESSION['students'])) {
        $_SESSION['students'] = [];
    }

    $_SESSION['students'][] = $new_student;

    header("Location: showdata.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Add Data</title>
    <?php include('../layout/style.php'); ?>
</head>
<body class="sb-nav-fixed">
    <?php include('../layout/header.php'); ?>

    <div id="layoutSidenav">
        <?php include('../layout/navigation.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Add Data</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Add New Student</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-plus me-1"></i>
                            Add Student Information
                        </div>
                        <div class="card-body">
                            <form action="adddata.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" id="name" name="name" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age:</label>
                                            <input type="number" id="age" name="age" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender:</label>
                                            <select id="gender" name="gender" class="form-select" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="course" class="form-label">Course:</label>
                                            <input type="text" id="course" name="course" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="campus" class="form-label">Campus:</label>
                                            <select id="campus" name="campus" class="form-select" required>
                                                <option value="Boac Campus">Boac Campus</option>
                                                <option value="Santa Cruz Campus">Santa Cruz Campus</option>
                                                <option value="Torrijos Campus">Torrijos Campus</option>
                                                <option value="Gasan Campus">Gasan Campus</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="college" class="form-label">College of:</label>
                                            <input type="text" id="college" name="college" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Student</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php include('../layout/footer.php'); ?>
        </div>
    </div>

    <?php include('../layout/script.php'); ?>
</body>
</html>
