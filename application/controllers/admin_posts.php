<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("secure_area.php");
class Admin_posts extends Secure_area {
	public function __construct()
    {        parent::__construct();
			
    }
	function index()
	{		
		$data['intro'] = $this->Post->get_info(1);
		$this->load->view('admin/posts/manage',$data);
	}
	function save($id= -1){
		$post_array = array(
			'content'=> $this->input->post('txt_content'),
		);
		$this->Post->save($id,$post_array);
		redirect('admin_posts');
	}
}
?>