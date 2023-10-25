<?php require('../../config/autoload.php'); ?>

<?php
$dao=new DataAccess();
$a=$_SESSION['user_id'];
if(!isset($a)){
    header('Location: /projectbca21016/user/login.php');
  
}
$fields5=array('id','status');
$bookstat1=$dao->getDataJoin($fields5,'booking','user_id='.$a.' LIMIT 1');
   
    if($bookstat1[0]['status']=='paymentpending'){

      header('Location: /projectbca21016/user/payment/pendingpayment.php'); 
    }
    else{
        $fields2=array('id','doctor_id','booked_datetime','appo_date','appo_time','slot','status');
        $bookstat=$dao->getDataJoin($fields2,'booking','user_id='.$a.' ORDER BY id DESC LIMIT 20');
        
    }

  
if(isset($_POST['cancel']))
{
    $idd=$_POST['cancel'];
    header('Location: ./cancelappointment.php?bid='.$idd); 
}
if(isset($_POST['paycancel']))
{
    $idd=$_POST['paycancel'];
    header('Location: ../payment/pendingpayment.php?bid='.$idd); 
}

  


?>
<?php include('header.php'); ?>

    
<section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>-</h2>
          <p><h2>My Bookings</h2></p>
        </div>

        <div class="row">
         

          <?php
    
   


   foreach($bookstat as $bookings=>$booking){
  $download='';
    if($booking['status']=='consulted' || $booking['status']=='cancelled'){
        $cancelbtn='disabled';

        if($booking['status']=='consulted'){
            $download="  <form method=POST><a href='temp.php?bid=$booking[id]'>
        <button style='margin-right:500px;'
                type=\"submit\"
                class=\"btn btn-outline-primary btn-rounded btn-block fs-size-btn doc_book_btn py-2 doc_book_btn\"
                
                value='$booking[id]'
             
              
               
                >View Report</a></button></form> ";
        }
        else{
            $download='';
        }
    }
    
    else{
        $cancelbtn='';
    }
        $bno=$booking['id'];
        $appodate=$booking['appo_date'];
        $dateTime = new DateTime($appodate);
        $day = $dateTime->format('d-m-y');
        $dayOfWeek = $dateTime->format('l');
        $status=$booking['status'];
        $slot=$booking['slot'];
        switch($slot){
            case 'm':$slot='Morning';break;
            case 'e':$slot='Evening';break;
          
        }
        switch($status){
            case 'confirm':$s='Your booking is confirmed';break;
            case 'paymentpending':$s='Your booking payment is pending';break;
            case 'cancelled':$s='Your booking is cancelled';break;
            case 'consulted':$s='Consulted';break;
        }
        $appotime=$booking['appo_time'];
        $nopaycancel=$dao->getDataJoin(array('id'),'payment','booking_id='.$booking['id'].' LIMIT 1');
       if($booking['status']!='paymentpending' && !empty($nopaycancel)){
        $paycancel="  <form method=POST>
        <button
                type=\"submit\"
                class=\"btn btn-outline-primary btn-rounded btn-block fs-size-btn doc_book_btn py-2 doc_book_btn\"
                name='cancel'
                value='$booking[id]'
             
              
               
                $cancelbtn>Cancel Appointment</button></form> ";
        $fields3=array('id','amount');
        
        $rec=$dao->getDataJoin($fields3,'payment','booking_id='.$booking['id'].' LIMIT 1');
        
       

            $amt=$rec[0]['amount']; 
            $rec_no=$rec[0]['id']; 
            $msg="receipt";
           
   
       

        }else if(empty($nopaycancel)){
            $rec_no=' -- ';
            $amt=' -- ';
           $paycancel=" <form method=POST>
            <button
                    type=\"submit\"
                    class=\"btn btn-outline-primary btn-rounded btn-block fs-size-btn doc_book_btn py-2 doc_book_btn\"
                    name='paycancel'
                    value='$booking[id]'
                 
                  
                   
                    $cancelbtn>Cancel Appointment</button></form> ";
        }
        else{
            $rec_no=' -- ';
            $amt=' -- ';
           $paycancel=" <form method=POST>
            <button
                    type=\"submit\"
                    class=\"btn btn-outline-primary btn-rounded btn-block fs-size-btn doc_book_btn py-2 doc_book_btn\"
                    name='paycancel'
                    value='$booking[id]'
                 
                  
                   
                    $cancelbtn>Pay/Cancel Appointment</button></form> ";
        }
       
    
       
       $fields=array('id','name','department','qualification','image');
       $info=$dao->getDataJoin($fields,'doctor','id='.$booking['doctor_id']);
       $fields2=array('id','name');
       $depname=$dao->getDataJoin($fields2,'department','id='.$info[0]['department']);
      
     
        
       
            $img=$info[0]['image'];
            $name=$info[0]['name'];
            $dept=$depname[0]['name'];
            $q=$info[0]['qualification'];
            $id=$info[0]['id'];
        
            
      
echo "
<div class=\"card shadow border-0 docard padd\" >
    <div class=\"card-body p-lg-4 p-3 text-black \">
     
        <div class=\"d-flex mb-3\">
            <div class=\"flex-shrink-0 pe-2 pe-lg-4\"><a
                    ><img
                        src=\"../../doctorimage/$img\"
                        alt=\"$name\"
                        class=\"shadow docpic img-fluid rounded-circle border border-light border-3\" loading=\"lazy\" width=180px></a>
            </div>
            <div class=\"flex-grow-1 ms-lg-4 ms-2\">
                <div ><a class=\"docrcardtitle\"
                        >
                        <h2 class=\"mb-1 textline1 ft-wight-1\">$name</h2>
                    </a>
                    <p class=\"mb-0 me-2 textline2 akscolr4 fs013 heightline-1\">$dept, $q</p>
                </div>
                <div class=\"d-flex flex-row mb-2 mt-2\">
                    <div class=\"me-3\">
                        <p class=\"mb-0 me-2 akscolr4 fs013\">Receipt No & Amount</p>
                        <h6 class=\"mb-1 fs13 ft-wight-1\">$rec_no - Consultation Fee Rs.$amt</h6>
                    </div>
                   
                </div>
                <div class=\"d-flex flex-row mt-3 mb-2\"><img
                        src=\"./assets/img/cal.svg\"
                        class=\"pe-2\">
                    <p class=\"mb-0 me-2 dp-col2 textline1 fs013\">$day - $dayOfWeek
                   
                    </p>
                </div>
                <div class=\" d-flex flex-row mb-2\"><img
                        src=\"./assets/img/time.svg\"
                        class=\"pe-2\">
                    <p class=\"mb-0 me-2 dp-col2 textline1 fs013\">$appotime - $slot</p>
                </div>
            </div>
        </div>
        <hr class=\"hrline\">
        <div class=\"d-flex justify-content-between doc-timings-appointment\">
            <div class=\"dp-timeleft\">
                <h6 class=\"mb-1 heightline-2 fs13 ft-wight-1\"><span class=\"doc-weekdays\"></span><span
                        class=\"doc-timings\">$s</span></h6>
            </div>$download
            <div class=\"dp-timeright text-end\"><input type=\"hidden\" id=\"doc_name_4948706\" value=\"Dr Abraham Paul\">
          
                    $paycancel
                    </div>
                    

        </div>
    </div>
</div>";



  }
  ?>


        </div>

      </div>
    </section>
    <?php include('footer.php'); ?>