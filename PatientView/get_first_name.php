<?php
    //session_start(); // This is already done in the patientInfo.php file
    $patientID = $_SESSION['patient_ID'];
    include "../connect_server.php";
    $sql = "SELECT * from personal_info where ID = $patientID";
    $result = mysqli_query($conn, $sql);
    $patientName = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "<a class='navbar-brand px-2' href='doctorPortalHome.php'>Welcome, " . $patientName[0]["first_name"] . "</a>";
?>