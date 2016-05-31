<?php

class Outlet_model extends CI_Model {


	function get_records()
	{
		$query = $this->db->get('outlets');
		return $query->result();
	}


	function create_outlet()
	{
		$new_outlet_insert_data = array(

				'OUTLET_NAME' => $this->input->post('OUTLET_NAME'),
				'DESCRIPTION' => $this->input->post('DESCRIPTION')
			);
		$insert = $this->db->insert('outlets',$new_outlet_insert_data);
		return $insert;
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
		$q = $this->db->delete('outlets');
		if(!$q)
		{
				 echo "<script>alert('You can not delete this outlet.May be you should think some foreign key constrains');</script>";

		}


	}	
}