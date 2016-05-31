<?php

class Membership_model extends CI_Model {

	function validate()
	{
		$this->db->where('USER_NAME', $this->input->post('user_name'));
		$this->db->where('PASSWORD', md5($this->input->post('password')));
		$query = $this->db->get('customers');
		

		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else{
			return false;
		}
		
	}

	function is_user_existed()
	{
		$this->db->where('USER_NAME', $this->input->post('USER_NAME'));
		$query = $this->db->get('customers');
		
		if($query->num_rows() == 1)
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	function create_member()
	{
		
		$new_customer_insert_data = array(
			'FIRST_NAME' => $this->input->post('FIRST_NAME'),
			'LAST_NAME' => $this->input->post('LAST_NAME'),
			'EMAIL' => $this->input->post('EMAIL'),			
			'USER_NAME' => $this->input->post('USER_NAME'),
			'PASSWORD' => md5($this->input->post('PASSWORD'))						
		);
		
		$insert = $this->db->insert('customers', $new_customer_insert_data);
		return $insert;
	}
}