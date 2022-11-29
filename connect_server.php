<?php
    include("Global.php");
    
    // Create connection
    $conn = new mysqli($servername, $userAccountName, $userAccountPassword, "ptDB");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>