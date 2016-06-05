<?php

class Emp_site extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	function members_area()
	{
		$this->load->view('database');
	}
	
	// function another_page() // just for sample
	// {
	// 	echo 'good. you\'re logged in.';
	// }
	//==============================================
	//================ORDER INFO================

	// function get_order_details()
	// {
	// 	$this->load->model('customers_order_model');
	// 	$data['order_details'] = $this->customers_order_model->get_orders();
	// 	$this->load->view('customers_orders_summery', $data);
	// }

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
		$this->load->library('table');
		$data['product_table'] = $this->table->generate($data['order_details']);
		//=====================================
		$this->load->view('emp_specific_order_vouchar', $data);
	}


	//===============================================
	protected function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('emp_is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			//echo 'You don\'t have permission to access this page. <a href="../emp_login">Login</a>';	
			//die();		
			//$this->load->view('login_form');
			redirect('emp_login','refresh');
		}		
	}
	//============EMPLOYEE LOG OUT
	function logout()
	{
		$this->session->sess_destroy();
		redirect('emp_login');
	}	

}
