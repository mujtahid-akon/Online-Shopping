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

</div>
<div class="home">
 	<?php echo anchor('inventory_controller/load_inventory_order_view', 'New Orders');?>
</div>
<div class="home">
 	<?php echo anchor('inventory_controller/prev_inventory_order', 'Previous Orders');?>
</div>
<div class="home">
 	<?php echo anchor('inventory_controller', 'Home');?>
</div>

</body>
</html>