<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "soccer";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// sql to create table
$sql = "CREATE TABLE country 
(
Country_Name VARCHAR(20) PRIMARY KEY,
Population  DECIMAL(10,2),
No_of_Worldcup_won INT,
Manager VARCHAR(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table country created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE players
(
Player_id INT PRIMARY KEY,
Name VARCHAR(40),
Fname VARCHAR(20),
Lname VARCHAR(35),
DOB DATE,
Country VARCHAR(20),
Height INT,
Club VARCHAR(30),
Position VARCHAR(10),
Caps_for_Country INT,
Is_captain VARCHAR(10),
FOREIGN KEY (Country) REFERENCES country(Country_Name) 
);";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table players created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE match_results
(
Match_id INT PRIMARY KEY,
Date_of_Match DATE,
Start_Time_Of_Match TIME,
Team1 VARCHAR(25),
Team2 VARCHAR(25),
Team1_score INT,
Team2_score INT,
Stadium_Name VARCHAR(35),
Host_City VARCHAR(20),
FOREIGN KEY (Team1) REFERENCES country(Country_Name),
FOREIGN KEY (Team2) REFERENCES country(Country_Name) 
);";
//TESTING
/* ,
FOREIGN KEY (Team1) REFERENCES country(Country_Name),
FOREIGN KEY (Team2) REFERENCES country(Country_Name)  
*/

if ($conn->query($sql) === TRUE) {
    echo "<br>Table match_results created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE player_cards
(
Player_id INT PRIMARY KEY,
Yellow_Cards INT,
Red_Cards INT,
FOREIGN KEY (Player_id) REFERENCES players(Player_id) 
);";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table player_cards created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE player_assists_goals 
(
Player_id INT PRIMARY KEY,
No_of_Matches INT,
Goals INT,
Assists INT,
Minutes_Played INT,
FOREIGN KEY (Player_id) REFERENCES players(Player_id) 
)";

if ($conn->query($sql) === TRUE) {
    echo "<br>Table player_assists_goals created successfully";
} else {
    echo "<br>Error creating table: " . $conn->error;
}

$conn->close();

?>
