<?php 
    require('db.php');

    $selectQuery = 'SELECT * FROM faculty WHERE id=?; ';

    // inserting record 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
        $name = $_POST['name'];
        $dept = $_POST['dept'];

        $insertQuery = "INSERT INTO faculty(name, department) values('$name', '$dept');";

        mysqli_query($mysql, $insertQuery);
    }
    // deleting record
    if(isset($_GET['type']) && $_GET['type'] == 'delete') {
        $id = $_GET['id'];
        
        $deleteQuery = "DELETE FROM faculty WHERE id = $id; ";

        mysqli_query($mysql, $deleteQuery);
    }
    
    // get record to update
    if(isset($_GET['type']) && $_GET['type'] == 'update') {
        $id = $_GET['id'];
        
        $deleteQuery = "SELECT * FROM faculty WHERE id = $id; ";
        $result = mysqli_query($mysql, $deleteQuery);
        $result = mysqli_fetch_assoc($result);

        echo $result['name']. ':' . $result['department'] . ":" . $result['id'] . ":";
    }

    // updating record
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
        $updateQuery = "UPDATE faculty
                        SET name=?,
                        department=?
                        WHERE id=?; ";

        $id = $_POST['id'];
        $name = $_POST['name'];
        $dept = $_POST['dept'];

        $updateStatement = mysqli_prepare($mysql, $updateQuery);
        $updateStatement->bind_param("ssi", $name, $dept, $id);
        $updateStatement->execute();

        // $result = $updateStatement->get_result();
    }
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD | Faculty</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <!-- form -->
        <form class="w-75 m-auto mt-3" action="" method="post">
            <div class="row">
                <div class="col-4">
                    <input type="text" placeholder="Enter faculty name" name="name" id="name" class="form-control">
                </div>
                
                <div class="col-4">
                    <input type="text" placeholder="Enter faculty department" name="dept" id="dept" class="form-control">
                </div>
                <div class="d-grid col-2">
                    <input type="submit" name="add" value="add" class="btn btn-primary">
                </div>

                <input type="hidden" name="id" id="id">
                
                <div class="d-grid col-2">
                    <input type="submit" name="edit" value="edit" class="btn btn-warning ">
                </div>
            </div>
        </form>

        <!-- table -->
        <div class="w-75 mt-5 m-auto ">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Faculty Name</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $selectQuery = "SELECT * FROM faculty;";
                        $result = mysqli_query($mysql, $selectQuery);
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['department'] ?></td>
                                <td>
                                    <a href="?type=delete&id=<?php echo $row['id'] ?>" class="btn btn-danger" role="button">Delete</a>
                                    <button class="btn btn-warning" onclick="editDetails(<?php echo $row['id']; ?>)">
                                        edit
                                    </button>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <script>

            let http = new XMLHttpRequest();

            function editDetails(id) {
                console.log(id);
                let url = `?type=update&id=${id}`;

                http.open('GET', url, true);
                http.send();

                http.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        result = this.responseText.split(":");
                        
                        console.log(result);
                        
                        name = result[0];
                        dept = result[1];
                        id = result[2];

                        document.getElementById("name").value = name;
                        document.getElementById("dept").value = dept;
                        document.getElementById("id").value = id;
                    }
                }
            }
        </script>
    </body>
</html>

