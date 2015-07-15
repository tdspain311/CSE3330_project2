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

//Players Loader

echo "<br/> <br/> Load Players.csv <br/>";

$myfile = fopen("../Input_Data/Players.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);
    
    $newstring = preg_replace("/[\r\n]/","",$line);
  
 
    list($Player_id, 
		 $Name, 
		 $FName, 
		 $LName, 
		 $DOB, 
		 $Country, 
		 $Height, 
		 $Club, 
		 $Position, 
		 $Caps_for_Country, 
		 $Is_captain)=explode(",", $newstring);
		 
	$sql = "INSERT INTO players VALUES (" . $Player_id . ", " . $Name . ", " . $FName . ", " . $LName . ", " . $DOB . ", " . $Country . ", " . $Height . ", " . $Club . ", " . $Position . ", " . $Caps_for_Country . ", " . $Is_captain . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $Player_id . ", " . $Name . ", " . $FName . ", " . $LName . ", " . $DOB . ", " . $Country . ", " . $Height . ", " . $Club . ", " . $Position . ", " . $Caps_for_Country . ", " . $Is_captain . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
/* 
    $stmt = $conn->prepare("INSERT INTO `soccer`.`players` (`Player_id', 'Name', 'FName', 'LName', 'DOB', 'Country', 'Height', 'Club', 'Position', 'Caps_for_Country', 'Is_captain`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
 
    $stmt->bind_param("isssssissis", 
			$Player_id,
			$Name,
			$FName,
			$LName,
			$DOB,
			$Country,
			$Height,
			$Club,
			$Position,
			$Caps_for_Country,
			$Is_captain
	);
	
    $stmt->execute();
    
    $stmt->close();
 */    
}
fflush($myfile);
?>