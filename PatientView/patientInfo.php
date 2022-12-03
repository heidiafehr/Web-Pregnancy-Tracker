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
    $appointmentSQL = "SELECT * FROM appointments where user_ID = $patientID;"; 
    $appointmentResult = $conn ->query($appointmentSQL);
    //Function to print appointments
    function printAppointments($appointmentResult){
        while($appointmentRow = $appointmentResult->fetch_assoc()){
            //getting current date and time 
            $tempDateTime = date('d-m-Y h:i:s a', time()); 
            //saving date time as datetimeImmutabel
            $currentDateTime  = new dateTimeImmutable($tempDateTime); 
            //formatting the current Date Time
            //$currentDateTimeString = $currentDateTime->format('F d,Y'); 
            //if apointments table is not empty
            if($appointmentRow){
                //saving appointment Start Time
                $apptStart = new dateTimeImmutable($appointmentRow['start_date_time']);
                //converting to string and format
                $apptStartString = $apptStart->format('H:II'); 

                //saving appointment Date
                $apptDate = $apptStart->format('F d,Y'); 

                //saving appoint End Time 
                $apptEnd = new dateTimeImmutable($appointmentRow['end_date_time']);
                //converting to string and format
                $apptEndString = $apptEnd->format('H:II'); 

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