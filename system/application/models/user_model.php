<?php 

class User_model extends Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function list_of_visitors()
	{
		$rows = $this->db->order_by("time","desc")->get("visitor")->result();
		return $rows;
	}
	
	function list_of_users()
	{
		$results = $this->db->order_by("time","desc")->get("user")->result();
		return $results;
	}
	
	
}
?>