<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$sql = "SELECT * FROM rental";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='10'>Rentals</th></tr><tr><th>Status</th><th>VehicleID</th><th>CustID</th><th>Daily</th><th>Weekly</th><th>StartDate</th><th>NoOfDays</th><th>NoOfWeeks</th><th>ReturnDate</th><th>AmountDue</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Status"]."</td><td>".$row["VehicleID"]."</td><td>".$row["CustID"]."</td><td>".$row["Daily"]."</td><td>".$row["Weekly"]."</td><td>".$row["StartDate"]."</td><td>".$row["NoOfDays"]."</td><td>".$row["NoOfWeeks"]."</td><td>".$row["ReturnDate"]."</td><td>".$row["AmountDue"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='3'>Customers</th></tr><tr><th>IdNo</th><th>Name</th><th>Phone</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["IdNo"]."</td><td>".$row["Name"]."</td><td>".$row["Phone"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT VehicleID, Model, Year, Availability, DailyRate, WeeklyRate FROM car, car_type, type WHERE car_type.TName = 'COMPACT' AND car_type.VID = car.VehicleID AND type.TypeName = car_type.TName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='6'>Compact Cars</th></tr><tr><th>VehicleID</th><th>Model</th><th>Year</th><th>Availability</th><th>DailyRate</th><th>WeeklyRate</th</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["VehicleID"]."</td><td>".$row["Model"]."</td><td>".$row["Year"]."</td><td>".$row["Availability"]."</td><td>".$row["DailyRate"]."</td><td>".$row["WeeklyRate"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT VehicleID, Model, Year, Availability, DailyRate, WeeklyRate FROM car, car_type, type WHERE car_type.TName = 'LARGE' AND car_type.VID = car.VehicleID AND type.TypeName = car_type.TName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='6'>Large Vehicles</th></tr><tr><th>VehicleID</th><th>Model</th><th>Year</th><th>Availability</th><th>DailyRate</th><th>WeeklyRate</th</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["VehicleID"]."</td><td>".$row["Model"]."</td><td>".$row["Year"]."</td><td>".$row["Availability"]."</td><td>".$row["DailyRate"]."</td><td>".$row["WeeklyRate"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT VehicleID, Model, Year, Availability, DailyRate, WeeklyRate FROM car, car_type, type WHERE car_type.TName = 'MEDIUM' AND car_type.VID = car.VehicleID AND type.TypeName = car_type.TName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='6'>Medium Vehicles</th></tr><tr><th>VehicleID</th><th>Model</th><th>Year</th><th>Availability</th><th>DailyRate</th><th>WeeklyRate</th</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["VehicleID"]."</td><td>".$row["Model"]."</td><td>".$row["Year"]."</td><td>".$row["Availability"]."</td><td>".$row["DailyRate"]."</td><td>".$row["WeeklyRate"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT VehicleID, Model, Year, Availability, DailyRate, WeeklyRate FROM car, car_type, type WHERE car_type.TName = 'SUV' AND car_type.VID = car.VehicleID AND type.TypeName = car_type.TName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='6'>SUVs</th></tr><tr><th>VehicleID</th><th>Model</th><th>Year</th><th>Availability</th><th>DailyRate</th><th>WeeklyRate</th</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["VehicleID"]."</td><td>".$row["Model"]."</td><td>".$row["Year"]."</td><td>".$row["Availability"]."</td><td>".$row["DailyRate"]."</td><td>".$row["WeeklyRate"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$sql = "SELECT VehicleID, Model, Year, Availability, DailyRate, WeeklyRate FROM car, car_type, type WHERE car_type.TName = 'TRUCK' AND car_type.VID = car.VehicleID AND type.TypeName = car_type.TName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='tables'><tr><th colspan='6'>Trucks</th></tr><tr><th>VehicleID</th><th>Model</th><th>Year</th><th>Availability</th><th>DailyRate</th><th>WeeklyRate</th</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["VehicleID"]."</td><td>".$row["Model"]."</td><td>".$row["Year"]."</td><td>".$row["Availability"]."</td><td>".$row["DailyRate"]."</td><td>".$row["WeeklyRate"]."</td></tr>";
    }
    echo "</table><br>";
} else {
    echo "0 results<br>";
}

$conn->close();
?>