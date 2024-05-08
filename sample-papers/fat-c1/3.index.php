<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>3Q | C1 FAT</title>
    </head>

    <body>
        <table id="result">
            
        </table>

        <script>
            let http = new XMLHttpRequest();
            let res = document.getElementById("result");

            function updateScore() {
                http.open("GET", "3.get_live_score.php", true);
                http.send();

                http.onreadystatechange = function() {
                    if(this.status == 200 && this.readyState == 4) {
                        res.innerHTML = this.responseText;
                    }
                }
                console.log("Score updated");
            }

            setInterval(updateScore, 5000);
        </script>
    </body>
</html>