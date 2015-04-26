<?php
class Reports extends Controller {
    
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
        $user_status = $this->session->userdata('user_status');
		
		if($user_status == 1)
		{
			if($this->input->post('submit') == 'Get Reports')
			{
				$this->form_validation->set_values('from_date','From Date','trim|requited');
				$this->form_validation->set_values('to_date','To Date','trim|requited');
				$this->form_validation->set_values('report_type','Report Type','trim|requited');
				
				if($this->form_validation->run() == true)
				{
					
				}else{
					
				}
			}
			
			$this->load->view('admin/reports/report_form');
			
		}else{
			redirect("admin_panel/dashboard");
		}
    }
    
    
}
?>