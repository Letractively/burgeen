<?phpsession_start();
include ("database.php");
/*
Template Name: Template Entrepreneur dashboard
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" class="current"><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_investor/" title="" ><span>Search Investor</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>       </ul>    </div>    </div><script>$(document).ready(function(){ $("#active_proposal").click(function(){$("#div_active_proposal").css("display","block");$("#div_non_active_proposal").css("display","none");$("#div_interested_investor").css("display","none");});	 $("#non_active_proposal").click(function(){$("#div_non_active_proposal").css("display","block");$("#div_interested_investor").css("display","none");$("#div_active_proposal").css("display","none");});	 $("#interested_investor").click(function(){$("#div_interested_investor").css("display","block");$("#div_non_active_proposal").css("display","none");$("#div_active_proposal").css("display","none");});	});	</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">						<div id="wrapper">			<hr>	<table>	<tr>	<?php			$q_get_data= "select user_type,image,message,first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($user_type,$image,$message,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{	?>	<td width="200px">	<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />	</td>	<td>	Welcome, </br><?php echo $first_name." ".$last_name  ?></br></br>	Status : <?php echo $user_type ?></br>	<?php if($_SESSION[user_type]=='entrepreneur'){  ?>	Invoice : <a href="<?php echo bloginfo('template_url') ?>/pdf.php">Print</a>	<?php }  ?>	</td>	</tr>	</table>			<hr><hr><hr>	<div id="content">		<div id="menu">			<ul>				<li><a href="#" title="Active Proposal" id="active_proposal" class="active">Active Proposal</a></li>				<li><a href="#" title="Non-Active Proposal" id="non_active_proposal">Non-Active Proposal</a></li>				<li><a href="#" title="Interested Investor" id="interested_investor">Interested Investor</a></li>							</ul>		</div>		<div id="div_active_proposal" style="display:block">		<div id="main">		active proposal						<table border=1 style="">			<Tr>		<Td>		Company Name Proposal		</td>		<Td>		Pakage		</td>		<Td>		Status		</td>		<Td>		Proposal Date		</td>		<Td>		View		</td>		<Td>		Update		</td>		</tr>		<?php			$q_get_proposal= "select proposal_id,company_name,status,date from proposal where user_id = '$_SESSION[user_id]' and status='active'";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);			//echo $q_get_data;			while(list($proposal_id,$company_name,$status,$date) = mysql_fetch_row($hq_get_proposal))			{												?>		<tr>		<?					?>		<td>		<?php echo $company_name ?>		</td>		<td>				</td>		<td>		<?php echo $status." ||" ?> <a href="<?php echo bloginfo('template_url') ?>/non_active_proposal.php?proposal_id=<?php echo $proposal_id ?>" >Non-Active</a>		</td>		<td>		<?php echo $date  ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/view_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/update_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/update.gif"> </img>		</a>		</td>		<?php			}		?>				<?php			}			?>		</tr>		</table>						</div>		</div>		<div id="div_non_active_proposal" style="display:none">		<div id="main">			non active proposal					<table border=1 style="">			<Tr>		<Td>		Company Name Proposal		</td>		<Td>		Pakage		</td>		<Td>		Status		</td>		<Td>		Proposal Date		</td>		<td>		Delete		</td>		</tr>		<?			$q_get_proposal= "select proposal_id,company_name,status,date from proposal where user_id = '$_SESSION[user_id]' and status='non-active'";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);			//echo $q_get_data;			while(list($proposal_id,$company_name,$status,$date) = mysql_fetch_row($hq_get_proposal))			{		?>		<tr>				<td>		<?php echo $company_name ?>		</td>		<td>				</td>		<td>		<?php echo $status." ||" ?> <a href="<?php echo bloginfo('template_url') ?>/active_proposal.php?proposal_id=<?php echo $proposal_id ?>" >Active</a>		</td>		<td>		<?php echo $date  ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/delete_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/delete.gif"> </img>		</a>		</td>				</tr>		<?php			}		?>		</table>									</div>		</div>		<div id="div_interested_investor" style="display:none">		<div id="main">			Investor who interested with our Proposal							<table border=1 style="">			<tr>		<Td>		Name Investor		</td>		<td>		Proposal Name/Title (Company Name)		</td>		<td>		Date		</td>		<td>		View Investor Profile		</td>		</tr>		<?php   				$q_get_interested_investor= "select user.first_name,user.last_name,proposal.company_name,proposal.date,interested_investor.investor_id from user,proposal,interested_investor where interested_investor.investor_id=user.user_id and interested_investor.proposal_id=proposal.proposal_id and interested_investor.entrepreneur_id = '$_SESSION[user_id]' and interested_investor.status='like'";			$hq_get_interested_investor= mysql_db_query($DataBase,$q_get_interested_investor);			//echo $q_get_interested_investor;			while(list($first_name,$last_name,$company_name,$date,$investor_id) = mysql_fetch_row($hq_get_interested_investor))			{			?>		<tr>		<td>		<?php echo $first_name." ".$last_name; ?>		</td>		<td>		<?php echo $company_name; ?>		</td>		<td>		<?php echo $date ?>		</td>		<td>		<a href="<?php echo $investor_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		</td>		</tr>		<?php } ?>		</table>												</div>		</div>	</div></div>																							
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