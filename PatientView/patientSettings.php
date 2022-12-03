<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="patientStyle.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include 'patientInfo.php' ?>
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
                        <a class="dropdown-item" href="patientSettings.php">Settings</a>
                        <a class="dropdown-item" href="../signout.php">Sign Out</a>
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar End -->
    <!--card with settings -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Change your password</h5>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="firstName">UserName:</label>
                        <input type="text" id="disabledTextInput" class="form-control form-control-lg"
                            name="userName" placeholder="<?php print($username); ?>"disabled>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="lastName">Enter Your Current Password</label>
                        <input type="text" id="newLastName" class="form-control form-control-lg"
                            name="currentPassword">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                    <div class="form-outline datepicker w-100">
                        <label for="birthdayDate" class="form-label">Enter your new password</label>
                        <input type="text" class="form-control form-control-lg" id="newDOB"
                            name="newPassword">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                </div>
            </div>
        </div>
    </div>  
    <?php
    

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>