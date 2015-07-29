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

//Customer Loader

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

?>