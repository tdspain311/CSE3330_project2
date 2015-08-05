<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
    echo "Connection error<br>";
} 

echo "<br/> Load Customer.csv <br/>";

$myfile = fopen("../../Input_Data/Customers.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
 
    list($Name, 
		 $Phone)=explode(",", $newstring);
		 
		
	$sql = "INSERT INTO customer(Name,Phone) VALUES (" . $Name . ", " . $Phone . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo $Name . ", " . $Phone . "  added successfully<br>";
	} else {
		echo "Error adding data: " . $conn->error . "<br>";
	}

}
fflush($myfile);

//Cars Loader

echo "<br/> Load Cars.csv <br/>";

$myfile = fopen("../../Input_Data/Cars.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
    //echo($newstring);
 
    list($Model, 
		 $Year,  
		 $Availability)=explode(",", $newstring);
		 
	//echo $VehicleID . $Model . $Year . $Type . $Availability . "<br>";
    // $sql = "ALTER TABLE car AUTO_INCREMENT=1001;";
    // $conn->query($sql);
//    
//    if ($conn->query($sql) === TRUE) {
//		echo "Car table altered successfully<br>";
//	} else {
//		echo "Error adding data: " . $conn->error . "<br>";
//	}

	$sql = "INSERT INTO car(Model,Year,Availability) VALUES (" . $Model . ", " . $Year . ", " . $Availability . ");";

	if ($conn->query($sql) === TRUE) {
		echo $Model . ", " . $Year . ", " . $Availability . " added successfully<br>";
	} else {
		echo "Error adding data: " . $conn->error . "<br>";
	}
    

}
fflush($myfile);

//type Loader

echo "<br/> Load Type.csv <br/>";

$myfile = fopen("../../Input_Data/Type.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);
    $newstring = preg_replace("/[\r\n]/","",$line);

    list($TypeName, 
		 $DailyRate, 
		 $WeeklyRate)=explode(",", $newstring);
		 
	$sql = "INSERT INTO type VALUES (" . $TypeName . ", " . $DailyRate . ", " . $WeeklyRate . ");";
	//echo $VehicleID . $TypeName . $DailyRate . $WeeklyRate . "<br>";
    
	if ($conn->query($sql) === TRUE) {
		echo $TypeName . ", " . $DailyRate . ", " . $WeeklyRate . "  added successfully<br>";
	} else {
		echo "Error adding data: " . $conn->error . "<br>";
	}
}
fflush($myfile);

//CarType Loader

echo "<br/> Load CarType.csv <br/>";

$myfile = fopen("../../Input_Data/CarType.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);
    $newstring = preg_replace("/[\r\n]/","",$line);

    list($VehicleID, 
		 $TypeName)=explode(",", $newstring);
		 
	$sql = "INSERT INTO car_type VALUES (" . $VehicleID . ", " . $TypeName . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo $VehicleID . ", " . $TypeName . "  added successfully<br>";
	} else {
		echo "Error adding data: " . $conn->error . "<br>";
	}
}
fflush($myfile);

//Rental Loader

echo "<br/> Load Rental.csv <br/>";

$myfile = fopen("../../Input_Data/Rental.csv", "r") or die("Unable to openfile!");

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
		echo $Status . ", " . $VehicleID . ", " . $CustID . "," . $Daily . "," . $Weekly . "," . $StartDate . "," . $NoOfDays . "," . $NoOfWeeks . ", " . $ReturnDate . ", " . $AmountDue . "  added successfully<br>";
	} else {
		echo "Error adding data: " . $conn->error . "<br>";
	}
}
fflush($myfile);

?>