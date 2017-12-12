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

if($_GET['id']=='' && $_GET['customer']=='' && $_GET['scname']=='' && $_GET['prepared']=='')
{
  echo'<script type="text/javascript">
  alert("Authentication Error");
  window.location.href="quot1.php";

  </script>';
     //   return;
  //header('Location: quot1.php');
}

$content2=mysql_query("select * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
$total2=@mysql_affected_rows();

    
$row=mysql_fetch_array($content2);

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

require_once("dbcontroller.php");
$db_handle = new DBController();

$a= date("Y-m-d");

?>
<HTML>
<HEAD>
<title>Cart</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="http://localhost/xampp/capstone/font-awesome-4.6.3/css/font-awesome.min.css">
  <script src="jQuery/jQuery-2.1.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
      <!--- datatables -->
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/responsive/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/css/jquery.dataTables.min.css">
  <script src="http://localhost/xampp/capstone/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="http://localhost/xampp/capstone/DataTables/responsive/js/dataTables.responsive.min.js"></script>
  <!--- datatables -->
 <!--- function -->
  <script>
function showEditBox(editobj,id) {
  $('#frmAdd').hide();
  var currentMessage = $("#message_" + id + " .message-content").html();
  var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
  $("#message_" + id + " .message-content").html(editMarkUp);
}
function cancelEdit(message,id) {
  $("#message_" + id + " .message-content").html(message);
  $('#frmAdd').show();
}
function cartAction(action,product_code) {
  var qty;
  qty = $("#qty_"+product_code).val();
  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
      if(qty>=1)
      {
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val();
      break;
      }
      else if(qty==0)
      {
        alert("Quantity cannot be equal to Zero!");
      break;
      }
      else
      {
        alert("Quantity cannot be less than Zero!");
      break;
      }
      case "remove":
        queryString = 'action='+action+'&code='+ product_code;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    }  
  }
  jQuery.ajax({
  url: "quotation2_action.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
      switch(action) {
        /*case "add":
          $("#add_"+product_code).hide();
          "#added_"+product_code).show();
        break;*/
        case "remove":
          $("#add_"+product_code).show();
          $("#added_"+product_code).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}
</script>
<!--- function -->

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
<div class="w3-col w3-container m8 l5">
<!--card to left-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:250%; margin-top: 10px; ">
<!--card start-->

<!--card Header-->
<header class="w3-container w3-camo-dark-green w3-round">
  <h1>Item List</h1>
</header>
<!--card Header-->
<?php
if(isset($_POST['scname']) && isset($_POST['quote_no'])  && isset($_POST['prepared']) && isset($_POST['customer'] ))
{
$prepared=$_POST['prepared'];
$scname = $_POST['scname'];
$quote_no = $_POST['quote_no'];
}

$content2=mysql_query("select project,customer from quotation where quote_no='".$_GET['scname']."'");
$total2=@mysql_affected_rows();

    
$row=mysql_fetch_array($content2);
$project2=$row['project'];
$cust2=$row['customer'];


?>
<!--Input-->

    <div class="w3-half">
<label style="margin-left:-350px;">Quotation ID:</label>
    <input class="w3-input w3-border" type="text" placeholder="Company" name="quote" id="quote" style="height:33px; width: 20%; margin-left:100px; text-align: center;" value="<?php echo ''.$_GET['id'].''; ?>" readonly>
    </div>
<div class="w3-half">
 <label for="pwd" style="margin-left:130px;">Due Date:</label></b>
    <input type="date" name="ddate" value="<?php echo $a; ?>" class="form-control" style="margin-left:300px; width: 30%; ">
    </div>

    <div class="w3-half">
   <br>
<label style="margin-left:-250px;">Company/ Contact Person:</label>
    <input class="w3-input w3-border" type="text" placeholder="Company" name="comp" id="comp" style="height:33px; width: 45%; margin-left:100px; text-align: center; " value="<?php echo ''.$cust2.''; ?>" readonly>
    <br></br>
    </div>
    <div class="w3-half">
  <br>
<label style="margin-left:-1050px;">Project:</label>
    <input class="w3-input w3-border" type="text" placeholder="Project" name="proj" id="proj" style="height:33px; width: 20%; margin-left:-220px; text-align: center;" value="<?php echo ''.$project2.''; ?>" readonly>
</div>

<div class="container" style="width:100%; margin-left: 0px; margin-top:0px;">

 <?php
  $product_array = $db_handle->runQuery("SELECT * FROM materials ORDER BY material_no ASC");
  if (!empty($product_array))
   { 
    echo'<table class="table-bordered w3-table w3-bordered w3-striped w3-border w3-hoverable" id="tableko1" name="tableko1" style="font-size: 0.9em;">
    
    <thead>
<tr class="w3-camo-dark-green">
<th><strong>Brand</strong></th>
<th><strong>Category</strong></th>
<th><strong>Sub-Category</strong></th>
<th><strong>Description</strong></th>
<th><strong>Color</strong></th>
<th><strong>Package</strong></th>
<th><strong>Measurement</strong></th>
<th><strong>Abbreviation</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr> 
</thead>
<tbody>';
    foreach($product_array as $key=>$value)
    {
  ?>    <tr>
      <form method="post" action="quotation2.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>&employee=<?php echo $scname?>&materialreq=<?php echo $quote_no?>">
      <td><?php echo $product_array[$key]["brand_name"]; ?></td>
      <td><?php echo $product_array[$key]["category"]; ?></td>
      <td><?php echo $product_array[$key]["scategory_name"]; ?></td>
      <td><?php echo $product_array[$key]["description"]; ?></td>
      <td><?php echo $product_array[$key]["color"]; ?></td>
      <td><?php echo $product_array[$key]["package"]; ?></td>
      <td><?php echo $product_array[$key]["unit_measurement"];?></strong></td>
      <td><?php echo $product_array[$key]["abbre"];?></td>
      <td><input type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" class="qty" name="quantity" value="1" size="2" /></td>
      <td><?php echo '&#8369;'.$product_array[$key]["price"].'';?></td>
      <td><input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" name ="adds" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" /></td>
      </form>
      </tr>
    </div>
    </tr>
  <?php
      }
  }
  ?> 
     </tbody>
  </table>
  <br>
      <script type="text/javascript">
        $(document).ready(function(){
    $('#tableko1').DataTable({
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    
    });
});


    </script>

    </div>
    </div>
<!--Output-->

<!--card end-->
</div>
<!--card end--

<!--card to left end-->
</div>
<!--card to left end-->


<!--card to right-->
<div class="w3-col w3-container m8 l4" >
<!--card to right-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:317%; margin-top: 25px; ">
<!--card start-->

<!--card Header-->
<header class="w3-container w3-green w3-round">
  <h1>Cart</h1>
</header>

<!--card Header-->
<br></br>
<div id="cart-item"></div>
<br></br>

<form method="post" action="quotation2.php?id=<?php echo ''.$_GET['id'].''?>&scname=<?php echo ''.$_GET['scname'].''?>&customer=<?php echo ''.$_GET['customer'].''?>&project=<?php echo ''.$project2.''?>&prepared=<?php echo ''.$_GET['prepared'].''?>">
<?php
$content3=mysql_query("select * from quotation where customer='".$_GET['customer']."'");
$total3=@mysql_affected_rows();

    
$row3=mysql_fetch_array($content3);

$date3=$row3['date'];
$add3=$row3['address'];
$proj3=$row3['project'];


if(isset($_POST['btnAdd']))
{

if(empty($_SESSION["cart_itempoq"]))
{
 echo '<script type="text/javascript">alert("Cart empty")</script>'; 
}

else
{ 

  ?>
<div class="container" style="width:100%; margin-left: 0px; margin-top:0px;">
<table class="table-bordered w3-table w3-bordered w3-striped w3-border w3-hoverable" id="tableko" name="tableko" style="font-size: 0.9em;">
<thead>
<tr class="w3-green">
<th><strong>Brand</strong></th>
<th><strong>Category</strong></th>
<th><strong>Sub-Category</strong></th>
<th><strong>Description</strong></th>
<th><strong>Color</strong></th>
<th><strong>Package</strong></th>
<th><strong>Measurement</strong></th>
<th><strong>Abbreviation</strong></th>
<th><strong>Quantity</strong></th>
</tr> 
</thead>
<tbody>
<H1> RECENTLY ADDED </H1>
<br>
<?php   
    foreach ($_SESSION["cart_itempoq"] as $item){
    ?>
       <?php
       $code=$item["code"];
       $brand_name = $item["brand_name"];
       $category = $item["category"];
       $scategory_name = $item["scategory_name"];
       $description = $item["description"];
       $color = $item["color"];
       $package = $item["package"];
       $unit_measurement = $item["unit_measurement"];
       $abbre = $item["abbre"];
       $quantity = $item["quantity"];
       ?>
        <tr>
        <td><strong><?php echo $brand_name; ?></strong></td>
        <td><strong><?php echo $category; ?></strong></td>
        <td><strong><?php echo $scategory_name; ?></strong></td>
        <td><strong><?php echo $description; ?></strong></td>
        <td><strong><?php echo $color; ?></strong></td>
        <td><strong><?php echo $package; ?></strong></td>
        <td><strong><?php echo $unit_measurement; ?></strong></td>
        <td><strong><?php echo $abbre; ?></strong></td>
        <td style="width:7%;"><?php echo $quantity; ?></input></td>
        </tr>
        <?php

    }
    ?>

</tbody>
</table>  
<br>
<script type="text/javascript">
        $(document).ready(function(){
    $('#tableko').DataTable({
         "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
});
    </script>

<?php
    $prep=mysql_real_escape_string($_GET['prepared']);
    $ddate=$_POST['due_date'];
    $dd=date_create($ddate);
    $datepic=date_format($dd,"Y-m-d");
    $accepted='active';
    foreach($_SESSION["cart_itempoq"] as $item)
    {
     

    $material_no = $item['material_no'];
    $brand_name = $item['brand_name'];
    $category = $item['category'];
    $scategory_name = $item['scategory_name'];
    $description = $item['description'];
    $color = $item['color'];
    $packages = $item['package'];
    $unit_measurement = $item['unit_measurement'];
    $abbre = $item['abbre'];
    $quantity = $item['quantity'];
    $price = $item['price'];
    $hash3= mt_rand(1,9999999);
    $hash2= md5($material_no+$hash3);

    $item_total += ($price*$quantity);
    
$content5=mysql_query("select *, max(material_no) as max from quotation_cart where quote_no='".$_GET['id']."' and material_no='".$material_no."'");
    $total5=@mysql_affected_rows();
    $row5=mysql_fetch_array($content5);

    $quantity_total=$quantity+$row5['quantity'];

    if($row5['max']>=1)
{
     mysql_query("UPDATE quotation_cart SET quantity='".$quantity_total."', quantity_remaining='".$quantity_total."' where quote_no='".$_GET['id']."' and material_no='".$material_no."' ");
    echo '<script type="text/javascript">alert("Materials '.$_GET['po_no'].' has been sssadded")</script>'; 
}
else  
{
mysql_query("insert into quotation_cart (quote_no, company,project,material_no,code,brand_name,category,scategory_name,description,color,package,unit_measurement,quantity,quantity_remaining,price,abbre,status) values('".$_GET['id']."','".$cust2."','".$_GET['project']."','".$material_no."','".$hash2."','".$brand_name."','".$category."','".$scategory_name."','".$description."','".$color."','".$package."','".$unit_measurement."','".$quantity."','".$quantity."','".$price."','".$abbre."','".$accepted."') ");

}
   
    
    }

    $content5=mysql_query("select * from quotation where quote_no='".$_GET['id']."'");
    $total5=@mysql_affected_rows();
    $row5=mysql_fetch_array($content5);

    $total_balance=$item_total+$row5['balance'];
    $total_ammount=$item_total+$row5['total_amount'];
  
    mysql_query("UPDATE quotation SET status='".$accepted."' , prepared_by='".$prep."', total_amount='".$total_ammount."', balance='".$total_balance."',due_date='".$datepic."' where project='".$project2."' ");
     echo '<script type="text/javascript">alert("Materials has been added")</script>'; 
        
     ?>
 
     <button type="button"  class="w3-btn"> <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');">Empty Cart</a></button>
      
   <?php
   unset($_SESSION["cart_itempoq"]);
  }
}
    
?>
<button type="button"  onclick="done()" class="w3-btn">Back</button>
<button type="submit" name="btnAdd" id="btnAdd" class="w3-btn w3-blue w3-border w3-border-red w3-round-large" >Add</button>


</form>
<script>
$(document).ready(function () {
  cartAction('','');
})
</script>
<br>

    <script>
    function done() {
    window.location.href="quot1.php";
    }
    </script>


</div>
</div>
<!--Input-->

<!--Card end div-->
</div>
<!--Card end div-->

<!--card to right end-->
</div>
<!--card to right end-->

<!--row class end-->
</div>
<!--row class-->

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

</BODY>
</HTML>