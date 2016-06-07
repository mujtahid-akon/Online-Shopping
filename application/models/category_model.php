<?php

class Category_model extends CI_Model {


	function get_records()
	{
		$query = $this->db->get('categories');
		return $query->result();
	}

	function create_category($new_category_insert_data)
	{

		$insert = $this->db->insert('categories',$new_category_insert_data);
		//echo "Printing insert ".$insert;
		return $insert;
	}


	function update_category($new_category_update_data,$cat_id)
	{
		$this->db->where('CATEGORY_ID', $cat_id );
		$result = $this->db->update('categories',$new_category_update_data);
		return $result;
	}
	function delete_category($CATEGORY_ID)
	{
		$this->db->where('CATEGORY_ID',$CATEGORY_ID);
		$q = $this->db->delete('categories');
		
		if(!$q)
		{
				 echo "<script>alert('You can not delete this category.May be you should think some foreign key constrains');</script>";

		}
		return $q;		
	}
}