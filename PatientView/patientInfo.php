<?php 
    include '../connect_server.php';
    include '../checkSignedIn.php'; 
    if(!$_SESSION['patient_ID']){
        header("Location: ../LoginView/login.php?err= Please log in as patient to access this page");
    }

    //get patient id 
    $patientID = $_SESSION['patient_ID']; 
    //get username 
    $username = $_SESSION['username']; 

    //get personal info from db 
    $personalInfoSQL =  "SELECT * FROM personal_info where id=$patientID;";
    $personalInfoResult = $conn->query($personalInfoSQL); 
    //get row of patient information
    $row = $personalInfoResult->fetch_assoc();
    //getting patient name  
    $firstName = $row["first_name"]; 
    //getting patient last name 
    $lastName = $row["last_name"]; 
    //getting dob 
    $patientDOB = $row["dob"]; 
    //getting email 
    $patientEmail = $row["email"]; 
    //getting phone number 
    $patientPhone = $row["phone_number"];
    //geting sex 
    $patientSex = $row['sex']; 
    //geting gender 
    $patientGender = $row['gender']; 

?>