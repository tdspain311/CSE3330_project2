<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "soccer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$sql = "SELECT players.Name, players.Country, player_cards.Yellow_Cards FROM players JOIN player_cards ON players.Player_id=player_cards.Player_id WHERE player_cards.Yellow_Cards = (SELECT MAX(player_cards.Yellow_Cards) FROM player_cards);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr style='text-align: left'><th>Name</th><th>Country</th><th>Yellow Cards</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Name"]."</td><td>".$row["Country"]."</td><td>".$row["Yellow_Cards"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>