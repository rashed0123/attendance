<?php

class Welcome extends Controller {

	
	function __construct()
	{
		parent::Controller();
		$ip_address = $_SERVER['SERVER_ADDR'];
		$row = $this->db->where("visitor_ip",$ip_address)->get("visitor")->row();
			if($row)
				{
					$total = $row->total+1;
					$data = array(
						"total"	=> $total,
						"time"	=> date("Y-m-d h:m:s"),
					);
					$this->db->where("visitor_ip",$ip_address)->update("visitor",$data);
			}else{
				$data = array(
					"visitor_ip"	=> $ip_address,
					"total"			=> 1,
					"time"			=> date("Y-m-d"),
				);
				$this->db->insert("visitor",$data);
			}
		$this->load->helper('text');
		$this->load->library("form_validation");
	}
	
	function index()
	{
		$result = $this->db->where("status","1")->order_by("time","desc")->get("home_table")->result();
		$home = array(
			"data" => $result,
		);
		$this->load->view('home/welcome_index',$home);
	}
	
	
	function notices_publications($id=NULL)
	{
		$this->load->library('cezpdf');
		$notices = $this->db->where("id",$id)->get("notices")->row();
		
		$this->cezpdf->ezText($notices->title, 12, array('justification' => 'center'));
		$this->cezpdf->ezSetDy(-10);

		$content = $notices->description;

		$this->cezpdf->ezText($content, 10);

		$this->cezpdf->ezStream();
		
		//$this->load->view('digital_it_net/digital_it_net_page');
	}
	
	function notice()
	{
		$notices = $this->db->where("status",1)->order_by("time","desc")->get("notices")->result();
		$data = array(
			"notices" => $notices,
			);
		$this->load->view('notice/index',$data);
	}
	
	function contact()
	{
		$this->load->view('contact/index');
	}
	
	
	function citizen_charter()
	{
		$this->load->view('citizen_charter/index');
	}
	
	function latest_events()
	{
		$this->load->helper("directory");
		$events = $this->db->where("status",1)->order_by("time","desc")->get("events")->result();
		$map	= directory_map('./events/');
		
		$data = array(
			"events" 	=> $events,
			"map"		=> $map,
			);
		$this->load->view('events/index',$data);
	}
	
	function events_download($file_name)
	{
		$this->load->helper("download");
		$data = file_get_contents('./events/'.$file_name);
		
		$file = str_replace("_"," ",$file_name);
		$files = strstr($file,"events");
		//$files_na = explode(".",$files);
		echo force_download($files,$data);
	}
	
	function events_publications($id=NULL)
	{
		$this->load->library('cezpdf');
		$events = $this->db->where("id",$id)->get("events")->row();
		
		$this->cezpdf->ezText($events->title, 12, array('justification' => 'center'));
		$this->cezpdf->ezSetDy(-10);

		$content = $events->description;

		$this->cezpdf->ezText($content, 10);

		$this->cezpdf->ezStream();
		
	
	}
	
	function send_email()
	{
		if(isset($_POST['submit']))
		{
		$this->form_validation->set_rules('user_name', 'Your Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		
		if($this->form_validation->run() != true)
				{
					$this->load->view("contact/index");
				}else
					{
						$this->load->library('email');
						
						$to 		= "rashed.0123@gmail.com";
						$user_name 	= $this->input->post("user_name");
						$email 		= $this->input->post("email");
						$message 	= $this->input->post("message");
						
						$this->email->from($email,$user_name);
						$this->email->to($to);
						$this->email->subject("This Email from Kuelight");
						$this->email->message($message);
						//$this->email->send();
						
						if($this->email->send()==true)
						{
							$data = array(
								'success'	=> 'Your message sent successfully.',
							);
							$this->load->view("contact/index",$data);
						}else{
							$this->load->view("contact/index");
						}
						
					}
		}else{
			$this->load->view("contact/index");
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */