<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Show Data</title>
    <?php include('../layout/style.php'); ?>
</head>
<body class="sb-nav-fixed">
    <?php include('../layout/header.php'); ?>

    <div id="layoutSidenav">
        <?php include('../layout/navigation.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Show Data</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Show Data</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class='fas fa-table me-1'></i>
                            Student Data Table
                        </div>
                        <div class='card-body'>
                            <?php
                            if (isset($_GET['status'])) {
                                if ($_GET['status'] == 'deleted') {
                                    echo "<div id='success-message' class='alert alert-success'>Student data deleted successfully.</div>";
                                    echo "<script>setTimeout(function() { window.location.href = 'showdata.php'; }, 2000);</script>";
                                } elseif ($_GET['status'] == 'notfound') {
                                    echo "<div class='alert alert-danger'>Student data not found.</div>";
                                } elseif ($_GET['status'] == 'updated') {
                                    echo "<div id='success-message' class='alert alert-success'>Student data updated successfully.</div>";
                                    echo "<script>setTimeout(function() { window.location.href = 'showdata.php'; }, 2000);</script>";
                                }
                            }
                            ?>
                            <table id='datatablesSimple'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>College</th>
                                        <th>Course</th>
                                        <th>Campus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['students']) && count($_SESSION['students']) > 0) {
                                        foreach ($_SESSION['students'] as $index => $student) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($student['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['age']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['gender']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['college']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['course']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['campus']) . "</td>";
                                            echo "<td><a href='editdata.php?student_id=$index' class='btn btn-warning btn-sm'>Edit</a> ";
                                            echo "<a href='deletedata.php?student_id=$index' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this student?\");'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No data available.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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