<?php

class Unit_testing extends CI_Controller {

	function test_create_catagory()
	{
			$new_category_insert_data = array(

				'CATEGORY_NAME' => 'Hello There' ,
				'CATEGORY_DESCRIPTION' => 'Test'
			);
			$this->load->model('category_model');
			return $this->category_model->create_category($new_category_insert_data);


	}
	function test_update_catagory()
	{
		$new_category_update_data = array(

				'CATEGORY_ID' => 2,
				'CATEGORY_NAME' => 'GROCERY',
				'CATEGORY_DESCRIPTION' => 'Hello banani'
			);		
		$cat_id = 2;
		$this->load->model('category_model');
		return $this->category_model->update_category($new_category_update_data,$cat_id);


	}		
	function test_delete_catagory()
	{
		$CATEGORY_ID = 3;
		$this->load->model('category_model');
		$result =  $this->category_model->delete_category($CATEGORY_ID);
		return $result;
	}
	

// =================================================================================================

	function test_create_outlet()
	{
			$new_outlet_insert_data = array(

					'OUTLET_NAME' => 'Bangladesh',
					'DESCRIPTION' => 'This is a country'
			);	
			$this->load->model('outlet_model');
			return $this->outlet_model->create_outlet($new_outlet_insert_data);
	}
	function test_update_outlet()
	{
		$new_outlet_update_data = array(

				'OUTLET_ID' => 4,
				'OUTLET_NAME' => 'BangladeshUpdated',
				'DESCRIPTION' => 'Bangladesh is a developing country'
		);

		$outlet_id = 4;
		$this->load->model('outlet_model');
		return $this->outlet_model->update_outlet($new_outlet_update_data,$outlet_id);		
	}
	function test_delete_outlet()
	{
		$outlet_id = 4;
		$this->load->model('outlet_model');
		return $this->outlet_model->delete_outlet($outlet_id) ;
	
	}		

//==================================================================================================
	function test_create_subcategory()
	{
			$new_sub_category_insert_data = array(

					'CATEGORY_ID' => 1,
					'NAME' => 'HelloBackery',
					'DESCRIPTION' => 'This is a sub category of Backery'
			);
			$this->load->model('sub_category_model');
			return $this->sub_category_model->create_sub_category($new_sub_category_insert_data);
	}

	function test_update_sub_category()
	{
		$new_sub_category_update_data = array(

			'SUB_CAT_ID' => 7,
			'CATEGORY_ID' => 1,
			'NAME' => 'shahedBackery',
			'DESCRIPTION' => 'This is a product of shahed backery'
		);		
		$sub_cat_id = 7;

		$this->load->model('sub_category_model');
		return $this->sub_category_model->update_sub_category($new_sub_category_update_data,$sub_cat_id);	
	}
	function test_delete_sub_category()
	{
		$sub_cat_id = 7;
		$this->load->model('sub_category_model');
		return $this->sub_category_model->delete_sub_category($sub_cat_id);

	}	
//=================================================================================================
	function test_create_product()
	{

		$new_product_insert_data = array(

			'OUTLET_ID' => 1,
			'CATEGORY_ID' => 1,
			'SUB_CAT_ID' => 1,
			'PRODUCT_NAME' => 'Cake100',
			'UNIT_QUANTITY' => 1,
			'BUY_UNIT_PRICE' => 100,
			'SELL_UNIT_PRICE' => 120,
			'DESCRIPTION' => 'This is Cake10',
			'PRODUCT_IN_STOCK' => 100,
			'PRODUCT_VENDOR' => 'BD food good food',
			'RATING' => 5,
			'IMAGE' => 'Image'
		);		

			
		$this->load->model('product_model');
		return $this->product_model->create_product($new_product_insert_data);		

	}

	function test_update_product()
	{
		$new_product_update_data = array(

			'PRODUCT_ID' => 9,
			'OUTLET_ID' => 1,
			'CATEGORY_ID' => 1,
			'SUB_CAT_ID' => 1,
			'PRODUCT_NAME' =>'Cake11',
			'UNIT_QUANTITY' => 1,
			'BUY_UNIT_PRICE' => 100,
			'SELL_UNIT_PRICE' => 120,
			'DESCRIPTION' => 'This is an updated description of cake11',
			'PRODUCT_IN_STOCK' =>100,
			'PRODUCT_VENDOR' =>'BD',
			'RATING' => 5,
			'IMAGE' => 'Image'
		);		
		$product_id = 9;
		$this->load->model('product_model');
		return $this->product_model->update_product($new_product_update_data,$product_id);
	}
	function test_delete_product()
	{
		$product_id = 9;
		$this->load->model('product_model');
		return $this->product_model->delete_product($product_id);
		

	}
//==============================================================================================
//========================      Unit Testing By Shahed        ==================================
//==============================================================================================
function test_create_member()
	{
			$new_customer_insert_data = array(
				'FIRST_NAME' => 'Ashfak',
				'LAST_NAME' => 'Islam',
				'EMAIL' => 'ashfak@gmail.com',			
				'USER_NAME' => 'ashfak',
				'PASSWORD' => md5('1234')					
			);		
			$this->load->model('membership_model');
			return $this->membership_model->create_member($new_customer_insert_data);
	}

	function test_is_user_existed()
	{
		$user_name = 'rashed';
		$this->load->model('membership_model');
		return $this->membership_model->is_user_existed($user_name);
	}

	function test_validate()
	{
		$user_name = 'mujtahid';
		$password = md5('1234');
		$this->load->model('membership_model');
		$query = $this->membership_model->validate($user_name, $password);
		if($query)
			return 1;
		else
			return 0;
	}

	function test_update_order_status()
	{
		$new_outlet_order_status_data = array(
			'STATUS' => 'You will be notified soon',
			'EMPLOYEE_ID' => 2
		);
		$order_id = 73;
		$this->load->model('order_model');
		return $this->order_model->update_order_status($new_outlet_order_status_data, $order_id);
	}

	function test_create_order()
	{
		$this->load->model('order_model');
		$new_order_insert_data = array(
		    'CUSTOMER_ID' => 1
		);

		

		$new_product_ordered_insert_data = array(
		    'PRODUCT_ID' => 3,
		    'OUTLET_ID'	 => 1,
		    'ORDER_ID'   => 100,
		    'QUANTITY'   => 2
		);

		$prods = array($new_product_ordered_insert_data);

			//$this->db->insert('products_ordered', $new_product_ordered_insert_data);		


		return $this->order_model->create_order($new_order_insert_data, $prods);
	}
	///-----------------ADDED BY MUJTAHID -------------
	function test_emp_validate()
	{
		$username = 'admin';
		$password = '1234';
		$this->load->model('emp_membership_model');
		$result =  $this->emp_membership_model->validate($username,$password);
		return $result;
	}
	function test_emp_is_user_existed()
	{
		$username = 'admin';
		$this->load->model('emp_membership_model');
		$result =  $this->emp_membership_model->is_user_existed($username);
		return $result;
	}
	function test_get_specific_order_info()
	{
		$order_id = 65;
		$this->load->model('emp_membership_model');
		$result =  $this->emp_membership_model->get_specific_order_info($order_id);
		return gettype($result);

	}
	function test_emp_create_member()
	{
		$new_employee_insert_data = array(
			'FIRST_NAME' => 'Muntashir',
			'LAST_NAME' => 'Akon',
			'OUTLET_ID' => '1',
			'EMAIL' => 'muntashir.akon@gmail.com',			
			'USER_NAME' => 'muntashir',
			'PASSWORD' => md5('1234')						
		);
		$this->load->model('emp_membership_model');
		$result =  $this->emp_membership_model->create_member($new_employee_insert_data);
		return $result;

	}
	function test_is_outlet_present()
	{
		$outlet_id = 1;
		$this->load->model('emp_membership_model');
		$result =  $this->emp_membership_model->is_outlet_present($outlet_id);
		return $result;
	}
	function test_get_order_date()
	{
		$order_id = 79;
		$this->load->model('emp_membership_model');
		$result =  $this->emp_membership_model->get_order_date($order_id);
		if($result != false) return $result[0]->ORDER_DATE;
		return null;
	}


	function index()
	{
		$this->load->library('unit_test');
		//$this->unit->run($this->test_create_catagory(), 1, 'test_create_catagory');
		//$this->unit->run($this->test_delete_catagory(), 1, 'test_delete_catagory');
		//$this->unit->run($this->test_update_catagory(), 1, 'test_update_catagory');


		//$this->unit->run($this->test_create_outlet(), 1, 'test_create_outlet');
		//$this->unit->run($this->test_update_outlet(), 1, 'test_update_outlet');
		//$this->unit->run($this->test_delete_outlet(), 1, 'test_delete_outlet');


		//$this->unit->run($this->test_create_subcategory(), 1, 'test_create_subcategory');
		//$this->unit->run($this->test_update_sub_category(), 1, 'test_update_sub_category');
		//$this->unit->run($this->test_delete_sub_category(), 1, 'test_delete_sub_category');


		//$this->unit->run($this->test_create_product(), 1, 'test_create_product');
		//$this->unit->run($this->test_update_product(), 1, 'test_update_product');
		//$this->unit->run($this->test_delete_product(), 0, 'test_delete_product');	

		//============================ Shahed =====================================
//		$this->unit->run($this->test_create_member(), 1, 'test_create_member');
//		$this->unit->run($this->test_is_user_existed(), 1, 'test_is_user_existed');
//		$this->unit->run($this->test_validate(), 1, 'test_validate');
//
//		$this->unit->run($this->test_update_order_status(), 0, 'test_update_order_status');
//		$this->unit->run($this->test_create_order(), 1, 'test_create_order');
		//-----------------ADDED BY MUJTAHID-------------
		$this->unit->run($this->test_emp_validate(), true, 'test_emp_validate');
		$this->unit->run($this->test_emp_is_user_existed(), true, 'test_emp_is_user_existed');
		$this->unit->run($this->test_get_specific_order_info(), 'object', 'get_specific_order_info');
		$this->unit->run($this->test_emp_create_member(), 1, 'test_emp_create_member');
		$this->unit->run($this->test_get_order_date(), '2015-12-23', 'test_get_order_date');

		echo $this->unit->report();
	}



	
}
