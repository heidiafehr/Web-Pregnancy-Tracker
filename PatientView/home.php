<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="patientStyle.css">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <?php include 'patientInfo.php' ?>
    <!-- NavBar Start -->
    <nav class="navbar navbar-expand-lg px-4" id="custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="patientHome.html">Welcome, {firstName}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="patientHome.html">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="personalInformation.html">Personal Information</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="pregnancies.html">Pregnancy</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.html">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.html">Medications</a>
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-dark navbar-btn px-2">
                Sign Out
            </button>
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
                    <div class= "card-body">
                        <div id="personal-info-container">
                            <h5 id="personal-info-hdr">Personal Information </h5>
                                <!-- button to edit personal information    -->
                                    <button type="submit" class="btn btn-primary" id="edit-btn"> Edit </button>
                        </div>
                        <table class='table'>
                            <tr>
                                <td>Patient Name: </td>
                                <td><?php 
                                        print($name); 

                                    ?>
                                </td>                                  
                            </tr>
                            <tr>
                                <td>Patient Date of Birth:  </td>
                                <td><?php
                                    print($patientDOB); 
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><?php
                                    print($patientEmail); 
                                ?>
                                    </td>
                            </tr>
                            <tr>
                                <td>Phone Number: </td>
                                <td><?php
                                    print($patientPhone); 
                                ?></td>
                            </tr>
                            <tr>
                                <td>Priority Pharmacy: </td>
                                <td>Insert from db</td>
                            </tr>
                        </tr>
                        </table>
                    </div>  
                </div>    
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>