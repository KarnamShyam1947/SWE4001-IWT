<?php 
    session_start();

    if(isset($_SESSION['username'])) {
        header('location:profile.php');
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
        <title>Login | 21MIC7182</title>

        <link rel="stylesheet" href="css/index.css">
        
        <link rel="stylesheet" 
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
                integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
                crossorigin="anonymous" 
                referrerpolicy="no-referrer" />

        <style>
            table {
                border-collapse: collapse;
                border: 0;
            }

            main {
                display: grid;
                place-items: center;
            }

            td {
                padding-left: 20px;
                padding-bottom: 20px;
            }

            input[type=submit] {
                font-size: 18px;
                font-weight: bold;
                padding: 3px 15px ;
                cursor: pointer;
            }

            input {
                padding-left: 10px;
            }

            form p {
                text-align: center;
                margin-bottom: 10px;
                background-color: red;
                color: white;
                font-size: 18px;
                padding: 5px 0;
            }
        </style>

    </head>

    <body>
        <?php include('includes/header.php') ?>

        <main>
            <form action="validate.php" method="post">
                <h1>Login</h1>
                <?php 
                    if(isset($_SESSION['login'])) {
                        if($_SESSION['login'] === 0) {
                            echo '<p>Invalid username or password</p>';
                        }
                        
                        if($_SESSION['login'] === 1) {
                            echo '<p>You must login to access this page</p>';
                        }
                
                        $_SESSION['login'] = 10;
                    }
                ?>
                <table>
                    <tr>
                        <td>
                            <label for="un">Username</label>
                        </td>
                        <td>
                            <input type="text" id="un" required name="username" placeholder="Enter your username"> <br> 
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="ps">Password</label>
                        </td>
                        <td>
                            <input type="password" required name="password" id="ps" placeholder="enter your password"> <br>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td style="text-align: left;"><input type="submit" name="login" value="Login"></td>
                    </tr>
                </table>
                
            </form>
        </main>

        <?php include('includes/footer.php') ?>
    </body>
</html>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
        <title>Login</title>
        <style>
            td {
                text-align: right;
            }
        </style>
    </head>

    <body>
        
    </body>
</html>