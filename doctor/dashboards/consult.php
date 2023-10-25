<?php

include('header.php');
require('dbcon.php');

$dateFormatted = date("Y-m-d");
$dateFormatted = trim($dateFormatted);

$bookedtimes=array('id','user_id','appo_date','appo_time','status','slot');
$did=$_SESSION['doctor_id'];
$bid=$_GET['bid'];

$slot="m";
$booking=$dao->getDataJoin($bookedtimes,'booking','id='.$bid);
if($booking[0]['status']!='confirm')
echo "<script>location.replace('bookings.php')</script>";
$pid=$booking[0]['user_id'];

$info2=$mysqli->query("SELECT
U.name AS user_name,
U.age AS user_age,
U.gender AS user_gender,
U.email AS user_email,
U.phone AS user_phone,
B.id AS booking_id,
B.appo_date as appo_date,
B.appo_time,
B.status,
D.name AS doctor_name,
R.rid,
R.did,
R.pid,
R.m_h,
R.m_a,
R.r_mp,
R.v_s,
R.lab_results,
R.bid,
R.summary,
R.p_t
FROM booking B
JOIN user U ON B.user_id = U.id
JOIN doctor D ON B.doctor_id = D.id
JOIN record R ON B.id = R.bid where R.pid=".$pid." and B.status='consulted' ORDER BY R.rid DESC;");

if($info2->num_rows==0){
  
 
  
}
$info=array();
while ($row = $info2->fetch_assoc()) {
  $info[]=$row;
}

$timeslot=$booking[0]['appo_time'];
$fields3=array('name','age','gender','email','phone');
$info2=$dao->getDataJoin($fields3,'user','id='.$booking[0]['user_id']);

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
"pid"=>array("required"=>true),
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

<style>
/* Initial style for accordion items */
.accordion-item {
  border: 1px solid #ddd;
  margin: 10px;
}

/* Style for accordion headers */
.accordion-header {
  background-color: #f5f5f5;
  padding: 10px;
  cursor: pointer;
}

/* Style for accordion content */
.accordion-content {
  display: none;
  padding: 10px;
}
</style>


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
              
               

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="openModalButton">
  Available Records
</button>
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Records Available</h5>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="accordion">
  <?php
foreach($info as $key=>$book){
  $bookingid=$book['bid'];
  $dt=$book['appo_date'];
  $rid=$book['rid'];
  $dname=$book['doctor_name'];
 
  
  echo "
  <div class=\"accordion-item\">
  <div class=\"accordion-header\"><b>RID: $rid Report On $dt - Booking ID: $bookingid       Consulted - $dname</b></div>
  <div class=\"accordion-content\">
  <b>Medical History:</b><br>$book[m_h]<br>
  <b>Medication and allergies:</b><br>$book[m_a]<br>
  <b>Recent Medical Treatment:</b><br>$book[r_mp]<br>
  <b>Vital Signs:</b><br>$book[v_s]<br>
  <b>Lab Results:</b><br>$book[lab_results]<br>
  <b>Summary:</b><br>$book[summary]<br>
  <b>Prescription and Treatment:</b><br>$book[p_t]<br>
  
  
  </div>
  </div>";
  
}

?>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>
    
   


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 
<script>

document.addEventListener("DOMContentLoaded", function() {
    const accordionItems = document.querySelectorAll(".accordion-item");
  
    accordionItems.forEach(function(item) {
      const header = item.querySelector(".accordion-header");
      const content = item.querySelector(".accordion-content");
  
      header.addEventListener("click", function() {
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
    });
  });


  let bootstrapCssLoaded = false; // Variable to track if Bootstrap CSS is loaded

// Function to load Bootstrap CSS
function loadBootstrapCSS() {
    // Check if the Bootstrap CSS has already been added
    if (!bootstrapCssLoaded) {
        // Create a new link element for Bootstrap CSS
        const link = document.createElement('link');
        link.id = 'bootstrap-css';
        link.rel = 'stylesheet';
        link.href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css'; // Replace with the actual path to Bootstrap CSS

        // Append the link element to the document's head
        document.head.appendChild(link);

        bootstrapCssLoaded = true; // Set the flag to true to indicate it's loaded
    }
}

// Function to open the modal
function openModal() {
    loadBootstrapCSS(); // Load Bootstrap CSS before opening the modal
    const modal = document.getElementById('exampleModal');
    modal.style.display = 'block';
}

// Function to close the modal and remove Bootstrap CSS
function closeModal() {
    const modal = document.getElementById('exampleModal');
    modal.style.display = 'none';

    // Check if Bootstrap CSS is loaded and remove it
    if (bootstrapCssLoaded) {
        const link = document.getElementById('bootstrap-css');
        if (link) {
            document.head.removeChild(link);
        }
        bootstrapCssLoaded = false; // Reset the flag
    }
}

// Attach click events to open and close the modal
document.getElementById('openModalButton').addEventListener('click', openModal);
document.querySelector('.close').addEventListener('click', closeModal);
  </script>