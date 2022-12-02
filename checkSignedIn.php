<?php
    session_start();

    if(empty($_SESSION['username'])){
        header("Location: ../LoginView/login.html?err= Please log back in");
    }
?>