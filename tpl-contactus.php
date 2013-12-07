<?php

/*
Template Name: Template Contact Us
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>
<head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/contactus.css' /></head>	
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">
<!--BEGIN #signup-form -->    <div id="signup-form">                <!--BEGIN #subscribe-inner -->        <div id="signup-inner">                				<h1>Contact Us</h1>                        <form id="send" action="">            	                <p>                <label for="name">Your Name *</label>                <input id="name" type="text" name="name" value="" />                </p>                                <p>                <label for="company">Company Name</label>                <input id="company" type="text" name="company" value="" />                </p>                                <p>                <label for="email">Email *</label>                <input id="email" type="text" name="email" value="" />                </p>                                <p>                <label for="website">Website</label>                <input id="website" type="text" name="website" value="http://" />                </p>                                <p>                <label for="phone">Phone</label>                <input id="phone" type="text" name="phone" value="" />                </p>                                <p>                <label for="country">Country</label>                <input id="Country" type="text" name="country" value="" />                </p>                                                <p>                <label for="profile">Message *</label>                <textarea name="profile" id="profile" style="width: 700px; height: 300px;"></textarea>                </p>                                <p>                <button id="submit" type="submit">Submit</button>                </p>                            </form>            		<div id="required">		<p>* Required Fields</p>		</div>            </div>                <!--END #signup-inner -->        </div>									
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