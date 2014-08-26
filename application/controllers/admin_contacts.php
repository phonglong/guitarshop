<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once ("secure_area.php");
class Admin_contacts extends Secure_area {
	public function __construct()
    {        parent::__construct();
			
    }
	function index()
	{		
		
	}
	function get_num_unread(){
		$num = $this->Contact->get_num_unread();
		echo json_encode(array('num_unread' => $num));	
	}
}
?>