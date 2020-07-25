<?php
    require "../../function/connection.php";   
    require "../../function/helper.php";   
     
    $userId = $_GET['user_id'];
	// ambil data dari form
    $name = $_POST['name'];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$level = $_POST["level"];
	$status = $_POST["status"];	

	mysqli_query($conn, "UPDATE user SET nama='$name',
											   email='$email',
											   phone='$phone',
											   alamat='$address',
											   level='$level',
											   status='$status'
											   WHERE user_id='$userId'");

    header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
?>