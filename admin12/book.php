<?php 

 require('../config/autoload.php'); 
include("header.php");

$file=new FileUpload();
$elements=array(
        "name"=>"","doctor"=>"","department"=>"","qualification"=>"","address"=>"","image"=>"","phone"=>"","age"=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();



if(isset($_POST["insert"]))
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
else
echo $file->errors();






?>

<?php



$drop= $dao->getDataJoin(array('id','name','phone'),'user');

 $dropss=array();
 foreach( $drop as $key=>$value)
 {
   $drops= array("id" =>$value['id'], "name" => $value['name'],"phone"=>$value['phone']);
   array_push($dropss,$drops);

 }

 $optionsArray = [];

 foreach ($dropss as $key=>$item) {
    
    $optionsArray[] = [
        "option" => 'User ID: '.$item['id'] . ',Name: ' . $item['name'] . ', Phone:' . $item['phone'],
        "value" => 'User ID: '.$item['id'] . ',Name: ' . $item['name'] . ', Phone:' . $item['phone']
      ];
    
 }

 
 // Convert the PHP array to a JSON string for JavaScript
 $optionsArrayJson = json_encode($optionsArray);


 if(isset($_POST['search'])){
    $user=$_POST['user'];
    $parts = explode(",", $user);

// Access the first part (User ID) and assign it to the $uid variable
$uid = trim(explode(":", $parts[0])[1]);
   echo "<script>location.replace('reports.php?uid=".$uid."');</script>";
 }
  ?>

  
    






<style>
.custom-dropdown {
  position: relative;
  width: 500px;
}

#customInput {
  width: 100%;
}

#customDropdown {
  display: none;
  position: absolute;
  list-style: none;
  padding: 0;
  margin: 0;
  background-color: #fff;
  border: 1px solid #ccc;
}

#customDropdown li {
    width:470px;
  padding: 5px;
  cursor: pointer;
}

#customDropdown li:hover {
  background-color: #e0e0e0;
}
.input-container {
    width:500px;
  display: inline-flex; /* Display children inline */
  align-items: center; /* Align items vertically center */
}

#customInput {
  margin-right: 10px; /* Add spacing between input and clear button */
}

.clear-button {
  cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
  color: #999; /* Define the color of the clear button */
}

.clear-button:hover {
  color: #333; /* Define a different color when hovering over the clear button */
}
</style>
<div class="main-panel">
    <form method="POST">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
            <div class="header-left">
                <button class="btn btn-primary mb-2 mb-md-0 me-2"> Book Appointment </button>
</div></div>
<form method="POST">
<div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
<div class="custom-dropdown">
  <label class="col-form-label"><b>Search Patient Record</b></label><br>
  <div class="input-container">
    <input type="text" name="user" id="customInput" placeholder="Type UID, Name, Phone" class="form-control d-inline">
    <span class="clear-button d-inline mdi mdi-close"></span>
  </div>
  <ul id="customDropdown"></ul>
</div>
</div>
<button type="submit" class="btn btn-primary mb-2" name='search'> Find </button>
</form>
            <script>
  const customInput = document.getElementById('customInput');
const customDropdown = document.getElementById('customDropdown');

// Define your array of objects with options and values
const optionsArrayyy = <?php echo $optionsArrayJson;?>;
const newData = [];

// Loop through the original data and transform it
optionsArrayyy.forEach(item => {
    newData.push({
        "option": item.option,
        "value": item.value
    });
});
optionsArray=newData;
// Function to populate the custom dropdown with options from the array
function populateDropdown() {
  customDropdown.innerHTML = '';
  optionsArray.forEach(function (item) {
    const listItem = document.createElement('li');
    listItem.textContent = item.option;
    listItem.setAttribute('data-value', item.value);
  
    customDropdown.appendChild(listItem);

    listItem.addEventListener('click', function () {
      customInput.value = item.option;
      customDropdown.style.display = 'none';
    });
  });
}

customInput.addEventListener('focus', function () {
  customDropdown.style.display = 'none';
  populateDropdown();
});

customInput.addEventListener('input', function () {
  customDropdown.style.display = 'block';
  const inputText = customInput.value.trim().toLowerCase();

  populateDropdown(); // Populate the dropdown with all options

  const filteredItems = customDropdown.querySelectorAll('li');

  filteredItems.forEach(function (item) {
    if (!item.textContent.toLowerCase().includes(inputText)) {
      item.style.display = 'none';
    } else {
      item.style.display = 'block';
    }
  });
});

document.querySelector('.clear-button').addEventListener('click', function() {
  document.querySelector('#customInput').value = '';
});

</script>

<html>
<head>
</head>
<body>

 <form action="" method="POST" enctype="multipart/form-data">

<div class="row">
                    <div class="col-md-6">
Doctor Name:

<select name="doctor" id="did" class="form-control" onchange="getDate(this)">
<option >Select</option>
<?php
 $doc= $dao->getDataJoin(array('id','name',),'doctor');
 foreach($doc as $k=>$d){
    $id=$d['id'];
    $name=$d['name'];
     echo "<option value='$id'>$name</option>";
 }
 ?>
</select>
Gender:

<select class="form-control" name="gender">
    <option value="M">Male</option>
    <option value="F">Female</option>
    <option value="O">Others</option>
</select>
     
Specialized Department:
<?php
 $doc= $dao->getDataJoin(array('id','name',),'doctor');


 ?>




<button type="submit" name="insert">Submit</button>
</form>


</body>

<script>

function getDate(selectThis){
    

// Step 2: Get the selected option's value
var selectedValue = selectThis.value;
    console.log(selectedValue);
    fetch('api/book.php?did='+selectedValue, {
        method: 'get',
        // may be some code of fetching comes here
    }).then(function(response) {
            if (response.status >= 200 && response.status < 300) {
                return response.text()
            }
            throw new Error(response.statusText)
        })
        .then(function(response) {
            console.log(response);
        })
    console.log("Clicked");
}
</script>
</html>