<?php
    require("function/connection.php");
    include("function/helper.php");

    session_start();

    $recipientName = $_POST['recipient_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    $userId = $_SESSION['user_id'];
    $timeNow = date("Y-m-d H:i:s");

    // buat query untuk memasukan data kedalam invoice / faktur
    $query = mysqli_query($conn, "INSERT INTO pesanan SET
                            nama_penerima = '$recipientName',
                            user_id = '$userId',
                            nomor_telepon = '$phone',
                            kota_id = '$city',
                            alamat = '$address',
                            tanggal_pemesanan = '$timeNow',
                            status = '0'");
    // jika query sudah selesai
    if($query){
        // keluarkan id nya.
        // variabel lastOrderId akan menyimpan id yang terakhir dati tabel pesanan di database
        $lastOrderId = mysqli_insert_id($conn);

        $shoppingCart = $_SESSION['shopping_cart'];

        // keluarkan seluruh array nya
        foreach($shoppingCart AS $key => $value){
            $productId = $key;
			$quantity = $value['quantity'];
			$price = $value['price'];
			
			mysqli_query($conn, "INSERT INTO pesanan_detail(pesanan_id, barang_id, quantity, harga)
												   VALUES ('$lastOrderId', '$productId', '$quantity', '$price')");
        }

        // hapus session keranjang jika sudah selesai semua
        unset($_SESSION["shopping_cart"]);
		
		header("location:".BASE_URL."index.php?page=my_profile&module=order&action=detail&order_id=$lastOrderId");
    }
?>
