<?php require('../config/autoload.php'); ?>
<?php
	

include("header.php");
$dao=new DataAccess();
$info=$dao->getData('*','department','sid='.$_GET['id']);

$elements=array(
        "name"=>$info[0]['name'],'image'=>$info[0]['image']);

	$form = new FormAssist($elements,$_POST);

$labels=array('name'=>"Department Name",'image'=>'Department Image');

$rules=array(
    "name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "image"=>array("filerequired"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["btn_update"]))
{
if($validator->validate($_POST))
{
$data=array(

        'name'=>$_POST['sname'],
       
    );
  $condition='sid='.$_GET['id'];

    if($dao->update($data,'student',$condition))
    {
        $msg="Successfullly Updated";
header('location:viewdepartment.php');
    }
    else
        {$msg="Failed";} ?>

<span style="color:red;"><?php echo $msg; ?></span>

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


	<form action="" method="POST" >
 
<div class="row">
                    <div class="col-md-6">
Name:

<?= $form->textBox('sname',array('class'=>'form-control')); ?>
<?= $validator->error('sname'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
Age:

<?= $form->textBox('sage',array('class'=>'form-control')); ?>
<?= $validator->error('sage'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Sex:

<?php
                    $options=array('Male'=>"m","Female"=>"f");
                    echo $form->radioGroup('ssex',array(),$options); ?>
<?= $validator->error('ssex'); ?>

</div>
</div>


<div class="row">
                    <div class="col-md-6">
Dept name:

<?php
                    $options = $dao->createOptions('dname','dno',"dept");
                    echo $form->dropDownList('deptno',array('class'=>'form-control'),$options); ?>
<?= $validator->error('deptno'); ?>

</div>
</div>

<div class="row">
                    <div class="col-md-6">
DOJ:

<?= $form->inputBox('sdob',array('class'=>'form-control'),"date") ?>
<span style="color:red;"><?= $validator->error('sdob'); ?></span>

</div>
</div>







<button type="submit" name="btn_update"  >UPDATE</button>
</form>

</body>
</html>