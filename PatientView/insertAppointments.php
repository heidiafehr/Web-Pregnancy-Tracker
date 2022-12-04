<?php
    include 'patientInfo.php'; 
    //chagning to date time format 
    $apptStartDateTime = $_POST['date'] . "T" . $_POST['startTime'];
    $apptEndDateTime = $_POST['date'] . "T" . $_POST['endTime'];
    
    //getting apptoinmentlegnth 
    $startTime = new DateTime($_POST['startTime']); 
    $endTime = new DateTime($_POST['endTime']); 
    $difference = $endTime->diff($startTime); 
    $apptLength = $difference->format('%H:%I');

    #Query to appointments with new appointment
    $insertAppointmentQuery = "INSERT INTO appointments(user_ID, start_date_time, end_date_time, appt_length) VALUES ('$patientID', '$apptStartDateTime', '$apptEndDateTime', '$apptLength'); ";
    #print($insertAppointmentQuery); 
    if($conn->query($insertAppointmentQuery) == TRUE){
        header("Location: Appointments.php");
    }
    else {
        echo "Error: " . $insertAppointmentQuery . "<br>" . $conn->error;
    }
?>