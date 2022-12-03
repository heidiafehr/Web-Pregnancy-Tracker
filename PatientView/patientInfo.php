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

    //Create Query for appoinments 
    $appointmentSQL = "SELECT * FROM appointments where user_ID = $patientID;"; 
    $appointmentResult = $conn ->query($appointmentSQL);
    //Function to print appointments
    function printAppointments($appointmentResult){
        while($appointmentRow = $appointmentResult->fetch_assoc()){
            //if apointments table is not empty
            if($appointmentRow){
                //saving appointment Start Time
                $apptStart = new dateTimeImmutable($appointmentRow['start_date_time']);
                //converting to string and format
                $apptStartString = $apptStart->format('H:i'); 

                //saving appointment Date
                $apptDate = $apptStart->format('F d,Y'); 

                //saving appointment End Time 
                $apptEnd = new dateTimeImmutable($appointmentRow['end_date_time']);
                //converting to string and format
                $apptEndString = $apptEnd->format('H:i'); 

                //print printAppointments
                echo "<tr><td>$apptDate</td>
                    <td>$apptStartString</td>
                    <td>$apptEndString</td>
                    </tr>"; 
                
            }
            else{
                print("no appointments"); 
            }
        }
        echo("</table>"); 
        
    }
    
?>