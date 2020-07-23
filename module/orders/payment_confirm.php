<?php

    $orderId = $_GET["order_id"];

?>

<table class="table-list">

	<form action="<?php echo BASE_URL."module/orders/action.php?order_id=$orderId"; ?>" method="POST">
	
		<div class="element-form">
			<label>Account Number</label>
			<span><input type="text" name="account_number" /></span>
		</div>	

		<div class="element-form">
			<label>Account Name</label>
			<span><input type="text" name="account_name" /></span>
		</div>		
	
		<div class="element-form">
			<label>Transfer Date (format: yyyy-mm-dd)</label>
			<span><input type="text" name="transfer_date" /></span>
		</div>	

		<div class="element-form">
			<span><input type="submit" value="Confirm" name="button" /></span>
		</div>		
	
	</form>

</table>