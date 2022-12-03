<?php
    include 'patientInfo.php'; 
    #checking if first name was sent
    if(array_key_exists('newFirstName', $_POST) and $_POST['newFirstName'] != null) {
        //Getting new name
        $newFirstName = $_POST['newFirstName']; 
        $newFirstName = "'".$newFirstName."'";
        #Query to update personal info with new name 
        $updateFirstNameQuery = "UPDATE personal_info set first_name = $newFirstName WHERE ID = $patientID;"; 
        if($conn->query($updateFirstNameQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
        #editInformation();
    }
     #checking if last name was sent
     if(array_key_exists('newLastName', $_POST) and $_POST['newLastName'] != null) {
        //Getting new last name
        $newLastName = $_POST['newLastName']; 
        $newLastName = "'".$newLastName."'";
        #Query to update personal info with new name 
        $updateLastNameQuery = "UPDATE personal_info set last_name = $newLastName WHERE ID = $patientID;"; 
        if($conn->query($updateLastNameQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
    }
    #checking if Dob was sent 
    if(array_key_exists('newDOB', $_POST) and $_POST['newDOB'] != null){
        #//get new dob 
        $newDOB = $_POST['newDOB'];
        #query to update personal info with new dob 
        $updateDOBQuery = "UPDATE personal_info set dob = '$newDOB' WHERE ID = $patientID;"; 
        if($conn->query($updateDOBQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
    }
    #checking if email was sent 
    if(array_key_exists('newEmail', $_POST) and $_POST['newEmail'] != null){
        #//get new dob 
        $newEmail = $_POST['newEmail'];
        #query to update personal info with new dob 
        $updateEmailQuery = "UPDATE personal_info set email = '$newEmail' WHERE ID = $patientID;"; 
        if($conn->query($updateEmailQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
    }
    //header("Location: patientPortalHome.php");
?>