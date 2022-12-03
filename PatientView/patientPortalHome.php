<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="patientStyle.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include 'patientInfo.php';
    ?> 
    <!-- NavBar Start -->
    <nav class="navbar navbar-expand-lg px-4" style="background-color: #6096ba">
        <div class="container-fluid">
            <a class="navbar-brand" href="doctorPortalHome.php">
                <img src="../images/baby-newborn.png" alt="Logo" style="height:36px"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="patientPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="pregnancies.php">Pregnancy</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.php">Medications</a>
                    </li>
                    <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                                include "get_first_name.php";
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="../signout.php">Sign Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- container for cards-->
    <div class="container">
        <!-- First Row -->
        <div class="row">
            <!--Personal Information card -->
            <div class = " col">
                <div class="card" id="personalInformationCard">
                    <div class='card-header'>
                            <h5 id="personal-info-hdr">Personal Information </h5>
                    </div>
                    <div class= "card-body">
                        <!-- table to print patient info --> 
                        <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">First</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Sex </th>
                        <th scope="col">Gender </th>
                        <th scope="col">Email </th>
                        <th scope="col">Phone Number </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?php print($name); ?></td>
                        <td><?php print($patientDOB) ?></td>
                        <td><?php print($patientSex) ?></td>
                        <td><?php print($patientGender) ?></td>
                        <td><?php print($patientEmail) ?></td>
                        <td><?php print($patientPhone) ?></td>
                        </tr>

                    </tbody>
                    </table>
                         <!-- Personal Information Edit Modal-->
                        <button type="button" class="btn btn-primary" id="appt-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                    </div>  
                </div>    
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Enter New Profile Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method ="POST" action ="sendPatientInfo.php">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Patient Name:</label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="newPatientName" class="form-control">
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Date of Birth: </label>
                            </div>
                            <div class="col-auto">
                                <input type="date" name="newDOB" class="form-control">
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Email: </label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="newEmail" class="form-control">
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label class="col-form-label">Phone Number: </label>
                            </div>
                            <div class="col-auto">
                                <input type="text" name="newPhone" class="form-control">
                        </div>

                        <div class="col-auto"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="submit">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>