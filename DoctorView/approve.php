<?php
    include "../connect_server.php";
    session_start();
    $appointmentID = $_GET['id'];

    $sql = "UPDATE appointments SET approved = 1, doctor_ID = '$_SESSION[doctor_ID]' WHERE appointment_ID = '$appointmentID'";
    if (mysqli_query($conn, $sql)) {
        header("Location: appointments.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>