<?php
session_start(); 
if(!isset($_SESSION['username'])){
    echo "You are logged out!";
    header('location: signup.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <form>
            
        </form>
        
    </div>
</body>
</html>