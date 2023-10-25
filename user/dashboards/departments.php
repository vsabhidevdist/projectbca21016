<?php require('../../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
class UndefinedArrayKeyException extends Exception {
  public function __construct($key) {
      parent::__construct("Undefined array key: $key");
  }
}
class ArrayOffsetException extends Exception {
  public function __construct($key) {
      parent::__construct("Undefined array key: $key");
  }
}
if(isset($_SESSION['user_id'])){
  $a=$_SESSION['user_id'];
  $fields2=array('id','status');
  try{
  $bookstat=$dao->getDataJoin($fields2,'booking','user_id='.$a.' LIMIT 1');
  

   
if(!empty($bookstat)){
     if($bookstat[0]['status']=='paymentpending'){
       
       header('Location: /projectbca21016/user/payment/pendingpayment.php'); 
      }
    }
  }
    catch(UndefinedArrayKeyException $e){
      $k='fg';
      echo $e->getMessage();
    }
  catch (Exception $e) {
    echo "An unexpected exception occurred: " . $e->getMessage();
}

catch (ArrayOffsetException $e) {
  echo "An unexpected exception occurred: " . $e->getMessage();
}




  }



  


?>
<?php include('header.php'); ?>

    
<section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>--</h2>
          <p><h2>Departments</h2></p>
        </div>

        <div class="row">
         

          <?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editdepartmentimage.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletedept.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('id'),
        'images'=>array(array('field'=>"image",'path'=>"../images/","attributes"=>array("height"=>'100'))),
        
    );

   
   $join=array();
     $fields=array('id','name','image');

    $users=$dao->getDataJoin($fields,'department',1);
    foreach ($users as $key => $row) {
      $dept=$row['id'];
        $name=$row['name'];
        $im=$row['image'];
        echo "<div class=col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0>
        <div class=icon-box>
          <div ><img  class=fas src=/projectbca21016/images/$im width=150px /></div>
          <h4><a href=>$name</a></h4>
          <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          <a href=doctors.php?id=$dept class=appointment-btn scrollto><span class=d-none d-md-inline>Make an</span> View Doctors</a>
        </div>
      </div>";
        }
    
   /* while($data = $users){
        echo "<div class=col-lg-4 col-md-6 d-flex align-items-stretch>
        <div class=icon-box>
          <div class=icon><i class=fas fa-heartbeat></i></div>
          <h4><a href=>$data[name]</a></h4>
          <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
        </div>
      </div>";
    }
                  */  
                    
                   
    
?>

        </div>

      </div>
    </section>
    <?php include('footer.php'); ?>