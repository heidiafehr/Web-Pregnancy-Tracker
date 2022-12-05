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
                        $thisID = $_GET['id'];
                        $sql = "SELECT * FROM appointments WHERE appointment_ID='$thisID';";

                        $result = mysqli_query($conn, $sql);
                        $row = $result->fetch_assoc();

                        $startDateTime = $row['start_date_time'];
                        $endDateTime = $row['end_date_time'];
                        $apptLength = $row['appt_length'];
                        $approved = $row['approved'];
                        $doctor = $row['doctor_ID'];
                    } else {
                        echo "didn't get ID";
                    }
                    ?>

                    <h3>Appointment <?php echo $thisID ?></h3>
                    <form action="sendPatientAppointments.php" method="post">
                        <input type="hidden" id="oldAppointmentID" name="oldAppointmentID" value="<?php echo $thisID ?>">

                        <div class='row'>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='start_time'>Start Time</label>
                                    <input onfocus="(this.type='datetime-local')" onblur="(this.type='text')" type='text' id='newdob' class='form-control form-control-lg' name='startDateTime' placeholder='<?php echo $startDateTime ?>'>
                                </div>
                            </div>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>End Time</label>
                                    <input onfocus="(this.type='datetime-local')" onblur="(this.type='text')" . type='text' id='newdob' class='form-control form-control-lg' name='endDateTime' placeholder='<?php echo $endDateTime ?>'>
                                </div>
                            </div>
                            <div class='col-md-4 mb-2'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>Appt Length</label>
                                    <input type='text' id='apptLength' class='form-control form-control-lg' name='apptLength' placeholder='<?php echo $apptLength ?>'>
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='col-md-6 mb-4'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>Approval Status</label>
                                    <input type='text' id='apptLength' class='form-control form-control-lg' name='approval' placeholder='<?php echo $approved ?>'>
                                </div>

                                <?php
                                if (isset($_GET['approveerr'])) {
                                    echo '<p style="color: red;">', $_GET['approveerr'], '</p>';
                                }
                                ?>
                            </div>
                            <div class='col-md-6 mb-4'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>Doctor</label>
                                    <input type='text' id='apptLength' class='form-control form-control-lg' name='doctor' placeholder='<?php echo $doctor ?>'>
                                </div>
                                <?php
                                if (isset($_GET['err'])) {
                                    echo '<p style="color: red;">', $_GET['err'], '</p>';
                                }
                                ?>
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