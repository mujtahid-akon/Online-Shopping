<!DOCTYPE html>

<html lang= "en">

<head>
	<meta http-equiv="Content-Type" content= "text/html; charset=utf-8">
	<link rel="stylesheet" href="<?php echo base_url();?>css/table.css">
	<title>Total orders summery</title>
	<base href = "<?php echo site_url('site');?>/">

</head>
<body>
	<div class="vouchar">
	<a href="<?php echo site_url('database_controller') ?>">Home</a>
	<h2>Previous Orders</h2>
	<div class="view_order">
	<?php
		if($order_details!=null)
		{
			foreach($order_details as $row)
		    {
		    	echo $row->ORDER_DATE." <a href = 'view_specific_order/$row->ORDER_ID' >&nbsp&nbspView Order</a><br>";
		    }
		}
		else
		{
			echo 'No Order found!<br>';
		}
		// print_r($order_details);
	?>
	</div>
	
	</div>
</body>
</html>