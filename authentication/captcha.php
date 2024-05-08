<?php 
    session_start();
    $captcha = md5(random_bytes(64));
    $captcha_code = substr($captcha, 0, 6);

    $_SESSION['captcha'] = $captcha_code;

    $layer = imagecreatetruecolor(70, 30); // size
    $bgColor = imagecolorallocate($layer, 255, 0, 0); 
    imagefill($layer, 0, 0, $bgColor);

    $fgColor = imagecolorallocate($layer, 255, 255, 255);

    imagestring($layer, 5, 5, 5, $captcha_code, $fgColor);
    header('Content-Type:image/jpeg');

    imagejpeg($layer);
?>
