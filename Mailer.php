<?php

require_once './config.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$to='nicolas.machado@anima.edu.uy';

function sendMovieEmail($name, $image){
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                        
        $mail->Host = 'smtp.gmail.com';                     
        $mail->SMTPAuth = true;                                 
        $mail->Username = USER_EMAIL;                   
        $mail->Password = PASSWORD;                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         

        $mail->setFrom(USER_EMAIL, USER_NAME);

        $mail->addAddress($to); 

        $mail->addReplyTo(REPLY);

        $mail->isHTML(true); 
        $mail->Subject = 'Test PHPMailer';
        $mail->Body = 'Movie description '. $name .' and this is the image <img src="'. $image .'" alt="Movie" />';

        $mail->send();

        echo 'Message has been sent';
    } catch (Exception $exception) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
