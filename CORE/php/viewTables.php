<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='3'>Customer</th></tr><tr><th>IdNo</th><th>Name</th><th>Phone</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["IdNo"]."</td><td>".$row["Name"]."</td><td>".$row["Phone"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT * FROM car";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='4'>Car</th></tr><tr><th>VehicleID</th><th>Model</th><th>Year</th><th>Availability</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["VehicleID"]."</td><td>".$row["Model"]."</td><td>".$row["Year"]."</td><td>".$row["Availability"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT * FROM type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='3'>Type</th></tr><tr><th>TypeName</th><th>DailyRate</th><th>WeeklyRate</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["TypeName"]."</td><td>".$row["DailyRate"]."</td><td>".$row["WeeklyRate"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT * FROM car_type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='2'>Car Type</th></tr><tr><th>VID</th><th>TName</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["VID"]."</td><td>".$row["TName"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT * FROM rental";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='9'>Rental</th></tr><tr><th>Status</th><th>VehicleID</th><th>CustID</th><th>Daily</th><th>Weekly</th><th>StartDate</th><th>NoOfDays</th><th>ReturnDate</th><th>AmountDue</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Status"]."</td><td>".$row["VehicleID"]."</td><td>".$row["CustID"]."</td><td>".$row["Daily"]."</td><td>".$row["Weekly"]."</td><td>".$row["StartDate"]."</td><td>".$row["NoOfDays"]."</td><td>".$row["ReturnDate"]."</td><td>".$row["AmountDue"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$conn->close();
?>