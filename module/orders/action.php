<?php

	require "../../function/connection.php";
	require "../../function/helper.php";
	
	session_start();
	
	$orderId = $_GET['order_id'];
	$button = $_POST['button'];
	
	if($button == "Confirm"){
	
        $userId = $_SESSION["user_id"];
		$accountNumber = $_POST['account_number'];
		$accountName = $_POST['account_name'];
		$transferDate = $_POST['transfer_date'];
		
		$queryPayment = mysqli_query($conn, "INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer)
																        VALUES ('$orderId', '$accountNumber', '$accountName', '$transferDate')");
																			
		if($queryPayment){
			mysqli_query($conn, "UPDATE pesanan SET status='1' WHERE pesanan_id='$orderId'");
		}
		
	}else if($button == "Edit Status"){
		$status = $_POST["status"];
		
		mysqli_query($conn, "UPDATE pesanan SET status='$status' WHERE pesanan_id='$orderId'");
		
		if($status == "2"){
			$query = mysqli_query($conn, "SELECT * FROM pesanan_detail WHERE pesanan_id='$orderId'");
			while($row=mysqli_fetch_assoc($query)){
				$productId = $row["barang_id"];
				$quantity = $row["quantity"];
				
				mysqli_query($conn, "UPDATE barang SET stok=stok-$quantity WHERE barang_id='$productId'");
			}
		}
	}
	
	header("location:".BASE_URL."index.php?page=my_profile&module=orders&action=list");