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
    <div class="container-fluid">
        <?php include "sideNavBar.php" ?>
        <div class="col py-3">
            <div class="card">
                <div class="card-body">

                    <?php
                    include "../connect_server.php";
                    if (isset($_GET['id']) && isset($_GET['dueDate'])) {
                        $thisDueDate = $_GET['dueDate'];
                        $thisID =$_GET['id'];
                        $sql = "SELECT * FROM pregnancies WHERE patient_ID='$thisID' AND due_date='$thisDueDate';";

                        $result = mysqli_query($conn, $sql);
                        $row = $result->fetch_assoc();

                        $dueDate = $row['due_date'];
                        $babySex = $row['baby_sex'];
                    } else {
                        echo "didn't get ID";
                    }
                    ?>

                    <h3>Pregnancy <?php echo $dueDate ?></h3>
                    <form action="sendPatientPregnancies.php" method="post">
                        <input type="hidden" id="due_date" name="oldDueDate" value="<?php echo $thisDueDate ?>">
                        <input type="hidden" id="id" name="thisID" value="<?php echo $thisID ?>">


                        <div class='row'>
                            <div class='col-md-6 mb-4'>
                                <div class='form-outline'>
                                    <label class='form-label' for='start_time'>Due Date</label>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" type='text' id='dueDate' class='form-control form-control-lg' name='dueDate' placeholder='<?php echo $dueDate ?>'>
                                </div>
                            </div>
                            <div class='col-md-6 mb-4'>
                                <div class='form-outline'>
                                    <label class='form-label' for='end_time'>Baby's Sex</label>
                                    <input type='text' id='babySex' class='form-control form-control-lg' name='babySex' placeholder='<?php echo $babySex ?>'>
                                </div>
                                <?php
                                if (isset($_GET['babyerr'])) {
                                    echo '<p style="color: red;">', $_GET['babyerr'], '</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class='personal-info-footer'>
                            <input class='btn btn-primary' type='submit' value='submit'>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>