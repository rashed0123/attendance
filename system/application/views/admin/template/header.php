<?php
	echo doctype('html4-strict');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<?php 
		$title = "Attendence::Rokeya IT LTD";
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
		echo link_tag("admin/css/superfish.css");
		echo link_tag("admin/css/smoothness/jquery-ui-1.7.1.custom.css");
		echo link_tag("admin/markitup/skins/markitup/style.css");
		echo link_tag("admin/markitup/sets/default/style.css");
		
	?>
	
	<!--[if IE 6]><link rel="stylesheet" href="admin/css/ie6.css" type="text/css" media="screen, projection" /><![endif]-->
	
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
    <script type="text/javascript" src="<?=base_url();?>admin/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>admin/js/jquery-ui-1.7.1.custom.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>admin/js/hoverIntent.js"></script>
	<script type="text/javascript" src="<?=base_url();?>admin/js/superfish.js"></script>
	<script type="text/javascript">
		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});

	</script>
	<script type="text/javascript" src="<?=base_url();?>admin/js/excanvas.pack.js"></script>
	<script type="text/javascript" src="<?=base_url();?>admin/js/jquery.flot.pack.js"></script>
    <script type="text/javascript" src="<?=base_url();?>admin/markitup/jquery.markitup.pack.js"></script>
	<script type="text/javascript" src="<?=base_url();?>admin/markitup/sets/default/set.js"></script>
  	<script type="text/javascript" src="<?=base_url();?>admin/js/custom.js"></script>

	 <!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.pack.js"></script><![endif]-->
	 
	 <script type="text/javascript">
        $(document).ready(function() {
            $('#btnAdd').click(function() {
                var num     = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
                var newNum  = new Number(num + 1);      // the numeric ID of the new input field being added
				
                // create the new element via clone(), and manipulate it's ID using newNum value
                var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
 
                // manipulate the name/id values of the input inside the new element
                newElem.children(':first').attr('id', 'name' + newNum).attr('name', 'name' + newNum);
 
                // insert the new element after the last "duplicatable" input field
                $('#input' + num).after(newElem);
 
                // enable the "remove" button
                $('#btnDel').attr('disabled','');
 
                // business rule: you can only add 5 names
               /*  if (newNum == 5)
                    $('#btnAdd').attr('disabled','disabled'); */
            });
 
            $('#btnDel').click(function() {
                var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
                $('#input' + num).remove();     // remove the last element
 
                // enable the "add" button
                $('#btnAdd').attr('disabled','');
 
                // if only one element remains, disable the "remove" button
                if (num-1 == 1)
                    $('#btnDel').attr('disabled','disabled');
            });
 
            $('#btnDel').attr('disabled','disabled');
        });
    </script>
</head>
<body>
<div class="container" id="container">
    <div  id="header">
    	<div id="profile_info">
			<img src="<?=base_url();?>admin/img/avatar.jpg" id="avatar" alt="avatar" />
			<p>Welcome <strong><?php echo $this->session->userdata("user_info");?></strong>. <?php echo anchor("admin_panel/logout","Log out?");?></p>
			<!--<p>System messages: 3. <a href="#">Read?</a></p>-->
			<p class="last_login">Last login: <?php echo $this->session->userdata("user_up_time");?></p>
		</div>
		<div id="logo"><h1><?php echo anchor("admin_panel/dashboard","Rokeya IT LTD");?></h1></div>
		
    </div><!-- end header -->
	    <div id="content" >