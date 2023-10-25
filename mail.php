<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$mail = new PHPMailer(true);
$emailBody = file_get_contents('user/dashboards/temp.php?bid=99');
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'theonecareofficial@gmail.com';
    $mail->Password = 'umta eqsh ufwt ayar';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('theonecareofficial@gmail.com', 'OneCare');
    $mail->addAddress('vsabhidev12@gmail.com', 'Abhidev V S');
    $mail->isHTML(true);
    $mail->Subject = 'Hello, this is a test email';
    $mail->Body = $emailBody;

    $mail->send();
    echo "Email sent successfully!";
} catch (Exception $e) {
    echo "Email delivery failed. Error: {$mail->ErrorInfo}";
}
?>