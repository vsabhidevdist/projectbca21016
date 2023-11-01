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
                <h4>Password Send Successfully</h4>
                <h6 class="font-weight-light"></h6>
                <form method="POST" class="pt-3">
                  <div class="form-group">
                    <h7 style='text-align:center;'>Dear <?=$_GET['name']?>,

We have received your request password has been successfully send to <?= $_GET['id']?>.
<br>
If you did not request this password send or believe this was done in error, please contact our support team immediately at [support theonecareofficial@gmail.com]</h7>
                
              
                  <div class="mt-3"><a href='login.php'>
                    <input type="button" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value='Back to Login' /></a>
               
                </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
						
                    </div>
                   
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