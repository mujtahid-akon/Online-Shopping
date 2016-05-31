<!DOCTYPE html>

<html lang= "en">
<head>
	<meta http-equiv="Content-Type" content= "text/html; charset=utf-8">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/style.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <script src="<?php echo base_url();?>js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>css/insert_outlet_style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/insert_sub_category_style.css">	
	<title>Employee Signup</title>
  <script>
    $(document).ready(function(){
      $("#OUTLET_ID > option").eq(0).attr("disabled", "disabled");
    });
  </script>
</head>
<body>
	

<div class="outlet_insert animated pulse ">
  <div class="inner_outlet_insert ">
	<h1>Employee Signup!</h1>

<?php
   
echo form_open('emp_login/create_member');

echo form_input('FIRST_NAME', '','placeholder= "First Name"');
echo form_error('FIRST_NAME');
echo form_input('LAST_NAME', '','placeholder= "First Name"');
echo form_error('LAST_NAME');
// echo form_input('OUTLET_ID', set_value('OUTLET_ID', 'Outlet ID'));
// echo form_error('OUTLET_ID');
// echo "Select Outlet<br>";
echo form_dropdown('OUTLET_ID',array( '' => "Select an outlet") + $outlet_list,'', 'id="OUTLET_ID"');
echo form_error('OUTLET_ID');

echo form_input('EMAIL', '','placeholder="Email Address"');
echo form_error('EMAIL');
?>
<?php
echo form_input('USER_NAME', '','placeholder="Username"');
echo form_error('USER_NAME');
echo form_password('PASSWORD', '','placeholder="Password"');
echo form_error('PASSWORD');
echo form_password('PASSWORD2','','placeholder="Confirm Password"');
echo form_error('PASSWORD2');

// echo form_submit('submit', 'Create Acccount');
?>
<input class="" type="submit" name="submit" value="Create Acccount"  />

<?php //echo validation_errors('<p class="error">'); ?>
</div>
</div>

</body>
</html>