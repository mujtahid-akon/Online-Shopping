<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Online Shopping</title>
<base href = "<?php echo site_url('database_controller');?>/">
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
<link href="<?php echo base_url();?>css/style _menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="<?php echo base_url();?>css/cart.css"> -->

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

<script>
$(document).ready(function(){
	// $(".cart_outside").css("display", "none");
 //    $(".select_div").click(function(){
 //        $(".cart_outside").css("display", "block");
 //    });
});
</script>
	


</head>
<body>
<!-- <div class="pre_menu"> -->
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

<div class="best_seller">
<div class="b_seller"> <?php echo $sub_cat_name ?></div>
<div></div>
</div>
<div class="some_items">

	<?php foreach ($products as $product) : ?>
		<?php if( $product->SUB_CAT_ID == $sub_cat_id) : ?>
			<div class="item col-lg-2 col-md-2 col-sm-4 col-xs-6 ">	
	    <div id="" class="product one_item">

	      <div class="image"> 
	        <a href="">
	          <img src="<?php echo "../../".(($product->IMAGE==NULL) ? "images/cp_egg_large_size_12pcs-160x180.jpg": "uploads/$product->IMAGE") ?>" alt="CP EGG LARGE SIZE 12PCS" class="img-responsive">
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
		<?php endif ?>	 
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