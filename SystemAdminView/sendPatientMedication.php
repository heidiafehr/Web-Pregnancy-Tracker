<?php
include "../connect_server.php";

if(array_key_exists('medID', $_POST) and $_POST['medID']!= null){
    $thisMedID = $_POST['medID'];

    // MEDICATION NAME
    if(array_key_exists('newMedName', $_POST) and $_POST['newMedName'] != null){
        $newMedName = $_POST['newMedName'];

        $sql = "UPDATE medication SET med_name='$newMedName' WHERE med_ID='$thisMedID'";
        if ($conn->query($sql)) {
            header("Location: patientMedication.php?id=$thisMedID");
        } else {
            echo "ruh roh didn't update first name";
        }
    }

    // DOSAGE
    if(array_key_exists('newDosage', $_POST) and $_POST['newDosage'] != null){
        $newDosage = $_POST['newDosage'];

        $sql = "UPDATE medication SET dosage='$newDosage' WHERE med_ID='$thisMedID'";
        if ($conn->query($sql)) {
            header("Location: patientMedication.php?id=$thisMedID");
        } else {
            echo "ruh roh didn't update first name";
        }
    }

    // FREQUENCY
    if(array_key_exists('newFrequency', $_POST) and $_POST['newFrequency'] != null){
        $newFrequency = $_POST['newFrequency'];

        $sql = "UPDATE medication SET frequency='$newFrequency' WHERE med_ID='$thisMedID'";
        if ($conn->query($sql)) {
            header("Location: patientMedication.php?id=$thisMedID");
        } else {
            echo "ruh roh didn't update first name";
        }
    }

    // DOCTOR
    if (array_key_exists('newDoctorID', $_POST) and $_POST['newDoctorID'] != null) {
        $doctor = $_POST['newDoctorID'];

        // check that doctor exists

        $sql = "SELECT * FROM doctors WHERE doctor_ID=$doctor";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            $sql = "UPDATE medication SET med_doctorID='$doctor' WHERE med_ID='$thisMedID'";
            if ($conn->query($sql)) {
                header("Location: patientMedication.php?id=$thisMedID");
            } else {
                echo "ruh roh didn't update first name";
            }
        } else {
            header("Location: patientMedication.php?id=$thisMedID&doctorerr= This doctor ID does not exist");
        }
    }

    // START DATE
    if (array_key_exists('newStartDate', $_POST) and $_POST['newStartDate'] != null) {
        $newStartDate = $_POST['newStartDate'];

        $sql = "UPDATE medication SET med_start_date='$newStartDate' WHERE med_ID='$thisMedID'";
        if ($conn->query($sql)) {
            header("Location: patientMedication.php?id=$thisMedID");
        } else {
            echo "ruh roh didn't update dob";
        }
    }else{
        echo "didn't get it";
    }

    // END DATE
    if (array_key_exists('newEndDate', $_POST) and $_POST['newEndDate'] != null) {
        $newEndDate = $_POST['newEndDate'];

        $sql = "UPDATE medication SET med_end_date='$newEndDate' WHERE med_ID='$thisMedID'";
        if ($conn->query($sql)) {
            header("Location: patientMedication.php?id=$thisMedID");
        } else {
            echo "ruh roh didn't update dob";
        }
    }
}
?>