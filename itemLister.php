<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Item Lister | 21MIC7182</title>

        <style>
            * {
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
            }

            .container {
                height: 480px;
                overflow: auto;
                border: 2px solid black;
                margin: 0 30px;
                /* padding: 10px 20px; */
                text-align: center;
            }

            .ulist {
                list-style: none;
                margin: 20px;
                padding: 10px;
            }

            h2 {
                text-align: center;
                padding-top: 20px;
            }

            .list {
                border: 2px solid red;
                margin: 10px;
                padding: 5px;
                font-size: x-large;
            }

            .btn {
                margin-left: 95%;
                padding: 5px;
                font-size: x-large;
                color: white;
                background-color: red;
                text-align: center;
                display: inline;
            }

            .abc {
                border: 2px solid red;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                font-size: 20px;
                display: flex;
                justify-content: space-between;
                padding: 10px;
                align-items: center;
                /* margin-bottom: 10px; */
                width: 90%;
                margin: 0 auto 10px auto;
            }

            .c-btn {
                padding: 5px;
                font-size: 20px;
                cursor: pointer;
            }

            #inp {
                padding-left: 10px;
                height: 30px;
                margin-bottom: 10px;
            }
        </style>

        <link rel="stylesheet" href="css/index.css">
        
        <link rel="stylesheet" 
                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
                integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
                crossorigin="anonymous" 
                referrerpolicy="no-referrer" />

    </head>

    <body>
        <?php include('includes/header.php') ?>

        <main>
            <div class="header">
                <h1>ITEM LISTER</h1>
            </div>
            
            <div class="container">
                <h2>Add Items</h2>
                <input placeholder="Enter item value and hit enter" type="text" id="inp"> <input type="button" value="Submit" id="s">
                <!-- <input type="button" value="Reverse" id="r"> -->
                <ol class="oist" id="ulists"> </ol>
            </div>
        </main>

        <script>
            let v = document.getElementById("inp")
            let sb = document.getElementById("s")
            let rb = document.getElementById("r")
            itemList = document.getElementById("ulists")
            sb.addEventListener('click', add)
            function add() {
                status = 1
                if (v.value == "") {
                    alert("Value is blank, You cant add this to the list")
                    status = 0
                    return ;
                }
                if (!isNaN(v.value)) {
                    alert("must not be a number")
                    status = 0
                    return ;
                }

                items = document.getElementsByClassName("abc");
                for (var i = 0; i < items.length; i++) {
                    if (items[i].getAttribute('data-value') == v.value) {
                        alert("Invalid entry");
                        status = 0;
                        break;
                    }
                }

                if (status == 1) {
                    appendElement();
                }
            }

            function appendElement() {
                let n = document.createElement('li');
                n.className = "abc"
                n.innerText = v.value
                n.setAttribute('data-value', v.value);

                let button = document.createElement("button");
                button.innerText = 'X';
                button.className = 'c-btn';
                n.setAttribute('onclick', "del()");
                n.appendChild(button);



                itemList.appendChild(n);

                v.value = '';
            }

            function del() {
                if (confirm('Do you want to delete??')) {
                    pn = event.target.parentElement;

                    pn.remove();
                }
            }

            v.addEventListener('keyup', (e) => {
                if (e.keyCode === 13) {
                    add();
                }
            })
        </script>

        <?php include('includes/footer.php') ?>
    </body>
</html>
