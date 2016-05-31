<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>/css/database_style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/delete_sub_cat_style.css">
  <script type="text/javascript" src="<?php echo base_url();?>/js/jsapi"></script>
    
</head>
<body>

<div class="outer_div">
<h2 class="head_2">Click The Delete Button to Delete that Sub Category</h2>
<?php if(isset($records)): foreach ($records as $row): ?>
	<div class="delet_row">
		<div class="left_div">
			<h2><?php echo anchor("delete_database_controller/delete_sub_category/$row->SUB_CAT_ID",'Delete') ; ?></h2>
		</div>
		<div class="right_div">
			<div class="name"><?php echo $row->NAME; ?></div>
			<div class="description"><?php echo $row->DESCRIPTION; ?></div>
		</div>
	</div>

<?php endforeach ?>


<?php else: ?>

<h2>No records were returned</h2>
<?php endif; ?>
</div>
<div class="home">
 	<?php echo anchor('delete_database_controller', 'Home');?>
</div>

</body>
</html>
