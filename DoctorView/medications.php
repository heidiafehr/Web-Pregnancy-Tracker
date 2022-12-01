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
            <?php
                session_start();
                $doctorID = $_SESSION['doctor_ID'];
                include "../connect_server.php";
                $sql = "SELECT first_name from personal_info where ID = $doctorID";
                $result = mysqli_query($conn, $sql);
                $doctorName = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo "<a class='navbar-brand px-2' href='doctorPortalHome.php'>Welcome, Dr. " . $doctorName[0]["first_name"] . "</a>";
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto px-2">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="doctorPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.php">Appointments</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="patients.php">Patients</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="medications.php">Medications</a> <!-- TODO: Update href-->
                    </li>
                </ul>
            </div>
            <button type="button" class="btn btn-dark navbar-btn px-2">
                Sign Out
            </button>
        </div>
    </nav>
    <!-- NavBar End -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>