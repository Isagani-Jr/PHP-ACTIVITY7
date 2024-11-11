<?php
session_start();

$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($email) && empty($password)) {
        $message = "<div class='alert alert-danger'>Please enter your email and password!</div>";
    } elseif ($email == "pazjr.isagani@marsu.edu.ph" && $password == "Password2023@@") {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo "<script>window.location.href='pages/dashboard.php';</script>";
    } else {
        $message = "<div class='alert alert-danger'>Login Failed!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login PHP FUNCTION</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <?php echo $message; ?>
                                <div class="card-body">
                                    <form action="" method="post" onSubmit= "return confirm('Do you really want to continue?');"> 
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" required />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="#">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="#">Need an account? Sign up!</a></div>
                                </div>
                            </div>

                            <table class= "table table-striped">
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo htmlspecialchars($email); ?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><?php echo htmlspecialchars($password); ?></td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>&middot;<a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

</body>
</html>