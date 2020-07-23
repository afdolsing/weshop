<?php
    // karena file add_cart ini berdiri sendiri, tidak berada dalam index.php maka untuk koneksi membutuhkan file koneksi
    require "function/connection.php";
    require "function/helper.php";
    // file add_cart terpanggil dari file main.php & detail.php

    session_start();
    // tangkap productId yang dikirim melalui url
    $productId = $_GET['product_id'];
    $shoppingCart = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : false;

    $query = mysqli_query($conn, "SELECT * FROM barang WHERE barang_id ='$productId'");
    // ambil data query database jadikan  dalam bentuk array
    $row = mysqli_fetch_assoc($query);

    // tambahkan product baru
    $shoppingCart[$productId] = array(
                                "product_name" => $row['nama_barang'],
                                "image" => $row['gambar'],
                                "price" => $row['harga'],
                                "quantity" => 1 );
    // simpan array dalam session
    $_SESSION['shopping_cart'] = $shoppingCart;

    header("location:" . BASE_URL);
?>