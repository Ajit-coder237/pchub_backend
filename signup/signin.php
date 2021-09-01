<?php


  // if(isset($_POST['login']))
  // {
  //     $email = $_POST['email'];
  //     $password = $_POST['password'];

  //     $email_search = " SELECT * from registration where registration.email ='$email'  ";
  //     $query = mysqli_query($con,$email_search);
  //     $email_count = mysqli_num_rows($query);
  //     if($email_count){
  //         $email_pass = mysqli_fetch_assoc($query);
  //         $db_pass = $email_pass['password'];
  //         $_SESSION['username'] = $email_pass['username'];
  //         $pass_decode = password_verify($password, $db_pass);

  //         if($pass_decode){
  //             echo "Login successful";
  //             ?>
  //             <script>
  //                 location.replace("home.php");
  //             </script>
  //         <?php 
  //         }
  //         else{
  //             echo "Invalid Password";
  //         }

  //     }
  //     else{
  //         echo "Invalid Email";
  //     }

  // }


?>

<?php  
if(isset($_POST['submit']))
  {
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $email =  mysqli_real_escape_string($con,$_POST['email']);
    $password =  mysqli_real_escape_string($con,$_POST['password']);
    $cpassword =  mysqli_real_escape_string($con,$_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);
    $email_search = " SELECT * FROM registration WHERE registration.email ='$email'  ";
    $query = mysqli_query($con,$email_search);
    $email_count = mysqli_num_rows($query);
    if($email_count>0)
    {
      ?>
      <script>
      alert("Email already exists");
      </script>

      <?php
    }
    else{
      if($password === $cpassword){
       
        $insertquery = "INSERT INTO registration(username,  emaipassword, cpassword) VALUES('$username'.'$email'.'$pass'.'$cpass');";

       $iquery = mysqli_query($con,$insertquery);

        if($iquery){
          ?>
          <script>
          alert("Inserted Successfully");
          </script>

          <?php
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
  