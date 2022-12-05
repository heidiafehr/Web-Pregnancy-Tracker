<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="../images/baby-newborn.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100 gradient-custom" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3>Patient Registration Form</h3>
                            <p>If you are a Doctor, please contact your administrator to be added to the system.</p>
                            <?php
                            if (isset($_GET['err'])) {
                                echo '<p style="color: red;">', $_GET['err'], '</p>';
                            }
                            ?>

                            <form action="registerPHP.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">First Name</label>
                                            <input type="text" id="firstName" class="form-control form-control-lg" name="firstName" required>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">Last Name</label>
                                            <input type="text" id="lastName" class="form-control form-control-lg" name="lastName" required>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label">Birthday</label>
                                            <input type="date" class="form-control form-control-lg" id="birthdayDate" name="dob" required>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <h6 class="mb-2 pb-1">Sex</h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="femaleGender" value="F" name="female" checked>
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="maleGender" value="M" name="male">
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="maleGender" value="I" name="male">
                                            <label class="form-check-label" for="maleGender">Intersex</label>
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4 pb-2">
                                        <h6 class="mb-2 pb-1">Gender</h6>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Woman" checked>
                                            <label class="form-check-label" for="femaleGender">Woman</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Man">
                                            <label class="form-check-label" for="maleGender">Man</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="otherGender" value="Other">
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">Email</label>
                                            <input type="email" id="emailAddress" class="form-control form-control-lg" name="email" required>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="phoneNumber">Phone Number</label>
                                            <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="phoneNumber" required>
                                        </div>

                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" id="username" class="form-control form-control-lg" name="username" required>
                                        </div>
                                        <?php
                                        if (isset($_GET['unameerr'])) {
                                            echo '<p style="color: red;">', $_GET['unameerr'], '</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control form-control-lg" name="password" required>
                                        </div>
                                    </div>
                                </div>



                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>