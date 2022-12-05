<?php
    include "../connect_server.php";
    session_start();

    $userID = $_SESSION['patient_ID'];
    $currentEmail = $_POST['currentEmail'];
    $newEmail = $_POST['newEmail'];

    //Update email based on session ID
    $sql = "UPDATE personal_info SET email = '$newEmail' WHERE ID = '$userID'";
    if (mysqli_query($conn, $sql)) {
        header("Location: settings.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>