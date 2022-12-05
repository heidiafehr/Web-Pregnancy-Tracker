<!DOCTYPE html>
<html lang="en">

<head>
    <title>asdf</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <?php include "sideNavBar.php"; ?>

        <div class="col py-3">
            <div class="card">
                <div class="card-body">
                    <?php 
                    if (isset($_GET['status'])){
                        echo '<p>Success! You have created a new Doctor head over to the Doctors table to see it!</p>';
                    }
                    ?>
                    <h3>Create a new Doctor</h3>
                    <form action="setNewDoctor.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" id="username" class="form-control form-control-lg"
                                        name="username" placeholder="Enter Username" required>
                                    <?php
                                    if (isset($_GET['unamerr'])) {
                                        echo '<p style="color: red;">', $_GET['unamerr'], '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control form-control-lg"
                                        name="password" placeholder="Enter Password" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="firstname">First Name</label>
                                    <input type="text" id="firstname" class="form-control form-control-lg"
                                        name="firstname" placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="lastname">Last Name</label>
                                    <input type="text" id="lastname" class="form-control form-control-lg"
                                        name="lastname" placeholder="Enter Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="dob">DOB</label>
                                    <input type="date" id="dob" class="form-control form-control-lg" name="dob" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6 class="mb-2 pb-1">Sex</h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="femaleGender" value="F"
                                        name="female" checked>
                                    <label class="form-check-label" for="femaleGender">Female</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="maleGender" value="M"
                                        name="male">
                                    <label class="form-check-label" for="maleGender">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="maleGender" value="I"
                                        name="male">
                                    <label class="form-check-label" for="maleGender">Intersex</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6 class="mb-2 pb-1">Gender</h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                        value="Woman" checked>
                                    <label class="form-check-label" for="femaleGender">Woman</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                        value="Man">
                                    <label class="form-check-label" for="maleGender">Man</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="otherGender"
                                        value="Other">
                                    <label class="form-check-label" for="otherGender">Other</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="email" class="form-control form-control-lg"
                                        name="email" placeholder="Enter Email" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="phonenumber">Phone Number</label>
                                    <input type="text" id="phonenumber" class="form-control form-control-lg"
                                        name="phonenumber" placeholder="Enter Phone Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="personal-info-footer">
                            <input class="btn btn-primary" type="submit" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>