<?php

class Outlet_model extends CI_Model {


	function get_records()
	{
		$query = $this->db->get('outlets');
		return $query->result();
	}


	function create_outlet($new_outlet_insert_data)
	{

		$insert = $this->db->insert('outlets',$new_outlet_insert_data);
		return $insert;
	}
	function update_outlet($new_outlet_update_data,$outlet_id)
	{


		$this->db->where('OUTLET_ID',$outlet_id);		
		return $this->db->update('outlets',$new_outlet_update_data);
	}	
	function delete_outlet($outlet_id)
	{
		$this->db->where('OUTLET_ID',$outlet_id);
		$q = $this->db->delete('outlets');
		if(!$q)
		{
				 echo "<script>alert('You can not delete this outlet.May be you should think some foreign key constrains');</script>";

		}
		return $q;


	}	
}