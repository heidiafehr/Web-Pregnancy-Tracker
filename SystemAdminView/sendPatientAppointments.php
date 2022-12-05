<?php
include "../connect_server.php";

if (array_key_exists('oldAppointmentID', $_POST) and $_POST['oldAppointmentID'] != null) {
    $thisApointmentID = $_POST['oldAppointmentID'];

    // START TIME
    if (array_key_exists('startDateTime', $_POST) and $_POST['startDateTime'] != null) {
        $startDateTime = $_POST['startDateTime'];

        $sql = "UPDATE appointments SET start_date_time='$startDateTime' WHERE appointment_ID='$thisApointmentID'";
        if ($conn->query($sql)) {
            header("Location: patientAppointments.php?id=$thisApointmentID");
        } else {
            echo "ruh roh didn't update dob";
        }
    }

    // END TIME
    if (array_key_exists('endDateTime', $_POST) and $_POST['endDateTime'] != null) {
        $endDateTime = $_POST['endDateTime'];

        $sql = "UPDATE appointments SET end_date_time='$endDateTime' WHERE appointment_ID='$thisApointmentID'";
        if ($conn->query($sql)) {
            header("Location: patientAppointments.php?id=$thisApointmentID");
        } else {
            echo "ruh roh didn't update dob";
        }
    }

    // APPT LENGTH
    if (array_key_exists('apptLength', $_POST) and $_POST['apptLength'] != null) {
        $apptLength = $_POST['apptLength'];

        $sql = "UPDATE appointments SET appt_length='$apptLength' WHERE appointment_ID='$thisApointmentID'";
        if ($conn->query($sql)) {
            header("Location: patientAppointments.php?id=$thisApointmentID");
        } else {
            echo "ruh roh didn't update first name";
        }
    }

    // APPROVAL STATUS
    if (array_key_exists('approval', $_POST) and $_POST['approval'] != null) {
        $approval = $_POST['approval'];
        $sql = "UPDATE appointments SET approved='$approval' WHERE appointment_ID='$thisApointmentID'";
        if ($conn->query($sql)) {
            header("Location: patientAppointments.php?id=$thisApointmentID");
        } else {
            echo "ruh roh didn't update first name";
        }
    }

    // DOCTOR
    if (array_key_exists('doctor', $_POST) and $_POST['doctor'] != null) {
        $doctor = $_POST['doctor'];

        // check that doctor exists

        $sql = "SELECT * FROM doctors WHERE doctor_ID=$doctor";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            $sql = "UPDATE appointments SET doctor_ID='$doctor' WHERE appointment_ID='$thisApointmentID'";
            if ($conn->query($sql)) {
                header("Location: patientAppointments.php?id=$thisApointmentID");
            } else {
                echo "ruh roh didn't update first name";
            }
        } else {
            header("Location: patientAppointments.php?id=$thisApointmentID&err= This doctor ID does not exist");
        }
    }
}
