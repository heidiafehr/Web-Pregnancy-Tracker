<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    echo "username: $_POST[username] <br> password:$_POST[password]";

    include("../connect_server.php");

    $uname = $_POST['username'];
    $psw = $_POST['password'];
    $isDoctor = $_POST['doctor'];

    $sql = "SELECT * FROM users WHERE username='$uname' AND `password`='$psw';";

    $result = mysqli_query($conn, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (sizeof($users) == 1) {
        //first check if it is an admin
        $sql = "SELECT * FROM admins WHERE username='$uname';";
        $resultUser = mysqli_query($conn, $sql);

        $admin = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);
        // if it is admin then redirect
        if (sizeof($admin) == 1) {
            session_start();
            $_SESSION['username'] = $admin[0]['username'];
            echo $_SESSION['username'];
            header("Location: ../SystemAdminView/systemAdminPortalHome.php");
        } else {
            // if !doctor
            if (!$isDoctor) {
                $sql = "SELECT * FROM patients WHERE username='$uname';";
                $resultUser = mysqli_query($conn, $sql);

                $patient = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);

                if (sizeof($patient) == 1) {
                    session_start();
                    $_SESSION['username'] = $users[0]['username'];
                    $_SESSION['patient_ID'] = $patient[0]['patient_ID'];
                    header("Location: ../PatientView/patientPortalHome.php");
                    echo "Found a user!";
                } else {
                    header("Location: login.php?err= There is no record of this patient. If you are a doctor, please check you are a Doctor down below");
                }
            } else {
                $sql = "SELECT * FROM doctors WHERE username='$uname';";
                $resultUser = mysqli_query($conn, $sql);

                $doctor = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);

                if (sizeof($doctor) == 1) {
                    session_start();
                    $_SESSION['username'] = $users[0]['username'];
                    $_SESSION['doctor_ID'] = $doctor[0]['doctor_ID'];
                    header("Location: ../DoctorView/doctorPortalHome.php");
                    echo "Found a user!";
                } else {
                    header("Location: login.php?err= There is no record of this doctor. Please contact your administrator for help.");
                }
            }
        }
    } else {
        echo "smth went wrong";
        if (!$isDoctor) {
            header("Location: login.php?err= Oops looks like something went wrong username/password. Please check for typos and try again.");
        } else {
            header("Location: login.php?err= If you are a doctor, please check for typos and try again or contact your administrator for help.");
        }
    }
}

?>