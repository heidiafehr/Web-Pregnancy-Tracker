<?php
    include "../connect_server.php";
    session_start();

    $currentUsername = $_POST['currentUsername'];
    $newUsername = $_POST['newUsername'];

    //Update Username based on session ID
    $sql = "UPDATE `users` SET `username` = '$newUsername' WHERE `username` = '$currentUsername'";
    if (mysqli_query($conn, $sql)) {
        header("Location: settings.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>