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

    // create query for pregnancies 
    $pregnanciesSQL = "SELECT * FROM pregnancies where patient_ID = $patientID;";
    //get pregnacy rows if found 
    $pregnanciesResult= $conn->query($pregnanciesSQL); 
    //function to print pregnancies 
    function printPregnancies($pregnanciesResult){
        $bool = true; 
        $counter =0; 
        while($row = $pregnanciesResult->fetch_assoc()){
            //print_r($row); 
            //print('<br>'); 
                echo("
                    <div class = cardbody>
                    <td> Pregnancy: </td><td>" . 
                    $counter . 
                    "</td><tr><td> Due Date: </td><td>".
                    $row["due_date"] .
                    "</td><tr><td> Sex: </td><td>".
                    $row["baby_sex"] .
                    "</td></tr></div>"
            );   
        }     
    }   

    //Create Query for appoinments 
    $appointmentSQL = "SELECT * FROM appointments where user_ID = 2;"; 
    $appointmentResult = $conn ->query($appointmentSQL);
    //Function to print appointments
    function printAppointments($appointmentResult){
        $bool = true; 
        while($bool){
            $appointmentRow = $appointmentResult->fetch_assoc();
            if($appointmentRow){
                $appointmentDate = substr($appointmentRow["start_date_time"],0,10); 
                $appointmentTime = substr($appointmentRow["start_date_time"],11); 
                echo(
                        "</td><tr><td> Appointment Date: </td><td>".
                        $appointmentDate .
                        "</td></tr><tr><td> Appointment Time: </td><td>".
                        $appointmentTime .
                        "</td></tr>"
                );  
            }
            else{
                $bool = false;
            }
        }
        
    }
    
?>