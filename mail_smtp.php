<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                           
    $mail->Host       = $_ENV['SMTP_HOST'];                    
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = $_ENV['SMTP_USERNAME'];                
    $mail->Password   = $_ENV['SMTP_PASSWORD'];                
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
    $mail->Port       = $_ENV['SMTP_PORT'];                    


    $mail->setFrom('system@noreply.mam-laka.com', 'Mam-laka Support');
    $mail->addAddress('brian@mam-laka.com', 'system');

    
    $mail->isHTML(true);    
    $mail->Subject = 'Hello Yobus';
    $mail->Body    = 'Testing some Mailgun awesomeness!';
    $mail->AltBody = 'Testing some Mailgun awesomeness!';

    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
