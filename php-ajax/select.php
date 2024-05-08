<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Select</title>
    </head>

    <body>
        <select name="country" id="country">
            <option value="">--SELECT COUNTRY--</option>
            <?php 
                require("db.php");
                $query = "SELECT * FROM countries; ";
                $result = mysqli_query($mysql, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php
                }
            ?>
        </select>
        
        <select name="state" id="state">
            <option value="">--SELECT STATE--</option>
        </select>

        <script>
            let country = document.getElementById("country");
            let state = document.getElementById("state");
            let http = new XMLHttpRequest();

            country.onchange = () => {
                console.log(country.value);
                url = `country.php?country=${country.value}`;

                http.open('GET', url, true);
                http.send();

                http.onreadystatechange = function() {
                    if(this.status == 200 && this.readyState == 4) {
                        state.innerHTML = this.responseText;
                    }
                }
            }
        </script>
    </body>
</html>