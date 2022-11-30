    <?php 

        if(!empty($_POST['username']) && !empty($_POST['password'])){
            echo "username: $_POST[username] <br> password:$_POST[password]";

            include("../connect_server.php");

            $uname = $_POST['username'];
            $psw = $_POST['password'];
    
            $sql = "SELECT * FROM users WHERE username='$uname' AND `password`='$psw';";
    
            $result = mysqli_query($conn, $sql);
    
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
            if(sizeof($users)==1){

                $sql = "SELECT * FROM patients WHERE username='$uname';";
                $resultUser = mysqli_query($conn, $sql);

                $patient = mysqli_fetch_all($resultUser, MYSQLI_ASSOC);

                if(sizeof($patient)==1){
                    session_start();
                    $_SESSION = $users[0]['username'];
                    $_SESSION = $patient[0]['patient_ID'];
                    header("Location: ../PatientView/patientHome.html");
                    echo "Found a user!";
                }else{
                    header("Location: login.html?err= There is no record of this patient. If you are a doctor, please go to Doctor Login below");
                }
    
                
            }else{
                echo "smth went wrong";
                header("Location: login.html?err= Oops looks like wrong username/password. Please check for typos and try again.");
            }
        }
        
    ?>