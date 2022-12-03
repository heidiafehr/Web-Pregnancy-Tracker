<?php
    include 'patientInfo.php'; 
    #checking if name was sent
    if(array_key_exists('newPatientName', $_POST) and $_POST['newPatientName'] != null) {
        //Getting new name
        $newPatientName = explode(" ", $_POST['newPatientName']); // Splits the full name to first and last name
        $newFirstname = $newPatientName[0]; 
        $newLastName = $newPatientName[1]; 
        $newFirstname = "'".$newFirstname."'";
        $newLastName = "'".$newLastName."'";
        #Query to update personal info with new name 
        $updateUserQuery = "UPDATE personal_info set first_name = $newFirstname, last_name = $newLastName WHERE ID = $patientID;"; 
        if($conn->query($updateUserQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }
        #editInformation();
    }
    #checking if Dob was sent 
    if(array_key_exists('newDOB', $_POST)){
        #//get new dob 
        $newDOB = $_POST['newDOB'];
        #print("'".$newDOB."'");
        #query to update personal info with new dob 
        $updateDOBQuery = "UPDATE personal_info set dob = '$newDOB' WHERE ID = $patientID;"; 
        print($updateDOBQuery);
        if($conn->query($updateDOBQuery) == TRUE){
            header("Location: patientPortalHome.php");
        }

    }
    //header("Location: patientPortalHome.php");
?>