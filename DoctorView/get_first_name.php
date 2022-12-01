<?php
    session_start();
    $doctorID = $_SESSION['doctor_ID'];
    include "../connect_server.php";
    $sql = "SELECT first_name from personal_info where ID = $doctorID";
    $result = mysqli_query($conn, $sql);
    $doctorName = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo "<a class='navbar-brand px-2' href='doctorPortalHome.php'>Welcome, Dr. " . $doctorName[0]["first_name"] . "</a>";
?>