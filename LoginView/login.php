<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../images/baby-newborn.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Sign in</h3>
                            <?php
                                if(isset($_GET['err'])){
                                echo '<p style="color: red;">',$_GET['err'],'</p>';
                                }
                            ?>

                            <form action="loginPHP.php" method="post">
                                <div class="form-outline mb-4">
                                    <label for="username">
                                        Username
                                    </label>
                                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg"
                                        placeholder="Enter Username" name="username" required>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">
                                        Password
                                    </label>
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                                        placeholder="Enter Password" name="password" required>
                                </div>

                                <div class="col mb-2 mr-sm-2">
                                    <label class="form-check-label" for="inlineFormCheck">
                                        I am a Doctor 
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="inlineFormCheck" name="doctor">
                                </div>
                                <!-- Checkbox -->

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                
                            </form>
                            <div class="container">
                                Don't have an account? <a href="../RegisterView/register.php">Sign Up</a>
            
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>