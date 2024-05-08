<?php 

    session_start();
    $username = '';

    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }

    else {
        $_SESSION['login'] = 1;
        header('location:login.php');
    }


?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile | 21MIC7182</title>

        <link rel="stylesheet" href="css/index.css">

        <style>
            main div {
                display: flex;
                align-items: center;
                width: 80%;
                justify-content: space-between;
                margin: auto;
            }

            main div a {
                text-decoration: none;
                color: black;
                border: 2px solid black;
                padding: 5px 15px;
                font-size: 18px;
            }
        </style>
        
        <link rel="stylesheet" 
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
                integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
                crossorigin="anonymous" 
                referrerpolicy="no-referrer" />

    </head>

    <body>
        <?php include('includes/header.php') ?>

        <main>
            <div>
                <h1>Welcome, <?php echo $username ?> ...!!</h1>
                <a href="logout.php">Logout</a>
            </div>
        </main>

        <?php include('includes/footer.php') ?>
    </body>
</html>
