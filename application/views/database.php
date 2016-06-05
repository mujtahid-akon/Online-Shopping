<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Shopping</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/database_style.css">
  <script type="text/javascript" src="<?php echo base_url();?>/js/jsapi"></script>

</head>
<body>

<div class="container">
  <h2>Online Shopping Database Management</h2>
  <ul class="nav nav-tabs menu_style">
    <li class="active"><a data-toggle="tab" href="#home">Insert</a></li>
    <li><a data-toggle="tab" href="#menu1">Update</a></li>
    <li><a data-toggle="tab" href="#menu2">Delete</a></li>
    <li><a   href="<?php echo site_url('database_controller/load_update_order_view') ?>">Orders</a></li>
    <li><a   href="<?php echo site_url('emp_site/logout') ?>">Logout</a></li>
    <li><a>
      <?php 
        if( $this->session->userdata('user_info') ) {
          echo 'Welcome '.$this->session->userdata('user_info')->FIRST_NAME.' '.$this->session->userdata('user_info')->LAST_NAME;
        }
        else echo 'Welcome Guest!';
      ?>
    </a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Insert</h3>
      <nav>
        <ul class="nav_new">
          <li><a href="<?php echo site_url('insert_database_controller/insert_product') ?>" class="">Product</a></li>
          <li><a href="<?php echo site_url('insert_database_controller/insert_sub_category') ?>" class="">Sub Category</a></li>
          <li><a href="<?php echo site_url('insert_database_controller/insert_category') ?>" class="">Category</a></li>
          <li><a href="<?php echo site_url('insert_database_controller/insert_outlet') ?>" class="">Outlet</a></li>
          <!--  <li><a href="#" class="">Salesman</a></li>  -->
        </ul>
      </nav>



    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Update</h3>

     <nav>
    		<ul class="nav_new">
    			<li><a href="<?php echo site_url('update_database_controller/load_update_product_view') ?>" class="">Product</a></li>
          <li><a href="<?php echo site_url('update_database_controller/load_update_sub_category_view') ?>" class="">Sub Category</a></li>
          <li><a href="<?php echo site_url('update_database_controller/load_update_category_view') ?>" class="">Category</a></li>
          <li><a href="<?php echo site_url('update_database_controller/load_update_outlet_view') ?>" class="">Outlet</a></li>
          <!-- <li><a href="#" class="">Salesman</a></li> -->
    		</ul>
  	</nav>

    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Delete</h3>
      <nav>
        <ul class="nav_new">
          <li><a href="<?php echo site_url('delete_database_controller/load_delete_product_view') ?>" class="">Product</a></li>
          <li><a href="<?php echo site_url('delete_database_controller/load_delete_sub_category_view') ?>" class="">Sub Category</a></li>
          <li><a href="<?php echo site_url('delete_database_controller/load_delete_category_view') ?>" class="">Category</a></li>
          <li><a href="<?php echo site_url('delete_database_controller/load_delete_outlet_view') ?>" class="">Outlet</a></li>
          <!-- <li><a href="#" class="">Salesman</a></li> -->
        </ul>
      </nav>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Orders</h3>


    </div>
  </div>
</div>

</body>
</html>
