<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$table = null;
$param1 = null;
$param2 = null;
$param3 = null;


$sql = "INSERT INTO " . $table . " VALUES ( " . $param1 . ", " . $param2 . ", " . $param3 . ");";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
	echo $param1 . ", " . $param2 . ", " . $param3 . ", entered into table '" . $table . "' successfully<br>";
} else {
    echo "Error creating record: " . $conn->error . "<br>";
}

$conn->close();
?>