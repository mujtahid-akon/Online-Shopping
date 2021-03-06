<?php
class Product_model extends CI_Model {


	function get_records()
	{
		$query = $this->db->get('products');
		return $query->result();
	}

	function create_product()
	{
		$new_product_insert_data = array(

				'OUTLET_ID' => $this->input->post('OUTLET_ID'),
				'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
				'SUB_CAT_ID' => $this->input->post('SUB_CAT_ID'),
				'PRODUCT_NAME' => $this->input->post('PRODUCT_NAME'),
				'UNIT_QUANTITY' => $this->input->post('UNIT_QUANTITY'),
				'BUY_UNIT_PRICE' => $this->input->post('BUY_UNIT_PRICE'),
				'SELL_UNIT_PRICE' => $this->input->post('SELL_UNIT_PRICE'),
				'DESCRIPTION' => $this->input->post('DESCRIPTION'),
				'PRODUCT_IN_STOCK' => $this->input->post('PRODUCT_IN_STOCK'),
				'PRODUCT_VENDOR' => $this->input->post('PRODUCT_VENDOR'),
				'RATING' => $this->input->post('RATING'),
				'IMAGE' => $this->input->post('IMAGE')
			);
		 $insert = $this->db->insert('products',$new_product_insert_data);
		 return $insert;
	}

	function update_product()
	{
		$new_product_update_data = array(

				'PRODUCT_ID' => $this->input->post('PRODUCT_ID'),
				'OUTLET_ID' => $this->input->post('OUTLET_ID'),
				'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
				'SUB_CAT_ID' => $this->input->post('SUB_CAT_ID'),
				'PRODUCT_NAME' => $this->input->post('PRODUCT_NAME'),
				'UNIT_QUANTITY' => $this->input->post('UNIT_QUANTITY'),
				'BUY_UNIT_PRICE' => $this->input->post('BUY_UNIT_PRICE'),
				'SELL_UNIT_PRICE' => $this->input->post('SELL_UNIT_PRICE'),
				'DESCRIPTION' => $this->input->post('DESCRIPTION'),
				'PRODUCT_IN_STOCK' => $this->input->post('PRODUCT_IN_STOCK'),
				'PRODUCT_VENDOR' => $this->input->post('PRODUCT_VENDOR'),
				'RATING' => $this->input->post('RATING'),
				'IMAGE' => $this->input->post('IMAGE')
			);
		$this->db->where('PRODUCT_ID',$this->input->post('PRODUCT_ID') );
		$this->db->update('products',$new_product_update_data);		
	}

	function delete_product()
	{
		$this->db->where('PRODUCT_ID',$this->uri->segment(3));
		$q = $this->db->delete('products');
		if(!$q)
		{
				 echo "<script>alert('You can not delete this product.May be you should think some foreign key constrains');</script>";

		}		
	}	
	function get($id)
	{
		$results = $this->db->get_where('products',array('PRODUCT_ID' =>$id))->result();
		$result = $results[0];		
		return $result;
	}	

}