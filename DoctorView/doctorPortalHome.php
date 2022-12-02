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
    <?php
        include "../checkSignedIn.php";
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
                <ul class="navbar-nav ms-auto px-2">
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="doctorPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.php">Appointments</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="patients.php">Patients</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.php">Medications</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dr. 
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

    <div class="container mt-5">
        <div class="card">
            <div class="card-header py-3">
                <h3 class="card-title">
                    Appointments
                </h3>
            </div>
            <div class="card-body">
                <?php
                    include '../connect_server.php'; 

                    //getting appointment date
                    // $date = '2022-12-16';
                    // TODO: test if this works
                    $sql =  "SELECT p_info.first_name, p_info.last_name, appt.start_date_time FROM personal_info AS p_info
                    INNER JOIN appointments AS appt
                    ON DATE_FORMAT(NOW(), '%Y-%m-%d') = SUBSTRING(appt.start_date_time,1,10)
                    ORDER BY appt.start_date_time;";

                    $result = $conn->query($sql);

                    if($result->num_rows > 0){
                        echo "<h5>You have $result->num_rows upcoming appointments today.</h5>";
                ?>
                <div class="table">
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
                                    while($row = $result->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td>" . $row["first_name"] . "</td>";
                                        echo "<td>" . $row["last_name"] . "</td>";
                                        $startDateTime = explode('T', $row['start_date_time']);
                                        echo "<td>" . date('F j, Y', strtotime($startDateTime[0])) . "</td>";
                                        echo "<td>" . date('h:i a', strtotime($startDateTime[1])) . "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                    }   
                    else{
                        echo "You have no upcoming appointments today.";
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>