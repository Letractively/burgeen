<?phpsession_start();
include('database.php');
/*
Template Name: Template Search Proposal
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/profile.css" /><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/investor_dashboard/" title="" ><span>Dashboard</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_proposal/" title="" class="current" ><span>Search Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investment_criteria/" title="" ><span>Investment Criteria</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>       </ul>    </div>    </div>

	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>"><?php		?><table rules="none" style="border:0px;border:none;width:100%;text-align:center">		<form action="" method="POST" name="form_search" id="form_search" >		<tbody id="entrepreneur_search_engine" style="">				<tr>								<td style="border:none" width="20%">					Select Country:				</td>								<td style="border:none" width="20%">					Select State:				</td>				<td style="border:none" width="20%">					Select Industry:				</td>								<td style="border:none" width="20%">					Min Funding Needed:				</td>				<td style="border:none" width="25%">					Max Funding Needed:				</td>				<td>								</td>		</tr>		<tr>								<td style="border:none" width="20%">							<select id="entrepreneur_country" name="entrepreneur_country" style="width:150px; height:25px; font-size:15px">							<option value="">Select One</option>							<?php							$q_get_country= "select distinct management_location from proposal";							$hq_get_country= mysql_db_query($DataBase,$q_get_country);														while(list($location) = mysql_fetch_row($hq_get_country))							{							?>							<option value="<?php  echo $location ?>"><?php echo $location ?></option>							<?php							}							?>							</select>				</td>				<td style="border:none" width="20%">							<select id="entrepreneur_state" name="entrepreneur_state" style="width:150px; height:25px; font-size:15px">							<option value="">Select One</option>							<?php							$q_get_state= "select distinct state from proposal";							$hq_get_state= mysql_db_query($DataBase,$q_get_state);														while(list($state) = mysql_fetch_row($hq_get_state))							{							?>							<option value="<?php echo $state; ?>"><?php echo $state; ?></option>							<?php							}							?>							</select>				</td>				<td style="border:none" width="20%">							<select id="entrepreneur_industry" name="entrepreneur_industry" style="width:150px; height:25px; font-size:15px">							<option value="">Select One</option>							<?php							$q_get_industry= "select distinct industry_1 from proposal";							$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);							//echo $q_get_data;							while(list($industry) = mysql_fetch_row($hq_get_industry))							{														?>							<option value="<?php  echo $industry ?>"><?php echo $industry ?></option>							<?php							}														?>							</select>				</td>								<td style="border:none" width="20%">							S$<input type="number" name="min_capital_needed" id="min_capital_needed" value="" style="height:25px; width:100px; font-size:13pt" />				</td>				<td style="border:none" width="25%">							S$<input type="number" name="max_capital_needed" id="max_capital_needed" value="" style="height:25px; width:100px; font-size:13pt" />				</td>				<td>				<input type="submit" id="search_proposal" name="search_proposal" value="OK">				</td>						</tr>		</tbody>			</form>		</table>	<form id="latest_proposal" name="latest_proposal" method="POST" action="">	<input type="submit" id="latest_proposal" name="latest_proposal" value="Latest Proposal" />	</form>	<?php		if(isset($_POST[entrepreneur_country]) and isset($_POST[entrepreneur_state]) and isset($_POST[entrepreneur_industry]) and isset($_POST[min_capital_needed]) and isset($_POST[max_capital_needed]) and $_POST[entrepreneur_country]!='' and $_POST[entrepreneur_state]!='' and $_POST[entrepreneur_industry]!='' and $_POST[min_capital_needed]!='' and $_POST[max_capital_needed]!='')	{			//search based on the search engine						$q_get_proposal= "select proposal.state,proposal.industry_1,proposal.user_id,proposal.company_name,proposal.management_location,proposal.minimum_investment,proposal.total_raise,proposal.short_summary from proposal,user where proposal.management_location='$_POST[entrepreneur_country]' and proposal.industry_1='$_POST[entrepreneur_industry]' and proposal.state='$_POST[entrepreneur_state]' and proposal.minimum_investment>='$_POST[min_capital_needed]' and '$_POST[max_capital_needed]' >= proposal.minimum_investment and proposal.status='active' and user.user_id=proposal.user_id ORDER BY user.pakage ASC";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);	}else	{			//view all			$q_get_proposal= "select proposal.state,proposal.industry_1,proposal.user_id,proposal.company_name,proposal.management_location,proposal.minimum_investment,proposal.total_raise,proposal.short_summary,proposal.proposal_id from proposal,user where proposal.status='active' and user.user_id=proposal.user_id ORDER BY user.pakage , proposal.date DESC";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);						 	}			//echo $q_get_data;			while(list($state,$industry,$user_id,$company_name,$management_location,$minimum_investment,$total_raise,$short_summary,$proposal_id) = mysql_fetch_row($hq_get_proposal))			{									$q_get_image= "select image from user where user_id='$user_id'";			$hq_get_image= mysql_db_query($DataBase,$q_get_image);			//echo $q_get_data;			while(list($image) = mysql_fetch_row($hq_get_image))			{										?>				<div id="content" class="clearfix">			<section id="left">			<div id="userStats" class="clearfix">				<div class="pic">					<a href="#">					<?php if($image==''){  ?>					<img src="<?php echo bloginfo('template_url')?>/images/no_image.gif" width="150" height="150" />					<?php }else{ ?>					<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />					<?php }  ?>										</a>				</div>							<div class="data">					<h1><?php echo $first_name." ".$last_name ?></h1>					Investor ID: <b><?php echo $user_id ?></b></br>					Company Name: <b><?php  echo $company_name ?></b></br>					Country: <b><?php echo $management_location ?></b></br>					State: <b><?php echo $state ?></b></br>					Min Funding Needed: <b><font color=red>S$<?php echo number_format($minimum_investment); ?></font></b></br>					Industry : <b><?php echo $industry; ?></b>										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					<?php			$q_cek= "select count(*),status from nudge where investor_id='$_SESSION[user_id]' and proposal_id='$proposal_id'";			$hq_cek= mysql_db_query($DataBase,$q_cek);						while(list($nudge_id,$status) = mysql_fetch_row($hq_cek))			{			$nudge=$nudge_id;						if($nudge==1)			{			}else if($nudge==0){					?>					<a href="<?php echo bloginfo('template_url') ?>/entrepreneur_nudge.php?proposal_id=<?php  echo $proposal_id ?>" onclick="alert('nudge has been sent');"><img src="http://www.nudgeaccounting.com.au/wp-content/uploads/2013/08/Nudge-Icon_logo.png" width="50px" height="50px" /> 					</a><?php  } ?>						<!-- if the nudge has been approved by entrepreneur... -->			<?php			if($status=='accept')			{			?>			</div>			<a href="<?php echo bloginfo('template_url') ?>/view_proposal.php?proposal_id=<?php echo $proposal_id ?>" ><b>Find Out More --></b></a>				</div>			<?php			}			}			?>			</section>					</div>			<?php } } 			$error = mysql_num_rows($hq_get_proposal);			if($error==0)			{			echo "Data Not Found.";			}			?>			<div style="text-align:right;">			<form action="">			Per Page:			<select  name="view" id="view" style="width:50px; height:25px; font-size:15px">							<option value="5">5</option>							<option value="10">10</option>							<option value="20">20</option>							<option value="30">30</option>							</select>			</form>			</div> 									
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