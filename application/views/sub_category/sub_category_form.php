<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Shopping</title>

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


<div class="outlet_insert animated zoomIn">
  <div class="inner_outlet_insert">
     <h1>Insert a Sub Category</h1>
     



    <form action="http://localhost/ci/index.php/insert_database_controller/create_sub_category" method="post" accept-charset="utf-8">

    <select  name="CATEGORY_ID" >
      <option value="" selected class="select_item">Select Sub Category Id</option>
      <?php if(isset($records)): foreach ($records as $row): ?>
        <option value=<?php echo $row->CATEGORY_ID; ?> class="select_item"><?php echo $row->CATEGORY_NAME; ?></option>
      <?php endforeach ?>
      <?php endif; ?>
    </select>
    <input type="text" name="NAME" value="<?php echo set_value('NAME', 'NAME'); ?>"  />
    <input type="text" name="DESCRIPTION" value="<?php echo set_value('DESCRIPTION', 'DESCRIPTION'); ?>"  />
    <input type="submit" name="submit" value="INSERT"  />
    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
