<?php
    $patientName = explode(" ", $_POST['patientName']); // Splits the full name to first and last name
    $firstName = $patientName[0];
    $lastName = $patientName[1];
    $apptStartDateTime = $_POST['startDate'] . "T" . $_POST['startTime'];
    $apptEndDateTime = $_POST['endDate'] . "T" . $_POST['endTime'];

    include "../connect_server.php";

    //select id from personal_info where first_name = $firstName and last_name = $lastName
    $user_ID = "SELECT ID FROM `personal_info` WHERE first_name=$firstName and last_name=$lastName";
    $sql = "INSERT INTO appointments (user_ID, start_date_time, end_date_time) VALUES ('$user_ID', '$apptStartDateTime', '$apptEndDateTime')";
    if($conn->query($sql) == TRUE){
        header("Location: appointments.php");
        echo "New appointment has been set up";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>