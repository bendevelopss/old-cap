<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			     $productByCode = $db_handle->runQuery("SELECT * FROM materials WHERE code='" . $_POST["code"] . "' ORDER BY material_no ASC");
      $itemArray = array($productByCode[0]["code"]=>array('material_no'=>$productByCode[0]["material_no"], 'code'=>$productByCode[0]["code"],  'category'=>$productByCode[0]["category"], 'scategory_name'=>$productByCode[0]["scategory_name"], 'brand_name'=>$productByCode[0]["brand_name"], 'description'=>$productByCode[0]["description"], 'color'=>$productByCode[0]["color"], 'package'=>$productByCode[0]["package"], 'unit_measurement'=>$productByCode[0]["unit_measurement"], 'abbre'=>$productByCode[0]["abbre"],'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

			if(!empty($_SESSION["cart_itempo"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_itempo"])) {
					foreach($_SESSION["cart_itempo"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_itempo"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_itempo"] = array_merge($_SESSION["cart_itempo"],$itemArray);
				}
			} else {
				$_SESSION["cart_itempo"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_itempo"])) {
			foreach($_SESSION["cart_itempo"] as $k => $v) {
					if($_POST["code"] == $k)
						unset($_SESSION["cart_itempo"][$k]);
					if(empty($_SESSION["cart_itempo"]))
						unset($_SESSION["cart_itempo"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_itempo"]);
	break;		
}
}
?>
<HTML>
<HEAD>
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
  </head>
<BODY>
<?php
if(isset($_SESSION["cart_itempo"])){
    $item_total = 0;
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
<th><strong>Action</strong></th>
</tr> 
</thead>
<tbody>

<?php   
    foreach ($_SESSION["cart_itempo"] as $item){
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
        <td style="width:7%;"><input type="text" value="<?php echo $quantity; ?>" style="width:60%;" id="qty" "></input></td>
        <td><button type="button" onClick="cartAction('remove','<?php echo $item["code"]; ?>')" class="btnRemoveAction cart-action">Remove Item</button></td>
        </tr>
        <?php

    }
      
    ?>

</tbody>
</table>  
<br></br>
<br></br>
</div> 
<script type="text/javascript">
        $(document).ready(function(){
    $('#tableko').DataTable({
         "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
});
    </script>
  <?php
}
?>






