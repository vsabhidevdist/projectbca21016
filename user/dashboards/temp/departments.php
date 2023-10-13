<?php require('../../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
<section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
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
        $name=$row['name'];
        $im=$row['image'];
        echo "<div class=col-lg-4 col-md-6 d-flex align-items-stretch>
        <div class=icon-box>
          <div ><img  class=fas src=/projectbca21016/images/$im width=150px /></div>
          <h4><a href=>$name</a></h4>
          <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
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