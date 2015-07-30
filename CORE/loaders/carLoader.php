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

//Cars Loader

echo "<br/> <br/> Load Cars.csv <br/>";

$myfile = fopen("../Input_Data/Cars.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
    //echo($newstring);
 
    list($VehicleID, 
		 $Model, 
		 $Year,  
		 $Availability)=explode(",", $newstring);
		 
	//echo $VehicleID . $Model . $Year . $Type . $Availability . "<br>";
	
	$sql = "INSERT INTO car VALUES (" . $VehicleID . ", " . $Model . ", " . $Year . ", " . $Availability . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $VehicleID . ", " . $Model . ", " . $Year . ", " . $Availability . " added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
}
fflush($myfile);

?>