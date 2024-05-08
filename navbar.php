<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Navbar | 21MIC7182</title>

        <?php include('includes/styles.php') ?>

        <style>
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                font-family: Arial;
            }

            .header {
                background: black;
                min-height: 50px;
                margin: 30px;
                border-radius: 40px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 40px;
            }

            main {
                min-height: calc(100vh - 280px - 30px);
            }

            nav li {
                display: inline;
            }

            nav li a {
                color: white;
                text-decoration: none;
                padding: 5px 10px;
                margin: 0 10px;
                font-size: 20px;
                font-weight: 700;
                position: relative;
                transition: all 0.3s ease-in-out;
            }

            nav li a:hover {
                color: red;
            }

            nav li a::before {
                content: '';
                position: absolute;
                bottom: 3px;
                left: 0;
                width: 100%;
                height: 2px;
                background: red;
                transform: scaleX(0);
                transition: all 0.3s ease-in-out;
            }

            nav li a:hover::before {
                transform: scaleX(1);
            }

            input {
                height: 25px;
                border-radius: 30px;
                font-size: 18px;
                padding-left: 20px;
                border: none;
                outline: none;
            }

            @media only screen and (max-width:600px) {
                nav li {
                    display: block;
                }
            }

        </style>

    </head>
    <body>

        <?php include('includes/header.php') ?>

        <main>
            <div class="header">
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </nav>
                <input type="text" placeholder="Search this website">
            </div>
        </main>

        <?php include('includes/footer.php') ?>
    </body>
</html>