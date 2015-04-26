<?php
	$this->load->view("admin/template/header");
	$this->load->view("admin/template/menu");
?>
	

	<div id="content_main" class="clearfix">
		<div id="tabledata" class="section" style="float: left;width: 69%; margin-top: 0px;" >
			<h2 class="ico_mug">Your Attendence</h2>
				
			
			<fieldset>
			<legend>Attendence</legend>
			<?php
			if(!empty($success))
				{
					echo '<div id="success" class="info_div"><span class="ico_success">'.str_replace('<p>','',$success).'</span></div>';
				}
				
				$att = array(
					'id' 		=> "form",
					'class' 	=> 'form',
					/* 'onsubmit' 	=> 'return valid_form();' */
				);
				echo form_open("user_attendence/attendence",$att);
			?>
			<label><strong>Date</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'todays_date',
				  'id'		=> 'todays_date',
				  'value'	=>  date("d-m-Y"),
				  'size'    => '48',
				  'readonly'=> 'readonly',
				);
				echo form_input($data);
			?>
			
			<br />
			<input type="hidden" name="userid" id="userid" value="<?=$user_id?>">
			<input type="hidden" name="atten_id" id="atten_id" value="<?php if(!empty($query->id)) {echo $query->id;}?>">
			<label><strong>Time</strong></label>
			<?php
				$time = time()+(6*60*60);
				$data = array(
				  'name'   	=> 'todays_time',
				  'id'		=> 'todays_time',
				  'value'	=>  date("h:i:s",$time),
				  'size'    => '48',
				  'readonly'=> 'readonly',
				);
				echo form_input($data);
			?>
			
			<br />
			<br />
			
			<?php
				if(!empty($query))
					{
						$value = "OUT";
					}else{
						$value = "IN";
					}
				
				
				$data = array(
					"name"	=> "submit",
					"id" 	=> "save",
					"value" => $value,
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
			</fieldset>
		</div>
		<?php
			$this->load->view("admin/template/sidebar");
		?>
	</div>
	
<?php
		$this->load->view("admin/template/footer");
	?>