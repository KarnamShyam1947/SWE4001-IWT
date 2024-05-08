<?php 
    require('2+3_db.php');
    $districtQuery = "SELECT * FROM state_details WHERE state_name=?; ";
    $stateDistrictQuery = "SELECT * FROM state_details WHERE state_name=? and district_name=?; ";

    if(isset($_GET['state']) && isset($_GET['district'])) {
        $state = $_GET['state'];
        $district = $_GET['district'];

        $stateDistrictStatement = mysqli_prepare($mysql, $stateDistrictQuery);
        $stateDistrictStatement->bind_param("ss", $state, $district);
        $stateDistrictStatement->execute();

        $result = $stateDistrictStatement->get_result();
        $result = $result->fetch_assoc();

        echo "
        <table>
            <tr>
                <th>State:</th>
                <td>" . $result['state_name'] . "</td>
            </tr>

            <tr>
                <th>District:</th>
                <td>" . $result['district_name'] . "</td>
            </tr>
            
            <tr>
                <th>Population:</th>
                <td>" . $result['district_population'] . "</td>
            </tr>
            
            <tr>
                <th>Headquarter:</th>
                <td>" . $result['district_headquarter'] . "</td>
            </tr>
        </table>
        ";

        // echo "<b>State</b> : " . $result['state_name'] . "<br>";
        // echo "<b>District</b> : " . $result['district_name'] . "<br>";
        // echo "<b>Population</b> : " . $result['district_population'] . "<br>";
        // echo "<b>Headquarter</b> : " . $result['district_headquarter'];
    }

    elseif(isset($_GET['state'])) {
        $state = $_GET['state'];

        $districtStatement = mysqli_prepare($mysql, $districtQuery);
        $districtStatement->bind_param("s", $state);
        $districtStatement->execute();

        $result = $districtStatement->get_result();
        echo "<option value=''>--SELECT DISTRICT--</option>";

        while($row = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $row['district_name']; ?>">
                    <?php echo $row['district_name']; ?>
                </option>
            <?php
        }
    }
?>