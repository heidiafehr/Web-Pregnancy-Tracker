<?php
    session_start();
    if(empty($_SESSION['username'])){
        header("Location: ../LoginView/login.php?err= Please log back in");
    }
?>