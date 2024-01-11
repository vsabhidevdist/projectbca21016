<?php 

 require('../config/autoload.php'); 

 if(!isset($_SESSION['admin_id']))
header('location: login/');
include("header.php");

$file=new FileUpload();
$elements=array(
        "name"=>"","gender"=>"","department"=>"","qualification"=>"","address"=>"","image"=>"","phone"=>"","dob"=>"","description"=>"","fee"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array( "name"=>"Name","gender"=>"Gender","department"=>"Dept","qualification"=>"Qualification","address"=>"Address","image"=>"Image","phone"=>"Phone","dob"=>"DOB","description"=>"DESC","fee"=>"Fee");

$rules=array(
    "name"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
    "gender"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,"alphaonly"=>true),
    "department"=>array("required"=>true,"minlength"=>1,"maxlength"=>30,"integeronly"=>true),
    "qualification"=>array("required"=>true,"minlength"=>2,"maxlength"=>50),
    "address"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
    "image"=>array("filerequired"=>true),
    "phone"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
    "dob"=>array("required"=>true,"minlength"=>1,"maxlength"=>15),
    "description"=>array("required"=>true,"minlength"=>2,"maxlength"=>500),
    "fee"=>array("required"=>true,"minlength"=>1,"maxlength"=>5,"integeronly"=>true),

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.jpeg'),100000,1,'../doctorimage'))	
    {


$data=array(

       
        'name'=>$_POST['name'],
        "gender"=>$_POST['gender'],
        "department"=>$_POST['department'],
        "qualification"=>$_POST['qualification'],
        "address"=>$_POST['address'],
        "phone"=>$_POST['phone'],
        "dob"=>$_POST['dob'],
        'image'=>$fileName,
        'description'=>$_POST['description'],
        'fee'=>$_POST['fee']
        
         
    );

   // print_r($data);
  
    if($dao->insert($data,"doctor"))
    {
        echo "<p style=color:green;>New doctor created successfully</p>";

    }
    else
    echo "<p style=color:red;Insert failed</p>";
}
}
}
else
echo $file->errors();






?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
Doctor Name:

<?= $form->textBox('name',array('class'=>'form-control')); ?>
<?= $validator->error('name'); ?>
Gender:

<select class="form-control" name="gender">
    <option value="M">Male</option>
    <option value="F">Female</option>
    <option value="O">Others</option>
</select>
     
Specialized Department:
<?php
    $options = $dao->createOptions('name','id',"department");
     echo $form->dropDownList('department',array('class'=>'form-control'),$options); ?>
<?= $validator->error('department'); ?>
Doctor Qualification:

<?= $form->textBox('qualification',array('class'=>'form-control')); ?>
<?= $validator->error('qualification'); ?>
Address:

<?= $form->textBox('address',array('class'=>'form-control')); ?>
<?= $validator->error('address'); ?>
Image:
<?= $form->fileField('image',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('image'); ?></span>
Phone:

<?= $form->textBox('phone',array('class'=>'form-control')); ?>
<?= $validator->error('phone'); ?>
Date of Birth:

<input type="date" name="dob" class="form-control">
<?= $validator->error('dob'); ?>
Description:

<?= $form->textArea('description',array('class'=>'form-control')); ?>
<?= $validator->error('description'); ?>
Fee:

<?= $form->textBox('fee',array('class'=>'form-control')); ?>
<?= $validator->error('fee'); ?>
</div>
</div>

<button type="submit" name="insert"  value="sub">Submit</button>
</form>


</body>

</html>