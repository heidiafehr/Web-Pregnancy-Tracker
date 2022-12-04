<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medications</title>
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
                        <a class="nav-link" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="medications.php">Medications</a>
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
    <div class="container">
        <div class="col">
            <div class="card" id="medicationsCard">
                <div class="card-header"> 
                <h5> Medications </h5>
                </div> 
                <div class = "card-body">
                <table class="table">
    <thead>
        <tr>
        <th scope="col">Medication Name</th>
        <th scope="col">Medication Start</th>
        <th scope="col">Medication End Date</th>
        <th scope="col">Medication Description</th>
        </tr>
    </thead>
        <?php   
            //create query to get medications from medications table
            $medicationsQuery ="SELECT * FROM medication where med_patientID = $patientID;"; 
            $medicationsResult = $conn->query($medicationsQuery); 
            $medOut = $medicationsResult->fetch_assoc(); 
            //if medications are found 
            if($medOut){
                $medNameOut = $medOut['med_name'];
                $medStartOut = $medOut['med_start_date'];
                $medEndOut = $medOut['med_end_date'];
                $medDesc = $medOut['med_description'];
            }
            else{
                $medNameOut = 'No Prescriptions'; 

            }
        ?>
        <tbody>
            <tr>
                <td><?php echo $medNameOut; ?></td>
                <td><?php echo $medStartOut; ?></td>
                <td><?php echo $medEndOut; ?></td>
                <td><?php echo $medNameOut; ?></td>
            </tr>
        </tbody>
        </table>


                    <!-- Further medications create more entries function or something -->
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>   
</body>
</html>