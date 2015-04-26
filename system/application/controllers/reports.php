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
		$this->load->library('form_validation');
		if($user_status == 1)
		{
			if($this->input->post('submit') == 'Get Reports')
			{
				$this->form_validation->set_value('from_date','From Date','trim|requited');
				$this->form_validation->set_value('to_date','To Date','trim|requited');
				$this->form_validation->set_value('report_type','Report Type','trim|requited');
				
				if($this->form_validation->run() == true)
				{
					//echo 'true';
				}else{
					$from_date  = date('Y-m-d',strtotime($this->input->post('from_date')));
					
                                        $to_date    = date('Y-m-d',strtotime($this->input->post('to_date')));
                                        
                                        $result = $this->db->query("Select * from attendence inner join user where attendence.userid = user.id and 
                                            attendence.date >= '".$from_date."' and attendence.date <= '".$to_date."'")->result();
                                        //echo $this->db->last_query();
//                                        print_r($result);
//                                        exit;
                                        if($this->input->post('report_type')== 1)
                                        {
                                            header("Content-type: text/csv");
                                            header("Content-Disposition: attachment; filename=attendance_report.csv");
                                            header("Pragma: no-cache");
                                            header("Expires: 0"); 
                                            $p = array();

                                            $col = array("User ID", "Username", "Full Name", "Date", "In-time", "Out-time", "Mobile");

                                            array_push($p,$col);
                                            
                                            foreach($result as $queries){
		
                                                $foreach = array();

                                                $foreach[] = $queries->userid; 

                                                $foreach[] = $queries->username; 

                                                $foreach[] = $queries->full_name;

                                                $foreach[] = date('m/d/Y',strtotime($queries->date));
                                                
                                                $foreach[] = $queries->intime;
                                                
                                                $foreach[] = $queries->outtime;
                                                
                                                $foreach[] = $queries->mobile;

                                                

                                            array_push($p,$foreach);
                                        }
                                        
                                        $data = $p;
                                        $this->outputCSV($data);
                                    }
                                    
                                    if($this->input->post('report_type')== 2)
                                    {
                                        $this->load->library('mpdf/mpdf');
                                        $mpdf = new mPDF();

                                        $data['query'] = $result;

                                        $html = $this->load->view('admin/reports/report_pdf', $data, true);
                                        $mpdf->SetHTMLHeader('Rokeya IT LTD
                                                                        <div style="text-indent: -1999px;">Attendance Report</div>
                                                        <h2 style="text-align:center;text-decoration:underline;margin-bottom: 0px;color: #000000;font-size: 15px;">Attendance Report</h2>

                                                                <div style="clear: both"></div>
                                                        ');
                                        $mpdf->WriteHTML($html);		
                                        $mpdf->SetHTMLFooter('');

                                        $mpdf->Output("Attendance Reports.pdf",'D');

                                        exit;
                                        

//                                        array_push($p,$col);

//                                        foreach($result as $queries){
//
//                                            $foreach = array();
//
//                                            $foreach[] = $queries->userid; 
//
//                                            $foreach[] = $queries->username; 
//
//                                            $foreach[] = $queries->full_name;
//
//                                            $foreach[] = date('m/d/Y',strtotime($queries->date));
//
//                                            $foreach[] = $queries->intime;
//
//                                            $foreach[] = $queries->outtime;
//
//                                            $foreach[] = $queries->mobile;
//
//                                            array_push($p,$foreach);
//                                        }

                                   
                                    }
				}
                                exit;
			}
			
			$this->load->view('admin/reports/report_form');
			
		}else{
			redirect("admin_panel/dashboard");
		}
    }
    
    function outputCSV($data) 
    {
        $output = fopen("php://output", "w");
        foreach ($data as $row) {
        	fputcsv($output, $row);
	}
	fclose($output);
    }
    
    
}
?>