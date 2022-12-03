<?php 
    include '../connect_server.php';
    include '../checkSignedIn.php'; 

    //get patient id 
    $patientID = $_SESSION['patient_ID']; 

    //get personal info from db 
    $personalInfoSQL =  "SELECT * FROM personal_info where id=$patientID;";
    $personalInfoResult = $conn->query($personalInfoSQL); 
    //get row of patient information
    $row = $personalInfoResult->fetch_assoc();
    //getting patient name  
    $name = $row["first_name"] . " ". $row["last_name"]; 
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

    //Create Query for appoinments 
    $appointmentSQL = "SELECT * FROM appointments where user_ID = 2;"; 
    $appointmentResult = $conn ->query($appointmentSQL);
    //Function to print appointments
    function printAppointments($appointmentResult){
        echo("<Table class = 'table'>"); 
        while($appointmentRow = $appointmentResult->fetch_assoc()){
            if($appointmentRow){
                $appointmentStart = new dateTimeImmutable($appointmentRow['start_date_time']);
                echo $appointmentStart->format('F d, Y') . '<br>'; 
            }
            else{
                $bool = false;
            }
        }
        echo("</table>"); 
        
    }
    
?>