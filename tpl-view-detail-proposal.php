<?phpsession_start();
include ("database.php");
/*
Template Name: Template VIew Detail Proposal
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" class="current"><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investor_search/" title="" ><span>Investor Search</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>       </ul>    </div>    </div><script>$(document).ready(function(){ $("#company_information").click(function(){$("#div_company_information").css("display","block");$("#div_pitch_and_deal").css("display","none");$("#div_team").css("display","none");});	 $("#pitch_and_deal").click(function(){$("#div_pitch_and_deal").css("display","block");$("#div_company_information").css("display","none");$("#div_team").css("display","none");});	 $("#team").click(function(){$("#div_team").css("display","block");$("#div_company_information").css("display","none");$("#div_pitch_and_deal").css("display","none");});	});	</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<?php						$q_get_data= "select user_type,image,message,first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($user_type,$image,$message,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{			?>			<div id="wrapper">			<h1>Detail Proposal</h1>			<hr><hr><hr>	<div id="content">		<div id="menu">			<ul>				<li><a href="#" title="Company Information" id="company_information" class="active">Company Information</a></li>				<li><a href="#" title="Pitch and Deal" id="pitch_and_deal">Pitch and Deal</a></li>				<li><a href="#" title="Team Member" id="team">Team</a></li>							</ul>		</div>		<div id="div_company_information" style="display:block">		<div id="main">		Company Information				<?php			$q_get_proposal= "select company_name,website,management_location,industry_1,industry_2,reason,stage,investor_role,previous_raise,total_raise,total_have_you_raised,minimum_investment,title,short_summary,the_pitch,highlight_1,highlight_2,highlight_3,highlight_4,highlight_5,the_deal,team_role_company,team_name,team_linkedin,team_position,date from proposal where proposal_id = '$_SESSION[proposal_id]'";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);			//echo $q_get_data;			while(list($company_name,$website,$management_location,$industry_1,$industry_2,$reason,$stage,$investor_role,$previous_raise,$total_raise,$total_have_you_raised,$minimum_investment,$title,$short_summary,$the_pitch,$highlight_1,$highlight_2,$highlight_3,$highlight_4,$highlight_5,$the_deal,$team_role_company,$team_name,$team_linkedin,$team_position,$date) = mysql_fetch_row($hq_get_proposal))			{				?>		<table border=1 style="">			<tr>		<td width="200px">		Company Name :		</td>		<td>		<?php echo $company_name ?>		</td>		</tr>		<tr>		<td width="200px">		Company Website :		</td>		<td>		<?php echo $website ?>		</td>		</tr>		<tr>		<td width="200px">		Management Location :		</td>		<td>		<?php echo $management_location ?>		</td>		</tr>		<tr>		<td width="200px">		Industry 1 :		</td>		<td>		<?php echo $industry_1 ?>		</td>		</tr>		<tr>		<td width="200px">		Industry 2 :		</td>		<td>		<?php echo $industry_2 ?>		</td>		</tr>		<tr>		<td width="200px">		Primary reason for needing Capital :		</td>		<td>		<?php echo $reason ?>		</td>		</tr>		<tr>		<td width="200px">		Stage :		</td>		<td>		<?php echo $stage ?>		</td>		</tr>		<tr>		<td width="200px">		Ideal Investor Role :		</td>		<td>		<?php echo $investor_role ?>		</td>		</tr>		<tr>		<td width="200px">		Ideal Investor RoleIf you did a previous round, how much did you raise?		</td>		<td>		<?php echo $previous_raise ?>		</td>		</tr>		<tr>		<td width="200px">		How much are your raising in total?		</td>		<td>		<?php echo $total_raise ?>		</td>		</tr>		<tr>		<td width="200px">		How much of this total have you raised?		</td>		<td>		<?php echo $total_have_you_raised ?>		</td>		</tr>		<tr>		<td width="200px">		What is the minimum investment per investor?		</td>		<td>		<?php echo $minimum_investment ?>		</td>		</tr>										</table>								</div>		</div>		<div id="div_pitch_and_deal" style="display:none">		<div id="main">			Pitch and Deal					<table border=1 style="">					<tr>		<td width="200px">		Title :		</td>		<td>		<?php echo $title ?>		</td>		</tr>		<tr>		<td width="200px">		Short Summary :		</td>		<td>		<?php echo $short_summary ?>		</td>		</tr>		<tr>		<td width="200px">		The Pitch :		</td>		<td>		<?php echo $the_pitch ?>		</td>		</tr>		<tr>		<td width="200px">		Highlight 1 :		</td>		<td>		<?php echo $highlight_1 ?>		</td>		</tr>		<tr>		<td width="200px">		Highlight 2 :		</td>		<td>		<?php echo $highlight_2 ?>		</td>		</tr>		<tr>		<td width="200px">		Highlight 3 :		</td>		<td>		<?php echo $highlight_3 ?>		</td>		</tr>		<tr>		<td width="200px">		Highlight 4 :		</td>		<td>		<?php echo $highlight_4 ?>		</td>		</tr>		<tr>		<td width="200px">		Highlight 5 :		</td>		<td>		<?php echo $highlight_5 ?>		</td>		</tr>		<tr>		<td width="200px">		The Deal :		</td>		<td>		<?php echo $the_deal ?>		</td>		</tr>						</table>									</div>		</div>		<div id="div_team" style="display:none">		<div id="main">			Team		<table border=1 style="">						<tr>		<td width="200px">		Description about the Team :		</td>		<td>		<?php echo $team_role_company ?>		</td>		</tr>			<tr>		<td width="200px">		Team Member :		</td>		<td>		<?php echo $team_name ?>		</td>		</tr>		<tr>		<td width="200px">		Linkedin / Website :		</td>		<td>		<?php echo $team_linkedin ?>		</td>		</tr>		<tr>		<td width="200px">		Position :		</td>		<td>		<?php echo $team_position ?>		</td>		</tr>										</table>			</div>		</div>		<?php		}		?>	</div></div>						<?php			}			?>		<a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" ><-- Back</a>															
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