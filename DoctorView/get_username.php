<?php
    //session_start();
    $doctorID = $_SESSION['doctor_ID'];
    include "../connect_server.php";
    $sql = "SELECT username from doctors where doctor_ID = $doctorID";
    $result = mysqli_query($conn, $sql);
    $username = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>