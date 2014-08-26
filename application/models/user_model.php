<?php
    class User_model extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
		
		function get_all($limit=10000, $offset=0,$col='id',$order='asc')
        {
			$this->db->from('shop_users');
			$this->db->where('status',0);
			$this->db->order_by($col, $order);
			$this->db->limit($limit);
			$this->db->offset($offset);
            return $this->db->get();
        }
		public function countUser()
        {
			$this->db->where('status',0);
			$query = $this->db->get('shop_users');
			return $query->num_rows();
        }
		/* xoa */
		function delete($item_ids) {
        $this->db->where_in('id', $item_ids);
        return $this->db->update('shop_users', array('status' => 1));
		}
		function active() {
         $this->db->update('shop_users', array('status' => 0));
		}
		function save($user_data){
			$query= $this->db->insert('shop_users',$user_data); 
            if($query)
            {
                 return $this->db->insert_id();
            }
            else
            {
                return false;
            }
		}
		function get_info($id){
			$this->db->where('id',$id);
			$query = $this->db->get('shop_users');
			if($query->num_rows()==1)
			{
				return $query->row();
			}
			else return null;
		}
	function is_logged_in()
	{
		return $this->session->userdata('person_id')!=false;
	}
	function login($username, $password)
	{
		$query = $this->db->get_where('shop_users', array('user' => $username,'password'=>md5($password), 'status'=>0), 1);
		if ($query->num_rows() ==1)
		{
			$row=$query->row();
			$this->session->set_userdata('person_id', $row->id);
			return true;
		}
		return false;
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	function get_logged_in_employee_info()
	{
		if($this->is_logged_in())
		{
			return $this->get_info($this->session->userdata('person_id'));
		}
		
		return false;
	}
}
?>