<?php
    require('db.php');
    session_start();
    $username = '';
    $user = '';
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

        $url = $user['image_url'];
        $username = $user['name'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($mysql, $_POST['name']);
        $email = mysqli_real_escape_string($mysql, $_POST['email']);
        $phone = mysqli_real_escape_string($mysql, $_POST['phone']);
        $dob = mysqli_real_escape_string($mysql, $_POST['dob']);
        $image = $_FILES['image'];
        $filepath = $user['image_url'];

        if($image['error'] != 4) {
            move_uploaded_file($image['tmp_name'], $filepath);
        }

        $update_query = "UPDATE users
                         SET name = '$name',
                             phone = '$phone',
                             dob = '$dob'
                         WHERE email = '$email'; ";

        mysqli_query($mysql, $update_query);

        // update session
        $query = "SELECT * FROM users WHERE email = '$email'; ";
        $result = mysqli_query($mysql, $query);
        $result = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $result;

        header('location:index.php');
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile | Authentication</title>

        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="d-flex justify-content-center align-items-start mt-5">

            <div class="card p-4 w-50 me-4 ">
                <h1 class="text-center mb-3 ">Update Profile</h1>
                <form id="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col mb-4">
                            <label class="form-label">Name</label>
                            <input value="<?php echo $user['name'] ?>" id="name" name="name" type="text" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-4">
                            <label class="form-label">Email</label>
                            <input value="<?php echo $user['email'] ?>" readonly id="email" name="email" type="text" class="form-control" placeholder="Enter Email">
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="col mb-4">
                            <label class="form-label">Phone number</label>
                            <input value="<?php echo $user['phone'] ?>" id="phone" name="phone" type="text" class="form-control" placeholder="Enter Phone number">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <label class="form-label">Date of birth</label>
                            <input id="dob" value="<?php echo $user['dob'] ?>" name="dob" type="date" class="form-control" placeholder="Enter date of birth">
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-10">
                            <label class="form-label">Profile Image</label>
                            <input id="imageInput" name="image" type="file" class="form-control" placeholder="Enter date of birth">
                        </div>

                        <div class="col-2">
                            <img 
                                id="image"
                                style="border: 2px solid black;"
                                src="<?php echo $user['image_url'] ?>" 
                                class="rounded-circle m-auto mb-4"
                                height="100"
                                width="100"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-4">
                            <div class="d-grid"><button class="btn btn-primary">Update Profile</button></div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="p-4 card ">
                <img 
                    style="border: 2px solid black;"
                    src="<?php echo $user['image_url'] ?>" 
                    class="rounded-circle m-auto mb-4"
                    height="200"
                    width="200"
                />
                <h5>
                    <i class="fa-solid fa-user"></i> &nbsp;
                    <?php echo $user['name'] ?>
                </h5>
    
                <h5>
                    <i class="fa-solid fa-envelope"></i> &nbsp;
                    <?php echo $user['email'] ?>
                </h5>
    
                <h5>
                    <i class="fa-solid fa-phone"></i> &nbsp;
                    <?php echo $user['phone'] ?>
                </h5>
    
                <h5>
                    <i class="fa-solid fa-calendar"></i> &nbsp;
                    <?php echo $user['dob'] ?>
                </h5>
    
                <h5>
                    <i class="fa-solid fa-male"></i> &nbsp;
                    <?php echo $user['gender'] ?>
                </h5>
            </div>
        </div>

        <script>
            let image = document.getElementById("image");
            let imageInput = document.getElementById("imageInput");

            imageInput.onchange = () => {
                renderImage();
            }

            function renderImage() {
                let render = new FileReader();
                render.readAsDataURL(imageInput.files[0]);

                console.log(imageInput.files[0]);

                render.onload = () => {
                    image.setAttribute('src', render.result);
                };
            }
        </script>
    </body>
</html>
