<?php
   include("dbconnection.php");
   session_start();
    if(!isset($_SESSION['username'])){
        header("Location:management_login.php");   
    }else{
        
        extract($_POST);

        $query = "UPDATE products  set product_brand = '$product_brand', product_name = '$product_name', overview = '$overview', model_no = '$model_no', price = '$price', image_1 = '$image_1', image_2 = '$image_2', image_3 = '$image_3', image_4 = '$image_4' where product_id = $product_id";

        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) === 1){
            $msg = "Product Updated successfully";
        }else{
            $msg = "Error in Updatting New Product";
        }
        header("Location:management.php?message=$msg");
    }
?>