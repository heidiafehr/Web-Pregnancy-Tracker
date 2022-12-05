<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        include "../checkSignedIn.php";
        include "get_personal_info.php";
    ?>
    <!-- NavBar Start -->
    <nav class="navbar navbar-expand-lg px-4" style="background-color: #6096ba; font-weight:600">
        <div class="container-fluid">
            <a class="navbar-brand" href="doctorPortalHome.php">
                <img src="../images/baby-newborn.png" alt="Logo" style="height:36px"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto px-2">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="doctorPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="patients.php">Patients</a>
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
        </div>
    </nav>
    <!-- NavBar End -->

    <?php
        include '../connect_server.php'; 
        $patientID = $_GET['id'];
        $sql = "SELECT * FROM personal_info WHERE ID = $patientID";
        $result = mysqli_query($conn, $sql);
        $patientInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        $firstName = $patientInfo[0]['first_name'];
        $lastName = $patientInfo[0]['last_name'];
        $dob = $patientInfo[0]['dob'];
        $email = $patientInfo[0]['email'];
        $phone = $patientInfo[0]['phone_number'];
        $sex = $patientInfo[0]['sex'];
        $gender = $patientInfo[0]['gender'];
        
        //Make a card of the patient's information
        echo "<div class='container mt-5'>
                <div class='card mb-5'>
                    <div class='card-header'>
                        <div class='header-title'>
                            <h3 class='mb-0'>Patient Information</h3>
                        </div>
                    </div>
                    <div class='card-body'>
                        <div class='row'>
                            <h3 class='card-title pb-3'>$firstName $lastName</h3>
                            <div class='col-6'>
                                <p class='card-text'> <b>Date of Birth:</b> " . date('F j, Y', strtotime($dob)) . "</p>
                                <p class='card-text'> <b>Age:</b> " . date_diff(date_create($dob), date_create(date("Y-m-d")))->format('%Y') . " years old</p>
                            </div>
                            <div class='col-6'>
                                <p class='card-text'> <b>Email:</b> " . $email . "</p>
                                <p class='card-text'> <b>Phone:</b> " . $phone . "</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='card mb-5'>
                    <div class='card-header'>
                        <div class='header-title'>
                            <h3 class='mb-0'>Previous Pregnancies</h3>
                        </div>
                    </div>";
        include '../connect_server.php'; 
        $sql = "SELECT * FROM pregnancies WHERE patient_id = $patientID";
        $result = mysqli_query($conn, $sql);
        $pregnancies = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        if (count($pregnancies) == 0) {
            echo "<div class='card-body'>
                    <p class='card-text'>No previous pregnancies</p>
                </div>
            </div>";
        } else {
                    echo "<div class='table-responsive m-4'>
                        <table class='table table-bordered table-hover'>
                            <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>Due Date</th>
                                <th scope='col'>Baby's Sex</th>
                            </tr>
                            </thead>
                            <tbody>";
                            
                            while($row = $result->fetch_assoc()){
                                echo "<tr>
                                        <td>" . date('F j, Y', strtotime($row['due_date'])) . "</td>";
                            }
                            
                            echo "<tr></tbody>
                        </table>
                    </div>
                </div>";
        }


        echo "<div class='card mb-5'>
                    <div class='card-header'>
                        <div class='header-title'>
                            <h3 class='mb-0'>Medications</h3>
                        </div>
                    </div>
                    <div class='table-responsive m-4'>
                        <table class='table table-bordered table-hover'>
                            <thead class='thead-dark'>
                            <tr>
                                <th scope='col'>Name</th>
                                <th scope='col'>Manage</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>";
    ?>   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>