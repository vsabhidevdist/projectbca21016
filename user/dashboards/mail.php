<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../../config/autoload.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
require '../../phpmailer/src/Exception.php';
require('../../tcpdf/tcpdf.php');

$mail = new PHPMailer(true);


ob_start(); // Start output buffering

// Simulate passing the query parameter 'bid' (you can get this value from your URL or any source you prefer)
$_GET['bid'] = 99;

// Include the PHP page
include 'temp.php';

// Capture the output (HTML content) into a variable
$htmlContent = ob_get_clean();

$pdf = new TCPDF();
$pdf->SetAutoPageBreak(true, 0);
$pdf->AddPage('P', 'A4');

$pdf->writeHTML($htmlContent, true, false, true, false, '');
// $pdf->writeHTML('Your PHP page content goes here...');
$pdfContent = $pdf->Output('your_file.pdf', 'S');


    // // Retrieve the PDF data URL from the client
    // $pdfData = $_POST['pdfData'];

    // // Remove the "data:application/pdf;base64," prefix to extract the base64-encoded PDF content
    // $pdfData = str_replace('data:application/pdf;base64,', '', $pdfData);

    // // Decode the base64 data and save the PDF on the server
    // $pdfContent = base64_decode($pdfData);
   
    // $pdfFilename = 'captured_page.pdf';
    // file_put_contents($pdfFilename, $pdfContent);
    
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $MAIL_ID;
        $mail->Password = $MAIL_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        $mail->setFrom('theonecareofficial@gmail.com', 'OneCare');
        $mail->addAddress('vsabhidev12@gmail.com', 'Abhidev V S');
        $mail->addStringAttachment($pdfContent, 'document.pdf');
        $mail->isHTML(true);
        $mail->Subject = 'Hello, this is a test email';
        $mail->Body = 'd';
        
        $mail->send();
        echo "Email sent successfully!";
    } catch (Exception $e) {
        echo "Email delivery failed. Error: {$mail->ErrorInfo}";
    }

    ?>