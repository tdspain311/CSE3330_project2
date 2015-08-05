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
IdNo INT                				NOT NULL AUTO_INCREMENT,
Name varchar(50)					NOT NULL,
Phone varchar(15),
PRIMARY KEY (IdNo)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table customer created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE car
(
VehicleID INT(5)           			NOT NULL AUTO_INCREMENT,
Model VARCHAR (70)			NOT NULL,
Year INT			    				NOT NULL,
Availability VARCHAR(10) 		DEFAULT 'Yes',
PRIMARY KEY (VehicleID)
);";

if ($conn->query($sql) === TRUE) {
    echo "Table car created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}
//$sql = "ALTER TABLE car AUTO_INCREMENT=1001;";


$sql = "CREATE TABLE type
(
TypeName varchar(10),
DailyRate decimal(10,2),
WeeklyRate decimal(10,2),
PRIMARY KEY (TypeName)
);";

//FOREIGN KEY (TypeName) REFERENCES car(Type)

if ($conn->query($sql) === TRUE) {
    echo "Table type created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
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
    echo "Table car_type created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE rental
(
Status VARCHAR(12) 			DEFAULT 'Scheduled',
VehicleID INT(4),
CustID INT(2),
Daily VARCHAR(6)				DEFAULT 'No',
Weekly VARCHAR(6)			DEFAULT 'No',
StartDate VARCHAR(10),
NoOfDays INT						DEFAULT 0,
NoOfWeeks INT					DEFAULT 0,
ReturnDate DATE,
AmountDue decimal(10,2),
PRIMARY KEY (Status,VehicleID,CustID),
FOREIGN KEY (VehicleID) REFERENCES car(VehicleID),
FOREIGN KEY (CustID) REFERENCES customer(IdNo)
);";

if ($conn->query($sql) === TRUE) {
    echo "Table rental created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$sql ="ALTER TABLE car AUTO_INCREMENT=1000;";

if ($conn->query($sql) === TRUE) {
    echo "Table car altered successfully<br>";
} else {
    echo "Error altering table: " . $conn->error . "<br>";
}
$conn->close();

?>
