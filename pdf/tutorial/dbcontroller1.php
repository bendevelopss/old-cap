<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "projectmonitoring";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn1 = mysql_connect($this->host,$this->user,$this->password);
		return $conn1;
	}
	
	function selectDB($conn1) {
		mysql_select_db($this->database,$conn1);
	}
	
	function runQuery($query1) {
		$result1 = mysql_query($query1);
		while($row1=mysql_fetch_assoc($result1)) {
			$resultset1[] = $row1;
		}		
		if(!empty($resultset1))
			return $resultset1;
	}
	
	function numRows($query1) {
		$result1  = mysql_query($query1);
		$rowcount1 = mysql_num_rows($result1);
		return $rowcount1;	
	}
}
?>