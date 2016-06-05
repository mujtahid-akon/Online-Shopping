<!DOCTYPE html>

<html lang= "en">
<head>
	<meta http-equiv="Content-Type" content= "text/html; charset=utf-8">
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <script src="<?php echo base_url();?>js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>css/insert_outlet_style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/insert_sub_category_style.css">	
	<title>Customer Signup</title>
</head>
<body>
	

<div class="outlet_insert animated pulse ">
  <div class="inner_outlet_insert ">
  <h1>Customer Sign Up!</h1>
<?php
   
echo form_open('login/create_member');

echo form_input('FIRST_NAME', set_value('FIRST_NAME', 'First Name'));
echo form_error('FIRST_NAME');
echo form_input('LAST_NAME', set_value('LAST_NAME', 'Last Name'));
echo form_error('LAST_NAME');
echo form_input('EMAIL', set_value('EMAIL', 'Email Address'));
echo form_error('EMAIL');
?>

<?php
echo form_input('USER_NAME', set_value('USER_NAME', 'Username'));
echo form_error('USER_NAME');
echo form_password('PASSWORD', set_value('PASSWORD', 'Password'));
echo form_error('PASSWORD');
echo form_password('PASSWORD2',set_value('PASSWORD2', 'Confirm Password'));
echo form_error('PASSWORD2');

echo form_submit('submit', 'Create Acccount');
?>

<?php //echo validation_errors('<p class="error">'); ?>


</div>
</div>