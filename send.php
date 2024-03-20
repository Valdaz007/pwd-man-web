<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';                       // Host SMTP Server
    $mail->SMTPAuth = true;
    $mail->Username = 'info@nexttowntech.com.pg';           // Sender Email
    $mail->Password = 'info@ntt_#2023';                     // Email Pwd
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465';                                    //Port Number
    
    $mail->setFrom('info@nexttowntech.com.pg');        // Sender Email

    $mail->addAddress("support@nxtbetamine.com");       // Receiver Email

    $mail->Subject = "Email Testing";     // Email Subject
    $mail->Body = "Hello, World!";

    $mail->send();

    echo
    "
    <script>
    document.location.href = 'index.php';
    alert('Sent Successfully');
    </script>
    ";
}
?>