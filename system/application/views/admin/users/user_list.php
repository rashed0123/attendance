<?php
	$this->load->view("admin/template/header");
	$this->load->view("admin/template/menu");
?>
<div id="content_main" class="clearfix">

    <div id="tabledata" class="section" style="float: left;width: 69%; margin-top: 0px;" >
			<h2 class="ico_mug">Users List</h2>
			<?php echo anchor("users/add_users","<button>Create New Admin/User</button>");?>	
			<?php echo anchor("users/list_of_users","<button>list of users</button>");?>
		<table id="table">
			<thead>
			<tr>
				<th><input type="checkbox" class="noborder" /></th>
				<th>Serial</th>
				<th>Username</th>
				<th>User Type</th>
				<th>Email</th>
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
						<td><?=$users->id;?></td>
						<td class="table_title"><?=$users->username;?></td>
						<td>
							<?php if($users->status == 1){echo "Super Admin";}elseif($users->status == 2){echo "Admin";}else{echo "User";}?>
						</td>
						<td class="table_title"><?=$users->email_adds;?></td>
						<td>
							<?php 
								echo anchor("users/users_details/".$users->id,"<img src='".base_url()."admin/img/ico_page.jpg'",array('alt'=>'Details'));
								echo anchor("users/users_edits/".$users->id,"<img src='".base_url()."admin/img/edit.jpg'",array('alt'=>'Edit'));
								echo anchor("users/users_delete/".$users->id,"<img src='".base_url()."admin/img/cancel.jpg'",array('alt'=>'Delete'));
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