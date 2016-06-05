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
  <link rel="stylesheet" href="<?php echo base_url();?>css/insert_catagory_style.css">
  <script type="text/javascript" src="<?php echo base_url();?>js/jsapi"></script>

</head>
<body>


<div class="outlet_insert">
  <div class="inner_outlet_insert">
     <h1>Insert a Category</h1>
    <?php
      echo form_open('database_controller/create_category');
      echo form_input('CATEGORY_NAME',set_value('CATEGORY_NAME','CATAGORY NAME'));
      echo form_input('CATEGORY_DESCRIPTION',set_value('CATEGORY_DESCRIPTION','CATEGORY DESCRIPTION'));

      echo form_submit('submit','INSERT');
    ?>
    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
