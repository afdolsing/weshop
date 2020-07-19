<?php
    include("../../function/connection.php");   
    include("../../function/helper.php");   
    
    	// ambil data dari form
    $productName = $_POST['product_name'];
    $categoryId   = $_POST['category_id'];
    $specification = $_POST['specification'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $updateImage = "";
    $button = $_POST['button'];

    // jika file image TIDAK kosong alias ADA
    if(!empty($_FILES['file_image']['name'])){
        $fileName = $_FILES['file_image']['name'];
        // pindahkan file ke folder
        move_uploaded_file($_FILES['file_image']['tmp_name'], "../../images/products/".$fileName);

        $updateImage = ", gambar='$fileName'";
    }
    
	if($button == "Add"){
		mysqli_query($conn, "INSERT INTO barang SET 
                            nama_barang = '$productName',
                            kategori_id = '$categoryId',
                            spesifikasi = '$specification',
                            gambar = '$fileName',
                            harga = '$price',
                            stok = '$stock',
                            status = '$status'");
	} else if($button == "Update"){
        $productId = $_GET['product_id'];
        
        mysqli_query($conn, "UPDATE barang SET 
                            nama_barang = '$productName',
                            kategori_id = '$categoryId',
                            spesifikasi = '$specification',
                            harga = '$price',
                            stok = '$stock',
                            status = '$status'
                            $updateImage
                            WHERE barang_id = '$productId'");
	}
	
    header("location:" .BASE_URL."index.php?page=my_profile&module=product&action=list");