<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "cname"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('cname'=>"Category Name",);

$rules=array(
    "cname"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
   

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	


$data=array(

       
        'cname'=>$_POST['cname'],
        
        
         
    );

   // print_r($data);
  
    if($dao->insert($data,"category"))
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
Category name:

<?= $form->textBox('cname',array('class'=>'form-control')); ?>
<?= $validator->error('cname'); ?>

</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>


