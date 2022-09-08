<?php
   include("dbconnection.php");
   session_start();
    if(!isset($_SESSION['username'])){
        header("Location:management_login.php");   
    }else{
        
        $query = "DELETE from products  where product_id = " . $_GET["product_id"] ;

        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) === 1){
            $msg = "Product Delated successfully";
        }else{
            $msg = "Error in Updatting New Product";
        }
        header("Location:management.php?message=$msg");
    }
?>