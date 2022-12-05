<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>

    <!-- Get patient Information -->
    <?php
    include "../connect_server.php";
    if (isset($_GET['id']) && isset($_GET['username'])) {

        $thisID = $_GET['id'];
        $thisUsername = $_GET['username'];

        $sql = "SELECT * FROM personal_info WHERE ID=$thisID";

        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_array($result)) {
            $thisFirstName = $row['first_name'];
            $thisLastName = $row['last_name'];
            $thisDOB = $row['dob'];
            $thisEmail = $row['email'];
            $thisPhoneNumber = $row['phone_number'];
            $thisSex = $row['sex'];
            $thisGender = $row['gender'];
        } else {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    ?>

    <div class="container-fluid">
        <?php include "sideNavBar.php" ?>
        <div class="col py-3">
            <h1><?php echo $thisUsername ?></h1>

            <?php include "patientPersonalInfo.php" ?>
            <br>
            <!-- display table of appointments -->
            <div class="card">
                <div class="card-body">
                    <h3>Appointments</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Appointment_ID</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT * FROM appointments WHERE user_ID=$thisID";

                            $result = mysqli_query($conn, $sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><th scope='row'>$row[appointment_ID]</th>";
                                echo "<td>$row[start_date_time]</td>";
                                echo "<td>$row[end_date_time]</td>";
                                echo "<td><a id='editLink' href='patientAppointments.php?id=$row[appointment_ID]'>Edit</a></td>";
                                echo "<td><a id='deleteLink' href='deleteAppointment.php?id=$row[appointment_ID]'>Delete</a></td>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PREGNANCIES -->
            <div class="card">
                <div class="card-body">
                    <h3>Pregnancies</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Due Date</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT * FROM pregnancies WHERE patient_ID=$thisID";

                            $result = mysqli_query($conn, $sql);
                            while($row = $result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>$row[due_date]</td>";
                                echo "<td><a id='editLink' href='patientPregnancies.php?id=$row[patient_ID]&dueDate=$row[due_date]'>Edit</a></td>";
                                echo "<td><a id='deleteLink' href='deletePregnancies.php?id=$row[patient_ID]&dueDate=$row[due_date]'>Delete</a></td>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- MEDICATIONS -->
            <div class="card">
                <div class="card-body">
                    <h3>Medication</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Med_ID</th>
                                <th scope="col">med_name</th>
                                <th scope="col">med_start_date</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT * FROM medication WHERE med_patientID='$thisID'";

                            $result = mysqli_query($conn, $sql);
                            while($row = $result->fetch_assoc()){
                                echo "<tr><th scope='row'>$row[med_patientID]</th>";
                                echo "<td>$row[med_name]</td>";
                                echo "<td>$row[med_start_date]</td>";
                                echo "<td><a id='editLink' href='patientMedication.php?id=$row[med_patientID]'>Edit</a></td>";
                                echo "<td><a id='deleteLink' href='deleteMedication.php?id=$row[med_patientID]'>Delete</a></td>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>