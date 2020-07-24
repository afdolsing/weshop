<?php

	$orderId = $_GET["order_id"];

	$query = mysqli_query($conn, "SELECT status FROM pesanan WHERE pesanan_id='$orderId'");
	$row=mysqli_fetch_assoc($query);
	$status = $row['status'];
	
?>
<form action="<?php echo BASE_URL."module/orders/action.php?order_id=$orderId"; ?>" method="POST">
	 
	<div class="element-form">
		<label>Orders Id (Faktur Id)</label>
		<!-- agar nomor order tidak diubah2 tambahkan readonly=true     -->
		<span><input type="text" value="<?php echo $orderId; ?>" name="pesanan_id" readonly="true" /></span>
	</div>  

	<div class="element-form">
		<label>Status</label>
		<span>
			<select name="status">
				<?php
					// ambil arrayOrderStatus dari file helper.php
					foreach($arrayOrderStatus AS $key => $value){
						if($status == $key){
							echo "<option value='$key' selected='true'>$value</option>";
						}
						else{
							echo "<option value='$key'>$value</option>";
						}
					}
				?>
			</select>
		</span>
	</div>	
	
	<div class="element-form">
		<span><input class="tombol-action" type="submit" value="Edit Status" name="button" /></span>
	</div>	
	
</form>  