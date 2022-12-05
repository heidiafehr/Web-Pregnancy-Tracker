<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="card">
        <div class="card-body">
            <h3>Personal Information</h3>
            <form action="sendPatientPersonalInfo.php" method="POST">
                <input type="hidden" id="oldUsername" name="oldUsername" value="<?php echo $thisUsername ?>">
                <input type="hidden" id="oldID" name="oldID" value="<?php echo $thisID ?>">

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="newUsername">username</label>
                            <input type="text" id="newUsername" class="form-control form-control-lg" name="newUsername" placeholder="<?php echo $thisUsername ?>">
                            <?php
                            if (isset($_GET['unamerr'])) {
                                echo '<p style="color: red;">', $_GET['unamerr'], '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="firstName">First Name</label>
                            <input type="text" id="newfirstName" class="form-control form-control-lg" name="newfirstName" placeholder="<?php echo $row['first_name'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Last Name</label>
                            <input type="text" id="newlastName" class="form-control form-control-lg" name="newlastName" placeholder="<?php echo $row['last_name'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="dob">DOB</label>
                            <input onfocus="(this.type='date')" onblur="(this.type='text')" type="text" id="newdob" class="form-control form-control-lg" name="newdob" placeholder="<?php echo $row['dob'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="sex">Sex</label>
                            <input type="text" id="newsex" class="form-control form-control-lg" name="newsex" placeholder="<?php echo $row['sex'] ?>">
                            <?php
                            if (isset($_GET['sexerr'])) {
                                echo '<p style="color: red;">', $_GET['sexerr'], '</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="gender">Gender</label>
                            <input type="text" id="newgender" class="form-control form-control-lg" name="newgender" placeholder="<?php echo $row['gender'] ?>">
                            <?php
                            if (isset($_GET['gendererr'])) {
                                echo '<p style="color: red;">', $_GET['gendererr'], '</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" id="newemail" class="form-control form-control-lg" name="newemail" placeholder="<?php echo $row['email'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <input type="text" id="newphoneNumber" class="form-control form-control-lg" name="newphoneNumber" placeholder="<?php echo $row['phone_number'] ?>">
                        </div>
                    </div>
                </div>
                <div class="personal-info-footer">
                    <input class="btn btn-primary" type="submit" value="submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>