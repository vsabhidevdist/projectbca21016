<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';
require '../../phpmailer/src/Exception.php';
require('../../tcpdf/tcpdf.php');

$mail = new PHPMailer(true);

require('../../config/autoload.php');
require('../../doctor/dashboards/dbcon.php');

$bid=$_GET['bid'];
$data=$mysqli->query('SELECT
U.name AS user_name,
U.email AS user_email,
U.phone AS user_phone,
B.id AS booking_id,
B.appo_date as appo_date,
D.name AS doctor_name,
R.p_t AS pre,
R.nextc AS nextc,
P.id AS rec_no,
P.amount AS amount
FROM booking B
JOIN user U ON B.user_id = U.id
JOIN doctor D ON B.doctor_id = D.id
JOIN record R ON B.id = R.bid
JOIN payment P ON B.id = P.booking_id
 where B.id='.$bid.';');
while ($row = $data->fetch_assoc()) {
    $info[]=$row;
  }
 
$uname=$info[0]['user_name'];
$uphone=$info[0]['user_phone'];
$uemail=$info[0]['user_email'];
$rec_value=$info[0]['rec_no'];
$date_value=$info[0]['appo_date'];
$dname=$info[0]['doctor_name'];
if(!empty($info[0]['nextc']))
  $nextc=$info[0]['nextc'];
  else $nextc="Nill";
$appo_date=$date_value;
$pre=$info[0]['pre'];
$lineLength = 70;

// Use the wordwrap function to wrap the text
$wrappedString = wordwrap($pre, $lineLength, "\n", true);
$pre=$wrappedString;
$amt="Rs.".$info[0]['amount']."/-";
// ob_start(); // Start output buffering

// // Simulate passing the query parameter 'bid' (you can get this value from your URL or any source you prefer)
// $_GET['bid'] = 99;

// // Include the PHP page
// include 'temp.php';

// // Capture the output (HTML content) into a variable
// $htmlContent = ob_get_clean();
$htmlContent='<!DOCTYPE html>
<html>
<head>
    <title>Patient Appointment Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .info {
            margin-top: 20px;
        }
        .info table {
            width: 100%;
        }
        .info table, .info table th, .info table td {
            border-collapse: collapse;
        }
        .info table th, .info table td {
            padding: 10px;
            text-align: left;
        }
        .info table th {
            background-color: #f2f2f2;
        }
        .prescription {
            margin-top: 20px;
        }
        .payment {
            margin-top: 20px;
            text-align: left;
            padding-bottom: 50px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
            background: #f2f2f2;
            padding: 10px 0;
            bottom:0;
        }
        .brand-name {
            text-align: center;
            margin-top: 100px;
            font-size: 40px;
            font-weight: bold;
            color:#2c4964;
        }
    </style>
</head>
<body>
    <div class="container">
       
        <div class="brand-name">
        OneCare
        </div>
        <h3 style="color:#2c4964;text-align: left;">Patient Appointment Report</h3>
        <div class="info">
            <table>
                <tr>
                    <th>To</th>
                    <td>USER_VALUE</td>
                </tr>
                <tr>
                    <th>Invoice No</th>
                    <td>rec_value</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>phone_value</td>
                </tr>
                    <tr>
                    <th>Date</th>
                    <td>Date_value</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>email_value</td>
                </tr>
            </table>
        </div>

        <div class="prescription">
            <h2>PRESCRIPTION/SUMMARY</h2>
            <p>prescription_value</p>
        </div>

        <div class="payment">
            <h2>Details</h2>
            <table>
                <tr>
                    <th>Consultation Fee</th>
                    <td>amount_value</td>
                </tr>
                <tr>
                    <th>Doctor Name</th>
                    <td>doctor_name</td>
                </tr>
                <tr>
                    <th>Appointment Date</th>
                    <td>appo_date</td>
                </tr>
                <tr>
                    <th>Follow up Date:</th>
                    <td>next_c</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer">
        Phone: 123-456-7890 | Email: theonecareofficial@gmail.com | Address: OneCare, Ernakulam
    </div>
</body>
</html>';
$htmlContent = str_replace('USER_VALUE', $uname, $htmlContent);
$htmlContent = str_replace('rec_value', $rec_value, $htmlContent);
$htmlContent = str_replace('phone_value', $uphone, $htmlContent);
$htmlContent = str_replace('Date_value', $date_value, $htmlContent);
$htmlContent = str_replace('email_value', $uemail, $htmlContent);
$htmlContent = str_replace('prescription_value', $pre, $htmlContent);
$htmlContent = str_replace('amount_value', $amt, $htmlContent);
$htmlContent = str_replace('doctor_name', $dname, $htmlContent);
$htmlContent = str_replace('appo_date', $appo_date, $htmlContent);
$htmlContent = str_replace('next_c', $nextc, $htmlContent);
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
        $mail->addAddress($uemail, $uname);
        $mail->addStringAttachment($pdfContent, $uname.'.pdf');
        $mail->isHTML(true);
        $mail->Subject = 'Hello, Here is your Appointment report';
        $mail->Body = $htmlContent;
        
        $mail->send();
        echo "Email sent successfully!";
        echo "<script>location.replace('bookings.php');</script>";
    } catch (Exception $e) {
        echo "Email delivery failed. Error: {$mail->ErrorInfo}";
        echo "<script>location.replace('booking.php');</script>";
    }

    ?>