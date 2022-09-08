<?php
   include("dbconnection.php");
   session_start();
    if(!isset($_SESSION['username'])){
        header("Location:management_login.php");   
    }
    $query = "select product_id, product_name, price, product_brand, overview, model_no, image_1, image_2, image_3, image_4 from products where product_id = " . $_GET["product_id"] ;
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
    <style>
        .addContainer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding-top: 100px;
            
        }
        .addContainer input[type=text], .loginContainer input[type=number] {
            padding: 10px;
            border: solid 1px rgb(72, 72, 72);
            border-radius: 5px;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            background-color: rgb(255, 255, 255);
            outline: none;
            width: 700px;
        }

        .addContainer input[type=text]:focus, .loginContainer input[type=number]:focus {
            border: solid 1px rgb(240, 161, 102);
        }

        .addContainer input[type=submit] {
            padding: 10px;
            width: 200px;
            background: rgb(255, 230, 241);
            border: none;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 0.8em;
            cursor: pointer;
        }

        textarea {
            width:700px;
        }

        .tittle {
            font-size: 1.5em;
            text-align: center;
            padding: 100px 0 200px 0;
        }
    </style>
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
        <?php
            echo "<p>" . $_SESSION['username'] . "</p>";
        ?>
        <a href="logout.php"><p>Log Out</p></a>

    </div>

    <div class="managementContainer">
        <header class="top">
            <img alt="Company logo" class="logo" src="images/logo.jpg">
            <p>Melbourne Watch Gallery</p>
        </header>

        <p class="tittle">Product Management System - Edit Product</p>

            <form  class="addContainer" action="update.php" method="post">
                <input name="product_id" type="text" id="product_id" hidden <?php echo "value='$row[product_id]'";?>/>
                <label for="product_brand">Product Brand:</label><br>
                <input <?php echo "value='$row[product_brand]'";?> type="text" id="product_brand" name="product_brand" required><br>
                <label for="product_name">Product Name:</label><br>
                <input <?php echo "value='$row[product_name]'";?> type="text" id="product_name" name="product_name" required><br>
                <label for="overview">Overview:</label><br>
                <textarea rows = "20" id="overview" name = "overview"><?php echo "$row[overview]";?></textarea><br>
                <label for="model_no">Model:</label><br>
                <input <?php echo "value='$row[model_no]'";?> type="text" id="model_no" name="model_no" required><br>
                <label for="price">Price:</label><br>
                <input <?php echo "value='$row[price]'";?> type="number" id="price" name="price" required><br>
                <label for="image_1">Image 1:</label><br>
                <input <?php echo "value='$row[image_1]'";?> type="text" id="image_1" name="image_1" required><br>
                <label for="image_2">Image 2:</label><br>
                <input <?php echo "value='$row[image_2]'";?> type="text" id="image_2" name="image_2" required><br>
                <label for="image_3">Image 3:</label><br>
                <input <?php echo "value='$row[image_3]'";?> type="text" id="image_3" name="image_3" required><br>
                <label for="image_4">Image 4:</label><br>
                <input <?php echo "value='$row[image_4]'";?> type="text" id="image_4" name="image_4" required><br>
                
                

                <input type="submit" value="Save Changes">
            </form>
        
        
    </div>
</body>