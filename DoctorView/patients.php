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
                        <a class="nav-link" href="doctorPortalHome.php">Home</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="appointments.php">Appointments</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" href="patients.php">Patients</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link" href="medications.php">Medications</a>
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
                    <!-- TODO: Do better than this -->
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>
</html>