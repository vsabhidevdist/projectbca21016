

<?php
require('../config/autoload.php'); 
include('header.php');
$dao=new DataAccess();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$MAIL=$MAIL_ID;
$PASS=$MAIL_PASS;
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';
function generateRandomPassword($length = 5) {
    $characters = '0123456789';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}
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
    $mail->Subject = 'You OTP for OneCare';
    $mail->Body = 'Your password for account in OneCare for email id: '.$to.' is : '.$pass;
   
    $mail->send();
    echo "Email sent successfully!";
} catch (Exception $e) {
    echo "Email delivery failed. Error: {$mail->ErrorInfo}";
}
}


$elements=array(
        "name"=>"","gender"=>"","age"=>"","email"=>"","phone"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('name'=>"Name","gender"=>"Gender","age"=>"Age","email"=>"Email","phone"=>"Phone number");

$rules=array(
    "name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "gender"=>array("required"=>true,"minlength"=>1,"maxlength"=>6,"alphaonly"=>true),
    "age"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,"integeronly"=>true),
    "email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"email","table"=>"user")),
    
    "phone"=>array("required"=>true,"integeronly"=>true,"minlength"=>10,"maxlength"=>10),
    
   
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST['register']))
{
    if($validator->validate($_POST))
    {
        // code for insertion 
		$randomPassword = generateRandomPassword();
        $data=array(
				'name'=>$_POST['name'],
				'gender'=>$_POST['gender'],
                'age'=>$_POST['age'],
				'email'=>$_POST['email'],
				'phone'=>$_POST['phone'],
				'password'=>$randomPassword,
			
			);
			if($dao->insert($data,'user'))
			{sendPass($_POST['name'],$_POST['email'],$randomPassword,$MAIL,$PASS);
				$msg="Registered Successfully";
			}
			else
				$msg="insertion failed";
                echo "<p style=color:green;>New User created successfully</p>";
		}
		
		
		
		
    }

if(isset($_POST['home']))
{
echo "<script> alert('New zxx created successfully');</script> ";
   echo"<script> location.replace('displaycategory.php'); </script>";

}

?>
 <div class="container-scroller">
     
   
                <form method="POST" class="pt-3">
                   <h1>New User Registration</h1>
               
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Name" name="name">
                    <span class="valErr"><?= $validator->error('name'); ?></span>
                  </div>
                  <div class="form-group">
                    <select name="gender" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Gender">
                    <option >Select Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>    
                </select>
                <span class="valErr"><?= $validator->error('gender'); ?></span>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" id="exampleInputEmail1" name="age" placeholder="Age">
                    <span class="valErr"><?= $validator->error('age'); ?></span>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name='email' placeholder="Email">
                    <span class="valErr"><?= $validator->error('email'); ?></span>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" id="exampleInputEmail1" name='phone' placeholder="Phone">
                    <span class="valErr"><?= $validator->error('phone'); ?></span>
                  </div>
           
                  <div class="mb-4">
                 
                  </div>
                  <div class="mt-3">
                    <input type='submit' class="form-control" name='register' value="Create New User" />
                  </div>
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
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>