<?php

class Order_model extends CI_Model {


	//==========changed by mujtahid ===========
	function __construct()
	{
		parent::__construct();
		//=========check if customer is loggeed in 
		if( $this->session->userdata('login_type')!==null and $this->session->userdata('login_type')=='customer' )
		{
			$this->is_logged_in();
		}
		elseif ( $this->session->userdata('login_type')!==null and $this->session->userdata('login_type')=='employee') {
			$this->emp_is_logged_in();
		}
	}
	//==========================================
	
	function get_records()
	{
		$query = $this->db->get('orders');
		return $query->result();
	}
	function get_order_status()
	{
		$query = $this->db->get('order_status');
		return $query->result();
	}
	function get_products()
	{
		$query = $this->db->get('products_ordered');
		return $query->result();
	}	

	function create_order()
	{
		
		$new_order_insert_data = array(
		    'CUSTOMER_ID' => $this->session->userdata('user_info')->CUSTOMER_ID
		);

		$this->db->set('ORDER_DATE', 'NOW()', FALSE);
		$this->db->insert('orders', $new_order_insert_data);
		$order_id = $this->db->insert_id();



		$new_order_status_insert_data = array(
		    'EMPLOYEE_ID' => 1,
		    'ORDER_ID' =>$this->db->insert_id(),
		    'STATUS' => "Pending"
		);

		$this->db->insert('order_status', $new_order_status_insert_data);


		$cart = $this->cart->contents();
		
		 foreach ($cart as $item)
		 {
			$new_product_ordered_insert_data = array(
			    'PRODUCT_ID' => $item['id'],
			    'OUTLET_ID'	 => 1,
			    'ORDER_ID'   => $order_id,
			    'QUANTITY'   => $item['qty']
			);

			$this->db->insert('products_ordered', $new_product_ordered_insert_data);		

		}
		redirect('database_controller/destroy');
		return $new_order_insert_data;
	}





	function update_outlet()
	{
		$new_outlet_update_data = array(

				'OUTLET_ID' => $this->input->post('OUTLET_ID'),
				'OUTLET_NAME' => $this->input->post('OUTLET_NAME'),
				'DESCRIPTION' => $this->input->post('DESCRIPTION')
			);
		$this->db->where('OUTLET_ID',$this->input->post('OUTLET_ID') );
		$this->db->update('outlets',$new_outlet_update_data);
	}	
	function delete_outlet()
	{
		$this->db->where('OUTLET_ID',$this->uri->segment(3));
		$this->db->delete('outlets');
	}	

	function update_order_status(){
		echo "updated order";
		$new_outlet_order_status_data = array(
				'STATUS' => $this->input->post('STATUS'),
				'EMPLOYEE_ID' => $this->input->post('EMPLOYEE_ID')
			);

		$this->db->where('ORDER_ID',$this->input->post('ORDER_ID') );
		if( !$this->db->update('order_status',$new_outlet_order_status_data) )
		{
			echo "successful";
		}
		else
		{
			echo "failed";
		}
	}
	function show_details()
	{
		$this->db->select('*');
		$this->db->from('orders');
		// $this->db->where('ORDER_ID','67');
		$this->db->join('products_ordered', 'orders.ORDER_ID = products_ordered.ORDER_ID');
		$this->db->join('products', 'products_ordered.PRODUCT_ID = products.PRODUCT_ID');
		$this->db->join('customers', 'orders.CUSTOMER_ID = customers.CUSTOMER_ID');
		$this->db->having('orders.ORDER_ID = 68');
		$q = $this->db->get()->result();
		return $q;
	}
	//====================changed by mujtahid===========
	protected function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			//echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';	
			//die();
			//$this->load->view('login_form');
			redirect('login','refresh');
		}		
	}
	//====================================================

	protected function emp_is_logged_in()
	{
		$is_logged_in = $this->session->userdata('emp_is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			//echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';	
			//die();
			//$this->load->view('login_form');
			redirect('emp_login','refresh');
		}		
	}
	//====================================================

}