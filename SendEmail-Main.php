<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                                    //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                               //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                           //Enable SMTP authentication
    $mail->Username   = 'YourEmailAddress@gmail.com';                   //SMTP username
    $mail->Password   = 'YourAppPassword';                              //SMTP password (I explained in Readme file that how you can find this password from your google account)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                    //Enable implicit TLS encryption
    $mail->Port       = 465;                                            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('YourEmailAddress@gmail.com', 'YourName');           //The recipient will see this name and email
    $mail->addAddress('YourDestinationAddress@gmail.com');              //Add a recipient
    $mail->addReplyTo('YourEmailAddress@gmail.com', 'YourName');        //The recipient will see this name and email during the reply


    //Content
    $mail->isHTML(true);                                                //Set email format to HTML
    $mail->Subject = 'The Subject';
    $mail->Body    = 'The Body <b>with bold text</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}