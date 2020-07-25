<?php
    session_start();

    $shoppingCart = $_SESSION['shopping_cart'];
    $productId = $_POST['product_id'];
    $value = $_POST['value'];

    $shoppingCart[$productId]['quantity'] = $value;
    $_SESSION['shopping_cart'] = $shoppingCart;