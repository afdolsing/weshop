<?php
session_start();
require "function/helper.php";
require "function/connection.php";
// cek apakah variabel page ada di url
$page = isset($_GET['page']) ? $_GET['page'] : false;
$categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : false;
// keluarkan session user
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$name = isset($_SESSION['name']) ? $_SESSION['name'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
// tambahkan ke keranjang
$shoppingCart = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : array();
// hitung total belanja
$totalShopping = count($shoppingCart);  



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weshop | the online shop</title>
    <link rel="stylesheet" href="<?= BASE_URL . "css/style.css" ?>">
    <link rel="stylesheet" href="<?= BASE_URL . "css/banner.css" ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slidesjs/3.0/jquery.slides.min.js"></script>
</head>

<body>
    <div id="container">
        <div id="header">
            <a href="<?= BASE_URL . "index.php" ?>">
                <img src="<?= BASE_URL . "images/logo.png" ?>">
            </a>
            <div id="menu">
                <div id="user">
                    <?php 
                        if($userId){
                            echo "Hi <b>$name</b>, <a href='" . BASE_URL . "index.php?page=my_profile&module=orders&action=list'>My Profile</a>";
                            echo "<a href='". BASE_URL . "logout.php'>Logout</a>";
                        }else{
                            echo "<a href='". BASE_URL . "index.php?page=login'>Login</a>";
                            echo "<a href='". BASE_URL . "index.php?page=register'>Register</a>";
                        }
                    ?>                  
                </div>
                <a href="<?= BASE_URL . "index.php?page=cart" ?>" id="btn-chart">
                    <img src="<?= BASE_URL . "images/cart.png" ?>">
                    <?php
                        if($totalShopping != 0){
                            echo "<span class='total-shopping'>$totalShopping</span>";
                        }
                    ?>
                </a>
            </div>
        </div>
        <div id="content">
            <?php
                // ambil content page dari url. misal : login, register, my_profile dll
                $fileName = "$page.php";
                // cek file. jika ada atau nilai 1 , include kan
                if(file_exists($fileName)){
                    include($fileName);
                }else{
                    include("main.php");
                }
            ?>
        </div>
        <div id="footer">
            <p>copyright &copy; afdolsing</p>
        </div>
    </div>
</body>
<script>
		$(function() {
			$('#slides').slidesjs({
				height: 350,
				play: { auto : true,
					    interval : 3000
					  },
				navigation : false
			});
		});
		</script>		
		

</html>