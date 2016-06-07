<?php

class needed_product_model extends CI_Model {


	//==========changed by mujtahid ===========

	function get_needed_product()
	{
		$array = array('STATUS' => 0, 'PRODUCT_IN_STOCK < ' => 20);
		$this->db->where($array);
		$query = $this->db->get('products');
		return $query->result();
	}	

	function update_product($product_id, $amount)
	{
		$this->db->where('PRODUCT_ID', $product_id);
		$q = $this->db->get('products');
		$data = $q->result_array();
		$amount=$amount+$data[0]['PRODUCT_IN_STOCK'];

		$this->db->set('PRODUCT_IN_STOCK', $amount, FALSE);
		$this->db->where('PRODUCT_ID',$product_id );
		$this->db->update('products');

		$amount=0;
		$this->db->set('STATUS', $amount, FALSE);
		$this->db->where('PRODUCT_ID',$product_id );
		$this->db->update('products');
	}

	function get_prev_order()
	{
		$array = array('STATUS' => 1, 'PRODUCT_IN_STOCK < ' => 20);
		$this->db->where($array);
		$query = $this->db->get('products');
		return $query->result();
	}

}