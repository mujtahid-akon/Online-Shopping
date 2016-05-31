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
     <h1>Change Order Status</h1>


    <form action="http://localhost/ci/index.php/database_controller/now_update_order_status" method="post" accept-charset="utf-8">
    <label>Employee Id:</label>
 
    <select  name="EMPLOYEE_ID" >
      <option value="" selected class="select_item">Select Employee id</option>
      <?php if(isset($employee)): foreach ($employee as $row): ?>
        <option value=<?php echo $row->EMPLOYEE_ID; ?> class="select_item"><?php echo $row->LAST_NAME; ?></option>
      <?php endforeach ?>
      <?php endif; ?>
    </select>  
    <label>Order Id:</label>
    <input type="text" name="ORDER_ID" value=<?php echo $sub->ORDER_ID?> readonly />
    <label>Status:</label>
    <input type="text" name="STATUS" value="<?php echo $sub->STATUS?>"  />
    <input class="submit_marign" type="submit" name="submit" value="CHANGE STATUS"  />

    <?php echo validation_errors('<p class = "error">'); ?>
  </div>
</div>


</body>
</html>
