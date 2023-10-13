<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "name"=>"","image"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('name'=>"Department Name",'image'=>'Image');

$rules=array(
    "name"=>array("required"=>true,"minlength"=>2,"maxlength"=>30,"alphaspaceonly"=>true),
    "image"=>array("filerequired"=>true)

     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	if($fileName=$file->doUploadRandom($_FILES['image'],array('.jpg','.png','.jpeg'),100000,1,'../images'))	
    {


$data=array(

       
        'name'=>$_POST['name'],
        'image'=>$fileName,
        
         
    );

   // print_r($data);
  
    if($dao->insert($data,"department"))
    {
        echo "<p style=color:green;>New record created successfully</p>";

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

<div class="row">
                    <div class="col-md-6">
Department name:

<?= $form->textBox('name',array('class'=>'form-control')); ?>
<?= $validator->error('name'); ?>
Image:
<?= $form->fileField('image',array('class'=>'form-control')); ?>
<span style="color:red;"><?= $validator->error('image'); ?></span>
</div>
</div>

<button type="submit" name="insert">Submit</button>
</form>


</body>

</html>