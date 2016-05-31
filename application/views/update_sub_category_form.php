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
  <script type="text/javascript" src="<?php echo base_url();?>js/jsapi"></script>

</head>
<body>


<div class="outlet_insert">
  <div class="inner_outlet_insert">
     <h1>Update Sub Category</h1>
    <?php
      echo form_open('database_controller/now_update_sub_category');
      echo form_input('SUB_CAT_ID',set_value('SUB_CAT_ID',$sub->SUB_CAT_ID));
      echo form_input('CATEGORY_ID',set_value('CATEGORY_ID',$sub->CATEGORY_ID));
      echo form_input('NAME',set_value('NAME',$sub->NAME));
      echo form_input('DESCRIPTION',set_value('DESCRIPTION',$sub->DESCRIPTION));

      echo form_submit('submit','UPDATE');
    ?>
    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
