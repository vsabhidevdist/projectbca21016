
<?php require('../config/autoload.php'); 

if(!isset($_SESSION['admin_id']))
header('location: login/');?>

<?php
$dao=new DataAccess();



?>
<?php include('header.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
        <h1>Bookings</h1>
       <label for="startDate">Start Date:</label>
<input class="form-control" type="date" id="startDate" onchange="filterTableByDateRange()">
<label for="endDate">End Date:</label>
<input class="form-control" type="date" id="endDate" onchange="filterTableByDateRange()">
<label for="searchInput">Search by Doctor:</label>
<!-- <input type="text" id="filterInput" placeholder="Search..."> -->

<select class="form-control" type="text" id="filterInput" placeholder="Search...">

<option>..</option>
<?php
  $fields3=array('name');
  $info2=$dao->getDataJoin($fields3,'doctor');
  foreach($info2 as $row){
    echo "<option>".$row['name']."</options>";
  }
?>
</select><br>
<button class="form-control" onclick="refreshPage()">Refresh Page</button>
    	<div class="row">
            <div class="col-md-12">
                <table id="dataTable"  border="1" class="table" style="width:60rem;margin-top:100px;">
                    <tr>
                        
                        <th>Booking ID</th>
                        <th>Patient Name</th>
                
                        <th>Doctor Name</th>
                        <th>Booking Time</th>
                        <th>Slot</th>
                        <th>Booking Date</th>
                       
                        <th>Phone</th>
                        
                        <!-- <th>EDIT/DELETE</th> -->
                     
                      
                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editbooking.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'deletebooking.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
     
       
     
       
    );

   
   $join=array(
    'user u'=>array('b.user_id=u.id','join'),
    'doctor d'=>array('b.doctor_id=d.id','join'),
);
     $fields=array('b.id','u.name as u_name','d.name as doctor_name','b.appo_time','b.slot','b.appo_date','u.phone');

    $users=$dao->selectAsTable($fields,'booking as b','b.id=b.id ORDER BY b.id DESC',$join,1,$config);
    
    echo $users;
            //  $d=$dao->getData(array('b.*,d.*,u.*'),"booking b JOIN doctor d ON b.doctor_id = d.id JOIN user u ON b.user_id = u.id");   
                    
                   
    
?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    <script>

    function filterTableByDateRange() {
        var startDate = document.getElementById("startDate").value;
        var endDate = document.getElementById("endDate").value;
        var table = document.getElementById("dataTable");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            var cell = rows[i].getElementsByTagName("td")[5];
            var cellDate = cell.textContent || cell.innerText;

            // If the cell date is within the selected range, show the row; otherwise, hide it
            if (isDateInRange(cellDate, startDate, endDate)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

    function isDateInRange(cellDate, startDate, endDate) {
        // Assuming the cellDate, startDate, and endDate are in the format "yy-mm-dd"
        return cellDate >= startDate && cellDate <= endDate;
    }





    function filterTable() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filterInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2]; // Change index based on the column you want to filter
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // Attach the filterTable function to the input's onchange event
        document.getElementById("filterInput").addEventListener("input", filterTable);


        function refreshPage() {
            location.reload(); // Reloads the current page
        }
</script>
    
