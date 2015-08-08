# CSE3330_project2
Project 2 Assignment for Databases

Authors Tyler D'Spain, Isha Soni

Web Server: 	Apache 2.4
Language: 	JavaScript/PHP
Database: 	MySQL

Description: 	
Load index.html in localhost.  To test correct php version select PHP test, version used in development 5.6.10.  MySQL and MySQLi extensions should be enabled in php settings.  

Documentation and Diagrams are located in the documentation directory.

This web application simulates a rental database, with options to create the database, tables, triggers then loads into the database any initial data that might be necessary.  Once all data is loaded
A user may select the query database option to then view the tables in a relational view with Rentals, Customers and cars by their Type.  A user may insert a new car, customer or insert a new rental record
using any available cars.  The user may update daily or weekly rates for a specific car type.  Once the user is ready to return a car they may do so in the Update A record then from the drop down select Return Rental.
The user will then be prompted only to select the Vehicle ID and the Customer ID.  Once submitted the amount due will be displayed for the customer and the car will become available to be rented out.  The user may 
also delete any customer not currently renting.

All query php files are located in the ‘query’ directory
All input data used is located in the 'Input_Data' directory
All else html/js files are located inside 'CORE'
