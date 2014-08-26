<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
    }
   
   function index()
	{
		if($this->User_model->is_logged_in())
		{
			redirect('admin_home');
		}
		else
		{
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('username', 'lang:login_undername', 'callback_login_check');
    	    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			if($this->form_validation->run() == FALSE)
			{
				include APPPATH.'config/database.php';
				
				//If we have a site configuration check to make sure the user has not cancelled
				if (isset($db['site']))
				{
					$site_db = $this->load->database('site', TRUE);
					
					if ($this->_is_subscription_cancelled($site_db))
					{
						if ($this->_is_subscription_cancelled_within_30_days($site_db))
						{
							$this->load->view('login/login', array('subscription_cancelled_within_30_days' => true));
						}
						else
						{
							$this->load->view('login/subscription_cancelled');
						}
					}
					else
					{
						$this->load->view('login/login');
					}
				}
				else
				{
					$this->load->view('login/login');
				}
			}
			else
			{
				redirect('admin_home');
			}
		}
	}
	
	function login_check($username)
	{
		$password = $this->input->post("password");	
		
		if(!$this->User_model->login($username,$password))
		{
			$this->form_validation->set_message('login_check', lang('login_invalid_username_and_password'));
			return false;
		}
		return true;		
	}
    
}
?>