<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

if(isset($_POST['formSubmit']) )
{
    $tableName = $_POST['formTableName'];
    $custID;
    $vehicleID;
    
    switch($tableName)
    {
      case "Customer": 
        echo "Table Customer selected"; 
        $sql = "DELETE FROM customer WHERE " . $CustID . "=" . ";";
        break;
      case "Car": 
        echo "Table Car selected"; 
        $sql = "DELETE FROM car WHERE " . $VehicleID . "=" . ";";
        break;
      case "Rental": 
        echo "Table Rental selected"; 
        $sql = "DELETE FROM rental WHERE " . $VehicleID . "=" . "AND " . $CustID . "=" . ";";
        break;
      default: 
        echo("Error!"); 
        exit(); 
        break;
    }

    exit();

}
$conn->close();
?>