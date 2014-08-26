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
	function get_num_unread(){
		$this->db->where('status',1);
		$query = $this->db->get('contacts');
		if($query->num_rows()>0){
		return $query->num_rows();
		}else return 0;
	}
}
?>