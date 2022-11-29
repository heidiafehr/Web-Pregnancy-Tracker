
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

// Creating test doctor
$sql .= "INSERT INTO users VALUES('doctorUser', 'Welcome1!');";
$sql .= "INSERT INTO personal_info (first_name, last_name, dob, email, phone_number) VALUES
('John', 'Doe', '01-01-1999', 'johndoe@email.com', '7024009998');";
$sql .= "INSERT INTO appointments (user_ID, start_date_time, end_date_time)VALUES
(LAST_INSERT_ID(), '12:01:2022 10:30:00', '12:01:2022 11:00:00'),
(LAST_INSERT_ID(), '12:01:2022 12:00:00', '12:01:2022 12:45:00'),
(LAST_INSERT_ID(), '12:01:2022 13:00:00', '12:01:2022 14:50:00'),
(LAST_INSERT_ID(), '01:03:2023 08:30:00', '01:03:2023 08:00:00'),
(LAST_INSERT_ID(), '01:06:2023 10:30:00', '01:06:2023 11:00:00');";
$sql .= "INSERT INTO doctors VALUES(LAST_INSERT_ID(), 'doctorUser');";

// Creating test patient

$sql .= "INSERT INTO users VALUES('patientUser', 'Welcome1!');";
$sql .= "INSERT INTO personal_info (first_name, last_name, dob, email, phone_number) VALUES
('Jane', 'Smith', '11-30-1999', 'janesmith@email.com', '7025000893');";
$sql .= "INSERT INTO appointments (user_ID, start_date_time, end_date_time)VALUES
(LAST_INSERT_ID(), '12:01:2022 10:30:00', '12:01:2022 11:00:00'),
(LAST_INSERT_ID(), '12:01:2022 12:00:00', '12:01:2022 12:45:00'),
(LAST_INSERT_ID(), '12:01:2022 13:00:00', '12:01:2022 14:50:00'),
(LAST_INSERT_ID(), '01:03:2023 08:30:00', '01:03:2023 08:00:00'),
(LAST_INSERT_ID(), '01:06:2023 10:30:00', '01:06:2023 11:00:00');";
$sql .= "INSERT INTO doctors VALUES(LAST_INSERT_ID(), 'doctorUser');";
$sql .= "INSERT INTO medication VALUES
('medicationName', '2020:05:30', '2020:06:14', 'This is the description of what the medication does and how it should be taken');";
$sql .= "INSERT INTO pregnancies VALUES
(LAST_INSERT_ID(), '2022:10:31'),
(LAST_INSERT_ID(), '2020:11:14'),
(LAST_INSERT_ID(), '2019:01:06'),
(LAST_INSERT_ID(), '2017:09:17'),
(LAST_INSERT_ID(), '2016:04:30');";

if($conn->multi_query($sql) === TRUE){
    echo "<br>", "Created database", "<br>";

	include("start_web.php");

}else{
    echo "<br>", "Failed to create database :(", "<br>";
}

$conn->close();
?>