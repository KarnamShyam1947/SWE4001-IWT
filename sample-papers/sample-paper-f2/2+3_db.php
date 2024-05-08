<?php 
    // -------- for 2nd question use this --------
    // $hostname = "192.168.100.101";
    // $password = "ap";
    // $username = "vit";
    // $database = "mydb";
    // -------- according to second question -------

    $hostname = "localhost";
    $password = "shyam1947";
    $username = "root";
    $database = "work";

    $mysql = mysqli_connect($hostname, $username, $password, $database);

    if(!$mysql) {
        die("Failed to establish the connection");
    }
?>