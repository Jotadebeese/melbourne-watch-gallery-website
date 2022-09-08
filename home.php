<?php
   include("dbconnection.php");
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
    <div class="main_container">
        <header class="top">
            <img alt="Company logo" class="logo" src="images/logo.jpg">
            <p>Melbourne Watch Gallery</p>
        </header>

        <div class="content_container">
            <div class="products_container">
                <?php 
                $result = mysqli_query($conn, "SELECT product_id, product_brand, image_1, product_name, price FROM products");
                if($result == true){
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "
                        <div class='item'>
                            <a href='product.php?product_id=$row[product_id]'>
                                <img 
                                    alt='Image of a smartwatch' 
                                    class='watch_img' 
                                    src='$row[image_1]'
                                >
                            </a>
                            <p>$row[product_brand]</p>
                            <a href='product.php?product_id=$row[product_id]''>
                                <p class='product_name'>$row[product_name]</p>
                            </a>
                            <p>A$<span class='price'>$row[price].00</span></p>
                            <button onclick='addToCard(this)' class='cart_button'>Add to Cart&nbsp;&nbsp;<i class='fa fa-shopping-cart'></i></button>
                        </div>
                        ";
                    }
                }else{
                    echo "Error in selecting data...";
                }

                ?>
                
            </div>
        </div>
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