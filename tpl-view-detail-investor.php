<?phpsession_start();
include ("database.php");
/*
Template Name: Template VIew Detail Investor
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>	<?php if($_SESSION[user_type]=='entrepreneur') {?>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" ><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_investor/" title="" ><span>Search Investor</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/upgrade_plan/" title=""><span><font color=red>UPGRADE PLAN NOW</font></span></a></li>   <?php } else if($_SESSION[user_type]=='investor') {   ?>      <li><a href="<?php echo bloginfo('url')?>/investor_dashboard/" title="" ><span>Dashboard</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_proposal/" title="" ><span>Search Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investment_criteria/" title=""><span>Investment Criteria</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>	   <?php } ?>    </ul>    </div>    </div><script>$(document).ready(function(){});	</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<?php						$q_get_data= "select user.user_id,user.user_type,user.image,user.message,user.first_name,user.last_name,user.password,user.contact_email,user.phone_number,user.pakage,user.payment_method,user.message from user,investment_criteria where investment_criteria.investor_id=user.user_id and user.user_id = '$_SESSION[investor_id]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);						while(list($investor_id,$user_type,$image,$message,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method,$message) = mysql_fetch_row($hq_get_data))			{						?>			<Table>			<tr >			<td width=300px>			<b>proposal owner: <?php echo $first_name." ".$last_name; ?>			</br></br>						<?php  if($image==''){ ?>			<img src="<?php echo bloginfo('template_url')?>/images/no_image.gif" width="150" height="150" />			<?php  }else {  ?>			<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />			<?php }  ?>			</td>			<td>			<h2>Profile:</h2>			<br><font>Full Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $first_name." ".$last_name; ?></font></b>			<br><font>Contact Email&nbsp;&nbsp;&nbsp;: <b><?php  echo $contact_email ?></font></b>			<br><font>Phone Number&nbsp;: <b><?php  echo $phone_number ?></font></b>			<br><font>About Us &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $message ?></font></b>			<br><Br><br><br>						</td>			</tr>			</table>						<div id="wrapper">						<hr><hr><hr>			<h2>Investment Criteria</h2>				<div id="content">		<div id="menu">			<ul>				<li><a href="#" title="Company Information" id="company_information" class="active">Investment Criteria</a></li>											</ul>		</div>		<div id="div_investment_criteria" style="display:block">		<div id="main">		Investment Criteria								<?php			$q_get_investor= "select location,state,industry_id,stage,language_id,starting_range,ending_range,interest from investment_criteria where investor_id = '$_SESSION[investor_id]'";			$hq_get_investor= mysql_db_query($DataBase,$q_get_investor);			while(list($country,$state,$industry_id,$stage,$language_id,$starting_range,$ending_range,$interest) = mysql_fetch_row($hq_get_investor))			{						?>						<table border=1 style="">			<tr>		<td width="200px">		<b>Country :		</td>		<td>		<?php echo $country ?>		</td>		</tr>		<tr>		<td width="200px">		<b>State :		</td>		<td>		<?php echo $state ?>		</td>		</tr>		<tr>		<td width="200px">		<b>Industry :		</td>		<td>		<?php  		//find the industry		$q_get_industry= "select real_estate,it,tourism,manufacturing,E_Commerce,Entertainment,Pharmacy,Personal_care,Education,Leisure,Transportation,Agriculture,Building,Financial,Security,Mining,Retail,Marketing,Fashion,Aviation,Media,Biotechnology,Telecom,Food,Others from industry where industry_id='$industry_id'";		$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);		while(list($real_estate,$it,$tourism,$manufacturing,$e_commerce,$entertaiment,$pharmacy,$personal_care,$education,$leisure,$transportation,$agriculture,$building,$financial,$security,$mining,$retail,$marketing,$fashion,$aviation,$media,$biotechnology,$telecom,$food) = mysql_fetch_row($hq_get_industry))		{		?>							<font><?php echo $real_estate.",".$it.",".$tourism.",".$manufacturing.",".$e_commerce.",".$entertaiment.",".$pharmacy.",".$personal_care.",".$education.",".$leisure.",".$transportation.",".$agriculture.",".$building.",".$financial.",".$security.",".$mining.",".$retail.",".$marketing.",".$fashion.",".$aviation.",".$media.",".$biotechnology.",".$telecom.",".$food; ?></font></b>		<?php		}		?>				</td>		</tr>		<tr>		<td width="200px">		<b>Stage :		</td>		<td>		<?php echo $stage ?>		</td>		</tr>		<tr>		<td width="200px">		<b>Language :		</td>		<td>		<?php 		//find the language		$q_get_language= "select english,french,spanish,german,portugese,mandarin,cantonese,arabic,rusian,japanese,italian from language where language_id='$language_id'";		$hq_get_language= mysql_db_query($DataBase,$q_get_language);		while(list($english,$french,$spanish,$german,$portugese,$mandarin,$cantonese,$arabic,$rusian,$japanese,$italian) = mysql_fetch_row($hq_get_language))		{		?>							<font><?php echo $english.",".$french.",".$spanish.",".$german.",".$portugese.",".$mandarin.",".$cantonese.",".$arabic.",".$rusian.",".$japanese.",".$italian; ?></font></b>		<?php		}		?>				</td>		</tr>		<tr>		<td width="200px">		<b>Starting Range :		</td>		<td>		<?php echo $starting_range; ?>		</td>		</tr>		<tr>		<td width="200px">		<b>Ending Range :		</td>		<td>		<?php echo $ending_range; ?>		</td>		</tr>		<tr>		<td width="200px">		<b>Interest :		</td>		<td>		<?php echo $interest; ?>		</td>		</tr>				</table>								</div>		</div>				<?php				}		?>			</div>	</div>																		<?php			}			?><?php if($_SESSION[user_type]=='entrepreneur'){ ?>			<a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" ><-- Back</a>									<?php 			}else if($_SESSION[user_type]=='investor'){			?><a href="<?php echo bloginfo('url')?>/investor_dashboard/" ><-- Back</a>	<?php  } ?>						
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