<?php 

 require('../autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "name"=>"","gender"=>"","department"=>"","qualification"=>"","address"=>"","image"=>"","phone"=>"","age"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('name'=>"Department Name",'image'=>'Image');

$rules=array(
    "name"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
    "gender"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,"alphaonly"=>true),
    "department"=>array("required"=>true,"minlength"=>1,"maxlength"=>30,"integeronly"=>true),
    "qualification"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
    "address"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
    "image"=>array("filerequired"=>true),
    "phone"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
    "age"=>array("required"=>true,"minlength"=>1,"maxlength"=>2,"integeronly"=>true),

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.jpeg'),100000,1,'./doctorimage'))	
    {


$data=array(

       
        'name'=>$_POST['name'],
        "gender"=>$_POST['gender'],
        "department"=>$_POST['department'],
        "qualification"=>$_POST['qualification'],
        "address"=>$_POST['address'],
        "phone"=>$_POST['phone'],
        "age"=>$_POST['age'],
        'image'=>$fileName,
        
         
    );

   // print_r($data);
  
    if($dao->insert($data,"doctor"))
    {
        echo "<p style=color:green;>New doctor created successfully</p>";

    }
    else echo "<p style=color:red;>ALREADY EXIST</p>";
}
}
else
echo $file->errors();

}




?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">
 <div class="container-fluid p-0">


<div class="row">
                    <div class="col-md-8">
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
Age:

<?= $form->textBox('age',array('class'=>'form-control')); ?>
<?= $validator->error('age'); ?>
</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>