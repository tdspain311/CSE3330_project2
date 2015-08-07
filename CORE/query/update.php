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
			$param1 = $_POST['cust_name'];
			$param2 = $_POST['phone_num'];
			$sql = "INSERT INTO " . $table . " (Name, Phone) VALUES ( '" . $param1 . "', '" . $param2 . "');";

			if ($conn->query($sql) === TRUE) {
				echo $param1 . ", " . $param2 . " entered into table '" . $table . "' successfully<br>";
			} else {
				echo "Error creating record: " . $conn->error . "<br>";
			}
			break;
		case "Car":
			$param1 = $_POST['car_model'];
			$param2 = $_POST['year_model'];
			$sql = "INSERT INTO " . $table . " (Model, Year) VALUES ( '" . $param1 . "', '" . $param2 . "');";

			if ($conn->query($sql) === TRUE) {
				echo $param1 . ", " . $param2 . " entered into table '" . $table . "' successfully<br>";
			} else {
				echo "Error creating record: " . $conn->error . "<br>";
			}
			$param3 = $_POST['carType'];
			$sql = "INSERT INTO car_type VALUES ((SELECT VehicleID FROM car WHERE Model='" . $param1 . "' AND Year=" . $param2 . "), UPPER('" . $param3 . "'));";
			
			if ($conn->query($sql) === TRUE) {
				echo $param3 . " entered into table 'car_type' successfully<br>";
			} else {
				echo "Error creating record: " . $conn->error . "<br>";
			}
			break;
		case "Rental":
			$param1 = $_POST['vid'];
			$param2 = $_POST['cid'];
			
			$sql = "DELETE FROM " . $table . " WHERE VehicleID=" . $param1 . " AND CustID=" . $param2 . ";";
			
			if ($conn->query($sql) === TRUE) {
				echo "Customer '" . $param2 . "' is has returned vehicle<br>";
			} else {
				echo "Error deleting record: " . $conn->error . "<br>";
			}
			
			$sql = "UPDATE car SET Availability='Yes' WHERE VehicleID=" . $param1 . ";";
			
			if ($conn->query($sql) === TRUE) {
				echo "Vehicle '" . $param1 . "' is now available<br>";
			} else {
				echo "Error updating record: " . $conn->error . "<br>";
			}
			break;
		case "Rates":
			$table = 'type';
			$param1 = $_POST['carType'];
			$param2 = $_POST['updateRate'];
			$condition = $_POST['updateOption'];
			
			if ($condition == 'Daily') {
				$sql = "UPDATE " . $table . " SET DailyRate ='" . $param2 . "' WHERE TypeName='". $param1 . "';";
			}
			if ($condition == 'Weekly') {
				$sql = "UPDATE " . $table . " SET WeeklyRate ='" . $param2 . "' WHERE TypeName='". $param1 . "';";
			}
			
			if ($conn->query($sql) === TRUE) {
				echo $param1 . ", '" . $condition . "'  is now $" . $param2 . " on '" . $table . "' table has successfully been updated<br>";
			} else {
				echo "Error updating record: " . $conn->error . "<br>";
			}
			break;
	}
}

$conn->close();
?>