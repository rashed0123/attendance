<?php
class users extends Controller {
    
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
        $this->load->model("user_model","um");
	}
    
    function index()
    {
        redirect("users/list_of_visitor");
    }
    
    
    function list_of_visitor()
    {
        $user_list = array(
            "user" => $this->um->list_of_visitors(),
        );
        
        $this->load->view("admin/visitor/user_list",$user_list);
    }
    
    public function delete($visitor_id=NULL)
    {
        $this->db->where("id",$visitor_id)->delete("visitor");
        redirect("users/list_of_users");
    }
	
	public function add_users()
	{
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_username_check');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			
			if($this->form_validation->run() != true)
			{
				$this->load->view("admin/users/add_user");
			}else{
					$user_data = array(
						"username" 	=> $this->input->post('username'),
						"password" 	=> $this->input->post('password'),
						"status" 	=> $this->input->post('status'),
					);
					$this->db->insert('user',$user_data);
					
					$data = array(
						"success" => "The ".$this->input->post('username')." user have been successfully add.",
					);
					$this->load->view("admin/users/add_user",$data);
				}
		}else{
			$this->load->view("admin/users/add_user");
		}
	}
	
	function username_check($username)
	{
		$row = $this->db->where("username",$username)->get("user")->row();
		
		if ($row)
		{
			$this->form_validation->set_message('username_check', 'The %s is already exits.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function list_of_users()
	{
		$user_list = array(
            "user" => $this->um->list_of_users(),
        );
        $this->load->view("admin/users/user_list",$user_list);
	}
	
	public function users_details($id=NULL)
	{
		$user_details = $this->db->where("id",$id)->get("user")->row();
		
		$user = array(
			"check" => "1",
			"info"  => $user_details,
		);
		$this->load->view("admin/users/user_profile",$user);
	}
	
	public function users_edits($id=NULL)
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
				$this->load->view("admin/users/user_profile",$user);
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
				$this->load->view("admin/users/user_profile",$user);
			}
		}else{
			
			$user_details = $this->db->where("id",$id)->get("user")->row();
			
			$user = array(
				"info"  => $user_details,
			);
			$this->load->view("admin/users/user_profile",$user);
		}
	}
	
	public function users_delete($user_id=NULL)
    {
        $this->db->where("id",$user_id)->delete("user");
        redirect("users/list_of_users");
    }
}
?>