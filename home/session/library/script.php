<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

function sendEmail($email, $subject, $template_body): string
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
    //Send using SMTP
    $mail->isSMTP();
    //Enable SMTP authentication
    $mail->SMTPAuth = true;
    //Set the SMTP server to send through
    $mail->Host = MAILHOST;
    $mail->Username = USERNAME;
    $mail->Password = PASSWORD;
    //Enable implicit TLS encryption
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);            
    $mail->addAddress($email);
    //Content
    //Set email format to HTML
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $template_body;
    
    try {
        $mail->send();
        return "Correo enviado.";
    } catch (Exception $e) {
        return "Error al enviar el correo con una excepcion : ".$e->getMessage(); 
    }
}