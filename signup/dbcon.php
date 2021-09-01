<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "signup";

    $con = mysqli_connect($server, $username ,$password,$db);

    if($con){
       
?>
<script>
  alert("Connection Successful");
</script>

<?php
}
else{
  
die("Connection to the database failed due to ". mysqli_connect_error());
}
?>
