<?php 
    require("2+3_db.php");
    $hasError = false;
    $errorMsg = "";
    $success = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username =  $_POST['username'];
        $password =  $_POST['password'];
        $password1 =  $_POST['password1'];
        $password2 =  $_POST['password2'];

        if($username == "" || $password == "" || $password1 == "" || $password2 == "") {
            $hasError = true;
            $errorMsg = "Please enter details in all fields";
        }
        elseif($password1 != $password2) {
            $hasError = true;
            $errorMsg = "New Password and Confirm password fields must match";
        }
        else {
            $checkQuery = "SELECT * FROM accounts WHERE
                           username = '$username' and
                           password = '$password' and
                           status = 'active'; ";

            $result = mysqli_query($mysql, $checkQuery);

            if(mysqli_num_rows($result) <= 0) {
                $hasError = true;
                $errorMsg = "Invalid username or password. or user status is not active";
            }
            else {
                $updateQuery = "UPDATE accounts
                                SET password = '$password1'
                                WHERE username = '$username'; ";

                mysqli_query($mysql, $updateQuery);

                $success = true;
            }
        }
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>2Q | MODEL PAPER F2 SLOT</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .label {
                text-align: right;
                margin-right: 10px;
            }

            td {
                padding-bottom: 20px;
                padding-right: 10px;
            }
        </style>
    </head>

    <body>
        <form method="post" class="w-50 m-auto mt-5" action="">
            <?php 
                if($hasError) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error....!!</strong> <?php echo $errorMsg ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                }
                
                if($success) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success....!!</strong> Password updated successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                }
            ?>

            <table class="w-100">
                <tbody>
                    <tr>
                        <td class="label">
                            <label for="username">Username</label>
                        </td>
                        <td>
                            <input type="text" id="username" name="username" class="form-control">
                        </td>
                    </tr>
            
                    <tr>
                        <td class="label">
                            <label for="password">password</label>
                        </td>
                        <td>
                            <input type="password" id="password" name="password" class="form-control">
                        </td>
                    </tr>
            
                    <tr>
                        <td class="label">
                            <label for="password1">New Password</label>
                        </td>
                        <td>
                            <input type="password" id="password1" name="password1" class="form-control">
                        </td>
                    </tr>
            
                    <tr>
                        <td class="label">
                            <label for="password2">Confirm Password</label>
                        </td>
                        <td>
                            <input type="password" id="password2" name="password2" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td class="label"></td>
                        <td>
                            <input type="submit" value="Reset Password" class="btn btn-primary">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </body>
</html>
