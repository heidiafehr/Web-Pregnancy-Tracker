<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $apptDate = $_POST['apptDate'];
    $apptTime = $_POST['apptTime'];

    include "../connect_server.php";
    $sql = "INSERT INTO appointments (first_name, last_name, start_date_time) VALUES ('$firstName', '$lastName', '$apptDate $apptTime')";
    if($conn->query($sql) == TRUE){
        header("Location: appointments.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>