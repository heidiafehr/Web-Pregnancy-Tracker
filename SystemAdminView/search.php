<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin: Search</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <?php include "sideNavBar.php"; ?>
        <div class="col py-3">
            <div class="container my-5 mx-auto">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="card mb-5">
                            <div class="card-header">
                                <h3>Search Patient</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="searchForm" class="m-3">
                                    <!-- First Name -->
                                    <div class="d-flex flex-row mb-3">
                                        <div class="col-5 form-floating mr-2">
                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder=" ">
                                            <label for="firstName">First Name</label>
                                        </div>
                                        <div class="col-2">

                                        </div>

                                        <!-- Last Name  -->
                                        <div class="col-5 form-floating">
                                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder=" ">
                                            <label for="lastName">Last Name</label>
                                        </div>
                                    </div>
                                    <!-- Date of Birth -->
                                    <div class="form-floating col-5 mb-3">
                                        <input type="date" class="form-control" id="dobDate" name="dobDate">
                                        <label for="dobDate">Date of Birth</label>
                                    </div>
                                    <button type="submit" form="searchForm" class="btn btn-primary" id="submitBtn">
                                        Search
                                    </button>
                                </form>
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
                        if (!isset($_POST['firstName']) && !isset($_POST['lastName']) && !isset($_POST['dobDate'])) {
                        } else {
                            if (isset($_POST['firstName'])) {
                                $firstName = $_POST['firstName'];
                                $sql .= " first_name='$firstName'";
                            }
                            if (isset($_POST['lastName'])) {
                                $lastName = $_POST['lastName'];
                                $sql .= " OR last_name='$lastName'";
                            }
                            if (isset($_POST['dobDate'])) {
                                $dobDate = $_POST['dobDate'];
                                $sql .= " OR dob='$dobDate'";
                            }

                            include "../connect_server.php";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {

                        ?>
                                <div class="card p-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Date of Birth</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["first_name"] . "</td>";
                                                    echo "<td>" . $row["last_name"] . "</td>";
                                                    echo "<td>" . date('F j, Y', strtotime($row['dob'])) . "</td>";

                                                    // Grab ID
                                                    $thisID = $row['ID'];
                                                    // check if it is a patient
                                                    $sql = "SELECT * FROM patients WHERE patient_ID='$thisID'";
                                                    $patient = mysqli_query($conn, $sql);
                                                    $sql = "SELECT * FROM doctors WHERE doctor_ID='$thisID';";
                                                    $doctor = mysqli_query($conn, $sql);
                                                    if ($patient->num_rows == 1) {
                                                        // grab username
                                                        $patientRow = $patient->fetch_assoc();
                                                        echo "<td><a id='editLink' href='patientInfo.php?id=$patientRow[patient_ID]&username=$patientRow[username]'>Edit</a></td>";
                                                        echo "<td><a id='deleteLink' href='deleteUser.php?id=$patientRow[patient_ID]&username=$patientRow[username]'>Delete</a></td>";
                                                    } else {
                                                        $doctorRow = $doctor->fetch_assoc();
                                                        echo "<td><a id='editLink' href='doctorInfo.php?id=$doctorRow[doctor_ID]&username=$doctorRow[username]'>Edit</a></td>";
                                                        echo "<td><a id='deleteLink' href='deleteUser.php?id=$doctorRow[doctor_ID]&username=$doctorRow[username]'>Delete</a></td>";
                                                    }
                                                }
                                                ?>
                                                <!-- TODO: Make an info modal -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    </div>
                </div>
        <?php
                            } else {
                                echo '<div class="card p-4"><h4>No results found.</h4></div>';
                            }
                        }
        ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>