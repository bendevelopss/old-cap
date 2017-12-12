<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM quotation WHERE quote_no = '" . $_POST["country_id"] . "'";
	$results = $db_handle->runQuery($query);
	foreach($results as $state) {
?>
		<option value="<?php echo $state["balance"]; ?>"><?php echo $state["balance"]; ?></option>
		<?php
	}
	?>
<?php
}
?>