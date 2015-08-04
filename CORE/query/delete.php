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

$sql = "DELETE FROM " . $table . " WHERE "  . $param1 . "='" . $condition . "';";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
	echo $condition . " is now deleted from '" . $table . "' successfully<br>";
} else {
    echo "Error deleting record: " . $conn->error . "<br>";
}

$conn->close();
?>