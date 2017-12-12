<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM billing WHERE customer = '" . $_POST["country_id"] . "'";
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