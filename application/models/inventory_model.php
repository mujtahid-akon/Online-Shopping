<?php

class inventory_model extends CI_Model {


	//==========changed by mujtahid ===========
	
	function get_orders()
	{
		$this->db->where('STATUS', 0);
		$query = $this->db->get('inventory_orders');
		return $query->result();
	}

	function get_prev_orders()
	{
		$this->db->where('STATUS', 1);
		$query = $this->db->get('inventory_orders');
		return $query->result();
	}	

	function insert_order($new_order_insert_data, $product_id)
	{
		echo $product_id;
		echo " ";
		echo $new_order_insert_data['AMOUNT'];
		$this->db->set('DATE', 'NOW()', FALSE);
		$this->db->insert('inventory_orders', $new_order_insert_data);
		echo " ";
		echo $this->db->insert_id();
		//return $this->db->insert_id();

		$amount=1;
		$this->db->set('STATUS', $amount, FALSE);
		$this->db->where('PRODUCT_ID',$product_id );
		$this->db->update('products');
	}

	function delete_order($inv_order_id)
	{
		$this->db->where('INV_ORDER_ID',$inv_order_id);
		$q = $this->db->delete('inventory_orders');
		if(!$q)
		{
				 echo "<script>alert('You can not delete this order.May be you should think some foreign key constrains');</script>";

		}
	}

	function set_prev_order($inv_order_id)
	{
		$amount=1;
		$this->db->set('STATUS', $amount, FALSE);
		$this->db->where('INV_ORDER_ID',$inv_order_id );
		$this->db->update('inventory_orders');
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

}