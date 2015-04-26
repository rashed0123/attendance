<div id="sidebar" class="right">
	<h2 class="ico_mug">Shortcuts Link</h2>
			<ul id="menu">
				<li>
					<a href="#" class="ico_page">Home</a>
					<ul>
						<li><?php echo anchor("admin_panel/dashboard","Dashboard");?></li>
					</ul>
					
					<a href="#" class="ico_posts"> Account</a>
					<ul>
						<li><?php echo anchor("profile/edit_profile","Edit Profile");?></li>
						<li><?php echo anchor("profile/view_profile","View Profile");?></li>
						<li><?php echo anchor("profile/ch_pass","Change Password");?></li>
					</ul>
					
					<a href="#" class="ico_rashed">Statistics</a>
					<ul>
						<li><?php echo anchor("users/statistics","My Statistics");?></li>
					</ul>
					
					<a href="#" class="ico_user">Attendence</a>
					<ul>
						<li><?php echo anchor("user_attendence/attendence","Attendence");?></li>
					</ul>
					<?php 
					
						if($this->session->userdata("user_status")==1)
						{
					?>
						<a href="#" class="ico_user">User Management</a>
						<ul>
							<li><?php echo anchor("users/add_users","Add User");?></li>
							<li><?php echo anchor("users/list_of_users","View User");?></li>
						</ul>
						
						
						<a href="#" class="ico_page">Reports</a>
						<ul>
							<li><?php echo anchor("reports/index","Reports");?></li>
						</ul>
						
					<?php
						}
						
						?>
					
				</li>
			</ul>
		</div><!-- end #sidebar -->