<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Controller {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		//$this->load->library('session');
		$this->load->model('login_model');
	}
	
	public function index()
	{
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == false)
			{
				$this->load->view("login/login");
			}else
				{
					$result = $this->login_model->user_check($_POST);
					
					if($result)
						{
							$session_data = array(
								   'user_info'  => $result,
								   'user_status'  => $result->status,
								   'user_logged_in' => TRUE
								);
							$this->session->set_userdata($session_data);
							redirect('invoice');
							
						}
						else
						{
							$data['error_msg'] = 'Wrong Username or Password!';
							$this->load->view("login/login",$data);
						}
				}
		}else{
				$this->load->view("login/login");
			}
	}
	
	public function logout()
	{
		$userdata = array(
			'user_info'	=> '',
			'user_logged_in'=> '',
		);
		$this->session->unset_userdata($userdata);
		redirect("login");
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */