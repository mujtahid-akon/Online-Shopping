<?php
/**
* 
*/
class Customers_order_model extends CI_Model
{
	
	function get_orders()
	{
		$sql= "SELECT * from orders WHERE CUSTOMER_ID= ? ORDER BY ORDER_ID DESC;";
		if(isset($this->session->userdata('user_info')->CUSTOMER_ID)){
			$query = $this->db->query($sql, $this->session->userdata('user_info')->CUSTOMER_ID );
		
			if($query->num_rows() !=0)
			{
				return $query->result();
			}
			else{
				return false;
			}
		}
	}

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
			return $query;
			// print_r($query->result());
		}
		else{
			return false;
		}
	}
	function get_name_addr($order_id)
	{
		$sql = "SELECT CONCAT_WS(' ', c.FIRST_NAME, c.LAST_NAME) c_name,CONCAT_WS(' ', c.ADDRESS, c.CITY) c_address
				FROM orders o JOIN (customers c)
				ON (c.CUSTOMER_ID=o.CUSTOMER_ID)
				WHERE o.ORDER_ID = ?;";
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
	//============ alternative to procedure function with same name====
	// function get_order_status($order_id)
	// {
	// 	$sql = "SELECT os.STATUS o_status
	// 			FROM orders o JOIN (order_status os)
	// 			ON (o.ORDER_ID = os.ORDER_ID)
	// 			WHERE o.ORDER_ID = ?;";
	// 	$query = $this->db->query($sql,$order_id);
	// 	//$this->load->library('table');

	// 	//echo $this->table->generate($query);
	// 	if($query->num_rows() !=0)
	// 	{
	// 		return $query->result();
	// 		// print_r($query->result());
	// 	}
	// 	else{
	// 		return false;
	// 	}
	// }
	//=================================================================

	//===========    PROCEDURE ============
	function get_order_status($order_id)
	{
		//$sql = "SET @p0=?; CALL `get_order_status`(@p0, @p1); SELECT @p1 AS `o_status`;";
		$this->db->query("SET @p0=?;",$order_id);
		$this->db->query(" CALL `get_order_status`(@p0, @p1);");
		$query = $this->db->query("SELECT @p1 AS `o_status`;");
		//print_r($query->result() );
		//echo $query->result()[0]->o_status;
		if($query->num_rows() !=0)
		{
			return $query->result();
			// print_r($query->result());
		}
		else{
			return false;
		}
	}
	//=====================================

	//
	function total_order_price($order_id)
	{
		//SET @p0='51'; SELECT `grand_total`(@p0) AS `grand_total`;
		$this->db->query("SET @p0=?;",$order_id);
		$query = $this->db->query("SELECT `grand_total`(@p0) AS `grand_total`;");
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

