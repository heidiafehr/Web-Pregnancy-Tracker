<?php
    //session_start();
    $userID = $_SESSION['doctor_ID'];
    include "../connect_server.php";
    $sql = "SELECT * from personal_info where ID = $userID";
    $result = mysqli_query($conn, $sql);
    $personalInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>