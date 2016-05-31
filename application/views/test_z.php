<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>/css/database_style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/test_z_style.css">
  <script type="text/javascript" src="<?php echo base_url();?>/js/jsapi"></script>
<script>
$(document).ready(function(){
    $(".show").click(function(){
        $(".outside_third").css("display", "block");
    });
});
$(document).ready(function(){
    $(".hid").click(function(){
        $(".outside_third").css("display", "none");
    });
});
</script>  
    
</head>
<body>

<div class="first">
	<button class="show">show me</button>
  <p>this is a sample paragraph.</p>
</div>
<div class="second"></div>
<div class="outside_third">
  <div class="third">
  	<button class="hid">Hide</button>
  </div>
</div>
</body>
</html>
