<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "soccer";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
    echo "Connection error";
} 

//Country Loader

echo "<br/> <br/> Load Country.csv <br/>";

$myfile = fopen("../Input_Data/Country.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
 
    list($Country_Name, 
		 $Population, 
		 $No_of_Worldcup_won, 
		 $Manager)=explode(",", $newstring);
		 
		
	$sql = "INSERT INTO country VALUES (" . $Country_Name . ", " . $Population . ", " . $No_of_Worldcup_won . ", " . $Manager . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $Country_Name . ", " . $Population . ", " . $No_of_Worldcup_won . ", " . $Manager . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
/* 
    $stmt = $conn->prepare("INSERT INTO country VALUES (?,?,?,?)");
 
    $stmt->bind_param("sdis", 
			$Country_Name, 
			$Population, 
			$No_of_Worldcup_won, 
			$Manager
	);
	
    $stmt->execute();
    
    $stmt->close();
 */    
}
fflush($myfile);

?>