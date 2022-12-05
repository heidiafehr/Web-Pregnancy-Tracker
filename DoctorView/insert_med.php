<?php
    //Insert medicine into database
    include '../connect_server.php';

    $sql = "INSERT INTO medication (med_name, dosage, frequency, med_start_date, med_end_date, med_description, med_patientID, med_doctorID)
    VALUES ('$_POST[medName]', '$_POST[medDosage]', '$_POST[medFrequency]', '$_POST[medStartDate]', '$_POST[medEndDate]', '$_POST[medNotes]', $_POST[patientID], $_POST[doctorID])";
    if (mysqli_query($conn, $sql)) {
        header("Location: patient_info.php?id=$_POST[patientID]");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>