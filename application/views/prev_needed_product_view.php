<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>/css/database_style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/delete_sub_cat_style.css">
  <script type="text/javascript" src="<?php echo base_url();?>/js/jsapi"></script>
    
</head>
<body>

<div class="outer_div">
<h2 class="head_2">Products that were ordered</h2>
<?php if(isset($records)): foreach ($records as $row): ?>
	<div class="delet_row">
		<div class="right_div">
			<div class="name"><?php echo "Needed Product : ".$row->PRODUCT_NAME; ?></div>
			<div class="name"><?php echo "Current Amount: ".$row->PRODUCT_IN_STOCK; ?></div>

			<!-- <form action="http://localhost/ci/index.php/needed_product_controller/needed_product_order" method="post" accept-charset="utf-8">	
			<label>NEEDED QUANTITY:</label>
			<input type="text" name="QUANTITY" value=20  />
			<input type="hidden" name="PRODUCT_ID" value="<?php  echo $row->PRODUCT_ID ;?>" />
			<input type="hidden" name="OUTLET_ID" value="<?php  echo $row->OUTLET_ID ;?>" />
			<input class="submit_marign" type="submit" name="submit" value="SEND ORDER"  /> -->
		</div>	
	</div>


<?php endforeach ?>


<?php else: ?>

<h2>No records were returned</h2>
<?php endif; ?>
</div>
<div class="home">
 	<?php echo anchor('update_database_controller', 'Home');?>
</div>

</body>
</html>