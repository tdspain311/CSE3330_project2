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

$myfile = fopen("Input_Data/Country.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
 
    list($Country_Name, 
		 $Population, 
		 $No_of_Worldcup_won, 
		 $Manager)=explode(",", $newstring);

    $stmt = $conn->prepare("INSERT INTO `soccer`.`country` (`Country_Name`, `Population`, `No_of_Worldcup_won`, `Manager`) VALUES (?,?,?,?)");
 
    $stmt->bind_param("sdis", 
			$Country_Name, 
			$Population, 
			$No_of_Worldcup_won, 
			$Manager
	);
	
    $stmt->execute();
    
    $stmt->close();
    
}
fflush($myfile);


//Match Results Loader

echo "<br/> <br/> Load Match_results.csv <br/>";

$myfile = fopen("Input_Data/Match_results.csv", "r") or die("Unable to openfile!");

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
	
    $stmt = $conn->prepare("INSERT INTO `soccer`.`match_results` (`Match_id`, `Date_of_Match`, `Start_Time_Of_Match`, `Team1`, `Team2`, `Team1_score`, `Team2_score`, `Stadium_Name`, `Host_City`) VALUES (?,?,?,?,?,?,?,?,?)");
 
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
    
}
fflush($myfile);


//Player Assist Goals Loader

echo "<br/> <br/> Load Player_Assists_Goals.csv <br/>";

$myfile = fopen("Input_Data/Player_Assists_Goals.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);
    $newstring = preg_replace("/[\r\n]/","",$line);

    list($Player_id, 
		 $No_of_Matches, 
		 $Goals, 
		 $Assists, 
		 $Minutes_Played)=explode(",", $newstring);

  
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
    
}
fflush($myfile);


//Player Cards Loader

echo "<br/> <br/> Load Player_Cards.csv <br/>";

$myfile = fopen("Input_Data/Player_Cards.csv", "r") or die("Unable to openfile!");

while(!feof($myfile)){
    $line = fgets($myfile);

    $newstring = preg_replace("/[\r\n]/","",$line);
 
    	list($Player_id, 
			 $Yellow_Cards, 
			 $Red_Cards)=explode(",", $newstring);

    $stmt = $conn->prepare("INSERT INTO `soccer`.`player_cards` (`Player_id`, `Yellow_Cards`,  `Red_Cards`) VALUES (?,?,?)");
 
    $stmt->bind_param("iii", 
			$Player_id, 
			$Yellow_Cards, 
			$Red_Cards
	);
	
    $stmt->execute();
    
    $stmt->close();
    
}
fflush($myfile);


//Players Loader

echo "<br/> <br/> Load Players.csv <br/>";

$myfile = fopen("Input_Data/Players.csv", "r") or die("Unable to openfile!");

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
    
}
fflush($myfile);
?>



