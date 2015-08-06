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
				echo $param1 . ", " . $param2 . ", entered into table '" . $table . "' successfully<br>";
			} else {
				echo "Error creating record: " . $conn->error . "<br>";
			}
			break;
		case "Car":
			$param1 = $_POST['car_model'];
			$param2 = $_POST['year_model'];
			$sql = "INSERT INTO " . $table . " (Model, Year) VALUES ( '" . $param1 . "', '" . $param2 . "');";

			if ($conn->query($sql) === TRUE) {
				echo $param1 . ", " . $param2 . ", entered into table '" . $table . "' successfully<br>";
			} else {
				echo "Error creating record: " . $conn->error . "<br>";
			}
			break;
		case "Rental":
			$param1 = $_POST['vehicle'];
			$param2 = $_POST['id_number'];
			$param3 = $_POST['period'];
			$param4 = $_POST['days_weeks'];
			if ($param3 == 'Daily') {
				$sql = "INSERT INTO " . $table . " (VehicleID, CustID, Period, NoOfDays) VALUES ( " . $param1 . ", " . $param2 . ", '" . $param3 . "', '" . $param4 . ");";
			}
			if ($param3 == 'Weekly') {
				$sql = "INSERT INTO " . $table . " (VehicleID, CustID, Period, NoOfWeeks) VALUES ( " . $param1 . ", " . $param2 . ", '" . $param3 . "', '" . $param4 . ");";
			}
			if ($conn->query($sql) === TRUE) {
				echo $param1 . ", " . $param2 . ", " . $param3 . ", " . $param4 . ", " . $param5 . ", " . $param6 . ", entered into table '" . $table . "' successfully<br>";
			} else {
				echo "Error creating record: " . $conn->error . "<br>";
			}
			break;
	}
}

$conn->close();
?>