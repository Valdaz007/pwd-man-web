<?php
session_start()
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function send($mail, $code){
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';                       // Host SMTP Server
    $mail->SMTPAuth = true;
    $mail->Username = 'support@nxtbetamine.com';           // Sender Email
    $mail->Password = 'NxtBetaMine@24';                     // Email Pwd
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465';                                    //Port Number
    
    $mail->setFrom('support@nxtbetamine.com');        // Sender Email

    $mail->addAddress($mail);       // Receiver Email

    $mail->Subject = "PWDMAN VERIFICATION CODE";     // Email Subject
    $mail->Body = "PWDMAN VERIFICATION CODE: ".$code;

    $mail->send();
    return true;
}
?>