<?php
class Update_database_controller extends CI_Controller
{
	function index()
	{
		$this->load->view('database');
	}	

	function load_update_sub_category_form()
	{

		$this->load->view('sub_category/update_sub_category_form');
	}


// =============================================================================================
// =============================================================================================
// =============================================================================================
	function load_update_product_view()
	{
		$this->load->model('product_model');
		
		if($query = $this->product_model->get_records())
		{
			$data['records'] = $query;
		}
		$this->load->view('product/update_product_view',$data);
	}

// ==============================================================================================

	function load_update_sub_category_view()
	{
		$this->load->model('sub_category_model');
		
		if($query = $this->sub_category_model->get_records())
		{
			$data['records'] = $query;
		}
		$this->load->view('sub_category/update_sub_category_view',$data);
	}

// ================================================================================================

	function load_update_category_view()
	{
		$this->load->model('category_model');
		
		if($query = $this->category_model->get_records())
		{
			$data['records'] = $query;
		}
		$this->load->view('category/update_category_view',$data);
	}


// ================================================================================================



	function load_update_outlet_view()
	{
		$this->load->model('outlet_model');
		
		if($query = $this->outlet_model->get_records())
		{
			$data['records'] = $query;
		}
		$this->load->view('outlet/update_outlet_view',$data);
	}

// ================================================================================================
// ================================================================================================
// ================================================================================================
	function update_product()
	{
		$this->load->model('product_model');
		
		if($query = $this->product_model->get_records())
		{
			$data['records'] = $query;
		}

		foreach ($query as $row ) 
		{

			if($row->PRODUCT_ID == $this->uri->segment(3) )
			{
				$sub_row['sub'] = $row;
			}
			$sub_row['product_id'] = $this->uri->segment(3);
		}



		// $this->sub_category_model->update_sub_category();
		$this->load->view('product/update_product_form',$sub_row);
	}


// ================================================================================================


	function update_sub_category()
	{
		$this->load->model('sub_category_model');
		
		if($query = $this->sub_category_model->get_records())
		{
			$data['records'] = $query;
		}
		//$this->load->view('update_sub_category_view',$data);

		foreach ($query as $row ) {
			# code...
			if($row->SUB_CAT_ID == $this->uri->segment(3) )
			{
				$sub_row['sub'] = $row;
			}
			$sub_row['sub_cat_id'] = $this->uri->segment(3);
		}



		// $this->sub_category_model->update_sub_category();
		$this->load->view('sub_category/update_sub_category_form',$sub_row);
	}


// ================================================================================================

	function update_category()
	{
		$this->load->model('category_model');
		
		if($query = $this->category_model->get_records())
		{
			$data['records'] = $query;
		}
		//$this->load->view('update_sub_category_view',$data);

		foreach ($query as $row ) {
			# code...
			if($row->CATEGORY_ID == $this->uri->segment(3) )
			{
				$sub_row['sub'] = $row;
			}
			$sub_row['sub_cat_id'] = $this->uri->segment(3);
		}



		// $this->sub_category_model->update_sub_category();
		$this->load->view('category/update_category_form',$sub_row);
	}

// ================================================================================================

	function update_outlet()
	{
		$this->load->model('outlet_model');
		
		if($query = $this->outlet_model->get_records())
		{
			$data['records'] = $query;
		}
		//$this->load->view('update_sub_category_view',$data);

		foreach ($query as $row ) {
			# code...
			if($row->OUTLET_ID == $this->uri->segment(3) )
			{
				$sub_row['sub'] = $row;
			}
			$sub_row['sub_cat_id'] = $this->uri->segment(3);
		}



		// $this->sub_category_model->update_sub_category();
		$this->load->view('outlet/update_outlet_form',$sub_row);
	}

// ================================================================================================
// ================================================================================================
// ================================================================================================

	function now_update_product()
	{
		$new_product_update_data = array(

			'PRODUCT_ID' => $this->input->post('PRODUCT_ID'),
			'OUTLET_ID' => $this->input->post('OUTLET_ID'),
			'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
			'SUB_CAT_ID' => $this->input->post('SUB_CAT_ID'),
			'PRODUCT_NAME' => $this->input->post('PRODUCT_NAME'),
			'UNIT_QUANTITY' => $this->input->post('UNIT_QUANTITY'),
			'BUY_UNIT_PRICE' => $this->input->post('BUY_UNIT_PRICE'),
			'SELL_UNIT_PRICE' => $this->input->post('SELL_UNIT_PRICE'),
			'DESCRIPTION' => $this->input->post('DESCRIPTION'),
			'PRODUCT_IN_STOCK' => $this->input->post('PRODUCT_IN_STOCK'),
			'PRODUCT_VENDOR' => $this->input->post('PRODUCT_VENDOR'),
			'RATING' => $this->input->post('RATING'),
			'IMAGE' => $this->input->post('IMAGE')
		);		
		$product_id = $this->input->post('PRODUCT_ID');
		$this->load->model('product_model');
		$this->product_model->update_product($new_product_update_data,$product_id);
		$this->load_update_product_view();
	}

// ================================================================================================
	function now_update_sub_category()
	{

		$new_sub_category_update_data = array(

			'SUB_CAT_ID' => $this->input->post('SUB_CAT_ID'),
			'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
			'NAME' => $this->input->post('NAME'),
			'DESCRIPTION' => $this->input->post('DESCRIPTION')
		);		
		$sub_cat_id = $this->input->post('SUB_CAT_ID');

		$this->load->model('sub_category_model');
		$this->sub_category_model->update_sub_category($new_sub_category_update_data,$sub_cat_id);
		$this->load_update_sub_category_view();
	}

// ================================================================================================
// ================================================================================================
// ================================================================================================
	function now_update_category()
	{
		$new_category_update_data = array(

				'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
				'CATEGORY_NAME' => $this->input->post('CATEGORY_NAME'),
				'CATEGORY_DESCRIPTION' => $this->input->post('CATEGORY_DESCRIPTION')
			);		
		$cat_id = $this->input->post('CATEGORY_ID');
		$this->load->model('category_model');
		$this->category_model->update_category($new_category_update_data,$cat_id);
		$this->load_update_category_view();
	}
// ================================================================================================
	function now_update_outlet()
	{
		$new_outlet_update_data = array(

				'OUTLET_ID' => $this->input->post('OUTLET_ID'),
				'OUTLET_NAME' => $this->input->post('OUTLET_NAME'),
				'DESCRIPTION' => $this->input->post('DESCRIPTION')
			);
		$outlet_id = $this->uri->segment(3);

		$this->load->model('outlet_model');
		$this->outlet_model->update_outlet($new_outlet_update_data,$outlet_id);
		$this->load_update_outlet_view();
	}

}