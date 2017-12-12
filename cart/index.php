<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
?>
<HTML>
<HEAD>
<TITLE>PHP Shopping Cart with jQuery AJAX</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
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
	var queryString = "";
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val();
			break;
			case "remove":
				queryString = 'action='+action+'&code='+ product_code;
			break;
			case "empty":
				queryString = 'action='+action;
			break;
		}	 
	}
	jQuery.ajax({
	url: "ajax_action.php",
	data:queryString,
	type: "POST",
	success:function(data){
		$("#cart-item").html(data);
		if(action != "") {
			switch(action) {
				/*se "add":
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
</HEAD>
<BODY>
<div id="product-grid">
	<div class="txt-heading">Products</div>
  <?php
  $product_array = $db_handle->runQuery("SELECT * FROM materials ORDER BY material_no ASC");
  if (!empty($product_array))
   { 
    echo'<table class="dt-responsive table-bordered w3-table w3-bordered w3-striped w3-border w3-hoverable" id="tableko1" name="tableko1" style="font-size: 0.9em;">
    
    <thead>
<tr class="w3-camo-dark-green">
<th><strong>Material ID</strong></th>
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
<tbody>';
    foreach($product_array as $key=>$value)
    {
  ?>    <tr>
      <form method="post" action="materialrequisition2.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>&employee=<?php echo $scname?>&materialreq=<?php echo $quote_no?>">
      <td><strong><?php echo $product_array[$key]["material_no"]; ?></strong></td>
      <td><strong><?php echo $product_array[$key]["brand_name"]; ?></strong></td>
      <td><strong><?php echo $product_array[$key]["category"]; ?></strong></td>
      <td><strong><?php echo $product_array[$key]["scategory_name"]; ?></strong></td>
      <td><strong><?php echo $product_array[$key]["description"]; ?></strong></td>
      <td><strong><?php echo $product_array[$key]["color"]; ?></strong></td>
      <td><strong><?php echo $product_array[$key]["package"]; ?></strong></td>
      <td><strong><?php echo $product_array[$key]["unit_measurement"];?></strong></td>
      <td><strong><?php echo $product_array[$key]["abbre"];?></strong></td>
      <td><input type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" /></td>
      <td><input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class="btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')"/></td>
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
</div>
<div class="clear-float"></div>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');">Empty Cart</a></div>
<div id="cart-item"></div>
</div>
<script>
$(document).ready(function () {
	cartAction('','');
})
</script>


</BODY>
</HTML>