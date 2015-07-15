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

//Match Results Loader

echo "<br/> <br/> Load Match_results.csv <br/>";

$myfile = fopen("../Input_Data/Match_results.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
 
    list($Match_id, 
		 $Date_of_Match, 
		 $Start_Time_Of_Match, 
		 $Team1, 
		 $Team2, 
		 $Team1_score, 
		 $Team2_score, 
		 $Stadium_Name, 
		 $Host_City)=explode(",", $newstring);
		 
	//echo $Match_id . $Date_of_Match . $Start_Time_Of_Match . $Team1 . $Team2 . $Team1_score .$Team2_score . $Stadium_Name . $Host_City . "<br>";
	
	$sql = "INSERT INTO match_results VALUES (" . $Match_id . ", " . $Date_of_Match . ", " . $Start_Time_Of_Match . ", " . $Team1 . ", " . $Team2 . ", " . $Team1_score . ", " . $Team2_score . ", " . $Stadium_Name . ", " . $Host_City . ");";
	
	if ($conn->query($sql) === TRUE) {
		echo "<br>" . $Match_id . ", " . $Date_of_Match . ", " . $Start_Time_Of_Match . ", " . $Team1 . ", " . $Team2 . ", " . $Team1_score . ", " . $Team2_score . ", " . $Stadium_Name . ", " . $Host_City . " added successfully";
	} else {
		echo "<br>Error adding data: " . $conn->error;
	}
/* 	
    $stmt = $conn->prepare("INSERT INTO match_results VALUES (?,?,?,?,?,?,?,?,?)");
 
    $stmt->bind_param("issssiiss", 
			$Match_id, 
			$Date_of_Match, 
			$Start_Time_Of_Match, 
			$Team1, 
			$Team2, 
			$Team1_score, 
			$Team2_score, 
			$Stadium_Name, 
			$Host_City
	);
	
    $stmt->execute();
    
    $stmt->close();
    

	
    $stmt = $conn->prepare("INSERT INTO match_results VALUES (?,?,?,?,?,?,?,?,?)");
 
    $stmt->bind_param("issssiiss", 
			$Match_id, 
			$Date_of_Match, 
			$Start_Time_Of_Match, 
			$Team1, 
			$Team2, 
			$Team1_score, 
			$Team2_score, 
			$Stadium_Name, 
			$Host_City
	);
	
    $stmt->execute();
    
    $stmt->close();
 */    
}
fflush($myfile);

?>