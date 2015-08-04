<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$table = null;
$condition = null;
$param1 = null;
$param2 = null;


$sql = "UPDATE " . $table . " SET " . $param1 . "='" . $param2 . "' WHERE " . $param1 . "='". $condition . "';";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
	echo $param1 . " is now " . $param2 . " when " . $table . " has '" . $condition . "' successfully<br>";
} else {
    echo "Error updating record: " . $conn->error . "<br>";
}

$conn->close();
?>