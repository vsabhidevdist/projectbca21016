<?php 
require('../../config/autoload.php');
$a=$_SESSION['user_id'];
if(!isset($a)){

  header('Location: /projectbca21016/user/login.php'); 
}
$dao=new DataAccess();


  $fields2=array('id','status','doctor_id','appo_date','appo_time','slot');
  $bookstat=$dao->getDataJoin($fields2,'booking','user_id='.$a.' and id='.$_GET['bid']);
  

    if($bookstat[0]['id']!=$_SESSION['booking_id']){

      header('Location: /projectbca21016/403.html'); 
    }
    if($bookstat[0]['status']=='confirm'){

      header('Location: /projectbca21016/user/payment/confirmation.php'); 
    }
    else{
        $doc=$dao->getDataJoin(['name','fee'],'doctor','id='.$bookstat[0]['doctor_id'].' LIMIT 1');
      $d =$bookstat[0]['appo_date'];
       $t=$bookstat[0]['appo_time'];
       $s=$bookstat[0]['slot'];
       if($s=='e')$s='Evening';
       else $s='Morning';
      $dname=$doc[0]['name'];
      $datetime="$d - $t $s";
      $fee=$doc[0]['fee'];


      if(isset($_POST['cancel'])){
        $data=array(
            'status'=>'cancelled'
        );
        if($dao->update($data,'booking','id='.$_GET['bid'])){
            echo "<script>location.replace('../dashboards/cancelconfirm.php')</script>";
        }
      }
      if(isset($_POST['pay'])){
       header('Location:pay.php');
      }
    }
    




?>
<html>
<head>
<style>
body{
    background: #ddd;
    min-height: 100vh;
    vertical-align: middle;
    display: flex;
    
}
.card{
    margin: auto;
    width: 600px;
    padding: 3rem 3.5rem;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.mt-50 {
    margin-top: 50px
}

.mb-50 {
    margin-bottom: 50px
}


@media(max-width:767px){
    .card{
        width: 90%;
        padding: 1.5rem;
    }
}
@media(height:1366px){
    .card{
        width: 90%;
        padding: 8vh;
    }
}
.card-title{
    font-weight: 700;
    font-size: 2.5em;
}
.nav{
    display: flex;
}
.nav ul{
    list-style-type: none;
    display: flex;
    padding-inline-start: unset;
    margin-bottom: 6vh;
}
.nav li{
    padding: 1rem;
}
.nav li a{
    color: black;
    text-decoration: none;
}
.active{
    border-bottom: 2px solid black;
    font-weight: bold;
}

input{
    border: none;
    outline: none;
    font-size: 1rem;
    font-weight: 600;
    color: #000;
    width: 100%;
    min-width: unset;
    background-color: transparent;
    border-color: transparent;
    margin: 0;
}
form a{
    color:grey;
    text-decoration: none;
    font-size: 0.87rem;
    font-weight: bold;
}
form a:hover{
    color:grey;
    text-decoration: none;
}
form .row{
    margin: 0;
    overflow: hidden;
}
form .row-1{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    overflow: hidden;
}
form .row-2{
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem;
}
form .row .row-2{
    border: none;
    outline: none;
    background-color: transparent;
    margin: 0;
    padding: 0 0.8rem;
}
form .row .col-2,.col-7,.col-3{
    display: flex;
    align-items: center;
    text-align: center;
    padding: 0 1vh;
}
form .row .col-2{
    padding-right: 0;
}

#card-header{
    font-weight: bold;
    font-size: 0.9rem;
}
#card-inner{
    font-size: 0.7rem;
    color: gray;
}
.three .col-7{
    padding-left: 0;
}
.three{
    overflow: hidden;
    justify-content: space-between;
}
.three .col-2{
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 0.5rem;
    outline: none;
    width: 100%;
    min-width: unset;
    border-radius: 5px;
    background-color: rgba(221, 228, 236, 0.301);
    border-color: rgba(221, 228, 236, 0.459);
    margin: 2vh 0;
    width: fit-content;
    overflow: hidden; 
}
.three .col-2 input{
    font-size: 0.7rem;
    margin-left: 1vh;
}
.btn{
    width: 100%;
    background-color: rgb(65, 202, 127);
    border-color: rgb(65, 202, 127);
    color: white;
    justify-content: center;
    padding: 2vh 0;
    margin-top: 3vh;
}
.btn:focus{
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none; 
}
.btn:hover{
    color: white;
}
input:focus::-webkit-input-placeholder { 
    color:transparent; 
}
input:focus:-moz-placeholder { 
    color:transparent; 
} 
input:focus::-moz-placeholder { 
    color:transparent; 
} 
input:focus:-ms-input-placeholder { 
    color:transparent; 
}
</style>
</head>
<body>

<div class="card mt-50 mb-50">
            <div class="card-title mx-auto">
            Pending Appointment
            </div>
            <div class="nav">
                <ul class="mx-auto">
                    
                 
                </ul>
            </div>
            <form method="POST">
             
             
                
                <div class="row-1">
                    <div class="row row-2">
                        <span id="card-inner">Doctor name</span>
                    </div>
                    <div class="row row-2">
                        <input type="text" value="<?php echo $dname;?>" readonly/>
                    </div>
                </div>
                <div class="row three">
                    <div class="col-7">
                        <div class="row-1">
                            <div class="row row-2">
                                <span id="card-inner">Date and Time of Appointment</span>
                            </div>
                            <div class="row row-2">
                                <input type="text" value="<?php echo $datetime;?>" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <input type="text" placeholder="Fee" disabled>
                    </div>
                    <div class="col-2">
                        <input type="text" value="Rs <?php echo $fee; ?>" readonly>
                    </div>
                </div>
                <button class="btn d-flex mx-auto" name='cancel' value='cancel'><b>Cancel</b></button>
                <button class="btn d-flex mx-auto" name='pay' value='pay'><b>Pay</b></button>
            </form>
        </div>

        
</body>
</html>