<?php

/*
// Template Name: Template FAQ
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>

	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>"><br><table><tr>
<h1><b><center>F & Q</b></h1><center><p><font style="font-size:20px"><b>Entrepreneur FAQ – Burgeen Network</b></font></p></centeR><p><b>Q 1] <u>What is the role of Burgeen Investor? </u></b></p>A good investor provides business assistance in many ways:</br>o	They will provide the money you need to set up or grow your business.</br>o	They might take on seat on your board of directors and play an active role in the day-to-day management of your business.</br>o	They’re usually current or former business owners themselves, so can offer advice on business management and strategy.</br>o	They often have a large network of contacts they can introduce you to - more angels, potential partners, suppliers, employees, etc.</br>o	They can help you expand your client base by promoting your business to colleagues and friends. </br></br><p><b>Q 2] <u>Is my Project Suitable? </u></b></p><p>If you're looking for funding and you're looking to make a return on investment then you’re suitable. Our investors look at all stages of business and across all sectors from genuine start-ups to more established business. We look at all different types of projects including debt deals, franchises, real estate, equity, etc. </p><p><b>Q 3] <u>How do I Turn Off the E-mails?</u></b></p><p>You need to log into your account and click on "My Dashboard" and then "Email Settings".</p><p><b>Q 4] <u>What is a Nudge? </u></b></p><p>If you see an investor who you particularly want to contact, you can send them a nudge (like a Facebook poke). If the investor likes your proposal and accepts your nudge, you will then be able to contact each other. You can buy nudges in packs and can use the investor search tool to find potential investors. Please Note: There is obviously no guarantee that an investor will accept your nudge. </p><p><b>Q 5] <u>How many investors will my proposal be sent to? </u></b></p><p>We are targeting for more than 100 investors in first quarter. Pro proposals will be sent to all matching investors on this network. Global Pro proposals will be sent to all matching investors worldwide. Our system will match your proposal with the right investors based on investment amount, region and sector(s). <p><p><b>Q 7. <u>Can proposals be edited after launch? </u></b></p><p>Yes, proposals can be edited at any time. Novice proposals will be reviewed after each edit to make sure no contact details have been included. Pro and Global Pro edits do not need to be re-approved. </p><p><b>Q 8. <u>How long does it take for my proposal to go live?</u></b></p><p>Proposals are usually reviewed within 48 hours. If you're in a real hurry, you can choose the Immediate Release feature, and your proposal will go online straight away. </p><p><b>Q 9] <u>How can I protect the confidentiality of my idea? </u></b></p><p>If you’re worried about confidentiality we'd advise you to write enough to get the investors interested in your project without revealing any sensitive information. Once you start discussions with an investor, you may want to ask them to sign a non-disclosure agreement before you release more information.</p><p><b>Q 10] <u>Can I upload my business plan?</u></b></p><p>Yes, the Pro or Global Pro packages allow you to upload additional documents for investors to view. </p><p><b>Q 11] <u>Can I enter more than one proposal? </u></b></p><p>Yes, you can enter as many proposal as you want, but you do have to pay the Pro or Global Pro fee for every proposal you submit. If you want to enter more than 5 proposals, please contact us for special rates.</p><p><b>Q 12] <u>How Can I Pay? </u></b></p><p>You can pay via credit or debit card, paypal or bank transfer. </p><p><b>Q 13] <u>Do I Have To Pay For Every Contact?</u></b></p><p>No, the Pro and Global Pro packages give you to access to the contact details of ALL the investors who show an interest in your proposal. </p><p><b>Q 15] <u>Do I Need To Do My Own Due Diligence? </u></b></p><p>Answer] We carry out a number of checks on each investor when they register, but you should also do your own due diligence on any investor you deal with. Please help out the community by reporting and endorsing investors. </p><p><b>Q 16] <u>I Have Forgotten my Login details? </u></b></p><p>Send us an email at admin@natawebs.com and we'll see what we can do to help. </p><p><b>Q 17] <u>Got Another Question? </u></b></p><p>Send us an email at admin@natawebs.com and we'll get back to you as soon as possible</p></br><br><br><center><p><font style="font-size:20px"><b>Investor FAQ – Burgeen Network</b></font></p></center><p><b>Q 1] <u>How Many Members Do You Have?</u></b></p><p>We are targeting 500 members for the first quarter.</p><p><b>Q 2] How Do I Turn Off The Emails?</b></p><p>Login to your account and click on my profile, you can go to email settings to turn off or change the frequency. You can also change the type of email you receive through clicking on investment criteria.</p><p><b>Q 3] <u>Is There A Maximum/Minimum Investment?</u></b></p><p>No, we have clients looking to raise funds ranging from a few thousand dollars to millions of dollars.</p><p><b>Q 4] <u>What Are The Costs?</u></b></p><p>Our service is free to investors.</p><p><b>Q 5] <u>How Is My Privacy Protected?</u></b></p><p>We do not share your name or contact information with anyone accept entrepreneurs you choose to connect with.<p><p><b>Q 6] <u>Do I Need To Do My Own Due Diligence?</u></b></p><p>Yes, you need to carry out your own due diligence on all companies that you are thinking of investing in.</p><p><b>Q 7] <u>Who Can Use This Platform?</u></b></p><p>This platform is designed to be used by sophisticated investors or investment professionals. Please check the registration page for more details.</p><p><b>Q 8] <u>I Have Other Questions, Who Do I Contact?</u></b></p></p>Contact us by email: admin@natawebs.com</p>			</table>																		
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