<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function send($email, $code){
    try{
        $mail = new PHPMailer(true);
        $mail->isSMTP();                     
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.titan.email';                   // Host SMTP Server
        $mail->Username = 'support@nxtbetamine.com';                // Sender Email
        $mail->Password = 'password';                     // Email Pwd
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';                                    //Port Number
        
        $mail->setFrom('support@nxtbetamine.com');          // Sender Email
    
        $mail->addAddress($email);                            // Receiver Email
    
        $mail->Subject = "PWDMAN VERIFICATION CODE";         // Email Subject
        $mail->Body = "PWDMAN VERIFICATION CODE: ".$code;
    
        $mail->send();
        return true;
    }
    catch(Exception $e){
        return $e;
    }
}
?>
