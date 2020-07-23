<?php
    if($totalShopping == 0){
        echo "<h3> Shopping cart is empty</h3>";
    }else{
        $no = 1;
        echo "<table class='table-list'>
                <tr class='baris-title'>
                    <th class='tengah'>No</th>
                    <th class='kiri'>Image</th>
                    <th class='kiri'>Product Name</th>
                    <th class='tengah'>Qty</th>
                    <th class='kanan'>Price</th>
                    <th class='kanan'>Total</th>
                </tr>";

        $subtotal = 0;
        // keluarkan data-data dari dalam 		
		foreach($shoppingCart AS $key => $value){
			$productId = $key;
			
			$productName = $value["product_name"];
			$quantity = $value["quantity"];
			$image = $value["image"];
            $price = $value["price"];
            
			$total = $quantity;
			if($total > 0){
				$total = $quantity * $price;
			}else if($total < 1 || $total = null){
				$total = 0;
			}
				
            $subtotal = $subtotal + $total;
			
			echo "<tr>
					<td class='tengah'>$no</td>
					<td class='kiri'><img src='".BASE_URL."images/products/$image' height='100px' /></td>
					<td class='kiri'>$productName</td>
					<td class='tengah'><input type='number' name='$productId' value='$quantity' class='update-quantity' /></td>
					<td class='kanan'>".rupiah($price)."</td>
					<td class='kanan hapus_item'>".rupiah($total)." <a href='".BASE_URL."cart_remove_item.php?product_id=$productId'>X</a></td>
				</tr>";
				
            $no++;
        }
		echo "<tr>
				<td colspan='5' class='kanan'><b>Sub Total</b></td>
				<td class='kanan'><b>".rupiah($subtotal)."</b></td>
			  </tr>";
		
		echo "</table>";
	
		echo "<div id='frame-button-keranjang'>
				<a id='lanjut-belanja' href='".BASE_URL."index.php'>Shopping Again</a>
				<a id='lanjut-pemesanan' href='".BASE_URL."index.php?page=order'>Next Order</a>
			  </div>";

    }

?>

<script>
	$(".update-quantity").on("input", function(e){
		let productId = $(this).attr("name");
		let value = $(this).val();
		
		$.ajax({
			method: "POST",
			url: "cart_update_quantity.php",
			data: "product_id="+productId+"&value="+value
		})
		.done(function(data){
			location.reload();
		});
		
	});
</script>