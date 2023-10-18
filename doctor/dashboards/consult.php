<?php

include('header.php');
$dateFormatted = date("Y-m-d");
$dateFormatted = trim($dateFormatted);

$bookedtimes=array('id','user_id','appo_date','appo_time','status','slot');
$did=$_SESSION['doctor_id'];
$bid=$_GET['bid'];
$slot="m";
$booking=$dao->getDataJoin($bookedtimes,'booking','id='.$bid);
if($booking[0]['status']!='confirm')
echo "<script>location.replace('bookings.php')</script>";


$timeslot=$booking[0]['appo_time'];
$fields3=array('name','age','gender','email','phone');
$info2=$dao->getDataJoin($fields3,'user','id='.$booking[0]['user_id']);
$pid=$booking[0]['user_id'];
$name=$info2[0]['name'];
$age=$info2[0]['age'];
$g=$info2[0]['gender'];
$em=$info2[0]['email'];
$phone=$info2[0]['phone'];


$elements=array(
    "did"=>"","pid"=>"","m_h"=>"","m_a"=>"","r_mp"=>"","v_s"=>"","lab_results"=>"","bid"=>"","summary"=>"","p_t"=>"");


$form=new FormAssist($elements,$_POST);





$labels=array("did"=>"Doctor id","pid"=>"Patient id","m_h"=>"Medical History","m_a"=>"Medication and allergies","r_mp"=>"recent medical treatment","v_s"=>"vital signs","lab_results"=>"Lab results","bid"=>"booking id","summary"=>"Summary","p_t"=>"Prescription and treatment");

$rules=array(
"did"=>array("required"=>true),
"did"=>array("required"=>true),
"m_h"=>array("required"=>false),
"m_a"=>array("required"=>false),
"r_mp"=>array("required"=>false),
"v_s"=>array("required"=>false),
"lab_results"=>array("required"=>false),
"bid"=>array("required"=>true),
"summary"=>array("required"=>true),
"p_t"=>array("required"=>true),

 
);


$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{




$data=array(

   
    'did'=>$_POST['did'],
    "pid"=>$_POST['pid'],
    "m_h"=>$_POST['m_h'],
    "m_a"=>$_POST['m_a'],
    "r_mp"=>$_POST['r_mp'],
    "v_s"=>$_POST['v_s'],
    "lab_results"=>$_POST['lab_results'],
    "bid"=>$_POST['bid'],
    "summary"=>$_POST['summary'],
    "p_t"=>$_POST['p_t'],
     
);

// print_r($data);

if($dao->insert($data,"record"))
{
    
    $sdata=array(
        
        'status'=>'consulted'
      );
      if($dao->update($sdata,'booking','id='.$bid)){
        echo "<script>alert('Record submitted successfully!');</script>";
          echo "<script>location.replace('bookings.php')</script>";
      }
}


}
}





?>

<div class="main-panel">
    <form method="POST">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <div class="header-left">
                <button class="btn btn-primary mb-2 mb-md-0 me-2"> Consulting </button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0">Bid: <?= $bid?></button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0">Name: <?= $name?></button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0">Age: <?= $age?></button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0">Phone: <?= $phone?></button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0">Email: <?= $em?></button>
                <input type="hidden" name='bid' value='<?= $bid?>' readonly>
                <input type="hidden" name='pid' value='<?= $pid?>' readonly>
                <input type="hidden" name='did' value='<?= $did?>' readonly>
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
           <div class='row'>
         
           <div class="form-group">
                        <label for="exampleTextarea1">Medical History</label>
                        <textarea class="form-control" name='m_h' id="exampleTextarea1" rows="4"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Prescription and Treatment: *</label>
                        <textarea class="form-control" name='p_t' id="exampleTextarea1" rows="7"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Medications and Allergies:</label>
                        <textarea class="form-control" name='m_a' id="exampleTextarea1" ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Recent Medical Procedures:</label>
                        <textarea class="form-control" name='r_mp' id="exampleTextarea1" ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Vital Signs:</label>
                        <textarea class="form-control" name='v_s' id="exampleTextarea1" ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Laboratory and Test Results:</label>
                        <textarea class="form-control" name='lab_results' id="exampleTextarea1" ></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Summary: *</label>
                        <textarea class="form-control" name='summary' id="exampleTextarea1" rows="5"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary me-2" name='insert' value='submit'> Submit Record</button>
                    </form>
</div>