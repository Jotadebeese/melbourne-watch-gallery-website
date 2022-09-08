<?php
    include("dbconnection.php");
    $query = "select product_name, price, product_brand, overview, model_no, image_1, image_2, image_3, image_4 from products where product_id = " . $_GET["product_id"] ;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
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

    <script src="mainScript.js"></script>

</head>

<body onload="updateCard()">
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
    <div class="temp2">
        <header class="top">
            <img alt="Company logo" class="logo" src="images/logo.jpg">
            <p>Melbourne Watch Gallery</p>
        </header>
            <?php

            echo"
            <div class='pics_container'>
                <img alt='Image of a snartwatch' class='main_watch_img main_img' src='$row[image_1]'>
                <img onmouseover='changeImg(this)' alt='Image of a snartwatch' class='watch_thumb thumb1' src='$row[image_2]'>
                <img onmouseover='changeImg(this)' alt='Image of a snartwatch' class='watch_thumb thumb2' src='$row[image_1]'>
                <img onmouseover='changeImg(this)' alt='Image of a snartwatch' class='watch_thumb thumb3' src='$row[image_3]'>
                <img onmouseover='changeImg(this)' alt='Image of a snartwatch' class='watch_thumb thumb4' src='$row[image_4]'>
            </div>
            <div class='information_container'>
                <p class='product_description'>$row[product_brand]</p>
                <p class='product_name'>$row[product_name]</p>
                <p class='prodcut_model'>Model: $row[model_no]</p>
                <p>A$<span class='price'>$row[price].00</span></p>
                <button onclick='addToCard2(this)' class='cart'><i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;Add to Cart</button>
                <p class='product_overview'>Product Overview</p>
                <p class='text_description'>$row[overview]</p>
            </div>
            ";
            ?>
            <div class="shopping_cart">
                <p class="cart_title">Shopping Cart</p>
                <div class="cart_items">
                    
                </div>
                <div class="total_cart_list">
                    <p class="total_cart">Total</p>
                    <p class="total_cart">A$<span id="total_amount">0</span></p>
                </div>
                <button onclick="window.location.href='management.html';" class="checkout">Checkout <span id="itemsCount" class="badge">0</span></button>
            </div>
    </div>
</body>