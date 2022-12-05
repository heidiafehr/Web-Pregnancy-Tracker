<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="icon" type="image/x-icon" href="../images/baby-newborn.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="patientStyle.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include 'patientInfo.php';
    ?> 
    <!-- NavBar Start -->
    <nav class="navbar navbar-expand-lg px-4" style="background-color: #6096ba; font-weight: 600;">
        <div class="container-fluid">
            <a class="navbar-brand" href="patientPortalHome.php">
                <img src="../images/baby-newborn.png" alt="Logo" style="height:36px"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="patientPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="pregnancies.php">Pregnancy</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.php">Medications</a>
                    </li>
                    <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                                echo $row["first_name"];
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="settings.php">Settings</a>

                            <a class="dropdown-item" href="../signout.php">Sign Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Appointments Card-->
    <div class="container mt-5">
        <div class="col">
            <div class="card mb-5" id="appointmentsCard">
                <div class="card-header d-flex justify-content-between py-3">
                    <div class="header-title" id="appt-container">
                        <h3>Appointments</h3>
                    </div>
                    <!-- Appointment Modal Button -->
                    <div class="btn-group mx-2" role="group">
                        <button type="button" class="btn btn-primary" id="appt-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Request Appointment
                        </button>
                    </div>
                </div>
                <div class = "card-body">
                    <!-- Printing Appointments -->
                    <?php 
                        //Create Query for appoinments 
                        $appointmentSQL = "SELECT * FROM appointments where user_ID = $patientID;"; 
                        $appointmentResult = $conn ->query($appointmentSQL);
                        if ($appointmentResult->num_rows > 0) {
                            echo '<table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Appointment Date</th>
                                    <th scope="col">Appointment Start Time</th>
                                    <th scope="col">Appointment End Time</th>
                                    <th scope="col">Appointment Length</th>
                                    <th scope="col">Approval Status</th>
                                    </tr>
                                </thead>';
                            //Function to print appointments
                            while ($appointmentRow = $appointmentResult->fetch_assoc()) {
                                    //saving appointment Start Time
                                    $apptStart = new dateTimeImmutable($appointmentRow['start_date_time']);
                                    //converting to string and format
                                    $apptStartString = $apptStart->format('H:i');
                                    //saving appointment Date
                                    $apptDate = $apptStart->format('F d, Y');
                                    //saving appointment End Time 
                                    $apptEnd = new dateTimeImmutable($appointmentRow['end_date_time']);
                                    //converting to string and format
                                    $apptEndString = $apptEnd->format('H:i');
                                    //getting appointment length
                                    $apptLength = $appointmentRow['appt_length'];
                                    //get appointment approval
                                    $apptApproved = $appointmentRow['approved'];
                                    if ($apptApproved == 1) {
                                        $apptApproved = "Approved";
                                    } else {
                                        $apptApproved = "Pending";
                                    }

                                    //print appointments
                                    echo "<tr><td>$apptDate</td>
                                            <td>$apptStartString</td>
                                            <td>$apptEndString</td>
                                            <td>$apptLength </td>
                                            <td>$apptApproved</td>
                                            </tr>";
                            }
                        echo '</table>';
                        } else {
                            print("<h5>No appointments.<h5>");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Request New Appointment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action ="insertAppointments.php">
                        <div class="row">
                            <!-- Pick start time -->
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="firstName">Enter Start Time</label>
                                    <input type="time" class="form-control form-control-lg"
                                        name="startTime" min="08:00" required>
                                </div>
                            </div>
                            <!-- Pick end time -->
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="lastName">Enter End Time</label>
                                    <input type="time" class="form-control form-control-lg"
                                        name="endTime" max ="17:00" required>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <!-- Pick date -->
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="lastName">Enter Date</label>
                                    <input type="date" class="form-control form-control-lg"
                                        name="date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>