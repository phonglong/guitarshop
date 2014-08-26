<?php
class Post extends CI_Model
{
	/*
	Determines if a given item_id is an item
	*/
	function get_info($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('news');
		return $query->row();
	}
	function save($id,$post_array){
		$this->db->where('id',$id);
		$this->db->update('news',$post_array);
	}
}
?>