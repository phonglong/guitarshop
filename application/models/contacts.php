<?php
class Contact extends CI_Model
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
	function save($contact_array){
		$query = $this->db->insert('contacts',$contact_array);
		if($query) return true;
		else return false;
	}
}
?>
