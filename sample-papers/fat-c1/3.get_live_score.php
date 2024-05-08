<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "shyam1947";
    $database = "work";

    $mysql = mysqli_connect($hostname, $username, $password, $database);
    if(!$mysql) {
        die("Failed to establish connection");
    }

    $query = "select * from scores order by id desc limit 1; "; 
    $result = mysqli_query($mysql, $query);

    $row = mysqli_fetch_assoc($result);

    echo "
        <tr>
            <th>Score</th>
            <th>No. of wickets</th>
            <th>Overs</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>". $row['score'] . "</td>
            <td>". $row['no_of_wickets'] . "</td>
            <td>". $row['overs'] . "</td>
            <td>". $row['country'] . "</td>
        </tr>
    ";
?>
