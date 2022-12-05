<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin: Patients</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <?php include "sideNavBar.php"; ?>

        <div class="col py-3">
            <h1>Patients</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">patient_ID</th>
                        <th scope="col">username</th>
                        <th scope="col">first_name</th>
                        <th scope="col">last_name</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>
                    </tr>

                <tbody>
                    <?php

                    include "../connect_server.php";

                    $sql = "SELECT * FROM patients";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr><th scope='row'>$row[patient_ID]</th>";
                        echo "<td>$row[username]</td>";

                        // get the patient's first and last name
                        $sql = "SELECT first_name, last_name FROM personal_info WHERE ID='$row[patient_ID]';";
                        $patient = mysqli_query($conn, $sql);
                        $patientRow = mysqli_fetch_assoc($patient);

                        echo"<td>$patientRow[first_name]</td>";
                        echo "<td>$patientRow[last_name]</td>";
                        echo "<td><a id='editLink' href='patientInfo.php?id=$row[patient_ID]&username=$row[username]'>Edit</a></td>";
                        echo "<td><a id='deleteLink' href='deleteUser.php?id=$row[patient_ID]&username=$row[username]'>Delete</a></td>";
                    }

                    ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>