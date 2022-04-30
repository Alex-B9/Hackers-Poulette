<?php
session_start();
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

//        echo "test test test";
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
        $mail->CharSet = 'UTF-8';

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


        if (empty($lastname)){
//            echo $_SESSION['ErrLastName'];
            $_SESSION['ErrLastName'] = "<script>alert('Please complete lastname')</script>";
            echo "<script> window.location.href='index.php';</script>";
//            header('location:index.php');
        } else if (empty($firstName)){
//            echo $_SESSION['ErrFirstName'];
            $_SESSION['ErrFirstName'] = "<script>alert('Please complete firstname')</script>";
            echo "<script> window.location.href='index.php';</script>";
//            header('location:index.php');
        } else if (empty($country)){
//            echo $_SESSION['ErrCountry'];
            $_SESSION['ErrCountry'] = "<script>alert('Please complete country')</script>";
            echo "<script> window.location.href='index.php';</script>";
        }else if (empty($email)){
//            echo $_SESSION['ErrEmail'];
            $_SESSION['ErrEmail'] = "<script>alert('Please complete email')</script>";
            echo "<script> window.location.href='index.php';</script>";
//            header('location:index.php');
        }else if (empty($message)){
//            echo $_SESSION['ErrMessage'];
            $_SESSION['ErrMessage'] = "<script>alert('Please complete message')</script>";
            echo "<script> window.location.href='index.php';</script>";
//            header('location:index.php');
        }else {
            $mail->send();

            //    echo 'Message has been sent';
        echo "<script> 
            alert('Message has been sent');
            window.location.href='index.php';
        </script>";
        }
//        echo '<body onLoad="alert(\'Message has been sent\')">';
//        header('location:index.php');
    } catch (Exception $e) {
        echo '<body onLoad="alert(\'Message could not be sent. Mailer Error: <?php {$mail->ErrorInfo} ?> \')">';
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
//session_destroy();