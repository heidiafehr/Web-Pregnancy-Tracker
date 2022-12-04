<?php
    include 'patientInfo.php'; 
    //getting appt start time 
    $appointmentStart = new DateTimeImmutable($_POST['startTime']); 
    //getting appt end time 
    $appointmentEnd = new DateTimeImmutable($_POST['endTime']); 
    $appointmentDate = new DateTimeImmutable(($_POST['date']));

    $apptStartDateTime = $_POST['date'] . "T" . $_POST['startTime'];
    $apptEndDateTime = $_POST['date'] . "T" . $_POST['endTime'];


    #echo( int(str$_POST['startTime'])-int($_POST['endTime']));
    #Query to appointments with new appointment
    $insertAppointmentQuery = "INSERT INTO appointments(user_ID, start_date_time, end_date_time, approved) VALUES ('$patientID', '$apptStartDateTime', '$apptEndDateTime', 0); ";
    #print($insertAppointmentQuery); 
    if($conn->query($insertAppointmentQuery) == TRUE){
        header("Location: Appointments.php");
    }
    else {
        echo "Error: " . $insertAppointmentQuery . "<br>" . $conn->error;
    }
?>