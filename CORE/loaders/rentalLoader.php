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

//Rental Loader

echo "<br/> <br/> Load Rental.csv <br/>";

$myfile = fopen("../Input_Data/Rental.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
    
	list($Status, 
		 $VehicleID, 
		 $CustID,
         $Daily,
         $Weekly,
         $StartDate,
         $NoOfDays,
         $NoOfWeeks,
         $ReturnDate,
         $AmountDue)=explode(",", $newstring);
    
   // echo $Status . $VehicleID . $CustID . $Daily . $Weekly . $StartDate . $NoOfDays . $NoOfWeeks . $ReturnDate . $AmountDue . "<br>";

			 
	$sql = "INSERT INTO rental VALUES (" . $Status . ", " . $VehicleID . ", " . $CustID . "," . $Daily . "," . $Weekly . ", " . $StartDate . "," . $NoOfDays . "," . $NoOfWeeks . ", " . $ReturnDate . ", " . $AmountDue . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $Status . ", " . $VehicleID . ", " . $CustID . "," . $Daily . "," . $Weekly . "," . $StartDate . "," . $NoOfDays . "," . $NoOfWeeks . ", " . $ReturnDate . ", " . $AmountDue . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
}
fflush($myfile);

?>