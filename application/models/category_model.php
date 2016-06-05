<?php

class Category_model extends CI_Model {


	function get_records()
	{
		$query = $this->db->get('categories');
		return $query->result();
	}

	function create_category()
	{
		$new_category_insert_data = array(

				'CATEGORY_NAME' => $this->input->post('CATEGORY_NAME'),
				'CATEGORY_DESCRIPTION' => $this->input->post('CATEGORY_DESCRIPTION')
			);
		$insert = $this->db->insert('categories',$new_category_insert_data);
		return $insert;
	}


	function update_category()
	{
		$new_category_update_data = array(

				'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
				'CATEGORY_NAME' => $this->input->post('CATEGORY_NAME'),
				'CATEGORY_DESCRIPTION' => $this->input->post('CATEGORY_DESCRIPTION')
			);
		$this->db->where('CATEGORY_ID',$this->input->post('CATEGORY_ID') );
		$this->db->update('categories',$new_category_update_data);
	}
	function delete_category()
	{
		$this->db->where('CATEGORY_ID',$this->uri->segment(3));
		$q = $this->db->delete('categories');
		if(!$q)
		{
				 echo "<script>alert('You can not delete this category.May be you should think some foreign key constrains');</script>";

		}		
	}	
}