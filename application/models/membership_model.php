<?php

class Membership_model extends CI_Model {

	function validate($user_name, $password)
	{
		$this->db->where('USER_NAME', $user_name);
		$this->db->where('PASSWORD', $password);
		$query = $this->db->get('customers');
		

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else{
			return false;
		}
		
	}

	function is_user_existed($user_name)
	{
		$this->db->where('USER_NAME', $user_name);
		$query = $this->db->get('customers');
		
		if($query->num_rows() == 1)
		{
			return true;
		}
		else{
			return false;
		}
	}

	
	function create_member($new_customer_insert_data)
	{	
		$insert = $this->db->insert('customers', $new_customer_insert_data);
		return $insert;
	}
}