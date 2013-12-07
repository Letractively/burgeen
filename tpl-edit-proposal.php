<?phpsession_start();
include('database.php');
/*
Template Name: Template Edit Proposal
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" class="current"><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investor_search/" title="" ><span>Investor Search</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/upgrade_plan/" title=""><span><font color=red>Upgrade Plan Now</font></span></a></li>	<li><a href="<?php echo bloginfo('url')?>/buy_nudge/" title="" ><span><font color=red>Buy Nudge</font></span></a></li>       </ul>    </div>    </div>
	<Script>$(document).ready(function(){var valid=false;$("#div_company_information").css("display","none");$("#div_pitch_and_deal").css("display","none");$("#div_team").css("display","none");$("#div_financial").css("display","none"); $("#company_information").click(function(){$("#div_company_information").slideToggle();$("#div_pitch_and_deal").css("display","none");$("#div_team").css("display","none");$("#div_financial").css("display","none");valid=false;});$("#pitch_and_deal").click(function(){$("#div_pitch_and_deal").slideToggle();$("#div_company_information").css("display","none");$("#div_team").css("display","none");$("#div_financial").css("display","none");valid=false;});$("#team").click(function(){$("#div_team").slideToggle();$("#div_company_information").css("display","none");$("#div_pitch_and_deal").css("display","none");$("#div_financial").css("display","none");valid=false;});$("#financial").click(function(){$("#div_financial").slideToggle();$("#div_company_information").css("display","none");$("#div_pitch_and_deal").css("display","none");$("#div_team").css("display","none");valid=false;});//cek if add proposal button clicked and process it$("#add_proposal").click(function(){valid=true;});$("#form_add_proposal").submit(function() {//outside (check and validation)if($("#company_name").val() ==''){$("#company_name").css("border-color","red");valid=false;}if($("#title_proposal").val() ==''){$("#title_proposal").css("border-color","red");valid=false;}if($("#short_summary").val() ==''){$("#short_summary").css("border-color","red");valid=false;}if($("#the_pitch").val() ==''){$("#the_pitch").css("border-color","red");valid=false;}if($("#the_deal").val() ==''){$("#the_deal").css("border-color","red");valid=false;}if($("#the_team").val() ==''){$("#the_team").css("border-color","red");valid=false;}if($("#company_name").val() !=''){$("#company_name").css("border-color","rgb(212,212,212)");}if($("#title_proposal").val() !=''){$("#title_proposal").css("border-color","rgb(212,212,212)");}if($("#short_summary").val() !=''){$("#short_summary").css("border-color","rgb(212,212,212)");}if($("#the_deal").val() !=''){$("#the_deal").css("border-color","rgb(212,212,212)");}if($("#the_team").val() !=''){$("#the_team").css("border-color","rgb(212,212,212)");}//if valid is trueif(valid) {return true;}else{return false;}});});</script>	
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>"><h1>Edit Proposal</h1><br><?php			$q_get_proposal= "select state,company_name,website,management_location,industry_1,reason,stage,investor_role,previous_raise,total_raise,total_have_you_raised,minimum_investment,title,short_summary,the_pitch,highlight_1,highlight_2,highlight_3,highlight_4,highlight_5,the_deal,team_role_company,team_name,team_linkedin,team_position,date from proposal where proposal_id = '$_SESSION[proposal_id]'";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);			//echo $q_get_proposal;			while(list($state,$company_name,$website,$management_location,$industry_1,$reason,$stage,$investor_role,$previous_raise,$total_raise,$total_have_you_raised,$minimum_investment,$title,$short_summary,$the_pitch,$highlight_1,$highlight_2,$highlight_3,$highlight_4,$highlight_5,$the_deal,$team_role_company,$team_name,$team_linkedin,$team_position,$date) = mysql_fetch_row($hq_get_proposal))			{?><form action="<?php echo bloginfo('template_url') ?>/update_proposal.php" method="POST" name="form_add_proposal" id="form_add_proposal"   ><table><br><tr>
<td><input type="submit" id="company_information"  value="                                                                                                             Company Information                                                                                                         "  /></td></tr><tr><script type="text/javascript">$(document).ready(function() {    	$("#location").change(function() {		$(this).after('<div id="loader"><img src="<?php echo bloginfo('template_url'); ?>/images/loading.gif" alt="loading State..." /></div>');		$.get('<?php echo bloginfo('template_url'); ?>/country.php?status=entrepreneur&country=' + $(this).val(), function(data) {			$("#state").html(data);			$('#loader').slideUp(200, function() {				$(this).remove();			});		});	    });});</script><table id="div_company_information"><tr><td>Company Name * :</td><td><input type="text" name="company_name" id="company_name" value="<?php echo $company_name ?>" style="height:25px; font-size:13pt" /></td></tr><tr><td>Website :</td><td><input type="text" name="website" id="website" value="<?php echo $website ?>" style="height:25px; font-size:13pt" /></td></tr><tr><td>Country :</td><td><select id="location" name="location"  style="height:25px; font-size:13pt" ><option id='country' value="" >Choose One</option><?php  $q_get_country= "select country_name from country_entrepreneur";$hq_get_country= mysql_db_query($DataBase,$q_get_country);while(list($country) = mysql_fetch_row($hq_get_country)){?>							<option id='country' value="<?php echo $country; ?>" <?php if($country==$management_location){ echo "selected"; } ?>><?php  echo $country; ?></option><?php  } ?>									</select></td></tr><tr><td>State :</td><td><select id="state" name="state"  style="height:25px; font-size:13pt" ><option value="<?php echo $state ?>"><?php echo $state ?></option>									</select></td></tr><tr><td>Industry :</td><td><select id="industry_1" name="industry_1"  style="height:25px; font-size:13pt" >							<option value="">Select One</option>							<option value="Real Estate" <?php if($industry_1=='Real Estate') { ?> selected <?php } ?>  >Real Estate</option>							<option value="Information Technology" <?php if($industry_1=='Information Technology') { ?> selected <?php } ?>  >Information Technology</option>							<option value="Food and beverage Industry" <?php if($industry_1=='Food and beverage Industry') { ?> selected <?php } ?>  >Food and beverage Industry</option>							<option value="Tourism Hospitality, Restaurants & Bars" <?php if($industry_1=='Tourism Hospitality, Restaurants & Bars') { ?> selected <?php } ?>  >Tourism Hospitality, Restaurants & Bars</option>							<option value="Manufacturing" <?php if($industry_1=='Manufacturing') { ?> selected <?php } ?> >Manufacturing</option>							<option value="E-Commerce" <?php if($industry_1=='E-Commerce') { ?> selected <?php } ?> >E-Commerce</option>							<option value="Entertainment" <?php if($industry_1=='Entertainment') { ?> selected <?php } ?> >Entertainment</option>							<option value="Pharmacy" <?php if($industry_1=='Pharmacy') { ?> selected <?php } ?> >Pharmacy</option>							<option value="Personal-care" <?php if($industry_1=='Personal-care') { ?> selected <?php } ?> >Personal-care</option>							<option value="Education and Training" <?php if($industry_1=='Education and Training') { ?> selected <?php } ?> >Education and Training</option>							<option value="Leisure, Tourism & Hotels" <?php if($industry_1=='Leisure, Tourism & Hotels') { ?> selected <?php } ?> >Leisure, Tourism & Hotels</option>							<option value="Transportation" <?php if($industry_1=='Transportation') { ?> selected <?php } ?> >Transportation</option>							<option value="Agriculture" <?php if($industry_1=='Agriculture') { ?> selected <?php } ?> >Agriculture</option>							<option value="Building Services & Products"  <?php if($industry_1=='Building Services & Products') { ?> selected <?php } ?> >Building Services & Products</option>							<option value="Financial, Business & Legal Services" <?php if($industry_1=='Financial, Business & Legal Services') { ?> selected <?php } ?>>Financial, Business & Legal Services</option>							<option value="Security & Defense" <?php if($industry_1=='Security & Defense') { ?> selected <?php } ?> >Security & Defense</option>							<option value="Mining, Oil & Gas" <?php if($industry_1=='LMining, Oil & Gas') { ?> selected <?php } ?> >Mining, Oil & Gas</option>							<option value="Retail" <?php if($industry_1=='Retail') { ?> selected <?php } ?> >Retail</option>							<option value="Marketing & Advertising" <?php if($industry_1=='Marketing & Advertising') { ?> selected <?php } ?> >Marketing & Advertising</option>							<option value="Fashion & Beauty" <?php if($industry_1=='Fashion & Beauty') { ?> selected <?php } ?> >Fashion & Beauty</option>							<option value="Aviation" <?php if($industry_1=='Aviation') { ?> selected <?php } ?> >Aviation</option>							<option value="Media & Publishing" <?php if($industry_1=='Media & Publishing') { ?> selected <?php } ?> >Media & Publishing</option>							<option value="Biotechnology & Life Sciences" <?php if($industry_1=='Biotechnology & Life Sciences') { ?> selected <?php } ?> >Biotechnology& Life Sciences</option>							<option value="Telecom & Mobile" <?php if($industry_1=='Telecom & Mobile') { ?> selected <?php } ?> >Telecom & Mobile</option>							<option value="Others" <?php if($industry_1=='Others') { ?> selected <?php } ?> >Others</option>							</select></td></tr>						<tr><td>Primary Reason Needed Capital :</td><td><select id="reason" name="reason"  style="height:25px; font-size:13pt" >							<option value="">Select One</option>							<option value="research and development" <?php if($reason=='research and development') { ?> selected <?php } ?> >Research and Development</option>							<option value="sales and marketing" <?php if($reason=='sales and marketing') { ?> selected <?php } ?> >Sales and Marketing</option>							<option value="property" <?php if($reason=='property') { ?> selected <?php } ?> >Property</option>							<option value="Equipment and inventory" <?php if($reason=='Equipment and inventory') { ?> selected <?php } ?> >Equipment and Inventory</option>							<option value="debt refinance" <?php if($reason=='debt refinance') { ?> selected <?php } ?> >Debt Refinance</option>							<option value="web development" <?php if($reason=='web development') { ?> selected <?php } ?> >Web Development</option>							<option value="acquisition" <?php if($reason=='acquisition') { ?> selected <?php } ?> >Acquisition</option>							<option value="staff" <?php if($reason=='staff') { ?> selected <?php } ?> >Staff</option>							<option value="other" <?php if($reason=='other') { ?> selected <?php } ?> >Other</option>							</select></td></tr>								<tr><td>Stage :</td><td><select id="stage" name="stage"  style="height:25px; font-size:13pt" >							<option value="">Select One</option>							<option value="pre-startup/R&D" <?php if($stage=='pre-startup/R&D') { ?> selected <?php } ?> >Pre-Startup / R&D</option>							<option value="finished product" <?php if($stage=='finished product') { ?> selected <?php } ?> >Finished Product</option>							<option value="achieving sales" <?php if($stage=='achieving sales') { ?> selected <?php } ?> >Achieving Sales</option>							<option value="breaking even" <?php if($stage=='breaking even') { ?> selected <?php } ?> >Breaking Even</option>							<option value="profitable" <?php if($stage=='profitable') { ?> selected <?php } ?> >Profitable</option>							</select></td></tr>								<tr><td>Ideal Investor Role :</td><td><select id="investor_role" name="investor_role"  style="height:25px; font-size:13pt" >							<option value="">Select One</option>							<option value="Silent" <?php if($investor_role=='Silent') { ?> selected <?php } ?> >Silent</option>							<option value="daily involvement" <?php if($investor_role=='daily involvement') { ?> selected <?php } ?> >Daily Involvement</option>							<option value="weekly involvement" <?php if($investor_role=='weekly involvement') { ?> selected <?php } ?> >Weekely Involvement</option>							<option value="monthly involvement" <?php if($investor_role=='monthly involvement') { ?> selected <?php } ?> >Monthly Involvement</option>							<option value="any" <?php if($investor_role=='any') { ?> selected <?php } ?> >any</option>							</select></td></tr>	<tr><td>If you did a previous round, how much did you raise?</td><td>S$ <input type="number" name="previous_raise" id="previous_raise" value="<?php echo $previous_raise ?>" style="height:25px; width:150px; font-size:13pt" /></td></tr>	<tr><td>Capital Needed :</td><td>S$ <input type="number" name="total_raise" id="total_raise" value="<?php echo $total_raise ?>" style="height:25px; width:150px; font-size:13pt" /></td></tr>	<tr><td>How much of this total have you raised?</td><td>S$ <input type="number" name="total_have_you_raised" id="total_have_you_raised" value="<?php echo $total_have_you_raised ?>" style="height:25px; width:150px; font-size:13pt" /></td></tr>	<tr><td>What is the minimum investment per investor?</td><td>S$ <input type="number" name="minimum_investment" id="minimum_investment" value="<?php echo $minimum_investment ?>" style="height:25px; width:150px; font-size:13pt" /></td></tr>							</table></tr><tr><td><input type="submit" id="pitch_and_deal" value="                                                                                                                          Pitch & Deal                                                                                                                      " /></td></tr><tr><table id="div_pitch_and_deal"><tr><td>Title * :</td><td><input type="text" name="title_proposal" id="title_proposal" value="<?php  echo $title ?>" style="height:25px; width:500px; font-size:13pt" /></td></tr><tr><td>Short Summary * :</td><td><textarea name="short_summary" id="short_summary" style="height:55px; font-size:13pt" ><?php echo $short_summary ?></textarea></td></tr><tr><td>The Pitch * :</td><td><textarea name="the_pitch" id="the_pitch" value="" style="height:100px; font-size:13pt" ><?php echo $the_pitch ?></textarea></td></tr><tr><td>Highlight 1 :</td><td><input type="text" name="highlight_1" id="highlight_1" value="<?php echo $highlight_1 ?>" style="height:25px; width:500px;  font-size:13pt" /></td></tr><tr><td>Highlight 2 :</td><td><input type="text" name="highlight_2" id="highlight_2" value="<?php echo $highlight_2 ?>" style="height:25px; width:500px;  font-size:13pt" /></td></tr><tr><td>Highlight 3 :</td><td><input type="text" name="highlight_3" id="highlight_3" value="<?php echo $highlight_3 ?>" style="height:25px; width:500px;  font-size:13pt" /></td></tr><tr><td>Highlight 4 :</td><td><input type="text" name="highlight_4" id="highlight_4" value="<?php echo $highlight_4 ?>" style="height:25px; width:500px;  font-size:13pt" /></td></tr><tr><td>Highlight 5 :</td><td><input type="text" name="highlight_5" id="highlight_5" value="<?php echo $highlight_5 ?>" style="height:25px; width:500px;  font-size:13pt" /></td></tr><tr><td>The Deal * :</td><td><textarea name="the_deal" id="the_deal" value="" style="height:60px; font-size:13pt" ><?php echo $the_deal ?></textarea></td></tr></table></tr><tr><br><td><input type="submit" id="team" value="                                                                                                                                Team                                                                                                                               " /></td></tr><tr><table id="div_team"><tr><td>The Team * :</td><td><textarea name="the_team" id="the_team" value="" style="height:60px; width:500px; font-size:13pt" ><?php echo $team_role_company ?></textarea></td></tr><tr><td>Name :</td><td><input type="text" name="personal_name" id="personal_name" value="<?php echo $team_name ?>" style="height:25px;  font-size:13pt" /></td></tr><tr><td>Linkedin / Website :</td><td><input type="text" name="linkedin" id="linkedin" value="<?php echo $team_linkedin ?>" style="height:25px;  font-size:13pt" /></td></tr><tr><td>Position :</td><td><textarea name="position" id="position" value="" style="height:100px; font-size:13pt" ><?php echo $team_position ?></textarea></td></tr></table></tr><br><td><input type="submit" id="financial" value="                                                                                                                Financial (OPTIONAL)                                                                                                              " /></td><tr><table id="div_financial"><script>$(document).ready(function(){function isNumber (o) {  return ! isNaN (o-0);}$("#previous_turnover_2").keyup(function(e){txtVal = $(this).val();   if(!isNumber(txtVal)) {     $(this).val('') }});$("#previous_turnover_1").keyup(function(e){txtVal = $(this).val();   if(!isNumber(txtVal)) {     $(this).val('') }});$("#previous_turnover_3").keyup(function(e){txtVal = $(this).val();   if(!isNumber(txtVal)) {     $(this).val('') }});$("#previous_profit_1").keyup(function(e){txtVal = $(this).val();   if(!isNumber(txtVal)) {     $(this).val('') }});$("#previous_profit_2").keyup(function(e){txtVal = $(this).val();   if(!isNumber(txtVal)) {     $(this).val('') }});$("#previous_profit_3").keyup(function(e){txtVal = $(this).val();   if(!isNumber(txtVal)) {     $(this).val('') }});});</script><tr><td colspan=3><b>Previous Financials:</b></td></tr><tr><td width="200px">Years</td><td width="400px">TurnOver</td><td width="400px">Profit</td></tr><tr><?php			$q_finance= "select years,turnover,profit from finance where proposal_id='$_SESSION[proposal_id]' ORDER BY years asc LIMIT 0,1";			$hq_finance= mysql_db_query($DataBase,$q_finance);					while(list($year,$turnover,$profit) = mysql_fetch_row($hq_finance))			{?><td><select id="previous_year_1" name="previous_year_1"  style="height:25px; font-size:13pt" >							<option value="2013" <?php  if($year==2013){ echo "selected";  } ?> >2013</option>							<option value="2012" <?php  if($year==2012){ echo "selected";  } ?> >2012</option>							<option value="2011" <?php  if($year==2011){ echo "selected";  } ?> >2011</option>							<option value="2010" <?php  if($year==2010){ echo "selected";  } ?> >2010</option>							<option value="2009" <?php  if($year==2009){ echo "selected";  } ?> >2009</option>							<option value="2008" <?php  if($year==2008){ echo "selected";  } ?> >2008</option>							<option value="2007" <?php  if($year==2007){ echo "selected";  } ?> >2007</option>							<option value="2006" <?php  if($year==2006){ echo "selected";  } ?> >2006</option>							<option value="2005" <?php  if($year==2005){ echo "selected";  } ?> >2005</option>							<option value="2004" <?php  if($year==2004){ echo "selected";  } ?> >2004</option>							</select></td><td>S$ <input type="text" name="previous_turnover_1" id="previous_turnover_1" value="<?php echo $turnover  ?>" style="width:150px; height:20px; font-size:15px" /></td><td>S$ <input type="text" name="previous_profit_1" id="previous_profit_1" value="<?php  echo $profit ?>" style="width:150px; height:20px; font-size:15px" /></td><?php } ?></tr><tr><?php			$q_finance1= "select years,turnover,profit from finance where proposal_id='$_SESSION[proposal_id]' ORDER BY years asc LIMIT 1,1";			$hq_finance1= mysql_db_query($DataBase,$q_finance1);					while(list($year,$turnover,$profit) = mysql_fetch_row($hq_finance1))			{?><td><select id="previous_year_2" name="previous_year_2"  style="height:25px; font-size:13pt" >							<option value="2013" <?php  if($year==2013){ echo "selected";  } ?> >2013</option>							<option value="2012" <?php  if($year==2012){ echo "selected";  } ?> >2012</option>							<option value="2011" <?php  if($year==2011){ echo "selected";  } ?> >2011</option>							<option value="2010" <?php  if($year==2010){ echo "selected";  } ?> >2010</option>							<option value="2009" <?php  if($year==2009){ echo "selected";  } ?> >2009</option>							<option value="2008" <?php  if($year==2008){ echo "selected";  } ?> >2008</option>							<option value="2007" <?php  if($year==2007){ echo "selected";  } ?> >2007</option>							<option value="2006" <?php  if($year==2006){ echo "selected";  } ?> >2006</option>							<option value="2005" <?php  if($year==2005){ echo "selected";  } ?> >2005</option>							<option value="2004" <?php  if($year==2004){ echo "selected";  } ?> >2004</option>							</select></td><td>S$ <input type="text" name="previous_turnover_2" id="previous_turnover_2" value="<?php echo $turnover  ?>" style="width:150px; height:20px; font-size:15px" /></td><td>S$ <input type="text" name="previous_profit_2" id="previous_profit_2" value="<?php  echo $profit ?>" style="width:150px; height:20px; font-size:15px" /></td><?php } ?></tr><tr><?php			$q_finance1= "select years,turnover,profit from finance where proposal_id='$_SESSION[proposal_id]' ORDER BY years asc LIMIT 2,1";			$hq_finance1= mysql_db_query($DataBase,$q_finance1);					while(list($year,$turnover,$profit) = mysql_fetch_row($hq_finance1))			{?><td><select id="previous_year_3" name="previous_year_3"  style="height:25px; font-size:13pt" >							<option value="2013" <?php  if($year==2013){ echo "selected";  } ?> >2013</option>							<option value="2012" <?php  if($year==2012){ echo "selected";  } ?> >2012</option>							<option value="2011" <?php  if($year==2011){ echo "selected";  } ?> >2011</option>							<option value="2010" <?php  if($year==2010){ echo "selected";  } ?> >2010</option>							<option value="2009" <?php  if($year==2009){ echo "selected";  } ?> >2009</option>							<option value="2008" <?php  if($year==2008){ echo "selected";  } ?> >2008</option>							<option value="2007" <?php  if($year==2007){ echo "selected";  } ?> >2007</option>							<option value="2006" <?php  if($year==2006){ echo "selected";  } ?> >2006</option>							<option value="2005" <?php  if($year==2005){ echo "selected";  } ?> >2005</option>							<option value="2004" <?php  if($year==2004){ echo "selected";  } ?> >2004</option>							</select></td><td>S$ <input type="text" name="previous_turnover_3" id="previous_turnover_3" value="<?php echo $turnover  ?>" style="width:150px; height:20px; font-size:15px" /></td><td>S$ <input type="text" name="previous_profit_3" id="previous_profit_3" value="<?php  echo $profit ?>" style="width:150px; height:20px; font-size:15px" /></td><?php } ?></tr><tr><td colspan=3><b>Projected Financials:</b></td></tr><tr><td>Years</td><td>TurnOver</td><td>Profit</td></tr><tr><?php			$q_finance1= "select years,turnover,profit from finance where proposal_id='$_SESSION[proposal_id]' ORDER BY years asc LIMIT 3,1";			$hq_finance1= mysql_db_query($DataBase,$q_finance1);					while(list($year,$turnover,$profit) = mysql_fetch_row($hq_finance1))			{?><td><select id="projected_year_1" name="projected_year_1"  style="height:25px; font-size:13pt" >							<option value="2014" <?php if($year==2014){ echo"selected"; }  ?> >2014</option>							<option value="2015" <?php if($year==2015){ echo"selected"; }  ?> >2015</option>							<option value="2016" <?php if($year==2016){ echo"selected"; }  ?> >2016</option>							<option value="2017" <?php if($year==2017){ echo"selected"; }  ?> >2017</option>							<option value="2018" <?php if($year==2018){ echo"selected"; }  ?> >2018</option>							<option value="2019" <?php if($year==2019){ echo"selected"; }  ?> >2019</option>							<option value="2020" <?php if($year==2020){ echo"selected"; }  ?> >2020</option>							<option value="2021" <?php if($year==2021){ echo"selected"; }  ?> >2021</option>							<option value="2022" <?php if($year==2022){ echo"selected"; }  ?> >2022</option>							<option value="2023" <?php if($year==2023){ echo"selected"; }  ?> >2023</option>							</select></td><td>S$ <input type="text" name="projected_turnover_1" id="projected_turnover_1" value="<?php echo $turnover; ?>" style="width:150px; height:20px; font-size:15px" /></td><td>S$ <input type="text" name="projected_profit_1" id="projected_profit_1" value="<?php echo $profit; ?>" style="width:150px; height:20px; font-size:15px" /></td><?php } ?></tr><tr><?php			$q_finance1= "select years,turnover,profit from finance where proposal_id='$_SESSION[proposal_id]' ORDER BY years asc LIMIT 4,1";			$hq_finance1= mysql_db_query($DataBase,$q_finance1);					while(list($year,$turnover,$profit) = mysql_fetch_row($hq_finance1))			{?><td><select id="projected_year_2" name="projected_year_2"  style="height:25px; font-size:13pt" >							<option value="2014" <?php if($year==2014){ echo"selected"; }  ?> >2014</option>							<option value="2015" <?php if($year==2015){ echo"selected"; }  ?> >2015</option>							<option value="2016" <?php if($year==2016){ echo"selected"; }  ?> >2016</option>							<option value="2017" <?php if($year==2017){ echo"selected"; }  ?> >2017</option>							<option value="2018" <?php if($year==2018){ echo"selected"; }  ?> >2018</option>							<option value="2019" <?php if($year==2019){ echo"selected"; }  ?> >2019</option>							<option value="2020" <?php if($year==2020){ echo"selected"; }  ?> >2020</option>							<option value="2021" <?php if($year==2021){ echo"selected"; }  ?> >2021</option>							<option value="2022" <?php if($year==2022){ echo"selected"; }  ?> >2022</option>							<option value="2023" <?php if($year==2023){ echo"selected"; }  ?> >2023</option>							</select></td><td>S$ <input type="text" name="projected_turnover_2" id="projected_turnover_2" value="<?php echo $turnover; ?>" style="width:150px; height:20px; font-size:15px" /></td><td>S$ <input type="text" name="projected_profit_2" id="projected_profit_2" value="<?php echo $profit; ?>" style="width:150px; height:20px; font-size:15px" /></td><?php } ?></tr><tr><?php			$q_finance1= "select years,turnover,profit from finance where proposal_id='$_SESSION[proposal_id]' ORDER BY years asc LIMIT 5,1";			$hq_finance1= mysql_db_query($DataBase,$q_finance1);					while(list($year,$turnover,$profit) = mysql_fetch_row($hq_finance1))			{?><td><select id="projected_year_3" name="projected_year_3"  style="height:25px; font-size:13pt" >							<option value="2014" <?php if($year==2014){ echo"selected"; }  ?> >2014</option>							<option value="2015" <?php if($year==2015){ echo"selected"; }  ?> >2015</option>							<option value="2016" <?php if($year==2016){ echo"selected"; }  ?> >2016</option>							<option value="2017" <?php if($year==2017){ echo"selected"; }  ?> >2017</option>							<option value="2018" <?php if($year==2018){ echo"selected"; }  ?> >2018</option>							<option value="2019" <?php if($year==2019){ echo"selected"; }  ?> >2019</option>							<option value="2020" <?php if($year==2020){ echo"selected"; }  ?> >2020</option>							<option value="2021" <?php if($year==2021){ echo"selected"; }  ?> >2021</option>							<option value="2022" <?php if($year==2022){ echo"selected"; }  ?> >2022</option>							<option value="2023" <?php if($year==2023){ echo"selected"; }  ?> >2023</option>							</select></td><td>S$ <input type="text" name="projected_turnover_3" id="projected_turnover_3" value="<?php echo $turnover; ?>" style="width:150px; height:20px; font-size:15px" /></td><td>S$ <input type="text" name="projected_profit_3" id="projected_profit_3" value="<?php echo $profit; ?>" style="width:150px; height:20px; font-size:15px" /></td><?php } ?></tr></table></tr>		</table>				<br>		<center><input type="submit" align="center" name="add_proposal" id="add_proposal" value="Update Proposal" style="height:40px;  font-size:13pt" /></center>			</form>			<?php}?>				<a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" ><-- back</a>		
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