<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- NavBar Start -->
    <nav class="navbar navbar-expand-lg px-4" id="custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand px-2" href="doctorPortalHome.php">Welcome, Dr. {firstName}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto px-2">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="doctorPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="appointments.php">Appointments</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="patients.php">Patients</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.html">Medications</a> <!-- TODO: Update href-->
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-dark navbar-btn px-2">
                Sign Out
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Appointment Card -->
    <div class="container mt-5">
        <div class="card">
            <!-- Header -->
            <div class="card-header d-flex justify-content-between py-3">
                <div class="">
                    <h3>Appointments</h3>
                </div>
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
                                Create Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <!-- List all 10 upcoming appointments -->
                    <?php
                        include '../connect_server.php'; 

                        //getting appointment date
                        $sql =  "SELECT p_info.first_name, p_info.last_name, appt.start_date_time FROM personal_info AS p_info
                        INNER JOIN appointments AS appt
                        ON p_info.ID = appt.user_ID
                        ORDER BY appt.start_date_time;";
                        
                        $result = $conn->query($sql);
                        
                        if($result->num_rows > 0){
                    ?>
                    <!-- Appointment Table -->
                    <!-- TODO: Add Appointment Table UI -->
                    <!-- TODO: Display first 10 appointments -->
                    <div class="table-responsive m-4">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Appointment Date</th>
                                    <th scope="col">Appointment Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    while($i < 10){
                                        $row = $result->fetch_assoc();
                                        echo "<tr>";
                                        echo "<td>" . $row["first_name"] . "</td>";
                                        echo "<td>" . $row["last_name"] . "</td>";
                                        echo "<td>" . $row["start_date_time"] . "</td>";
                                        echo "<td>" . "{time}" . "</td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                        }
                        else{
                            ?>
                            <h5> You have no upcoming appointments</h5>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Calendar Modal -->
    <div class="modal fade" id="apptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Appointment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Patient Name -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width:120px;">Patient Name</span>
                        <input type="text" list="patientSearch" id="nameSearch" name="nameSearch"required>
                    </div>

                    <datalist id="patientSearch">
                        <?php
                        include '../connect_server.php'; 

                        //getting appointment date
                        $sql =  "SELECT DISTINCT p_info.first_name, p_info.last_name FROM personal_info AS p_info
                        INNER JOIN appointments AS appt
                        ON p_info.ID = appt.user_ID
                        ORDER BY p_info.first_name;";
                        $result = $conn->query($sql);
                    
                        $arr = array();
                        if($result->num_rows > 0){ 
                            while($row = $result->fetch_assoc()){ 
                                echo "<option value=\"" . $row['first_name'] . " " . $row['last_name'] . "\">";
                            } 
                        }
                        ?>
                    </datalist>

                    <!-- Date Picker Start -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width:120px;">Date</span>
                        <input type="date" id="dateSearch" name="dateSearch"
                            value="2022-11-27"
                            min="2022-11-27" max="2023-11-27" required>
                    </div>
                    <!-- Date Picker End -->
                            
                    <!-- Time Picker Start  -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" style="width:120px;">Time</span>
                        <!-- TODO: Increment time by 15 minutes -->
                        <input type="time" id="timeSearch" name="timeSearch"
                            min="09:00" max="18:00" required>
                    </div>
                    <!-- Time Picker End -->
                </div>
                <div class="modal-footer">
                    <!-- Send appointment to db -->
                    <button type="button" class="btn btn-primary" form="modal-details" id="submitBtn">Submit</button>
                </div>
                <!-- TODO: Make submit button functional -->
                <!-- <script>
                    let apptModal = document.getElementById('apptModal');
                    let name = document.getElementById('nameSearch');
                    let date = document.getElementById('dateSearch');
                    let time = document.getElementById('timeSearch');
                    let submitBtn = document.getElementById('submitBtn');
                    let nameVal, dateVal, timeVal;

                    submitBtn.addEventListener('click', function(){
                        if(name.value && date.value && time.value){
                            nameVal = name.value;
                            dateVal = date.value;
                            timeVal = time.value;
                        } else {
                            console.log('All inputs required');
                        }
                    });
                </script> -->
                <?php
                
                ?>
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
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">First Name</span>
                        <input type="text" id="firstName" name="firstName">
                    </div>
                        
                    <!-- Last Name  -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Last Name</span>
                        <input type="text" id="lastName" name="lastName">
                    </div>

                    <!-- Appointment Date -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Date</span>
                        <input type="date" id="apt-date" name="apt-date">
                    </div>

                    <!-- Appointment Time  -->
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Time</span>
                        <!-- TODO: Increment time by 15 minutes -->
                        <input type="time" id="apt-time" name="apt-time">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>