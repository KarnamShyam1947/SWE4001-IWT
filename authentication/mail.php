<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



function sendOTPVerificationMail($from, $to, $otp) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                       
        $mail->isSMTP();                                             
        $mail->Host       = 'smtp.googlemail.com';                      
        $mail->SMTPAuth   = true;                                    
        $mail->Username   = 'vitap.library@gmail.com';                     
        $mail->Password   = 'gegelxonrrxarddq';                               
        $mail->SMTPSecure = 'tls';          
        $mail->Port       = 587;          
    
        //Recipients
        $mail->setFrom($from, 'KarnamShyam');
        $mail->addAddress($to['email'], $to['name']);     
        // $mail->addReplyTo('karnamshyam9346@gmail.com', 'Information');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        $html = "<pre>
        Dear " . $to['name'] . ",
        
        We've received a request to reset your password for your account. To verify your identity and set a new password, 
        please use the following One-Time Password (OTP):
        
        OTP: " . $otp . "
        
        Please use this OTP within the next one hour to reset your password.
        
        Thank you for using service. We're committed to keeping your account safe and secure.
        
        Sincerely,
        MyTeamName 
        </pre>";

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = "Reset Your Password - OTP Request";
        $mail->Body    = $html;
        // $mail->AltBody = $normalBody;
    
        $mail->send();
        // echo 'Message has been sent';
        return 'success';


    } catch (Exception $e) {
        return 'failed';
    }
    
}


