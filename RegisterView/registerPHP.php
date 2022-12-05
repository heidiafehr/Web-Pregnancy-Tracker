<?php
    echo $_POST['firstName'], $_POST['lastName'], $_POST['dob'], $_POST['gender'], $_POST['sex'], $_POST['email'], $_POST['phoneNumber'];

    if (!empty($_POST['username']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['dob']) && !empty($_POST['gender']) && !empty($_POST['sex']) && !empty($_POST['email']) && !empty($_POST['phoneNumber']) && !empty($_POST['password'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        $username = $_POST['username'];

        include("../connect_server.php");

        // *************************************
        // PASSWORD AND USERNAME VALIDATION
        //************************************* */

        // insert into users
        $sql = "INSERT INTO users VALUES('$username', '$password');";

        if($conn->query($sql) === TRUE){
            echo "<br>", "Inserted into users", "<br>";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // insert into personal_info

        $sql = "INSERT INTO personal_info (first_name, last_name, dob, email, phone_number, sex, gender) VALUES
        ('$firstName', '$lastName', '$dob', '$email', '$phoneNumber', '$sex', '$gender');";

        if($conn->query($sql) === TRUE){
            echo "<br>", "Inserted into personal_info", "<br>";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // insert into patients
        $sql = "INSERT INTO patients VALUES(LAST_INSERT_ID(), '$username');";
        if($conn->query($sql) === TRUE){
            echo "<br>", "Inserted into patients", "<br>";
            session_start();
            $_SESSION['username'] = $users[0]['username'];
            $_SESSION['patient_ID'] = $patient[0]['patient_ID'];
            header("Location: ../PatientView/patientPortalHome.php");
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


    }else{
        header("Location: /register.html?err= Oops looks like you missed a field. Please remember to fill out all of the fields.");
    }
