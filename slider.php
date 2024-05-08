<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Slider</title>

        <link rel="stylesheet" href="css/slider.css">
        <?php include('includes/styles.php') ?>
    </head>

    <body>
        <?php include('includes/header.php') ?>
        <main>
            <div class="slides">
                <div class="slide">
                    <img src="images/1.jpg" alt="">
                    <h3>Flower</h3>
                </div>
                <div class="slide">
                    <img src="images/2.jpg" alt="">
                    <h3>Mountain</h3>
                </div>
                <div class="slide">
                    <img src="images/3.jpg" alt="">
                    <h3>Fish</h3>
                </div>
                <div class="slide">
                    <img src="images/4.jpg" alt="">
                    <h3>Dragon fly</h3>
                </div>
                <div class="buttons">
                    <a class="prev" onclick="plusSlides(-1)" href="#">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)" href="#">&#10095;</a>
                </div>
            
                <div class="dots">
                    <ul>
                        <li class="dot active" onclick="currentSlide(0)"></li>
                        <li class="dot" onclick="currentSlide(1)"></li>
                        <li class="dot" onclick="currentSlide(2)"></li>
                        <li class="dot" onclick="currentSlide(3)"></li>
                    </ul>
                </div>
            </div>
        </main>
        <?php include('includes/footer.php') ?>
        <script src="js/slider.js"></script>
    </body>
</html>