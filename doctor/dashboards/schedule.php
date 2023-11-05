<?php

include('header.php');
$dao=new DataAccess();
$elements=array(
        "date"=>"","m_start"=>"","m_end"=>"","e_start"=>"","e_end"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array("date"=>"Date of booking","m_start"=>"Morning start","m_end"=>"Morning end","e_start"=>"Evening start","e_end"=>"Evening end");

$rules=array(
    "date"=>array("required"=>true),
    "m_start"=>array("required"=>true),
    "m_end"=>array("required"=>true),
    "e_start"=>array("required"=>true),
    
    "e_end"=>array("required"=>true),
    
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST['submit']))
{
    if($validator->validate($_POST))
    {
      

// Create a DateTime object using the original time string
$date1 = new DateTime($_POST['m_start']);
$date2 = new DateTime($_POST['m_end']);
$date3 = new DateTime($_POST['e_start']);
$date4 = new DateTime($_POST['e_end']);

// Convert it into the 12-hour format using the `format` method
$formatted_time1 = $date1->format('g:i A');
$formatted_time2 = $date2->format('g:i A');
$formatted_time3 = $date3->format('g:i A');
$formatted_time4 = $date4->format('g:i A');


        // code for insertion 
		
        $data=array(
				'date'=>$_POST['date'],
				'm_start'=>$formatted_time1,
        'm_end'=>$formatted_time2,
				'e_start'=>$formatted_time3,
				'e_end'=>$formatted_time4,
				'doctor_id'=>$_SESSION['doctor_id']
			
			);
			if($dao->insert($data,'schedule'))
			{
				echo "<script> alert('Scheduled successfully');</script> ";
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

<div class="main-panel">
          <div class="content-wrapper pb-0">
<div class="content-wrapper pb-0">
           <div class="page-header flex-wrap">
            
<div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add schedule</h4>
                    <div class="form-group">
                        <form method="POST">
                      <label>Date</label>
                      <input type="date" name='date' class="form-control form-control-lg" placeholder="Date" aria-label="Username">
                    </div>
                    <div class="form-group">
                      <label>Morning Start</label>
                      <select name="m_start" class="form-control" aria-label="Start Time">
    <option >Select Time</option>
    <option value="6:00">6:00</option>
    <option value="6:15">6:15</option>
    <option value="6:30">6:30</option>
    <option value="6:45">6:45</option>
    <option value="7:00">7:00</option>
    <option value="7:15">7:15</option>
    <option value="7:30">7:30</option>
    <option value="7:45">7:45</option>
    <option value="8:00">8:00</option>
    <option value="8:15">8:15</option>
    <option value="8:30">8:30</option>
    <option value="8:45">8:45</option>
    <option value="9:00">9:00</option>
    <option value="9:15">9:15</option>
    <option value="9:30">9:30</option>
    <option value="9:45">9:45</option>
    <option value="10:00">10:00</option>
    <option value="10:15">10:15</option>
    <option value="10:30">10:30</option>
    <option value="10:45">10:45</option>
    <option value="11:00">11:00</option>
    <option value="11:15">11:15</option>
    <option value="11:30">11:30</option>
    <option value="11:45">11:45</option>
    <option value="12:00">12:00</option>
</select>
                    </div>
                    <div class="form-group">
                      <label>Morning End</label>
                      <select name="m_end" class="form-control" aria-label="Start Time">
    <option >Select Time</option>
    <option value="6:00">6:00</option>
    <option value="6:15">6:15</option>
    <option value="6:30">6:30</option>
    <option value="6:45">6:45</option>
    <option value="7:00">7:00</option>
    <option value="7:15">7:15</option>
    <option value="7:30">7:30</option>
    <option value="7:45">7:45</option>
    <option value="8:00">8:00</option>
    <option value="8:15">8:15</option>
    <option value="8:30">8:30</option>
    <option value="8:45">8:45</option>
    <option value="9:00">9:00</option>
    <option value="9:15">9:15</option>
    <option value="9:30">9:30</option>
    <option value="9:45">9:45</option>
    <option value="10:00">10:00</option>
    <option value="10:15">10:15</option>
    <option value="10:30">10:30</option>
    <option value="10:45">10:45</option>
    <option value="11:00">11:00</option>
    <option value="11:15">11:15</option>
    <option value="11:30">11:30</option>
    <option value="11:45">11:45</option>
    <option value="12:00">12:00</option>
</select>
                    </div>
                    <div class="form-group">
                      <label>Evening Start</label>
                      <select name="e_start" class="form-control" aria-label="Start Time">
    <option value="">Select Time</option>
   
    <option value="3:00">3:00</option>
    <option value="3:15">3:15</option>
    <option value="3:30">3:30</option>
    <option value="3:45">3:45</option>
    <option value="4:00">4:00</option>
    <option value="4:15">4:15</option>
    <option value="4:30">4:30</option>
    <option value="4:45">4:45</option>
    <option value="5:00">5:00</option>
    <option value="5:15">5:15</option>
    <option value="5:30">5:30</option>
    <option value="5:45">5:45</option>
    <option value="6:00">6:00</option>
    <option value="6:15">6:15</option>
    <option value="6:30">6:30</option>
    <option value="6:45">6:45</option>
    <option value="7:00">7:00</option>
    <option value="7:15">7:15</option>
    <option value="7:30">7:30</option>
    <option value="7:45">7:45</option>
    <option value="8:00">8:00</option>
    <option value="8:15">8:15</option>
    <option value="8:30">8:30</option>
    <option value="8:45">8:45</option>
    <option value="9:00">9:00</option>
</select>
                    </div>
                    <div class="form-group">
                      <label>Evening End</label>
                      <select name="e_end" class="form-control" aria-label="Start Time">
    <option value="">Select Time</option>

    <option value="3:00">3:00</option>
    <option value="3:15">3:15</option>
    <option value="3:30">3:30</option>
    <option value="3:45">3:45</option>
    <option value="4:00">4:00</option>
    <option value="4:15">4:15</option>
    <option value="4:30">4:30</option>
    <option value="4:45">4:45</option>
    <option value="5:00">5:00</option>
    <option value="5:15">5:15</option>
    <option value="5:30">5:30</option>
    <option value="5:45">5:45</option>
    <option value="6:00">6:00</option>
    <option value="6:15">6:15</option>
    <option value="6:30">6:30</option>
    <option value="6:45">6:45</option>
    <option value="7:00">7:00</option>
    <option value="7:15">7:15</option>
    <option value="7:30">7:30</option>
    <option value="7:45">7:45</option>
    <option value="8:00">8:00</option>
    <option value="8:15">8:15</option>
    <option value="8:30">8:30</option>
    <option value="8:45">8:45</option>
    <option value="9:00">9:00</option>
</select>
                    </div>
                    
                    <button type="submit" name='submit' value='sub' class="btn btn-primary mb-2"> Submit </button>
                  </div>
</form>
                </div>
              </div>