<?php

/*
Template Name: Template Investor dashboard
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="http://127.0.0.1/wordpress2/investor_dashboard/" title="" class="current"><span>Dashboard</span></a></li>  	<li><a href="http://127.0.0.1/wordpress2/search_proposal/" title="" ><span>Search Proposal</span></a></li>    <li><a href="http://127.0.0.1/wordpress2/edit-profile/" title=""><span>Profile</span></a></li>       </ul>    </div>    </div>

	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>"><br><table><tr>
<h1>About Us</h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ask Burgeen is an internet based matching service, which provides an internet platform for the investors and investees, as well as a service package for entrepreneurs. This website belongs to the Burgeen Ltd, a Singapore base consulting company founded in 2013. </br></br></tr></br><tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The service of the company is like a middleman between investors and investees, helping them to get the information more easily, inexpensively and efficiently without the country boundary. Encouraging young people to build their own business, we have customer-made consulting service in an affordable price to meet their needs. We serve two main groups:</br>•	Investors who have capitals and looking for more opportunities to invest.</br>•	Young entrepreneurs who want to set up their own business but don’t know how to launch it, as well as lack the certain capital to start.</tr></br></br><tr>We focus on the emerging markets which have full of potential:</br>•	Singapore</br>•	Asia- Pacific area </tr>			</table>																		
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