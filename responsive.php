<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Layout | 21MIC7182</title>

        <link rel="stylesheet" href="css/responsive.css">

        <?php include('includes/styles.php') ?>
    </head>

    <body>
        <?php include('includes/header.php') ?>

        <main>
            <div class="container">
                <div class="card">
                    <img src="images/html.png" alt="html">
                    <div class="overlay">
                        HTML
                    </div>
                </div>
                <div class="card">
                    <img src="images/css.png" alt="html">
                    <div class="overlay">
                        CSS
                    </div>
                </div>
                <div class="card">
                    <img src="images/js.png" alt="html">
                    <div class="overlay">
                        JS
                    </div>
                </div>
                <div class="card">
                    <img src="images/react.png" alt="html">
                    <div class="overlay">
                        React
                    </div>
                </div>
            </div>
        </main>

        <?php include('includes/footer.php') ?>
    </body>
</html>