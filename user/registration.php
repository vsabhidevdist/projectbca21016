<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
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
<style type="text/css">
            .valErr{
                color:red!important;
            }
        </style>

<?php
require('../config/autoload.php'); 
$dao=new DataAccess();
$elements=array(
        "name"=>"","gender"=>"","age"=>"","email"=>"","phone"=>"","password"=>"","cpassword"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array('name'=>"Name","gender"=>"Gender","age"=>"Age","email"=>"Email","phone"=>"Phone number","password"=>"Password","cpassword"=>"Confirm Password");

$rules=array(
    "name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "gender"=>array("required"=>true,"minlength"=>1,"maxlength"=>6,"alphaonly"=>true),
    "age"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,"integeronly"=>true),
    "email"=>array("required"=>true,"email"=>true,"unique"=>array("field"=>"email","table"=>"user")),
    
    "phone"=>array("required"=>true,"integeronly"=>true,"minlength"=>10,"maxlength"=>10),
    
    "password"=>array("required"=>true),
    "cpassword"=>array("required"=>true,"compare"=>array("comparewith"=>"password","operator"=>"=")),
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST['register']))
{
    if($validator->validate($_POST))
    {
        // code for insertion 
		
        $data=array(
				'name'=>$_POST['name'],
				'gender'=>$_POST['gender'],
                'age'=>$_POST['age'],
				'email'=>$_POST['email'],
				'phone'=>$_POST['phone'],
				'password'=>$_POST['password'],
			
			);
			if($dao->insert($data,'user'))
			{
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="./assets/images/logo.jpg" width="200px">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form method="POST" class="pt-3">
                    <?php $msg=null; ?>
                <span class='font-weight-light'><?php echo $msg?$msg:$msg; ?></span>
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
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                    <span class="valErr"><?= $validator->error('password'); ?></span>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="cpassword" placeholder="Confirm Password">
                    <span class="valErr"><?= $validator->error('cpassword'); ?></span> 
                </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" checked readonly> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <input type='submit' class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name='register' value="Sign Up" />
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
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