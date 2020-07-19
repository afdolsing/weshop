<?php
       
    $bannerId = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
       
    $banner = "";
    $link = "";
    $image = "";
	$caption = "";
    $status = "";
       
    $button = "Add";
	
	// jika banner id tidak kosong alias Ada
    if($bannerId != "")
    {
        $button = "Update";
		
        $queryBanner = mysqli_query($conn, "SELECT * FROM banner WHERE banner_id='$bannerId'");
        $row=mysqli_fetch_array($queryBanner);
           
		$banner = $row["banner"];
		$link = $row["link"];
		$image = "<img src='". BASE_URL."images/slide/$row[gambar]' style='width: 200px;vertical-align: middle;' />";
		$iamge = "(click 'Choose Image' if you want change the image)";
		$status = $row["status"];
    }   
?>

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$bannerId"?>" method="post" enctype="multipart/form-data">
	
	<div class="element-form">
		<label>Banner</label>	
		<span><input type="text" name="banner" value="<?= $banner ?>" /></span>
	</div>	

	<div class="element-form">
		<label>Link</label>	
		<span><input type="text" name="link" value="<?= $link ?>" /></span>
	</div>	   

	<div class="element-form">
		<label>Image <?= $caption; ?></label>	
		<span><input type="file" name="file" /><?= $image ?></span>
	</div>	  

	<div class="element-form">
		<label>Status</label>	
		<span>
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> Off		
		</span>
	</div>	   
	   
	<div class="element-form">
		<span><input type="submit" name="button" value="<?= $button ?>" class="submit-my-profile" /></span>
	</div>	
</form>