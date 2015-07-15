<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "soccer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$sql = "SELECT players.Name, players.Country, player_assists_goals.Goals FROM players JOIN player_assists_goals ON players.Player_id=player_assists_goals.Player_id WHERE player_assists_goals.Goals > 1 ORDER BY player_assists_goals.Goals DESC;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr style='text-align: left'><th>Name</th><th>Country</th><th>Goals</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Country"]."</td><td>".$row["Goals"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>