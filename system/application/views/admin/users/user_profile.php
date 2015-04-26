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
			<h2 class="ico_mug"><?=$info->username."'s Profile";?> </h2>
				<?php echo anchor("users/users_edits/".$info->id,"<button>Edit This User</button>");?>	
				<?php echo anchor("users/add_users","<button>Create New Admin / User</button>");?>	
				<?php echo anchor("users/list_of_users","<button>list of users</button>");?>
			<?php
				if(!empty($check) && $check == 1)
				{
				
					if(!empty($success))
					{
						echo '<div id="success" class="info_div"><span class="ico_success">'.$success.'</span></div>';
					}
			?>
				<label><strong>Username (No changable)</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'username',
				  'id'		=> 'title',
				  'value'	=>  $info->username,
				  'size'    => '60',
				  'readonly'=> 'readonly',
				);
				echo form_input($data);
				echo br(2);
			?>
			
			
			<label><strong>Status</strong></label>
			<?php 
				$options = array(
					'0'   => 'User',
					'2'   => 'Admin',
					'1'   => 'Super Admin',
				);
		
				echo form_dropdown('status', $options, $info->status);
				echo br(2);
			?>
			
			<label><strong>Full Name</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'full_name',
				  'id'		=> 'full_name',
				  'value'	=>  $info->full_name,
				  'size'    => '60',
				  'readonly'=> 'readonly',
				);
				echo form_input($data);
				echo br(2);
			?>
			<label><strong>Address</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'address',
				  'id'		=> 'address',
				  'value'	=>  $info->address,
				  'cols'	=> '46',
				  'rows' 	=> '5',
				  'readonly'=> 'readonly',
				);
				echo form_textarea($data);
				echo br(2);
			?>
			<label><strong>Gender</strong></label>
				<?php
					if($info->gender == 1)
					{
						echo '<input type="radio" name="gender" value="1" checked="checked">Male';
					}else{
						echo '<input type="radio" name="gender" value="2" checked="checked">Female';
					}
				?>
				
			<?php 
				echo br(2);
			?>
			
			<label><strong>Mobile</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'mobile',
				  'id'		=> 'mobile',
				  'value'	=>  $info->mobile,
				  'size'    => '60',
				  'readonly'=> 'readonly',
				);
				echo form_input($data);
				echo br(2);
			?>
			
			<label><strong>Email Address</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'email_adds',
				  'id'		=> 'email_adds',
				  'value'	=>  $info->email_adds,
				  'size'    => '60',
				  'readonly'=> 'readonly',
				);
				echo form_input($data);
				echo br(2);
			?>
			<label><strong>Date Of Birth</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'date_birth',
				  'value'	=>  $info->date_birth,
				  'size'    => '60',
				  'readonly'=> 'readonly',
				);
				echo form_input($data);
				echo br(2);
			
			}else{
			
			
				$full_name 	= form_error('full_name');
				$gender		= form_error('gender');
				$mobile		= form_error('mobile');
				$email_adds	= form_error('email_adds');
				$date_birth	= form_error('date_birth');
				
				if(!empty($full_name))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$full_name).'</span></div>';
				}if(!empty($gender))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$gender).'</span></div>';
				}if(!empty($email_adds))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$email_adds).'</span></div>';
				}if(!empty($mobile))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$mobile).'</span></div>';
				}if(!empty($date_birth))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$date_birth).'</span></div>';
				}if(!empty($success))
				{
					echo '<div id="success" class="info_div"><span class="ico_success">'.$success.'</span></div>';
				}
				
				$att = array(
					'id' 		=> "form",
					'class' 	=> 'form',
					/* 'onsubmit' 	=> 'return valid_form();' */
				);
				echo form_open("users/users_edits",$att);
			?>
				
				
			<label><strong>Username (No changable)</strong>*</label>
			<?php 
				$data = array(
				  'name'   	=> 'username',
				  'id'		=> 'title',
				  'value'	=>  $info->username,
				  'size'    => '60',
				  'readonly'=> 'readonly',
				);
				echo form_input($data);
				echo br(2);
			?>
			
			<input type="hidden" name="user_id" value="<?=$info->id;?>">
			<label><strong>Status</strong></label>
			<?php 
				$options = array(
					'0'   => 'User',
					'2'   => 'Admin',
					'1'   => 'Super Admin',
                );
		
				echo form_dropdown('status', $options, $info->status);
				echo br(2);
			?>
			
			<label><strong>Full Name</strong> <span style="color: red">*</span></label>
			<?php 
				$data = array(
				  'name'   	=> 'full_name',
				  'id'		=> 'full_name',
				  'value'	=>  $info->full_name,
				  'size'    => '60',
				);
				echo form_input($data);
				echo br(2);
			?>
			<label><strong>Address</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'address',
				  'id'		=> 'address',
				  'value'	=>  $info->address,
				  'cols'	=> '46',
				  'rows' 	=> '5',
				);
				echo form_textarea($data);
				echo br(2);
			?>
			<label><strong>Gender</strong> <span style="color: red">*</span></label>
				<input type="radio" name="gender" value="1" <?php if($info->gender == 1) echo "checked='checked'";?> >Male
				<input type="radio" name="gender" value="2" <?php if($info->gender == 2) echo "checked='checked'";?> >Female
			<?php 
				echo br(2);
			?>
			
			<label><strong>Mobile</strong> <span style="color: red">*</span></label>
			<?php 
				$data = array(
				  'name'   	=> 'mobile',
				  'id'		=> 'mobile',
				  'value'	=>  $info->mobile,
				  'size'    => '60',
				);
				echo form_input($data);
				echo br(2);
			?>
			
			<label><strong>Email Address</strong> <span style="color: red">*</span></label>
			<?php 
				$data = array(
				  'name'   	=> 'email_adds',
				  'id'		=> 'email_adds',
				  'value'	=>  $info->email_adds,
				  'size'    => '60',
				);
				echo form_input($data);
				echo br(2);
			?>
			<label><strong>Date Of Birth</strong> <span style="color: red">*</span></label>
			<?php 
				$data = array(
				  'name'   	=> 'date_birth',
				  'id'		=> 'datepicker',
				  'value'	=>  $info->date_birth,
				  'size'    => '60',
				);
				echo form_input($data);
				echo br(2);
			?>
			<span style="color: red">*</span>All Fields are required.
			<?php 
			echo br(2);
				$data = array(
					"name"	=> "update",
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
			}
			?>
		</div>
		<?php
			$this->load->view("admin/template/sidebar");
		?>
	</div>
	
<?php
		$this->load->view("admin/template/footer");
	?>