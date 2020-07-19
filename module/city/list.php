<div id="frame-add">
	<a class="tombol-action" href="<?php echo BASE_URL."index.php?page=my_profile&module=city&action=form"; ?>">+ Tambah Kota</a>
</div>

<?php

	$queryCity = mysqli_query($conn, "SELECT * FROM kota ORDER BY kota ASC");
	
	if(mysqli_num_rows($queryCity) == 0){
		echo "<h3>No city in the database.</h3>";
	}
	else{
		echo "<table class='table-list'>";
		
			echo "<tr class='baris-title'>
					<th class='kolom-nomor'>No</th>
					<th class='kiri'>City</th>
					<th class='kiri'>Rates</th>
					<th class='tengah'>Status</th>
					<th class='tengah'>Action</th>
				 </tr>";
				 
			$no = 1;
			while($rowCity=mysqli_fetch_assoc($queryCity)){
				echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td>$rowCity[kota]</td>
						<td>".rupiah($rowCity['tarif'])."</td>
						<td class='tengah'>$rowCity[status]</td>
						<td class='tengah'>
							<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=city&action=form&city_id=$rowCity[kota_id]"."'>Edit</a>
						</td>
					 </tr>";
				
				$no++;
			}
		
		echo "</table>";
	}
?>