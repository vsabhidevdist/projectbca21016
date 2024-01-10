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
<?php require('../config/autoload.php'); 

?>
<?php
$dao=new DataAccess();


//if(isset($_SESSION['name']))
   // header('location:student/index.php');



$elements=array("email"=>"","password"=>"");
$form=new FormAssist($elements,$_POST);
$rules=array(
    'email'=>array('required'=>true),
    'password'=>array('required'=>true),
);
$validator=new FormValidator($rules);

if(isset($_POST['login']))
{
    if($validator->validate($_POST))
    {
        $data=array('email'=>$_POST['email'],'password'=>$_POST['password']);
        if($info=$dao->login($data,'user'))
        {
           
            $_SESSION['user_id']=$info['id'];
            $_SESSION['uname']=$info['name'];


	echo "<script> alert('$a');</script> ";	
		
   echo"<script> location.replace('displaycategory.php'); </script>";
			if(!isset($_GET['redirect']))
          header('location:/projectbca21016/user/dashboards/departments.php');
       else
       header('location:/projectbca21016/user/dashboards/appointment.php?id='.$_GET['redirect']);

 }
        else{
            $msg="invalid username or password";
			
				echo "<script> alert('Invalid username or password');</script> ";
        }
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
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form method="POST" class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name='email' placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" name='password' class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">

                  </div>
                  <div class="mt-3">
                    <input type="submit" name='login' class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value='Sign In' />
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
						
                    </div>
                    <a href="fpass.php" class="auth-link text-black">Forgot password?</a>
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