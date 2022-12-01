
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
	phone_number VARCHAR(10) NOT NULL,
	sex VARCHAR(1) NOT NULL,
	gender VARCHAR(225) NOT NULL
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
	/*YYYY-MM-DDTHH:MI*/
	start_date_time VARCHAR(16) NOT NULL,
	end_date_time VARCHAR(16),
	/*HH:MI*/
	appt_length VARCHAR(5),
	doctor_ID INT,
	patient_ID INT,
	FOREIGN KEY(doctor_ID) REFERENCES doctors(doctor_ID),
	FOREIGN KEY(patient_ID) REFERENCES patients(patient_ID),
	FOREIGN KEY(user_ID) REFERENCES personal_info(ID)
);";

$sql .= "CREATE TABLE pregnancies(
	patient_ID INT NOT NULL,
	/*YYYY-MM-DD*/
	due_date VARCHAR(10) NOT NULL,
	baby_sex VARCHAR(1) NOT NULL
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

// Creating test patient

$sql .= "INSERT INTO users VALUES('patientUser', 'Welcome1!');";
$sql .= "INSERT INTO personal_info (first_name, last_name, dob, email, phone_number, sex, gender) VALUES
('Jane', 'Smith', '1999-11-30', 'janesmith@email.com', '7025000893', 'F', 'Non-binary');";
$sql .= "INSERT INTO appointments (user_ID, start_date_time, end_date_time, appt_length)VALUES
(LAST_INSERT_ID(), '2022-12-16T10:30', '2022-12-16T11:00', '00:30');";
$sql .= "INSERT INTO medication VALUES
('medicationName', '2020-05-30', '2020-06-14', 'This is the description of what the medication does and how it should be taken');";
$sql .= "INSERT INTO pregnancies VALUES
(LAST_INSERT_ID(), '2022-10-31', 'F'),
(LAST_INSERT_ID(), '2020-11-14', 'M'),
(LAST_INSERT_ID(), '2019-01-06', 'M'),
(LAST_INSERT_ID(), '2017-09-17', 'F'),
(LAST_INSERT_ID(), '2016-04-30', 'M');";

// Creating test doctor

$sql .= "INSERT INTO users VALUES('doctorUser', 'Welcome1!');";
$sql .= "INSERT INTO personal_info (first_name, last_name, dob, email, phone_number, sex, gender) VALUES
('John', 'Doe', '1999-01-14', 'johndoe@email.com', '7024009998', 'F', 'Man');";
$sql .= "INSERT INTO doctors VALUES(LAST_INSERT_ID(), 'doctorUser');";
$sql .= "INSERT INTO appointments (user_ID, start_date_time, end_date_time, appt_length, doctor_ID, patient_ID)VALUES
(LAST_INSERT_ID(), '2022-12-16T10:30', '2022-12-16T11:00', '00:30', LAST_INSERT_ID(), 1),
(LAST_INSERT_ID(), '2022-12-17T12:00', '2022-12-17T12:45:00', '00:45', LAST_INSERT_ID(), 1),
(LAST_INSERT_ID(), '2022-12-17T13:00:00', '2022-12-17T14:50', '01:50', LAST_INSERT_ID(), 1),
(LAST_INSERT_ID(), '2023-01-03T08:30', '2023-01-03T09:00', '00:30', LAST_INSERT_ID(), 1),
(LAST_INSERT_ID(), '2023-01-06T10:30', '2023-01-06T11:00', '00:30', LAST_INSERT_ID(), 1);";




if($conn->multi_query($sql) === TRUE){
    echo "<br>", "Created database", "<br>";

	include("start.php");

}else{
    echo "<br>", "Failed to create database :(", "<br>";
}

$conn->close();
?>