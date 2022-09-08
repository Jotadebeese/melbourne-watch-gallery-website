<?php
    include("dbconnection.php");
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:management_login.php");   
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

    <style>
        .alert{font-size:0.8em;background: rgb(255, 248, 251);padding:10px 30px 10px 30px;border-radius: 5px;-webkit-transition: 0.5s;transition: 0.5s;}
        
        img {
            max-width:200px;
            width: 100%;
        }

        table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
        }

        thead th:nth-child(1) {
            width: 10%;
        }

        thead th:nth-child(2) {
            width: 20%;
        }

        thead th:nth-child(3) {
            width: 30%;
        }

        thead th:nth-child(4) {
            width: 10%;
        }

        thead th:nth-child(5) {
            width: 30%;
        }

        th, td {
            padding: 20px;
        }

        tbody td {
            text-align: center;
        }

        .tittle {
            font-size: 1.5em;
            text-align: center;
            padding: 100px 0 200px 0;
        }

        .managementContainer {
            padding-bottom: 200px;
        }
    </style>

</head>

<body>
    <div class="menu">
        <a href="home.php"><p>Melbourne Watch Gallery</p></a>
        <a href="about.php"><p>About Us</p></a>
        <a href="addproduct.php"><p>Add New Product</p></a>
        
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
        <p class="tittle">Product Management System</p>
        <?php
            if(isset($_GET['message'])){
                echo "<p class='alert'>" . $_GET['message'] . "</p>";
            }
            ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
        $result = mysqli_query($conn, "SELECT product_id, image_1, product_name, price FROM products");
        if($result == true){
            while($row = mysqli_fetch_array($result))
            {
                echo "
                <tr>
                <th>$row[product_id]</th>
                <td class = 'table_img'>
                    <img class = 'table_img'
                    src='$row[image_1]'
                    />
                </td>
                <td>$row[product_name]</td>
                <td>$row[price].00</td>
                <td><a href='edit.php?product_id=$row[product_id]'>Edit</a> ,<a href='delete.php?product_id=$row[product_id]'>Delete</a>, <a href='product.php?product_id=$row[product_id]'>Preview</a></td>
                </tr>
                ";
            }
        }else{
            echo "Error in selecting data...";
        }
        ?>
            </tbody>
        </table>
    </div>

</body>