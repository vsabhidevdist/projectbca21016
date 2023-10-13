<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "ename"=>"","eage"=>"","phone"=>"","eimage"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('ename'=>"Employee name",'eage'=>"Employee age","phone"=>"Employee Phone",'eimage'=>"Employee image");

$rules=array(
    "ename"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaspaceonly"=>true),
    "eage"=>array("required"=>true,"minlength"=>2,"maxlength"=>2,"integeronly"=>true),
    "phone"=>array("required"=>true,"minlength"=>10,"maxlength"=>10,"integeronly"=>true),
    "eimage"=>array("filerequired"=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['eimage'],array('.jpg','.png','.jpeg'),100000,1,'../images'))	
    {

$data=array(

       
        'ename'=>$_POST['ename'],
        'eage'=>$_POST['eage'],
        'ephone'=>$_POST['phone'],
        'eimage'=>$fileName,
        
         
    );

    //print_r($data);
  
    if($dao->insert($data,"employee"))
    {
        echo "<p style=color:green;>New record created successfully</p>";

    }
    else
        {$msg="Registration failed";} ?>


<?php
    
}
else
echo $file->errors();
}

}


?>
<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
Employee name:

<?= $form->textBox('ename',array('class'=>'form-control')); ?>
<?= $validator->error('ename'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Employee Age:

<?= $form->textBox('eage',array('class'=>'form-control')); ?>
<?= $validator->error('eage'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Employee Phone:

<?= $form->textBox('phone',array('class'=>'form-control')); ?>
<?= $validator->error('phone'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Employee image:

<?= $form->fileField('eimage',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('eimage'); ?></span>

</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>


