<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','booking','id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "id"=>$info[0]['id']);

	$form = new FormAssist($elements,$_POST);

$labels=array('name'=>"Department Name","image"=>"Department Image" );

$rules=array(
    "name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>false),
    "image"=>array("filerequired"=>true)

     
);
    
    


if(isset($_POST["btn_delete"]))
{



  $condition='id='.$_GET['id'];

    

if($dao->delete('booking',$condition))
    {
        $msg="Successfullly Deleted";
        
    }
    else
        {$msg="Failed";} ?>

<span style="color:green;"><?php echo $msg; ?></span>

<?php
    


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
Booking id:

<?= $form->textBox('id',array('class'=>'form-control')); ?>


</div>
</div>


<div class="row">
                    <div class="col-md-8">
Are you sure to delete this booking?
</div>
</div>





<button type="submit" name="btn_delete" >DELETE</button>
</form>

</body>
</html>