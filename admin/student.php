<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "name"=>"","age"=>"","phone"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('name'=>"Student name",'age'=>"Student age","phone"=>"Student Phone");

$rules=array(
    "name"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
    "age"=>array("required"=>true,"minlength"=>2,"maxlength"=>2,"integeronly"=>true),
    "phone"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       
        'name'=>$_POST['name'],
        'age'=>$_POST['age'],
        'phone'=>$_POST['phone']
        
         
    );

    print_r($data);
  
    if($dao->insert($data,"student"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
}}




?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
Student name:

<?= $form->textBox('name',array('class'=>'form-control')); ?>
<?= $validator->error('name'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Student Age:

<?= $form->textBox('age',array('class'=>'form-control')); ?>
<?= $validator->error('age'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Student Phone:

<?= $form->textBox('phone',array('class'=>'form-control')); ?>
<?= $validator->error('phone'); ?>

</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>


