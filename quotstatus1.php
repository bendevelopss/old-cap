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

    
$row=mysql_fetch_array($content2);

$pos=$row['position'];
$user2=$row['username'];
$pass2=$row['password'];
$cust_type2=$row['cust_type'];
$comp_name2=$row['comp_name'];
$phone_num2=$row['phone_num'];
$fax2=$row['fax'];
$email2=$row['email'];
$firstname2=$row['firstname'];
$middlename2=$row['middlename'];
$lastname2=$row['lastname'];
$contact2=$row['contact'];
$city2=$row['city'];
$street2=$row['street'];


$a= date("Y-m-d");

$content3=mysql_query("select * from quotation where quote_no='".$_GET['id']."' ");
$total3=@mysql_affected_rows();
$row3=mysql_fetch_array($content3);

$date=$row3['date'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Quotation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
  <script src="jQuery/jQuery-2.1.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.js"></script>
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

.custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
  }
  .custom-combobox-input {
  
    padding: 5px 10px;
    width: 310px;
  }

</style>


<?php



$prepare= $_POST['prepared'];
?>


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
    <h6>Audit Trail</h6>  
      <a href="audit_trail.php">Audit Trail</a>
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

echo'<body class="w3-container">
<!--navbar-->
<ul class="w3-navbar w3-card-4 w3-camo-dark-green w3-large">
  <li><a href="main.php"><i class="fa fa-home" style="height: 22px; text-align: center;">  Fareal Builders Inc.</i></a></li>
    <li class="w3-dropdown-hover w3-hover-orange">
    <a class="w3-hover-brown" href="#">Transaction<i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <h6>Quotation</h6>  
      <a href="quot1.php">Quotation-Form</a>
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

 $contents=mysql_query("select * from quotation where quote_no='".$_GET['id']."'");
    $totals=@mysql_affected_rows();
    $rows=mysql_fetch_array($contents);

echo'
<div class="container" style="width:98%; margin-left: 10px;">
    <br> <br>
    <label style="margin-left: -990px;">Project: '.$_GET['project'].'</label>
    <br>
    <label style="margin-left: -990px;">Start Date: '.$rows['date'].'</label>
    <br> 
    <label style="margin-left: -950px;">Due Date: '.$rows['due_date'].'</label>
    <br><br>';


function getNumberOFDays($from,$to){
    $from_date = new DateTime($from);
    $to_date = new DateTime($to);
    return $from_date->diff($to_date)->days;
  
}
function getNumberOFDays1($from,$to){
    $from_date = new DateTime($from);
    $to_date = new DateTime($to);
    return $from_date->diff($to_date)->days;
  
}

$ngayon1 = getNumberOFDays($a,$rows['date']);

$totaldate=getNumberOFDays1($rows['date'], $rows['due_date']);

$d1 = strtotime($rows['date']);
$d2 = strtotime($rows['due_date']);

if(isset($_POST['re_date']))
{
  $due_dates = $_POST['dates'];
                  $dd=date_create($due_dates);
                 $datepic=date_format($dd,"Y-m-d");
                    mysql_query("UPDATE quotation SET due_date='".$datepic."' WHERE quote_no='".$_GET['id']."'");
                    echo "<script type='text/javascript'>alert('Update Successful!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
 
}


     ?>
<input type="hidden" value="<?= $ngayon1 ?>" id="ngayon" name="ngayon"/>
<input type="hidden" value="<?= $totaldate ?>" id="totaldate" name="totaldate"/>
<input type="hidden" value="<?php echo $d1 ?>" id="d1" name="d1"/>
<input type="hidden" value="<?php echo $d2 ?>" id="d2" name="d2"/>

<?php
// if($_POST['ngayon']==$_POST['totaldate'])
// {
//   echo'<input type="date" value="" id="date" name="date" readonly/>';
// }
// else
// {
//   echo'<input type="date" value="" id="date" name="date"/>';
// }
?>
<!--Progressbar-->

<div class="w3-container">
  <h2>Project (base on date):</h2>

  <div class="w3-progress-container">
    <div id="myBar1" class="w3-progressbar w3-round-xlarge w3-green" style="width:0%">
      <div id="demo1" class="w3-center w3-text-white"></div>
    </div>
  </div>
  <br>
  <input type="date" name="dates" id="dates" style="text-align: center" value="<?php echo $a?>">
  <button type="submit" name="re_date" id="re_date">Extend Date
  <br>
</div>

<script>
 $(document).ready(function() {
  var elem = document.getElementById("myBar1"); 
  var width = 0;
  var nga= (parseFloat(parseFloat($("#ngayon").val(),10)));
  var tot= (parseFloat(parseFloat($("#totaldate").val(),10)));
  var d1=$("#d1").val();
  var d2=$("#d2").val();
  var id = setInterval(frame, 10);
  var total = (parseFloat(parseFloat($("#ngayon").val(), 10) / (parseFloat($("#totaldate").val(), 10)+nga))) * 100;
  function frame() {
    if (width >= total) {
      clearInterval(id);
    } 
    else {
      width++; 
      elem.style.width = width + '%'; 
      //document.getElementById("demo1").innerHTML = width * 1  + '%';
       if(width=='100')
      {
      document.getElementById("demo1").innerHTML = "DONE";
      elem.style.width= 100 +'%';
      $("#re_date").show();
      $("#dates").show();
      }
      else if(total<=.90)
      {
      document.getElementById("demo1").innerHTML = "DONE";
      elem.style.width= 100 +'%';
      $("#re_date").show();
      $("#dates").show();
      }
      else if(d1>d2)
      {
      document.getElementById("demo1").innerHTML = "DONE";
      elem.style.width= 100 +'%';
      $("#re_date").show();
      $("#dates").show();
      }
      else
      {
      document.getElementById("demo1").innerHTML = width * 1  + '%';
      $("#re_date").hide();
      $("#dates").hide();

      }
    }
  }
});
</script>


<div class="w3-container">
  <h1>Project's Progress</h1>
  <br>
  <h2>Project:</h2>

  <div class="w3-progress-container">
    <div id="myBar" class="w3-progressbar w3-round-xlarge w3-green" style="width:0%">
      <div id="demo" class="w3-center w3-text-white"></div>
    </div>
  </div>
  <br>
  <br>
</div>

<script>
 $(document).ready(function() {
  var elem = document.getElementById("myBar"); 
  var width = 0;
  var id = setInterval(frame, 10);
  var total = parseFloat(parseFloat($("#qua1").val(), 10) * 100)/ parseFloat($("#qua").val(), 10);
  function frame() {
    if (width >= total) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      if(width>='100')
      {
      document.getElementById("demo").innerHTML = "DONE";
      elem.style.width= 100 +'%';
      }
      else
      {
      document.getElementById("demo").innerHTML = width * 1  + '%';
      }
     
    }
  }
});
</script>
<?php

  echo '<table class="table-bordered w3-table w3-bordered w3-striped w3-border w3-hoverable" id="tableko" name="tableko" >
    <thead>
      <tr class="w3-camo-dark-green">
        <th>No.</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Sub-category</th>
        <th>Description</th>
        <th>Color</th>
        <th>Package</th>
        <th>Measurement</th>
        <th style="text-align:center">Qty
        (Ordered)</th>
        <th style="text-align:center">Qty remaining</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
     ';
      $a=0;
      $sql = "SELECT *  FROM quotation_cart where quote_no='".$_GET['id']."' and status='active' group by material_no";
      //$sql = "SELECT * FROM quotation_cart where project='".$_GET['project']."' and status='active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
      echo'<tr>';
     
      $a++;
        echo'<td>'.$a.'</td>';
        echo'<td>'.ucfirst($row['brand_name']).'</td>';
        echo'<td>'.ucfirst($row['category']).'</td>';
        echo'<td>'.ucfirst($row['scategory_name']).'</td>';
        echo'<td>'.ucfirst($row['description']).'</td>';
        echo'<td>'.ucfirst($row['color']).'</td>';
        echo'<td>'.ucfirst($row['package']).'</td>';
        echo'<td>'.ucfirst($row['unit_measurement']).''.$row['abbre'].'</td>';
        echo'<td>'.ucfirst($row['quantity']).'</td>';
        echo'<td>'.ucfirst($row['quantity_remaining']).'</td>';
        echo'<td>&#8369;'.ucfirst($row['price']).'</td>';
       
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
<?php

    $content5=mysql_query("select *, sum(quantity) as max, sum(quantity_remaining) as total from quotation_cart where quote_no='".$_GET['id']."'");
    $total5=@mysql_affected_rows();
    $row5=mysql_fetch_array($content5);
     echo'<input type="hidden" value="'.$row5['max'].'" id="qua" name="qua"/>';
     echo'<input type="hidden" value="'.$row5['total'].'" id="qua1" name="qua1"/>';
    ?>

Total Amount: <?php echo'&#8369;'.number_format((double)$rows['total_amount'],2,'.','').''; ?>
   <br>
Balance: <?php echo'&#8369;'.number_format((double)$rows['balance'],2,'.','').''; ?>
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

