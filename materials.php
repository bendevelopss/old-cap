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
<div class="w3-col w3-container m6 l8">
<!--card to left-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:100%; margin-top: 10px; ">
<!--card start-->

<!--card Header-->
<header class="w3-container w3-camo-dark-green w3-round">
  <h1>Maintenance: Materials</h1>
</header>
<!--card Header-->

<!--Left Body-->

<!--First box-->
<br>
<?php
$content1=mysql_query("select max(material_no) as max from materials");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];



$hell=$noo+1;


$hell2 ="mtrl". $hell;


$cname=$_POST['cname'];
$scname=$_POST['scname'];
$desc=$_POST['desc'];
$brand=$_POST['brand'];
$color=$_POST['color'];
$pack=$_POST['pack'];
$unitname=$_POST['unitname'];
$abbrev=$_POST['abbrev'];
$pricing=$_POST['txtprice'];
$status="Active";



$find1111=mysql_query("select * from materials where category='".$cname."'");
$total11=@mysql_affected_rows();
$row1111=mysql_fetch_array($find1111);
$cname2=$row1111['category'];


$find11111=mysql_query("select * from materials where scategory_name='".$scname."'");
$total11111=@mysql_affected_rows();
$row11111=mysql_fetch_array($find11111);
$scname2=$row11111['scategory_name'];


$find11=mysql_query("select * from materials where description='".$desc."'");
$total11=@mysql_affected_rows();
$row11=mysql_fetch_array($find11);
$desc2=$row11['description'];






if(isset($_POST['btnAdd']) && !empty($cname)  && !empty($scname))

{

if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$brand) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$desc) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$pack))
{

$brands= mysql_real_escape_string($brand);
$descs= mysql_real_escape_string($desc);
$packs= mysql_real_escape_string($pack);





mysql_query("insert into materials (code,category, scategory_name,description, brand_name, color, package, unit_measurement, abbre, price, status ) 
  values('". $hell2."','". $cname."','".$scname."', '".$descs."','".$brands."'  ,'".$color."', '".$packs."','".$unitname."', '".$abbrev."', '".$pricing."', '".$status."')");
  
echo '<script type="text/javascript">alert("Materials has been added")</script>'; 
echo "<meta http-equiv='refresh' content='0'>";

}
}





//Update query1
  if(isset($_POST['btnSave']))
                {
                    $material_no11 = $_POST['material_no1'];           
                    $cname11=$_POST['cname1'];
                    $scname11=$_POST['scname1'];
                    $desc11=$_POST['desc1'];
                    $brand11=$_POST['brand1'];
                    $color11=$_POST['color1'];
                    $pack11=$_POST['pack1'];
                    $unitname11=$_POST['unitname1'];
                    $abbrev11=$_POST['abbrev1'];
                     $price11=$_POST['price1'];


                  
                    mysql_query("UPDATE materials SET category='".$cname11."',scategory_name='".$scname11."',description='".$desc11."',brand_name='".$brand11."', color='".$color11."', package='".$pack11."', unit_measurement='".$unitname11."', abbre='".$abbrev11."' , price='".$price11."'  WHERE material_no='".$material_no11."'");
                    echo "<script type='text/javascript'>alert('Update Successful!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
 
                                       
                }


?>

<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$status="Active";

$query ="SELECT * FROM category where status = '".$status."'  ";
$results = $db_handle->runQuery($query);
?>

<script>
function getState(val) {
  $.ajax({
  type: "POST",
  url: "get_state.php",
  data:'country_id='+val,
  success: function(data){
    $("#scname").html(data);
  }
  });
}

</script>

    <input class="w3-input w3-border" type="hidden" name="customer_no" value="<?php echo $hell; ?>" style="width:35%; margin-left:15px; height:30px;" readonly>
    <br>

<!--3 box--> 

<br>
<div class="w3-row-padding">
  <div class="w3-third">
    <label style="margin-left:-190px;">Category:</label>
        <select name="cname" id="cname" class="form-control" onChange="getState(this.value);" style="width:130%;"></p>
        <option value="">--Select Category--</option>
                <?php
                foreach($results as $country) {
                ?>
                <option value="<?php echo $country["category_name"]; ?>"><?php echo $country["category_name"]; ?></option>
                <?php
                }
              echo'</select>';?>
  </div>
  <div class="w3-third">
    <label style="margin-left:100px;">Measurement:</label>
    <input class="w3-input w3-border" type="text" placeholder="Measurement" style="margin-left:130px; height:33px; width:70%;" id="unitname" name="unitname">
  </div>
  <div class="w3-third">
    <label style="margin-left:-155px; margin-top: 0px;">Unit:</label>
 <select name="abbrev" id="abbrev" class="form-control" style="margin-left:40px; width:70%;"></p>

      <?php
$content1=mysql_query("select * from unitmeasurement where status='Active'");
$total1=@mysql_affected_rows();
 echo'<option value=""></option>';
for($x=1;$x<=$total1;$x++)
{
    
$row=mysql_fetch_array($content1);

$unit_name=$row['unit_measurment'];
$abbre=$row['Abbreviation'];



echo'<option value="'.$abbre.'">'.$abbre.'</option>';

}
      echo'</select>';?>
  </div>
  <div class="w3-half">
  <label style="margin-left:-300px; margin-top: 10px;">Sub-Category:</label>
 <select name="scname" id="scname" class="form-control" style="width:85%;"></p>
              <option value="">--Select Subcategory--</option>
               </select>
 <label style="margin-left:-320px; margin-top:10px;">Description:</label>

  </div>

 

  <div class="w3-half">
    <label style="margin-left:-380px; margin-top: 10px;">Brand:</label>
    <input class="w3-input w3-border" type="text" placeholder="Brand" style="margin-left:-18px; height:33px; width:95%;" id=brand name="brand">
  </div>
  <div class="w3-half">
    <label style="margin-left:-390px; margin-top: 10px;">Color:</label>
    <input class="w3-input w3-border" type="txt" placeholder="Color" style="margin-left:-18px; height:33px; width:95%;"  id="color" name="color">
  </div> 

  <div class="w3-half">
    <input class="w3-input w3-border" type="txt" placeholder="Description" style="margin-top: -33px; height:33px; width:85%; "  id="desc" name="desc">
    
  </div> 
  

   <div class="w3-half">

   <label style="margin-right:380px; margin-top:10px;">*Price:</label>
    <input class="w3-input w3-border" type="txt" placeholder="Price" style="margin-left:0px; height:33px; width:85%; "  id="idprice" name="txtprice">
  </div>

<div class ="w3-half">
 <label style="margin-left:-350px; margin-top:10px;">Package:</label>
  <input class="w3-input w3-border" type="txt" placeholder="Package" style="margin-left:-18px; height:33px; width:95%; "  id="pack" name="pack">
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
  <h1>Database: Materials</h1>
</header>
<!--card Header-->

<!--Modal Button-->
<button type="button" onClick="document.getElementById('id01').style.display='block'" class="w3-btn">Full Size Table</button>

<!--Table function-->
<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";


mysql_query("update materials set status='".$status."' 
  where material_no=".$nos);
  echo'<div class="bottom">';
echo'<div class="alert alert-success">
  <strong>Success!</strong> Material has been deleted 
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
      <th> Material No.</th>
        <th>Category</th>
        <th>Subcategory</th>   
        <th>Description</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Package</th>
        <th>Measurement</th>
        <th>Unit</th>
        <th>Price</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM materials where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
      echo'<tr>';
         echo'<td>'.$row['material_no'].'</td>';
        echo'<td>'.$row['category'].'</td>';
        echo'<td>'.$row['scategory_name'].'</td>';
        echo'<td>'.$row['description'].'</td>';
        echo'<td>'.$row['brand_name'].'</td>';
        echo'<td>'.$row['color'].'</td>'; 
        echo'<td>'.$row['package'].'</td>'; 
        echo'<td>'.$row['unit_measurement'].'</td>'; 
        echo'<td>'.$row['abbre'].'</td>';   
         echo'<td>'.$row['price'].'</td>';   
       
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
                        return 'Details for '+data[4]+': '+data[3]+' '+data[6]+''+data[7];
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
      <h2>Database: Materials</h2>
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
      <th>Material No. </th>
        <th>Category</th>
        <th>Subcategory</th>   
        <th>Description</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Package</th>
        <th>Measurement</th>
        <th>Unit</th>
        <th>Price</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
     ';
      $sql = "SELECT * FROM materials where status='Active'";
      $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
      { 
        $material_no=$row['material_no'];
        $category=$row['category'];
        $scategory_name=$row['scategory_name'];
        $description=$row['description'];
        $brand_name=$row['brand_name'];
        $color=$row['color']; 
        $package=$row['package'];
        $unit_measurement=$row['unit_measurement'];
        $abbre=$row['abbre'];
        $price=$row['price'];

      echo'<tr>';
      echo'<td>'.$material_no.'</td>';
        echo'<td>'.$category.'</td>';
        echo'<td>'.$scategory_name.'</td>';
        echo'<td>'.$description.'</td>';
        echo'<td>'.$brand_name.'</td>';
        echo'<td>'.$color.'</td>'; 
        echo'<td>'.$package.'</td>'; 
        echo'<td>'.$unit_measurement.'</td>'; 
        echo'<td>'.$abbre.'</td>'; 
         echo'<td>'.$price.'</td>'; 
        ?>
        <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$material_no.''; ?>" class="btn btn-primary btn btn-danger fa fa-close btn-xs"  onclick="return confirm('Are you sure?');"></button>
        <?php
       echo'<button type="button" name="btnEdit" id="bntEdit" value="'.$material_no.'" data-toggle="modal" data-target="#myModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button>
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
      <p>Materials</p>
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
                 <h4 class="modal-title" id="myModalLabel">Edit Materials</h4>

            </div>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM category";
$results = $db_handle->runQuery($query);
?>

<script>
function getState1(val) {
  $.ajax({
  type: "POST",
  url: "get_state2.php",
  data:'country_id2='+val,
  success: function(data){
    $("#scname1").html(data);
  }
  });
}
</script>           
            <div class="modal-body">
              <div class="form-group">


 <label>Material No:</label>
              <input class="form-control" name="material_no1" id="material_no1" value=""/>

              <label>* Category</label>
               <select name="cname1" id="cname1" class="form-control" onChange="getState1(this.value);"></p>
              <option value="">--Select Category--</option>
                <?php
                foreach($results as $country1) {
                ?>
                <option value="<?php echo $country1["category_name"]; ?>"><?php echo $country1["category_name"]; ?></option>
                <?php
                }
              echo'</select>';?>
              <label>* Subcategory:</label>
              <select name="scname1" id="scname1" class="form-control"></p>
              <option value="">--Select Subcategory--</option>
               </select>
               <label>Description:</label>
              <input class="form-control" name="desc1" id="desc1" value=""/>
              <label>Brand:</label>
              <input class="form-control" name="brand1" id="brand1" value=""/>
              <label>Color:</label>
              <input class="form-control" name="color1" id="color1" value=""/>
              <label>Package:</label>
              <input class="form-control" name="pack1" id="pack1" value=""/>
              <div class="w3-half">
              <label>Measurement:</label>
              <input class="form-control" type="text" placeholder="Measurement" id="unitname1" name="unitname1">
              </div>
              <div class="w3-half">
                <label>Unit:</label>
               <select name="abbrev1" id="abbrev1" class="form-control" style="margin-left:40px; width: 80%;" ></p>
                    <?php
              $content1=mysql_query("select * from unitmeasurement where status='Active'");
              $total1=@mysql_affected_rows();
              for($x=1;$x<=$total1;$x++)
              {
                  
              $row=mysql_fetch_array($content1);

              $unit_name=$row['unit_measurment'];
              $abbre=$row['Abbreviation'];

              echo'<option value="'.$abbre.'">'.$abbre.'</option>';

              }
                    echo'</select>';?>
                </div>
                 <label>Price:</label>
              <input class="form-control" name="price1" id="price1" value=""/>
              <br><br></br></br>


              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return myFunctionss();" name="btnSave"  >Save changes</button>
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
                $material_no1 = $modal.find('#material_no1');
            $material_no1.val(getid);     
$material_no1 = $modal.find('#material_no1');
            $material_no1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);


            $desc1 = $modal.find('#desc1');
            $desc1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);
            $brand1 = $modal.find('#brand1');
            $brand1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[4].innerHTML); 
            $color1 = $modal.find('#color1');
            $color1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
            $pack1 = $modal.find('#pack1');
            $pack1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);
            $unitname1 = $modal.find('#unitname1');
            $unitname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);
            $abbrev1 = $modal.find('#abbrev1');
            $abbrev1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[8].innerHTML);
              $price1 = $modal.find('#price1');
            $price1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[9].innerHTML);
          
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

var  pri, text, unitname, cname, scname;
 
 pri = document.getElementById("idprice").value;
 unitname= document.getElementById("unitname").value;
cname= document.getElementById("cname").value;
scname= document.getElementById("scname").value;

  if (pri<= -1) 
    {
        alert("Negative price is not allowed");
        return false;
    } 


else if (cname == '') {

alert("Category is a required filled");
        return false;


}
else if (scname == '') {

alert("Subcategory is a required filled");
        return false;


}
else if (pri == '') {

alert("Price is a required filled");
        return false;


}

else if (unitname.match(/[a-zA-Z]/g)) 
    {
        alert("Measurement must not be alphabetical");
        return false;
    } 

    else
      
 {
        text = "Input OK";

    }
    document.getElementById("demo").innerHTML = text;



  }
</script>
<script>
function myFunctionss() {

var  pri1, text, unitname1, cname1, scname1;
 
 price1 = document.getElementById("price1").value;
 unitname1= document.getElementById("unitname1").value;
cname1= document.getElementById("cname1").value;
scname1= document.getElementById("scname1").value;

  if (price1<= -1) 
    {
        alert("Negative price is not allowed");
        return false;
    } 


else if (cname1 == '') {

alert("Category is a required filled");
        return false;


}
else if (scname1 == '') {

alert("Subcategory is a required filled");
        return false;


}
else if (price1 == '') {

alert("Price is a required filled");
        return false;


}

else if (unitname1.match(/[a-zA-Z]/g)) 
    {
        alert("Measurement must not be alphabetical");
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

