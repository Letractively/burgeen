<?phpsession_start();

/*
Template Name: Template Login Page
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>
<head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/register.css' /></head>	
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<?php			//echo $_SESSION[login];			?>
			<?php	if($_SESSION[login]=='failed' or $_SESSION[login]=='')	{										?>			<div id="wrapper">			<?php			if($_SESSION[login]=='failed')			{			echo "<font color=red><center>Login Failed, try again..</font></br></br>";			}			?>			<Center>			<form action="<?php echo bloginfo('template_url') ?>/login_process.php" method="POST" name="registerform" id="login-form" class="login-form">			<div class="header">			<h1><?php _e('Login Page', APP_TD); ?></h1>						</div>										<div class="content">					<p>						Username<br/>						<input type="text" class="input username" name="username" id="username" value="" />					</p>														<p>						Enter a password<br/>						<input type="password" class="input username" name="user_password" id="user_password" value="" />					</p>				</div>					<div class="footer">												<input type="submit" class="button" name="register" value="<?php _e('LOGIN &rarr;', APP_TD); ?>" />											</div>							</form>								</div>			<?php }else {			echo "login sucessfully..!!";			}			?>			
			<?php
				// CONTENT
				the_content();

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