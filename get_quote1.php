<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["country_id1"])) {
  $query ="SELECT * FROM customer WHERE cust_type = '" . $_POST["country_id1"] . "'";
  $results = $db_handle->runQuery($query);
?>
  <option value="">--Customer--</option>
<?php
  foreach($results as $state) {
?>
  <option value="<?php echo ''.$state["firstname"].', '.$state["firstname"].''; ?>"><?php echo ''.$state["lastname"].', '.$state["firstname"].''; ?></option>
<?php
  }
}
?>