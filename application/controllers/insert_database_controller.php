<?php
class Insert_database_controller extends CI_Controller
{
	function index()
	{
		$this->load->view('database');
	}

	function insert_outlet()
	{
		$this->load->view('outlet/outlet_form');
	}
	function insert_category()
	{
		$this->load->view('category/category_form');
	}
	function insert_sub_category()
	{
		$this->load->model('category_model');
		
		if($query = $this->category_model->get_records())
		{
			$data['records'] = $query;
		}

		$this->load->view('sub_category/sub_category_form',$data);

	}
	// ==========================================
	// =============Insert a Product=============
	// ==========================================
	function insert_product()
	{
		$this->load->model('outlet_model');
		
		if($query = $this->outlet_model->get_records())
		{
			$data['outlet'] = $query;
		}		

		$this->load->model('category_model');
		if($query = $this->category_model->get_records())
		{
			$data['category'] = $query;
		}		
		$this->load->model('sub_category_model');
		
		if($query = $this->sub_category_model->get_records())
		{
			$data['sub_category'] = $query;
		}		
		$data['error'] = 'TRUE';

		 $this->load->view('product/product_form',$data);
	}
	function create_product()
	{
		 $this->load->library('form_validation');

		// field name, error message, validation rules
		$this->form_validation->set_rules('OUTLET_ID', 'OUTLET NAME', 'trim|required');
		$this->form_validation->set_rules('CATEGORY_ID', 'CATEGORY NAME', 'trim|required');
		$this->form_validation->set_rules('SUB_CAT_ID', 'SUB CATEGORY NAME', 'trim|required');
		$this->form_validation->set_rules('PRODUCT_NAME', 'PRODUCT_NAME', 'trim|required');
		$this->form_validation->set_rules('UNIT_QUANTITY', 'UNIT_QUANTITY', 'trim|required|numeric');
		$this->form_validation->set_rules('BUY_UNIT_PRICE', 'BUY_UNIT_PRICE', 'trim|required|numeric');
		$this->form_validation->set_rules('SELL_UNIT_PRICE', 'SELL_UNIT_PRICE', 'trim|required|numeric');
		$this->form_validation->set_rules('DESCRIPTION', 'DESCRIPTION', 'trim|required');
		$this->form_validation->set_rules('PRODUCT_IN_STOCK', 'PRODUCT_IN_STOCK', 'trim|required|numeric');
		$this->form_validation->set_rules('PRODUCT_VENDOR', 'PRODUCT_VENDOR', 'trim|required');
		$this->form_validation->set_rules('RATING', 'RATING', 'trim|required|numeric');
		$this->form_validation->set_rules('IMAGE', 'IMAGE', 'trim|required');


		 if($this->form_validation->run() == FALSE)
		 {
			$this->load->model('outlet_model');
			
			if($query = $this->outlet_model->get_records())
			{
				$data['outlet'] = $query;
			}		

			$this->load->model('category_model');
			if($query = $this->category_model->get_records())
			{
				$data['category'] = $query;
			}		
			$this->load->model('sub_category_model');
			
			if($query = $this->sub_category_model->get_records())
			{
				$data['sub_category'] = $query;
			}		

			 $this->load->view('product/product_form',$data);
		}

		else
		{
			$this->load->model('product_model');

			if($query = $this->product_model->create_product())
			{

				 echo "<script>alert('New product was seccessfully inserted!');</script>";
				 $this->index();
			}
			else
			{
				$this->load->model('outlet_model');
				
				if($query = $this->outlet_model->get_records())
				{
					$data['outlet'] = $query;
				}		

				$this->load->model('category_model');
				if($query = $this->category_model->get_records())
				{
					$data['category'] = $query;
				}		
				$this->load->model('sub_category_model');
				
				if($query = $this->sub_category_model->get_records())
				{
					$data['sub_category'] = $query;
				}		

				$data['error'] = 'FALSE';
				 $this->load->view('product/product_form',$data);
			}
		}
	}

	function create_outlet()
	{
		$this->load->library('form_validation');

		// field name, error message, validation rules

		$this->form_validation->set_rules('OUTLET_NAME', 'OUTLET NAME', 'trim|required|is_unique[outlets.OUTLET_NAME]');
		$this->form_validation->set_rules('DESCRIPTION', 'DESCRIPTION', 'trim|required');


		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('outlet/outlet_form');
		}

		else
		{
			$this->load->model('outlet_model');

			if($query = $this->outlet_model->create_outlet())
			{
				 echo "<script>alert('New outlet was seccessfully inserted!');</script>";
				 $this->index();

			}
			else
			{
				$this->load->view('outlet/outlet_form');
			}
		}

	}
	function create_category()
	{
		$this->load->library('form_validation');

		// field name, error message, validation rules
		$this->form_validation->set_rules('CATEGORY_NAME', 'CATEGORY NAME', 'trim|required|is_unique[categories.CATEGORY_NAME]');
		$this->form_validation->set_rules('CATEGORY_DESCRIPTION', 'DESCRIPTION', 'trim|required');


		if($this->form_validation->run() == FALSE)
		{

			$this->load->view('category/category_form');
		}

		else
		{
			$this->load->model('category_model');

			if($query = $this->category_model->create_category())
			{
				 echo "<script>alert('New category was seccessfully inserted!');</script>";
				 $this->index();
			}
			else
			{
				$this->load->view('category/category_form');
			}
		}
	}	
	function create_sub_category()
	{
		$this->load->library('form_validation');

		// field name, error message, validation rules
		$this->form_validation->set_rules('CATEGORY_ID', 'CATEGORY_ID', 'trim|required');
		$this->form_validation->set_rules('NAME', 'NAME', 'trim|required|is_unique[sub_categories.NAME]');
		$this->form_validation->set_rules('DESCRIPTION', 'DESCRIPTION', 'trim|required');


		if($this->form_validation->run() == FALSE)
		{
			$this->load->model('category_model');
			
			if($query = $this->category_model->get_records())
			{
				$data['records'] = $query;
			}

			$this->load->view('sub_category/sub_category_form',$data);	
		}

		else
		{
			$this->load->model('sub_category_model');

			if($query = $this->sub_category_model->create_sub_category())
			{
				 echo "<script>alert('New sub category was seccessfully inserted!');</script>";
				 $this->index();
			}
			else
			{
				$this->load->view('sub_category/sub_category_form');
			}
		}
	}
	function update_sub_cat()
	{
		$CATEGORY_ID = $this->input->post('CATEGORY_ID');


		 $this->load->model('product_model');
		 $products = $this->product_model->get_this_records($CATEGORY_ID);


		  foreach ($products as $product) {

		  		if($product->CATEGORY_ID === $CATEGORY_ID)
		  		{
		  			echo "<option value='".$product->SUB_CAT_ID."' selected='' class='select_item'>".$product->NAME."</option>";
		  		}
		  		else {
		  			//echo "<option value='".$product->SUB_CAT_ID."' selected='' class='select_item'>NotEq</option>";
		  		}

		  }
		
	
		
	}	
}	
