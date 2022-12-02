<?php
    //session_start();
    $doctorID = $_SESSION['doctor_ID'];
    include "../connect_server.php";
    $sql = "SELECT first_name from personal_info where ID = $doctorID";
    $result = mysqli_query($conn, $sql);
    $doctorName = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo $doctorName[0]["first_name"];
?>