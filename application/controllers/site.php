<?php
//==========private area for CUSTOMERS============
//Every url of customers must go through it
class Site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		//=========check if customer is loggeed in 
		$this->is_logged_in();
	}

	function members_area()
	{
		$this->load->view('home');
	}
	
	function test() // just for sample
	{
		echo 'good. you\'re logged in.';
		$this->load->model('customers_order_model');
		$this->customers_order_model->get_order_status(51);
	}
	
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
	//================ORDER INFO================

	function get_order_details()
	{
		$this->load->model('customers_order_model');
		$data['order_details'] = $this->customers_order_model->get_orders();
		$this->load->view('customers_orders_summery', $data);
	}

	function view_specific_order()
	{
		//echo $this->uri->segment(3);
		$this->load->model('customers_order_model');
		$data['order_details'] = $this->customers_order_model->get_specific_order_info( $this->uri->segment(3) );
		$data['order_date'] = $this->customers_order_model->get_order_date( $this->uri->segment(3) );
		$data['customer_name_addr'] = $this->customers_order_model->get_name_addr( $this->uri->segment(3) );
		$data['order_status'] = $this->customers_order_model->get_order_status( $this->uri->segment(3) );
		$data['order_price'] = $this->customers_order_model->total_order_price( $this->uri->segment(3) );
		// ============ load table=============
		if($data['order_details']==false){
			echo '<script> if(!alert("Sorry! No Order history Found!")) window.location="'.base_url().'index.php/site/get_order_details" </script>';
			//redirect($_SERVER['HTTP_REFERER']);
			return ;
		}
		$this->load->library('table');
		$data['product_table'] = $this->table->generate($data['order_details']);

		//=====================================
		$this->load->view('specific_order_vouchar', $data);
	}

	//================CUSTOMER LOG OUT==========
	function logout()
	{
		$this->session->sess_destroy();
		redirect('database_controller');
	}

}
