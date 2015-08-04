<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

echo "INSERT INFO"
    
if(isset($_POST['formSubmit']) )
{
    $tableName = $_POST['formTableName'];
    $CustName;
    $CustID;
    $Phone;
    $VehicleID;
    $Model;
    $carType;
    $Year;
    $Availability;
    $Status;
    $Daily;
    $Weekly;
    $StartDate;
    $NoOfDays;
    $NoOfWeeks;
    $ReturnDate;
    $AmountDue;
    
    $errorMessage = "";

    if(empty($tableName)) 
    {
    $errorMessage = "<li>You forgot to select a table!</li>";
    }

    if($errorMessage != "") 
    {
    echo("<p>There was an error with your form:</p>\n");
    echo("<ul>" . $errorMessage . "</ul>\n");
    } 
    else
    {

    switch($tableName)
    {
      case "Customer": 
        echo "Table Customer selected"; 
        $sql = "INSERT INTO customer VALUES (" . $CustID . ", " . $CustName . ", " . $Phone . ");";
        break;
      case "Car": 
        echo "Table Car selected"; 
        $sql = "INSERT INTO car VALUES (" . $VehicleID . ", " . $Model . ", " . $Year . ", " . $Availability . ");";
        break;
      case "Rental": 
        echo "Table Rental selected"; 
        $sql = "INSERT INTO rental VALUES (" . $Status . ", " . $VehicleID . ", " . $CustID . "," . $Daily . "," . $Weekly . ", " . $StartDate . "," . $NoOfDays . "," . $NoOfWeeks . ", " . $ReturnDate . ", " . $AmountDue . ");";

        break;
      default: 
        echo("Error!"); 
        exit(); 
        break;
    }

    exit();
    } 
    }

    //$sql = "SELECT Name, Phone, Club FROM players WHERE country='USA'";
    //$result = $conn->query($sql);
    //
    //if ($result->num_rows > 0) {
    //    echo "<table border='1'><tr style='text-align: left'><th>Name</th><th>Position</th><th>Club</th></tr>";
    //    // output data of each row
    //    while($row = $result->fetch_assoc()) {
    //        echo "<tr><td>".$row["Name"]."</td><td>".$row["Position"]."</td><td>".$row["Club"]."</td></tr>";
    //    }
    //    echo "</table>";
    //} else {
    //    echo "0 results";
    //}
    $conn->close();
?>