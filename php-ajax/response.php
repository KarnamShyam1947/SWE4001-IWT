<?php 
    require('db.php');

    $selectQuery = 'SELECT * FROM faculty;';
    $selectQueryByDept = "SELECT * FROM faculty WHERE department=?; ";

    if(isset($_GET['name']) && isset($_GET['dept'])) {
        $name = $_GET['name'];
        $dept = $_GET['dept'];
        $selectQueryBoth = "SELECT * FROM faculty WHERE department = '$dept' and name like '%" . $name . "%'; ";

        $result = mysqli_query($mysql, $selectQueryBoth);
        
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <li>" . $row['name']  . "</li>
            ";
        }
        echo "</ul>";
    }

    elseif(isset($_GET['dept'])) {
        $dept = $_GET['dept'];

        $statement = mysqli_prepare($mysql, $selectQueryByDept);
        $statement->bind_param("s", $dept);
        $statement->execute();

        $result = $statement->get_result();

        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "
                <li>" . $row['name'] . "</li>
            ";
        }
        echo "</ul>";
    }   
    
    elseif(isset($_GET['name'])) {
        $name = $_GET['name'];
        $selectQueryByName = "SELECT * FROM faculty WHERE name like '%" . $name . "%'; ";
        
        $result = mysqli_query($mysql, $selectQueryByName);
        
        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <li>" . $row['name'] . "</li>
            ";
        }
        echo "</ul>";
    }

    else {
        $result = mysqli_query($mysql, $selectQuery);

        echo "<ul>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <li>" . $row['name'] . " ( " . $row['department'] . " )</li>
            ";
        }
        echo "</ul>";
    }
?>