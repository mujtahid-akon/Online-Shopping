 <?php
class inventory_controller extends CI_Controller
{
	function index()
	{

		$this->load->view('inventory_home_view');
	}
}