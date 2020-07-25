<div id="frame-add">
	<a href="<?php echo BASE_URL."index.php?page=my_profile&module=category&action=form"; ?>" class="tombol-action">+ Add category</a>
</div>

<?php
	$queryCategory = mysqli_query($conn, "SELECT * FROM kategori");
	
	if(mysqli_num_rows($queryCategory) == 0){
		echo "<h3>Sorry no category name in the category table</h3>";
	}else{
	
		echo "<table class='table-list'>";
		
		echo "<tr class='baris-title'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Category</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			 </tr>";
			 
		$no=1;
		while($row=mysqli_fetch_assoc($queryCategory)){
			
			echo "<tr>
					<td class='kolom-nomor'>$no</td>
					<td class='kiri'>$row[kategori]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=category&action=form&category_id=$row[kategori_id]'>Edit</a>
					</td>
				  </tr>";
				  
			$no++;
		}
		echo "</table>";
	}
?>