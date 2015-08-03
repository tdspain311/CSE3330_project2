<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//**TESTING**
//TRIGGERS
$sql = "CREATE TRIGGER ReturnDate_Insert BEFORE INSERT ON rental
FOR EACH ROW 
BEGIN
SET NEW.ReturnDate = DATE_ADD(StartDate, INTERVAL NoOfDays+7*NoOfWeeks DAY);
END;";

if ($conn->query($sql) === TRUE) {
    echo "Table trigger 'ReturnDate_Insert' created successfully<br>";
} else {
    echo "Error creating trigger: " . $conn->error . "<br>";
}

$sql = "CREATE TRIGGER ReturnDate_Update BEFORE UPDATE ON rental
FOR EACH ROW 
BEGIN
SET NEW.ReturnDate = DATE_ADD(StartDate, INTERVAL NoOfDays+7*NoOfWeeks DAY);
END;";

if ($conn->query($sql) === TRUE) {
    echo "Table trigger 'ReturnDate_Update' created successfully<br>";
} else {
    echo "Error creating trigger: " . $conn->error . "<br>";
}

$conn->close();

?>
