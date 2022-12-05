<?php
include "../connect_server.php";

if(array_key_exists('oldDueDate', $_POST) and $_POST['oldDueDate'] != null and array_key_exists('thisID', $_POST) and $_POST['thisID'] != null){
    $thisDueDate = $_POST['oldDueDate'];
    $thisID = $_POST['thisID'];

    // DUE DATE
    if(array_key_exists('dueDate', $_POST) and $_POST['dueDate'] != null){
        $newDueDate = $_POST['dueDate'];

        $sql = "UPDATE pregnancies SET due_date='$newDueDate' WHERE patient_ID='$thisID' AND due_date='$thisDueDate'";
        if($conn->query($sql)){
            echo "updated due date";
            header("Location: patientPregnancies.php?id=$thisID&dueDate=$newDueDate");
        }else{
            echo "something went wrong updating due date";
        }
    }

    // BABY SEX
    if(array_key_exists('babySex', $_POST) and $_POST['babySex'] != null){
        $babySex = $_POST['babySex'];

        if($babySex != 'F' && $babySex != 'M' && $babySex != 'I'){
            header("Location: patientPregnancies.php?id=$thisID&dueDate=$thisDueDate&babyerr= Enter only M/F/I");
        }else{

            $sql = "UPDATE pregnancies SET baby_sex='$babySex' WHERE patient_ID='$thisID' AND due_date='$thisDueDate'";

            if($conn->query($sql)){
                echo "updated baby sex";
                header("Location: patientPregnancies.php?id=$thisID&dueDate=$thisDueDate");
            }else{
                echo "something went wrong updating baby's sex";
            }
        }
    }
}
?>