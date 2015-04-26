<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_panel extends Controller {

	
	function __construct()
	{
		parent::Controller();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model("admin_model");
	}
	
	function index()
	{
		$this->load->view('admin/login');
	}
	
	public function login()
	{
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
			if ($this->form_validation->run() == false)
			{
				$this->load->view("admin/login");
			}else
				{
					$this->load->model("login_model");
					$result = $this->login_model->user_check($_POST);
					
					if($result)
						{
							$session_data = array(
									'user_info' 	=> $result->username,
									'user_id' 		=> $result->id,
									'user_status'  	=> $result->status,
									'user_up_time' 	=> $result->update_time,
									'user_logged_in'=> TRUE
								);
							$this->session->set_userdata($session_data);
							redirect('admin_panel/dashboard');
							
						}
						else
						{
							$data['error_msg'] = 'Wrong Username or Password!';
							$this->load->view("admin/login",$data);
						}
				}
		}else{
				redirect('admin_panel');
			}
	}
	
	function dashboard()
	{
		$user = $this->session->userdata('user_info');
		if(!isset($user) || $user=='' || empty($user))
		{
			redirect('admin_panel');
		}
		
		$data = array(
			"user" 			=> $this->admin_model->user_count(),
			"admin" 		=> $this->admin_model->admin_count(),
			"super_admin" 	=> $this->admin_model->super_admin_count(),
			"admin_panel"	=> $this->admin_model->admin_panel(),
		);
		
		$this->load->view("admin/dashboard/dashboard",$data);
		//$this->load->view("admin/index");
	}
	
	function logout()
	{
		$sessiondata = array(
		   'user_info'  => '',
		   'user_logged_in' => ''
		);
		$this->session->unset_userdata($sessiondata);
		redirect('admin_panel');
	}
	
	
	
}

/* End of file admin_panel.php */
/* Location: ./system/application/controllers/admin_panel.php */