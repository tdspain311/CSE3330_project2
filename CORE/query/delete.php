<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$table = $_POST['formTableName'];

if(isset($_POST['formTableName'])) {
	switch ($table) {
		case "Customer":
			$condition = $_POST['cust_id'];
			
			$sql = "DELETE FROM " . $table . " WHERE IdNo=" . $condition . ";";

			if ($conn->query($sql) === TRUE) {
				echo $condition . " is now deleted from '" . $table . "' successfully<br>";
			} else {
				echo "Error deleting record: " . $conn->error . "<br>";
			}
			break;
		case "Car":
			$condition = $_POST['car_vid'];
			
			$sql = "DELETE FROM " . $table . " WHERE VehicleID=" . $condition . ";";

			if ($conn->query($sql) === TRUE) {
				echo $condition . " is now deleted from '" . $table . "' successfully<br>";
			} else {
				echo "Error deleting record: " . $conn->error . "<br>";
			}
			break;
	}
}
$conn->close();
?>