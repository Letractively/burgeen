<?phpsession_start();
include('database.php');
/*
Template Name: Template Search Proposal
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/profile.css" /><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/investor_dashboard/" title="" ><span>Dashboard</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_proposal/" title="" class="current" ><span>Search Proposal</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>       </ul>    </div>    </div>

	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>"><?php		?><table rules="none" style="border:0px;border:none;width:100%;text-align:center">		<form action="" method="POST" name="form_search" id="form_search" >		<tbody id="entrepreneur_search_engine" style="">				<tr>								<td style="border:none" width="25%">					Select Country:				</td>								<td style="border:none" width="25%">					Select State:				</td>				<td style="border:none" width="25%">					Select Industry:				</td>								<td style="border:none" width="20%">					Select Capital Needed:				</td>				<td>								</td>		</tr>		<tr>								<td style="border:none" width="20%">							<select id="entrepreneur_country" name="entrepreneur_country" style="width:150px; height:25px; font-size:15px">							<?php							$q_get_country= "select distinct management_location from proposal";							$hq_get_country= mysql_db_query($DataBase,$q_get_country);							//echo $q_get_data;							while(list($location) = mysql_fetch_row($hq_get_country))							{							?>							<option value="<?php  echo $location ?>"><?php echo $location ?></option>							<?php							}							?>							</select>				</td>				<td style="border:none" width="20%">							<select id="entrepreneur_state" name="entrepreneur_state" style="width:150px; height:25px; font-size:15px">							<option value="">Singapore</option>							<option value="">Jawa Timur</option>							<option value="">Sumatra</option>							</select>				</td>				<td style="border:none" width="25%">							<select id="entrepreneur_industry" name="entrepreneur_industry" style="width:150px; height:25px; font-size:15px">							<?php							$q_get_industry= "select distinct industry_1,industry_2 from proposal";							$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);							//echo $q_get_data;							while(list($industry_1,$industry_2) = mysql_fetch_row($hq_get_industry))							{							if($industry_1==$industry_2)							{							}else							{							?>							<option value="<?php  echo $industry_1 ?>"><?php echo $industry_1 ?></option>							<?php							}							}							?>							</select>				</td>								<td style="border:none" width="20%">							<select id="capital_needed" name="capital_needed" style="width:150px; height:25px; font-size:15px">							<?php							$q_get_capital_needed= "select distinct total_raise from proposal";							$hq_get_capital_needed= mysql_db_query($DataBase,$q_get_capital_needed);							//echo $q_get_data;							while(list($capital_needed) = mysql_fetch_row($hq_get_capital_needed))							{							?>							<option value="<?php  echo $capital_needed ?>"><?php echo $capital_needed ?></option>							<?php							}							?>							</select>				</td>				<td>				<input type="submit" id="search_proposal" name="search_proposal" value="OK">				</td>						</tr>		</tbody>			</form>		</table>	<input type="submit" id="latest_proposal" name="latest_proposal" value="Latest Proposal" >	<?php		if(isset($_POST[entrepreneur_country]) and isset($_POST[entrepreneur_industry]) and isset($_POST[capital_needed]))	{			$q_get_proposal= "select user_id,company_name,management_location,minimum_investment,total_raise,short_summary from proposal where management_location='$_POST[entrepreneur_country]' and industry_1='$_POST[entrepreneur_industry]' and total_raise='$_POST[capital_needed]'";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);	}else	{						$q_get_proposal= "select user_id,company_name,management_location,minimum_investment,total_raise,short_summary from proposal";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);						 	}			//echo $q_get_data;			while(list($user_id,$company_name,$management_location,$minimum_investment,$total_raise,$short_summary) = mysql_fetch_row($hq_get_proposal))			{									$q_get_image= "select image from user where user_id='$user_id'";			$hq_get_image= mysql_db_query($DataBase,$q_get_image);			//echo $q_get_data;			while(list($image) = mysql_fetch_row($hq_get_image))			{										?>				<div id="content" class="clearfix">			<section id="left">			<div id="userStats" class="clearfix">				<div class="pic">					<a href="#"><img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" /></a>				</div>								<div class="data">					<h1><?php echo $first_name." ".$last_name ?></h1>					Company Name: <b><?php  echo $company_name ?></b></br>					Location: <b><?php echo $management_location ?></b></br>					Capital Needed: <b><font color=red>S$<?php echo $total_raise ?></font></b></br>					Summary : <b><?php echo $short_summary ?></b></br>														</div>			<a href="" ><b>Find Out More --></b></a>				</div>									</section>					</div>			<?php } } 			$error = mysql_num_rows($hq_get_proposal);			if($error==0)			{			echo "Data Not Found.";			}			?>			<div style="text-align:right;">			<form action="">			Per Page:			<select  name="view" id="view" style="width:50px; height:25px; font-size:15px">							<option value="5">5</option>							<option value="10">10</option>							<option value="20">20</option>							<option value="30">30</option>							</select>			</form>			</div> 									
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