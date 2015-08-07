CREATE TABLE customer
(
IdNo INT                	NOT NULL AUTO_INCREMENT,
Name varchar(50)		NOT NULL,
Phone varchar(15),
PRIMARY KEY (IdNo)
);

CREATE TABLE car
(
VehicleID INT(5)           	NOT NULL AUTO_INCREMENT,
Model VARCHAR (70)		NOT NULL,
Year INT			NOT NULL,
Availability VARCHAR(10) 	DEFAULT 'Yes',
PRIMARY KEY (VehicleID)
);

CREATE TABLE type
(
TypeName varchar(10),
DailyRate decimal(10,2),
WeeklyRate decimal(10,2),
PRIMARY KEY (TypeName)
);

CREATE TABLE car_type
(
VID int,
TName varchar(10),
PRIMARY KEY (VID,TName),
FOREIGN KEY (VID) REFERENCES car(VehicleID),
FOREIGN KEY (TName) REFERENCES type(TypeName)
);

CREATE TABLE rental
(
Status VARCHAR(12) 		DEFAULT 'Scheduled',
VehicleID INT(4),
CustID INT(2),
Daily VARCHAR(6)		DEFAULT 'No',
Weekly VARCHAR(6)		DEFAULT 'No',
StartDate DATE,
NoOfDays INT			DEFAULT 0,
NoOfWeeks INT			DEFAULT 0,
ReturnDate DATE,
AmountDue decimal(10,2)		DEFAULT 0.00,
PRIMARY KEY (Status,VehicleID,CustID),
FOREIGN KEY (VehicleID) REFERENCES car(VehicleID),
FOREIGN KEY (CustID) REFERENCES customer(IdNo)
);
COMMIT;
