<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medications</title>
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
                        <a class="nav-link" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="medications.php">Medications</a>
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
    <div class="container mt-5">
        <div class="col">
            <div class="card mb-5" id="medicationsCard">
                <div class="card-header"> 
                    <h3 class="header-title"> Medications </h3>
                </div> 
                <div class = "card-body">
                <?php   
                    //create query to get medications from medications table
                    $medicationsQuery ="SELECT * FROM medication where med_patientID = $patientID;"; 
                    $medicationsResult = $conn->query($medicationsQuery); 
                    //if there are medications in the table, display them
                    if($medicationsResult->num_rows > 0){
                        echo '<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Medication Name</th>
                                <th scope="col">Medication Dosage</th>
                                <th scope="col">Medication Frequency</th>
                                <th scope="col">Medication Start</th>
                                <th scope="col">Medication End Date</th>
                                <th scope="col">Medication Description</th>
                            </tr>
                        </thead>
                        <tbody>';
                        while($medOut = $medicationsResult->fetch_assoc()){
                            echo "<tr>
                                <td>".$medOut["med_name"]."</td>
                                <td>".$medOut["dosage"]."</td>
                                <td>".$medOut["frequency"]."</td>
                                <td>".$medOut["med_start_date"]."</td>
                                <td>".$medOut["med_end_date"]."</td>
                                <td>".$medOut["med_description"]."</td>
                            </tr>";
                        }
                        echo '</tbody>
                        </table>';
                        }
                    else{
                        echo "<h5>No medications found.<h5>";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>   
</body>
</html>