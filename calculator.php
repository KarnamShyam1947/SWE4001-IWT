<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculator</title>

        <link rel="stylesheet" href="css/calculator.css">

        <?php include('includes/styles.php') ?>
    </head>

    <body>
        <?php include('includes/header.php') ?>

        <main>
            <div class="calculator">
                <h1>calculator</h1>
                <div class="screen">
                    <input id="output" type="text">
                </div>
                <div class="buttons">
                    <button onclick="compute()" id="b1"  value="1">1</button>
                    <button onclick="compute()" id="b2"  value="2">2</button>
                    <button onclick="compute()" id="b3"  value="3">3</button>
                    <button onclick="compute()" id="sum" value="+">+</button>
                    <button onclick="compute()" id="b4"  value="4">4</button>
                    <button onclick="compute()" id="b5"  value="5">5</button>
                    <button onclick="compute()" id="b6"  value="6">6</button>
                    <button onclick="compute()" id="sub" value="-">-</button>
                    <button onclick="compute()" id="b7"  value="7">7</button>
                    <button onclick="compute()" id="b8"  value="8">8</button>
                    <button onclick="compute()" id="b9"  value="9">9</button>
                    <button onclick="compute()" id="mul" value="*">*</button>
                    <button onclick="compute()" id="b0"  value="0">0</button>
                    <button onclick="compute()" id="cl"  value="cl">AC</button>
                    <button onclick="compute()" id="pw"  value="^">^</button>
                    <button onclick="compute()" id="eq"  value="=">=</button>
                    <button onclick="compute()" id="de"  value=".">.</button>
                    <button onclick="compute()" id="div" value="/">/</button>
                </div>
                <div id="error"></div>
            </div>
        </main>

        <script>
            exp = '';
            screen = document.getElementById("output");
            num1 = 0;
            numStr = '';
            currentOp = '';

            function compute() {

                document.getElementById('error').innerHTML = '';

                current = event.target.value;

                if(current == 'cl') {
                    screen.value = "";
                    numStr = '';
                }

                if(current == '.') {
                    console.log(numStr);

                    if(numStr.includes('.')) {

                    }
                    else {
                        numStr += '.';
                        screen.value = numStr;
                    }
                }

                if(current == '1' || current == '2' || current == '3' ||
                   current == '4' || current == '5' || current == '6' ||
                   current == '7' || current == '8' || current == '9' || current == '0') {

                    numStr += current;
                    screen.value = numStr;

                }

                if(current == '+' || current == '-' || current == '*' ||
                   current == '/' || current == '^') {
                    num1 = Number(numStr);
                    currentOp = current;
                    screen.value = '';
                    numStr = '';
                }

                if(current == '=') {
                    num2 = Number(screen.value);

                    if(currentOp == '+') {
                        result = num1 + num2;
                        screen.value = result;
                        numStr = result.toString();
                    }
                    if(currentOp == '-') {
                        result = num1 - num2;
                        screen.value = result;
                        numStr = result.toString();
                    }
                    if(currentOp == '*') {
                        result = num1 * num2;
                        screen.value = result;
                        numStr = result.toString();
                    }
                    if(currentOp == '/') {
                        result = num1 / num2;
                        screen.value = result;
                        numStr = result.toString();
                    }
                    
                    if(currentOp == '^') {
                        result = power(num1, num2);
                        screen.value = result;
                        numStr = result.toString();
                    }
                }

            }
    
            function power(n1, n2) {
                var result = 1;
                for(let i = 0; i < n2;i++) {
                    result = result*n1;
                }

                return result;
            }
        
        </script>

        <?php include('includes/footer.php') ?>

    </body>
</html>