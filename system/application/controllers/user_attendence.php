<?php

class User_attendence extends Controller {
	
	function __construct()
	{
		parent::Controller();
		$this->load->library('session');
        
        $user = $this->session->userdata('user_info');
		
		if(!isset($user) || $user=='' || empty($user))
		{
			redirect('admin_panel');
		}
		
		$this->load->helper('text');
		$this->load->library("form_validation");
	}
	
	function index()
	{
		redirect("user_attendence/attendence");
	}
	
	
	public function attendence()
	{
		if(isset($_POST['submit']))
		{
			$user_id 	 = $this->input->post('userid');
			$todays_date = date("Y-m-d");
			$today 		 = strtotime($todays_date);
			$todays_time =  date("h:i:s",time()+(6*60*60));
			$atten_id	 = $this->input->post('atten_id');
			
				if($_POST['submit']== "IN")
				{
					$data_insert = array(
						"userid"	=> $user_id,
						"intime"	=> $todays_time,
						"date"		=> date("Y-m-d",$today),
					);
					$this->db->insert("attendence",$data_insert);
					$success = "Your INTIME Have been Successfully.";
						
				}else{
					$data_update = array(
						"outtime"	=> $todays_time,
					);
					$this->db->where("id",$atten_id)->update("attendence",$data_update);
					$success = "Your OUTTIME Have been Successfully.";
						
				}
			
				$query = $this->db->query("select * from attendence where userid='".$user_id."' and date='".date('Y-m-d')."' and outtime='00:00:00'")->row();
				
				$data = array('query'=> $query,'user_id'=>$user_id,'success'=>$success);
				
				$this->load->view("admin/attendence/index",$data);
		}else{
			$userid = $this->session->userdata('user_id');
			$query = $this->db->query("select * from attendence where userid='".$userid."' and date='".date('Y-m-d')."' and outtime='00:00:00'")->row();
			
			$data = array('query'=> $query,'user_id'=>$userid);
			$this->load->view("admin/attendence/index",$data);
		}
	}
	
}
?>