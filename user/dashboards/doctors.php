<?php require('../../config/autoload.php'); 
$dao=new DataAccess();
if(isset($_SESSION['user_id'])){
  $a=$_SESSION['user_id'];
  $fields2=array('id','status');
  $bookstat=$dao->getDataJoin($fields2,'booking','user_id='.$a.' LIMIT 1');
  

  if(!empty($bookstat)){
    if($bookstat[0]['status']=='paymentpending'){

      header('Location: /projectbca21016/user/payment/pendingpayment.php'); 
    }
  }
}
?>
<?php
	

include("header.php");







	
	
	
?>
<section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
          <p><h2>Doctors</h2></p>
        </div>

        <div class="row">
<?php
      $fields=array('id','name','department','qualification','image');
    $info=$dao->getDataJoin($fields,'doctor','department='.$_GET['id']);
    $fields2=array('id','name');
    $depname=$dao->getDataJoin($fields2,'department',1);
    $departmentname=array();
    foreach ($depname as $depid=>$depnamee){
      $departmentname+=$depnamee;
    }
   
    foreach ($info as $key => $row) {
      $img=$row['image'];
      $name=$row['name'];
      $dept=$departmentname['name'];
      $q=$row['qualification'];
      $id=$row['id'];
       echo "<div class=col-lg-6 mt-4 mt-lg-0>
       <div class=member d-flex align-items-start>
         <div class=pic><img src=/projectbca21016/doctorimage/$img class=img-fluid alt=></div>
         <div class=member-info>
           <h4>$name</h4>
           <span>$dept</span>
           <p>$q</p>
           <a href=appointment.php?id=$id class= appointment-btn scrollto><span class=d-none d-md-inline>Make an</span> Book Appointment</a>
           
      
         </div>
       </div>
     </div>";

    }
    
    ?>

          

         

        </div>

      </div>
    </section>
    <?php include('footer.php'); ?>