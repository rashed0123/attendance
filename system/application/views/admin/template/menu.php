<div id="top_menu" class="clearfix">
	    <ul class="sf-menu"> <!-- DROPDOWN MENU -->
			<li><?php echo anchor("admin_panel/dashboard","Dashboard");?></li>
			
			<li>
				<a href="#">Account</a>
				<ul>
					<li>
						<a href="#">Profile</a>
						<ul>
							<li><?php echo anchor("profile/edit_profile","Edit Profile");?></li>
							<li><?php echo anchor("profile/view_profile","View Profile");?></li>
						</ul>
					</li>
					<li>
						<a href="#">Password</a>
						<ul>
							<li><?php echo anchor("profile/ch_pass","Change Pass");?></li>
						</ul>
					</li>
					
				</ul>
			</li>
			
			<li><?php echo anchor("users/statistics","My Statistics");?><!-- First level MENU --></li>
			
			<li><?php echo anchor("user_attendence/attendence","Attendence");?><!-- First level MENU --></li>
			
		</ul>
			
		</div>