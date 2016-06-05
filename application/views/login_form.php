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
	<title>Customer Login</title>
</head>
<body>
	

<div class="outlet_insert animated pulse ">
  <div class="inner_outlet_insert anchor_class">

	<h1>Customer Login!</h1>
    <?php
    $this->session->sess_destroy(); 
	echo form_open('login/validate_credentials');
	//echo validation_errors('<p class="error">');
	
	echo form_input('user_name', 'Username');
	echo form_error('user_name');
	
	echo form_password('password', 'Password');
	echo form_error('password');

	echo form_submit('submit', 'Login');
	echo anchor('login/signup', 'Create Account'); 
	echo form_close();
	?>

</div><!-- end login_form-->
	
</body>