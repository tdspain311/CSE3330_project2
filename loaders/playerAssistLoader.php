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

//Player Assist Goals Loader

echo "<br/> <br/> Load Player_Assists_Goals.csv <br/>";

$myfile = fopen("../Input_Data/Player_Assists_Goals.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);
    $newstring = preg_replace("/[\r\n]/","",$line);

    list($Player_id, 
		 $No_of_Matches, 
		 $Goals, 
		 $Assists, 
		 $Minutes_Played)=explode(",", $newstring);
		 
	$sql = "INSERT INTO player_assists_goals VALUES (" . $Player_id . ", " . $No_of_Matches . ", " . $Goals . ", " . $Assists . ", " . $Minutes_Played . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $Player_id . ", " . $No_of_Matches . ", " . $Goals . ", " . $Assists . ", " . $Minutes_Played . "  added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
/*   
	$stmt = $conn->prepare("INSERT INTO `soccer`.`player_assists_goals` (`Player_id`, `No_of_Matches`, `Goals`, `Assists`, 'Minutes_Played') VALUES (?,?,?,?,?)");
 

    $stmt->bind_param("iiiii", 
			$Player_id, 
			$No_of_Matches, 
			$Goals, 
			$Assists, 
			$Minutes_Played
	);
	
    $stmt->execute();
    
    $stmt->close();
*/  
}
fflush($myfile);

?>