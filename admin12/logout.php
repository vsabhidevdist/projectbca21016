
<?php require('../config/autoload.php'); 



if(session_destroy()){

    header('Location: login/login.php');
}
 

?>