
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <h1>USERS</h1>
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="width:60rem;margin-top:100px;">
                    <tr>
                        
                        <th>ID</th>
                        <th>Name</th>
                
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Email</th>
                        <th>Phone</th>
                       
                        <!-- <th>Passworde</th> -->
                        
                        <th>EDIT/SEND PASSWORD</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    // 'edit'=>array('label'=>'Edit','link'=>'edituser.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Send Password','link'=>'sendpass.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
     
       
     
       
    );

   
   $join=array(
   
);
     $fields=array('id','name','gender','dob','email','phone');

    $users=$dao->selectAsTable($fields,'user',1,1,$actions,1);
    
    echo $users;
            //  $d=$dao->getData(array('b.*,d.*,u.*'),"booking b JOIN doctor d ON b.doctor_id = d.id JOIN user u ON b.user_id = u.id");   
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
