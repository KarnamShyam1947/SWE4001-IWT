<?php
    require('db.php');
    session_start();
    $username = '';
    $url = '';

    if(!isset($_SESSION['username'])) {
        $_SESSION['signup'] = 3;
        header('location:login.php');
    }
    else {
        $id = $_SESSION['username']['id'];

        $query = "SELECT * FROM users WHERE id = '$id'; ";
        $result = mysqli_query($mysql, $query);
        $user = mysqli_fetch_assoc($result);

        $username = $user['name'];
        $url = $user['image_url'];
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index | Authentication</title>

        <link rel="stylesheet" href="styles.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg  bg-primary ">
            <div class="container-fluid">
                
                <div>                    
                    <button type="button" class="btn btn-primary"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <a class="navbar-brand" href="#">Website Name</a>
                </div>
                
                <div>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <img
                                src="<?php echo $url ?>"
                                class="rounded-circle"
                                height="45"
                                width="45"
                            />
                            <?php echo $username ?>
                        </li>

                        <li class="nav-item ms-3">
                            <a class="btn btn-warning " role="button" href="logout.php" >logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Website Name</h3>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                <ul>
                    <li>
                        <a href="change-password.php">Change Password</a>
                    </li>
                    
                    <li>
                        <a href="edit-profile.php">Edit Profile</a>
                    </li>
                    
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>

        <main class="text-center mt-3">
            <h1>Welcome, <?php echo $username ?>!</h1>
            <a href="logout.php">Logout</a>
        </main>

    </body>
</html>