 <?php
class inventory_controller extends CI_Controller
{

	function index()
	{

		$this->load->view('inventory_home_view');
	}

	function load_button_view()
	{

		$this->load->view('inventory_button_view');
	}


	function load_inventory_order_view()
	{
		$this->load->model('inventory_model');
		$data = null;
		
		if($query = $this->inventory_model->get_orders())
		{
			$data['records'] = $query;
		}

		$this->load->view('inventory_order_view',$data);
	}

	function approve_inventory_order()
	{
		$product_id = $this->uri->segment(3);
		$amount=$this->uri->segment(4);
		$this->load->model('inventory_model');
		$this->inventory_model->update_product($product_id, $amount);

		$inv_order_id = $this->uri->segment(5);
		$this->inventory_model->set_prev_order($inv_order_id);
		redirect('inventory_controller/load_inventory_order_view');		
	}

	function prev_inventory_order()
	{
		$this->load->model('inventory_model');
		$data = null;
		
		if($query = $this->inventory_model->get_prev_orders())
		{
			$data['records'] = $query;
		}

		$this->load->view('prev_inventory_order_view',$data);
	}
}