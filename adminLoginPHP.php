<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    echo "username: $_POST[username] <br> password:$_POST[password]";

    include("connect_server.php");

    $uname = $_POST['username'];
    $psw = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$uname' AND `password`='$psw';";

    $result = mysqli_query($conn, $sql);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (sizeof($users) == 1) {
        $sql = "SELECT * FROM admins WHERE username='$uname';";
        $resultUser = mysqli_query($conn, $sql);

        $admin = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);

        if (sizeof($admin) == 1) {
            session_start();
            $_SESSION = $admin[0]['username'];
            header("Location: SystemAdminView\systemAdminPortalHome.html");
            echo "Found a user!";
        } else {
            header("Location: login.html?err= There is no record of this admin.");
        }
    } else {
        echo "smth went wrong";
            header("Location: adminLogin.html?err= Oops looks like something went wrong username/password. Please check for typos and try again.");
    }
}
