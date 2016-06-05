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

</head>
<body>

<div class="outlet_insert animated zoomIn reduce_width">
  <div class="inner_outlet_insert reduce_padding">
     <h1>Update Category</h1>



<form action="http://localhost/ci/index.php/update_database_controller/now_update_category" method="post" accept-charset="utf-8">
<label>Category Id:</label>
<input type="text" name="CATEGORY_ID" value=<?php echo $sub->CATEGORY_ID;?> readonly />
<label>Category Name:</label>
<input type="text" name="CATEGORY_NAME" value=<?php echo $sub->CATEGORY_NAME;?>  />
<label>Descriptoin:</label>
<input type="text" name="CATEGORY_DESCRIPTION" value="<?php echo $sub->CATEGORY_DESCRIPTION;?>"  />
<input class="submit_marign" type="submit" name="submit" value="UPDATE"  />


    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
