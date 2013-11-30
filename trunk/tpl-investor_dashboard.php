<?phpsession_start();
include('database.php');
/*
Template Name: Template Investor dashboard
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/investor_dashboard/" title="" class="current"><span>Dashboard</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_proposal/" title="" ><span>Search Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investment_criteria/" title="" ><span>Investment Criteria</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>       </ul>    </div>    </div>
<script>$(document).ready(function(){ $("#proposal_bookmarked").click(function(){$("#div_proposal_bookmarked").css("display","block");$("#div_investor_bookmarked").css("display","none");$("#div_entrepreneur_bookmarked").css("display","none");});	 $("#investor_bookmarked").click(function(){$("#div_investor_bookmarked").css("display","block");$("#div_proposal_bookmarked").css("display","none");$("#div_entrepreneur_bookmakred").css("display","none");});	 $("#entrepreneur_bookmarked").click(function(){$("#div_entrepreneur_bookmarked").css("display","block");$("#div_proposal_bookmarked").css("display","none");$("#div_investor_bookmarked").css("display","none");});	});	</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<div id="wrapper">			<hr>	<table>	<tr>	<?php			$q_get_data= "select user_type,image,message,first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($user_type,$image,$message,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{	?>	<td width="200px">	<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />	</td>	<td>	Welcome, </br><?php echo $first_name." ".$last_name  ?></br></br>	Status : <?php echo $user_type ?>	</td>	</tr>	</table>			<hr><hr><hr>	<div id="content">		<div id="menu">			<ul>				<li><a href="#" title="Proposal Bookmarked" id="proposal_bookmarked" class="active">Proposal Bookmarked</a></li>				<!--<li><a href="#" title="Investor Bookmarked" id="investor_bookmarked">Investor Bookmarked</a></li>				<li><a href="#" title="Entrepreneur Bookmarked" id="entrepreneur_bookmarked">Entrepreneur Bookmarked</a></li>-->							</ul>		</div>		<div id="div_proposal_bookmarked" style="display:block">		<div id="main">		List of Proposal that you have Bookmarked						<table border=1 style="">			<Tr>		<Td>		Company Name Proposal		</td>		<Td>		Status		</td>		<Td>		Proposal Date		</td>		<Td>		View Detail		</td>		<Td>		Un-Bookmark		</td>		</tr>		<?php			$q_get_proposal_bookmark= "select proposal.company_name,proposal.date,proposal.proposal_id from proposal,bookmark where proposal.proposal_id=bookmark.proposal_id and bookmark.investor_id = '$_SESSION[user_id]' and bookmark.status='bookmark'";			$hq_get_proposal_bookmark= mysql_db_query($DataBase,$q_get_proposal_bookmark);			//echo $q_get_proposal_bookmark;			while(list($company_name,$date,$proposal_id) = mysql_fetch_row($hq_get_proposal_bookmark))			{												?>		<tr>		<?					?>		<td>		<?php echo $company_name ?>		</td>				<td>		Active		</td>		<td>		<?php echo $date  ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/view_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/bookmark_process.php?proposal_id=<?php echo $proposal_id ?>&status=un-bookmark" >		Un-Bookmark		</a>		</td>		<?php			}		?>				<?php			}			?>		</tr>		</table>						</div>		</div>					</div></div>
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