<?php

require_once './config.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    private $subject;
    private $body;
    private $to;

    function __construct($name, $image){
        $this->subject = 'Avril and Nicolas - Movies API';
        $this->body = 'The name of the movie is ' . $name . ' and the image is ' . $image;
        $this->to = 'nicolas.machado@anima.edu.uy';
    }

    function send(){
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
    
            $mail->Subject = $this->subject;
            $mail->Body = $this->body;
    
            $mail->send();
    
            echo 'Message has been sent';
        } catch (Exception $exception) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

?>
