<?php
require("../../config/autoload.php");
$_GET['did'];

$dao= new DataAccess;
$set='';
if(isset($_GET['did'])){
    $dat= $dao->getDataJoin(array('date'),'schedule','doctor_id='.$_GET['did'].' and date>=CURDATE() LIMIT 7');
    foreach($dat as $d){
        $datee=$d['date'];
                 
        $dateTime = new DateTime($datee);
        $day = $dateTime->format('d-m-y');
     
        $set=$set+ "<option value=\'$datee\' class='form-control'> $day</option>" ;
    }
    echo "<select name='dateavailable'>";
    echo $set;
    echo "</select>";

}

?>