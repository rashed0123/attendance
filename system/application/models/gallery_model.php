<?php
class Gallery_model extends Model {
	
	var $gallery_path;
	var $teachers_path;
	var $gallery_path_url;
	var $teachers_path_url;
	var $events_file;
	var $notices_file;
	
	function Gallery_model() {
		parent::Model();
		
		$this->gallery_path = 'F:\xampp\htdocs\kuelight\upload_images';
		$this->teachers_path = 'F:\xampp\htdocs\kuelight\teachers';
		$this->events_file = 'F:\xampp\htdocs\kuelight\events';
		$this->notices_file = 'F:\xampp\htdocs\kuelight\notices';
		//echo APPPATH . 'images';
		//echo "<br/>";
		$this->gallery_path_url = base_url().'upload_images/';
		$this->teachers_path_url = base_url().'teachers/';
		//$this->events_file_url = base_url().'events/';
		
	}
	
	function do_upload() {
		$content_id = $this->input->post("content_id");
		$row = $this->db->where("id",$content_id)->get("home_table")->row();
		if(!empty($row)){
		$image = $row->image;
		if(!empty($image)){
		unlink("upload_images/thumbs/".$image);
		unlink("upload_images/".$image);
		}
		}
		$file_name = explode(".",$_FILES["userfile"]["name"]);
		
		$config = array(
			'file_name'		=> time()."_".$content_id."_"."home",
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			return $error;
		}
		else
		{
			$image_data = $this->upload->data();
			
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				'width' => 174,
				'height' => 174
			);
		
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			
			$data_ima_name = array("image"=>$image_data['file_name']);
			$this->db->where("id",$content_id)->update("home_table",$data_ima_name);
			
		}
		
		
	}
	
	function his_do_upload() {
		$content_id = $this->input->post("content_id");
		$row = $this->db->where("id",$content_id)->get("history_table")->row();
		if(!empty($row)){
		$image = $row->image;
		if(!empty($image)){
		unlink("upload_images/thumbs/".$image);
		unlink("upload_images/".$image);
		}
		}
		$file_name = explode(".",$_FILES["userfile"]["name"]);
		
		$config = array(
			'file_name'		=> time()."_".$content_id."_"."history",
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			return $error;
		}
		else
		{
			$image_data = $this->upload->data();
			
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				'width' => 174,
				'height' => 174
			);
		
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			
			$data_ima_name = array("image"=>$image_data['file_name']);
			$this->db->where("id",$content_id)->update("history_table",$data_ima_name);
			
		}
		
		
	}
	
	function principal_do_upload(){
		$content_id = $this->input->post("content_id");
		$row = $this->db->where("id",$content_id)->get("principal")->row();
		if(!empty($row)){
		$image = $row->image;
		if(!empty($image)){
		unlink("upload_images/thumbs/".$image);
		unlink("upload_images/".$image);
		}
		}
		$file_name = explode(".",$_FILES["userfile"]["name"]);
		
		$config = array(
			'file_name'		=> time()."_".$content_id."_"."principal",
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			return $error;
		}
		else
		{
			$image_data = $this->upload->data();
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->gallery_path . '/thumbs',
				'maintain_ration' => true,
				'width' => 174,
				'height' => 174
			);
		
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			
			$data_ima_name = array("image"=>$image_data['file_name']);
			$this->db->where("id",$content_id)->update("principal",$data_ima_name);
			
		}
		
		
	}
	
	
	function teachers_do_upload() {
		$content_id = $this->input->post("content_id");
		$row = $this->db->where("id",$content_id)->get("teachers_details")->row();
		if(!empty($row)){
			$image = $row->photo_name;
				if(!empty($image))
				{
					unlink("teachers/".$image);
				}
		}
		$file_name = explode(".",$_FILES["userfile"]["name"]);
		
		$config = array(
			'file_name'		=> time()."_".$content_id."_".$row->name,
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->teachers_path,
			'max_size' => 1000
		);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			return $error;
		}
		else
		{
			$image_data = $this->upload->data();
			
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => $this->teachers_path . '/photo',
				'maintain_ration' => true,
				'width' => 225,
				'height' => 250
			);
		
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			
			$data_ima_name = array("photo_name"=>$image_data['file_name']);
			$this->db->where("id",$content_id)->update("teachers_details",$data_ima_name);
			@unlink("teachers/".$image_data['file_name']);
		}
		
		
	}
	
	function get_images() {
		
		$files = scandir($this->gallery_path);
		$files = array_diff($files, array('.', '..', 'thumbs'));
		
		$images = array();
		
		foreach ($files as $file) {
			$images []= array (
				'url' => $this->gallery_path_url . $file,
				'thumb_url' => $this->gallery_path_url . 'thumbs/' . $file
			);
		}
		
		return $images;
	}
	
	function events_file_upload()
	{
		$name = $this->input->post("name");
		$file_name = explode(".",$_FILES["userfile"]["name"]);
		
		$config = array(
			'file_name'		=> time()."events_".$name,
			'allowed_types' => 'doc|docx|pdf',
			'upload_path' => $this->events_file."\events",
			'max_size' => 1000
		);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			return $error;
		}
		
	}
	
	function notices_file_upload()
	{
		$name = $this->input->post("name");
		$file_name = explode(".",$_FILES["userfile"]["name"]);
		
		$config = array(
			'file_name'		=> time()."notices_".$name,
			'allowed_types' => 'doc|docx|pdf',
			'upload_path' => $this->notices_file,
			'max_size' => 1000
		);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			return $error;
		}
		
	}
	
	
	
}



