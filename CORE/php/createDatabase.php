<?php
 
$servername = "localhost";
$username = "test_user";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Create database
$sql = "CREATE DATABASE soccer";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn ->close();
?>