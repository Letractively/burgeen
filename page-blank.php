<?phpinclude('database.php');session_start();
$_SESSION[path]= 'http://127.0.0.1/wordpress2';
/*
Template Name: Blank
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>	<?phpecho "login Status: ".$_SESSION[login];?>	<head><link type="text/css" href="<?php echo bloginfo('template_url') ?>/jquery.keypad.css" rel="stylesheet"></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/jquery.keypad.js"></script>	
<script>$(document).ready(function(){//cek number and limitfunction isNumber (o) {  return ! isNaN (o-0);}  $("#min_capital_needed").keyup(function(e){txtVal = $(this).val();   if( txtVal.length>15 && isNumber(txtVal)) {     $(this).val(txtVal.substring(0,15) ) } if(!isNumber(txtVal)) {     $(this).val('') }});	$("#max_capital_needed").keyup(function(e){txtVal = $(this).val();   if( txtVal.length>15 && isNumber(txtVal)) {     $(this).val(txtVal.substring(0,15) ) } if(!isNumber(txtVal)) {     $(this).val('') }});	$("#min_funding").keyup(function(e){txtVal = $(this).val();   if( txtVal.length>15 && isNumber(txtVal)) {     $(this).val(txtVal.substring(0,15) ) } if(!isNumber(txtVal)) {     $(this).val('') }});$("#max_funding").keyup(function(e){txtVal = $(this).val();   if( txtVal.length>15 && isNumber(txtVal)) {     $(this).val(txtVal.substring(0,15) ) } if(!isNumber(txtVal)) {     $(this).val('') }});  $("#entrepreneur_button").click(function(){  $("#entrepreneur_search_engine").slideToggle();	$("#entrepreneur_search_engine").css("display","block");	$("#investor_search_engine").css("display","none");	$("#business_partner_search_engine").css("display","none");	$("#entrepreneur_button").css("color","blue");	$("#td_search").css("background-color","silver");	$("#td_entrepreneur").css("background-color","silver");	$("#td_investor").css("background-color","white");	$("#td_business_partner").css("background-color","white");	$("#investor_button").css("color","black");	$("#business_partner_button").css("color","black");  	  });  $("#investor_button").click(function(){    $("#investor_search_engine").slideToggle();	$("#investor_search_engine").css("display","block");	$("#entrepreneur_search_engine").css("display","none");	$("#business_partner_search_engine").css("display","none");	$("#investor_button").css("color","blue");	$("#td_investor").css("background-color","silver");	$("#td_entrepreneur").css("background-color","white");	$("#td_business_partner").css("background-color","white");	$("#entrepreneur_button").css("color","black");	$("#business_partner_button").css("color","black");  });    $("#business_partner_button").click(function(){    $("#business_partner_search_engine").slideToggle();	$("#business_partner_search_engine").css("display","block");	$("#entrepreneur_search_engine").css("display","none");	$("#investor_search_engine").css("display","none");	$("#investor_button").css("color","black");	$("#entrepreneur_button").css("color","black");	$("#business_partner_button").css("color","blue");	$("#td_investor").css("background-color","white");	$("#td_entrepreneur").css("background-color","white");	$("#td_business_partner").css("background-color","silver");	  });      });</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<Table border=0 width="50%" ><tr><td id="td_entrepreneur" name="td_entrepreneur" bgcolor=""><input type="submit" value="Entrepreneur Proposal" id="entrepreneur_button" style="font-size:15pt"></td><td id="td_business_partner" name="td_business_partner"><input type="submit" value="Find Business Partner" id="business_partner_button" style="font-size:15pt"></td><td id="td_investor" name="td_investor"  bgcolor=""><input type="submit" value="Find Investor" id="investor_button" style="font-size:15pt"></td></tr><tr><td id="td_search" name="td_search"  colspan=3  ><div>	<table rules="none" style="border:0px;border:none;width:100%;text-align:center">				<tbody id="entrepreneur_search_engine" style="">		<script>		$("#entrepreneur_search_engine").css("display","none");		</script>		<tr>								<td style="border:none" width="20%">					Select Country:				</td>								<td style="border:none" width="20%">					Select State:				</td>				<td style="border:none" width="20%">					Select Industry:				</td>								<td style="border:none" colspan=2>					<center>Range Capital Needed:				</td>								<td style="border:none">								</td>		</tr>		<tr><script type="text/javascript">$(document).ready(function() {    	$("#entrepreneur_country").change(function() {		$(this).after('<div id="loader"><img src="<?php echo bloginfo('template_url'); ?>/images/loading.gif" alt="loading State..." /></div>');		$.get('<?php echo bloginfo('template_url'); ?>/country.php?status=entrepreneur&country=' + $(this).val(), function(data) {			$("#entrepreneur_state").html(data);			$('#loader').slideUp(200, function() {				$(this).remove();			});		});	    });});</script>					<form method="POST" id='search_proposal' name='search_proposal' action="<?php echo bloginfo('url') ?>/search_proposal/">				<td style="border:none" width="20%">							<select id="entrepreneur_country" name="entrepreneur_country" style="width:150px; height:25px; font-size:15px">							<option value="">Choose One</option>							<?php							$q_get_country= "select country_name from country_entrepreneur";							$hq_get_country= mysql_db_query($DataBase,$q_get_country);									while(list($country) = mysql_fetch_row($hq_get_country))							{							?>							<option value="<?php echo $country ?>"><?php echo $country ?></option>							<?php							}							?>							</select>				</td>				<td style="border:none" width="20%">							<select id="entrepreneur_state" name="entrepreneur_state" style="width:150px; height:25px; font-size:15px">							</select>				</td>				<td style="border:none" width="20%">							<select id="entrepreneur_industry" name="entrepreneur_industry" style="width:150px; height:25px; font-size:15px">							<option value="">Choose One</option>							<?php							$q_get_industry= "select distinct industry_1 from proposal";							$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);									while(list($industry) = mysql_fetch_row($hq_get_industry))							{							?>							<option value="<?php echo $industry ?>"><?php echo $industry ?></option>							<?php							}							?>							</select>				</td><script>$(document).ready(function() {$("#min_capital_needed").click(function(){	$("#min_capital_needed").keypad();	});$("#max_capital_needed").click(function(){	$("#max_capital_needed").keypad();	});});</script>				<td style="border:none" width="20%">							<font style="font-size:15px">S$</font><input type="text" name="min_capital_needed" id="min_capital_needed" value="" style="height:15px; width:80px;"  />				</td>				<td style="border:none" width="20%">							<font style="font-size:15px">S$</font><input type="text" name="max_capital_needed" id="max_capital_needed" value="" style="height:15px; width:80px;" />				</td>				<td style="border:none">				<input type="submit" id="search_proposal" name="search_proposal" value="OK">				</td>								</form>		</tr>		</tbody><script type="text/javascript">$(document).ready(function() {    	$("#business_partner_country").change(function() {		$(this).after('<div id="loader"><img src="<?php echo bloginfo('template_url'); ?>/images/loading.gif" alt="loading State..." /></div>');		$.get('<?php echo bloginfo('template_url'); ?>/country.php?status=entrepreneur&country=' + $(this).val(), function(data) {			$("#business_partner_state").html(data);			$('#loader').slideUp(200, function() {				$(this).remove();			});		});	    });});</script>				<tbody id="business_partner_search_engine" style="">		<form action="<?php echo bloginfo('url') ?>/search_partner/" method="POST" name="form_search_partner" id="form_search_partner" >		<script>		$("#business_partner_search_engine").css("display","none");		</script>		<tr>								<td style="border:none" width="25%">					Select Country:				</td>								<td style="border:none" width="25%">					Select State:				</td>				<td style="border:none" width="25%">					Select Industry:				</td>				<td style="border:none" width="20%">					Area of Expertise:				</td>								<td style="border:none">								</td>		</tr>		<tr>								<td style="border:none" width="20%">							<select id="business_partner_country" name="business_partner_country" style="width:150px; height:25px; font-size:15px">							<option value="">Choose One</option>							<?php							$q_get_country= "select country_name from country_entrepreneur";							$hq_get_country= mysql_db_query($DataBase,$q_get_country);									while(list($country) = mysql_fetch_row($hq_get_country))							{							?>							<option value="<?php echo $country ?>"><?php echo $country ?></option>							<?php							}							?>							</select>				</td>				<td style="border:none" width="20%">							<select id="business_partner_state" name="business_partner_state" style="width:150px; height:25px; font-size:15px">							</select>				</td>				<td style="border:none" width="25%">							<select id="business_partner_industry" name="business_partner_industry" style="width:150px; height:25px; font-size:15px">							<option value="">Choose One</option>							<?php							$q_get_industry= "select distinct industry_1 from proposal";							$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);									while(list($industry) = mysql_fetch_row($hq_get_industry))							{							?>							<option value="<?php echo $industry ?>"><?php echo $industry ?></option>							<?php							}							?>							</select>				</td>				<td style="border:none" width="20%">							<select id="area_of_expertise" name="area_of_expertise" style="width:150px; height:25px; font-size:15px">							<option value="">Choose One</option>							<?php							$q_expertise= "select distinct expertise_name from expertise";							$hq_expertise= mysql_db_query($DataBase,$q_expertise);									while(list($expertise) = mysql_fetch_row($hq_expertise))							{							?>							<option value="<?php echo $expertise ?>"><?php echo $expertise ?></option>							<?php							}							?>							</select>				</td>								<td style="border:none">				<input type="submit" id="search_partner" name="search_partner" value="OK" >				</td>						</tr>		</form>		</tbody>								<tbody id="investor_search_engine" style="">		<form action="<?php echo bloginfo('url') ?>/search_investor/" method="POST" name="form_search_investor" id="form_search_investor" >		<script>		$("#investor_search_engine").css("display","none");		</script>		<tr>						<td style="border:none" width="20%">					Select Country:				</td>								<td style="border:none" width="20%">					Select State:				</td>				<td style="border:none" width="20%">					Select Industry:				</td>								<td style="border:none" colspan=2>					<center>Range Funding [Min/ Max]:				</td>								<td style="border:none">								</td>						</tr>				<tr><script type="text/javascript">$(document).ready(function() {    	$("#investor_country").change(function() {		$(this).after('<div id="loader"><img src="<?php echo bloginfo('template_url'); ?>/images/loading.gif" alt="loading State..." /></div>');		$.get('<?php echo bloginfo('template_url'); ?>/country.php?status=investor&country=' + $(this).val(), function(data) {			$("#investor_state").html(data);			$('#loader').slideUp(200, function() {				$(this).remove();			});		});	    });});</script>									<td style="border:none" width="20%">							<select id="investor_country" name="investor_country" style="width:150px; height:25px; font-size:15px">							<option value="">Select One</option>							<?php							$q_get_country= "select distinct country_name from country_investor";							$hq_get_country= mysql_db_query($DataBase,$q_get_country);							//echo $q_get_data;							while(list($location) = mysql_fetch_row($hq_get_country))							{							?>							<option value="<?php  echo $location ?>"><?php echo $location ?></option>							<?php							}							?>							</select>				</td>				<td style="border:none" width="20%">							<select id="investor_state" name="investor_state" style="width:150px; height:25px; font-size:15px">							</select>				</td>				<td style="border:none" width="20%">							<select id="investor_industry" name="investor_industry" style="width:150px; height:25px; font-size:15px">							<option value="">Select One</option>							<?php							$q_get_industry= "select real_estate,it,tourism,manufacturing,E_Commerce,Entertainment,Pharmacy,Personal_care,Education,Leisure,Transportation,Agriculture,Building,Financial,Security,Mining,Retail,Marketing,Fashion,Aviation,Media,Biotechnology,Telecom,Food,Others from industry where real_estate!='' or it!='' or tourism!='' or manufacturing!='' or E_Commerce!='' or Entertainment!='' or Pharmacy!='' or Personal_care!='' or Education!='' or Leisure!='' or Transportation!='' or Agriculture!='' or Building!='' or Financial!=0 or Security!='' or Mining!='' or Retail!='' or Marketing!='' or Fashion!='' or Aviation!='' or Media!='' or Biotechnology!='' or Telecom!='' or Food!='' or Others!=''";							$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);														while(list($real_estate,$it,$tourism,$manufacturing,$e_commerce,$entertaiment,$pharmacy,$personal_care,$education,$leisure,$transportation,$agriculture,$building,$financial,$security,$mining,$retail,$marketing,$fashion,$aviation,$media,$biotechnology,$telecom,$food) = mysql_fetch_row($hq_get_industry))							{							if($real_estate!='')							{							?>							<option value="<?php  echo $real_estate ?>"><?php echo $real_estate ?></option>							<?php							}if($it!='')							{							?>							<option value="<?php  echo $it ?>"><?php echo $it ?></option>							<?php							}if($tourism!='')							{							?>							<option value="<?php  echo $tourism ?>"><?php echo $tourism ?></option>							<?php							}if($manufacturing!='')							{							?>							<option value="<?php  echo $manufacturing ?>"><?php echo $manufacturing ?></option>							<?php							}if($e_commerce!='')							{							?>							<option value="<?php  echo $e_commerce ?>"><?php echo $e_commerce ?></option>							<?php							}if($entertaiment!='')							{							?>							<option value="<?php  echo $entertaiment ?>"><?php echo $entertaiment ?></option>							<?php							}if($pharmacy!='')							{							?>							<option value="<?php  echo $pharmacy ?>"><?php echo $pharmacy ?></option>							<?php							}if($personal_care!='')							{							?>							<option value="<?php  echo $personal_care ?>"><?php echo $personal_care ?></option>							<?php							}if($education!='')							{							?>							<option value="<?php  echo $education ?>"><?php echo $education ?></option>							<?php							}if($leisure!='')							{							?>							<option value="<?php  echo $leisure ?>"><?php echo $leisure ?></option>							<?php							}if($transportation!='')							{							?>							<option value="<?php  echo $transportation ?>"><?php echo $transportation ?></option>							<?php							} if($agriculture!='')							{							?>							<option value="<?php  echo $agriculture ?>"><?php echo $agriculture ?></option>							<?php							}if($building!='')							{							?>							<option value="<?php  echo $building ?>"><?php echo $building ?></option>							<?php							} if($financial!='')							{							?>							<option value="<?php  echo $financial ?>"><?php echo $financial ?></option>							<?php							}if($security!='')							{							?>							<option value="<?php  echo $security ?>"><?php echo $security ?></option>							<?php							}if($mining!='')							{							?>							<option value="<?php  echo $mining ?>"><?php echo $mining ?></option>							<?php							} if($retail!='')							{							?>							<option value="<?php  echo $retail ?>"><?php echo $retail ?></option>							<?php							} if($marketing!='')							{							?>							<option value="<?php  echo $marketing ?>"><?php echo $marketing ?></option>							<?php							} if($fashion!='')							{							?>							<option value="<?php  echo $fashion ?>"><?php echo $fashion ?></option>							<?php							} if($aviation!='')							{							?>							<option value="<?php  echo $aviation ?>"><?php echo $aviation ?></option>							<?php							} if($media!='')							{							?>							<option value="<?php  echo $media ?>"><?php echo $media ?></option>							<?php							} if($biotechnology!='')							{							?>							<option value="<?php  echo $biotechnology ?>"><?php echo $biotechnology ?></option>							<?php							} if($telecom!='')							{							?>							<option value="<?php  echo $telecom ?>"><?php echo $telecom ?></option>							<?php							} if($food!='')							{							?>							<option value="<?php  echo $food ?>"><?php echo $food ?></option>							<?php							} if($others!='')							{							?>							<option value="<?php  echo $others ?>"><?php echo $others ?></option>							<?php							}							}							?>							</select><script>$(document).ready(function() {$("#min_funding").click(function(){	$("#min_funding").keypad();	});$("#max_funding").click(function(){	$("#max_funding").keypad();	});});</script>				</td>				<td style="border:none" width="20%">				<font style="font-size:15px">S$</font><input type="text" name="min_funding" id="min_funding" value="" style="height:15px; width:100px; " />							</td>				<td style="border:none" width="20%">				<font style="font-size:15px">S$</font><input type="text" name="max_funding" id="max_funding" value="" style="height:15px; width:100px; " />				</td>										</tr>		<tr>		<td style="border:none">		<input type="submit" id="search_proposal" name="search_proposal" value="Search Investor" style="text-transform:none; font-size:13px;">		</td>		</tr>		</form>		</tbody>			</table></div></td></tr></table>
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