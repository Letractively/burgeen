<?phpsession_start();
include ("database.php");
/*
Template Name: Template VIew Detail Investor
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><?phpif(!isset($_SESSION[login])){echo "Please Login first..!";}else{$_SESSION[investor_id] = $_GET[investor_id];?><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>	<?php if($_SESSION[user_type]=='entrepreneur') {?>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" ><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_investor/" title="" ><span>Search Investor</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/upgrade_plan/" title=""><span><font color=red>UPGRADE PLAN NOW</font></span></a></li>	<li><a href="<?php echo bloginfo('url')?>/buy_nudge/" title="" ><span><font color=red>Buy Nudge</font></span></a></li>   <?php } else if($_SESSION[user_type]=='investor') {   ?>      <li><a href="<?php echo bloginfo('url')?>/investor_dashboard/" title="" ><span>Dashboard</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_proposal/" title="" ><span>Search Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investment_criteria/" title=""><span>Investment Criteria</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>	   <?php } ?>    </ul>    </div>    </div><script>$(document).ready(function(){});	</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<?php						$q_get_data= "select investment_criteria.title,investment_criteria.company,investment_criteria.address,investment_criteria.post_code,investment_criteria.phone,investment_criteria.fax,investment_criteria.website,user.user_id,user.user_type,user.image,user.message,user.first_name,user.last_name,user.password,investment_criteria.email,user.pakage,user.payment_method,user.message from user,investment_criteria where investment_criteria.investor_id=user.user_id and user.user_id = '$_GET[investor_id]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);						while(list($title,$company,$address,$post_code,$phone,$fax,$website,$investor_id,$user_type,$image,$message,$first_name,$last_name,$password,$contact_email,$pakage,$payment_method,$message) = mysql_fetch_row($hq_get_data))			{						?>			<Table>			<tr >			<td width=300px>			<b>proposal owner: <?php echo $first_name." ".$last_name; ?>			</br></br>						<?php  if($image==''){ ?>			<img src="<?php echo bloginfo('template_url')?>/images/no_image.gif" width="150" height="150" />			<?php  }else {  ?>			<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />			<?php }  ?>			</td>			<td>			<h2>Detail Profile:</h2>						<?php			//cek wether you are pro or global pro or novice			$q_cek= "select pakage from user where user_id = '$_SESSION[user_id]'";			$hq_cek= mysql_db_query($DataBase,$q_cek);			while(list($package) = mysql_fetch_row($hq_cek))			{							?>			<?php if($package=='pro'){ //if you are pro user ?>			<br><font>Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $company; ?></font></b>			<br><font>Full Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $first_name." ".$last_name; ?></font></b>			<br><font>Contact Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $contact_email ?></font></b>			<br><font>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $address ?></font></b>			<br><font>Post Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $post_code ?></font></b>			<br><font>About Us &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $message ?></font></b></br>				<br><font>More Profile Detail :<b><a href="<?php echo bloginfo('url')?>/upgrade_plan/">Upgrade Your Plan</a></font></b>						<?php } ?>			<?php if($package=='global pro'){ //if you are global pro user ?>			<br><font>Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $title; ?></font></b>			<br><font>Full Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $first_name." ".$last_name; ?></font></b>			<br><font>Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $company; ?></font></b>			<br><font>Contact Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $contact_email ?></font></b>			<br><font>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $address ?></font></b>			<br><font>Post Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $post_code ?></font></b>			<br><font>Phone Number&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $phone ?></font></b>			<br><font>Fax Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $fax ?></font></b>			<br><font>Website&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $website ?></font></b>			<br><font>About Us &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $message ?></font></b></br>			<br><font><a href="javascript:window.print()"><img src="http://cdn-img.easyicon.net/png/5359/535949.png" width="20px" height="20px"></img></a></font>						<?php  } ?>			<?php if($package=='z_novice'){ //if you are novice user ?>			<br><font>Full Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $first_name." ".$last_name; ?></font></b>			<br><font>About Us &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $message ?></font></b></br>			<br><font>More Profile Detail :<b><a href="<?php echo bloginfo('url')?>/upgrade_plan/">Upgrade Your Plan</a></font></b>			<?php  } ?>			<?php if($package=='free'){ //if you are investor ?>			<br><font>Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $title; ?></font></b>			<br><font>Full Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $first_name." ".$last_name; ?></font></b>			<br><font>Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $company; ?></font></b>			<br><font>Contact Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $contact_email ?></font></b>			<br><font>Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $address ?></font></b>			<br><font>Post Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $post_code ?></font></b>			<br><font>Phone Number&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $phone ?></font></b>			<br><font>Fax Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $fax ?></font></b>			<br><font>Website&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $website ?></font></b>			<br><font>About Us &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php  echo $message ?></font></b></br>			<br><font><a href="javascript:window.print()"><img src="http://cdn-img.easyicon.net/png/5359/535949.png" width="20px" height="20px"></img></a></font>			<?php  } ?>						<br><Br><br><br>						</td>			</tr>			<tr>			<td></td>			<?php if($package=='global pro'){ ?>			<td>Social Networking :</br> <?php  the_content(); ?></td>						<?php } ?>			<?php }  ?>			</tr>			</table>						<div id="wrapper">						<hr><hr><hr>			<h2>Investment Criteria</h2>				<div id="content">		<div id="menu">			<ul>				<li><a href="#" title="Company Information" id="company_information" class="active">Investment Criteria</a></li>											</ul>		</div>		<div id="div_investment_criteria" style="display:block">		<div id="main">		Investment Criteria								<?php			$q_get_investor= "select location,state,industry_id,stage,language_id,starting_range,ending_range,interest from investment_criteria where investor_id = '$_SESSION[investor_id]'";			$hq_get_investor= mysql_db_query($DataBase,$q_get_investor);			while(list($country,$state,$industry_id,$stage,$language_id,$starting_range,$ending_range,$interest) = mysql_fetch_row($hq_get_investor))			{						?>						<table border=1 style="">			<tr>		<td width="200px">		<b>Country :		</td>		<td>		<?php echo $country ?>		</td>		</tr>		<tr>		<td width="200px">		<b>State :		</td>		<td>		<?php echo $state ?>		</td>		</tr>		<tr>		<td width="200px">		<b>Industry :		</td>				<?php  		//find the industry		$q_get_industry= "select real_estate,it,tourism,manufacturing,E_Commerce,Entertainment,Pharmacy,Personal_care,Education,Leisure,Transportation,Agriculture,Building,Financial,Security,Mining,Retail,Marketing,Fashion,Aviation,Media,Biotechnology,Telecom,Food,Others from industry where industry_id='$industry_id'";		$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);		while(list($real_estate,$it,$tourism,$manufacturing,$e_commerce,$entertaiment,$pharmacy,$personal_care,$education,$leisure,$transportation,$agriculture,$building,$financial,$security,$mining,$retail,$marketing,$fashion,$aviation,$media,$biotechnology,$telecom,$food) = mysql_fetch_row($hq_get_industry))		{		?>	<td colspan=3><input type="checkbox" name="real_estate" value="real estate" <?php if($real_estate!=''){ echo "checked"; } ?> disabled><?php if($real_estate!=''){ echo "<b>"; } ?>Real Estate</td><td colspan=3><input type="checkbox" name="it" value="information technology" <?php if($it!=''){ echo "checked"; } ?> disabled><?php if($it!=''){ echo "<b>"; } ?>Information Technology</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Tourism" value="Tourism Hospitality, Restaurants & Bars" <?php if($tourism!=''){ echo "checked"; } ?> disabled><?php if($tourism!=''){ echo "<b>"; } ?>Tourism Hospitality, Restaurants & Bars</td><td colspan=3><input type="checkbox" name="Manufacturing" value="Manufacturing" <?php if($manufacturing!=''){ echo "checked"; } ?> disabled><?php if($manufacturing!=''){ echo "<b>"; } ?>Manufacturing</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="E_Commerce" value="E-Commerce" <?php if($e_commerce!=''){ echo "checked"; } ?> disabled><?php if($e_commerce!=''){ echo "<b>"; } ?>E-Commerce</td><td colspan=3><input type="checkbox" name="Entertainment" value="Entertainment" <?php if($entertainment!=''){ echo "checked"; } ?> disabled><?php if($entertainment!=''){ echo "<b>"; } ?>Entertainment</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Pharmacy" value="Pharmacy" <?php if($pharmacy!=''){ echo "checked"; } ?> disabled><?php if($pharmacy!=''){ echo "<b>"; } ?>Pharmacy</td><td colspan=3><input type="checkbox" name="Personal-care" value="Personal-care" <?php if($personal_care!=''){ echo "checked"; } ?> disabled><?php if($personal_care!=''){ echo "<b>"; } ?>Personal-care</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Education" value="Education and Training" <?php if($education!=''){ echo "checked"; } ?> disabled><?php if($education!=''){ echo "<b>"; } ?>Education and Training</td><td colspan=3><input type="checkbox" name="Leisure" value="Leisure, Tourism & Hotels" <?php if($leisure!=''){ echo "checked"; } ?> disabled><?php if($leisure!=''){ echo "<b>"; } ?>Leisure, Tourism & Hotels</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Transportation" value="Transportation" <?php if($transportation!=''){ echo "checked"; } ?> disabled><?php if($transportation!=''){ echo "<b>"; } ?>Transportation</td><td colspan=3><input type="checkbox" name="Agriculture" value="Agriculture" <?php if($agriculture!=''){ echo "checked"; } ?> disabled><?php if($agriculture!=''){ echo "<b>"; } ?>Agriculture</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Building" value="Building Services & Products" <?php if($building!=''){ echo "checked"; } ?> disabled><?php if($building!=''){ echo "<b>"; } ?>Building Services & Products</td><td colspan=3><input type="checkbox" name="Financial" value="Financial, Business & Legal Services" <?php if($financial!=''){ echo "checked"; } ?> disabled><?php if($financial!=''){ echo "<b>"; } ?>Financial, Business & Legal Services</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Security" value="Security & Defense" <?php if($security!=''){ echo "checked"; } ?> disabled><?php if($security!=''){ echo "<b>"; } ?>Security & Defense</td><td colspan=3><input type="checkbox" name="Mining" value="Mining, Oil & Gas" <?php if($mining!=''){ echo "checked"; } ?> disabled><?php if($mining!=''){ echo "<b>"; } ?>Mining, Oil & Gas</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Retail" value="Retail" <?php if($retail!=''){ echo "checked"; } ?> disabled><?php if($retail!=''){ echo "<b>"; } ?>Retail</td><td colspan=3><input type="checkbox" name="Marketing" value="Marketing & Advertising" <?php if($marketing!=''){ echo "checked"; } ?> disabled><?php if($marketing!=''){ echo "<b>"; } ?>Marketing & Advertising</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Fashion" value="Fashion & Beauty" <?php if($fashion!=''){ echo "checked"; } ?> disabled><?php if($fashion!=''){ echo "<b>"; } ?>Fashion & Beauty</td><td colspan=3><input type="checkbox" name="Aviation" value="Aviation" <?php if($aviation!=''){ echo "checked"; } ?> disabled><?php if($aviation!=''){ echo "<b>"; } ?>Aviation</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Media" value="Media & Publishing" <?php if($media!=''){ echo "checked"; } ?> disabled><?php if($media!=''){ echo "<b>"; } ?>Media & Publishing</td><td colspan=3><input type="checkbox" name="Biotechnology" value="Biotechnology& Life Sciences" <?php if($biotechnology!=''){ echo "checked"; } ?> disabled><?php if($media!=''){ echo "<b>"; } ?>Biotechnology& Life Sciences</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Telecom" value="Telecom & Mobile" <?php if($telecom!=''){ echo "checked"; } ?> disabled><?php if($telecom!=''){ echo "<b>"; } ?>Telecom & Mobile</td><td colspan=3><input type="checkbox" name="Food" value="Food and beverage Industry" <?php if($food!=''){ echo "checked"; } ?> disabled><?php if($food!=''){ echo "<b>"; } ?>Food and beverage Industry</td></tr><tr><td></td><td colspan=3><input type="checkbox" name="Others" value="Others" <?php if($others!=''){ echo "checked"; } ?> disabled><?php if($others!=''){ echo "<b>"; } ?>Others</td></tr>					<?php		}		?>								<tr>		<td width="200px">		<b>Stage :		</td>		<td>		<?php echo $stage ?>		</td>		</tr>		<tr>		<td width="200px">		<b>Language :		</td>				<?php 		//find the language		$q_get_language= "select english,french,spanish,german,portugese,mandarin,cantonese,arabic,rusian,japanese,italian from language where language_id='$language_id'";		$hq_get_language= mysql_db_query($DataBase,$q_get_language);		while(list($english,$french,$spanish,$german,$portugese,$mandarin,$cantonese,$arabic,$rusian,$japanese,$italian) = mysql_fetch_row($hq_get_language))		{		?><td><input type="checkbox" name="english" value="english" <?php if($english!=''){ echo "checked"; } ?>><?php if($english!=''){ echo "<b>"; } ?>English</td><td><input type="checkbox" name="french" value="french" <?php if($french!=''){ echo "checked"; } ?>><?php if($french!=''){ echo "<b>"; } ?>French</td><td><input type="checkbox" name="spanish" value="spanish" <?php if($spanish!=''){ echo "checked"; } ?>><?php if($spanish!=''){ echo "<b>"; } ?>Spanish</td><td><input type="checkbox" name="german" value="german" <?php if($german!=''){ echo "checked"; } ?>><?php if($german!=''){ echo "<b>"; } ?>German</td><td><input type="checkbox" name="portugese" value="portugese" <?php if($portugese!=''){ echo "checked"; } ?>><?php if($portugese!=''){ echo "<b>"; } ?>Portugese</td></tr>				<tr><td></td><td><input type="checkbox" name="mandarin" value="mandarin" <?php if($mandarin!=''){ echo "checked"; } ?>><?php if($mandarin!=''){ echo "<b>"; } ?>Mandarin</td><td><input type="checkbox" name="cantonese" value="cantonese" <?php if($cantonese!=''){ echo "checked"; } ?>><?php if($cantonese!=''){ echo "<b>"; } ?>Cantonese</td><td><input type="checkbox" name="arabic" value="arabic" <?php if($arabic!=''){ echo "checked"; } ?>><?php if($arabic!=''){ echo "<b>"; } ?>Arabic</td><td><input type="checkbox" name="rusian" value="rusian" <?php if($rusian!=''){ echo "checked"; } ?>><?php if($rusian!=''){ echo "<b>"; } ?>Rusian</td><td><input type="checkbox" name="japanese" value="japanese" <?php if($japanese!=''){ echo "checked"; } ?>><?php if($japanese!=''){ echo "<b>"; } ?>Japanese</td><td><input type="checkbox" name="italian" value="italian" <?php if($italian!=''){ echo "checked"; } ?>><?php if($italian!=''){ echo "<b>"; } ?>Italian</td></tr>		<?php		}		?>								<tr>		<td width="200px">		<b>Starting Range :		</td>		<td>		S$ <?php echo number_format($starting_range); ?>		</td>		</tr>		<tr>		<td width="200px">		<b>Ending Range :		</td>		<td>		S$ <?php echo number_format($ending_range); ?>		</td>		</tr>		<tr>		<td width="200px">		<b>Interest :		</td>		<td>		<?php echo $interest; ?>		</td>		</tr>				</table>								</div>		</div>				<?php				}		?>			</div>	</div>																		<?php			}			?><?php if($_SESSION[user_type]=='entrepreneur'){ ?>			<a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" ><-- Back</a>									<?php 			}else if($_SESSION[user_type]=='investor'){			?><a href="<?php echo bloginfo('url')?>/investor_dashboard/" ><-- Back</a>	<?php  } ?>						
			<?php}
				

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