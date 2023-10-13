<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "itemname"=>"","itemprice"=>"","cid"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('itemname'=>"Item Name",'itemprice'=>"Item Price",'cid'=>"Category ID",);

$rules=array(
    "itemname"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
    "itemprice"=>array("required"=>true,"minlength"=>2,"maxlength"=>10,"integeronly"=>true),
    "cid"=>array("required"=>true,"minlength"=>1,"maxlength"=>100,"integeronly"=>true),

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       
        'itemname'=>$_POST['itemname'],
        'itemprice'=>$_POST['itemprice'],
        'cid'=>$_POST['cid'],
        
         
    );
// print_r($data);
    
  
    if($dao->insert($data,"item"))
    {
        echo "<p style=color:green;>New record created successfully</p>";

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
Item name:

<?= $form->textBox('itemname',array('class'=>'form-control')); ?>
<?= $validator->error('itemname'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Item Price:

<?= $form->textBox('itemprice',array('class'=>'form-control')); ?>
<?= $validator->error('itemprice'); ?>

</div>
</div>
<div class="row">
                    <div class="col-md-6">
Category ID:
<?php
    $options = $dao->createOptions('cname','cid',"category");
     echo $form->dropDownList('cid',array('class'=>'form-control'),$options); ?>
<?= $validator->error('cid'); ?>

</div>
</div>
<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>


