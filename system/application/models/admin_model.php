<?php 

class Admin_model extends Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function user_count()
	{
		$rows = $this->db->where("status","0")->get("user")->num_rows();
		return $rows;
	}
	
	function admin_count()
	{
		$rows = $this->db->where("status","2")->get("user")->num_rows();
		return $rows;
	}
	
	function super_admin_count()
	{
		$rows = $this->db->where("status","1")->get("user")->num_rows();
		return $rows;
	}
	
	function reports_count()
	{
		$rows = $this->db->get("reports")->num_rows();
		return $rows;
	}
	
	function notices_count()
	{
		$rows = $this->db->get("notices")->num_rows();
		return $rows;
	}
	
	function events_count()
	{
		$rows = $this->db->get("events")->num_rows();
		return $rows;
	}
	
	function visit_today()
	{
		$date = date("Y-m-d");
		$rows = $this->db->where("time",$date)->get("visitor")->num_rows();
		return $rows;
	}
	
	function active_reports()
	{
		$rows = $this->db->where("status","1")->get("reports")->num_rows();
		return $rows;
	}
	
	function active_notices()
	{
		$rows = $this->db->where("status","1")->get("notices")->num_rows();
		return $rows;
	}
	
	function active_events()
	{
		$rows = $this->db->where("status","1")->get("events")->num_rows();
		return $rows;
	}
	
	function admin_panel()
	{
		$date = date("Y-m-d");
		$rows = $this->db->where("update_time",$date)->where("status","1")->or_where("status","2")->get("user")->num_rows();
		return $rows;
	}
}
?>