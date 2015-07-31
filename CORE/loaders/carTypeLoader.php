<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
    echo "Connection error";
} 

//CarType Loader

echo "<br/> <br/> Load CarType.csv <br/>";

$myfile = fopen("../../Input_Data/CarType.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);
    $newstring = preg_replace("/[\r\n]/","",$line);

    list($VehicleID, 
		 $TypeName)=explode(",", $newstring);
		 
	$sql = "INSERT INTO car_type VALUES (" . $VehicleID . ", " . $TypeName . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $VehicleID . ", " . $TypeName . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
}
fflush($myfile);

?>