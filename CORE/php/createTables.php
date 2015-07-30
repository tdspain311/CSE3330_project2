<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// sql to create table
$sql = "CREATE TABLE customer
(
IdNo INT PRIMARY KEY,
Name varchar(50)		NOT NULL,
Phone varchar(15)
)";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table customer created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE car
(
VehicleID INT PRIMARY KEY,
Model VARCHAR (70)		NOT NULL,
Year INT			    NOT NULL,
Availability VARCHAR(10)
);";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table car created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE type
(
TypeName varchar(10) PRIMARY KEY,
DailyRate decimal(10,2),
WeeklyRate decimal(10,2)
);";

//FOREIGN KEY (TypeName) REFERENCES car(Type)

if ($conn->query($sql) === TRUE) {
    echo "<br>Table type created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE car_type
(
VID int,
TName varchar(10),
PRIMARY KEY (VID,TName),
FOREIGN KEY (VID) REFERENCES car(VehicleID),
FOREIGN KEY (TName) REFERENCES type(TypeName)
);";

//FOREIGN KEY (TypeName) REFERENCES car(Type)

if ($conn->query($sql) === TRUE) {
    echo "<br>Table car_type created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE rental
(
Status VARCHAR(12),
VehicleID INT(4),
CustID INT(2),
Daily VARCHAR(6),
Weekly VARCHAR(6),
StartDate DATE,
NoOfDays INT,
NoOfWeeks INT,
ReturnDate DATE,
AmountDue decimal(10,2),
PRIMARY KEY (Status,VehicleID,CustID),
FOREIGN KEY (VehicleID) REFERENCES car(VehicleID),
FOREIGN KEY (CustID) REFERENCES customer(IdNo)
);";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table rental created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$conn->close();

?>
