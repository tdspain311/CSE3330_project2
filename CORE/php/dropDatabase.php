<?php
 
$servername = "localhost";
$username = "test_user";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Create database
$sql = "DROP SCHEMA db_rental";
if ($conn->query($sql) === TRUE) {
    echo "Database 'db_rental' dropped successfully<br>";
} else {
    echo "Error dropping database: " . $conn->error . "<br>";
}

$conn ->close();
?>