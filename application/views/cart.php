<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/cart.css">


  <script src="<?php echo base_url();?>/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>/css/database_style.css">
  <script type="text/javascript" src="<?php echo base_url();?>/js/jsapi"></script>
    
</head>
<body>

<div class="cart">
	<div class="times"><i class="fa fa-times"></i></div>
	<div class="left_cart">
		<div class="check">
			<i class="fa fa-check"></i>
			<div class="cart_success">Product successfully added to your shopping cart</div>
		</div>
		<div class="cart_product">
			<div class="cart_image">images</div>
			<div class="desc">
				 Mauris blandit vehicula </br>
				 Black, S</br>
				 Quantity 4</br>
				 Total $568.00</br>
			</div>
		</div>
	</div>
	<div class="right_cart">

			
		<div class="prompt">There are 8 items in your cart. </div> 	
		<div class="total">
			 Total products (tax excl.) $1,031.00</br>
			 Total shipping (tax excl.) $2.00</br>
			 Total (tax excl.) $1,033.00
		</div>
		<div class="cart_btn">
			<button type="button" class="btn btn-success"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Continue shopping</button>
			<button type="button" class="btn btn-success">Proceed to checkout&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
		</div>
	</div>
</div>

</body>
</html>
