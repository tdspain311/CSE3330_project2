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

echo "<br/> <br/> Load Customer.csv <br/>";

$myfile = fopen("../Input_Data/Customers.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
 
    list($IdNo, 
		 $Name, 
		 $Phone)=explode(",", $newstring);
		 
		
	$sql = "INSERT INTO customer VALUES (" . $IdNo . ", " . $Name . ", " . $Phone . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $IdNo . ", " . $Name . ", " . $Phone . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}

}
fflush($myfile);

//Load Cars
echo "<br/> <br/> Load Cars.csv <br/>";

$myfile = fopen("../Input_Data/Cars.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
    //echo($newstring);
 
    list($VehicleID, 
		 $Model, 
		 $Year, 
		 $Type, 
		 $Availability)=explode(",", $newstring);
		 
	//echo $VehicleID . $Model . $Year . $Type . $Availability . "<br>";
	
	$sql = "INSERT INTO car VALUES (" . $VehicleID . ", " . $Model . ", " . $Year . ", " . $Type . ", " . $Availability . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $VehicleID . ", " . $Model . ", " . $Year . ", " . $Type . ", " . $Availability . " added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
}
fflush($myfile);

//CarType Loader

echo "<br/> <br/> Load CarType.csv <br/>";

$myfile = fopen("../Input_Data/CarType.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);
    $newstring = preg_replace("/[\r\n]/","",$line);

    list($VehicleID, 
		 $TypeName, 
		 $DailyRate, 
		 $WeeklyRate)=explode(",", $newstring);
		 
	$sql = "INSERT INTO car_type VALUES (" . $VehicleID . ", " . $TypeName . ", " . $DailyRate . ", " . $WeeklyRate . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $VehicleID . ", " . $TypeName . ", " . $DailyRate . ", " . $WeeklyRate . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
}
fflush($myfile);

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