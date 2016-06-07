 <?php
class needed_product_controller extends CI_Controller
{
	function load_needed_product_view()
	{
		$this->load->model('needed_product_model');
		$data = null;
		
		if($query = $this->needed_product_model->get_needed_product())
		{
			$data['records'] = $query;
		}

		$this->load->view('needed_product_view',$data);
	}

	function approve_inventory_order()
	{
		$product_id = $this->uri->segment(3);
		$amount=$this->uri->segment(4);
		$this->load->model('inventory_model');
		$this->inventory_model->update_product($product_id, $amount);
		redirect('inventory_controller/load_inventory_order_view');		
	}

	function needed_product_order()
	{
		//echo $this->uri->segment(3);
		//echo $this->uri->segment(4);
		// echo $this->input->post('QUANTITY');
		// echo " ";
		// echo $this->input->post('PRODUCT_ID');
		// echo " " ;
		// echo $this->input->post('OUTLET_ID');
		// echo " ";
		$new_order_insert_data = array(
			'OUTLET_ID' => $this->input->post('OUTLET_ID'),
			'PRODUCT_ID' => $this->input->post('PRODUCT_ID'),
			'AMOUNT' => $this->input->post('QUANTITY'),
		);
		$product_id = $this->input->post('PRODUCT_ID');
		$this->load->model('inventory_model');
		$this->inventory_model->insert_order($new_order_insert_data, $product_id);
		redirect('needed_product_controller/load_needed_product_view');	

	}

	function choose_product()
	{
		$data = null;
		$data['product_id'] = $this->uri->segment(3);
		$data['outlet_id'] = $this->uri->segment(4);
		$this->load->view('needed_amount_view', $data);	
	}

	function show_prev_order()
	{
		$this->load->model('needed_product_model');
		$data = null;
		
		if($query = $this->needed_product_model->get_prev_order())
		{
			$data['records'] = $query;
		}

		$this->load->view('prev_needed_product_view',$data);
	}

}