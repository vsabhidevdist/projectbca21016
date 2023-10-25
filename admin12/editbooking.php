<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','booking','id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "appo_date"=>$info[0]['appo_date'],"appo_time"=>$info[0]['appo_time'],"doctor_id"=>$info[0]['doctor_id']);

	$form = new FormAssist($elements,$_POST);

$labels=array('appo_date'=>"Appointment date","appo_time"=>"Appointment time","doctor_id"=>"Doctor ID");

$rules=array(
  "appo_time"=>array("required"=>false),
    "appo_date"=>array("required"=>false),
  "doctor_id"=>array("required"=>false),
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

if(isset($_FILES['image']['name'])){
		
			
				
			
}
$data=array(

        'appo_date'=>$_POST['appo_date'],
        'appo_time'=>$_POST['appo_time'],
        'doctor_id'=>$_POST['doctor_id']
   
    );
  $condition='id='.$_GET['id'];

    

if($dao->update($data,'booking',$condition))
    {
        $msg="Successfullly Updated";

    }
    else
        {$msg="Failed";} ?>

<span style="color:green;"><?php echo $msg; ?></span>

<?php
    
}


}


	
	
	
	
?>

<html>
<head>
	<style>
		.form{
		border:3px solid blue;
		}
	</style>
</head>
<body>


	<form action="" method="POST" enctype="multipart/form-data" >
 
<div class="row">
                    <div class="col-md-6">
Appo time:

<input class="form-control" type='time' name="appo_time" value=<?=$elements['appo_time']?>>

</div>
</div>





<div class="row">
                    <div class="col-md-6">
Appointment date:


<input class="form-control" type='date' name="appo_date" value=<?=$elements['appo_date']?>>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Doctor:

<?php
                 $options = $dao->createOptions('name','id',"doctor");
                 echo $form->dropDownList('doctor_id',array('class'=>'form-control'),$options); ?>
            <?= $validator->error('doctor_id'); ?>

</div>
</div>







<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>