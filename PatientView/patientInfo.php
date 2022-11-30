<?php 
    include '../connect_server.php'; 

    // create query
    $sql =  "SELECT * FROM personal_info where id=1;";
    $result = $conn->query($sql); 
    //get row of patient information
    $row = $result->fetch_assoc();
    //getting patient name  
    $name = $row["first_name"] . " ". $row["last_name"]; 
    //getting dob 
    $patientDOB = $row["dob"]; 
    //getting email 
    $patientEmail = $row["email"]; 
    //getting phone number 
    $patientPhone = $row["phone_number"];

    //// create query for pregnancies 
    $pregnanciesSQL = "SELECT * FROM pregnancies where patient_ID = 2;";
    $pregnanciesResult= $conn->query($pregnanciesSQL); 

    
    //function to print pregnancies 
    function printPregnancies($pregnanciesResult){
        $bool = true; 
        $counter =0; 
        while($bool){
            $pregnancyRow = $pregnanciesResult->fetch_assoc(); 
            $counter += 1; 
            if($pregnancyRow){
                echo(
                    "   <td> Pregnancy: </td><td>" . 
                        $counter . 
                        "</td><tr><td> Due Date: </td><td>".
                        $pregnancyRow["due_date"] .
                        "</td></tr>"
                ); 
                
            }
            else{
                $bool = false; 
            }
                
            
            
        }  
    }
?>