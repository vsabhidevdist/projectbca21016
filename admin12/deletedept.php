<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','department','id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "name"=>$info[0]['name'],"image"=>"");

	$form = new FormAssist($elements,$_POST);

$labels=array('name'=>"Department Name","image"=>"Department Image" );

$rules=array(
    "name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>false),
    "image"=>array("filerequired"=>true)

     
);
    
    


if(isset($_POST["btn_delete"]))
{


if(isset($_FILES['image']['name'])){
			if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.jpeg'),100000,5,'../images'))
			{
				$flag=true;
					
			}
}
$data=array(

        'name'=>$_POST['name'],
        'image'=>$fileName
    );
  $condition='id='.$_GET['id'];

    

if($dao->delete('department',$condition))
    {
        $msg="Successfullly Deleted";
        echo "<script>alert('Successfullly Deleted');</script>)";
        echo "<script>location.replace('viewdoctor.php');</script>)";
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
Department Name:

<?= $form->textBox('name',array('class'=>'form-control')); ?>


</div>
</div>


<div class="row">
                    <div class="col-md-6">
Are you sure to delete this department?
<button type="submit" class="form-control" name="btn_delete" >DELETE</button>
</div>
</div>





</form>

</body>
</html>