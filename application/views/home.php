<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Shopping</title>
<base href="<?php echo site_url('database_controller');?>/">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
<link href="<?php echo base_url();?>css/style _menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url();?>css/cart.css"> -->


<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/engine1/style.css" />
<script type="text/javascript" src="<?php echo base_url();?>/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<script src="<?php echo base_url();?>js/viewportchecker.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>


<link href="<?php echo base_url();?>css/animate.min.css" rel="stylesheet" type="text/css" />


<style type="text/css">
	.bs-example{
    	margin: 20px;
    }
    hr{
        margin: 60px 0;
    }

</style>

</head>
<body>
<!-- <div class="pre_menu"> -->

</div>
<div class="menu_container">
<div class="user_login">
	<i class="fa fa-user user_pic"></i>
	<!--************** modified by Mujtahid********-->
	<p>
		<?php 
		if( $this->session->userdata('is_logged_in') ) {
			echo 'Welcome '.$this->session->userdata('user_info')->FIRST_NAME.' '.$this->session->userdata('user_info')->LAST_NAME.'!<br>'; ?>
			<span class="label label-warning logout"><a href= "<?php echo site_url('site').'/logout' ?>">log out</a></span>
		<?php
		}
		else echo 'Welcome Guest!';
		?>
	</p>
	<!--************** modified by Mujtahid********-->

</div>
<div class="main_menu">
    <ul class="nav nav-pills menu_bar">
        <!-- <li class="active menu_li"><a class="menu_li_a" href="#">Home</a></li> -->
        <a href="<?php echo site_url('database_controller') ?>"><i class="fa fa-cog fa-spin fa_logo"></i></a>
        <li class="menu_li"><a class="menu_li_a" href="#">About</a></li>

        
        <?php foreach ($categories as $category): ?>
        	<li class="dropdown menu_li">
	            <a href="show_category_wise_product/<?php echo $category->CATEGORY_ID;?>" data-toggle="dropdown" class="dropdown-toggle menu_li_a"><?php echo $category->CATEGORY_NAME; ?> <b class="caret"></b></a>
	            <ul class="dropdown-menu dropdown_ul">
	            	<!-- <?php foreach ($sub_categories as $sub_category): ?>
		                <li ><a href="#">Cake</a></li>
	            	<?php endforeach ?> -->
	            	<?php foreach ($sub_categories as $sub_category) {
	            		if ( $sub_category->CATEGORY_ID == $category->CATEGORY_ID ) {
	            			echo "<li ><a href=\"show_sub_category_wise_product/{$sub_category->SUB_CAT_ID}\"> {$sub_category->NAME} </a></li>" ;
	            		}
	            	}
	         		?>
	            </ul>
	        </li>

        <?php endforeach ?>

    </ul>
 </div>

</div>

<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
	<div class="ws_images">
		<ul>			
			<li><img src="<?php echo base_url();?>data1/images/easy_to_shop.jpg" alt="Easy to Shop" title="Easy to Shop" id="wows1_1"/>We sell the Best product in the country.</li>
			<li><img src="<?php echo base_url();?>data1/images/fresh_food_is_good_for_heath.jpg" alt="Fresh Food is Good For Heath" title="Fresh Food is Good For Heath" id="wows1_2"/>We sell the Best product in the country.</li>
			<li><img src="<?php echo base_url();?>data1/images/freshfruitshdwallpaper.jpg" alt="" title="You are our Priority" id="wows1_3"/>We sell the Best product in the country.</li>
			<li><img src="<?php echo base_url();?>data1/images/save_your_time.jpg" alt="jquery slideshow" title="Save Your Time" id="wows1_4"/></a>We sell the Best product in the country.</li>			
		</ul>
	</div>
	<div class="ws_bullets"><div>		
		<a href="#" title="Easy to Shop"><span><img src="<?php echo base_url();?>data1/tooltips/easy_to_shop.jpg" alt="Easy to Shop"/>2</span></a>
		<a href="#" title="Fresh Food is Good For Heath"><span><img src="<?php echo base_url();?>data1/tooltips/fresh_food_is_good_for_heath.jpg" alt="Fresh Food is Good For Heath"/>3</span></a>
		<a href="#" title="fresh-fruits is Good Food"><span><img src="<?php echo base_url();?>data1/tooltips/freshfruitshdwallpaper.jpg" alt="fresh-fruits-hd-wallpaper"/>4</span></a>
		<a href="#" title="Save Your Time"><span><img src="<?php echo base_url();?>data1/tooltips/save_your_time.jpg" alt="Save Your Time"/>5</span></a>		
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">slider</a> by WOWSlider.com v8.6</div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="<?php echo base_url();?>engine1/wowslider.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	
</div>

<div class="after_slider">
	<a href="<?php echo site_url('login') ?>" ><div class="font_aw login animated fadeInUp">
		<i class="fa fa-user fa_text"></i></br>
		<a href="">Login</a>
	</div></a>
	<a href="<?php echo site_url('login/signup') ?>"><div class="font_aw sign_up animated fadeInUp">
		<i class="fa fa-user-plus fa_text"></i></br>
		<a href="">Sign Up</a>
	</div></a>
	<a href="<?php echo site_url('emp_site/members_area') ?>" ><div class="font_aw emp_login animated fadeInUp">
		<i class="fa fa-user fa_text"></i></br>
		<a href="">Employee Login</a>
	</div></a>
	<a  href="<?php echo site_url('site/get_order_details') ?>" ><div class="font_aw database animated fadeInUp">
		<i class="fa fa-shopping-basket fa_text"></i></br>
		<a href="">Previous Order</a>
	</div></a>
	
	
	
</div>

<div class="best_seller">
<div class="b_seller">Best Seller</div>
<div></div>
</div>
<div class="some_items">

	<?php foreach ($products as $product) : ?>
		
	<div class="item col-lg-2 col-md-2 col-sm-4 col-xs-6 ">	
	    <div id="" class="product one_item">

	      <div class="image"> 
	        <a href="">
	          <img src="<?php echo base_url();?>images/cp_egg_large_size_12pcs-160x180.jpg" alt="CP EGG LARGE SIZE 12PCS" class="img-responsive">
	        </a> 
	      </div>
	      <div class="description">
	        <h4><a href=" "><?php echo $product->PRODUCT_NAME;?></a></h4>
	        <p class="size">Unit Price/1.00 Each</p>

	      </div>
	      <div class="price">
	          <span class="sale-price"><?php echo $product->SELL_UNIT_PRICE;?></span>
	      </div>  
	      <div class="action-control">


	        

	        <form action="" method="post" accept-charset="utf-8">
	        <label>Qty:
	          <input id="quantity" type="number" min="0" maxlength="5" value="1" name="quantity" class="ui-input-text ui-body-c ui-corner-all ui-shadow-inset ui-mini q-mini">  
	        </label>	        
			<input id="PRODUCT_ID" type="hidden" name="PRODUCT_ID" value=<?php echo $product->PRODUCT_ID ?> />
			<div class="select_div">
	        <a  class="btn btn-primary btn-cart"> 
	          <span  class="add2cart"><i class="fa fa-shopping-cart"></i> <input  id = "submit" class="add_2_cart" value="Add to Cart" type="submit"> </span> 
	        </a>
	        </div>
	        </form>	        


	      </div>
	    </div>
	</div>

	<?php endforeach?>  
</div>


<?php if ($cart = $this->cart->contents() ):?>	
<div class="hide_cart">
 <div class = "cart">	
	 <h2>Shoping Cart</h2>
	<?php foreach ($cart as $item):?>
		<div class="cart_item">
			<div class="item_name"><?php echo $item['name']; ?></div>
			<div class="item_subtotal"><?php echo $item['subtotal']; ?></div>


			<form action="" method="post" accept-charset="utf-8">
			<input id="rowid" type="hidden" name="rowid" value=<?php echo $item['rowid'] ?> />
			<div class="item_remove">
				
	          	<span><input  id = "submit" value="X" type="submit"> </span> 
	        				
			</div>
			</form>	



		</div>
	<?php endforeach ?>
	<div class="total">
		<label class="sum_label">Total</label> <div class="sum"><?php echo $this->cart->total(); ?></div>
	</div>
	<div class="order_button">
	<a href="http://localhost/ci/index.php/database_controller/order" >Order</a>
	</div>
<?php endif ?>
</div>
</div>

<div class="show_cart">
 <div class = "cart">	
	 <h2>Shoping Cart</h2>
	 <div id="product_lists">
	 </div>
</div>
</div>

</div>


<div class="prompt" id = "prompt">
    You have successfully added a item in the cart
</div>

<div class="footer">
	
</div>
<div class="post_footer">
	<small class="footer_text">© Copyright 2015, BUET CSE 12 </small>
</div>


<script type="text/javascript">
$(document).ready(function() {
	
		$(".hide_cart").css("display","block"); 
		$(".show_cart").css("display","none");	

		$('form').submit(function()
		{
			//e.preventDefault();
			$(".show_cart").css("display","block"); 
			$(".hide_cart").css("display","none"); 
	    // Get all the forms elements and their values in one step
	    	var values = $(this).serialize();
	    	var values2 = values.split(/[=&]+/);
	    	var length = values2.length;
	    	//alert(length);
	    	if(length == 2)
	    	{
				var post_data = {
				                    'rowid':values2[1]
				                    
				                };

	            $.ajax({
	                type: "POST",
	                url: "http://localhost/ci/index.php/database_controller/remove",
	                data: post_data,
	                success: function(message) {
	                    // return success message to the id='result' position
	                    $("#product_lists").html(message);
	                    //document.getElementById("change").style.display = "none";
	                    
	                }
	            });		    		
	    	}
	    	else
	    	{
				var post_data = {
				                    'PRODUCT_ID': values2[3],
				                    'quantity': values2[1]
				                    
				                };

	            $.ajax({
	                type: "POST",
	                url: "http://localhost/ci/index.php/database_controller/add",
	                data: post_data,
	                success: function(message) {
	                    // return success message to the id='result' position
	                    $("#product_lists").html(message);
	                    prmpt();
	                    setTimeout(rev_prmt, 2000);
	                    //document.getElementById("change").style.display = "none";
	                    
	                }
	            });	   
        	}
            return false; 	



		});

		function prmpt(){
		    document.getElementById("prompt").style.display = "block";
		    document.getElementById("prompt").style.position = "fixed";
		    document.getElementById("prompt").style.top = "0";
		}
		function rev_prmt(){
		    document.getElementById("prompt").style.display = "none";
		}	

    });
    </script>

</body>
</html>                                		