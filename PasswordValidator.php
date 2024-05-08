<?php 
    $password = '';
    $invalid = true;
    $counter = 5;
    $minLength = false; 
    $uppercaseRequired = false; 
    $lowercaseRequired = false; 
    $numberRequired = false; 
    $specialCharacterRequired = false; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['input'];

        if (strlen($password) > 12) {
            $minLength = true;
            $counter = $counter - 1;
        }
        
        if (preg_match('/[A-Z]/', $password)) {
            $uppercaseRequired = true;
            $counter = $counter - 1;
        }
        
        if (preg_match('/[a-z]/', $password)) {
            $lowercaseRequired = true;
            $counter = $counter - 1;
        }
        
        if (preg_match('/\d/', $password)) {
            $numberRequired = true;
            $counter = $counter - 1;
        }

        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            $specialCharacterRequired = true;
            $counter = $counter - 1;
        }

        if($counter == 0) {
            $invalid = false;
        }
    }
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Validator</title>

        <?php include('includes/styles.php') ?>

        <style>
            main {
                display: grid;
                place-items: center;
            }

            h3 {
                text-align: center;
                padding-bottom: 20px;
            }

            #input {
                margin: 20px 0;
                width: 100%;
                height: 30px;
            }

            button {
                border: none;
                width: 100%;
                background: black;
                color: white;
                padding: 5px 0;
                font-size: 18px;
                font-weight: bold;
                letter-spacing: 2px;
                border-radius: 8px;
                cursor: pointer;
            }

            button:disabled {
                opacity: 0.8;
                cursor: not-allowed;
            }
        </style>
    </head>

    <body>
        <?php include('includes/header.php') ?>

        <main>
            <div>
                <h3>Password Validator Using PHP</h3>
                <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="checkbox" <?php if($lowercaseRequired)
                                            echo 'checked' ?> > Lower case(must contain one lower case letter) <br>
                    <input type="checkbox" <?php if($uppercaseRequired)
                                            echo 'checked' ?> > Upper case(must contain one upper case letter) <br>
                    <input type="checkbox" <?php if($specialCharacterRequired)
                                            echo 'checked' ?> > special character(must contain one special character) <br>
                    <input type="checkbox" <?php if($numberRequired)
                                            echo 'checked' ?> > Number (must contain one digit)<br>
                    <input type="checkbox" <?php if($minLength)
                                            echo 'checked' ?> > length (length must be grater than 12 characters)<br>
                    <input autofocus name="input" type="text" id="input"
                                            value="<?php echo $password ?>"
                                            onfocus="var temp_value=this.value; this.value=''; this.value=temp_value"> <br>
                
                    <button name="success"
                        <?php if($invalid) echo 'disabled' ?> >
                                    Submit</button>
                </form>
            </div>
        </main>

        <?php include('includes/footer.php') ?>

        <script>
            form = document.getElementById("form");
            input = document.getElementById("input");

            input.onkeyup = () => {
                form.submit();
            }
        </script>
    </body>
</html>
