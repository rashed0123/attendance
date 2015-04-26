<?php
	$this->load->view("admin/template/header");
	$this->load->view("admin/template/menu");
?>
	<script type="text/javascript">
		/* function valid_form()
		{
			var title = $("#title").val().trim();
			var des = $("#des").val().trim();
			if(title)
				{
					if(des)
					{
						return true;
					}else{
						alert("Enter Home description");
						return false;
					}
				}else{
					alert("Enter Home Title.");
					return false;
				}
		} */
	</script>

	<div id="content_main" class="clearfix">
		<div id="tabledata" class="section" style="float: left;width: 69%; margin-top: 0px;" >
			<h2 class="ico_mug">Add New Admin/User</h2>
				<?php echo anchor("users/add_users","<button>Create New Admin/User</button>");?>	
				<?php echo anchor("users/list_of_users","<button>list of users</button>");?>	
			<?php
			
				$username	= form_error('username');
				$password 	= form_error('password');
				$status		= form_error('status');
				
				if(!empty($username))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$username).'</span></div>';
				}if(!empty($password))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$password).'</span></div>';
				}if(!empty($status))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$status).'</span></div>';
				}if(!empty($success))
				{
					echo '<div id="success" class="info_div"><span class="ico_success">'.$success.'</span></div>';
				}
				
				$att = array(
					'id' 		=> "form",
					'class' 	=> 'form',
					/* 'onsubmit' 	=> 'return valid_form();' */
				);
				echo form_open("users/add_users",$att);
			?>
				
				
				<label><strong>Username</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'username',
				  'id'		=> 'username',
				  'value'	=>  set_value("username"),
				  'size'    => '60',
				);
				echo form_input($data);
			?>
			<br />
			
			<label><strong>Default Password (abc123)</strong></label>
			<?php 
				$data = array(
				  'name'    => 'password',
				  'id'		=> 'password',
				  'size'    => '60',
				  'value'	=> ''
				);
				echo form_password($data);
			?>
			<br />
			
			<label><strong>Status</strong></label>
			<?php 
				$options = array(
					'0'   => 'User',
					'2'   => 'Admin',
					'1'   => 'Super Admin',
				);
		
				echo form_dropdown('status', $options,'0');
				echo br(2);
			?>
			
			
			<?php 
				$data = array(
					"name"	=> "submit",
					"id" 	=> "save",
					"value" => "Create",
				);
		
				echo form_submit($data);
			
				$data = array(
					"name"	=> "reset",
					"id" 	=> "save",
					"value" => "Clear",
				);
		
				echo form_reset($data);
			
				echo form_close();
			
			?>
		</div>
		<?php
			$this->load->view("admin/template/sidebar");
		?>
	</div>
	
<?php
		$this->load->view("admin/template/footer");
	?>