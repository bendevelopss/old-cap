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
  <h1>Maintenance: Subcategory</h1>
</header>
<!--card Header-->

<!--Left Body-->

<!--First box-->
<br>
<?php
$content1=mysql_query("select max(scategory_no) as max from subcategory");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;

$cname=$_POST['cname'];
$scname=$_POST['txtname'];





$find=mysql_query("select * from subcategory where scategory_name='".$scname."' and category_name ='".$cname."' and status='active'");
$total1=@mysql_affected_rows();
$row=mysql_fetch_array($find);
$scategory_name2=$row['scategory_name'];


$find1=mysql_query("select * from subcategory where category_name='".$cname."' and scategory_name ='".$scname."' and status='active'");
$total11=@mysql_affected_rows();
$row1=mysql_fetch_array($find1);
$category_name1=$row1['category_name'];


if(isset($_POST['btnAdd']) && !empty($scname) && $category_name1==$cname && $scategory_name2==$scname)

{

echo '<script type="text/javascript">alert("Duplicate data is not allowed")</script>'; 

}


else if(isset($_POST['btnAdd']) && !empty($scname) && $categoey_name1!=$cname && $scategory_name!=$scname)

{

if(preg_match("/^[a-zA-Z,-,', ,.]*$/",$scname)) 
    {

$scname1= mysql_real_escape_string($scname);


$status="Active";


mysql_query("insert into subcategory (category_name, scategory_name,  status) values('".$cname."','".$scname1."','".$status."')");
  
 echo '<script type="text/javascript">alert("Subcategory has been added")</script>'; 
 echo "<meta http-equiv='refresh' content='0'>";
}



}






//Update query
  if(isset($_POST['btnSave']))
                {
                    $sc_no = $_POST['sc_no1'];
                    $c_name = $_POST['c_name1'];
                    $sc_name = $_POST['sc_name1'];
                  
                    mysql_query("UPDATE subcategory SET category_name='".$c_name."' ,scategory_name='".$sc_name."' WHERE scategory_no='".$sc_no."'");
                    echo "<script type='text/javascript'>alert('Update Successful!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
 
                                       
                }


?>

    <input class="w3-input w3-border" type="hidden" name="scategory_no" value="<?php echo $hell; ?>" style="width:35%;margin-left:17px; height:30px;" readonly>

<!--2 box--> 
<br> 
<br>

<div class="w3-row-padding">
  <div class="w3-half" style="margin-left:30px;">
  <label style="margin-left:-200px;">Category:</label>
              <select name="cname" id="cname" class="form-control"></p>
              <?php
              $content1=mysql_query("select * from category where status='Active'");
              $total1=@mysql_affected_rows();
              for($x=1;$x<=$total1;$x++)
              {
                  
              $row=mysql_fetch_array($content1);

              $category_name=$row['category_name'];

              echo'<option value="'.$category_name.'">'.$category_name.'</option>';
              }
              echo'</select>';?>
              <br>
    <label style="margin-left:-150px;">Subcategory Name:</label>
    <strong><span id='messages' style="margin-left:-5px; color: red;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Subcategory Name" name="txtname" id="textbox_A" style="height:33px;">
  
  </div><br>

</div>
<br>


<!--Buttons-->
<br>
<button type="submit" name="btnAdd" onclick="return myFunction();" class="w3-btn w3-blue w3-border w3-border-red w3-round-large">Add</button>

<button type="button" class="w3-btn w3-green w3-border w3-border-red w3-round-large" onclick="ClearFields();">Reset</button>
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
  <h1>Database: Subcategory</h1>
</header>
<!--card Header-->

<!--Table function-->
<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";


mysql_query("update subcategory set status='".$status."' 
  where scategory_no=".$nos);
  echo'<div class="bottom">';
 echo '<script type="text/javascript">alert("Subcategory has been deleted")</script>'; 
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
      <th>SubCategory No </th>
        <th>Category</th>
        <th>Subcategory  Name</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM subcategory where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
         $scategory_no=$row['scategory_no'];
        $category_name=$row['category_name'];
        $scategory_name=$row['scategory_name'];
      echo'<tr>';
       echo'<td>'.$scategory_no.'</td>';
        echo'<td>'.$category_name.'</td>';
        echo'<td>'.$scategory_name.'</td>';
        ?>
        <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$scategory_no.''; ?>" class="btn btn-primary btn btn-danger fa fa-close btn-xs"  onclick="return confirm('Are you sure?');"></button>
        <?php
       echo'<button type="button" name="btnEdit" id="bntEdit" value="'.$scategory_no.'" data-toggle="modal" data-target="#myModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button>
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
                 <h4 class="modal-title" id="myModalLabel">Edit Subcategory</h4>

            </div>
            <div class="modal-body">
              <div class="form-group">

              <label>Subcategory No:</label>
              <input class="form-control" name="sc_no1" id="sc_no1" value=""/>
             
              <label>Category:</label>
              <select name="c_name1" id="c_name1" class="form-control"></p>
              <?php
              $content1=mysql_query("select * from category where status='Active'");
              $total1=@mysql_affected_rows();
              for($x=1;$x<=$total1;$x++)
              {
                  
              $row=mysql_fetch_array($content1);

              $c_name1=$row['category_name'];

              echo'<option value="'.$c_name1.'">'.$c_name1.'</option>';
              }
              echo'</select>';?>
              <label>Subcategory Name:</label>
              <input class="form-control" name="sc_name1" id="sc_name1" value=""/>
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
                $sc_no1 = $modal.find('#sc_no1');
            $sc_no1.val(getid);

 $sc_no1 = $modal.find('#sc_no1');
            $sc_no1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);

            $c_name1 = $modal.find('#c_name1');
            $c_name1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);
            $sc_name1 = $modal.find('#sc_name1');
            $sc_name1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);
          
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

}
</script>


<script type="text/javascript">
function checkPasswordMatch() {
    var pos = $("#textbox_A").val();

   


 
 if (pos == '')
    {
        

$("#messages").html("required").css('color','red');
      $("#textbox_A").removeClass('w3-border-red');
      $("#textbox_A").removeClass('w3-border-green');
      $("#textbox_A").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#textbox_A").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messages").removeClass('fa fa-thumbs-o-down');
      $("#messages").removeClass('fa fa-thumbs-o-up');


      }

    else
    {
        $("#messages").html("   ").css('color','green');
        $("#messages").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#textbox_A").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }



      }

$(document).ready(function () {
   $("#textbox_A").keyup(checkPasswordMatch);
});
</script>








<script>
function myFunction() {

var  scategory, text, cname;

 scategory = document.getElementById("textbox_A").value;
 cname = document.getElementById("cname").value;

  if (scategory =='') 
    {
        alert("SubCategory Name is a required filled");
        return false;
    } 
  else if(cname =='')
  {

    alert("Category is a required filled ");
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

