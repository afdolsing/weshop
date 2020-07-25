<?php
    require "../../function/connection.php";   
    require "../../function/helper.php";      
	
	// ambil data dari form
    $city = $_POST['city'];
    $rates = $_POST['rates'];
    $status = $_POST['status'];
    $button = $_POST['button'];
	
	if($button == "Add"){
		mysqli_query($conn, "INSERT INTO kota (kota, tarif, status) 
								VALUES('$city', '$rates', '$status')");
	}
	else if($button == "Update"){
		$cityId = $_GET['city_id'];
		
		mysqli_query($conn, "UPDATE kota SET kota='$city',
												tarif='$rates',
												status='$status' WHERE kota_id='$cityId'");
	}
	
	header("location:" .BASE_URL."index.php?page=my_profile&module=city&action=list");