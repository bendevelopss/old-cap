<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id"])) {
  $query ="SELECT * FROM customer WHERE cust_type = '" . $_POST["country_id"] . "'";
  $results = $db_handle->runQuery($query);
?>
  <option value="">--Customer--</option>
<?php
  foreach($results as $state) {
?>
  <option value="<?php echo $state["comp_name"]; ?>"><?php echo $state["comp_name"]; ?></option>
<?php
  }
}
?>