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

//Player Cards Loader

echo "<br/> <br/> Load Player_Cards.csv <br/>";

$myfile = fopen("../Input_Data/Player_Cards.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
 
	list($Player_id, 
		 $Yellow_Cards, 
		 $Red_Cards)=explode(",", $newstring);
			 
	$sql = "INSERT INTO player_cards VALUES (" . $Player_id . ", " . $Yellow_Cards . ", " . $Red_Cards . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $Player_id . ", " . $Yellow_Cards . ", " . $Red_Cards . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
/* 
    $stmt = $conn->prepare("INSERT INTO `soccer`.`player_cards` (`Player_id`, `Yellow_Cards`,  `Red_Cards`) VALUES (?,?,?)");
 
    $stmt->bind_param("iii", 
			$Player_id, 
			$Yellow_Cards, 
			$Red_Cards
	);
	
    $stmt->execute();
    
    $stmt->close();
 */    
}
fflush($myfile);

?>