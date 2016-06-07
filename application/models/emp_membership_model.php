<?php

class Emp_membership_model extends CI_Model {

	function validate($username,$password)
{
	$this->db->where('USER_NAME',$username );
	$this->db->where('PASSWORD', md5($password));
	$query = $this->db->get('employees');


	if($query->num_rows() == 1)
	{
		return $query->result();
	}
	else{
		return false;
	}

}

	function is_user_existed($username)
	{
		$this->db->where('USER_NAME', $username);
		$query = $this->db->get('employees');
		
		if($query->num_rows() == 1)
		{
			return true;
		}
		else{
			return false;
		}
	}

	function create_member($new_employee_insert_data)//input is an array
	{
		
		$insert = $this->db->insert('employees', $new_employee_insert_data);
		return $insert;
	}

	function is_outlet_present($outlet_id)
	{
		$this->db->where('OUTLET_ID', $outlet_id);
		$query = $this->db->get('outlets');
		
		if($query->num_rows() == 1)
		{
			return true;
		}
		else{
			return false;
		}
	}

    function get_outlets()
    {
        return $this->db->get('outlets');
    }
	
	// function create_member()
	// {
		
	// 	$new_customer_insert_data = array(
	// 		'FIRST_NAME' => $this->input->post('FIRST_NAME'),
	// 		'LAST_NAME' => $this->input->post('LAST_NAME'),
	// 		'EMAIL' => $this->input->post('EMAIL'),			
	// 		'USER_NAME' => $this->input->post('USER_NAME'),
	// 		'PASSWORD' => md5($this->input->post('PASSWORD'))						
	// 	);
		
	// 	$insert = $this->db->insert('customers', $new_customer_insert_data);
	// 	return $insert;
	// }

	function get_specific_order_info($order_id)
	{
		$sql = "SELECT p.PRODUCT_NAME 'Product Name', p.SELL_UNIT_PRICE 'Unit Price',po.QUANTITY Quantity, po.QUANTITY* p.SELL_UNIT_PRICE Price
				FROM orders o JOIN ( products_ordered po, products p)
				ON(o.ORDER_ID = po.ORDER_ID and p.PRODUCT_ID= po.PRODUCT_ID)
				WHERE o.ORDER_ID = ?;";
		$query = $this->db->query($sql,$order_id);
		//$this->load->library('table');

		//echo $this->table->generate($query);
		if($query->num_rows() !=0)
		{
			//print_r($query->result());
			return $query; 
		}
		else{
			return false;
		}
	}

	function get_order_date($order_id)
	{
		$sql = "SELECT ORDER_DATE from orders WHERE ORDER_ID = ?;";
		$query = $this->db->query($sql,$order_id);
		//$this->load->library('table');

		//echo $this->table->generate($query);
		if($query->num_rows() !=0)
		{
			return $query->result();
			// print_r($query->result());
		}
		else{
			return false;
		}
	}
}