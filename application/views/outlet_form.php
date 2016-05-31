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
  <script type="text/javascript" src="<?php echo base_url();?>js/jsapi"></script>

</head>
<body>


<div class="outlet_insert">
  <div class="inner_outlet_insert">
     <h1>Insert a Outlet</h1>
    <?php
      echo form_open('database_controller/create_outlet');
      echo form_input('OUTLET_NAME',set_value('OUTLET_NAME','OUTLET NAME'));
      echo form_input('DESCRIPTION',set_value('DESCRIPTION','DESCRIPTION'));

      echo form_submit('submit','INSERT');
    ?>
    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
