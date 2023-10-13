
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table  border="1" class="table" style="width:70rem;margin-top:100px;">
                    <tr>
                        
                        <th>Department Id</th>
                        <th>Department Name</th>
                        <th>Image</th>
                        <th>EDIT/DELETE</th>
                     
                      
                    </tr>
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

    $users=$dao->selectAsTable($fields,'department',1,$join,$actions,$config);
    
    echo $users;
                    
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
