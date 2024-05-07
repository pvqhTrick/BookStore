<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" type="text/css" href="assets/css/stylee.css">
    <script src="https://kit.fontawesome.com/2bb969d6a4.js" crossorigin="anonymous"></script>

    <!--slick slider-->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>


</head>

<body>

    <div class="navbar">
        <div class="logo">
            <img src="assets/logo.png" alt="Logo">
        </div>
        <div class="nav-links">
            <a href="#">Trang chủ</a>
            <a href="#">Sách</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="auth">
            <?php

            session_start();
            if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
                echo "<p>Hello, " . $_SESSION["username"] . "!</p>";
                echo '<a href="logout.php">Logout</a>';
            } else {
                echo '<a href="login.php">Login</a>';
                echo '<p><a href="register.php">Register</a></p>';
            }
            ?>
        </div>
        
        <div class="fav-button">
            <a href="favorite.php"> <i class="fa fa-heart"></i> Favorite (0)</a>
        </div>


        <?php
            // Đếm số sản phẩm trong giỏ hàng
            $cartItemCount = isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0;
        ?>
        <div class="cart-button">
            <a href="cart.php"> <i class="fa fa-cart-shopping"></i> Cart (<?php echo $cartItemCount; ?>)</a>
        </div>
    </div>