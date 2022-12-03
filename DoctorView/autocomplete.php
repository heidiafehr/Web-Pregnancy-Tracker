<?php
    include '../connect_server.php'; 

    //getting appointment date
    $sql =  "SELECT DISTINCT first_name, last_name FROM personal_info 
                INNER JOIN patients ON personal_info.ID = patients.patient_ID
                WHERE personal_info.ID = patients.patient_ID";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<option value='" . $row["first_name"] . " " . $row["last_name"] . "'>";
        }
    }
?>