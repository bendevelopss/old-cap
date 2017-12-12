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
<title>Home</title>
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
    echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
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
  <h1>Maintenance: Employee</h1>
</header>
<!--card Header-->

<!--Left Body-->

<!--First box-->
<br>
<?php
$content1=mysql_query("select max(emp_no) as max from employee");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;

$usernames=$_POST['txtusername'];
$passwords=$_POST['txtpassword'];
$fname=$_POST['txtfirstname'];
$mname=$_POST['txtmiddlename'];
$lname=$_POST['txtlastname'];
$position=$_POST['pname'];
$contact=$_POST['txtcontact'];
$email=$_POST['txtemail'];
$street=$_POST['txtstreet'];
$city=$_POST['txtcity'];
$status="Active";

if(empty($mname))
{

$mname=" ";

}


$cont= strlen($contact);

if(isset($_POST['btnAdd']) && !empty($email) && !empty($fname) && !empty($mname) && !empty($lname) && !empty($contact) && !empty($street) && !empty($city) && !empty($usernames) && !empty($passwords))

{
if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$fname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$mname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$lname) && preg_match("/^[0-9,-, ]*$/",$contact)) 
    {

$fname1= mysql_real_escape_string($fname);
$mname1= mysql_real_escape_string($mname);
$lname1= mysql_real_escape_string($lname);


$status="Active";
$statuss="inactive";

mysql_query("insert into employee ( firstname, middlename, lastname, position, contact, email, street,city, username, password, status ) 
  values('". $fname1."','".$mname1."', '".$lname1."','".$position."'  ,'".$contact."', '".$email."','".$street."', '".$city."', '".$_POST['txtusername']."','".$_POST['txtpassword']."','".$status."')");

mysql_query("insert into sample (user, pass, position , status, account_status ) 
  values('".$_POST['txtusername']."','".$_POST['txtpassword']."', '".$position."' ,'".$statuss."','".$status."')");
  
 echo '<script type="text/javascript">alert("Employee has  been added")</script>'; 
 echo "<meta http-equiv='refresh' content='0'>";

}


if(!preg_match("/^[a-zA-Z,-,', .,-]*$/",$fname)) 
    {

 echo '<script type="text/javascript">alert("Invalid First Name")</script>'; 



      }

       if(!preg_match("/^[a-zA-Z,-,', .,-]*$/",$mname)) 
    {

 echo '<script type="text/javascript">alert("Invalid Middle Name")</script>'; 



      }

 if(!preg_match("/^[a-zA-Z,-,', .,-]*$/",$lname)) 
    {

 echo '<script type="text/javascript">alert("Invalid Last Name")</script>'; 



      }

if(!preg_match("/^[0-9,-]*$/",$contact))

{

 echo '<script type="text/javascript">alert("Contact number only accepts numerical data")</script>'; 



}



}



//Update query
  if(isset($_POST['btnSave']))
                {
                    $emp_no = $_POST['emp_no1'];           
                    $fname=$_POST['firstname1'];
                    $mname=$_POST['middlename1'];
                    $lname=$_POST['lastname1'];
                    $position=$_POST['pname1'];
                    $contact=$_POST['contact1'];
                    $email=$_POST['email1'];
                    $street=$_POST['address1'];
                    $city=$_POST['city1'];
                  $username=$_POST['username1'];
                  $password=$_POST['password1'];
                  
                    mysql_query("UPDATE employee SET firstname='".$fname."',middlename='".$mname."',lastname='".$lname."',position='".$position."', contact='".$contact."', email='".$email."', street='".$street."', city='".$city."', username='".$username."', password='".$password."' WHERE emp_no='".$emp_no."'");
                    echo "<script type='text/javascript'>alert('Update Successful!')</script>";
                 
 
                                       
                }


?>

    <input class="w3-input w3-border" type="hidden" name="customer_no" value="<?php echo $hell; ?>" style="width:35%;margin-left:15px; height:30px;" readonly>
    <br>

<!--3 box--> 
<h1 style="font-size: 2.0em; margin-left: -515px;">EMPLOYEE INFORMATION</h1>
<br>
<div class="w3-row-padding">
  <div class="w3-third">
    <label style="margin-left:-180px;">* First Name:</label>
    
    <input class="w3-input w3-border" type="text" placeholder="First Name" style="height:33px;" id="firstname" name="txtfirstname">
  </div>
  <div class="w3-third">
    <label style="margin-left:-170px;">Middle Name:</label>
    <input class="w3-input w3-border" type="text" placeholder="Middle Name" style="height:33px;" id="middlename" name="txtmiddlename">
  </div>
  <div class="w3-third">
    <label style="margin-left:-185px;">* Last Name:</label>
    <input class="w3-input w3-border" type="text" placeholder="Last Name" style="height:33px;" id="lastname" name="txtlastname">
  </div>
  <div class="w3-third">
  <label style="margin-left:-205px; margin-top: 10px;">* Position:</label>
 <select name="pname" id="pname" class="form-control"></p>
      <?php
$content1=mysql_query("select * from position where status='Active'");
$total1=@mysql_affected_rows();
for($x=1;$x<=$total1;$x++)
{
    
$row=mysql_fetch_array($content1);

$position_name=$row['position_name'];

echo'<option value="'.$position_name.'">'.$position_name.'</option>';
}
      echo'</select>';?>
  </div>
  <div class="w3-third">
    <label style="margin-left:-140px; margin-top: 10px;">* Contact Number:</label>
    <input class="w3-input w3-border" type="text" placeholder="Contact Number" style="height:33px;" id="contact" name="txtcontact">
  </div>
  <div class="w3-third">
    <label style="margin-left:-160px; margin-top: 10px;">* Email Address:</label>
    <input class="w3-input w3-border" type="text" placeholder="Email Address" style="height:33px;"  id="email" name="txtemail">
  </div> 
</div>
<br>
</br>

<div class="w3-row-padding">
<div class ="w3-half">
<label style="margin-left:-160px;">* Username:</label>
 <strong><span id='messageuser' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Username" style="height:33px;" id="username" name="txtusername">
  </div>

<div class ="w3-half">
<label style="margin-left:-140px;">* Password:</label>
<strong><span id='messagepass' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="password" placeholder="Password" style="height:33px;" id="password" name="txtpassword">
  </div>


</div>

<br>

<!--4 box--> 
<h1 style="font-size: 2.0em; margin-left: -725px;">ADDRESS</h1>
<br>
<div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-200px;">*Street:</label>
    <strong><span id='messagestreet' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Street" style="height:33px;" id="street" name="txtstreet">
  </div>
  <div class="w3-half">
    <label style="margin-left:-200px;">*City:</label>
     <strong><span id='messagecity' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="City" style="height:33px;" id="city" name="txtcity">
  </div><br>

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
  <h1>Database: Employee</h1>
</header>
<!--card Header-->

<!--Modal Button-->
<button type="button" onclick="document.getElementById('id01').style.display='block'" class="w3-btn">Full Size Table</button>

<!--Table function-->
<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";


mysql_query("update employee set status='".$status."' 
  where emp_no=".$nos);

$content11=mysql_query("select * from employee where emp_no='".$nos."' ");
$total11=@mysql_affected_rows();
$row11=mysql_fetch_array($content11);

mysql_query("update sample set account_status='".$status."' 
  where user='".$row11['username']."' and pass='".$row11['password']."'");

  echo'<div class="bottom">';
 echo '<script type="text/javascript">alert("Employee has been deleted")</script>'; 
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
        <th>Employee ID</th>    
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Contact No.</th>
        <th>Email</th>
        <th>Username</th>
        <th>Address</th>
        <th>City</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM employee where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
      echo'<tr>';
      echo'<td>'.$row['emp_no'].'</td>';
        echo'<td>'.$row['firstname'].'</td>';
        echo'<td>'.$row['middlename'].'</td>';
        echo'<td>'.$row['lastname'].'</td>';
        echo'<td>'.$row['position'].'</td>';
        echo'<td>'.$row['contact'].'</td>'; 
        echo'<td>'.$row['email'].'</td>';   
        echo'<td>'.$row['username'].'</td>';   
        echo'<td>'.$row['street'].'</td>';
        echo'<td>'.$row['city'].'</td>';
       
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
      <h2>Database: Employee</h2>
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

      <th>Employee ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Position</th>
        <th>Contact No.</th>
        <th>Email</th>
        <th>Username</th>
        <th>Address</th>
        <th>City</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM employee where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
        $emp_no=$row['emp_no'];
        $firstname=$row['firstname'];
        $middlename=$row['middlename'];
        $lastname=$row['lastname'];
        $pname=$row['position'];
        $contact=$row['contact']; 
        $email=$row['email'];
        $street=$row['street'];
        $city=$row['city'];
        $username=$row['username'];
      echo'<tr>';
         echo'<td>'.$emp_no.'</td>';
        echo'<td>'.$firstname.'</td>';
        echo'<td>'.$middlename.'</td>';
        echo'<td>'.$lastname.'</td>';
        echo'<td>'.$pname.'</td>';
        echo'<td>'.$contact.'</td>';   
        echo'<td>'.$email.'</td>'; 
         echo'<td>'.$username.'</td>';
        echo'<td>'.$street.'</td>';
        echo'<td>'.$city.'</td>';
        ?>
        <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$emp_no.''; ?>" class="btn btn-primary btn btn-danger fa fa-close btn-xs"  onclick="return confirm('Are you sure?');"></button>
        <?php
       echo'<button type="button" name="btnEdit" id="bntEdit" value="'.$emp_no.'" data-toggle="modal" data-target="#myModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button>
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
      <p>Employee</p>
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
                 <h4 class="modal-title" id="myModalLabel">Edit Employee</h4>

            </div>
            <div class="modal-body">
              <div class="form-group">
               <label>Employee ID</label>
              <input class="form-control" name="emp_no1" id="emp_no1" value="" readonly>
               <label>First Name:</label>
              <input class="form-control" name="firstname1" id="firstname1" value=""/>
               <label>Middle Name:</label>
              <input class="form-control" name="middlename1" id="middlename1" value=""/>
               <label>Last Name:</label>
              <input class="form-control" name="lastname1" id="lastname1" value=""/>
              <label>Position: * </label>
              <select name="pname1" id="pname1" class="form-control"></p>
              <?php
              $content1=mysql_query("select * from position where status='Active' or status='active'");
              $total1=@mysql_affected_rows();
              for($x=1;$x<=$total1;$x++)
              {
                  
              $row=mysql_fetch_array($content1);

              $position_name=$row['position_name'];

              echo'<option value="'.$position_name.'">'.$position_name.'</option>';
              }
              echo'</select>';?>
               <label>Contact No:</label>
              <input class="form-control" name="contact1" id="contact1" value=""/> 
               <label>Email:</label>
              <input class="form-control" name="email1" id="email1" value=""/>   
               <label>Username:</label>
              <input class="form-control" name="username1" id="username1" value=""/>
               <label>Password: * </label>
              <input type="password" class="form-control" name="password1" id="password1" value=""/>
               <label>Address:</label>
              <input class="form-control" name="address1" id="address1" value=""/>
               <label>City:</label>
              <input class="form-control" name="city1" id="city1" value=""/>


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
                $emp_no1 = $modal.find('#emp_no1');
            $emp_no1.val(getid);  
            $emp_no1 = $modal.find('#emp_no1');
            $emp_no1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);        
            $firstname1 = $modal.find('#firstname1');
            $firstname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);
            $middlename1 = $modal.find('#middlename1');
            $middlename1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);
            $lastname1 = $modal.find('#lastname1');
            $lastname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);
            $pname1 = $modal.find('#pname1');
            $pname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[4].innerHTML); 
            $contact1 = $modal.find('#contact1');
            $contact1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
            $email1 = $modal.find('#email1');
            $email1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);
            $username1 = $modal.find('#username1');
            $username1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);
            $address1 = $modal.find('#address1');
            $address1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[8].innerHTML);
            $city1 = $modal.find('#city1');
            $city1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[9].innerHTML);
          
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
      document.getElementById("username").value = "";
      document.getElementById("password").value = "";
      document.getElementById("lastname").value = "";
      document.getElementById("firstname").value = "";
      document.getElementById("middlename").value = "";
      document.getElementById("lastname").value = "";
      document.getElementById("contact").value = "";
      document.getElementById("email").value = "";
      document.getElementById("city").value = "";
      document.getElementById("street").value = "";


       var txtusername =  $("#username").val();
    var txtpassword =  $("#password").val();
    var txtlastname= $("#lastname").val();
    var txtfirstname = $("#firstname").val();
    var txtmiddlename =$("#middlename").val();
    var contactnum= $("#contact").val();
    var streets= $("#street").val();
    var citys = $("#city").val();
    var emails= $("#email").val();



  $("#messageemail").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#email").removeClass('w3-border-red w3-pale-green w3-leftbar w3-rightbar w3-border-green');


$("#messageemail").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');

$("#email").removeClass('w3-border-green');
      $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#email").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageemail").removeClass('fa fa-thumbs-o-down');
      $("#messageemail").removeClass('fa fa-thumbs-o-up');



  $("#messagemiddle").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#middlename").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');


         $("#middlename").removeClass('w3-border-red');
      $("#middlename").removeClass('w3-border-green');
      $("#middlename").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#middlename").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagemiddle").removeClass('fa fa-thumbs-o-down');
      $("#messagemiddle").removeClass('fa fa-thumbs-o-up');
  $("#messagecontact").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#contact").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
  $("#messagecontact").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
 $("#contact").removeClass('w3-border-red');
      $("#contact").removeClass('w3-border-green');
      $("#contact").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#contact").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecontact").removeClass('fa fa-thumbs-o-down');
      $("#messagecontact").removeClass('fa fa-thumbs-o-up');
  $("#messagelast").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
$("#lastname").removeClass('w3-border-red');
      $("#lastname").removeClass('w3-border-green');
      $("#lastname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagelast").removeClass('fa fa-thumbs-o-down');
      $("#messagelast").removeClass('fa fa-thumbs-o-up');
 $("#messagefirst").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
  $("#firstname").removeClass('w3-border-red');
      $("#firstname").removeClass('w3-border-green');
      $("#firstname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagefirst").removeClass('fa fa-thumbs-o-down');
      $("#messagefirst").removeClass('fa fa-thumbs-o-up');
  $("#username").removeClass('w3-border-red');
      $("#username").removeClass('w3-border-green');
      $("#username").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#username").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageuser").removeClass('fa fa-thumbs-o-down');
      $("#messageuser").removeClass('fa fa-thumbs-o-up');

  $("#username").removeClass('w3-border-red');
      $("#username").removeClass('w3-border-green');
      $("#username").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#username").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageuser").removeClass('fa fa-thumbs-o-down');
      $("#messageuser").removeClass('fa fa-thumbs-o-up');

$("#password").removeClass('w3-border-red');
      $("#password").removeClass('w3-border-green');
      $("#password").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#password").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagepass").removeClass('fa fa-thumbs-o-down');
      $("#messagepass").removeClass('fa fa-thumbs-o-up');

  $("#messagepass").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
  $("#password").removeClass('w3-border-red');
      $("#password").removeClass('w3-border-green');
      $("#password").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#password").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagepass").removeClass('fa fa-thumbs-o-down');
      $("#messagepass").removeClass('fa fa-thumbs-o-up');
 $("#street").removeClass('w3-border-red');
      $("#street").removeClass('w3-border-green');
      $("#street").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#street").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagestreet").removeClass('fa fa-thumbs-o-down');
      $("#messagestreet").removeClass('fa fa-thumbs-o-up');

  $("#messagestreet").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
 $("#street").removeClass('w3-border-red');
      $("#street").removeClass('w3-border-green');
      $("#street").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#street").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagestreet").removeClass('fa fa-thumbs-o-down');
      $("#messagestreet").removeClass('fa fa-thumbs-o-up');
 $("#city").removeClass('w3-border-red');
      $("#city").removeClass('w3-border-green');
      $("#city").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#city").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecity").removeClass('fa fa-thumbs-o-down');
      $("#messagecity").removeClass('fa fa-thumbs-o-up');

 $("#messagecity").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
 $("#city").removeClass('w3-border-red');
      $("#city").removeClass('w3-border-green');
      $("#city").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#city").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecity").removeClass('fa fa-thumbs-o-down');
      $("#messagecity").removeClass('fa fa-thumbs-o-up');



}


$(document).ready(function () {
   $("#username, #password,  #lastname, #firstname, #middlename, #contact, #city, #street, #email").keyup(checkPasswordMatch);
});

</script>

<script type="text/javascript">
function checkPasswordMatch() {

    var txtusername =  $("#username").val();
    var txtpassword =  $("#password").val();
    var txtlastname= $("#lastname").val();
    var txtfirstname = $("#firstname").val();
    var txtmiddlename =$("#middlename").val();
    var contactnum= $("#contact").val();
    var streets= $("#street").val();
    var citys = $("#city").val();
    var emails= $("#email").val();



if(!(emails.match(/.com/g)) || !(emails.match(/@/g)) || (emails.match(/@.com/g)))
{

$("#messageemail").html("   ").css('color','red');
        $("#messageemail").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#email").removeClass('w3-border-red w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#email").addClass('w3-border-green w3-pale-red w3-leftbar w3-rightbar w3-border-red');


}

  else
    {
        $("#messageemail").html("   ").css('color','green');
        $("#messageemail").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

 if(emails=='')
    {
      $("#messageemail").html("").css(' ');
      $("#email").removeClass('w3-border-red');
      

$("#email").removeClass('w3-border-green');
      $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#email").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageemail").removeClass('fa fa-thumbs-o-down');
      $("#messageemail").removeClass('fa fa-thumbs-o-up');

    }



  
if (txtmiddlename.match(/[0-9]/g)) 
      {

        $("#messagemiddle").html("First Name must not be numerical").css('color','red');
        $("#messagemiddle").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#middlename").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#middlename").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

      }
      else
    {
        $("#messagemiddle").html("   ").css('color','green');
        $("#messagemiddle").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#middlename").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }


 if(txtmiddlename=='')
    {
      $("#messagemiddle").html("").css(' ');
      $("#middlename").removeClass('w3-border-red');
      $("#middlename").removeClass('w3-border-green');
      $("#middlename").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#middlename").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagemiddle").removeClass('fa fa-thumbs-o-down');
      $("#messagemiddle").removeClass('fa fa-thumbs-o-up');
    }








 if (contactnum.match(/[a-zA-Z]/g)) 
      {

        $("#messagecontact").html("Contact number must not be alphabetical").css('color','red');
        $("#messagecontact").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#contact").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#contact").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
        
      }
    else
    {
        $("#messagecontact").html("   ").css('color','green');
        $("#messagecontact").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#contact").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(contactnum=='')
    {
      $("#messagecontact").html("").css(' ');
      $("#contact").removeClass('w3-border-red');
      $("#contact").removeClass('w3-border-green');
      $("#contact").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#contact").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecontact").removeClass('fa fa-thumbs-o-down');
      $("#messagecontact").removeClass('fa fa-thumbs-o-up');
    }




      if (txtlastname.match(/[0-9]/g)) 
      {

        $("#messagelast").html("Last Name must not be numerical").css('color','red');
        $("#messagelast").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#lastname").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

      }
      else
    {
        $("#messagelast").html("   ").css('color','green');
        $("#messagelast").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#lastname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(txtlastname=='')
    {
       $("#messagelast").html("This is a required field").css('color','red');
      $("#lastname").removeClass('w3-border-red');
      $("#lastname").removeClass('w3-border-green');
      $("#lastname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagelast").removeClass('fa fa-thumbs-o-down');
      $("#messagelast").removeClass('fa fa-thumbs-o-up');

    }


      if (txtfirstname.match(/[0-9]/g)) 
      {

        $("#messagefirst").html("First Name must not be numerical").css('color','red');
        $("#messagefirst").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#firstname").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

      }
      else
    {
        $("#messagefirst").html("   ").css('color','green');
        $("#messagefirst").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#firstname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(txtfirstname=='')
    {
       $("#messagefirst").html("This is a required field").css('color','red');
      $("#firstname").removeClass('w3-border-red');
      $("#firstname").removeClass('w3-border-green');
      $("#firstname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagefirst").removeClass('fa fa-thumbs-o-down');
      $("#messagefirst").removeClass('fa fa-thumbs-o-up');

    }




if (txtusername==' ')
    {
        

$("#messageuser").html("This is a required field").css('color','red');
      $("#username").removeClass('w3-border-red');
      $("#username").removeClass('w3-border-green');
      $("#username").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#username").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageuser").removeClass('fa fa-thumbs-o-down');
      $("#messageuser").removeClass('fa fa-thumbs-o-up');


      }



     else
    {
        $("#messageuser").html("   ").css('color','green');
        $("#messageuser").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#username").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }


if(txtusername=='')
    {
      $("#messageuser").html(" This is a required field").css('color','red');
      $("#username").removeClass('w3-border-red');
      $("#username").removeClass('w3-border-green');
      $("#username").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#username").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageuser").removeClass('fa fa-thumbs-o-down');
      $("#messageuser").removeClass('fa fa-thumbs-o-up');
    }




if (txtpassword==' ')
    {
        

$("#messagepass").html("This is a required field").css('color','red');
      $("#password").removeClass('w3-border-red');
      $("#password").removeClass('w3-border-green');
      $("#password").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#password").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagepass").removeClass('fa fa-thumbs-o-down');
      $("#messagepass").removeClass('fa fa-thumbs-o-up');


      }

        else
    {
        $("#messagepass").html("   ").css('color','green');
        $("#messagepass").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#password").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }


if(txtpassword=='')
    {
      $("#messagepass").html(" This is a required field").css('color','red');
      $("#password").removeClass('w3-border-red');
      $("#password").removeClass('w3-border-green');
      $("#password").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#password").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagepass").removeClass('fa fa-thumbs-o-down');
      $("#messagepass").removeClass('fa fa-thumbs-o-up');
    }





if (streets==' ')
    {
        

$("#messagestreet").html("This is a required field").css('color','red');
      $("#street").removeClass('w3-border-red');
      $("#street").removeClass('w3-border-green');
      $("#street").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#street").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagestreet").removeClass('fa fa-thumbs-o-down');
      $("#messagestreet").removeClass('fa fa-thumbs-o-up');


      }

        else
    {
        $("#messagestreet").html("   ").css('color','green');
        $("#messagestreet").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#street").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }


if(streets=='')
    {
      $("#messagestreet").html(" This is a required field").css('color','red');
      $("#street").removeClass('w3-border-red');
      $("#street").removeClass('w3-border-green');
      $("#street").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#street").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagestreet").removeClass('fa fa-thumbs-o-down');
      $("#messagestreet").removeClass('fa fa-thumbs-o-up');
    }




if (citys==' ')
    {
        

$("#messagecity").html("This is a required field").css('color','red');
      $("#city").removeClass('w3-border-red');
      $("#city").removeClass('w3-border-green');
      $("#city").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#city").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecity").removeClass('fa fa-thumbs-o-down');
      $("#messagecity").removeClass('fa fa-thumbs-o-up');


      }

        else
    {
        $("#messagecity").html("   ").css('color','green');
        $("#messagecity").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#city").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }


if(citys=='')
    {
      $("#messagecity").html(" This is a required field").css('color','red');
      $("#city").removeClass('w3-border-red');
      $("#city").removeClass('w3-border-green');
      $("#city").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#city").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagecity").removeClass('fa fa-thumbs-o-down');
      $("#messagecity").removeClass('fa fa-thumbs-o-up');
    }





}

$(document).ready(function () {
   $("#username, #password,  #lastname, #firstname, #middlename, #contact, #city, #street, #email").keyup(checkPasswordMatch);
});
</script>





<script>
function myFunction() {
    var txtname,txtphone,txtemail,txtfirstname, txtmiddlename ,txtlastname, txtcontact, txtstreet, txtcity, text;

    // Get the value of the input field with id="numb"
    
    txtemail = document.getElementById("email").value;
    txtfirstname = document.getElementById("firstname").value;
    txtmiddlename= document.getElementById("middlename").value;
    txtlastname = document.getElementById("lastname").value;
    txtcontact = document.getElementById("contact").value;
    txtstreet = document.getElementById("street").value;
    txtcity = document.getElementById("city").value;

    // If x is Not a Number or less than one or greater than 10
   
   
  if (txtfirstname=='') 
    {
        alert("First Name is a required filled");
        return false;
    } 
     else if (txtlastname=='') 
    {
        alert("Last Name is a required filled");
        return false;
    } 
     else if (txtcontact=='') 
    {
        alert("Contact Number is a required filled");
        return false;
    } 
    
else if (txtlastname.match(/[0-9]/g)) 
    {
        alert("Last name must not be numerical");
        return false;
    } 
    else if (txtfirstname.match(/[0-9]/g)) 
    {
        alert("First name must not be numerical");
        return false;
    } 

 else if (txtmiddlename.match(/[0-9]/g)) 
    {
        alert("Middle name must not be numerical");
        return false;
    } 

else if (txtstreet=='') 
    {
        alert("Street is a required filled");
        return false;
    } 
     else if (txtcity=='') 
    {
        alert("City is a required filled");
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

