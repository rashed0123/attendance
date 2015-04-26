<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function user_check($array)
	{
		$username = $array['username'];
		$password = $array['password'];
		
		
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('user');
		
		if($query->num_rows()>0)
			{
			$row = $query->row();
				$data = array(
					"update_time" => date("Y-m-d"),
				);
				$this->db->where("id",$row->id)->update("user",$data);
			
			return $row;
			
			}
		else
			return false;
	}
}