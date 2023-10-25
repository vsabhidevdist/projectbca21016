
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <h1>Bookings</h1>
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="width:60rem;margin-top:100px;">
                    <tr>
                        
                        <th>Booking ID</th>
                        <th>Patient Name</th>
                
                        <th>Doctor Name</th>
                        <th>Booking Time</th>
                        <th>Slot</th>
                        <th>Booking Date</th>
                       
                        <th>Phone</th>
                        
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editbooking.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletebooking.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
     
       
     
       
    );

   
   $join=array(
    'user u'=>array('b.user_id=u.id','join'),
    'doctor d'=>array('b.doctor_id=d.id','join'),
);
     $fields=array('b.id','u.name as u_name','d.name as doctor_name','b.appo_time','b.slot','b.appo_date','u.phone');

    $users=$dao->selectAsTable($fields,'booking as b','b.id=b.id ORDER BY b.id DESC',$join,$actions,$config);
    
    echo $users;
            //  $d=$dao->getData(array('b.*,d.*,u.*'),"booking b JOIN doctor d ON b.doctor_id = d.id JOIN user u ON b.user_id = u.id");   
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
