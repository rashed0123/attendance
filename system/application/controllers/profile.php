<?php
class Profile extends Controller {
    
    function __construct()
	{
		parent::Controller();
        $this->load->library('session');
        
        $user = $this->session->userdata('user_info');
		if(!isset($user) || $user=='' || empty($user))
		{
			redirect('admin_panel');
		}
       $this->load->library('form_validation');
	}
    
    function index()
    {
        redirect("profile/view_profile");
    }
    
    
    function view_profile()
    {
        $id = $this->session->userdata('user_id');
		$user_details = $this->db->where("id",$id)->get("user")->row();
		
		$user = array(
			"check" => "1",
			"info"  => $user_details,
		);
		$this->load->view("admin/users/profile",$user);
    }
    
    public function edit_profile()
    {
        if(isset($_POST['update']))
		{
			$id = $this->input->post('user_id');
			
			$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
			$this->form_validation->set_rules('email_adds', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('date_birth', 'Date Of Birth', 'trim|required');
		
			if($this->form_validation->run() != true)
			{
				$user_details = $this->db->where("id",$id)->get("user")->row();
				$user = array(
					"info"  => $user_details,
				);
				$this->load->view("admin/users/profile",$user);
			}else{
				$user_data = array(
					"status" 	=> $this->input->post('status'),
					"full_name" => $this->input->post('full_name'),
					"address" 	=> $this->input->post('address'),
					"gender" 	=> $this->input->post('gender'),
					"email_adds"=> $this->input->post('email_adds'),
					"mobile"	=> $this->input->post('mobile'),
					"date_birth"=> $this->input->post('date_birth'),
				);
				$this->db->where('id',$id)->update("user",$user_data);
				$user_details = $this->db->where("id",$id)->get("user")->row();
				$user = array(
					"check"	=> "1",
					"info"  => $user_details,
					"success"  => "Your Profile has been updated.",
				);
				$this->load->view("admin/users/profile",$user);
			}
		}else{
			$id = $this->session->userdata('user_id');
			$user_details = $this->db->where("id",$id)->get("user")->row();
			
			$user = array(
				"info"  => $user_details,
			);
			$this->load->view("admin/users/profile",$user);
		}
    }
	
	public function email_add($email_add)
	{
		$row = $this->db->where("email_adds",$email_add)->get("user")->row();
		
		if ($row)
		{
			$this->form_validation->set_message('email_add', 'The %s is already exits.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function ch_pass()
	{
		$id = $this->session->userdata('user_id');
		$user_details = $this->db->where("id",$id)->get("user")->row();
		
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('old_password', 'Current Password', 'trim|required|md5');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]|max_length[12]|matches[re_password]');
			$this->form_validation->set_rules('re_password', 'Retype Password', 'trim|required');
		
			if($this->form_validation->run() != true)
			{
				$this->load->view("admin/users/ch_pass");
			}else{
				$id = $this->session->userdata('user_id');
				$user_details = $this->db->where("id",$id)->get("user")->row();
					if($user_details)
					{
						$current_pass = $this->input->post("old_password");
						$current_data = $user_details->password;
							if($current_data == $current_pass)
							{
								$update = array("password"=> md5($this->input->post("new_password")));
								$this->db->where("id",$id)->update("user",$update);
								
								$data = array('success'=>"Your Password has been changes.");
								$this->load->view("admin/users/ch_pass",$data);
							}else{
								$data = array('error'=>"Current Password does not matches.");
								$this->load->view("admin/users/ch_pass",$data);
							}
					}
				
				/* $save = $this->cm->save_semester($_POST);
				redirect("courses/list_of_semesters"); */
			}
		}else{
			$this->load->view("admin/users/ch_pass");
		}
		
	}
}
?>