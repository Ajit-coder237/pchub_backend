<?php
    session_start();
?>

    <?php
    include 'dbcon.php';
    include 'register.html';
    
    if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $email =  mysqli_real_escape_string($con,$_POST['email']);
        $password =  mysqli_real_escape_string($con,$_POST['password']);
        $cpassword =  mysqli_real_escape_string($con,$_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $emailquery = " select * registration where email = '$email' ";
        $query = mysqli_query($con,$emailquery);
        $emailcount = mysqli_num_rows($query);
        if($emailcount > 0)
        {
            echo "Email already exists";
        }
        else{
            if($pass === $cpass){
                $insertquery = " insert into registration(username, email,password, cpassword) values('$username'.'$email'.'$pass'.'$cpass') ";

                $iquery = mysqli_query($con,$insertquery);

                if($con->query($insertquery == true)){
                    echo "Inserted successful";
                }
                else{
                    echo "Error during insertion";
                }
            }
            else{
                ?>
                    <script>
                        alert("Password are not matching");
                    </script>

                <?php
            }
        }

    }
    ?>
