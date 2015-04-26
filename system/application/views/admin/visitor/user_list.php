<?php
	$this->load->view("admin/template/header");
	$this->load->view("admin/template/menu");
?>
<div id="content_main" class="clearfix">

    <div id="tabledata" class="section" style="float: left;width: 69%; margin-top: 0px;" >
			<h2 class="ico_mug">Visitor List</h2>
		<table id="table">
			<thead>
			<tr>
				<th><input type="checkbox" class="noborder" /></th>
				<th>Last Visit Date </th>
				<th>IP Address</th>
				<th>Total Visit</th>
				<th>Actions</th>
				
			</tr>
			</thead>
			<tbody>
			<?php
				if(!empty($user))
				{
					foreach($user as $users)
					{
					?>
					<tr>
						<td class="table_check">
							<?php
								$data = array(
									"class" => "noborder",
								);
								echo form_checkbox($data);
							?>
						</td>
						<td class="table_date"><?=$users->time;?></td>
						<td class="table_title"><?=$users->visitor_ip;?></td>
						<td class="table_date"><?=$users->total;?></td>
						<td>
							<img src="<?=base_url();?>admin/img/accept.jpg" alt="accepted"/>
							<?php 
								echo anchor("users/delete/".$users->id,"<img src='".base_url()."admin/img/cancel.jpg'",array('alt'=>'Delete'));
							?>
					</tr>
					
					<?php
					}
				}else{
				?>
				<tr>
					<td colspan="5" align="center">
						Have no any visitors.
					</td>
				</tr>
				
				<?php	
				}
			?>
			</tbody>
		</table>
			
			<div class="pagination">
				<span class="pages">Page 1 of 3&#8201;</span>
				<span class="current">1</span>
				<a href="#" title="2">2</a>
				<a href="#" title="3">3</a>
				<a href="#" >&raquo;</a>
			</div>
		
		</div> <!-- end #tabledata -->
		<?php
			$this->load->view("admin/template/sidebar");
		?>
	
</div>
	
	<?php
		$this->load->view("admin/template/footer");
	?>