<?php 
    include '../connect_server.php'; 

    // create query
    $sql =  "SELECT * FROM personal_info where id=1;";
    $result = $conn->query($sql); 
    $row = $result->fetch_assoc();
    //getting patient name  
    $name = $row["first_name"] . " ". $row["last_name"]; 
    //getting dob 
    $patientDOB = $row["dob"]; 
    //getting email 
    $patientEmail = $row["email"]; 
    //getting phone number 
    $patientPhone = $row["phone_number"];

    
    
    //$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>