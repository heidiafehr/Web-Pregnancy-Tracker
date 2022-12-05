<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="icon" type="image/x-icon" href="../images/baby-newborn.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include "../checkSignedIn.php";
        include "get_personal_info.php";
    ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg px-4" style="background-color: #6096ba; font-weight: 600;">
        <!-- Navbar Container -->
        <div class="container-fluid">
            <!-- Welcome Header -->
            <a class="navbar-brand" href="doctorPortalHome.php">
                <img src="../images/baby-newborn.png" alt="Logo" style="height:36px"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- End Welcome Header -->

            <!-- Navbar Nav -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto px-2">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="doctorPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="patients.php">Patients</a>
                    </li>
                    <!-- <li class="nav-item px-3">
                        <a class="nav-link" href="medications.php">Medications</a>
                    </li> -->
                    <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../images/person-pngrepo-com.png" style="height:24px">
                            Dr. 
                            <?php
                                echo $personalInfo[0]['first_name'];
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="settings.php">Settings</a>
                            <a class="dropdown-item" href="../signout.php">Sign Out</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Navbar Nav -->
        </div>
        <!-- End Navbar Container -->
    </nav>
    <!-- End NavBar -->

    <!-- Appointment Card -->
    <div class="container mt-5">
        <div class="card mb-5">
            <!-- Card Header -->
            <div class="card-header d-flex justify-content-between py-3">
                <!-- Header Title -->
                <div class="header-title">
                    <h3>Appointments</h3>
                </div>
                <!-- End Header Title -->
                
                <!-- Header Buttons -->
                <div class="">
                    <div class="btn-toolbar" role="toolbar">
                        <!-- TODO: Add functionality on the buttons to switch calendar and list view -->
                        <!-- <div class="btn-group mx-4" role="group">
                            <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked/>
                            <label class="btn btn-outline-primary" for="option1">List View</label>
                            
                            <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off" />
                            <label class="btn btn-outline-primary" for="option2">Calendar View</label>
                        </div> -->

                        <!-- Search Button Modal -->
                        <!-- <div class="btn-group mx-2" role="group">
                            <button type="button" class="btn btn-primary" id="search-btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                                Search
                            </button>
                        </div> -->

                        <!-- Create Button Modal -->
                        <div class="btn-group mx-2" role="group">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" id="appt-btn" data-bs-toggle="modal" data-bs-target="#apptModal">
                                <img src="../images/plus-sign-pngrepo-com.png" alt="Create New Appointment" style="height:20px; color:white; padding-bottom:3px;">
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Header Buttons -->
            </div>
            <!-- End Card Header -->

            <!-- Card Body -->
            <div class="card-body">
                <!-- Card Body Container -->
                <div class="container">
                    <!-- List all 10 upcoming appointments -->
                    <?php
                        include '../connect_server.php'; 

                        //getting appointment date
                        $sql =  "SELECT p_info.ID, p_info.first_name, p_info.last_name, appt.appointment_ID, appt.start_date_time, appt.end_date_time FROM personal_info as p_info
                                    INNER JOIN appointments as appt ON appt.user_ID = p_info.ID
                                    INNER JOIN patients ON (appt.user_ID = patients.patient_ID AND appt.approved = 1)
                                    INNER JOIN doctors ON doctors.doctor_ID = $_SESSION[doctor_ID]
                                    ORDER BY appt.start_date_time, p_info.first_name ASC";
                        
                        $result = $conn->query($sql);
                        
                        if($result->num_rows > 0){
                    ?>
                    <!-- Appointment Table -->
                    <!-- TODO: Add Appointment Table UI -->
                    <div class="table-responsive m-4">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Appointment Date</th>
                                    <th scope="col">Appointment Time</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $limit = 10;
                                    $num = 0;
                                    while($row = $result->fetch_assoc()){
                                        if($num > $limit){
                                            break;
                                        }
                                        $startDateTime = explode('T', $row['start_date_time']);
                                        $endDateTime = explode('T', $row['end_date_time']);

                                        //Remove any appointments that have already passed based on time
                                        if($startDateTime[0] < date('Y-m-d')){
                                            if($startDateTime[1] < date('H:i:s')){
                                                continue;
                                            }
                                        }

                                        echo "<tr>";
                                        echo "<td>" . $row["first_name"] . "</td>";
                                        echo "<td>" . $row["last_name"] . "</td>";
                                        echo "<td>" . date('F j, Y', strtotime($startDateTime[0])) . "</td>";
                                        echo "<td>" . date('g:i a', strtotime($startDateTime[1])) . " - " . date('g:i a', strtotime($endDateTime[1])). "</td>";
                                        echo '<td>
                                            <a href="patient_info.php?id=' . $row["ID"] . '">View</a>
                                        </td>';
                                        echo "</tr>";
                                        $num++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }
                        else{
                        echo "<h5> You have no upcoming appointments</h5>";
                        }
                    ?>

                </div>
            </div>
            <!-- End Card Body Container -->
        </div>
        <!-- End Card Body -->
        <?php
            include 'approve_appointments.php';
        ?>
    </div>
        

    <!-- Calendar Modal -->
    <div class="modal fade" id="apptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Calendar Modal Header -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Appointment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Calendar Modal Header -->

                <!-- Calendar Modal Body -->
                <div class="modal-body">
                    <!-- Patient Name -->
                    <form action="insert_appt.php" method="post" id="apptForm">
                        <!-- Patient Name -->
                        <div class="form-floating mb-3">
                                <input type="text" list="patientSearch" class="form-control" id="patientName" name="patientName"
                                placeholder=" " required>
                                <label for="patientSearch" class="form-label">Patient Name</label>
                            </div>
                        <!-- End Patient Name -->
                            
                        <!-- Autocomplete Patient Name -->
                        <datalist id="patientSearch">
                            <?php
                                include 'autocomplete.php'; 
                            ?>
                        </datalist>
                        <!-- End Autocomplete Patient Name -->
                        <div class="row">
                            <!-- Start Date -->
                            <div class="col">
                                <div class="header">
                                    <h5>From</h5>
                                </div>
                                <!-- Appointment Date -->
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                                    <label for="startDate">Date</label>
                                </div>
                                <!-- End Appointment Date -->
                                
                                <!-- Appointment Time  -->
                                <div class="form-floating mb-3">
                                    <!-- TODO: Increment time by 15 minutes -->
                                    <input type="time" class="form-control" id="startTime" name="startTime"
                                    min="09:00" max="18:00" step="900" required>
                                    <label for="startTime">Time</label>
                                </div>
                            </div>

                            <!-- End Date -->
                            <div class="col">
                                <div class="header">
                                    <h5>To</h5>
                                </div>
                                <!-- Appointment Date -->
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                                    <label for="endDate">Date</label>
                                </div>
                                <!-- End Appointment Date -->
                                
                                <!-- Appointment Time  -->
                                <div class="form-floating mb-3">
                                    <input type="time" class="form-control" id="endTime" name="endTime"
                                    min="09:00" max="18:00" step="900" required>
                                    <label for="endTime">Time</label>
                                    <!-- TODO: Increment time by 15 minutes -->
                                </div>
                            </div>

                            <!-- This script automatically inputs the end date (assuming the appointment is the same day, which it should) -->
                            <script>
                                let startDate = document.getElementById('startDate');
                                let endDate = document.getElementById('endDate');

                                startDate.onchange = function(){
                                    console.log("startDate changed")
                                    if(startDate.value){
                                        endDate.value = startDate.value;
                                    }
                                }
                            </script>
                        </div>
                        <!-- End Appointment Time -->
                    </form>
                </div>
                <!-- End Calendar Modal Body -->
                
                <!-- Calendar Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="apptForm" id="submitBtn">Submit</button>
                </div>
                <!-- End Calendar Footer -->
            </div>
        </div>
    </div>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Search Patient</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- First Name -->
                    <div class="form-floating mb-3">
                        <input type="text" id="firstName" name="firstName">
                        <span class="form-floating-text" id="basic-addon1">First Name</span>
                    </div>
                        
                    <!-- Last Name  -->
                    <div class="form-floating mb-3">
                        <input type="text" id="lastName" name="lastName">
                        <span class="form-floating-text" id="basic-addon1">Last Name</span>
                    </div>

                    <!-- Appointment Date -->
                    <div class="form-floating mb-3">
                        <input type="date" id="apt-date" name="apt-date">
                        <span class="form-floating-text" id="basic-addon1">Date</span>
                    </div>

                    <!-- Appointment Time  -->
                    <div class="form-floating mb-3">
                        <!-- TODO: Increment time by 15 minutes -->
                        <input type="time" id="apt-time" name="apt-time">
                        <span class="form-floating-text" id="basic-addon1">Time</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>                         
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>