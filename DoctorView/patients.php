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
                    <!-- If you're adding new page in the nav bar, set the current page as active -->
                    <li class="nav-item px-3">
                        <a class="nav-link" href="doctorPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.php">Appointments</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="patients.php">Patients</a> <!-- TODO: Update href-->
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.php">Medications</a> <!-- TODO: Update href-->
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
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card mb-5">
                    <div class="card-header">
                        <h3>Search Patient</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="searchForm">
                            <!-- First Name -->
                            <div class="d-flex flex-row mb-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="basic-addon1" style="width:120px">First Name</span>
                                    <input type="text" id="firstName" name="firstName" style="width:240px">
                                </div>
                                    
                                <!-- Last Name  -->
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="basic-addon1" style="width:120px">Last Name</span>
                                    <input type="text" id="lastName" name="lastName" style="width:240px">
                                </div>
                            </div>
                            <!-- Date of Birth -->
                            <div class="input-group flex-nowrap mb-3">
                                <span class="input-group-text" id="basic-addon1" style="width:120px">Date of Birth</span>
                                <input type="date" id="dobDate" name="dobDate">
                            </div>
                        </form>
                        <div class="d-flex flex-row-revers">
                            <button type="submit" form="searchForm" class="btn btn-primary" id="submitBtn">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-12">
                    <?php
                        $firstName = '';
                        $lastName = '';
                        $dobDate = '';
                        $sql = "SELECT * FROM personal_info WHERE";
                        if(!isset($_POST['firstName']) && !isset($_POST['lastName']) && !isset($_POST['dobDate'])){
                        
                        }
                        else{
                            if(isset($_POST['firstName'])){
                                $firstName = $_POST['firstName'];
                                $sql .= " first_name='$firstName'";
                            }
                            if(isset($_POST['lastName'])){
                                $lastName = $_POST['lastName'];
                                $sql .= " OR last_name='$lastName'";
                            }
                            if(isset($_POST['dobDate'])){
                                $dobDate = $_POST['dobDate'];
                                $sql .= " OR dob='$dobDate'";
                            }
                        
                            include "../connect_server.php";
                        
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                
                    ?>
                    <div class="card p-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Date of Birth</th>
                                        <th scope="col">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td>" . $row["first_name"] . "</td>";
                                            echo "<td>" . $row["last_name"] . "</td>";
                                            echo "<td>" . date('F j, Y', strtotime($row['dob'])) . "</td>";
                                            echo "<td>" . '<span><a href="#">Info</a></span>' . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            } 
            else {
                echo '<div class="card p-4"><h4>No results found.</h4></div>';
            }
        }
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>