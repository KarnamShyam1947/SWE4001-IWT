<?php 
    require("db.php");
    $statesQuery = "SELECT * FROM states WHERE country_id=?; ";

    if(isset($_GET['country'])) {
        $country = $_GET['country'];
        $statement = mysqli_prepare($mysql, $statesQuery);
        $statement->bind_param("s", $country);
        $statement->execute();

        $result = $statement->get_result();

        echo "<option>--SELECT STATE--</option>";
        
        while($row = $result->fetch_assoc()) {
            ?>
                <option><?php echo $row['name'] ?></option>
            <?php 
        }
    }
?>