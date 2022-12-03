<!-- change password -->
<?php
    include "../connect_server.php";
    session_start();

    $patientID = $_SESSION['patient_ID'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    //Get username
    $sql = "SELECT username from patients where patient_id = $patientID";
    $result = mysqli_query($conn, $sql);
    $username = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $username = $username[0]["username"];

    //Update password based on username
    $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
    if (mysqli_query($conn, $sql)) {
        header("Location: settings.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>