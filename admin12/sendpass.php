
<?php
require('../config/autoload.php'); 

$dao=new DataAccess();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$MAIL=$MAIL_ID;
$PASS=$MAIL_PASS;
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

function sendPass($name,$to,$pass,$MAIL,$PASS){
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = $MAIL;
    $mail->Password = $PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('theonecareofficial@gmail.com', 'OneCare');
    $mail->addAddress($to, $name);
    $mail->isHTML(true);
    $mail->Subject = 'OneCare Account';
    $mail->Body = 'Your password for account in OneCare for email id: '.$to.' is : '.$pass;
   
    $mail->send();
    echo "Email sent successfully!";
    sleep(3);
    echo "<script>alert('Password send via email');</script>";
    header("location:users.php");
} catch (Exception $e) {
    echo "Email delivery failed. Error: {$mail->ErrorInfo}";
}
}


$fields3=array('name','age','gender','email','password');
$info2=$dao->getDataJoin($fields3,'user','id='.$_GET['id']);

if(sendPass($info2[0]['name'],$info2[0]['email'],$info2[0]['password'],$MAIL,$PASS)){
    
}
?>