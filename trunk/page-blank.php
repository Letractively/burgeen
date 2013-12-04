<?phpsession_start();
$_SESSION[path]= 'http://127.0.0.1/wordpress2';
/*
Template Name: Blank
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>	<?phpecho "login Status: ".$_SESSION[login];?>		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
<script>$(document).ready(function(){  $("#entrepreneur_button").click(function(){  $("#entrepreneur_search_engine").slideToggle();	$("#entrepreneur_search_engine").css("display","block");	$("#investor_search_engine").css("display","none");	$("#business_partner_search_engine").css("display","none");	$("#entrepreneur_button").css("color","blue");	$("#td_search").css("background-color","silver");	$("#td_entrepreneur").css("background-color","silver");	$("#td_investor").css("background-color","white");	$("#td_business_partner").css("background-color","white");	$("#investor_button").css("color","black");	$("#business_partner_button").css("color","black");  	  });  $("#investor_button").click(function(){    $("#investor_search_engine").slideToggle();	$("#investor_search_engine").css("display","block");	$("#entrepreneur_search_engine").css("display","none");	$("#business_partner_search_engine").css("display","none");	$("#investor_button").css("color","blue");	$("#td_investor").css("background-color","silver");	$("#td_entrepreneur").css("background-color","white");	$("#td_business_partner").css("background-color","white");	$("#entrepreneur_button").css("color","black");	$("#business_partner_button").css("color","black");  });    $("#business_partner_button").click(function(){    $("#business_partner_search_engine").slideToggle();	$("#business_partner_search_engine").css("display","block");	$("#entrepreneur_search_engine").css("display","none");	$("#investor_search_engine").css("display","none");	$("#investor_button").css("color","black");	$("#entrepreneur_button").css("color","black");	$("#business_partner_button").css("color","blue");	$("#td_investor").css("background-color","white");	$("#td_entrepreneur").css("background-color","white");	$("#td_business_partner").css("background-color","silver");	  });      });function confirm(){var test = document.getElementById('entrepreneur_country');var selected = test.options[test.selectedIndex].text;alert(selected);}</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<Table border=0 width="50%" ><tr><td id="td_entrepreneur" name="td_entrepreneur" bgcolor=""><input type="submit" value="Entrepreneur Proposal" id="entrepreneur_button" style="font-size:15pt"></td><td id="td_business_partner" name="td_business_partner"><input type="submit" value="Find Business Partner" id="business_partner_button" style="font-size:15pt"></td><td id="td_investor" name="td_investor"  bgcolor=""><input type="submit" value="Find Investor" id="investor_button" style="font-size:15pt"></td></tr><tr><td id="td_search" name="td_search"  colspan=3  ><div>	<table rules="none" style="border:0px;border:none;width:100%;text-align:center">				<tbody id="entrepreneur_search_engine" style="">		<script>		$("#entrepreneur_search_engine").css("display","none");		</script>		<tr>								<td style="border:none" width="25%">					Select Country:				</td>								<td style="border:none" width="25%">					Select State:				</td>				<td style="border:none" width="25%">					Select Industry:				</td>				<td style="border:none" width="20%">					Select Funding:				</td>				<td style="border:none" width="20%">					Select Equity:				</td>				<td>								</td>		</tr>		<tr>								<td style="border:none" width="20%">							<select id="entrepreneur_country" name="entrepreneur_country" style="width:150px; height:25px; font-size:15px">							<option value="">Singapore</option>							<option value="">Indonesia</option>							</select>				</td>				<td style="border:none" width="20%">							<select id="entrepreneur_state" name="entrepreneur_state" style="width:150px; height:25px; font-size:15px">							<option value="">Jawa Timur</option>							<option value="">Sumatra</option>							</select>				</td>				<td style="border:none" width="25%">							<select id="entrepreneur_industry" name="entrepreneur_industry" style="width:150px; height:25px; font-size:15px">							<option value="">Real Estate</option>							<option value="">Manufacture</option>							</select>				</td>				<td style="border:none" width="20%">							<select id="entrepreneur_funding" name="entrepreneur_funding" style="width:150px; height:25px; font-size:15px">							<option value="">$10.000</option>							<option value="">$20.000</option>							</select>				</td>				<td style="border:none" width="20%">							<select id="entrepreneur_equity" name="entrepreneur_equity" style="width:150px; height:25px; font-size:15px">							<option value="">$40000</option>							<option value="">$80000</option>							</select>				</td>				<td>				<input type="submit" id="search_entrepreneur" name="search_entrepreneur" value="OK" onclick=confirm()>				</td>						</tr>		</tbody>				<tbody id="business_partner_search_engine" style="">		<script>		$("#business_partner_search_engine").css("display","none");		</script>		<tr>								<td style="border:none" width="25%">					Select Country:				</td>								<td style="border:none" width="25%">					Select State:				</td>				<td style="border:none" width="25%">					Select Industry:				</td>				<td style="border:none" width="20%">					Area of Expertise:				</td>				<td style="border:none" width="20%">					Ready to Invest:				</td>				<td>								</td>		</tr>		<tr>								<td style="border:none" width="20%">							<select id="entrepreneur_country" name="entrepreneur_country" style="width:150px; height:25px; font-size:15px">							<option value="">Singapore</option>							<option value="">Indonesia</option>							</select>				</td>				<td style="border:none" width="20%">							<select id="business_partner_state" name="business_partner_state" style="width:150px; height:25px; font-size:15px">							<option value="">Jawa Timur</option>							<option value="">Sumatra</option>							</select>				</td>				<td style="border:none" width="25%">							<select id="business_partner_industry" name="business_partner_industry" style="width:150px; height:25px; font-size:15px">							<option value="">Real Estate</option>							<option value="">Manufacture</option>							</select>				</td>				<td style="border:none" width="20%">							<select id="area_of_expertise" name="area_of_expertise" style="width:150px; height:25px; font-size:15px">							<option value="">$10.000</option>							<option value="">$20.000</option>							</select>				</td>				<td style="border:none" width="20%">							<select id="ready_to_invest" name="ready_to_invest" style="width:100px; height:25px; font-size:15px">							<option value="yes">Yes</option>							<option value="no">No</option>							</select>				</td>				<td>				<input type="submit" id="search_entrepreneur" name="search_entrepreneur" value="OK" onclick=confirm()>				</td>						</tr>		</tbody>								<tbody id="investor_search_engine" style="">		<script>		$("#investor_search_engine").css("display","none");		</script>		<tr>						<td style="border:none" width="20%">					Select Country:				</td>								<td style="border:none" width="25%">					Select State:				</td>				<td style="border:none" width="25%">					Select Industry:				</td>				<td style="border:none" width="20%">					Select Funding:				</td>				<td style="border:none" width="20%">					Select Equity:				</td>						</tr>		<tr>								<td style="border:none" width="20%">							<select id="investor_country" name="investor_country" style="width:150px; height:25px; font-size:15px">							<option value="">Investor</option>							<option value="">Entrepreneur</option>							</select>				</td>				<td style="border:none" width="25%">							<select id="investor_state" name="investor_state" style="width:150px; height:25px; font-size:15px">							<option value="">Investor</option>							<option value="">Entrepreneur</option>							</select>				</td>				<td style="border:none" width="25%">							<select id="investor_industry" name="investor_industry" style="width:150px; height:25px; font-size:15px">							<option value="">Investor</option>							<option value="">Entrepreneur</option>							</select>				</td>				<td style="border:none" width="20%">							<select id="investor_funding" name="investor_funding" style="width:150px; height:25px; font-size:15px">							<option value="">Investor</option>							<option value="">Entrepreneur</option>							</select>				</td>				<td style="border:none" width="20%">							<select id="investor_equity" name="investor_equity" style="width:150px; height:25px; font-size:15px">							<option value="">Investor</option>							<option value="">Entrepreneur</option>							</select>				</td>				<td>				<input type="submit" id="search_investor" name="search_investor" value="OK">				</td>						</tr>		</tbody>			</table></div></td></tr></table>
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