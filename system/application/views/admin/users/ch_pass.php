<?php
	$this->load->view("admin/template/header");
	$this->load->view("admin/template/menu");
?>
	<script type="text/javascript">
	function valid_form()
		{
			var old = $("#old").val().trim();
			var new_p = $("#new").val().trim();
			var renew = $("#renew").val().trim();
			if(old)
				{
					if(new_p)
					{
						if(renew)
						{
							return true;
						}else{
							alert("Enter Retype Password");
							return false;
						}
					}else{
						alert("Enter New Password");
						return false;
					}
				}else{
					alert("Enter Old Password.");
					return false;
				}
		}
	</script>

	<div id="content_main" class="clearfix">
		<div id="tabledata" class="section" style="float: left;width: 69%; margin-top: 0px;" >
			<h2 class="ico_mug">Change Password</h2>
				<?php echo anchor("profile/view_profile","<button>Profile</button>");?>	
				<?php echo anchor("profile/edit_profile","<button>Edit Profile</button>");?>	
			<?php
			
				$old_password	= form_error('old_password');
				$new_password 	= form_error('new_password');
				$re_password	= form_error('re_password');
				
				if(!empty($old_password))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$old_password).'</span></div>';
				}if(!empty($new_password))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$new_password).'</span></div>';
				}if(!empty($re_password))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$re_password).'</span></div>';
				}if(!empty($success))
				{
					echo '<div id="success" class="info_div"><span class="ico_success">'.$success.'</span></div>';
				}if(!empty($error))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.$error.'</span></div>';
				}
				
				$att = array(
					'id' 		=> "form",
					'class' 	=> 'form',
					'onsubmit' 	=> 'return valid_form();'
				);
				echo form_open("profile/ch_pass",$att);
			?>
				
				
			<label><strong>Current Password</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'old_password',
				  'id'		=> 'old',
				  'size'    => '50',
				);
				echo form_password($data);
			?>
			<br />
			
			<label><strong>New Password</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'new_password',
				  'id'		=> 'new',
				  'size'    => '50',
				);
				echo form_password($data);
			?>
			<br />
			
			<label><strong>Retype New Password</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 're_password',
				  'id'		=> 'renew',
				  'size'    => '50',
				);
				echo form_password($data);
			?>
			<br />
			<br />
			
			<?php 
				$data = array(
					"name"	=> "submit",
					"id" 	=> "save",
					"value" => "Update",
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