<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <script src="<?php echo base_url();?>js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>css/insert_outlet_style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/animate.min.css">
  <script type="text/javascript" src="<?php echo base_url();?>js/jsapi"></script>

</head>
<body>


<div class="outlet_insert animated pulse reduce_width">
  <div class="inner_outlet_insert reduce_padding">
     <h1>Choose Amount</h1>




<form action="http://localhost/ci/index.php/needed_product_controller/needed_product_order" method="post" accept-charset="utf-8">
<input type="hidden" name="PRODUCT_ID" value="<?php echo $product_id; ?>" />
<input type="hidden" name="OUTLET_ID" value="<?php echo $outlet_id; ?>" />
<label>NEEDED QUANTITY:</label>
<input type="text" name="QUANTITY" value=20  />
<input class="submit_marign" type="submit" name="submit" value="Send Order"  />


    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
