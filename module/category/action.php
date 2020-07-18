<?php
    include("../../function/connection.php");   
    include("../../function/helper.php");   
     
    $category = $_POST['category'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    
	if($button == "Add"){
		mysqli_query($conn, "INSERT INTO kategori (kategori, status) VALUES('$category', '$status')");
	}
	else if($button == "Update"){
        $categoryId = $_GET['category_id'];
        
		mysqli_query($conn, "UPDATE kategori 
                SET kategori='$category',
					status='$status' 
                WHERE kategori_id='$categoryId'");
	}
	
	header("location:" .BASE_URL."index.php?page=my_profile&module=category&action=list");