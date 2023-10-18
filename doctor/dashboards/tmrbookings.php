<?php

include('header.php');
$dateFormatted = date("Y-m-d",strtotime('+1 day'));
$dateFormatted = trim($dateFormatted);

$bookedtimes=array('id','user_id','appo_date','appo_time','status','slot');
$did=$_SESSION['doctor_id'];
$slot="m";
$bookedslots=$dao->getDataJoin($bookedtimes,'booking','doctor_id='.$did.' and status="confirm" and slot="m" AND appo_date="'.$dateFormatted.'" ORDER BY appo_time');

if (!empty($bookedslots)) {
    $msg='Bookings';
} else {
    $msg="No bookings today";
}

?>
 <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <div class="header-left">
                <button class="btn btn-primary mb-2 mb-md-0 me-2"> Morning </button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"><?php echo $msg; ?></button>
              </div>
              <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                  <a href="#">
                   
                  </a>
                  <a class="ps-3 me-4" href="#">
                  
                  </a>
                </div>
                <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                  
              </div>

              
            </div>

 <?php 
foreach($bookedslots as $booking){
    $bid=$booking['id'];
    $status=$booking['status'];
    $timeslot=$booking['appo_time'];
    $fields3=array('name','age');
    $info2=$dao->getDataJoin($fields3,'user','id='.$booking['user_id']);
    $name=$info2[0]['name'];
    $age=$info2[0]['age'];
    echo "
    <div class=\"card\">
    <div class=\"card-header\">
    Booking Id: $bid  |  Status: $status
    </div>
    <div class=\"card-body\">
    <h5 class=\"card-title\">$name</h5>
    <p class=\"card-text\">Age: $age  |  Time slot: $timeslot</p>
    <a href=\"consult.php?bid=$bid\" class=\"btn btn-primary\">Consult</a>
    </div>
    </div>
    ";
    
}


$bookedtimes=array('id','user_id','appo_date','appo_time','status','slot');
$did=$_SESSION['doctor_id'];
$slot="m";
$bookedslots=$dao->getDataJoin($bookedtimes,'booking','doctor_id='.$did.' and status="confirm" and slot="e" AND appo_date="'.$dateFormatted.'" ORDER BY appo_time');

if (!empty($bookedslots)) {
    $msg='Bookings';
} else {
    $msg="No bookings today";
}

?>
</div>
 <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <div class="header-left">
                <button class="btn btn-primary mb-2 mb-md-0 me-2"> Evening </button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"><?php echo $msg; ?></button>
              </div>
              <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                  <a href="#">
                   
                  </a>
                  <a class="ps-3 me-4" href="#">
                  
                  </a>
                </div>
                <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                  
              </div>

              
            </div>

 <?php 
foreach($bookedslots as $booking){
    $bid=$booking['id'];
    $status=$booking['status'];
    $timeslot=$booking['appo_time'];
    $fields3=array('name','age');
    $info2=$dao->getDataJoin($fields3,'user','id='.$booking['user_id']);
    $name=$info2[0]['name'];
    $age=$info2[0]['age'];
    echo "
    <div class=\"card\">
    <div class=\"card-header\">
    Booking Id: $bid  |  Status: $status
    </div>
    <div class=\"card-body\">
    <h5 class=\"card-title\">$name</h5>
    <p class=\"card-text\">Age: $age  |  Time slot: $timeslot</p>
    <a href=\"consult.php?bid=$bid\" class=\"btn btn-primary\">Consult</a>
    </div>
    </div>
    ";
    
}
?>


