<?php 
    require('mail.php');
    require('db.php');
    session_start();

    $email = "";
    $status = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $check_query = "SELECT * FROM users WHERE email = '$email'; ";
        $result = mysqli_query($mysql, $check_query);

        if(mysqli_num_rows($result) > 0) {
            $result = mysqli_fetch_assoc($result);
            $otp = (string) rand(6000, 9999);

            $_SESSION['reset_mail'] = $result['email'];
            $_SESSION['time'] = time();
            $_SESSION['otp'] = $otp;
            $_SESSION['try'] = 1;

            $r = sendOTPVerificationMail('karnamshyam.1947@authentication.com', $result, $otp);

            if($r == 'success') {
                $_SESSION['verify'] = 1;
                header('location:verify.php');
            }
            else {
                $status = 3;
            }

        }
        else {
            $status = 1;
        }
    }
?>

<!DOCTYPE html>

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
                    if($status == 1) {
                        $status = 2;
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error...!!</strong> Requested Email is no registered
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                    
                    if($status == 3) {
                        $status = 2;
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error...!!</strong> Unable to send the mail
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                    if(isset($_SESSION['reset_status']) && $_SESSION['reset_status'] == 1) {
                        $_SESSION['reset_status'] = 3;
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error...!!</strong> Requested OTP time expired
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                    
                    if(isset($_SESSION['reset_status']) && $_SESSION['reset_status'] == 4) {
                        $_SESSION['reset_status'] = 3;
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error...!!</strong> Incorrect OTP
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                    
                    if(isset($_SESSION['reset_status']) && $_SESSION['reset_status'] == 2) {
                        $_SESSION['reset_status'] = 3;
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error...!!</strong> Your otp expired, request again for new otp
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                ?>
                
                <form action="" method="post">
                    <div class="row">
                        <div class="col mb-4">
                            <input type="text" name="email" value="<?php echo "$email" ?>" class="form-control" placeholder="Enter your registered email">
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