<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregnancies</title>
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
                        <a class="nav-link active" href="pregnancies.php">Pregnancy</a>
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
                            <a class="dropdown-item" href="settings.php">Settings</a>
                            <a class="dropdown-item" href="../signout.php">Sign Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Pregnancy Card        -->
    <div class="container">
        <div class=" col">
            <div class = "card" id="pregnancyCard">
                <div class = "card-header"> 
                    <h5>Pregnancies</h5>
                </div> 
                <div class = "card-body">
                    <!--Single Pregnancy Entry -->
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Days Until Due Date</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Baby's Sex</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            //getting current date and time 
                            $tempDateTime = date('d-m-Y h:i:s a', time());    
                            //saving date time as datetimeImmutabel
                            $currentDateTime  = new dateTimeImmutable($tempDateTime); 
                            //datetime string 
                            $currDate = $currentDateTime->format('F d,Y'); 
                            
                            // create query for pregnancies 
                            $pregnanciesSQL = "SELECT * FROM pregnancies where patient_ID = $patientID;";
                            //get pregnacy rows if found 
                            $pregnanciesResult= $conn->query($pregnanciesSQL);
                            //function to print pregnancies 
                            if($pregnancyRow = $pregnanciesResult->fetch_assoc()){
                                $dueDate = $pregnancyRow["due_date"]; 
                                
                                //converting due date to immutable 
                                $dueDateImmutable = new dateTimeImmutable($dueDate);
                                $testString = $dueDateImmutable->format('F d,Y'); 
                                
                                //getting difference for due date 
                                //$dueDateCountDown = $->diff($); 
                                //getting difference for due date 
                                $dueDateCountDown = $currentDateTime->diff($dueDateImmutable); 
                                //getting days
                                $countdownDays = $dueDateCountDown->format('%R%a'); 
                                echo(
                                    "<td>$countdownDays</td>" . 
                                    "<td>" .$pregnancyRow["due_date"] .
                                    "<td>". $pregnancyRow["baby_sex"] .
                                    "</td></tr></div>"
                                ); 
                            }
                        ?>   
                    </tbody>                     
                    </table>
                    <!-- Button to show past pregnancies -->
                    <tr>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Show Past Pregnancies
                    </button></tr>
                    <!-- Further pregnacies create more entries function or something -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Previous Pregnancies</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class='table'>
                        <thead>
                            <tr>
                            <th scope="col">Days Until Due Date</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Baby's Sex</th>
                            </tr>
                        </thead>
                    <?php 
                        
                        while($pregnancyRow = $pregnanciesResult->fetch_assoc()){
                            //print_r($row); 
                            //print('<br>'); 
                            echo("
                                <div class = cardbody> 
                                <tr><td> Birthed </td><td>".$pregnancyRow["due_date"]."</td>" .
                                "<td>".$pregnancyRow["baby_sex"]."</td>".
                                "</tr></div>"
                            );  
                            
                        } 
                    ?></table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
