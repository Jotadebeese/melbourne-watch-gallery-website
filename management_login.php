<?php
   include("dbconnection.php");
   session_start();
    if(isset($_SESSION['username'])){
        header("Location:management.php");   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melbourne Watch Gallery</title>
    
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>.alert{font-size:0.8em;background: rgb(255, 248, 251);padding:10px 30px 10px 30px;border-radius: 5px;-webkit-transition: 0.5s;transition: 0.5s;}</style>
</head>

<body>
    <div class="menu">
        <a href="home.php"><p>Melbourne Watch Gallery</p></a>
        <a href="about.php"><p>About Us</p></a>
        <a href="management_login.php"><p>Product Management</p></a>

        <form class="getting" method="get">
            <input type="text" placeholder="Search.." name="search" id="search">
            <label for="search" id="search_label">Search text box</label>
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="car_drop">
            <button class="cart"><i class="fa fa-shopping-cart"></i></button>
        </div>

    </div>

    <div class="managementContainer">
        <header class="top">
            <img alt="Company logo" class="logo" src="images/logo.jpg">
            <p>Melbourne Watch Gallery</p>
        </header>
        
        <form class="loginContainer" action="validatePassword.php" method="post">
            <?php
            if(isset($_GET['message'])){
                echo "<p class='alert'>" . $_GET['message'] . "</p>";
            }
            ?>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
        
    </div>
</body>