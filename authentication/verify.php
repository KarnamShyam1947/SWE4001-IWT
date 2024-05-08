<?php 
    session_start();

    $email = "";

    if(!isset($_SESSION['reset_mail'])) {
        header('location:forgot.php');
    }
    else {
        $email = $_SESSION['reset_mail'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $current_time = time();
        $start_time = $_SESSION['time'];
        if($current_time - $start_time > 60 * 60) { 
            $_SESSION['reset_status'] = 1;
            header('location:forgot.php');
        }
        
        else if($_SESSION['try'] != 1) {
            $_SESSION['reset_status'] = 2;
            header('location:forgot.php');
        }

        else {
            $otp = $_SESSION['otp'];
            $otp1 = $_POST['otp'];

            if($otp == $otp1) {
                header('location:set-password.php');
            }
            else {
                $_SESSION['reset_status'] = 4;
                $_SESSION['try'] = 0;
                header('location:forgot.php');
            }
        }
    }
?>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password | Authentication</title>

        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>

    <body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
            <div class="card w-50 px-5 py-4">
                <h1 class="text-center mb-4 ">Forgot Password</h1>
                
                <?php 
                    if($_SESSION['verify'] == 1) {
                        $_SESSION['verify'] == 0;
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>success...!!</strong> OTP generated successfully. Please check your email.
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
                            <input type="text" name="otp" class="form-control" placeholder="Enter OTP">
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
