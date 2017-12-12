<?php
ini_set('display-error',1);
error_reporting(E_ALL&~E_NOTICE);

if($connect=@mysql_connect("localhost","root"))
  echo"";
  else
die(@mysql_error());
$connect=@mysql_select_db("projectmonitoring");
session_start();

if($_SESSION['user']=='' && $_SESSION['pass']=='')
{
  header('Location: login.php');
}

$content2=mysql_query("select * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
$total2=@mysql_affected_rows();

    
$row1=mysql_fetch_array($content2);

$user2=$row1['username'];
$pass2=$row1['password'];
$cust_type2=$row1['cust_type'];
$comp_name2=$row1['comp_name'];
$phone_num2=$row1['phone_num'];
$fax2=$row1['fax'];
$email2=$row1['email'];
$firstname2=$row1['firstname'];
$middlename2=$row1['middlename'];
$lastname2=$row1['lastname'];
$contact2=$row1['contact'];
$city2=$row1['city'];
$street2=$row1['street'];
$b=''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.';

$a= date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
<title>Billing Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
  <script src="jQuery/jQuery-2.1.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
      <!--- datatables -->
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/responsive/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/css/jquery.dataTables.min.css">
  <script src="http://localhost/xampp/capstone/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="http://localhost/xampp/capstone/DataTables/responsive/js/dataTables.responsive.min.js"></script>
  <!--- datatables -->
</head>
<!--Style-->
<style type="text/css">
body
{
  background-color:#bcab90;
  margin: 0px;
}
h6
{
  border-bottom: 2px solid black;
 
}
.w3-camo-dark-green
{
  color:#fff;background-color:#535640
}
.w3-camo-earth
{
  color:#fff;background-color:#ac7e54
}
.w3-navbar
{
  width: 103%;
  margin-left: -17px;
}
</style>
<!--Style-->


<!--Form action-->
<form action="billing1.php?prepared=<?php echo ''.$b.'' ?>" method="post" name="frm" id="frm">
<!--Form action-->

<!--authentications-->
<?php
if(isset($_SESSION['pos']) && ($_SESSION['pos']=='admin' || $_SESSION['pos']=='Admin') )
{

echo'<body class="w3-container">
<!--navbar-->
<ul class="w3-navbar w3-card-4 w3-camo-dark-green w3-large">
  <li><a href="main.php"><i class="fa fa-home" style="height: 22px; text-align: center;">  Fareal Builders Inc.</i></a></li>
    <li class="w3-dropdown-hover w3-hover-orange">
    <a class="w3-hover-brown" href="#">Transaction<i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <h6>Quotation</h6>  
      <a href="quot1.php">Quotation-Form</a>
      <h6>P.O.</h6>  
      <a href="purchaseorder1.php">Purchase order</a>
      <h6>Delivery</h6>  
      <a href="delivery1.php">Delivery</a>
      <h6>M.R.</h6>  
      <a href="materialrequisition1.php">Material Requisition</a>
      <h6>Pullout</h6>  
      <a href="pullout1.php">Pull-out</a>
      <h6>Billing</h6>
      <a href="billing1.php">Billing</a>
      <h6>Payment</h6>
      <a href="payment1.php">Payment</a>
    </div>
    </li>
  <li class="w3-dropdown-hover w3-hover-orange">
    <a class="w3-hover-brown" href="#">Maintenance<i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">  
    <h6>Supplier</h6>  
      <a href="supplier.php">Supplier</a>
    <h6>Employee</h6>  
      <a href="position.php">Position</a>
      <a href="employee.php">Employee</a>
    <h6>Materials</h6>  
      <a href="category.php">Category</a>
      <a href="subcategory.php">Sub-Category</a>
      <a href="unit_measurement.php">Unit Measurement</a>
      <a href="materials.php">Materials</a>
    </div>
    </li>
         <li class="w3-dropdown-hover w3-hover-orange">
    <a class="w3-hover-brown" href="#">Utilities<i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">  
   <h6>Misc.</h6>  
      <a href="audit_trail.php">Audit Trail</a>
      <h6>Back up & Restore</h6>

<a href="restoresupplier.php">Supplier</a>
   
      <a href="restoreposition.php">Position</a>
      <a href="restoreemployee.php">Employee</a>
     
      <a href="restorecategory.php">Category</a>
      <a href="restoresubcategory.php">Sub-Category</a>
      <a href="restoreunitmeasurement.php">Unit Measurement</a>
      <a href="restorematerials.php">Materials</a>
          <h6>Inventory</h6>
      <a href="inventory.php">Inventory</a>
    </div>
    </li>
    <li class="w3-right w3-dropdown-hover w3-hover-orange">';
      ?>
    <a class="w3-black w3-hover-black" href="#"><?php echo ''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.'; ?> <i class="fa fa-user"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4" style="right:0">
      <?php echo' <h5><a href="employee_account.php">User Settings</a></h5>
      <h5><a href="?logout=true">Logout</a></h5>
    </a></li>
    <li class="w3-right" style="margin-top:8px;"><span id="time" style="margin-left: -250px;"></span></li>
</ul>
<!--navbar-->';
}


if(isset($_SESSION['pos']) && $_SESSION['pos']=='Quantity Surveyor')
{

  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo '<script type="text/javascript">window.location.href="login.php";</script>'; 

}

if(isset($_SESSION['pos']) && $_SESSION['pos']=='Secretary')
{

  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
}
if(isset($_SESSION['pos']) && $_SESSION['pos']=='Foreman')
{
  
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo '<script type="text/javascript">window.location.href="login.php";</script>'; 

}
if(isset($_SESSION['pos']) && $_SESSION['pos']=='Stockman')
{

  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
}
if(isset($_SESSION['pos']) && $_SESSION['pos']=='Accountant')
{
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
}
?>
<!--navbar-->

<?php
if(isset($_GET['logout']))
{
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!--row class start-->
<div class="w3-row">
<!--row class-->

<!--card to left-->
<div class="w3-col w3-container m6 l8">
<!--card to left-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:100%; margin-top: 10px; ">
<!--card start-->

<!--card Header-->
<header class="w3-container w3-camo-dark-green w3-round">
  <h1>Transactions: Billing</h1>
</header>
<!--card Header-->

<!--Left Body-->

<!--First box-->
<br>
<?php
$content1=mysql_query("select * from quotation where quote_no='".$_POST['cname']."' and balance >0");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];



$hell=$noo+1;


$cust=$row['customer'];
$proj=$row['project'];
$total=$_POST['scname'];
$balance=$_POST['balance'];
$topay=$_POST['totalamount'];
$start=$_POST['startdate'];
$end=$_POST['enddate'];


$status="Active";


$prep= mysql_real_escape_string($_GET['prepared']);




if(isset($_POST['btnAdd']))

{




mysql_query("insert into billing (customer, project,totalcost, balance, topay, datee, enddate, prepared, status ) 
  values('".$cust."','". $proj."','". $total."','".$total."', '".$topay."','".$a."' ,'".$end."', '".$prep."', '".$status."')");
  
echo '<script type="text/javascript">alert("It has been added")</script>'; 
echo "<meta http-equiv='refresh' content='0'>";

}






//Update query1
  if(isset($_POST['btnSave']))
                {
                    $billing_no11= $_POST['billing_no1'];
                    $cust11=$_POST['cust1'];  
                    $topay11=$_POST['topay1'];
                    $end11=$_POST['end1'];
                  


                  
                    mysql_query("UPDATE billing SET topay='".$topay11."', enddate='".$end11."' WHERE billing_no='".$billing_no11."'");
                    echo "<script type='text/javascript'>alert('Update Successful!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
 
                                       
                }


?>

<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM quotation where status='active' and balance >0";
$results = $db_handle->runQuery($query);
?>

<script>
function getState(val) {
  $.ajax({
  type: "POST",
  url: "get_state3.php",
  data:'country_id='+val,
  success: function(data){
    $("#scname").html(data);
  }
  });
}

</script>







    
    <br>

<!--3 box--> 

<br>
<div class="w3-row-padding">





  <div class="w3-third">
    <label style="margin-left:-190px;">Customer:</label>
        <select name="cname" id="cname" class="form-control" onChange="getState(this.value);" style="width:100%;"></p>
        <option value="">--Select Customer--</option>
                <?php
                foreach($results as $country) {
                ?>
                <option value="<?php echo $country["quote_no"]; ?>"><?php echo $country["customer"]; ?>|<?php echo $country["project"]; ?>"</option>

                <?php
                }
              echo'</select>';?>
  </div>


  


  <div class="w3-third">
  <?php
  $a= date("d/m/Y");
  ?>
    <label style="margin-left:-120px;">Date:</label>
    <input class="w3-input w3-border" type="text" placeholder="TAX" value="<?php echo $a; ?>" id="startdate" name="startdate" style="margin-left:50px; height:33px; width:70%;"  disabled>
  </div>
  <div class="w3-third">
    <label style="margin-left:-155px; margin-top: 0px;">Due Date:</label>
 <input class="w3-input w3-border" type="date" placeholder="TAX" style="margin-left:0px; height:33px; width:70%;" id="enddate" name="enddate" ></p>
     
  </div>
  <div class="w3-half">
  <label style="margin-left:-300px; margin-top: 10px;">Total Cost:</label>
 <select name="scname" id="scname" class="form-control"  style="width:80%;" ></p>
            
              </select>

  </div>

  <div class="w3-half">
    <label style="margin-left:-380px; margin-top: 10px;">Amount to Pay:</label>
    <input class="w3-input w3-border" type="text" placeholder="Amount to Pay" style="margin-left:-18px; height:33px; width:95%;" id=totalamount name="totalamount">
  </div>
  <div class="w3-half"> 
    <label style="margin-left:-410px; margin-top: 10px;">Prepared by:</label>
    <input class="w3-input w3-border" type="txt" placeholder="Prepared by:" id="prepare" name="prepare"  value="<?php echo ''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.'; ?>" style="margin-left:-18px; height:33px; width:95%;"   disabled>
  </div> 



</div>


<br>

<!--Buttons-->
<br></br>

<button type="submit" name="btnAdd" onclick="return myFunction();" class="w3-btn w3-blue w3-border w3-border-red w3-round-large">Add</button>

<button type="button" class="w3-btn w3-green w3-border w3-border-red w3-round-large" onClick="ClearFields();">Reset</button>
<br></br><br></br>
<!--Left Body-->

<!--card end-->
</div>
<!--card end-->

<!--card to left end-->
</div>
<!--card to left end-->






<!--card to right-->
<div class="w3-col w3-container m8 l4" >
<!--card to right-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:100%; margin-top: 10px; ">
<!--card start-->

<!--card Header-->

<header class="w3-container w3-camo-dark-green w3-round">
  <h1>Database: Billing</h1>
</header>
<!--card Header-->

<!--Modal Button-->
<button type="button" onClick="document.getElementById('id01').style.display='block'" class="w3-btn">Full Size Table</button>

<!--Table function-->
<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="hidden";


mysql_query("update billing set status='".$status."' 
  where billing_no=".$nos);
  echo'<div class="bottom">';
echo'<div class="alert alert-success">
  <strong>Success!</strong> Billing has been deleted 
</div></div>
';
echo "<meta http-equiv='refresh' content='0'>";


}

?>

<!--DataTable-->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmonitoring";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



echo'
<div class="container" style="width:100%; margin-left: 0px; margin-top: -75px;">
    <br> <br> <br> <br>
  <table class="dt-responsive w3-table w3-bordered w3-striped w3-border w3-hoverable" id="tableko" name="tableko" style="font-size: 0.9em; width:150%;">
    <thead>
      <tr class="w3-camo-dark-green">
      <th>Billing No:</th>
        <th>Customer</th>
        <th>Total Cost</th>   
        <th>Remaining Balance</th>
        <th>Amount to Pay</th>
        <th>Date</th>
        <th>Due Date</th>
        <th>Prepared by:</th>
        

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM billing where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
      echo'<tr>';
       echo'<td>'.$row['billing_no'].'</td>';
        echo'<td>'.$row['customer'].'</td>';
        echo'<td>'.$row['totalcost'].'</td>';
        echo'<td>'.$row['balance'].'</td>';
        echo'<td>'.$row['topay'].'</td>';
        echo'<td>'.$row['datee'].'</td>'; 
        echo'<td>'.$row['enddate'].'</td>'; 
        echo'<td>'.$row['prepared'].'</td>'; 
       
        }
      echo'</tr>';
     echo' 
    </tbody>
  </table>
  <br></br>';
  $conn->close();
   ?> 

    <script type="text/javascript">
        $(document).ready(function(){
    $('#tableko').DataTable({
        "scrollX": true,
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[1]+':';
                    }
                } ),
                renderer: function ( api, rowIdx, columns ) {
                    var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+
                                '<td>'+col.title+':'+'</td> '+
                                '<td>'+col.data+'</td>'+
                            '</tr>';
                    } ).join('');
 
                    return $('<table/>').append( data );
                }
            }
        }
    });
});
    </script>
    </div>
<!--DataTable-->

<!--modal-->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom w3-card-8" style="width:100%;">
    <header class="w3-container w3-camo-dark-green">
      <span onClick="document.getElementById('id01').style.display='none'"
      class="w3-closebtn">&times;</span>
      <h2>Database: Billing</h2>
    </header>
   <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmonitoring";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



echo'
<div class="container" style="width:100%; margin-left: 0px; margin-top: -75px;">
    <br> <br> <br> <br>
  <table class="dt-responsive table-bordered w3-table w3-bordered w3-striped w3-border w3-hoverable" id="tableko1" name="tableko1" style="font-size: 0.9em;">
    <thead>
      <tr class="w3-camo-dark-green">
      <th> Billing No </th>
        <th>Customer</th>
        <th> Total Cost</th>   
        <th>Remaining Balance</th>
        <th>Amount to Pay</th>
        <th>Date</th>
        <th>Due Date</th>
        <th>Prepared by:</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM billing where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
        $billing_no=$row['billing_no'];
        $customer=$row['customer'];
        $totalcost=$row['totalcost'];
        $balance=$row['balance'];
        $topay=$row['topay'];
        $datee=$row['datee']; 
        $enddate=$row['enddate'];
        $prepare=$row['prepared'];
       
      echo'<tr>';
       echo'<td>'.$billing_no.'</td>';
        echo'<td>'.$customer.'</td>';
        echo'<td>'.$totalcost.'</td>';
        echo'<td>'.$balance.'</td>';
        echo'<td>'.$topay.'</td>';
        echo'<td>'.$datee.'</td>'; 
        echo'<td>'.$enddate.'</td>'; 
        echo'<td>'.$prepare.'</td>'; 
        ?>
        <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$billing_no.''; ?>" class="btn btn-primary btn btn-danger fa fa-close btn-xs"  onclick="return confirm('Are you sure?');"></button>
        <?php
       echo'<button type="button" name="btnEdit" id="bntEdit" value="'.$billing_no.'" data-toggle="modal" data-target="#myModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button>
        

        <button type="button" name="btnprint" id="btnprint" onclick="print(this)" value ="'.$billing_no.'" class="w3-btn">Print</button>
     </td>';


        }
      echo'</tr>';
     echo' 
    </tbody>
  </table>
  <br></br>';
  $conn->close();
   ?> 
    <script type="text/javascript">
        $(document).ready(function(){
    $('#tableko1').DataTable({
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    
    });
});
    </script>



    <script>
    function print(a) {
       myRowIndex = $(a).parent().parent().index();
            var getid=  (document.getElementById("tableko1").rows[($(a).parent().parent().index())+1].cells[0].innerHTML);
    window.open("pdf/tutorial/tutobill.php?billing_no="+getid+"& customer=<?php echo ''.$customer.'';?>&totalcost=<?php echo ''.$totalcost.'';?>&topay=<?php echo ''.$topay.'';?>&datee=<?php echo ''.$datee.'';?>&enddate=<?php echo ''.$enddate.'';?>&prepare=<?php echo ''.$prepare.'';?>");
    }
    </script>



    </div>
    <footer class="w3-container w3-camo-dark-green">
      <p>Billing</p>
    </footer>
  </div>
</div>
<br></br>
<!--modal end-->


<!--edit modal-->
<div class="modal fade" id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method ="post" role="form" id="editForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">X  </span><span class="sr-only">Close</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Billing</h4>

            </div>



            <div class="modal-body">
              <div class="form-group">
       <label>Billing No:</label>
              <input class="form-control" name="billing_no1" id="billing_no1" value=""/>
               <label>Amount to Pay:</label>
              <input class="form-control" name="topay1" id="topay1" value=""/>
              <label>Due Date:</label>
              <input class="form-control" type= "date" name="end1" id="end1" value=""/>
             
              
              <br><br></br></br>


              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnSave" onclick="return confirm('Are you sure?');" >Save changes</button>
            </div>
        </div>
    </div>
</div>
</form>
<!--edit modal end-->
<!--modal get the value-->
 <script type="text/javascript">
        function get_id(o) {
            myRowIndex = $(o).parent().parent().index();
            var getid=  (document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);    
            var $modal = $('#myModal'),
                $billing_no1 = $modal.find('#billing_no1');
            $billing_no1.val(getid);   

$billing_no1 = $modal.find('#billing_no1');
            $billing_no1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);

            $topay1 = $modal.find('#topay1');
            $topay1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);
            $end1 = $modal.find('#end1');
            $end1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[5].innerHTML); 
      
          
        }
    </script>
    <!--modal get the value-->

<!--Card end div-->
</div>
<!--Card end div-->
<!--card to right end-->
</div>
<!--card to right end-->

<!--row class end-->
</div>
<!--row class-->
</form>

<!--Time-->
<script>
 function setTime() {
    var d = new Date(),
      el = document.getElementById("time");

      el.innerHTML = formatAMPM(d);

    setTimeout(setTime, 1000);
    }

    function formatAMPM(date) {
        var weekday = new Array(7);
        weekday[0]=  "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
      var hours = date.getHours(),
        minutes = date.getMinutes(),
        seconds = date.getSeconds(),
        months = date.getMonth(),
        days = date.getDate(),
        year = date.getFullYear(),
        n = weekday[date.getDay()];
        ampm = hours >= 12 ? 'pm' : 'am';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      months=months+1;
    
      var strTime = n + ' ' + months + '/' + days + '/' + year + '\n' + hours + ':' + minutes + ':' + seconds + ' ' + ampm;
      return strTime;
    }

    setTime();
</script>
<!--Time-->

<!--Clear Fields-->
<script type="text/javascript"> 
function ClearFields() {
      document.getElementById("cname").options.value = "--Select Category--";
      document.getElementById("desc").value = "";
      document.getElementById("brand").value = "";
      document.getElementById("color").value = "";
      document.getElementById("pack").value = "";
      document.getElementById("unitname").value = "";
       document.getElementById("idprice").value = "";

}
</script>


<script>
function myFunction() {

var  totalamount;
var scname1;
 
 totalamount = document.getElementById("totalamount").value;
scname1=document.getElementById("scname").value;
  scname11= parseInt(scname1);


 if(scname11 < totalamount)

    {

alert("Amount to pay must not be higher than the balance");
        return false;

    }

  else if (totalamount<=-1) 
    {
        alert("Negative amount is not allowed");
        return false;
    } 


 else if (totalamount== 0) 
    {
        alert("Zero amount is not allowed");
        return false;
    } 

    else if (totalamount==" ") 
    {
        alert("Zero amount is not allowed");
        return false;
    } 
   

    else
      
 {
        text = "Input OK";

    }
    document.getElementById("demo").innerHTML = text;



  }
</script>
</body>
</html>

