<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("secure_area.php");
class Admin_home extends Secure_area {

	public function index()
	{
		
		$this->load->view('admin/home');
	}
	function logout()
	{
		$this->User_model->logout();
	}
}
?>