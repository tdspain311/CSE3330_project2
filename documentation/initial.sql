CREATE TABLE customer 
(
IdNo int 								NOT NULL,
Name varchar(50)					NOT NULL,
Phone varchar(15),
CONSTRAINT cust_pk Primary Key (IdNo)
);

CREATE TABLE car 
(
VehicleID int							NOT NULL,
Model varchar (20)					NOT NULL,
Year int 								NOT NULL,
Type varchar(10)					NOT NULL,
Availability varchar(10),
CONSTRAINT car_pk Primary Key (VehicleID)
);

CREATE TABLE car_type 
(
VehicleID int,
TypeName varchar(10),
DailyRate decimal(10,2),
WeeklyRate decimal(10,2),
CONSTRAINT type_pk Primary Key (VehicleID,TypeName),
CONSTRAINT type_fk1 Foreign Key (VehicleID) REFERENCES car(VehicleID)
);

CREATE TABLE rental 
(
Status varchar(10),
VehicleID int,
CustID int,
Daily varchar(5),
Weekly varchar(5),
StartDate date,
NoOfDays int,
NoOfWeeks int,
ReturnDate date,
AmountDue decimal(10,2),
CONSTRAINT rental_pk Primary Key (VehicleID,CustID,Status),
CONSTRAINT rental_fk1 Foreign Key (VehicleID) REFERENCES car(VehicleID),
CONSTRAINT rental_fk2 Foreign Key (CustID) REFERENCES customer(IdNo)
);

COMMIT;
