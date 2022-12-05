<?php
    $patientID = $_SESSION['patient_ID'];
    include "../connect_server.php";
    $sql = "SELECT * from personal_info where ID = $patientID";
    $result = mysqli_query($conn, $sql);
    $patientName = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo $patientName[0]["first_name"];
?>