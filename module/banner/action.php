<?php
    require "../../function/connection.php";   
    require "../../function/helper.php";   
    
    // ambil data dari form
    $banner = $_POST['banner'];
    $link = $_POST['link'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $editImage = "";
    
    // jika file ada isinya
    if($_FILES["file"]["name"] != "")
    {
        $fileName = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], "../../images/slide/" . $fileName);
         
        $editImage  = ", gambar='$fileName'";
    }
     
    if($button == "Add")
    {
        mysqli_query($conn, "INSERT INTO banner (banner, link, gambar, status) 
                            VALUES ('$banner', '$link', '$fileName', '$status')");
    }
    elseif($button == "Update")
    {
	    $bannerId = $_GET['banner_id'];
		
        mysqli_query($conn, "UPDATE banner SET banner='$banner',
                                        link='$link',
                                        status='$status'
										$editImage WHERE banner_id='$bannerId'");
    }
     
     
    header("location: ".BASE_URL."index.php?page=my_profile&module=banner&action=list");
?>