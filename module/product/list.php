<div id="frame-add">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=product&action=form"; ?>" class="tombol-action">+ Add Product</a>
</div>

<?php
	$query = mysqli_query($conn, "SELECT * FROM barang");
	
	if(mysqli_num_rows($query) == 0){
		echo "<h3>Sorry no product in the product table</h3>";
	}else{
	
		echo "<table class='table-list'>";
		
		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
                <th class='kiri'>Product</th>
                <th class='kiri'>Price</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			 </tr>";
			 
		$no=1;
		while($row=mysqli_fetch_assoc($query)){
			
			echo "<tr>
					<td class='kolom-nomor'>$no</td>
                    <td class='kiri'>$row[barang]</td>
                    <td class='kiri'>$row[harga]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=product&action=form&product_id=$row[barang_id]'>Edit</a>
					</td>
				  </tr>";
				  
			$no++;
		}
		
		echo "</table>";
	
	}

?>