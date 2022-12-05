<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <?php include "sideNavBar.php" ?>
        <div class="col py-3">
            <div class="card">
                <div class="card-body">

                    <?php
                    include "../connect_server.php";
                    if (isset($_GET['id'])) {
                        // gets med_ID
                        $thisID = $_GET['id'];
                        $sql = "SELECT * FROM medication WHERE med_ID='$thisID';";

                        $result = mysqli_query($conn, $sql);
                        $row = $result->fetch_assoc();

                        $medName = $row['med_name'];
                        $dosage = $row['dosage'];
                        $frequency = $row['frequency'];
                        $medStartDate = $row['med_start_date'];
                        $medEndDate = $row['med_end_date'];
                        $medDoctorID = $row['med_doctorID'];
                    } else {
                        echo "didn't get ID";
                    }
                    ?>

                    <h3>Medication <?php echo $thisID ?></h3>
                    <form action="sendPatientMedication.php" method="post">
                        <input type="hidden" id="medicationID" name="medID" value="<?php echo $thisID ?>">

                        <div class='row'>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>Medication Name</label>
                                    <input type='text' id='apptLength' class='form-control form-control-lg' name='newMedName' placeholder='<?php echo $medName ?>'>
                                </div>
                            </div>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>Dosage</label>
                                    <input type='text' id='apptLength' class='form-control form-control-lg' name='newDosage' placeholder='<?php echo $dosage ?>'>
                                </div>
                            </div>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>Frequency</label>
                                    <input type='text' id='apptLength' class='form-control form-control-lg' name='newFrequency' placeholder='<?php echo $frequency ?>'>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>Doctor</label>
                                    <input type='text' id='apptLength' class='form-control form-control-lg' name='newDoctorID' placeholder='<?php echo $medDoctorID ?>'>
                                </div>
                                <?php
                                if (isset($_GET['doctorerr'])) {
                                    echo '<p style="color: red;">', $_GET['doctorerr'], '</p>';
                                }
                                ?>
                            </div>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='start_time'>Start Date</label>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" type='text' id='newStartDate' class='form-control form-control-lg' name='newStartDate' placeholder='<?php echo $medStartDate ?>'>
                                </div>
                            </div>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>End Date</label>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" . type='text' id='newEndDate' class='form-control form-control-lg' name='newEndDate' placeholder='<?php echo $medEndDate ?>'>
                                </div>
                            </div>
                        </div>


                        <div class='personal-info-footer'>
                            <input class='btn btn-primary' type='submit' value='submit'>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>