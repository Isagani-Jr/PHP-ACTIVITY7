<?php
session_start();

// Check if the student_id is set in the URL
if (!isset($_GET['student_id']) || !isset($_SESSION['students'][$_GET['student_id']])) {
    header("Location: showdata.php");
    exit();
}

// Get the student data for editing
$student_id = $_GET['student_id'];
$student = $_SESSION['students'][$student_id];

// Handle form submission for updating student data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update student data from form input
    $_SESSION['students'][$student_id]['name'] = $_POST['name'];
    $_SESSION['students'][$student_id]['age'] = $_POST['age'];
    $_SESSION['students'][$student_id]['gender'] = $_POST['gender'];
    $_SESSION['students'][$student_id]['college'] = $_POST['college'];
    $_SESSION['students'][$student_id]['course'] = $_POST['course'];
    $_SESSION['students'][$student_id]['campus'] = $_POST['campus'];

    // Redirect back to showdata.php with a success message
    header("Location: showdata.php?status=updated");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit Student Data</title>
    <?php include('../layout/style.php'); ?>
</head>
<body class="sb-nav-fixed">
    <?php include('../layout/header.php'); ?>

    <div id="layoutSidenav">
        <?php include('../layout/navigation.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Student Data</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-edit me-1"></i>
                            Edit Student Information
                        </div>
                        <div class="card-body">
                            <!-- Form for editing student data -->
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($student['name']); ?>" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age:</label>
                                            <input type="number" id="age" name="age" class="form-control" value="<?php echo htmlspecialchars($student['age']); ?>" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender:</label>
                                            <select id="gender" name="gender" class="form-select" required>
                                                <option value="Male" <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                                <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                                <option value="Other" <?php if ($student['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="college" class="form-label">College:</label>
                                            <input type="text" id="college" name="college" class="form-control" value="<?php echo htmlspecialchars($student['college']); ?>" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="course" class="form-label">Course:</label>
                                            <input type="text" id="course" name="course" class="form-control" value="<?php echo htmlspecialchars($student['course']); ?>" required />
                                        </div>

                                        <div class="mb-3">
                                            <label for="campus" class="form-label">Campus:</label>
                                            <select id="campus" name="campus" class="form-select" required>
                                                <?php 
                                                $campuses = ['Boac Campus', 'Santa Cruz Campus', 'Torrijos Campus', 'Gasan Campus'];
                                                foreach ($campuses as $campus) {
                                                    $selected = ($campus == $student['campus']) ? 'selected' : '';
                                                    echo "<option value='$campus' $selected>$campus</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class='btn btn-primary'>Update Student</button>

                            </form>

                        </div> <!-- End card-body -->
                    </div> <!-- End card -->
                </div> <!-- End container-fluid -->
            </main>
            <?php include('../layout/footer.php'); ?>
        </div> <!-- End layoutSidenav_content -->
    </div> <!-- End layoutSidenav -->

    <?php include('../layout/script.php'); ?>
</body>
</html>