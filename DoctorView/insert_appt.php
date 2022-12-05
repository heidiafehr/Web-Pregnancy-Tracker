<?php
    $patientName = explode(" ", $_POST['patientName']); // Splits the full name to first and last name
    $firstName = $patientName[0];
    $lastName = $patientName[1];
    $apptStartDateTime = $_POST['startDate'] . "T" . $_POST['startTime'];
    $apptEndDateTime = $_POST['endDate'] . "T" . $_POST['endTime'];

    include "../connect_server.php";

    //find the id based on first name and last name and match with the id into appointments
    $sql = "SELECT * FROM `personal_info` WHERE first_name='$firstName' and last_name='$lastName'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $row=$result->fetch_assoc();

        $user_id=$row['ID'];
        $sql1 = "INSERT INTO appointments (user_ID, start_date_time, end_date_time, approved) VALUES ('$user_id', '$apptStartDateTime', '$apptEndDateTime', 1)";
        if($conn->query($sql1) == TRUE){
            header("Location: appointments.php");
        } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }
?>