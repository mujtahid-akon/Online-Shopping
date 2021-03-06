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
  <link rel="stylesheet" href="<?php echo base_url();?>css/insert_sub_category_style.css">

  <link rel="stylesheet" href="<?php echo base_url();?>css/animate.min.css">


  <script type="text/javascript" src="<?php echo base_url();?>js/jsapi"></script>
  <script>
    var getSubCategory = function(cat_id){
      $.ajax({
        type: 'get',
        url: 'auto_retrieve_sub_category_info',
        data: 'category=' + cat_id,
        success: function(response){
          var sub_cat = JSON.parse(response);
          $("#sub_cat").html("<option value='' disabled selected class='select_item'>Select SUB_CATEGORY Name</option>");
          if (sub_cat.hasOwnProperty('0')){
            for ( var i =0; i < sub_cat.length; i++){
              $("#sub_cat").append("<option value='"+sub_cat[i].SUB_CAT_ID+"' class='select_item'>"+sub_cat[i].NAME+"</option>");
            }
          }
        }
      });
    };
  </script>

</head>
<body>


<div class="outlet_insert animated pulse">
  <div class="inner_outlet_insert">
     <h1>Insert a Product</h1>
      
         <?php if(isset($error) && $error == 'FALSE'):?>
            <h2 style="color:red;">Please select from dropdown carefully</h2>
          <?php endif ?>

    <form action="http://localhost/ci/index.php/insert_database_controller/create_product" method="post" accept-charset="utf-8">

    <select  name="OUTLET_ID"  >
      <!-- <option value="" selected class="select_item">Select  OUTLET Name</option> -->
      <option value="" selected class="select_item">Select Outlet Name</option>
      <?php if(isset($outlet)): foreach ($outlet as $row): ?>
        <option value=<?php echo $row->OUTLET_ID; ?> class="select_item"><?php echo $row->OUTLET_NAME; ?></option>
      <?php endforeach ?>
      <?php endif; ?>
    </select>

    <select  name="CATEGORY_ID"  onchange="getSubCategory(this.value);">
      <option value="" selected class="select_item">Select CATEGORY Name</option>
      <?php if(isset($category)): foreach ($category as $row): ?>
        <option value=<?php echo $row->CATEGORY_ID; ?> class="select_item"><?php echo $row->CATEGORY_NAME; ?></option>
      <?php endforeach ?>
      <?php endif; ?>
    </select>

    <select name="SUB_CAT_ID" id="sub_cat" >
      <option value="" selected disabled class="select_item">Select  SUB_CATEGORY Name</option>
    </select>


    <input type="text" name="PRODUCT_NAME" value="<?php echo set_value('PRODUCT_NAME', 'PRODUCT_NAME'); ?>"  />
    <input type="text" name="UNIT_QUANTITY" value="<?php echo set_value('UNIT_QUANTITY', 'UNIT_QUANTITY'); ?>"  />
    <input type="text" name="BUY_UNIT_PRICE" value="<?php echo set_value('BUY_UNIT_PRICE', 'BUY_UNIT_PRICE'); ?>"  />
    <input type="text" name="SELL_UNIT_PRICE" value="<?php echo set_value('SELL_UNIT_PRICE', 'SELL_UNIT_PRICE'); ?>"  />
    <input type="text" name="DESCRIPTION" value="<?php echo set_value('DESCRIPTION', 'DESCRIPTION'); ?>"  />
    <input type="text" name="PRODUCT_IN_STOCK" value="<?php echo set_value('PRODUCT_IN_STOCK', 'PRODUCT_IN_STOCK'); ?>"  />
    <input type="text" name="PRODUCT_VENDOR" value="<?php echo set_value('PRODUCT_VENDOR', 'PRODUCT_VENDOR'); ?>"  />
    <input type="text" name="RATING" value="<?php echo set_value('RATING', 'RATING'); ?>"  />
    <input type="text" name="IMAGE" value="<?php echo set_value('IMAGE', 'IMAGE'); ?>"  />
    <input type="submit" name="submit" value="INSERT"  />
    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
