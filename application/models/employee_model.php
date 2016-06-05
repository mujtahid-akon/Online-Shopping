<?php

class Employee_model extends CI_Model {


	function get_records()
	{
		$query = $this->db->get('employees');
		return $query->result();
	}
}