<?php
	echo doctype('html4-strict');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php 
		$title = "The RS Software";
		echo title($title);
		
		$meta = array(
				array('name' => 'description', 'content' => ''),
				array('name' => 'keywords', 'content' => ''),
				array('name' => 'robots', 'content' => 'index,follow'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
		echo meta($meta); 
	?>


	<!--[if IE]>
	<?php echo link_tag("admin/css/ie.css"); ?>
	<![endif]-->
    
	<?php
		echo link_tag("admin/css/style.css");
		echo link_tag("admin/css/css/smoothness/jquery-ui-1.7.1.custom.css");
	?>
	<!--[if IE]>
		<style type="text/css">
		  .clearfix {
		    zoom: 1;     /* triggers hasLayout */
		    display: block;     /* resets display for IE/Win */
		    }  /* Only IE can see inside the conditional comment
		    and read this CSS rule. Don't ever use a normal HTML
		    comment inside the CC or it will close prematurely. */
		</style>
	<![endif]-->
	<!-- JavaScript -->
    <script type="text/javascript" src="<?=base_url();?>admin/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>admin/js/jquery-ui-1.7.1.custom.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>admin/js/custom.js"></script>
	<script type="text/javascript">
		function check_valid()
		{
			
			var user = $("#user_login").val().trim();
			var pass = $("#user_pass").val().trim();
			if(user)
				{
					if(pass)
					{
						return true;
					}else{
						alert("Enter Your Password.");
						return false;
					}
				}else{
					alert("Enter Your Username.");
					return false;
				}
			
		}
   </script>
	</head>
	 <!--[if IE]><script language="javascript" type="text/javascript" src="<?=base_url();?>admin/js/excanvas.pack.js"></script><![endif]-->

<body>
<div  id="login_container">
    <div  id="header">
   
		<div id="logo"><h1><?php echo anchor("admin_panel","The RS SOFTWARE");?></h1></div>
		
    </div><!-- end header -->
	   
	    <div id="login" class="section">
				<?php
					$user = form_error("username");
					$pass = form_error("password");
					if(!empty($user))
					{
				?>
				<div id="fail" class="info_div">
					<span class="ico_cancel"><?php echo str_replace("<p>","",$user);?></span>
				</div>
				<?php
				}if(!empty($pass))
					{
				?>
				<div id="fail" class="info_div">
					<span class="ico_cancel"><?php echo str_replace("<p>","",$pass);?></span>
				</div>
				<?php
				}if(!empty($error_msg))
					{
				?>
				<div id="fail" class="info_div">
					<span class="ico_cancel"><?php echo $error_msg;?></span>
				</div>
				<?php
				}
				?>
				
	    	<?php 
				$attributes = array(
					"name"	=> "loginform",
					"id" 	=> "loginform",
					"onSubmit" => "return check_valid();",
					);
				echo form_open("admin_panel/login",$attributes);
			?>
			
			<label><strong>Username</strong></label>
			<?php 
				$data = array(
				  'name'        => 'username',
				  'id'          => 'user_login',
				  'class'       => 'input',
				  'maxlength'   => '100',
				  'value'		=> set_value("username"),
				  'size'        => '28',
				);
				echo form_input($data);
			?>
			<br />
			
			<label><strong>Password</strong></label>
			<?php 
				$data = array(
				  'name'        => 'password',
				  'id'          => 'user_pass',
				  'class'       => 'input',
				  'maxlength'   => '100',
				  'size'        => '28',
				);
				echo form_password($data);
			?>
			<br />
			
			<strong>Remember Me</strong>
			<?php 
				$data = array(
				  'name'        => 'remember',
				  'id'          => 'remember',
				  'class'       => 'input noborder',
				);
				echo form_checkbox($data);
			?>
			<br />
			
			<?php 
				$data = array(
				  'name'        => 'submit',
				  'id'          => 'save',
				  'class'       => 'loginbutton',
				  'value'		=> 'Log In'
				);
				echo form_submit($data);
			?>
			
			<?=form_close();?>
			
			<?php echo anchor("admin_panel/forget_password","Forgot your username or password?",array("id"=>"passwordrecoverylink"));?>
			
	    </div>

</div><!-- end container -->

</body>
</html>
