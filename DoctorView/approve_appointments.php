<?php
include '../connect_server.php'; 

//getting appointment date
$sql =  "SELECT personal_info.first_name, personal_info.last_name, appointments.start_date_time, appointments.end_date_time, appointments.approved, appointments.appointment_ID FROM personal_info
            INNER JOIN appointments ON appointments.user_ID = personal_info.ID
            INNER JOIN patients ON appointments.user_ID = patients.patient_ID
            INNER JOIN doctors ON doctors.doctor_ID = $_SESSION[doctor_ID]
            WHERE appointments.approved = 0
            ORDER BY appointments.start_date_time, personal_info.first_name ASC";

$result = $conn->query($sql);

if($result->num_rows > 0){
    echo '<div class="card mb-3">
    <div class="card-header d-flex justify-content-between py-3">
        <div class="header-title">
            <h3>Approve Appointments</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="container">';
    echo "<div class='table-responsive m-4'>";
    echo "<table class='table table-bordered table-hover'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th scope='col'>First Name</th>";
    echo "<th scope='col'>Last Name</th>";
    echo "<th scope='col'>Appointment Date</th>";
    echo "<th scope='col'>Appointment Time</th>";
    echo "<th scope='col'>Approve</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()){
        $startDateTime = explode('T', $row['start_date_time']);
        $endDateTime = explode('T', $row['end_date_time']);

        //Remove any appointments that have already passed based on time
        if($startDateTime[0] < date('Y-m-d')){
            if($startDateTime[1] < date('H:i:s')){
                continue;
            }
        }

        echo "<tr>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . date('F j, Y', strtotime($startDateTime[0])) . "</td>";
        echo "<td>" . date('g:i a', strtotime($startDateTime[1])) . " - " . date('g:i a', strtotime($endDateTime[1])). "</td>";
        echo "<td><a href='approve.php?id=$row[appointment_ID]'>Approve</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}
echo '</div>
</div>
</div>
</div>';
?>