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
  echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
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


$a= date("Y-m-d");

?>
<!DOCTYPE html>
<html>
<head>
<title> Payment</title>
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
<form action="" method="post" name="frm" id="frm">
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
  <h1>Transactions: Payment</h1>
</header>
<!--card Header-->

<!--Left Body-->

<!--First box-->
<br>
<?php
$content1=mysql_query("select * from billing where billing_no='".$_POST['cname']."'");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;

$customer=$_POST['cname'];
$topay=$_POST['scname'];
$amount=$_POST['amount'];
$bankname=$_POST['bankname'];
$chequeno=$_POST['chequeno'];
$chequeamount=$_POST['chequeamount'];
$chequedate=$_POST['chequedate'];
$radio=$_POST['radiobutton'];
$status="Active";
$cust=$row['customer'];
$proj=$row['project'];
$tot=$row['totalcost'];
$bal=$row['balance'];
$top=$row['topay'];
$tops=$_POST['total'];

if(isset($_POST['btnAdd']))

{

$status="Active";

$sub=$bal-$amount;

mysql_query("insert into payment (customer,project,topay, amount, bankname, chequeno, chequedate, type, status ) 
  values('". $cust."','".$project."','".$topay."', '".$amount."','".$bankname."'  ,'".$chequeno."', '".$chequedate."','".$radio."','".$status."')");
  
mysql_query("UPDATE billing SET balance='".$sub."', topay='".$tops."' WHERE billing_no='".$_POST['cname']."'");

mysql_query("UPDATE quotation SET balance='".$sub."' WHERE customer='".$cust."' and project='".$proj."'");

 echo '<script type="text/javascript">alert("Payment has been added")</script>'; 
 echo "<meta http-equiv='refresh' content='0'>";

}




//Update query
  if(isset($_POST['btnSave']))
                {
                    $payment_no11 = $_POST['payment_no1'];           
                    $cname11=$_POST['cname1'];
                    $scname11=$_POST['scname1'];
                    $amount11=$_POST['amount1'];
                    $bankname11=$_POST['bankname1'];
                    $chequeno11=$_POST['chequeno1'];
                    $chequedate11=$_POST['chequedate1'];
                    $type11=$_POST['radiobutton1'];
                   
                    mysql_query("UPDATE payment SET customer='".$cname11."',topay='".$scname11."',amount='".$amount11."',bankname='".$bankname11."', chequeno='".$chequeno11."', chequedate='".$chequedate11."', type='".$type11."' WHERE payment_no='".$payment_no11."'");
                    echo "<script type='text/javascript'>alert('Update Successful!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
 
                                       
                }


?>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM billing where topay >0";
$results = $db_handle->runQuery($query);
?>

<script>
function getState(val) {
  $.ajax({
  type: "POST",
  url: "get_state4.php",
  data:'country_id='+val,
  success: function(data){
    $("#scname").html(data);
  }
  });
}

</script>


<script>
function getState1(val) {
  $.ajax({
  type: "POST",
  url: "get_state5.php",
  data:'country_id='+val,
  success: function(data){
    $("#scname1").html(data);
  }
  });
}

</script>

    <br>

<!--3 box--> 
<h1 style="font-size: 2.0em; margin-left: -515px;">BILLING INFORMATION</h1>
<br>
<div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-150px;">Customer:</label>
      <select name="cname" id="cname" class="form-control"  onChange="getState(this.value);"  style="width:100%;"></p>
        <option value="">--Select Customer--</option>
                <?php
                foreach($results as $country) {
                ?>
                <option value="<?php echo $country["billing_no"]; ?>"> <?php echo $country["customer"]; ?>|<?php echo $country["project"]; ?></option>

                <?php
                }
              echo'</select>';?>
  </div>
 
  <div class="w3-half">
    <label style="margin-left:-150px;">Total Amount to pay:</label>
    <select name="scname" id="scname" class="form-control"  style="width:80%;" ></p>
            
              </select>
  </div> 
</div>
<br>
</br>

<h1 style="font-size: 2.0em; margin-left: -700px;">PAYMENT</h1>

<br></br>
<div class="w3-row-padding">
<div class ="w3-half">
<label style="margin-left:-160px;"> Amount</label>
 <strong><span id='messageuser' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Total Amount to Pay" style="height:33px;" id="amount" name="amount" value="0.00">
  </div>
<div class ="w3-half">
<strong><span id='messages' style="margin-left:-5px; color: red;"></span></strong>
<label style="margin-left:-160px;">Remaining Balance</label>
 <strong><span id='messageuser' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Total" style="height:33px;" id="total" name="total" value="0.00" readonly>
    <input class="w3-input w3-border" type="hidden" placeholder="test" style="height:33px;" id="test" name="test" value="<?php echo''.$tot.'' ?> " readonly>
  </div>
</div>

  
<script type="text/javascript">
function checkPasswordMatch() {
    var cost=0.00;
    cost = ($("#scname").val() - $("#amount").val());

       $("#total").val(cost);

}


$(document).ready(function () {
   $("#scname, #amount").keyup(checkPasswordMatch);
});

</script>

<form class="w3-container w3-card-4">
<p style="margin-left:-600px;">
<?php if($cust_type2=="Cash")
{
echo'<input class="w3-radio" type="radio" name="radiobutton" id="no_radio" onChange="disablefield();" value="Cash" checked>
<label class="w3-validate"  style="font-size: 0.8em;" >Cash</label>
<input class="w3-radio" type="radio" id="yes_radio" name="radiobutton" onChange="disablefield();" value="Cheque">
<label class="w3-validate"  style="font-size: 0.8em;" >Cheque</label>';
}
 else
{
echo'<input class="w3-radio" type="radio" name="radiobutton" id="no_radio" onChange="disablefield();" value="Cash">
<label class="w3-validate"  style="font-size: 0.8em;">Cash</label>
<input class="w3-radio" type="radio" id="yes_radio" name="radiobutton" onChange="disablefield();" value="Cheque" checked>
<label class="w3-validate"  style="font-size: 0.8em;" >Cheque</label>';
}?>

<script type="text/javascript"> 
function disablefield(){ 
if (document.getElementById('no_radio').checked == 1){ 
document.getElementById('bankname').disabled='disabled'; 
document.getElementById('chequeno').disabled='disabled';  
document.getElementById('chequedate').disabled='disabled'; 
document.getElementById('bankname').value=''; 
document.getElementById('chequedate').value=''; 
document.getElementById('chequeno').value='';
document.getElementById('chequeamount').value=''; 
}else{ 
document.getElementById('bankname').disabled='';
 
document.getElementById('chequeno').disabled='';
document.getElementById('chequedate').disabled='';  
} 
} 


</script> 


</p>

</form>

<br>

<div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-200px;">Bank Name:</label>
    <strong><span id='messagestreet' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Bank Name" style="height:33px;" id="bankname" name="bankname">
  </div>
  <div class="w3-half">
    <label style="margin-left:-200px;">Cheque No:</label>
     <strong><span id='messagecity' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Cheque No" style="height:33px;" id="chequeno" name="chequeno">
  </div><br>

</div>
<br></br>

<div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-200px;">Cheque Date:</label>
    <strong><span id='messagestreet' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="date" placeholder="Cheque Date" style="height:33px;" id="chequedate" name="chequedate">
  </div>
 

</div>


<br>

<!--Buttons-->
<br>
<button type="submit" name="btnAdd" onclick="return myFunction();" class="w3-btn w3-blue w3-border w3-border-red w3-round-large">Add</button>

<button type="button" class="w3-btn w3-green w3-border w3-border-red w3-round-large" onclick="ClearFields();">Reset</button>
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
  <h1>Database: Payment</h1>
</header>
<!--card Header-->

<!--Modal Button-->
<button type="button" onclick="document.getElementById('id01').style.display='block'" class="w3-btn">Full Size Table</button>

<!--Table function-->
<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="hidden";


mysql_query("update payment set status='".$status."' 
  where payment_no=".$nos);
  echo'<div class="bottom">';
 echo '<script type="text/javascript">alert("Payment has been deleted")</script>'; 


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
        <th>Payment No</th>
        <th>Customer</th>
        <th>Amount to Pay</th>
        <th>Amount</th>
        <th>Bank Name</th>
        <th>Cheque No</th>
        <th>Cheque Date</th>
        <th>Type of Payment</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM payment where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
      echo'<tr>';
        echo'<td>'.$row['payment_no'].'</td>';
        echo'<td>'.$row['customer'].'</td>';
        echo'<td>'.$row['topay'].'</td>';
        echo'<td>'.$row['amount'].'</td>';
        echo'<td>'.$row['bankname'].'</td>'; 
        echo'<td>'.$row['chequeno'].'</td>';   
        echo'<td>'.$row['chequedate'].'</td>';   
        echo'<td>'.$row['type'].'</td>';
        
       
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
                        return 'Details for '+data[0];
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
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-closebtn">&times;</span>
      <h2>Database: Payments</h2>
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

         <th>Payment No</th>
        <th>Customer</th>
        <th>Amount to Pay</th>
        <th>Amount</th>
        <th>Bank Name</th>
        <th>Cheque No</th>
        <th>Cheque Date</th>
        <th>Type of Payment</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM payment where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
        $payment_no=$row['payment_no'];
        $customer=$row['customer'];
        $topay=$row['topay'];
        $amount=$row['amount'];
        $bankname=$row['bankname'];
        $chequeno=$row['chequeno']; 
        $chequedate=$row['chequedate'];
        $type=$row['type'];
        

              echo'<tr>';
        echo'<td>'.$payment_no.'</td>';
        echo'<td>'.$customer.'</td>';
        echo'<td>'.$topay.'</td>';
        echo'<td>'.$amount.'</td>';
        echo'<td>'.$bankname.'</td>';   
        echo'<td>'.$chequeno.'</td>'; 
         echo'<td>'.$chequedate.'</td>';
        echo'<td>'.$type.'</td>';
        ?>
        <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$payment_no.''; ?>" class="btn btn-primary btn btn-danger fa fa-close btn-xs"  onclick="return confirm('Are you sure?');"></button>
        <?php
       echo'<button type="button" name="btnEdit" id="bntEdit" value="'.$payment_no.'" data-toggle="modal" data-target="#myModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button>
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
    </div>
    <footer class="w3-container w3-camo-dark-green">
      <p>Payment</p>
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
                 <h4 class="modal-title" id="myModalLabel">Edit Payment</h4>

            </div>
            <div class="modal-body">
              <div class="form-group">
              
 <label>Payment No</label>
    <strong><span id='messagestreet'></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Bank Name"  id="payment_no1" name="payment_no1">


 <label>Customer:</label>
      <select name="cname1" id="cname1" class="form-control"  onChange="getState1(this.value);" ></p>
        <option value="">--Select Customer--</option>
                <?php
                foreach($results as $country) {
                ?>
                <option value="<?php echo $country["customer"]; ?>"> <?php echo $country["customer"]; ?></option>

                <?php
                }
              echo'</select>';?>
 
 
    <label>Total Amount to pay:</label>
    <select name="scname1" id="scname1" class="form-control" ></p>
            
              </select>
 
<br>
</br>

<h1>PAYMENT</h1>

<br></br>

<label> Amount</label>
 <strong><span id='messageuser'></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Total Amount to Pay" id="amount" name="amount">
 
<p style="">
<?php if($cust_type2=="Cash")
{
echo'<input class="w3-radio" type="radio" name="radiobutton1" id="no_radio1" onChange="disablefield1();" value="Cash" checked>
<label class="w3-validate"  style="font-size: 0.8em;" >Cash</label>
<input class="w3-radio" type="radio" id="yes_radio1" name="radiobutton1" onChange="disablefield1();" value="Cheque">
<label class="w3-validate"  style="font-size: 0.8em;" >Cheque</label>';
}
 else
{
echo'<input class="w3-radio" type="radio" name="radiobutton1" id="no_radio1" onChange="disablefield1();" value="Cash">
<label class="w3-validate"  style="font-size: 0.8em;">Cash</label>
<input class="w3-radio" type="radio" id="yes_radio1" name="radiobutton1" onChange="disablefield1();" value="Cheque" checked>
<label class="w3-validate"  style="font-size: 0.8em;" >Cheque</label>';
}?>

<script type="text/javascript"> 
function disablefield1(){ 
if (document.getElementById('no_radio1').checked == 1){ 
document.getElementById('bankname1').disabled='disabled'; 
document.getElementById('chequeno1').disabled='disabled';  
document.getElementById('chequedate1').disabled='disabled'; 
document.getElementById('bankname1').value=''; 
document.getElementById('chequedate1').value=''; 
document.getElementById('chequeno1').value='';
document.getElementById('chequeamount1').value=''; 
}else{ 
document.getElementById('bankname1').disabled='';
 
document.getElementById('chequeno1').disabled='';
document.getElementById('chequedate1').disabled='';  
} 
} 


</script> 


</p>


<br>


    <label>Bank Name:</label>
    <strong><span id='messagestreet'></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Bank Name"  id="bankname1" name="bankname1">

    <label>Cheque No:</label>
     <strong><span id='messagecity'></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Cheque No"  id="chequeno1" name="chequeno1">
 


    <label>Cheque Date:</label>
    <strong><span id='messagestreet'"></span></strong>
    <input class="w3-input w3-border" type="date" placeholder="Cheque Date" id="chequedate1" name="chequedate1">
 


















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
                $payment_no1 = $modal.find('#payment_no1');
            $payment_no1.val(getid);          

  $payment_no1 = $modal.find('#payment_no1');
            $payment_no1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);



            $cname1 = $modal.find('#cname1');
            $cname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);

            $scname1 = $modal.find('#scname1');
            $scname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);
            $amount1 = $modal.find('#amount1');
            $amount1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);

            $bankname1 = $modal.find('#bankname1');
            $bankname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[4].innerHTML);

            $chequeno1 = $modal.find('#chequeno1');
            $chequeno1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
            $chequedate1 = $modal.find('#chequedate1');
            $chequedate1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);

            $radiobutton1 = $modal.find('#radiobutton1');
            $radiobutton11.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);

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
      document.getElementById("textbox_A").value = "";
      document.getElementById("textbox_B").value = "";
      document.getElementById("textbox_C").value = "";
      document.getElementById("firstname").value = "";
      document.getElementById("middlename").value = "";
      document.getElementById("lastname").value = "";
      document.getElementById("contact").value = "";
      document.getElementById("email").value = "";
      document.getElementById("city").value = "";
      document.getElementById("street").value = "";

}
</script>


<script>
function myFunction() {

var  amount, total;
 
 amount = document.getElementById("amount").value;
 total= document.getElementById("scname").value;

 if(total < amount)

    {

alert("Amount to pay must not be higher than the balance");
        return false;

    }


  if (amount<= -1) 
    {
        alert("Negative amount is not allowed");
        return false;
    } 


  if (amount== 0) 
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

