<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($password == '21MIC7182') {

            session_start();
            $_SESSION['username'] = $username;

            header('location:profile.php');
        }
        else {
            session_start();
            $_SESSION['login'] = 0;
            header('location:login.php');
        }
       
    }
?>