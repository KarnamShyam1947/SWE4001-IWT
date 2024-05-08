<?php 
    require("2+3_db.php");
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>3Q | MODEL PAPER F2 SLOT</title>

        <style>
            th {
                text-align: right;
                padding-right: 10px;
            }

            th, td {
                padding-bottom: 5px;
            }
        </style>
    </head>

    <body>
        <select name="state" id="state">
            <option value="">--SELECT STATE--</option>
            <?php 
                $stateQuery = "SELECT DISTINCT(state_name) FROM state_details; ";
                $result = mysqli_query($mysql, $stateQuery);

                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $row['state_name'] ?>"><?php echo $row['state_name'] ?></option>
                    <?php
                }
            ?>
        </select>

        <select name="district" id="district">
            <option value=''>--SELECT DISTRICT--</option>
        </select>

        <div id="result">
            
        </div>

        <script>
            let http = new XMLHttpRequest();
            let state = document.getElementById("state");
            let result = document.getElementById("result");
            let district = document.getElementById("district");

            state.onchange = function() {
                let state_name = state.value;
                let url = `3_load_district.php?state=${state_name}`;

                http.open('GET', url, true);
                http.send();

                http.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        district.innerHTML = this.responseText;
                    }
                }
            }


        </script>
    </body>
</html>
