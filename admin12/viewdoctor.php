
<?php require('../config/autoload.php'); ?>
<style>
body{
    
}
    </style>
<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="overflow-y:scrollable;margin-top:100px;">
                    <tr>
                        
                        <th>Doctor Id</th>
                        <th>Doctor Name</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Qualification</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Phone</th>
                        <th>DOB</th>
                     
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editdoctorimage.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletedoctor.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('id'),
        'gender'=>array('gender'),
        'department'=>array('department'),
        'qualification'=>array('qualification'),
        'address'=>array('address'),
        'images'=>array(array('field'=>"image",'path'=>"../doctorimage/","attributes"=>array("height"=>'100'))),
        'phone'=>array('phone'),
        'dob'=>array('dob')
    );

   
   $join=array();
     $fields=array('id','name','gender','department','qualification','address','image','phone','dob');

    $users=$dao->selectAsTable($fields,'doctor',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
