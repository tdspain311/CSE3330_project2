<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "soccer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

$sql = "SELECT Host_City, COUNT(Host_City) AS GamesPlayed FROM match_results GROUP BY Host_City;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr style='text-align: left'><th>City</th><th>Games Played</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["Host_City"]."</td><td>".$row["GamesPlayed"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>