
<?php
/* Creates the database on the server if it does not exist already */

include("connect_server.php");

$sql = "DROP DATABASE if EXISTS ptDB;";
$sql .= "CREATE DATABASE if NOT EXISTS ptDB;";
$sql .= "USE ptDB;";

$sql .= "DROP TABLE IF EXISTS users;";
$sql .= "DROP TABLE if EXISTS patients;";
$sql .= "DROP TABLE if EXISTS doctors;";
$sql .= "DROP TABLE if EXISTS admins;";
$sql .= "DROP TABLE if EXISTS personal_info;";
$sql .= "DROP TABLE if EXISTS appointments;";
$sql .= "DROP TABLE if EXISTS pregnancies;";
$sql .= "DROP TABLE if EXISTS medication;";

$sql .= "CREATE TABLE users(
	username VARCHAR(225) NOT NULL PRIMARY KEY,
	`password` VARCHAR(225) NOT NULL
);";

$sql .= "CREATE TABLE personal_info(
	ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	first_name VARCHAR(225) NOT NULL,
	last_name VARCHAR(225) NOT NULL,
	dob VARCHAR(10) NOT NULL,
	email VARCHAR(225) NOT NULL,
	phone_number VARCHAR(10) NOT NULL
);";

$sql .= "CREATE TABLE patients(
	patient_ID INT PRIMARY KEY NOT NULL,
	username VARCHAR(225) NOT NULL,	
	FOREIGN KEY (patient_ID) REFERENCES personal_info(ID),
	FOREIGN KEY (username) REFERENCES users(username)
);";

$sql .= "CREATE TABLE doctors(
	doctor_ID INT PRIMARY KEY NOT NULL,
	username VARCHAR(225) NOT NULL,
	FOREIGN KEY (doctor_ID) REFERENCES personal_info(ID),
	FOREIGN KEY (username) REFERENCES users(username)
);";

$sql .= "CREATE TABLE admins(
	username VARCHAR(255) NOT NULL,
	FOREIGN KEY (username) REFERENCES users(username)
);";

$sql .= "CREATE TABLE appointments(
	user_ID INT NOT NULL,
	/*YYYY-MM-DD HH:MI:SS*/
	start_date_time VARCHAR(19) NOT NULL,
	end_date_time VARCHAR(19),
	/*HH:MI:SS*/
	appt_length VARCHAR(9),
	FOREIGN KEY(user_ID) REFERENCES personal_info(ID)
);";

$sql .= "CREATE TABLE pregnancies(
	patient_ID INT NOT NULL,
	/*YYYY-MM-DD*/
	due_date VARCHAR(10) NOT NULL
);";

$sql .= "CREATE TABLE medication(
	med_name VARCHAR(225) NOT NULL,
	/*YYYY-MM-DD*/
	med_start_date VARCHAR(10) NOT NULL,
	med_end_date VARCHAR(10) NOT NULL,
	med_description VARCHAR(8000)
);";

// Creating and admin login
$sql .= "INSERT INTO users VALUES('sysAdmin', 'Welcome1!');";
$sql .= "INSERT INTO admins VALUES('sysAdmin');";

if($conn->multi_query($sql) === TRUE){
    echo "<br>", "Created database", "<br>";

	include("start_web.php");

}else{
    echo "<br>", "Failed to create database :(", "<br>";
}

$conn->close();
?>