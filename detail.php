<div id="left">
    <?php 
        echo category($categoryId);
    ?>
</div>
<div id="right">
    <?php 
        $productId = $_GET['product_id'];
        $query = mysqli_query($conn, "SELECT * FROM barang 
                            WHERE barang_id = '$productId'
                            AND status = 'on' ");
        $row = mysqli_fetch_assoc($query);

		echo "<div id='detail-product'>
					<h2>$row[nama_barang]</h2>
					<div id='frame-image'>
						<img src='".BASE_URL."images/products/$row[gambar]' />
					</div>
					<div id='frame-price'>
						<span>".rupiah($row['harga'])."</span>
						<a href='".BASE_URL."add_cart.php?product_id=$row[barang_id]'>+ add to cart</a>
					</div>
					<div id='caption'>
						<b>Spesifikasi : </b> $row[spesifikasi]
					</div>
				</div>";		
    ?>
</div>