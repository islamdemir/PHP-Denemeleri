<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '/wamp64/www/site/PHPMailer/src/Exception.php';
require '/wamp64/www/site/PHPMailer/src/PHPMailer.php';
require '/wamp64/www/site/PHPMailer/src/SMTP.php';

$fname = isset($_POST['fname']) ? $_POST['fname'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$subject = isset($_POST['subject']) ? $_POST['subject'] : 'Konu';
$message = isset($_POST['message']) ? $_POST['message'] : null;

if (!$email) {
    echo "E-Mail adresinizi girin";
} elseif (!$message) {
    echo "Lütfen mail içeriğinizi yazın";
} else {
    $mail = new PHPMailer(true);
    try {
        //Server settings   SMTP::DEBUG_SERVER
        $mail->SMTPDebug = true;                                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'example@example.com';                  //SMTP username
        $mail->Password   = 'password';                             //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet    = "UTF-8";
        $mail->setLanguage('tr');
        //Recipients
        $mail->setFrom('example@example.com', 'Name Lastname');
        $mail->addAddress('example@example.com', 'Name Lastname');    //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "Gönderen Adı: $fname <br> Gönderen E-Posta: $email <br> Mesaj: $message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}
