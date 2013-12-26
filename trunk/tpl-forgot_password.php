<?phpsession_start();

/*
Template Name: Template forgot password
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>
<head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/register.css' /></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><?phpif($_SESSION[email_error]==1){echo "</br></br>";echo "<center><font color=red>The email is not registered in our website</font>";$_SESSION[email_error]=2;}else if($_SESSION[email_error]==0){echo "</br></br>";echo "<center><font color=black>new password has been sent to your email</font>";$_SESSION[email_error]=2;}?>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';
			endif; ?>">								<div id="wrapper">						<Center>			<form action="<?php echo bloginfo('template_url') ?>/forgotpassword.php" method="POST" name="reset-form" id="reset-form" class="login-form">			<div class="header">			<h1><?php _e('Forgot Your Password ?', APP_TD); ?></h1>						</div>								<div class="content">					<p>						Enter Email Adress<br/>						<input type="email" class="input username" name="email_address" id="email_address" value="" />					</p>														</div>					<div class="footer">												<input type="submit" class="button" name="ok" value="OK" style="text-transform:none;" />											</div>							</form>								</div>			
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