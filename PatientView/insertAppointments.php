<?php
    include 'patientInfo.php'; 
    //change to date time format 
    $apptStartDateTime = $_POST['date'] . "T" . $_POST['startTime'];
    //change to date time format 
    $apptEndDateTime = $_POST['date'] . "T" . $_POST['endTime'];
    
    //getting apptoinment legnth 
    $startTime = new DateTime($_POST['startTime']); 
    $endTime = new DateTime($_POST['endTime']); 
    $difference = $endTime->diff($startTime); 
    //length of appointment 
    $apptLength = $difference->format('%H:%I');
    //appointment aproval to false/pending 
    $apptApproved = 0; 

    //Query to appointments with new appointment
    $insertAppointmentQuery = "INSERT INTO appointments(user_ID, start_date_time, end_date_time, appt_length, approved) VALUES ('$patientID', '$apptStartDateTime', '$apptEndDateTime', '$apptLength', 0); ";
    //query to insert appointment and redirect if successful
    if($conn->query($insertAppointmentQuery) == TRUE){
        header("Location: Appointments.php");
    }
    else {
        echo "Error: " . $insertAppointmentQuery . "<br>" . $conn->error;
    }
?>