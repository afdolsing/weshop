<?php
	// ambil order_id dari url
	$orderId= $_GET["order_id"];
	// ambil data2 pesanan dari 3 tabel sekaligus
	$query = mysqli_query($conn, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif 
                                    FROM pesanan 
                                    JOIN user ON pesanan.user_id=user.user_id 
                                    JOIN kota ON kota.kota_id=pesanan.kota_id 
                                    WHERE pesanan.pesanan_id='$orderId'");
	// keluarkan data
	$row=mysqli_fetch_assoc($query);
	// ambil dari tabel pesanan
	$orderDate = $row['tanggal_pemesanan'];
	$recipientName = $row['nama_penerima'];
	$phone = $row['nomor_telepon'];
	$address = $row['alamat'];
    // ambil dari tabel user
    $orderName = $row['nama'];
    // ambil dari tabel kota
    $city = $row['kota'];
    $rates = $row['tarif'];
	
?>

<div id="frame-faktur">

	<h3><center>Detail Order</center></h3>
	
	<hr/>
	
	<table>
	
		<tr>
			<td>Invoice Number</td>
			<td>:</td>
			<td><?php echo $orderId; ?></td>
		</tr>
		<tr>
			<td>Order Name</td>
			<td>:</td>
			<td><?php echo $orderName; ?></td>
		</tr>
		<tr>
			<td>Recipient Name</td>
			<td>:</td>
			<td><?php echo $recipientName; ?></td>
		</tr>
		<tr>
			<td>Address</td>
			<td>:</td>
			<td><?php echo $address; ?></td>
		</tr>
		<tr>
			<td>Phone Number</td>
			<td>:</td>
			<td><?php echo $phone; ?></td>
		</tr>		
		<tr>
			<td>Order Date</td>
			<td>:</td>
			<td><?php echo $orderDate; ?></td>
		</tr>		
	</table>	
</div>

<table class="table-list">
	
		<tr class="baris-title">
			<th class="no">No</th>
			<th class="kiri">Product Name</th>
			<th class="tengah">Qty</th>
			<th class="kanan">Unit Price</th>
			<th class="kanan">Total</th>
		</tr>
		
		<?php
		
			$queryDetail = mysqli_query($conn, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$orderId'");
			
			$no = 1;
			$subtotal = 0;
			while($rowDetail=mysqli_fetch_assoc($queryDetail)){
			
				$total = $rowDetail["harga"] * $rowDetail["quantity"];
				$subtotal = $subtotal + $total;
				
				echo "<tr>
						<td class='no'>$no</td>
						<td class='kiri'>$rowDetail[nama_barang]</td>
						<td class='tengah'>$rowDetail[quantity]</td>
						<td class='kanan'>".rupiah($rowDetail["harga"])."</td>
						<td class='kanan'>".rupiah($total)."</td>
					  </tr>";
				
				$no++;
			}
		
			$subtotal = $subtotal + $rates;
		?>
		
		<tr>
			<td class="kanan" colspan="4">Shipping Cost</td>
			<td class="kanan"><?php echo rupiah($rates); ?></td>
		</tr>

		<tr>
			<td class="kanan" colspan="4"><b>Sub total</b></td>
			<td class="kanan"><b><?php echo rupiah($subtotal); ?></b></td>
		</tr>
		
	</table>
	
	<div id="frame-keterangan-pembayaran">
		<p>Please make payment to the ABC bank<br/>
		   Account Number : 0000-9999-8888 (A/N Weshop).<br/>
		   After make payment, next please confirm on 
		   <a href="<?php echo BASE_URL."index.php?page=my_profile&module=orders&action=payment_confirm&order_id=$orderId"?>">This</a>.
		</p>
	</div>