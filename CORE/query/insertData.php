<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); 

echo "INSERT INFO";
 
$table       =  $_POST["formTableName"];
$Name        =  $_POST["cust_name"];
$Phone       =  $_POST["phone_num"];
$VID         =  $_POST["car_model"];
$Model       =  $_POST["car_model"];
$CarType     =  $_POST["carType"];
$Year        =  $_POST["year_model"];
$RentalVID   =  $_POST["vid"];
$RentalCID   =  $_POST["cid"];
$StartDate   =  date("Ymd");
$RentalType  =  $_POST["rental_type"];
$DaysOrWeeks =  $_POST["days_weeks"];

array_walk_recursive($_POST, function (&$val) 
{ 
    $val = trim($val); 
}); //removes carriage returns from all $_POST variables

if(isset($_POST['formSubmit'])){
    
    $errorMessage = "";
    
    if(empty($table)) 
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

        switch($table)
        {
          case "Customer": 
            echo "Table Customer selected"; 
            $sql = "INSERT INTO customer(Name,Phone) VALUES ('$Name','$Phone')";

            if ($conn->query($sql) === TRUE) {
                echo $Name . ", " . $Phone . "  added successfully<br>";
            } else {
                echo "Error adding data: " . $conn->error . "<br>";
            }
            break;
          case "Car": 
            echo "Table Car selected"; 
            $sql = "INSERT INTO car(Model,Year,Availability) VALUES ('$Model','$Year','Yes')";
            
            if ($conn->query($sql) === TRUE) {
                echo $Model . ", " . $Year . ", " . $Availability . " added successfully<br>";
            } else {
                echo "Error adding data: " . $conn->error . "<br>";
            }
            break;
          case "Rental": 
            echo "Table Rental selected"; 
            if($RentalType == "Daily"){
                 $sql = "INSERT INTO rental(Status,VehicleID,CustID,Daily,Weekly,StartDate,NoOfDays,NoOfWeeks) VALUES ('Scheduled','$RentalVID','$RentalCID','Yes','No','$StartDate','$DaysOrWeeks','0')";
                    if ($conn->query($sql) === TRUE) {
                        echo $Status . ", "
                            . $RentalVID . ", " 
                            . $RentalCID . "," 
                            . $Daily . "," . $Weekly . "," . $StartDate . "," . $NoOfDays . "," . $NoOfWeeks . "  added successfully<br>";
                    } else {
                        echo "Error adding data: " . $conn->error . "<br>";
                    }
            
            }
            else{
                    $sql = "INSERT INTO rental(Status,VehicleID,CustID,Daily,Weekly,StartDate,NoOfDays,NoOfWeeks) VALUES ('Scheduled','$RentalVID','$RentalCID','No','Yes','$StartDate','0','$DaysOrWeeks')";
                    if ($conn->query($sql) === TRUE) {
                        echo $Status . ", "
                            . $RentalVID . ", " 
                            . $RentalCID . "," 
                            . $Daily . "," . $Weekly . "," . $StartDate . "," . $NoOfDays . "," . $NoOfWeeks . "  added successfully<br>";
                    } else {
                        echo "Error adding data: " . $conn->error . "<br>";
                    }
            }

            break;
          default: 
            echo("Error!"); 
            exit(); 
            break;
        }

    exit();
    } 

}



//if(isset($_POST['formSubmit']) )
//{
//    if(isset($_POST['customerName'])){
//        echo $_POST['customerName'];
//    }
//    else{
//        echo "nothing received";
//    }
//    $tableName = $_POST["formTableName"];
//    $CustName = $_POST["customerName"];
//    $CustID = $_POST["cust"];
////    $Phone;
////    $VehicleID;
////    $Model;
////    $carType;
////    $Year;
////    $Availability;
////    $Status;
////    $Daily;
////    $Weekly;
////    $StartDate;
////    $NoOfDays;
////    $NoOfWeeks;
////    $ReturnDate;
////    $AmountDue;
//    
//    $errorMessage = "";
//    
//    if(empty($tableName)) 
//    {
//    $errorMessage = "<li>You forgot to select a table!</li>";
//    }
//
//    if($errorMessage != "") 
//    {
//    echo("<p>There was an error with your form:</p>\n");
//    echo("<ul>" . $errorMessage . "</ul>\n");
//    } 
//    else
//    {
//
//    switch($tableName)
//    {
//      case "Customer": 
//        echo "Table Customer selected"; 
//        $sql = "INSERT INTO customer VALUES (" . $CustID . ", " . $CustName . ", " . $Phone . ");";
//        break;
//      case "Car": 
//        echo "Table Car selected"; 
//        $sql = "INSERT INTO car VALUES (" . $VehicleID . ", " . $Model . ", " . $Year . ", " . $Availability . ");";
//        break;
//      case "Rental": 
//        echo "Table Rental selected"; 
//        $sql = "INSERT INTO rental VALUES (" . $Status . ", " . $VehicleID . ", " . $CustID . "," . $Daily . "," . $Weekly . ", " . $StartDate . "," . $NoOfDays . "," . $NoOfWeeks . ", " . $ReturnDate . ", " . $AmountDue . ");";
//
//        break;
//      default: 
//        echo("Error!"); 
//        exit(); 
//        break;
//    }
//
//    exit();
//    } 
//}
//
//    //$sql = "SELECT Name, Phone, Club FROM players WHERE country='USA'";
//    //$result = $conn->query($sql);
//    //
//    //if ($result->num_rows > 0) {
//    //    echo "<table border='1'><tr style='text-align: left'><th>Name</th><th>Position</th><th>Club</th></tr>";
//    //    // output data of each row
//    //    while($row = $result->fetch_assoc()) {
//    //        echo "<tr><td>".$row["Name"]."</td><td>".$row["Position"]."</td><td>".$row["Club"]."</td></tr>";
//    //    }
//    //    echo "</table>";
//    //} else {
//    //    echo "0 results";
//    //}
    $conn->close();
?>