<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();

$elements=array(
    "username"=>"","password"=>"","id"=>"");


$form=new FormAssist($elements,$_POST);
//$file=new FileUpload();
$labels=array("username"=>"Username","password"=>"Password","id"=>"ID");

$rules=array(
    
"username"=>array("required"=>true,"unique"=>array("field"=>"username","table"=>"doctor")),
"password"=>array("required"=>true),
"id"=>array("required"=>true)

);


$validator = new FormValidator($rules,$labels);

if(isset($_POST['submit']))
{ 
if($validator->validate($_POST))
{


    
    $data=array(
        'username'=>$_POST['username'],
        'password'=>$_POST['password']
      );
      if($dao->update($data,'doctor','id='.$_POST['id'])){
       echo "<script> alert('Id pass added successfully');</script> ";
      }
    
}
}
    



?>
<?php include('header.php'); ?>
<?php 
$drop= $dao->getDataJoin(array('id','name'),'doctor');

 $dropss=array();
 foreach( $drop as $key=>$value)
 {
   $drops= array("id" =>$key, "name" => $value);
   array_push($dropss,$drops);

 }

 $optionsArray = [];

 foreach ($dropss as $key=>$item) {
    $reg=$item['name'];
    $optionsArray[] = [
    "option" => $reg,
          "value" => $item["id"]
      ];
    
 }

 
 // Convert the PHP array to a JSON string for JavaScript
 $optionsArrayJson = json_encode($optionsArray);
  ?>
  
				

				<h1 class="h3 mb-3"><strong>Id and Password</strong> for Doctor</h1><br>
     <form method="POST">
   
     Doctor:
<?php
    $options = $dao->createOptions('name','id',"doctor");
     echo $form->dropDownList('id',array('class'=>'form-control'),$options); ?>
<div class="form-group">
                      <label>Username</label>
                      <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Username">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name='password' class="form-control" placeholder="Password" aria-label="Username">
                    </div>
                    <button type="submit" name='submit' value='sub' class="btn btn-primary mb-2"> Submit </button><br>
                
</form>
    
 
<!-- <div class="custom-dropdown"> -->
  <!-- <input type="text" id="customInput" placeholder="Type or select an option"> -->
  <!-- <ul id="customDropdown"> -->
    <!-- <li data-value="Option 1">Option 1</li> -->
    <!-- <li data-value="Option 2">Option 2</li> -->
    <!-- <li data-value="Option 3">Option 3</li> -->
  <!-- </ul> -->
<!-- </div> -->