<?php
    require('db.php');
    session_start();
    $login = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = mysqli_real_escape_string($mysql, $_POST['email']);
        $password = mysqli_real_escape_string($mysql, $_POST['password']);
        $captcha = $_POST['captcha'];
        $captcha1 = $_SESSION['captcha'];

        if($captcha == $captcha1) {
            $select_user_query = "SELECT * FROM users WHERE email = '$email'; ";
            $result = mysqli_query($mysql, $select_user_query);

            if(mysqli_num_rows($result) > 0) {
                $result = mysqli_fetch_assoc($result);
                if(password_verify($password, $result['password'])) {
                    $_SESSION['username'] = $result;

                    $login = 1;
                    header('location:index.php');
                }
                else {
                    $login = 2;
                }
            }
            else {
                $login = 2;
            }
        }
        else {
            $login = 5;
        }
    }

    else {
        if(isset($_SESSION['username'])) {
            header('location:index.php');
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Authentication | Login</title>

        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    </head>

    <body>
        <div class="container d-flex align-items-center justify-content-center vh-100">
            <div class="card w-50 px-5 py-4">
                <h1 class="text-center mb-3 ">Login</h1>

                <!-- alerts -->
                <?php 
                    if(isset($_SESSION['signup']) && $_SESSION['signup'] == 1) {
                        $_SESSION['signup'] = 2;
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> Account created successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                    
                    if(isset($_SESSION['signup']) && $_SESSION['signup'] == 3) {
                        $_SESSION['signup'] = 2;
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>warning</strong> You must login to access this page
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                    
                    if(isset($_SESSION['signup']) && $_SESSION['signup'] == 4) {
                        $_SESSION['signup'] = 2;
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> Password changed successfully...!!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }

                    if($login == 2) {
                        $login = 3;
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error</strong> Invalid username or password
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                    
                    if($login == 5) {
                        $login = 3;
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error</strong> Invalid captcha
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                ?>

                <form action="" method="post" >
                    <div class="row">
                        <div class="col mb-4">
                            <input name="email" type="text" class="form-control" placeholder="Enter Email">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-4">
                            <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        </div>
                    </div>
                    
                    <div class="row  mb-4">
                        <div class="col-9">
                            <input name="captcha" type="text" class="form-control" placeholder="Enter Captcha">
                        </div>

                        <div class="col-3">
                            <img src="captcha.php">
                            <button id="btn" type="button">
                                <i class="fa-solid fa-arrows-rotate"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="container ps-5 pe-5 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember Me
                                </label>
                            </div>
                            <a href="forgot.php">forgot password?</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-4 ">
                            <div class="d-grid"><button class="btn btn-primary">Login</button></div>
                        </div>
                    </div>

                    <div class="row mt-3 text-center ">
                        <p>Don't have an account? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>

        <script>
            btn = document.getElementById("btn");
            btn.onclick = () => {
                console.log('Here..');
                location.reload();
            }
        </script>
    </body>
</html>