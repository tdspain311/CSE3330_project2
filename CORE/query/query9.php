<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "soccer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$sql = "SELECT * FROM match_results WHERE Team1='Brazil' OR Team2='Brazil';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr style='text-align: left'><th>Match ID</th><th>Date of Match</th><th>Start Time of Match</th><th>Team 1</th><th>Team 2</th><th>Team 1 Score</th><th>Team 2 Score</th><th>Stadium Name</th><th>Host City</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Match_id"]."</td><td>".$row["Date_of_Match"]."</td><td>".$row["Start_Time_Of_Match"]."</td><td>".$row["Team1"]."</td><td>".$row["Team2"]."</td><td>".$row["Team1_score"]."</td><td>".$row["Team2_score"]."</td><td>".$row["Stadium_Name"]."</td><td>".$row["Host_City"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>