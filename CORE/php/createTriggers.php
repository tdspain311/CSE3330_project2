<?php
$servername = "localhost";
$username = "test_user";
$password = "password";
$dbname = "db_rental";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//TRIGGERS
$sql = "CREATE TRIGGER ReturnDateCalcAmt_Insert BEFORE INSERT ON rental
FOR EACH ROW 
BEGIN
    IF (NEW.NoOfDays > 0) THEN
        SET NEW.ReturnDate = DATE_ADD(NEW.StartDate, INTERVAL NEW.NoOfDays DAY);
        SET NEW.AmountDue = ( NEW.NoOfDays * (SELECT DailyRate FROM type, car_type WHERE NEW.VehicleID=car_type.VID AND car_type.TName=type.TypeName));
    ELSE
        SET NEW.ReturnDate = DATE_ADD(NEW.StartDate, INTERVAL NEW.NoOfWeeks WEEK);
		SET NEW.AmountDue = ( NEW.NoOfWeeks * (SELECT WeeklyRate FROM type, car_type WHERE NEW.VehicleID=car_type.VID AND car_type.TName=type.TypeName));
    END IF;
    
END;";

if ($conn->query($sql) === TRUE) {
    echo "Table trigger 'ReturnDateCalcAmt_Insert' created successfully<br>";
} else {
    echo "Error creating trigger: " . $conn->error . "<br>";
}

$sql = "CREATE TRIGGER ReturnDateCalcAmt_Update BEFORE UPDATE ON rental
FOR EACH ROW 
BEGIN
    IF (NEW.NoOfDays > 0) THEN
        SET NEW.ReturnDate = DATE_ADD(StartDate, INTERVAL new.NoOfDays DAY);
		SET NEW.AmountDue = ( NEW.NoOfDays * (SELECT DailyRate FROM type, car_type WHERE NEW.VehicleID=car_type.VID AND car_type.TName=type.TypeName));
    ELSE
        SET NEW.ReturnDate = DATE_ADD(new.StartDate, INTERVAL new.NoOfWeeks WEEK);
		SET NEW.AmountDue = ( NEW.NoOfWeeks * (SELECT WeeklyRate FROM type, car_type WHERE NEW.VehicleID=car_type.VID AND car_type.TName=type.TypeName));
    END IF;

END;";

if ($conn->query($sql) === TRUE) {
    echo "Table trigger 'ReturnDateCalcAmt_Update' created successfully<br>";
} else {
    echo "Error creating trigger: " . $conn->error . "<br>";
}

$conn->close();
?>
