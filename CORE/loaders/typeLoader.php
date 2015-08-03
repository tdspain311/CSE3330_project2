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

//type Loader

echo "<br/> <br/> Load Type.csv <br/>";

$myfile = fopen("../../Input_Data/Type.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);
    $newstring = preg_replace("/[\r\n]/","",$line);

    list($VehicleID, 
		 $TypeName, 
		 $DailyRate, 
		 $WeeklyRate)=explode(",", $newstring);
		 
	$sql = "INSERT INTO type VALUES (" . $VehicleID . ", " . $TypeName . ", " . $DailyRate . ", " . $WeeklyRate . ");";
	echo $sql;
    
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $VehicleID . ", " . $TypeName . ", " . $DailyRate . ", " . $WeeklyRate . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
}
fflush($myfile);

?>