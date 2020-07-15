<?php
include("function/helper.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weshop | the online shop</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <a href="<?= BASE_URL . "index.php" ?>">
                <img src="<?= BASE_URL . "images/logo.png" ?>">
            </a>
            <div class="menu">
                <div class="user">
                    <a href="<?= BASE_URL . "index.php?page=login" ?>">Login</a>
                    <a href="<?= BASE_URL . "index.php?page=register" ?>">Register</a>
                </div>
                <a href="<?= BASE_URL . "index.php?page=cart" ?>">
                    <img src="<?= BASE_URL . "images/cart.png" ?>">
                </a>
            </div>
        </div>
        <div class="content"></div>
        <div class="footer">
            <p>copyright &copy; afdolsing</p>
        </div>
    </div>
</body>

</html>