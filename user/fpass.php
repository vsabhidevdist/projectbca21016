<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/logo.jpg" />
  </head>
  <body>
<?php require('../config/autoload.php'); 

?>
<?php
$dao=new DataAccess();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';
$msg='';
//if(isset($_SESSION['name']))
   // header('location:student/index.php');
$MAIL=$MAIL_ID;
$PASS=$MAIL_PASS;
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
        $mail->Subject = 'You Password for OneCare';
        $mail->Body = 'Your password for account in OneCare for email id: '.$to.' is : '.$pass;
       
        $mail->send();
       
    } catch (Exception $e) {
        echo "Email delivery failed. Error: {$mail->ErrorInfo}";
    }
    }

$elements=array("email"=>"","password"=>"");
$form=new FormAssist($elements,$_POST);
$rules=array(
    "email"=>array("required"=>true,"email"=>true,"dbexist"=>array("field"=>"email","table"=>"user")),
   
);
$validator=new FormValidator($rules);

if(isset($_POST['sendpass']))
{
    if($validator->validate($_POST))
    {
      
        
     $email = $_POST['email'];
$a='login';
$fields2=array('name','password','email');
        $user=$dao->getDataJoin($fields2,'user','email="'.$email.'" LIMIT 1',1);

sendPass($user[0]['name'],$email,$user[0]['password'],$MAIL,$PASS);
header('location:cfpass.php?id='.$email.'&name='.$user[0]['name']);
		
 
			
          
       
          $msg="Valid";

 
        
    }
    else{
        $msg="Invalid username or password";
        
            echo "<script> alert('Invalid username or password');</script> ";
    }

    
}


?>


<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="./assets/images/logo.jpg">
                </div>
                <h4>Forgot Password</h4>
                <h6 class="font-weight-light"></h6>
                <form method="POST" class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name='email' placeholder="Registered Email">
                  </div>
              
                  <div class="mt-3">
                    <input type="submit" name='sendpass' class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value='Send Password' />
                <span style='color:red;'><?= $msg ?></span> 
                </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
						
                    </div>
                    <a href="login.php" class="auth-link text-black">Back to login</a>
                  </div>
                 
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="registration.php" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>