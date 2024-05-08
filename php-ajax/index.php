    <!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP-AJAX</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="row w-75 mt-4 m-auto">
            <div class="col">
                <select name="department" id="department" class="form-select">
                    <option value="">--SELECT DEPARTMENT--</option>
                    <!-- <option value="SCOPE">SCOPE</option>
                    <option value="SENSE">SENSE</option>
                    <option value="SMEC">SMEC</option>
                    <option value="SAS">SAS</option> -->
                    <?php
                        require('db.php');
                        $query = 'SELECT distinct(department) FROM faculty;';
                        $result = mysqli_query($mysql, $query);
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['department'] ?>"><?php echo $row['department'] ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>

            <div class="col">
                <input type="text" id="name" class="form-control" placeholder="Search faculty">
            </div>
        </div>

        <div class="container m-auto mt-4" id="result">

        </div>

        <script>
            let http = new XMLHttpRequest();
            let name = document.getElementById("name");
            let department = document.getElementById("department");
            
            window.onload = () => {
                http.open('GET', 'response.php');

                http.send();

                http.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        document.getElementById("result").innerHTML = this.responseText;
                    }
                }
            }

            department.onchange = () => {
                http.open('GET', `response.php?dept=${department.value}`, true);

                http.send();

                http.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        document.getElementById("result").innerHTML = this.responseText;
                    }
                }
            }

            name.onkeyup = () => {
                var url = `response.php?name=${name.value}`;

                if(department.value != "") {
                    url = `response.php?name=${name.value}&dept=${department.value}`;
                }

                http.open('GET', url, true);

                http.send();

                http.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        document.getElementById("result").innerHTML = this.responseText;
                    }
                }

            }
        </script>
    </body>
</html>