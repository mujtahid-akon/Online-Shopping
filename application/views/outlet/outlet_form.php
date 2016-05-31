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

</head>
<body>



<div class="outlet_insert animated zoomIn">
  <div class="inner_outlet_insert">
     <h1>Insert a Outlet</h1>
     <form action="http://localhost/ci/index.php/insert_database_controller/create_outlet" method="post" accept-charset="utf-8">
    <input type="text" name="OUTLET_NAME" value="<?php echo set_value('OUTLET_NAME', 'OUTLET NAME'); ?>"  />
    <input type="text" name="DESCRIPTION" value="<?php echo set_value('DESCRIPTION', 'DESCRIPTION'); ?>"  />
    <input  type="submit" name="submit" value="INSERT" />
    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>



</body>
</html>
