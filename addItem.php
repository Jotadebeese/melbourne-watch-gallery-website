<?php
   include("dbconnection.php");
   session_start();
    if(!isset($_SESSION['username'])){
        header("Location:management_login.php");   
    }else{
        
        extract($_POST);

        $query = "INSERT into products (product_brand, product_name, overview, model_no, price, image_1, image_2, image_3, image_4) values ('$product_brand', '$product_name', '$overview', '$model_no', '$price', '$image_1', '$image_2', '$image_3', '$image_4')";

        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) === 1){
            $msg = "Product Added successfully";
        }else{
            $msg = "Error in Adding New Product";
        }
        header("Location:management.php?message=$msg");
    }
?>