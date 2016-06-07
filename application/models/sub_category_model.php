<?php
class Sub_category_model extends CI_Model {


	function get_records()
	{
		$query = $this->db->get('sub_categories');
		return $query->result();
	}

	function create_sub_category($new_sub_category_insert_data)
	{

		$insert = $this->db->insert('sub_categories',$new_sub_category_insert_data);
		return $insert;
	}

	function delete_sub_category($sub_cat_id)
	{
		$this->db->where('SUB_CAT_ID',$sub_cat_id);
		$q = $this->db->delete('sub_categories');
		if(!$q)
		{
				 echo "<script>alert('You can not delete this sub category.May be you should think some foreign key constrains');</script>";

		}		
		return $q;
	}	
	function update_sub_category($new_sub_category_update_data,$sub_cat_id)
	{

		$this->db->where('SUB_CAT_ID', $sub_cat_id);
		return $this->db->update('sub_categories',$new_sub_category_update_data);
	}
}