<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';

// Data recovery
$lastname = $_POST['lastname'];
$firstName = $_POST['firstname'];
$name = $lastname . " " . $firstName;
$country = $_POST['country'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

try {
//    echo "test test test";
    //Server settings
//    $mail->SMTPDebug =
//        SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host =
        'smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth =
        true;                                   //Enable SMTP authentication
    $mail->Username = '2dc2dcf0d25697';                     //SMTP username
    $mail->Password = 'a501efc1c5bedf';                               //SMTP password
//    $mail->SMTPSecure =
//        PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port =
        2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('alextestadress@gmail.com');     //Add a recipient
//    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($email, $subject);
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

//    //Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
