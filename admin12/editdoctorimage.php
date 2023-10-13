<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','doctor','id='.$_GET['id']);
$file=new FileUpload();
$elements=array(
        "name"=>$info[0]['name'],"gender"=>$info[0]['gender'],"department"=>$info[0]['department'],"qualification"=>$info[0]['qualification'],"address"=>$info[0]['address'],"image"=>"","age"=>$info[0]['age'],"phone"=>$info[0]['phone']);

	$form = new FormAssist($elements,$_POST);

$labels=array('name'=>"Doctor Name","gender"=>"Doctor Gender","department"=>"Doctor Department","qualification"=>"Doctor Qualification","address"=>"Doctor Address",'image'=>"Doctor Image",'age'=>'Doctor age' );

$rules=array(
  "name"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
    "gender"=>array("required"=>true,"minlength"=>1,"maxlength"=>6,"alphaonly"=>true),
    "department"=>array("required"=>true,"minlength"=>1,"maxlength"=>50,"integeronly"=>true),
    "qualification"=>array("required"=>true,"minlength"=>1,"maxlength"=>50,"alphaspaceonly"=>true),
    "address"=>array("required"=>true,"minlength"=>1,"maxlength"=>50,"alphaspaceonly"=>true),
    "image"=>array("filerequired"=>true),
    "phone"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
    "age"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,"integeronly"=>true),
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{

if(isset($_FILES['image']['name'])){
			if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.jpeg'),100000,5,'../doctorimage'))
			{
				$flag=true;
					
			}
}
$data=array(

        'name'=>$_POST['name'],
        'gender'=>$_POST['gender'],
        'department'=>$_POST['department'],
        'qualification'=>$_POST['qualification'],
        'address'=>$_POST['address'],
        'image'=>$fileName,
        'phone'=>$_POST['phone'],
        'age'=>$_POST['age'],
   
    );
  $condition='id='.$_GET['id'];
if(isset($flag))
			{	$data['image']=$fileName;
		
			}
    

if($dao->update($data,'doctor',$condition))
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
Name:

<?= $form->textBox('name',array('class'=>'form-control')); ?>
<?= $validator->error('name'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Gender:

<select class="form-control" name="gender">
    <option>select</option>
    <option value="M">Male</option>
    <option value="F">Female</option>
    
</select>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Age:

<?= $form->textBox('age',array('class'=>'form-control')); ?>
<?= $validator->error('age'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Phone:


<?= $form->textBox('phone',array('class'=>'form-control')); ?>
<?= $validator->error('phone'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Department:

<?php
                 $options = $dao->createOptions('name','id',"department");
                 echo $form->dropDownList('department',array('class'=>'form-control'),$options); ?>
            <?= $validator->error('department'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Qualification:

  <?= $form->textBox('qualification',array('class'=>'form-control')); ?>
<?= $validator->error('qualification'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Address:

<?= $form->textBox('address',array('class'=>'form-control')); ?>
<?= $validator->error('address'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Image:


<?= $form->fileField('image',array('class'=>'form-control')); ?>

</div>
</div>





<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>