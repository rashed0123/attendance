<?php
	$this->load->view("admin/template/header");
	$this->load->view("admin/template/menu");
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#from_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat : 'dd-mm-yy'
    });
    $( "#to_date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat : 'dd-mm-yy',
    });
  });
  </script>
	<script type="text/javascript">
		function valid_form()
		{
			var from_date = $("#from_date").val().trim();
			var to_date = $("#to_date").val().trim();
			if(from_date)
                        {
                                if(to_date)
                                {
                                    
                                    if(to_date >= from_date)
                                    {
                                        return true;
                                    }else{
                                        alert("Select Valid date.");
                                        return false;
                                    }
                                    
                                }else{
                                        alert("Select To date");
                                        return false;
                                }
                        }else{
                                alert("Select From date");
                                return false;
                        }
		} 
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
					'onSubmit' 	=> 'return valid_form();'
				);
				echo form_open("reports/index",$att);
			?>
				
				
				<label><strong>From Date</strong></label>
			<?php 
				$data = array(
				  'name'   	=> 'from_date',
				  'id'		=> 'from_date',
                                    'readonly'  => 1,
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
                                     'readonly'  => 1,
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