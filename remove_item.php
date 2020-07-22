<?php

    require "function/helper.php";

    session_start();
    // menangkap variabel barangId yg dikirim url
    $productId = $_GET['product_id'];
    // keluarkan variabel shopping_cart dari session shoppingCart
    $shoppingCart = $_SESSION['shopping_cart'];
    
    // hapus array yang ada di dalam variabel cart berdasarkan productId
    unset($shoppingCart[$productId]);

    // save lagi sessionnya
    $_SESSION['shopping_cart'] = $shoppingCart;

    // kembali ke halaman cart
    header("location:" . BASE_URL ."index.php?page=cart");