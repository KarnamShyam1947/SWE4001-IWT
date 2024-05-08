<?php
    // Array ( [name] => [full_path] => [type] => [tmp_name] => [error] => 4 [size] => 0 )
    session_start();

    require('db.php');
    $allowed_extensions = ['image/jpeg', 'image/jpg', 'image/png'];
    $email = $name = $phone = $pass1 = $pass2 = $gender = "";
    $signup = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = mysqli_real_escape_string($mysql, $_POST['name']);
        $email = mysqli_real_escape_string($mysql, $_POST['email']);
        $phone = mysqli_real_escape_string($mysql, $_POST['phone']);
        $gender = mysqli_real_escape_string($mysql, $_POST['gender']);
        $pass1 = mysqli_real_escape_string($mysql, $_POST['pass1']);
        $pass2 = mysqli_real_escape_string($mysql, $_POST['pass2']);
        $dob = mysqli_real_escape_string($mysql, $_POST['dob']);
        $image = $_FILES['image'];

        $check_query = "SELECT * FROM users WHERE email = '$email'; ";
        $check_result = mysqli_query($mysql, $check_query);
        
        if($pass1 != $pass2) {
            $pass1 = $pass2 = "";
            $signup = 2;
        }

        else if(mysqli_num_rows($check_result) > 0) {
            $signup = 1;
        }
        
        else {
            $password_hash = password_hash($pass1, PASSWORD_BCRYPT);

            // no image selected
            if($image['error'] == 4) {

                $insert_query = "INSERT INTO users(name, email, phone, gender, password, dob) 
                                VALUES('$name', '$email', '$phone', '$gender', '$password_hash', '$dob'); ";

                mysqli_query($mysql, $insert_query);

                $_SESSION['signup'] = 1;
                header('location:login.php');   
            }

            // invalid file extension
            else if(!in_array($image['type'], $allowed_extensions)) {
                $signup = 3;
            }

            else {
                $filename = explode('@', $email)[0] . '.jpg';
                $filepath = 'uploads/' . $filename;

                move_uploaded_file($image['tmp_name'], $filepath);

                $insert_query = "INSERT INTO users(name, email, phone, gender, password, image_url, dob) 
                                VALUES('$name', '$email', '$phone', '$gender', '$password_hash', '$filepath', '$dob'); ";

                mysqli_query($mysql, $insert_query);

                $_SESSION['signup'] = 1;
                header('location:login.php');
            }

        }
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register | Authentication</title>

        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="container d-flex align-items-center justify-content-center vh-100">
            <div class="card w-75 px-5 py-4">
                <h1 class="text-center mb-3 ">Register</h1>

                <!-- alerts -->
                <?php 
                    if($signup == 1){
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error</strong> Email already registered
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }

                    if($signup == 2){
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error</strong> conform password doesn't match
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }
                    
                    if($signup == 3){
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>warning</strong> Invalid file type
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                    }

                ?>

                <form id="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col mb-4">
                            <input value="<?php echo $name ?>" id="name" name="name" type="text" class="form-control" placeholder="Enter Name">
                            <div class="invalid-feedback">
                                <b>Name </b> field is required
                            </div>
                        </div>
                        
                        <div class="col mb-4">
                            <input value="<?php echo $email ?>" id="email" name="email" type="text" class="form-control" placeholder="Enter Email">
                            <div class="invalid-feedback">
                                <b>Email </b> field is required
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-4">
                            <input id="pass1" name="pass1" type="password" class="form-control" placeholder="Enter Password">
                            <div class="invalid-feedback">
                                <b>Password </b> field is required
                            </div>
                        </div>
                        
                        <div class="col mb-4">
                            <input id="pass2" name="pass2" type="password" class="form-control" placeholder="Renter Password">
                            <div class="invalid-feedback">
                                <b>Password </b> field is required
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-4">
                            <input value="<?php echo $phone ?>" id="phone" name="phone" type="text" class="form-control" placeholder="Enter Phone number">
                            <div class="invalid-feedback">
                                <b>Phone </b> field is required
                            </div>
                        </div>
                        
                        <div class="col mb-4">
                            <select id="gender" name="gender" id="" class="form-select">
                                <option value="">--select gender--</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="others">others</option>
                            </select>
                            <div class="invalid-feedback">
                                Select the <b>gender</b>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <input id="image" name="image" type="file" id="" class="form-control">
                            <div class="invalid-feedback">
                                select <b>image </b> file
                            </div>
                        </div>

                        <div class="col">
                            <input id="dob" name="dob" type="date" class="form-control" placeholder="Enter date of birth">
                            <div class="invalid-feedback">
                                <b>Date of birth </b> field is required
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="container ps-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Agree to Terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    please agree to T&C.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mt-4">
                            <div class="d-grid"><button class="btn btn-primary">Register</button></div>
                        </div>
                    </div>

                    <div class="row mt-3 text-center ">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>

        <script>
            form = document.getElementById("form");
            checkBox = document.getElementById("flexCheckDefault");
            username = document.getElementById("name");
            gender = document.getElementById("gender");
            email = document.getElementById("email");
            image = document.getElementById("image");
            phone = document.getElementById("phone");
            city = document.getElementById("pass1");
            reg = document.getElementById("pass2");
            zip = document.getElementById("dob");
            check = 0;

            image.onchange = () => {
                check = 1;
            }

            form.onsubmit = (e) => {
                var flag = 1;

                checkBox.classList.remove('is-invalid');
                username.classList.remove('is-invalid');
                email.classList.remove('is-invalid');
                image.classList.remove('is-invalid');
                gender.classList.remove('is-invalid');
                phone.classList.remove('is-invalid');
                city.classList.remove('is-invalid');
                reg.classList.remove('is-invalid');
                zip.classList.remove('is-invalid');

                e.preventDefault();

                if(!checkBox.checked) {
                    checkBox.classList.add('is-invalid');
                    flag = 0;
                }

                if(check == 0) {
                    image.classList.add('is-invalid');
                    flag = 0;
                }
                
                if(username.value == "") {
                    username.classList.add('is-invalid');
                    flag = 0;
                }
                
                if(reg.value == "") {
                    reg.classList.add('is-invalid');
                    flag = 0;
                }
                
                if(gender.value == "") {
                    gender.classList.add('is-invalid');
                    flag = 0;
                }

                if(email.value == "") {
                    email.classList.add('is-invalid');
                    flag = 0;
                }
                
                if(phone.value == "") {
                    phone.classList.add('is-invalid');
                    flag = 0;
                }
                
                if(zip.value == "") {
                    zip.classList.add('is-invalid');
                    flag = 0;
                }

                if(city.value == "") {
                    city.classList.add('is-invalid');
                    flag = 0;
                }

                if(flag) {
                    form.submit();
                }
            }
        </script>
    </body>
</html>