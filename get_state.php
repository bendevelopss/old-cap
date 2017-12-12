<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {

	$status="Active";
	$query ="SELECT * FROM subcategory WHERE category_name = '" . $_POST["country_id"] . "' and status ='".$status."'         ";
	$results = $db_handle->runQuery($query);
?>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["scategory_name"]; ?>"><?php echo $state["scategory_name"]; ?></option>
<?php
	}
}
?>