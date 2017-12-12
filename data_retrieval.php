<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectmonitoring";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$var = array();
$sql = "SELECT * FROM customer";
$result = mysqli_query($con, $sql);


while($obj = mysqli_fetch_object($result)) {
$var[] = $obj;
}
echo '{"uploads":'.json_encode($var).'}';

?>
