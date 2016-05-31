 <?php
class Database_controller extends CI_Controller
{
	function index()
	{
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('sub_category_model');
		$data['products'] = $this->product_model->get_records();
		$data['categories'] = $this->category_model->get_records();
		$data['sub_categories'] = $this->sub_category_model->get_records();
		//$row_data['login_type'] =null;
		//$this->session->userdata($row_data) ;
		//$this->sub_category_model->get_records_json(1);
		$this->load->view('home',$data);
		// $this->load->view('test_z',$data);
	}
	//=================changed by mujtahid========
	function database_site()
	{
		// $this->load->view('database');

		redirect('emp_site/members_area');
	}
	function show_sub_category_wise_product()
	{
		$this->load->model('product_model');
		$this->load->model('category_model');
		$this->load->model('sub_category_model');
		$data['products'] = $this->product_model->get_records();
		$data['categories'] = $this->category_model->get_records();
		$data['sub_categories'] = $this->sub_category_model->get_records();
		foreach ($data['sub_categories'] as $sub_category) {
			if($this->uri->segment(3)== $sub_category->SUB_CAT_ID){
				echo $data['sub_cat_name'] = $sub_category->NAME;
				break;
			}
		}
		//print_r($data['sub_categories']);
		$data['sub_cat_id'] = $this->uri->segment(3);
		//echo $this->uri->segment(3);
		$this->load->view('sub_category_wise_product_list', $data);
	}
	//========================================
	function add()
	{
		$this->load->model('product_model');
		$products = $this->product_model->get($this->input->post('PRODUCT_ID'));
		$product = array(
			'id' => $this->input->post('PRODUCT_ID'),
			'qty' =>  $this->input->post('quantity'),
			'price' => $products->SELL_UNIT_PRICE,
			'name' => $products->PRODUCT_NAME
			);
		$this->cart->insert($product);
		
		//redirect('Database_controller');
		redirect("{$_SERVER['HTTP_REFERER']}#cart");
	}
	function remove($rowid)
	{
		$this->cart->update(array(
			'rowid' => $rowid,
			'qty' => 0
			));

//		redirect('Database_controller');
		redirect($_SERVER['HTTP_REFERER']);
	}
	function destroy()
	{
		$this->cart->destroy();
		redirect('database_controller');
	}
	function order()
	{
		$this->load->model('order_model');
		if( $this->session->userdata('login_type')=='customer' ) 
			$this->order_model->create_order();
		else 
			$this->load->view('login_form');
	}	
	function load_update_order_view()
	{
		$this->load->model('order_model');
		$data = null;
		
		if($query = $this->order_model->get_order_status())
		{
			$data['records'] = $query;
		}


		if($query = $this->order_model->get_products())
		{
			$data['products'] = $query;
		}



		$this->load->view('update_order_view',$data);		

		
	}

	function update_order()
	{

		$this->load->model('order_model');
		
		if($query = $this->order_model->get_order_status())
		{
			$data['records'] = $query;
		}

		foreach ($query as $row ) {

			if($row->ORDER_ID == $this->uri->segment(3) )
			{
				$sub_row['sub'] = $row;
			}
			// $sub_row['product_id'] = $this->uri->segment(3);
		}

		$this->load->model('employee_model');
		
		if($query = $this->employee_model->get_records())
		{
			$sub_row['employee'] = $query;
		}



		$this->load->view('update_order_form',$sub_row);
	
	}
	function now_update_order_status()
	{
		$this->load->model('order_model');
		$this->order_model->update_order_status();
		redirect('database_controller/load_update_order_view');		
	}
	function show_details()
	{
		$this->load->model('order_model');
		$q['details'] = $this->order_model->show_details();
		$this->load->view('order_details',$q);
		
	}
}







