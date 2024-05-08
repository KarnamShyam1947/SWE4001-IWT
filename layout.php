<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Layout</title>

        <link rel="stylesheet" href="css/index.css">
        
        <link rel="stylesheet" 
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
                integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
                crossorigin="anonymous" 
                referrerpolicy="no-referrer" />

       
       <style>
            #b1 {
                grid-area: b1;
            }
            #b2 {
                grid-area: b2;
            }
            #b3 {
                grid-area: b3;
            }
            #b4 {
                grid-area: b4;
            }
            #b5 {
                grid-area: b5;
            }
            #b6 {
                grid-area: b6;
            }
            #b7 {
                grid-area: b7;
            }
            #b8 {
                grid-area: b8;
            }

            .pc {
                background-color: pink;
            }

            .bc {
                background-color: blue;
            }

            .gc {
                background-color: green;
            }

            .box {
                display: grid;
                place-items: center;
                font-size: 25px;
            }

            .container {
                display: grid;
                height: 900px;
                width: 650px;
                grid-gap: 2px;
                grid-template-areas: 
                'b1 b2 b3'
                'b1 b4 b4'
                'b5 b6 b7'
                'b8 b8 b7';
                margin: auto;
                padding: 50px 0;
            }
        </style>
    </head>

    <body>
        <?php include('includes/header.php') ?>

        <main>
            <div class="container">
                <div id="b1" class="box pc">B1</div>
                <div id="b2" class="box bc">B2</div>
                <div id="b3" class="box bc">B3</div>
                <div id="b4" class="box gc">B4</div>
                <div id="b5" class="box bc">B5</div>
                <div id="b6" class="box bc">B6</div>
                <div id="b7" class="box pc">B7</div>
                <div id="b8" class="box gc">B8</div>
            </div>
        </main>

        <?php include('includes/footer.php') ?>
    </body>
</html>