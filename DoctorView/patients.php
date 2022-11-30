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
            <a class="navbar-brand px-2" href="doctorPortalHome.html">Welcome, Dr. {firstName}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto px-2">
                    <!-- If you're adding new page in the nav bar, set the current page as active -->
                    <li class="nav-item px-3">
                        <a class="nav-link" href="doctorPortalHome.html">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.php">Appointments</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="patients.php">Patients</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.html">Medications</a> <!-- TODO: Update href-->
                    </li>
                </ul>
            </div>
            <!-- Sign out button -->
            <button type="button" class="btn btn-dark navbar-btn px-2">
                Sign Out
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Search -->
    <div class="container my-5 mx-auto">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Search</h3>
                    </div>
                    <div class="card-body">
                        <!-- First Name -->
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="basic-addon1">First Name</span>
                            <input type="text" id="firstName" name="firstName">
                        </div>
                            
                        <!-- Last Name  -->
                        <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="basic-addon1">Last Name</span>
                            <input type="text" id="lastName" name="lastName">
                        </div>
    
                        <!-- Appointment Date -->
                        <!-- <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="basic-addon1">Date</span>
                            <input type="date" id="apt-date" name="apt-date">
                        </div> -->
    
                        <!-- Appointment Time  -->
                        <!-- TODO: Increment time by 15 minutes -->
                        <!-- <div class="input-group flex-nowrap mb-3">
                            <span class="input-group-text" id="basic-addon1">Time</span>
                            <input type="time" id="apt-time" name="apt-time">
                        </div> -->
                        <div class="btn btn-primary" id="submitBtn">
                            Submit
                        </div>
                        <script>
                            let firstName = document.getElementById("firstName");
                            let lastName = document.getElementById("lastName");
                            let apt_date = document.getElementById("apt-date");
                            // let apt_time = document.getElementById("apt-time");
                            // let submitBtn = document.getElementById("submitBtn");
                            let firstNameValue, lastNameValue;
                            
                            submitBtn.addEventListener("click", function(){
                                let noInput = true;
                                if(firstName.value){
                                    console.log(firstName.value);
                                    firstNameValue = firstName.value;
                                    noInput = false;
                                }
                                if(lastName.value){
                                    console.log(lastName.value);
                                    lastNameValue = lastName.value;
                                    noInput = false;
                                }
                                // if(apt_date.value){
                                //     console.log(apt_date.value);
                                //     apt_date_value = apt_date.value;
                                // }
                                // if(apt_time.value){
                                //     console.log(apt_time.value);
                                //     apt_time_value = apt_time.value;
                                // }
                                if(noInput){
                                    console.log("No input")
                                }
                            })
                        </script>
                        <?php
                            $firstName = "<script>document.write(firstNameValue)</script>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12">
                <div class="card p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <!-- <th scope="col">Appointment Date</th>
                                    <th scope="col">Appointment Time</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <!-- <td>01/20/2022</td>
                                    <td>5:30 PM</td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>