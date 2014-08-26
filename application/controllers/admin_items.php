<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("secure_area.php");
class Admin_items extends Secure_area {
	public function __construct()
    {        parent::__construct();

    }
	function index()
	{		
		$config['base_url'] = site_url('admin_items/sorting');
		$config['total_rows'] = $this->Item->count_all();
		$config['per_page'] = $this->config->item('number_of_items_per_page') ? (int)$this->config->item('number_of_items_per_page') : 20; 
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['controller_name']=strtolower(get_class());
		$data['form_width']=$this->get_form_width();
		$data['total_rows'] = $this->Item->count_all();
		$data['per_page'] = $config['per_page'];
		$data['manage_table']=get_items_manage_table($this->Item->get_all($data['per_page']),$this);
		// $data['categories'] = $this->Category->get_all();
		$this->load->view('admin/items/manage',$data);
	}
	function sorting()
	{
		$search=$this->input->post('search');
		$per_page=$this->config->item('number_of_items_per_page') ? (int)$this->config->item('number_of_items_per_page') : 20;
		if ($search)
		{
			$config['total_rows'] = $this->Item->search_count_all($search);
			$table_data = $this->Item->search($search,$per_page,$this->input->post('offset') ? $this->input->post('offset') : 0, $this->input->post('order_col') ? $this->input->post('order_col') : 'name' ,$this->input->post('order_dir') ? $this->input->post('order_dir'): 'asc');
		}
		else
		{
			$config['total_rows'] = $this->Item->count_all();
			$table_data = $this->Item->get_all($per_page,$this->input->post('offset') ? $this->input->post('offset') : 0, $this->input->post('order_col') ? $this->input->post('order_col') : 'name' ,$this->input->post('order_dir') ? $this->input->post('order_dir'): 'asc');
		}
		$config['base_url'] = site_url('items/sorting');
		$config['per_page'] = $per_page; 
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['manage_table']=get_items_manage_table_data_rows($table_data,$this);
		echo json_encode(array('manage_table' => $data['manage_table'], 'pagination' => $data['pagination']));	
	}
	function view($item_id=-1)
	{
		   $data['item_info']=$this->Item->get_info($item_id);
		   $this->load->view('admin/items/form',$data);
	}
	function save(){
	
	}
	function get_form_width()
	{
		return 550;
	}
}
?>