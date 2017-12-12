<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM billing WHERE billing_no = '" . $_POST["country_id"] . "' and balance>=0";
	$results = $db_handle->runQuery($query);
	foreach($results as $state) {
?>
		<option value="<?php echo $state["topay"]; ?>"><?php echo $state["topay"]; ?></option>
		<?php
	}
	?>
<?php
}
?>