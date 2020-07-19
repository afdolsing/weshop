<?php

	$cityId = isset($_GET['city_id']) ? $_GET['city_id'] : false;
	
	$city = "";
	$rates = "";
	$status = "";
	$button = "Add";

	if($cityId){
		$queryCity = mysqli_query($conn, "SELECT * FROM kota WHERE kota_id='$cityId'");
		$row=mysqli_fetch_assoc($queryCity);
		
		$city = $row['kota'];
		$rates = $row['tarif'];
		$status = $row['status'];
		
		$button = "Update";
	}
		
?>		
<form action="<?php echo BASE_URL."module/city/action.php?city_id=$cityId"?>" method="POST">

	<div class="element-form">
		<label>Kota</label>	
		<span><input type="text" name="city" value="<?= $city ?>" /></span>
	</div>		

	<div class="element-form">
		<label>Tarif</label>	
		<span><input type="text" name="rates" value="<?= $rates ?>" /></span>
	</div>		

	<div class="element-form">
		<label>Status</label>	
		<span>
			<input type="radio" name="status" value="on" <?php if($status == "on"){ echo "checked"; } ?> /> On
			<input type="radio" name="status" value="off" <?php if($status == "off"){ echo "checked"; } ?> /> Off
		</span>
	</div>		
	
	<div class="element-form">
		<span><input type="submit" name="button" value="<?= $button ?>" class="submit-my-profile" /></span>
	</div>		

</form>		