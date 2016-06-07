<!DOCTYPE html>

<html lang= "en">
<head>
	<meta http-equiv="Content-Type" content= "text/html; charset=utf-8">
	<base href="<?php echo base_url();?>" />
	<link rel="stylesheet" href="css/table.css">
	<title>order Vouchar</title>
</head>
<body>
	<div class="vouchar">
	<h2>Order Vouchar</h2>
	<div class="vouchar_details">
		<?php 
			echo "Name: ".$customer_name_addr[0]->c_name.'<br>';
			echo "Address: ".$customer_name_addr[0]->c_address.'<br>';
			
		?>
		<div class="o_status"><?php echo "Order Status:  ";?></div>
		<div class="status"><?php echo $order_status[0]->o_status?></div>
	</div>
	<div class="o_date">
		<?php 
			echo "Date: ".$order_date[0]->ORDER_DATE."<br>";
		?>	
	</div>
	<hr>
	<div class="">
		<?php 
			echo $product_table.'<hr>';
			// echo "Total: ".$order_price[0]->grand_total."<br>";
			// echo "Total: " ;
			// $grand_total=0;
			// foreach ($order_details->result() as $row) {
			// 	$grand_total+= $row->Price;
			// }
			// echo $grand_total;
		?>
		<div class="o_total"><?php echo "Total: ".$order_price[0]->grand_total." Taka<br>";?></div>
	</div>
	<a href="<?php echo site_url('database_controller') ?>">Home</a>
	</div>
</body>
</html>