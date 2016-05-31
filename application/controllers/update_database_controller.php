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
		$this->load->model('product_model');
		$this->product_model->update_product();
		$this->load_update_product_view();
	}

// ================================================================================================
	function now_update_sub_category()
	{
		$this->load->model('sub_category_model');
		$this->sub_category_model->update_sub_category();
		$this->load_update_sub_category_view();
	}

// ================================================================================================
// ================================================================================================
// ================================================================================================
	function now_update_category()
	{
		$this->load->model('category_model');
		$this->category_model->update_category();
		$this->load_update_category_view();
	}
// ================================================================================================
	function now_update_outlet()
	{
		$this->load->model('outlet_model');
		$this->outlet_model->update_outlet();
		$this->load_update_outlet_view();
	}

}