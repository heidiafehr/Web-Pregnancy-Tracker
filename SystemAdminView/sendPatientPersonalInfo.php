<?php
include "../connect_server.php";

if (array_key_exists('oldUsername', $_POST) and array_key_exists('oldID', $_POST) and $_POST['oldID'] != null and $_POST['oldUsername'] != null) {
    $oldUsername = $_POST['oldUsername'];
    $oldID = $_POST['oldID'];

    // USERNAME
    if (array_key_exists('newUsername', $_POST) and $_POST['newUsername'] != null) {

        //Getting new username
        $newUsername = $_POST['newUsername'];

        $sql = "SELECT * from users WHERE username='$newUsername'";
        $result = $conn->query($sql);
        if ($result->num_rows >= 1) {
            header("Location: patientInfo.php?id=$oldID&username=$oldUsername&unamerr=There already exists a user under the name $newUsername");
        } else {
            // drop FK patients, doctors, admins
            $sql = "ALTER TABLE patients DROP FOREIGN KEY fk_PatientUsername;";
            $sql .= "ALTER TABLE doctors DROP FOREIGN KEY fk_DoctorUsername;";
            $sql .= "ALTER TABLE admins DROP FOREIGN KEY fk_AdminUsername;";
            // drop primary key of users
            $sql .= "ALTER TABLE users DROP PRIMARY KEY;";
            $sql .= "UPDATE users set username='$newUsername' WHERE username='$oldUsername';";
            $sql .= "UPDATE patients SET username='$newUsername' WHERE username='$oldUsername';";
            // add back the PK
            $sql .= "ALTER TABLE users ADD PRIMARY KEY(username);";
            // add back the FK on patients, doctors, admins
            $sql .= "ALTER TABLE patients ADD CONSTRAINT fk_PatientUsername FOREIGN KEY (username) REFERENCES users(username);";
            $sql .= "ALTER TABLE doctors ADD CONSTRAINT fk_DoctorUsername FOREIGN KEY (username) REFERENCES users(username);";
            $sql .= "ALTER TABLE admins ADD CONSTRAINT fk_AdminUsername FOREIGN KEY (username) REFERENCES users(username);";
            if ($conn->multi_query($sql) == TRUE) {
                echo "updated Username";
                header("Location: patientInfo.php?id=$oldID&username=$newUsername");
            } else {
                echo "Ruh roh didn't update username";
            }
        }
    }

    // FIRSTNAME
    if (array_key_exists('newfirstName', $_POST) and $_POST['newfirstName'] != null) {
        $newFirstName = $_POST['newfirstName'];

        $sql = "UPDATE personal_info SET first_name='$newFirstName' WHERE ID='$oldID'";
        if ($conn->query($sql)) {
            header("Location: patientInfo.php?id=$oldID&username=$oldUsername");
        } else {
            echo "ruh roh didn't update first name";
        }
    }

    // LASTNAME
    if (array_key_exists('newlastName', $_POST) and $_POST['newlastName'] != null) {
        $newLastName = $_POST['newlastName'];

        $sql = "UPDATE personal_info SET last_name='$newLastName' WHERE ID='$oldID'";
        if ($conn->query($sql)) {
            header("Location: patientInfo.php?id=$oldID&username=$oldUsername");
        } else {
            echo "ruh roh didn't update last name";
        }
    }

    // DOB
    if (array_key_exists('newdob', $_POST) and $_POST['newdob'] != null) {
        $newdob = $_POST['newdob'];

        $sql = "UPDATE personal_info SET dob='$newdob' WHERE ID='$oldID'";
        if ($conn->query($sql)) {
            header("Location: patientInfo.php?id=$oldID&username=$oldUsername");
        } else {
            echo "ruh roh didn't update dob";
        }
    }

    // SEX
    if (array_key_exists('newsex', $_POST) and $_POST['newsex'] != null) {
        $newsex = $_POST['newsex'];

        if ($newsex != 'F' && $newsex != 'M' && $newsex != 'I') {
            header("Location: patientInfo.php?id=$oldID&username=$oldUsername&sexerr=Enter only F/M/I");
        } else {
            $sql = "UPDATE personal_info SET sex='$newsex' WHERE ID='$oldID'";
            if ($conn->query($sql)) {
                header("Location: patientInfo.php?id=$oldID&username=$oldUsername");
            } else {
                echo "ruh roh didn't update sex";
            }
        }
    }

    // GENDER
    if (array_key_exists('newgender', $_POST) and $_POST['newgender'] != null) {
        $newsex = $_POST['newgender'];

        if ($newsex != 'Man' && $newsex != 'Woman' && $newsex != 'Other') {
            header("Location: patientInfo.php?id=$oldID&username=$oldUsername&gendererr=Enter only Woman/Man/Other");
        } else {
            $sql = "UPDATE personal_info SET gender='$newsex' WHERE ID='$oldID'";
            if ($conn->query($sql)) {
                header("Location: patientInfo.php?id=$oldID&username=$oldUsername");
            } else {
                echo "ruh roh didn't update gender";
            }
        }
    }

    // EMAIL
    if (array_key_exists('newemail', $_POST) and $_POST['newemail'] != null) {
        $newemail = $_POST['newemail'];

        $sql = "UPDATE personal_info SET email='$newemail' WHERE ID='$oldID'";
        if ($conn->query($sql)) {
            header("Location: patientInfo.php?id=$oldID&username=$oldUsername");
        } else {
            echo "ruh roh didn't update email";
        }
    }

    // EMAIL
    if (array_key_exists('newphoneNumber', $_POST) and $_POST['newphoneNumber'] != null) {
        $newphoneNumber = $_POST['newphoneNumber'];

        $sql = "UPDATE personal_info SET phone_number='$newphoneNumber' WHERE ID='$oldID'";
        if ($conn->query($sql)) {
            header("Location: patientInfo.php?id=$oldID&username=$oldUsername");
        } else {
            echo "ruh roh didn't update phone number";
        }
    }
}
