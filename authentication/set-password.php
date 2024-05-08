<?php 
    require('db.php');
    session_start();

    $email = "";
    $flag = 0;

    if(!isset($_SESSION['reset_mail'])) {
        header('location:forgot.php');
    }
    else {
        $email = $_SESSION['reset_mail'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if($pass1 == $pass2) {
            $pass_hash = password_hash($pass1, PASSWORD_BCRYPT);

            $password_query = "UPDATE users SET password = '$pass_hash' WHERE email = '$email'; ";
            mysqli_query($mysql, $password_query);

            $_SESSION['signup'] = 4;
            header('location:login.php');
        }
        else {
            $flag = 1;
        }
    }
?>


<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register | Authentication</title>

        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
            <div class="card w-50 px-5 py-4">
                <h1 class="text-center mb-4 ">Forgot Password</h1>

                <?php 
                    if($flag == 1) {
                        $flag = 2;
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error</strong> conform password doesn't match
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                ?>
                
                <form action="" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <input type="text" name="email" value="<?php echo "$email" ?>" class="form-control" placeholder="Enter your registered email" readonly>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-4">
                            <input type="password" name="pass1" class="form-control" placeholder="Enter password">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-4">
                            <input type="password" name="pass2" class="form-control" placeholder="Enter password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="d-grid"><button class="btn btn-primary">submit</button></div>
                        </div>
                    </div>

                    <div class="row mt-3 text-center ">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>