<?php
	if($userId == false){
		// set session
		$_SESSION["process_order"] = true;
		
		header("location: ".BASE_URL."index.php?page=login");
		exit;
	}
?>

<div id="frame-data-pengiriman">

	<h3 class="label-data-pengiriman">Shipping Address</h3>
	
	<div id="frame-form-pengiriman">
	
		<form action="<?php echo BASE_URL."order_process.php"; ?>" method="POST">
		
			<div class="element-form">
				<label>Recipient Name</label>
				<span><input type="text" name="recipient_name" /></span>
			</div>		

			<div class="element-form">
				<label>Phone</label>
				<span><input type="text" name="phone" /></span>
			</div>		
			
			<div class="element-form">
				<label>Address</label>
				<span><textarea name="address"></textarea></span>
			</div>			
			
			<div class="element-form">
				<label>City</label>
				<span>
					<select name="city">
						<?php
							$query = mysqli_query($conn, "SELECT * FROM kota");
							
							while($row=mysqli_fetch_assoc($query)){
								echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
							}
						?>
					</select>
				</span>
			</div>			

			<div class="element-form">
				<span><input type="submit" value="submit" /></span>
			</div>			
			
		</form>
	</div>
</div>

<div id="frame-data-detail">
	<h3 class="label-data-pengiriman">Detail Order</h3>
	
	<div id="frame-detail-order">
		
		<table class="table-list">
			<tr>
				<th class='kiri'>Product Name</th>
				<th class='tengah'>Qty</th>
				<th class='kanan'>Total</th>
			</tr>
			
			<?php
				$subtotal = 0;
				foreach($shoppingCart AS $key => $value){
					
					$productId = $key;
					
					$productName = $value['product_name'];
					$price = $value['price'];
					$quantity = $value['quantity'];
					
					$total = $quantity * $price;
					$subtotal = $subtotal + $total;
					
					echo "<tr>
							<td class='kiri'>$productName</td>
							<td class='tengah'>$quantity</td>
							<td class='kanan'>".rupiah($total)."</td>
						</tr>";
				}
				echo "<tr>
						<td colspan='2' class='kanan'><b>Sub Total</b></td>
						<td class='kanan'><b>".rupiah($subtotal)."</b></td>
					 </tr>";				
				
			?>
			
		</table>
		
	</div>
</div>