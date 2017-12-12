<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id2"])) {
	$query ="SELECT * FROM subcategory WHERE category_name = '" . $_POST["country_id2"] . "'";
	$results = $db_handle->runQuery($query);
?>
	<option value="">--Select Subcategory--</option>
<?php
	foreach($results as $state1) {
?>
	<option value="<?php echo $state1["scategory_name"]; ?>"><?php echo $state1["scategory_name"]; ?></option>
<?php
	}
}
?>