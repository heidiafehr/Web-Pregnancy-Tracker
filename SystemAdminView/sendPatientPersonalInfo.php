<?php
    include "../connect_server.php";

    if(array_key_exists('oldUsername', $_POST) and array_key_exists('oldID', $_POST) and $_POST['oldID'] != null and $_POST['oldUsername'] != null){
        $oldUsername = $_POST['oldUsername'];
        $oldID = $_POST['oldID'];

        if(array_key_exists('newUsername', $_POST) and $_POST['newUsername'] != null) {

            //Getting new username
            $newUsername = $_POST['newUsername'];
    
            $sql = "SELECT * from users WHERE username='$newUsername'";
            $result = $conn->query($sql);
            if($result->num_rows >= 1 ){
                header("Location: patientInfo.php?id=$oldID&username=$oldUsername&err=There already exists a user under the name $newUsername");
            }else{
                // drop FK patients, doctors, admins
                $sql = "ALTER TABLE patients DROP FOREIGN KEY fk_PatientUsername;";
                $sql .= "ALTER TABLE doctors DROP FOREIGN KEY fk_DoctorUsername;";
                $sql .= "ALTER TABLE admins DROP FOREIGN KEY fk_AdminUsername;";
                // drop primary key of users
                $sql .= "ALTER TABLE users DROP PRIMARY KEY;";
                $sql .= "UPDATE users set username='$newUsername' WHERE username='$oldUsername';";
                $sql .= "UPDATE patients SET username='$newUsername' WHERE username='$oldUsername';";
                // add back the PK
                $sql .= "ALTER TABLE users ADD PRIMARY KEY(username);";
                // add back the FK on patients, doctors, admins
                $sql .= "ALTER TABLE patients ADD CONSTRAINT fk_PatientUsername FOREIGN KEY (username) REFERENCES users(username);";
                $sql .= "ALTER TABLE doctors ADD CONSTRAINT fk_DoctorUsername FOREIGN KEY (username) REFERENCES users(username);";
                $sql .= "ALTER TABLE admins ADD CONSTRAINT fk_AdminUsername FOREIGN KEY (username) REFERENCES users(username);";
                if($conn->multi_query($sql) == TRUE){
                    echo "updated Username";
                    header("Location: patientInfo.php?id=$oldID&username=$newUsername");
                }else{
                    echo "didn't do shit";
                }
            }
            
            #editInformation();
        }
    }

   
