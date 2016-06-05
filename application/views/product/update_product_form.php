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
     <h1>Update Product</h1>




<form action="http://localhost/ci/index.php/update_database_controller/now_update_product" method="post" accept-charset="utf-8">
<label>PRODUCT_ID:</label>
<input type="text" name="PRODUCT_ID" value="<?php echo $sub->PRODUCT_ID; ?>"  readonly/>
<label>OUTLET ID:</label>
<input type="text" name="OUTLET_ID" value="<?php echo $sub->OUTLET_ID; ?>"  readonly/>
<label>CATEGORY ID:</label>
<input type="text" name="CATEGORY_ID" value="<?php echo $sub->CATEGORY_ID;  ?>"  readonly/>
<label>SUB CATEGORY ID:</label>
<input type="text" name="SUB_CAT_ID" value= "<?php echo $sub->SUB_CAT_ID; ?>"  readonly/>
<label>PRODUCT NAME:</label>
<input type="text" name="PRODUCT_NAME" value= "<?php echo $sub->PRODUCT_NAME; ?>"  />
<label>UNIT QUANTITY:</label>
<input type="text" name="UNIT_QUANTITY" value="<?php  echo $sub->UNIT_QUANTITY ;?>"  />
<label>BUY UNIT PRICE:</label>
<input type="text" name="BUY_UNIT_PRICE" value="<?php echo $sub->BUY_UNIT_PRICE  ;?>"  />
<label>SELL UNIT PRICE:</label>
<input type="text" name="SELL_UNIT_PRICE" value="<?php  echo $sub->SELL_UNIT_PRICE ;?>"  />
<label>DESCRIPTOIN:</label>
<input type="text" name="DESCRIPTION" value="<?php echo $sub->DESCRIPTION  ;?> " />
<label>PRODUCT IN STOCK:</label>
<input type="text" name="PRODUCT_IN_STOCK" value="<?php echo $sub->PRODUCT_IN_STOCK  ;?>" />
<label>PRODUCT VENDOR:</label>
<input type="text" name="PRODUCT_VENDOR" value="<?php echo $sub->PRODUCT_VENDOR  ;?>" />
<label>RATING:</label>
<input type="text" name="RATING" value="<?php echo $sub->RATING  ;?>"  />
<label>IMAGE:</label>
<input type="text" name="IMAGE" value="<?php  echo $sub->IMAGE ;?>"  />
<input class="submit_marign" type="submit" name="submit" value="UPDATE"  />


    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
