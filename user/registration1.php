



<!DOCTYPE html>
<html lang="en">



<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register Form</title>

    <!-- Icons font CSS-->
    <link href="reg/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="reg/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="reg/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="reg/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="reg/css/main.css" rel="stylesheet" media="all">



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
				$msg="Inserted Successfully";
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




    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                    
				
					<p><?php if(isset($msg)) echo $msg; ?></p>
                        <div class="input-group">
                             <?= $form->textBox('name',array("placeholder"=>"Name")); ?>
                           <span class="valErr"><?= $validator->error('name'); ?></span>
                               
                               
                        </div>
                         <div class="input-group">
                         <select class="form-control" name="gender">
                <option value="M">Male</option>
                 <option value="F">Female</option>
           
                    </select>
                               
                        </div>
                        <div class="input-group">
                             <?= $form->textBox('age',array("placeholder"=>"Age")); ?>
                           <span class="valErr"><?= $validator->error('age'); ?></span>
                               
                               
                        </div>
                         <div class="input-group">
                             <?= $form->textBox('email',array("placeholder"=>"Email")); ?>
                           <span class="valErr"><?= $validator->error('email'); ?></span>
                               
                               
                        </div>
                         <div class="input-group">
                             <?= $form->textBox('phone',array("placeholder"=>"Phone Number")); ?>
                           <span class="valErr"><?= $validator->error('phone'); ?></span>
                               
                               
                        </div>
                         <div class="input-group">
                             <?= $form->passwordbox('password',array("placeholder"=>"Password")); ?>
                           <span class="valErr"><?= $validator->error('password'); ?></span>
                               
                               
                        </div>
                        
                          <div class="input-group">
                             <?= $form->passwordbox('cpassword',array("placeholder"=>"Confirm Password")); ?>
                           <span class="valErr"><?= $validator->error('cpassword'); ?></span>
                               
                        </div>
                        
                        
                        
                        
                        
                        
                      
                         
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" name="register" type="submit">Register</button>
                               </div>
                                <div class="p-t-10">
                              <button class="btn btn--pill btn--green" name="home" type="submit">Home</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="reg/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="reg/vendor/select2/select2.min.js"></script>
    <script src="reg/vendor/datepicker/moment.min.js"></script>
    <script src="reg/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="reg/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->