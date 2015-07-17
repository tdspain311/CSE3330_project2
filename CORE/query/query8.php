<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "soccer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 


// Create View
$sql = "CREATE OR REPLACE VIEW Team_Summary AS SELECT Team1 AS Teams, COUNT(Team1) + COUNT(Team2) AS NoOfGames, SUM(Team1_score) AS TotalGoalsFor, SUM(Team2_score) AS TotalGoalsAgainst FROM match_results GROUP BY Team1;";
$conn->query($sql);

// Query View
$sql = "SELECT * FROM Team_Summary;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr style='text-align: left'><th>Team</th><th>Games</th><th>Total Goals Scored</th><th>Total Goals Against</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Teams"]."</td><td>".$row["NoOfGames"]."</td><td>".$row["TotalGoalsFor"]."</td><td>".$row["TotalGoalsAgainst"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>