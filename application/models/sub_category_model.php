<?php
class Sub_category_model extends CI_Model {


	function get_records()
	{
		$query = $this->db->get('sub_categories');
		return $query->result();
	}

	function create_sub_category()
	{
		$new_sub_category_insert_data = array(

				'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
				'NAME' => $this->input->post('NAME'),
				'DESCRIPTION' => $this->input->post('DESCRIPTION')
			);
		$insert = $this->db->insert('sub_categories',$new_sub_category_insert_data);
		return $insert;
	}

	function delete_sub_category()
	{
		$this->db->where('SUB_CAT_ID',$this->uri->segment(3));
		$q = $this->db->delete('sub_categories');
		if(!$q)
		{
				 echo "<script>alert('You can not delete this sub category.May be you should think some foreign key constrains');</script>";

		}		
	}	
	function update_sub_category()
	{
		$new_sub_category_update_data = array(

				'SUB_CAT_ID' => $this->input->post('SUB_CAT_ID'),
				'CATEGORY_ID' => $this->input->post('CATEGORY_ID'),
				'NAME' => $this->input->post('NAME'),
				'DESCRIPTION' => $this->input->post('DESCRIPTION')
			);
		$this->db->where('SUB_CAT_ID',$this->input->post('SUB_CAT_ID') );
		$this->db->update('sub_categories',$new_sub_category_update_data);
	}
}