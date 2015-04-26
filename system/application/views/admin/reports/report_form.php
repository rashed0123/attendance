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
			<h2 class="ico_mug">Attendance Reports</h2>
			<?php
			
				$from_date	= form_error('from_date');
				$to_date 	= form_error('to_date');
				$report_type		= form_error('report_type');
				
				if(!empty($from_date))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$from_date).'</span></div>';
				}
				
				if(!empty($to_date))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$to_date).'</span></div>';
				}
				
				if(!empty($report_type))
				{
					echo '<div id="warning" class="info_div"><span class="ico_error">'.str_replace('<p>','',$report_type).'</span></div>';
				}
				
				if(!empty($success))
				{
					echo '<div id="success" class="info_div"><span class="ico_success">'.$success.'</span></div>';
				}
				
				$att = array(
					'id' 		=> "form",
					'class' 	=> 'form',
					/* 'onsubmit' 	=> 'return valid_form();' */
				);
				echo form_open("reports/index",$att);
			?>
				
				
				<label><strong>From Date</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'from_date',
				  'id'		=> 'from_date',
				  'required' => '1'
				);
				echo form_input($data);
			?>
			<br />
			<br />
			<label><strong>To Date</strong></label>
			<?php 
				$data = array(
				  'name'    => 'to_date',
				  'id'		=> 'to_date',
				  'required' => '1'
				);
				echo form_input($data);
			?>
			<br />
			<br />
			<label><strong>Select Report Type(CSV/PDF)</strong></label>
				<select name="report_type" id="report" required>
					<option value="">Select One</option>
					<option value="1">CSV</option>
					<option value="2">PDF</option>
				</select>
			<br />
			<br />
			
			<?php 
				$data = array(
					"name"	=> "submit",
					"id" 	=> "save",
					"value" => "Get Reports",
				);
		
				echo form_submit($data);
			
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