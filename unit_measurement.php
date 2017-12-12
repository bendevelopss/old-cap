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
  echo "<meta http-equiv='refresh' content='0'>";
}
?>

<!--row class start-->
<div class="w3-row">
<!--row class-->

<!--card to left-->
<div class="w3-col w3-container m6 l7">
<!--card to left-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:100%; margin-top: 12px; ">
<!--card start-->

<!--card Header-->
<header class="w3-container w3-camo-dark-green w3-round">
  <h1>Maintenance: Unit Measurement</h1>
</header>
<!--card Header-->

<!--Left Body-->

<!--First box-->
<br>
<?php
$content1=mysql_query("select max(unit_no) as max from unitmeasurement");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;

$uname=$_POST['txtname'];
$abbre=$_POST['txtabbre'];

$find=mysql_query("select * from unitmeasurement where unit_measurment='".$uname."' and Abbreviation='".$abbre."' and status='active'");
$total1=@mysql_affected_rows();
$row=mysql_fetch_array($find);
$unit_name=$row['unit_measurment'];

$find2=mysql_query("select * from unitmeasurement where Abbreviation='".$abbre."' and unit_measurment='".$uname."' and status='active'");
$total12=@mysql_affected_rows();
$row2=mysql_fetch_array($find2);
$abbre_name=$row2['Abbreviation'];

if(isset($_POST['btnAdd']) && !empty($uname)&& !empty($abbre) && $uname == $unit_name && $abbre_name == $abbre)

{

 echo '<script type="text/javascript">alert("Duplicate data is not allowed")</script>'; 
}

else if(isset($_POST['btnAdd']) && !empty($uname)&& !empty($abbre) && $uname != $unit_name && $abbre_name != $abbre)

{

if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$pname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$abbre) ) 
    {

$uname1= mysql_real_escape_string($uname);
$abbre1= mysql_real_escape_string($abbre);


$status="Active";


mysql_query("insert into unitmeasurement (unit_measurment, Abbreviation, status) values('".$uname1."', '".$abbre1."', '".$status."')");
  
echo '<script type="text/javascript">alert("Measurement has been added")</script>'; 
echo "<meta http-equiv='refresh' content='0'>";
}





}

//Update query
  if(isset($_POST['btnSave']))
                {
                    $unit_no1 = $_POST['unit_no1'];
                    $unit_name = $_POST['unit_name1'];
                    $abbre_name = $_POST['abbre_name1'];
                  
                    mysql_query("UPDATE unitmeasurement SET unit_measurment='".$unit_name."', Abbreviation='".$abbre_name."' WHERE unit_no='".$unit_no1."'");
                    echo "<script type='text/javascript'>alert('Update Successfull!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
 
                                       
                }


?>

    <input class="w3-input w3-border" type="hidden" name="position_no" value="<?php echo $hell; ?>" style="width:35%;margin-left:17px; height:30px;" readonly>

<!--2 box--> 
<br> 
<br>
<div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-150px;">Unit Measurement:  </label>
    <strong><span id='messageunit' style="margin-left:-5px; color: red;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Unit Measurement Name" name="txtname" id="unitname" style="height:33px;">
    <br>
    <label style="margin-left:-150px;">Unit Abbreviation:</label>
    <strong><span id='messageabbre' style="margin-left:-5px; color: red;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Unit Abbreviation" name="txtabbre" id="unitabbre"  style="height:33px;">
  </div><br>
</div>
<br>


<!--Buttons-->
<br>
<button type="submit" name="btnAdd" onclick="return myFunction();"  class="w3-btn w3-blue w3-border w3-border-red w3-round-large">Add</button>

<button type="button" class="w3-btn w3-green w3-border w3-border-red w3-round-large" onClick="ClearFields();">Reset</button>
<br></br><br>
<!--Left Body-->

<!--card end-->
</div>
<!--card end-->

<!--card to left end-->
</div>
<!--card to left end-->






<!--card to right-->
<div class="w3-col w3-container m8 l5" >
<!--card to right-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:100%; margin-top: 10px; ">
<!--card start-->

<!--card Header-->

<header class="w3-container w3-camo-dark-green w3-round">
  <h1>Database: Unit Measurement</h1>
</header>
<!--card Header-->

<!--Table function-->
<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";


mysql_query("update unitmeasurement set status='".$status."' 
  where unit_no=".$nos);
  echo'<div class="bottom">';
echo '<script type="text/javascript">alert("Unit Measurement has been deleted")</script>'; 
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
  <table class="dt-responsive table-bordered w3-table w3-bordered w3-striped w3-border w3-hoverable" id="tableko1" name="tableko1" style="font-size: 0.9em;">
    <thead>
      <tr class="w3-camo-dark-green">
      <th> Unit Measurement No </th>
        <th>Unit Measurement</th>
         <th>Abbreviation</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM unitmeasurement where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
         $unit_no=$row['unit_no'];
        $unit_measurment=$row['unit_measurment'];
        $Abbreviation=$row['Abbreviation'];
      echo'<tr>';
       echo'<td>'. $unit_no.'</td>';
        echo'<td>'. $unit_measurment.'</td>';
         echo'<td>'.$Abbreviation.'</td>';

        ?>
        <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$unit_no.''; ?>" class="btn btn-primary btn btn-danger fa fa-close btn-xs"  onclick="return confirm('Are you sure?');"></button>
        <?php
       echo'<button type="button" name="btnEdit" id="bntEdit" value="'.$unit_no.'" data-toggle="modal" data-target="#myModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button>
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
<!--DataTable-->


<!--edit modal-->
<div class="modal fade" id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method ="post" role="form" id="editForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">X  </span><span class="sr-only">Close</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Edit Unit Measurement</h4>

            </div>
            <div class="modal-body">
              <div class="form-group">
<label>Unit Measurement No:</label>
              <input class="form-control" name="unit_no1" id="unit_no1" value="" readonly>

              <label>Unit Measurement:</label>
              <input class="form-control" name="unit_name1" id="unit_name1" value=""/>
              <label>Unit Abbreviation:</label>
              <input class="form-control" name="abbre_name1" id="abbre_name1" value=""/>
              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnSave" onClick="return confirm('Are you sure?');" >Save changes</button>
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
                $unit_no1 = $modal.find('#unit_no1');
            $unit_no1.val(getid);
            $unit_no1 = $modal.find('#unit_no1');
            $unit_no1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);
            $unit_name1 = $modal.find('#unit_name1');
            $unit_name1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);
            $abbre_name1 = $modal.find('#abbre_name1');
            $abbre_name1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);
          
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
      document.getElementById("unitname").value = "";
      document.getElementById("unitabbre").value = "";
 var unitm = $("#unitname").val();
    var unita= $("#unitabbre").val();


 $("#unitname").removeClass('w3-border-red');
      $("#unitname").removeClass('w3-border-green');
      $("#unitname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#unitname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageunit").removeClass('fa fa-thumbs-o-down');
      $("#messageunit").removeClass('fa fa-thumbs-o-up');


$("#unitabbre").removeClass('w3-border-red');
      $("#unitabbre").removeClass('w3-border-green');
      $("#unitabbre").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#unitabbre").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageabbre").removeClass('fa fa-thumbs-o-down');
      $("#messageabbre").removeClass('fa fa-thumbs-o-up');

 




}


$(document).ready(function () {
   $("#unitname, #unitabbre").keyup(checkPasswordMatch);
});
</script>


<script type="text/javascript">
function checkPasswordMatch() {
    var unitm = $("#unitname").val();
    var unita= $("#unitabbre").val();

   


 
 if (unitm == '')
    {
        

$("#messageunit").html(" required").css('color','red');
      $("#unitname").removeClass('w3-border-red');
      $("#unitname").removeClass('w3-border-green');
      $("#unitname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#unitname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageunit").removeClass('fa fa-thumbs-o-down');
      $("#messageunit").removeClass('fa fa-thumbs-o-up');


      }


 else
    {
        $("#messageunit").html("   ").css('color','green');
        $("#messageunit").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#unitname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

 if (unita == '')
    {
        

$("#messageabbre").html(" required").css('color','red');
      $("#unitabbre").removeClass('w3-border-red');
      $("#unitabbre").removeClass('w3-border-green');
      $("#unitabbre").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#unitabbre").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageabbre").removeClass('fa fa-thumbs-o-down');
      $("#messageabbre").removeClass('fa fa-thumbs-o-up');


      }


 else
    {
        $("#messageabbre").html("   ").css('color','green');
        $("#messageabbre").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#unitabbre").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }






    





      }

$(document).ready(function () {
   $("#unitname, #unitabbre").keyup(checkPasswordMatch);
});
</script>




<script>

function myFunction() {

var  name,abbree,  text;

 name = document.getElementById("unitname").value;
 abbree = document.getElementById("unitabbre").value;

  if (name=='') 
    {
        alert("Unit Measurement is a required filled");
        return false;
    } 

    else if (abbree=='') 
    {
        alert("Unit Abbreviation is a required filled");
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

