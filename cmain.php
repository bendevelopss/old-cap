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
  header('Location: index.php');
}

$content2=mysql_query("select * from customer where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
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
<title>Account: Setting</title>
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
h4
{
  border-bottom: 2px solid black;
  text-align: center;
  font-weight: bold;
 
}
h5
{
  border-bottom: 2px solid black;
  text-align: center;
 
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

echo'<body class="w3-container">
<!--navbar-->
<ul class="w3-navbar w3-card-4 w3-camo-dark-green w3-large">
  <li><a href="cmain.php"><i class="fa fa-home" style="height: 22px; text-align: center;">  Fareal Builders Inc.</i></a></li>
    <li class="w3-right w3-dropdown-hover w3-hover-orange">';
      ?>
    <a class="w3-black w3-hover-black" href="#"><?php echo ''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.'; ?> <i class="fa fa-user"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4" style="right:0">
      <?php echo' <h5><a href="customer.php">User Settings</a></h5>
      <h5><a href="?logout=true">Logout</a></h5>
    </a></li>
    <li class="w3-right" style="margin-top:8px;"><span id="time" style="margin-left: -250px;"></span></li>
</ul>
<!--navbar-->';


?>

<!--navbar-->
<?php
if(isset($_GET['logout']))
{
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo "<meta http-equiv='refresh' content='0'>";
}

$proj=$_POST['c_name1'];

if($cust_type2=="Company")
{
  $name=''.$comp_name2.'';
}
else if($cust_type2=="Individual")
{
  $name=''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.ucfirst($middlename2[0]).'.';
}


 if(isset($_POST['req']))

{

$status="requested";

mysql_query("insert into quotation (username, password, customer, project, date, address, phone, email, status) values('".$_SESSION['user']."','".$_SESSION['pass']."','".$name."', '".$proj."', '".$a."', '".$street2."', '".$phone_num2."', '".$email2."','".$status."')");
  
echo '<script type="text/javascript">alert("Information has been added")</script>'; 
echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!--row class start-->
<div class="w3-row">
<!--row class-->

<!--card to right-->
<div class="w3-col w3-container m8 l9" >
<!--card to right-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:120%; margin-top: 15px; margin-left: 80px; ">
<!--card start-->

<!--card Header-->
<header class="w3-container w3-camo-dark-green w3-round">
  <h1>Ongoing: Quotation</h1>
</header>
<!--card Header-->

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
<div class="container" style="width:98%; margin-left: 10px;">
    <br> <br> <br> <br>
  <table class="table-bordered w3-table w3-bordered w3-striped w3-border w3-hoverable" id="tableko" name="tableko" >
    <thead>
      <tr class="w3-camo-dark-green">
        <th>Project</th>
        <th>Date</th>
        <th>Prepared By</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM quotation where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' and status='active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
      echo'<tr>';
        echo'<td><a href="quotstatus.php?project='.ucfirst($row['project']).'" style="color:blue; ">'.ucfirst($row['project']).'</a></td>';
        echo'<td>'.ucfirst($row['date']).'</td>';
        echo'<td>'.ucfirst($row['prepared_by']).'</td>';
        echo'<td>'.ucfirst($row['status']).'</td>';
       
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
    $('#tableko').DataTable();
});
    </script>
    </div>
<!--DataTable-->

<!--edit modal-->
<div class="modal fade" id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method ="post" role="form" id="editForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">X  </span><span class="sr-only">Close</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Add Project</h4>

            </div>
            <div class="modal-body">
              <div class="form-group">
              <label>Project Name:</label>
              <input class="form-control" name="c_name1" id="c_name1" value=""/>
              <label>Address:</label>
              <input class="form-control" name="c_name2" id="c_name2" value=""/>
              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="req" onclick="return confirm('Are you sure?');" >Request Quotation</button>
            </div>
        </div>
    </div>
</div>
</form>
<!--edit modal end-->

<input class="w3-btn w3-blue w3-border w3-border-red w3-round-large"" type="button" data-toggle="modal" data-target="#myModal" name="modal" id="modal" value="Request Quotation Form" onclick="get_id(this)"/>
<br></br>
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
<?php
if(isset($_POST['btnRemove'])) {
 echo $_POST['btnRemove'];
}

if(isset($_POST['btnEdit'])) {
 echo $_POST['btnEdit'];
}
?>
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
</body>
</html>

