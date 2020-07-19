<?php
      
    $userId = isset($_GET['user_id']) ? $_GET['user_id'] : "";
      
	$button = "Update";
	$queryUser = mysqli_query($conn, "SELECT * FROM user WHERE user_id='$userId'");
	 
	$row=mysqli_fetch_array($queryUser);
	  
	$name = $row["nama"];
	$email = $row["email"];
	$phone = $row["phone"];
	$address = $row["alamat"];
	$status = $row["status"];
	$level = $row["level"];
?>
<form action="<?php echo BASE_URL."module/user/action.php?user_id=$userId"?>" method="POST">
	  
	<div class="element-form">
		<label>Fullname</label>	
		<span><input type="text" name="name" value="<?= $name ?>" /></span>
	</div>	

	<div class="element-form">
		<label>Email</label>	
		<span><input type="text" name="email" value="<?= $email ?>" /></span>
	</div>		

	<div class="element-form">
		<label>Phone</label>	
		<span><input type="text" name="phone" value="<?= $phone ?>" /></span>
	</div>	

	<div class="element-form">
		<label>Address</label>	
		<span><input type="text" name="address" value="<?= $address ?>" /></span>
	</div>		

	<div class="element-form">
		<label>Level</label>	
		<span>
			<input type="radio" value="superadmin" name="level" <?php if($level == "superadmin"){ echo "checked"; } ?> /> Superadmin
			<input type="radio" value="customer" name="level" <?php if($level == "customer"){ echo "checked"; } ?> /> Customer			
		</span>
	</div>	

	<div class="element-form">
		<label>Status</label>	
		<span>
			<input type="radio" value="on" name="status" <?php if($status == "on"){ echo "checked"; } ?> /> on
			<input type="radio" value="off" name="status" <?php if($status == "off"){ echo "checked"; } ?> /> off		
		</span>
	</div>		
	  
	<div class="element-form">
		<span><input type="submit" name="button" value="<?= $button ?>" class="submit-my-profile" /></span>
	</div>	
</form>