<div style="padding-top: 100px;">
<table style="border: 1px solid gray; font-size: 12px;min-height:450px;" cellpadding="2" cellspacing="0" width="100%">
	<tr>
		<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">User ID</td>
		<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">Username</td> 
		<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">Full Name</td> 
		<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">Date</td>
		<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">In-time</td>
		<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">Out-time</td>
		<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">Mobile</td>
	</tr>
	<?php
	if(!empty($query)){
	foreach($query as $queries){
	?>
		<tr>
			<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center"><?php echo $queries->userid;;?></td>
			<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center"><?php echo $queries->username;?></td> 
			<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center"><?php echo $queries->full_name;?></td> 
			<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">
			<?php 
				echo date('m/d/Y',strtotime($queries->date));
			?>
			</td>
			<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">
			<?php 
				echo $queries->intime;
				
				
				
			?>
			</td>
			<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">
			<?php 
				echo $queries->outtime;
				
				
				
			?>
			</td>
			<td style="border-bottom: 1px solid gray;border-right: 1px solid gray;" align="center">
			<?php 
				echo $queries->mobile;
			
			?>
			</td>
			
		</tr>
	<?php		
		
		}
	
	}
	?>
		
</table>
</div>