<?php
session_start();
include("function/helper.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$name = isset($_SESSION['name']) ? $_SESSION['name'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weshop | the online shop</title>
    <link rel="stylesheet" href="<?= BASE_URL . "css/style.css" ?>">
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
                        if($user_id){
                            echo "Hi <b>$name</b>, <a href='" . BASE_URL . "index.php?page=my_profile&module=order&action=list'>My Profile</a>";
                        }else{
                            echo "<a href='". BASE_URL . "index.php?page=login'>Login</a>";
                            echo "<a href='". BASE_URL . "index.php?page=register'>Register</a>";
                        }
                    ?>                  
                </div>
                <a href="<?= BASE_URL . "index.php?page=cart" ?>" id="btn-chart">
                    <img src="<?= BASE_URL . "images/cart.png" ?>">
                </a>
            </div>
        </div>
        <div id="content">
            <?php 
            $filename = "$page.php";

            if(file_exists($filename)){
                include($filename);
            }else{
                echo "page not found";
            }
            ?>
        </div>
        <div id="footer">
            <p>copyright &copy; afdolsing</p>
        </div>
    </div>
</body>

</html>