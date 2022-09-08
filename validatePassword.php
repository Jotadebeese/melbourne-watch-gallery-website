<?php

    include("dbconnection.php");
    extract($_POST);

    $hashedPassword = md5($password);

    $query = "select * from users where username = '$username' and password = '$hashedPassword'";
    $result = mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn) === 1){
        session_start();
        $_SESSION['username'] = $username;
        header("Location:management.php");

    }else{
        header("Location:management_login.php?message='Wrong Username or Password.'");
    }

?>