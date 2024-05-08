<?php 
    $hostname = 'localhost';
    $password = 'shyam1947';
    $username = 'root';
    $database = 'work';

    $mysql = mysqli_connect($hostname, $username, $password, $database);

    if(!$mysql) {
        die('Failed to establish the connection');
    }
?>