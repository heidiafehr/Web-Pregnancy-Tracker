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
    #checking if DOB was sent 
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
        #//get new email 
        $newEmail = $_POST['newEmail'];
        #query to update personal info with new dob 
        $updateEmailQuery = "UPDATE personal_info set email = '$newEmail' WHERE ID = $patientID;"; 
        if($conn->query($updateEmailQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
    }
    #checking if sex was sent 
    if(array_key_exists('newSex', $_POST) and $_POST['newSex'] != null){
        //get new sex
        $newSex = $_POST['newSex']; 
        #query to update personal info with new dob 
        $updateSexQuery = "UPDATE personal_info set sex = '$newSex' WHERE ID = $patientID;"; 
        if($conn->query($updateSexQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
    }
    #checking if gender was sent 
    if(array_key_exists('newGender', $_POST) and $_POST['newGender'] != null){
        //get new gender
        $newGender = $_POST['newGender']; 
        #query to update personal info with new dob 
        $updateGenderQuery = "UPDATE personal_info set gender = '$newGender' WHERE ID = $patientID;"; 
        if($conn->query($updateGenderQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
    }
    #checking if phone number was sent 
    if(array_key_exists('newphoneNumber', $_POST) and $_POST['newphoneNumber'] != null){
        //get new gender
        $newPhone = $_POST['newphoneNumber']; 
        #query to update personal info with new dob 
        $updatePhoneQuery = "UPDATE personal_info set phone_number = '$newPhone' WHERE ID = $patientID;"; 
        if($conn->query($updatePhoneQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
    }
    //header("Location: patientPortalHome.php");
?>