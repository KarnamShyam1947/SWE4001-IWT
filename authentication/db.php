<?php
    $hostname = "localhost";
    $username = "root";
    $password = "shyam1947";
    $database = "work";

    $mysql = mysqli_connect($hostname, $username, $password, $database);

    if(!$mysql) {
        die("Unable to establish connection with database.");
    }
?>