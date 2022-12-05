<?php
    // end the user's session
    session_start();//
    //$_SESSION['userType'] = '';
    session_destroy();
    header("Location: LoginView/login.php");
?>