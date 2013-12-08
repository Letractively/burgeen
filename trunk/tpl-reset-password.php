<?phpsession_start();

/*
Template Name: Template Reset Password
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>
<head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/register.css' /></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script>$(document).ready(function(){$("#reset-form").submit(function() {//initial set to truevar valid = true; if($("#old_password").val() === ""){    valid = false;	$("#old_password").css("border-color","red");    alert('old password cannot be empty');}if($("#new_password_1").val() === ""){   valid = false;   $("#new_password_1").css("border-color","red");   alert('new password cannot be empty');}if($("#new_password_2").val() === ""){   valid = false;   $("#new_password_2").css("border-color","red");   alert('new password cannot be empty');}if($("#new_password_1").val() == $("#old_password").val()){   valid = false;   $("#old_password").css("border-color","red");   $("#new_password_2").css("border-color","red");   $("#new_password_1").css("border-color","red");   alert('old password and new password cannot be the same');}if(valid){//there is no error return true;   }else{  return false;}});});</script>	
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';
			endif; ?>">											
			<?php	if($_SESSION[login]=='success')	{				//you can login but want to change the password						?>			<div id="wrapper">						<Center>			<form action="<?php echo bloginfo('template_url') ?>/reset_process.php" method="POST" name="reset-form" id="reset-form" class="login-form">			<div class="header">			<h1><?php _e('Reset Password', APP_TD); ?></h1>						</div>						<?php						if($_SESSION[reset_password]=='failed'){						?>						<p style="color:red">your old password is wrong</p>												<?php						$_SESSION[reset_password]='';						}												?>				<div class="content">					<p>						Enter Old Password<br/>						<input type="password" class="input username" name="old_password" id="old_password" value="" />					</p>														<p>						Enter New Password<br/>						<input type="password" class="input username" name="new_password_1" id="new_password_1" value="" />					</p>					<p>						Enter New Password again<br/>						<input type="password" class="input username" name="new_password_2" id="new_password_2" value="" />					</p>									</div>					<div class="footer">												<input type="submit" class="button" name="register" value="<?php _e('RESET &rarr;', APP_TD); ?>" />											</div>							</form>								</div>			<?php }else {			//can't login because forgot password.			echo "<br><br>In order to reset the password, you have to login first..!!";			echo "<br>Contact the administrator if you forgot the password";			}			?>			
			<?php
				// CONTENT
				//the_content();

				echo '<div class="clear h20"><!-- --></div>';
				
				// PAGINATION
				wp_link_pages(array('before' => '<p><strong>'.__( 'Pages','pandathemes' ).':</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
				
				// COMMENTS ETC.
				if ( $theme_options['pages_metas'] == 'enable' ) : comments_template(); endif;

	endwhile;

		else : echo '<div class="contentbox w620"><h2>404</h2><p>'.__('Sorry, no posts matched your criteria.','pandathemes').'</p>';

	endif; ?>

	</div> <!-- end_of_contentbox -->

		<?php
			// SIDEBAR
			if ($sidebar == 'Buddy Sidebar') :
				include(TEMPLATEPATH.'/inc/sidebar_buddy.php');
			else :
				include(TEMPLATEPATH.'/inc/sidebar.php');
			endif;

	get_footer();

?>