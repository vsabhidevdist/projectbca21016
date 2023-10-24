<?php

include('header.php');
require('dbcon.php');

$a=1;
$info2=$mysqli->query("SELECT
U.name AS user_name,
U.age AS user_age,
U.gender AS user_gender,
U.email AS user_email,
U.phone AS user_phone,
B.id AS booking_id,
B.appo_date,
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
JOIN record R ON B.id = R.bid where U.id=".$a." and B.status='consulted' ORDER BY R.rid DESC;");

if($info2->num_rows==0){
  echo "<script>alert('No records found');</script>";
  sleep(1);
  echo "<script>location.replace('record.php');</script>";
}
$info=array();
while ($row = $info2->fetch_assoc()) {
  $info[]=$row;
}
// $fields3=array('name','age','gender','email','phone');
// $info2=$dao->getDataJoin($fields3,'user','id='.$a);
// print_r($info);
$name=$info[0]['user_name'];
$age=$info[0]['user_age'];
$g=$info[0]['user_gender'];
$em=$info[0]['user_email'];
$phone=$info[0]['user_phone'];

// $fields4=array('id','appo_date','appo_time','status','doctor_id');
// $info=$dao->getDataJoin($fields4,'booking','user_id='.$a.' AND status="consulted"  ORDER BY id DESC');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
</head>
  <body>
    <h1>Hello, world!</h1>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="accordion">
  <?php
foreach($info as $key=>$book){
  $bid=$book['bid'];
  $dt=$book['appo_date'];
  $rid=$book['rid'];
  $dname=$book['doctor_name'];
 
  
  echo "
  <div class=\"accordion-item\">
  <div class=\"accordion-header\"><b>RID: $rid Report On $dt - Booking ID: $bid       Consulted - $dname</b></div>
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
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
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
</script>
</html>