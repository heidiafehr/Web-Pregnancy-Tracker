<?php
    echo $_POST['firstname'], $_POST['lastname'], $_POST['dob'], $_POST['gender'], $_POST['sex'], $_POST['email'], $_POST['phonenumber'];

    if (!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['dob']) && !empty($_POST['gender']) && !empty($_POST['sex']) && !empty($_POST['email']) && !empty($_POST['phonenumber']) && !empty($_POST['password'])) {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phonenumber'];
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

        // insert into doctors
        $sql = "INSERT INTO doctors VALUES(LAST_INSERT_ID(), '$username');";
        if($conn->query($sql) === TRUE){
            echo "<br>", "Inserted into doctors", "<br>";
            header("Location: newDoctor.php?status=1");
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


    }else{
        echo "check this";
        header("Location: newDoctor.php?err= Oops looks like you missed a field. Please remember to fill out all of the fields.");
    }
?>