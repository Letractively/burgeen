<?phpsession_start();
include('database.php');$conn=$_SESSION[conn];if(isset($_POST[per_page])){$_SESSION[per_page]=$_POST[per_page];$perpage = $_POST[per_page];}else{ //default set to 5 records per page.$perpage = $_SESSION[per_page];}
/*
Template Name: Template Search Investor
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);
//if you already login and you are entrepreneurif(isset($_SESSION[login]) and $_SESSION[user_type]=='entrepreneur'){
	?><head><link type="text/css" href="<?php echo bloginfo('template_url') ?>/jquery.keypad.css" rel="stylesheet"><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/jquery.keypad.js"></script>	<br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" ><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_investor/" title="" class="current"><span>Search Investor</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_partner/" title="" ><span>Search Partner</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/upgrade_plan/" title=""><span><font color=red>Upgrade Plan Now</font></span></a></li>	<li><a href="<?php echo bloginfo('url')?>/buy_nudge/" title="" ><span><font color=red>Buy Nudge</font></span></a></li>       </ul>    </div>    </div>

	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>"><?php	//pagingif(isset($_GET["hal"])){	$page = intval($_GET["hal"]);}else {$page = 1;}$calc = $perpage * $page;$start = $calc - $perpage;	?>	<table rules="none" style="border:0px;border:none;width:100%;text-align:center" bgcolor=silver>		<form action="" method="POST" name="form_search" id="form_search" >		<tbody id="investor_search_engine" style="">				<tr>								<td style="border:none" width="20%">					Select Country:				</td>								<td style="border:none" width="20%">					Select State:				</td>				<td style="border:none" width="20%">					Select Industry:				</td>								<td style="border:none" colspan=2>					<center>Range Funding [Min/ Max]:				</td>								<td style="border:none" > 								</td>		</tr>		<tr><script type="text/javascript">$(document).ready(function() {    	$("#investor_country").change(function() {		$(this).after('<div id="loader"><img src="<?php echo bloginfo('template_url'); ?>/images/loading.gif" alt="loading State..." /></div>');		$.get('<?php echo bloginfo('template_url'); ?>/country.php?status=investor&country=' + $(this).val(), function(data) {			$("#investor_state").html(data);			$('#loader').slideUp(200, function() {				$(this).remove();			});		});	    });//cek number and limitfunction isNumber (o) {  return ! isNaN (o-0);}  	$("#min_funding").keyup(function(e){txtVal = $(this).val();   if( txtVal.length>15 && isNumber(txtVal)) {     $(this).val(txtVal.substring(0,15) ) } if(!isNumber(txtVal)) {     $(this).val('') }});$("#max_funding").keyup(function(e){txtVal = $(this).val();   if( txtVal.length>15 && isNumber(txtVal)) {     $(this).val(txtVal.substring(0,15) ) } if(!isNumber(txtVal)) {     $(this).val('') }});			});</script>								<td style="border:none" width="20%">							<select id="investor_country" name="investor_country" style="width:150px; height:25px; font-size:15px">							<option value="">Select One</option>							<?php							$q_get_country= "select country_name from country_investor";							$hq_get_country= mysql_db_query($DataBase,$q_get_country);							//echo $q_get_data;							while(list($location) = mysql_fetch_row($hq_get_country))							{							?>							<option value="<?php  echo $location ?>"><?php echo $location ?></option>							<?php							}							?>							</select>				</td>				<td style="border:none" width="20%">							<select id="investor_state" name="investor_state" style="width:150px; height:25px; font-size:15px">							</select>				</td>				<td style="border:none" width="20%">							<select id="investor_industry" name="investor_industry" style="width:150px; height:25px; font-size:15px">							<option value="">Select One</option>							<?php							$q_get_industry= "select real_estate,it,tourism,manufacturing,E_Commerce,Entertainment,Pharmacy,Personal_care,Education,Leisure,Transportation,Agriculture,Building,Financial,Security,Mining,Retail,Marketing,Fashion,Aviation,Media,Biotechnology,Telecom,Food,Others from industry where real_estate!='' or it!='' or tourism!='' or manufacturing!='' or E_Commerce!='' or Entertainment!='' or Pharmacy!='' or Personal_care!='' or Education!='' or Leisure!='' or Transportation!='' or Agriculture!='' or Building!='' or Financial!=0 or Security!='' or Mining!='' or Retail!='' or Marketing!='' or Fashion!='' or Aviation!='' or Media!='' or Biotechnology!='' or Telecom!='' or Food!='' or Others!=''";							$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);														while(list($real_estate,$it,$tourism,$manufacturing,$e_commerce,$entertaiment,$pharmacy,$personal_care,$education,$leisure,$transportation,$agriculture,$building,$financial,$security,$mining,$retail,$marketing,$fashion,$aviation,$media,$biotechnology,$telecom,$food) = mysql_fetch_row($hq_get_industry))							{							if($real_estate!='')							{							?>							<option value="<?php  echo $real_estate ?>"><?php echo $real_estate ?></option>							<?php							}if($it!='')							{							?>							<option value="<?php  echo $it ?>"><?php echo $it ?></option>							<?php							}if($tourism!='')							{							?>							<option value="<?php  echo $tourism ?>"><?php echo $tourism ?></option>							<?php							}if($manufacturing!='')							{							?>							<option value="<?php  echo $manufacturing ?>"><?php echo $manufacturing ?></option>							<?php							}if($e_commerce!='')							{							?>							<option value="<?php  echo $e_commerce ?>"><?php echo $e_commerce ?></option>							<?php							}if($entertaiment!='')							{							?>							<option value="<?php  echo $entertaiment ?>"><?php echo $entertaiment ?></option>							<?php							}if($pharmacy!='')							{							?>							<option value="<?php  echo $pharmacy ?>"><?php echo $pharmacy ?></option>							<?php							}if($personal_care!='')							{							?>							<option value="<?php  echo $personal_care ?>"><?php echo $personal_care ?></option>							<?php							}if($education!='')							{							?>							<option value="<?php  echo $education ?>"><?php echo $education ?></option>							<?php							}if($leisure!='')							{							?>							<option value="<?php  echo $leisure ?>"><?php echo $leisure ?></option>							<?php							}if($transportation!='')							{							?>							<option value="<?php  echo $transportation ?>"><?php echo $transportation ?></option>							<?php							} if($agriculture!='')							{							?>							<option value="<?php  echo $agriculture ?>"><?php echo $agriculture ?></option>							<?php							}if($building!='')							{							?>							<option value="<?php  echo $building ?>"><?php echo $building ?></option>							<?php							} if($financial!='')							{							?>							<option value="<?php  echo $financial ?>"><?php echo $financial ?></option>							<?php							}if($security!='')							{							?>							<option value="<?php  echo $security ?>"><?php echo $security ?></option>							<?php							}if($mining!='')							{							?>							<option value="<?php  echo $mining ?>"><?php echo $mining ?></option>							<?php							} if($retail!='')							{							?>							<option value="<?php  echo $retail ?>"><?php echo $retail ?></option>							<?php							} if($marketing!='')							{							?>							<option value="<?php  echo $marketing ?>"><?php echo $marketing ?></option>							<?php							} if($fashion!='')							{							?>							<option value="<?php  echo $fashion ?>"><?php echo $fashion ?></option>							<?php							} if($aviation!='')							{							?>							<option value="<?php  echo $aviation ?>"><?php echo $aviation ?></option>							<?php							} if($media!='')							{							?>							<option value="<?php  echo $media ?>"><?php echo $media ?></option>							<?php							} if($biotechnology!='')							{							?>							<option value="<?php  echo $biotechnology ?>"><?php echo $biotechnology ?></option>							<?php							} if($telecom!='')							{							?>							<option value="<?php  echo $telecom ?>"><?php echo $telecom ?></option>							<?php							} if($food!='')							{							?>							<option value="<?php  echo $food ?>"><?php echo $food ?></option>							<?php							} if($others!='')							{							?>							<option value="<?php  echo $others ?>"><?php echo $others ?></option>							<?php							}							}							?>							</select>				</td><Script>$(document).ready(function() {$("#min_funding").click(function(){	$("#min_funding").keypad();	});$("#max_funding").click(function(){	$("#max_funding").keypad();	});});</script>								<td style="border:none" width="20%">				<font style="font-size:15px">S$</font><input type="text" name="min_funding" id="min_funding" value="" style="height:25px; width:100px; font-size:13pt" />							</td>				<td style="border:none" width="20%">				<font style="font-size:15px">S$</font><input type="text" name="max_funding" id="max_funding" value="" style="height:25px; width:100px; font-size:13pt" />				</td>										</tr>		<tr>		<td style="border:none" >				<input type="submit" id="search_proposal" name="search_proposal" value="Search Investor">		</td>				</tr>		</tbody>			</form>		</table>	<Table>	<Tr>		<td style="border:none">				<form id="latest_investor" name="latest_investor" method="POST" action="">				<input type="submit" id="latest_investor" name="latest_investor" value="View All Investor" >				</form>		</td>		</tr>	</table>	<table>	<tr>			<td width="150px" bgcolor=grey>			<Center><b>Image			</td>			<td width="200px" bgcolor=grey>			<Center><b>Brief Profile			</td>			<td width="100px" bgcolor=grey>			<?php if($_GET[company_name]=='user.first_name,user.last_name ASC'){ ?>			<Center><b><a href="<?php echo bloginfo('url')?>/search_investor?first_name=user.first_name,user.last_name DESC" style="color:black;">Investor Name (DESC)</a>			<?php  }else{  ?>			<Center><b><a href="<?php echo bloginfo('url')?>/search_investor?first_name=user.first_name,user.last_name ASC" style="color:black;">Investor Name (ASC)</a>			<?php } ?>			</td>			<td width="100px" bgcolor=grey>			<?php if($_GET[min_investment]=='min_funding=investment_criteria.starting_range ASC'){ ?>			<Center><b><a href="<?php echo bloginfo('url') ?>/search_investor?min_funding=investment_criteria.starting_range DESC" style="color:black;">Min Funding (DESC)</a>			<?php }else{ ?>			<Center><b><a href="<?php echo bloginfo('url') ?>/search_investor?min_funding=min_funding=investment_criteria.starting_range ASC" style="color:black;">Min Funding (ASC)</a>			<?php } ?>			</td>			<td width="100px" bgcolor=grey>			<?php if($_GET[raising_total]=='max_funding=investment_criteria.ending_range ASC'){ ?>			<Center><b><a href="<?php echo bloginfo('url') ?>/search_investor?max_funding=investment_criteria.ending_range DESC" style="color:black;">Max Funding (DESC)</a>			<?php }else{ ?>			<Center><b><a href="<?php echo bloginfo('url') ?>/search_investor?max_funding=investment_criteria.ending_range ASC" style="color:black;">Max Funding (ASC)</a>			<?php } ?>			</td>			</tr>	</br>	</table>		<?php		if(isset($_POST[investor_country]) and isset($_POST[investor_state]) and isset($_POST[investor_industry]) and isset($_POST[min_funding]) and isset($_POST[max_funding]) and $_POST[investor_country]!='' and $_POST[investor_state]!='' and $_POST[investor_industry]!='' and $_POST[min_funding]!='' and $_POST[max_funding]!='')	{	//save in the session function			$_SESSION[s_investor_country]=$_POST[investor_country];			$_SESSION[s_investor_state]=$_POST[investor_state];			$_SESSION[s_investor_industry]=$_POST[investor_industry];			$_SESSION[s_min_funding]=$_POST[min_funding];			$_SESSION[s_max_funding]=$_POST[max_funding];				//search based on search engine.		$q_get_investor= "select investment_criteria.investment_criteria_id,investment_criteria.starting_range,investment_criteria.ending_range,investment_criteria.location,investment_criteria.state,user.user_id,user.user_type,user.first_name,user.last_name,user.contact_email,user.phone_number,user.message,user.image from industry,user,investment_criteria where industry.investor_id=user.user_id and investment_criteria.investor_id=user.user_id and user.user_type='investor' and investment_criteria.location='$_POST[investor_country]' and investment_criteria.state='$_POST[investor_state]' and (($_POST[min_funding]<=investment_criteria.starting_range and investment_criteria.starting_range<=$_POST[max_funding]) or ($_POST[min_funding]<=investment_criteria.ending_range and investment_criteria.starting_range<=$_POST[max_funding])) and (industry.real_estate='$_POST[investor_industry]' or industry.it='$_POST[investor_industry]' or industry.tourism='$_POST[investor_industry]' or industry.Manufacturing='$_POST[investor_industry]' or industry.E_Commerce='$_POST[investor_industry]' or industry.Entertainment='$_POST[investor_industry]' or industry.Pharmacy='$_POST[investor_industry]' or industry.Personal_care='$_POST[investor_industry]' or industry.Education='$_POST[investor_industry]' or industry.Leisure='$_POST[investor_industry]' or industry.Transportation='$_POST[investor_industry]' or industry.Agriculture='$_POST[investor_industry]' or industry.Building='$_POST[investor_industry]' or industry.Financial='$_POST[investor_industry]' or industry.Security='$_POST[investor_industry]' or industry.Mining='$_POST[investor_industry]' or industry.Retail='$_POST[investor_industry]' or industry.Marketing='$_POST[investor_industry]' or industry.Fashion='$_POST[investor_industry]' or industry.Aviation='$_POST[investor_industry]' or industry.Media='$_POST[investor_industry]' or industry.Biotechnology='$_POST[investor_industry]' or industry.Telecom='$_POST[investor_industry]' or industry.Food='$_POST[investor_industry]' or industry.Others='$_POST[investor_industry]') and investment_criteria.starting_range!='' and investment_criteria.ending_range!=''  ORDER BY user.pakage ASC LIMIT $start,$perpage";	$hq_get_investor= mysql_db_query($DataBase,$q_get_investor);	//echo $q_get_investor;	//measure the number of page	$result = mysqli_query($conn,"select count(*) as Total from industry,user,investment_criteria where industry.investor_id=user.user_id and investment_criteria.investor_id=user.user_id and user.user_type='investor' and investment_criteria.location='$_POST[investor_country]' and investment_criteria.state='$_POST[investor_state]' and (($_POST[min_funding]<=investment_criteria.starting_range and investment_criteria.starting_range<=$_POST[max_funding]) or ($_POST[min_funding]<=investment_criteria.ending_range and investment_criteria.starting_range<=$_POST[max_funding])) and (industry.real_estate='$_POST[investor_industry]' or industry.it='$_POST[investor_industry]' or industry.tourism='$_POST[investor_industry]' or industry.manufacturing='$_POST[investor_industry]' or industry.E_Commerce='$_POST[investor_industry]' or industry.Entertainment='$_POST[investor_industry]' or industry.Pharmacy='$_POST[investor_industry]' or industry.Personal_care='$_POST[investor_industry]' or industry.Education='$_POST[investor_industry]' or industry.Leisure='$_POST[investor_industry]' or industry.Transportation='$_POST[investor_industry]' or industry.Agriculture='$_POST[investor_industry]' or industry.Building='$_POST[investor_industry]' or industry.Financial='$_POST[investor_industry]' or industry.Security='$_POST[investor_industry]' or industry.Mining='$_POST[investor_industry]' or industry.Retail='$_POST[investor_industry]' or industry.Marketing='$_POST[investor_industry]' or industry.Fashion='$_POST[investor_industry]' or industry.Aviation='$_POST[investor_industry]' or industry.Media='$_POST[investor_industry]' or industry.Biotechnology='$_POST[investor_industry]' or industry.Telecom='$_POST[investor_industry]' or industry.Food='$_POST[investor_industry]' or industry.Others='$_POST[investor_industry]') and investment_criteria.starting_range!='' and investment_criteria.ending_range!=''");	$rows = mysqli_num_rows($result);		}else if((isset($_GET[first_name]) or isset($_GET[min_funding]) or isset($_GET[max_funding])) and $_SESSION[s_investor_country]!='' and $_SESSION[s_investor_state]!='' and $_SESSION[s_investor_industry]!='' and $_SESSION[s_min_funding]!='' and $_SESSION[s_max_funding]!='' )	{ //order by... name,min funding,max funding			//measure the number of page	$result = mysqli_query($conn,"select count(*) as Total from industry,user,investment_criteria where industry.investor_id=user.user_id and investment_criteria.investor_id=user.user_id and user.user_type='investor' and investment_criteria.location='$_SESSION[s_investor_country]' and investment_criteria.state='$_SESSION[s_investor_state]' and (($_SESSION[s_min_funding]<=investment_criteria.starting_range and investment_criteria.starting_range<=$_SESSION[s_max_funding]) or ($_SESSION[s_min_funding]<=investment_criteria.ending_range and investment_criteria.starting_range<=$_SESSION[s_max_funding])) and (industry.real_estate='$_POST[investor_industry]' or industry.it='$_POST[investor_industry]' or industry.tourism='$_POST[investor_industry]' or industry.manufacturing='$_POST[investor_industry]' or industry.E_Commerce='$_POST[investor_industry]' or industry.Entertainment='$_POST[investor_industry]' or industry.Pharmacy='$_POST[investor_industry]' or industry.Personal_care='$_POST[investor_industry]' or industry.Education='$_POST[investor_industry]' or industry.Leisure='$_POST[investor_industry]' or industry.Transportation='$_POST[investor_industry]' or industry.Agriculture='$_POST[investor_industry]' or industry.Building='$_POST[investor_industry]' or industry.Financial='$_POST[investor_industry]' or industry.Security='$_POST[investor_industry]' or industry.Mining='$_POST[investor_industry]' or industry.Retail='$_POST[investor_industry]' or industry.Marketing='$_POST[investor_industry]' or industry.Fashion='$_POST[investor_industry]' or industry.Aviation='$_POST[investor_industry]' or industry.Media='$_POST[investor_industry]' or industry.Biotechnology='$_POST[investor_industry]' or industry.Telecom='$_POST[investor_industry]' or industry.Food='$_POST[investor_industry]' or industry.Others='$_POST[investor_industry]') and investment_criteria.starting_range!='' and investment_criteria.ending_range!=''");	$rows = mysqli_num_rows($result);		if(isset($_GET[first_name]))	{	$q_get_investor= "select investment_criteria.investment_criteria_id,investment_criteria.starting_range,investment_criteria.ending_range,investment_criteria.location,investment_criteria.state,user.user_id,user.user_type,user.first_name,user.last_name,user.contact_email,user.phone_number,user.message,user.image from industry,user,investment_criteria where industry.investor_id=user.user_id and investment_criteria.investor_id=user.user_id and user.user_type='investor' and investment_criteria.location='$_SESSION[s_investor_country]' and investment_criteria.state='$_SESSION[s_investor_state]' and (($_SESSION[s_min_funding]<=investment_criteria.starting_range and investment_criteria.starting_range<=$_SESSION[s_max_funding]) or ($_SESSION[s_min_funding]<=investment_criteria.ending_range and investment_criteria.starting_range<=$_SESSION[s_max_funding])) and (industry.real_estate='$_POST[investor_industry]' or industry.it='$_POST[investor_industry]' or industry.tourism='$_POST[investor_industry]' or industry.manufacturing='$_POST[investor_industry]' or industry.E_Commerce='$_POST[investor_industry]' or industry.Entertainment='$_POST[investor_industry]' or industry.Pharmacy='$_POST[investor_industry]' or industry.Personal_care='$_POST[investor_industry]' or industry.Education='$_POST[investor_industry]' or industry.Leisure='$_POST[investor_industry]' or industry.Transportation='$_POST[investor_industry]' or industry.Agriculture='$_POST[investor_industry]' or industry.Building='$_POST[investor_industry]' or industry.Financial='$_POST[investor_industry]' or industry.Security='$_POST[investor_industry]' or industry.Mining='$_POST[investor_industry]' or industry.Retail='$_POST[investor_industry]' or industry.Marketing='$_POST[investor_industry]' or industry.Fashion='$_POST[investor_industry]' or industry.Aviation='$_POST[investor_industry]' or industry.Media='$_POST[investor_industry]' or industry.Biotechnology='$_POST[investor_industry]' or industry.Telecom='$_POST[investor_industry]' or industry.Food='$_POST[investor_industry]' or industry.Others='$_POST[investor_industry]') and investment_criteria.starting_range!='' and investment_criteria.ending_range!='' ORDER BY $_GET[first_time] LIMIT $start,$perpage";	$hq_get_investor= mysql_db_query($DataBase,$q_get_investor);	}	if(isset($_GET[min_funding]))	{	$q_get_investor= "select investment_criteria.investment_criteria_id,investment_criteria.starting_range,investment_criteria.ending_range,investment_criteria.location,investment_criteria.state,user.user_id,user.user_type,user.first_name,user.last_name,user.contact_email,user.phone_number,user.message,user.image from industry,user,investment_criteria where industry.investor_id=user.user_id and investment_criteria.investor_id=user.user_id and user.user_type='investor' and investment_criteria.location='$_SESSION[s_investor_country]' and investment_criteria.state='$_SESSION[s_investor_state]' and (($_SESSION[s_min_funding]<=investment_criteria.starting_range and investment_criteria.starting_range<=$_SESSION[s_max_funding]) or ($_SESSION[s_min_funding]<=investment_criteria.ending_range and investment_criteria.starting_range<=$_SESSION[s_max_funding])) and (industry.real_estate='$_POST[investor_industry]' or industry.it='$_POST[investor_industry]' or industry.tourism='$_POST[investor_industry]' or industry.manufacturing='$_POST[investor_industry]' or industry.E_Commerce='$_POST[investor_industry]' or industry.Entertainment='$_POST[investor_industry]' or industry.Pharmacy='$_POST[investor_industry]' or industry.Personal_care='$_POST[investor_industry]' or industry.Education='$_POST[investor_industry]' or industry.Leisure='$_POST[investor_industry]' or industry.Transportation='$_POST[investor_industry]' or industry.Agriculture='$_POST[investor_industry]' or industry.Building='$_POST[investor_industry]' or industry.Financial='$_POST[investor_industry]' or industry.Security='$_POST[investor_industry]' or industry.Mining='$_POST[investor_industry]' or industry.Retail='$_POST[investor_industry]' or industry.Marketing='$_POST[investor_industry]' or industry.Fashion='$_POST[investor_industry]' or industry.Aviation='$_POST[investor_industry]' or industry.Media='$_POST[investor_industry]' or industry.Biotechnology='$_POST[investor_industry]' or industry.Telecom='$_POST[investor_industry]' or industry.Food='$_POST[investor_industry]' or industry.Others='$_POST[investor_industry]') and investment_criteria.starting_range!='' and investment_criteria.ending_range!='' ORDER BY $_GET[min_funding] LIMIT $start,$perpage";	$hq_get_investor= mysql_db_query($DataBase,$q_get_investor);	}	if(isset($_GET[max_funding]))	{	$q_get_investor= "select investment_criteria.investment_criteria_id,investment_criteria.starting_range,investment_criteria.ending_range,investment_criteria.location,investment_criteria.state,user.user_id,user.user_type,user.first_name,user.last_name,user.contact_email,user.phone_number,user.message,user.image from industry,user,investment_criteria where industry.investor_id=user.user_id and investment_criteria.investor_id=user.user_id and user.user_type='investor' and investment_criteria.location='$_SESSION[s_investor_country]' and investment_criteria.state='$_SESSION[s_investor_state]' and (($_SESSION[s_min_funding]<=investment_criteria.starting_range and investment_criteria.starting_range<=$_SESSION[s_max_funding]) or ($_SESSION[s_min_funding]<=investment_criteria.ending_range and investment_criteria.starting_range<=$_SESSION[s_max_funding])) and (industry.real_estate='$_POST[investor_industry]' or industry.it='$_POST[investor_industry]' or industry.tourism='$_POST[investor_industry]' or industry.manufacturing='$_POST[investor_industry]' or industry.E_Commerce='$_POST[investor_industry]' or industry.Entertainment='$_POST[investor_industry]' or industry.Pharmacy='$_POST[investor_industry]' or industry.Personal_care='$_POST[investor_industry]' or industry.Education='$_POST[investor_industry]' or industry.Leisure='$_POST[investor_industry]' or industry.Transportation='$_POST[investor_industry]' or industry.Agriculture='$_POST[investor_industry]' or industry.Building='$_POST[investor_industry]' or industry.Financial='$_POST[investor_industry]' or industry.Security='$_POST[investor_industry]' or industry.Mining='$_POST[investor_industry]' or industry.Retail='$_POST[investor_industry]' or industry.Marketing='$_POST[investor_industry]' or industry.Fashion='$_POST[investor_industry]' or industry.Aviation='$_POST[investor_industry]' or industry.Media='$_POST[investor_industry]' or industry.Biotechnology='$_POST[investor_industry]' or industry.Telecom='$_POST[investor_industry]' or industry.Food='$_POST[investor_industry]' or industry.Others='$_POST[investor_industry]') and investment_criteria.starting_range!='' and investment_criteria.ending_range!='' ORDER BY $_GET[max_funding] LIMIT $start,$perpage";	$hq_get_investor= mysql_db_query($DataBase,$q_get_investor);	}		}else{				//clear all			$_SESSION[s_investor_country]='';			$_SESSION[s_investor_state]='';			$_SESSION[s_investor_industry]='';			$_SESSION[s_min_funding]='';			$_SESSION[s_max_funding]='';									//view all global pro comes first,then pro , and lastly is novice					$q_get_investor= "select investment_criteria.investment_criteria_id,investment_criteria.starting_range,investment_criteria.ending_range,investment_criteria.location,investment_criteria.state,user.user_id,user.user_type,user.first_name,user.last_name,user.contact_email,user.phone_number,user.message,user.image from user,investment_criteria where investment_criteria.investor_id=user.user_id and user.user_type='investor' and investment_criteria.starting_range!='' and investment_criteria.ending_range!='' ORDER BY user.pakage ASC LIMIT $start,$perpage";			$hq_get_investor= mysql_db_query($DataBase,$q_get_investor);			$result = mysqli_query($conn,"select count(*) as Total from user,investment_criteria where investment_criteria.investor_id=user.user_id and user.user_type='investor'");			$rows = mysqli_num_rows($result);	}			while(list($investment_id,$starting_range,$ending_range,$country,$state,$user_id,$user_type,$first_name,$last_name,$contact_email,$phone_number,$message,$image) = mysql_fetch_row($hq_get_investor))			{										?>			<table>			<tr>			<td bgcolor=silver width="150px">						<center>												<a href="#">					<?php  if($image==''){ ?>					<img src="<?php echo bloginfo('template_url') ?>/images/no_image.gif" width="150" height="150" />					<?php }else{ ?>					<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />					<?php } ?>					</a>							</td>				<td bgcolor=silver width="200px">									Investor ID: <b>INV_<?php  echo substr($user_id, -10,4); ?></b></br>					</br>					Country: <b><font><?php echo $country ?></font></b></br>					State: <b><font><?php echo $state ?></font></b></br>										Interested Industry: <b>					<?php					//find the industry					$q_get_industry= "select real_estate,it,tourism,manufacturing,E_Commerce,Entertainment,Pharmacy,Personal_care,Education,Leisure,Transportation,Agriculture,Building,Financial,Security,Mining,Retail,Marketing,Fashion,Aviation,Media,Biotechnology,Telecom,Food,Others from industry where investor_id='$user_id'";					$hq_get_industry= mysql_db_query($DataBase,$q_get_industry);					while(list($real_estate,$it,$tourism,$manufacturing,$e_commerce,$entertaiment,$pharmacy,$personal_care,$education,$leisure,$transportation,$agriculture,$building,$financial,$security,$mining,$retail,$marketing,$fashion,$aviation,$media,$biotechnology,$telecom,$food) = mysql_fetch_row($hq_get_industry))					{					?>										<font><?php echo $real_estate." ".$it." ".$tourism." ".$manufacturing." ".$e_commerce." ".$entertaiment." ".$pharmacy." ".$personal_care." ".$education." ".$leisure." ".$transportation." ".$agriculture." ".$building." ".$financial." ".$security." ".$mining." ".$retail." ".$marketing." ".$fashion." ".$aviation." ".$media." ".$biotechnology." ".$telecom." ".$food; ?></font></b>					<?php					}					?>					</br>													</td>			<td width="100px" bgcolor=silver>			<b><?php echo $first_name." ".$last_name; ?></b>			</td>			<td width="100px" bgcolor=silver>			<b><font color=red>S$ <?php echo number_format($starting_range) ?></font></b></br>			</td>			<td width="100px" bgcolor=silver>			<b><font color=red>S$ <?php echo number_format($ending_range) ?></font></b></br>			</td>			</tr>			<tr>			<td colspan=4 bgcolor=#000000;><?php			$q_cek= "select count(*),status from nudge where entrepreneur_id='$_SESSION[user_id]' and investment_id='$investment_id'";			$hq_cek= mysql_db_query($DataBase,$q_cek);						while(list($nudge_id,$status) = mysql_fetch_row($hq_cek))			{			$nudge=$nudge_id;						if($nudge==1)			{			}else if($nudge==0){					?>										<b><a href="<?php echo bloginfo('template_url') ?>/investor_nudge.php?investment_id=<?php  echo $investment_id ?>" onclick="">Nudge! </a>																				<?php  															} ?>			</td>			<td bgcolor="#000000">			<!-- if the nudge has been approved by entrepreneur... -->			<?php			if($status=='accept')			{			?>								<a href="<?php echo bloginfo('template_url') ?>/view_investor.php?investor_id=<?php echo $user_id ?>" ><b>Find Out More --></b></a>										<?php  }} ?>			</td>			</tr>			</table>						<?php  						}			$error = mysql_num_rows($hq_get_investor);			if($error==0)			{			echo "Data Not Found.";			}			?></br></br><div style="text-align:right;"><?php//pagingif(isset($page)){if($rows){$rs = mysqli_fetch_assoc($result);$total = $rs["Total"];}$totalPages = ceil($total / $perpage);if($page <=1 ){echo "<span id='page_links' style='font-weight: bold;'></span>";}else{$j = $page - 1;?><span><a id='page_a_link' href='<?php echo bloginfo('url') ?>/search_investor?hal=<?php echo $j; ?>'><img src="<?php echo bloginfo('template_url') ?>/images/back.jpg"></img></a></span><?php}for($i=1; $i <= $totalPages; $i++){if($i<>$page){?><span><a id='page_a_link' href='<?php echo bloginfo('url') ?>/search_investor?hal=<?php echo $i ?>'><?php echo $i ?></a></span><?php}else{echo "<span id='page_links' style='font-weight: bold;'></span>";}}if($page == $totalPages or $totalPages==0) //if the page is only 1{?><span id='page_links' style='font-weight: bold;'></span><?php}else{$j = $page + 1;?><span><a id='page_a_link' href='<?php echo bloginfo('url') ?>/search_investor?hal=<?php echo $j ?>'><img src="<?php echo bloginfo('template_url') ?>/images/next.jpg"></img></a></span><?php}}?>			</div>				<div align=right><form id="form_per_page" name="form_per_page" method="POST" action="<?php echo bloginfo('url') ?>/search_investor/"><select id="per_page" name="per_page" style="width:60px; height:25px; font-size:15px" onchange="document.forms['form_per_page'].submit();"><option value="5" <?php if($_SESSION[per_page]==5){ echo"selected"; } ?> >5</option><option value="10" <?php if($_SESSION[per_page]==10){ echo"selected"; } ?> >10</option><option value="15" <?php if($_SESSION[per_page]==15){ echo"selected"; } ?> >15</option><option value="20" <?php if($_SESSION[per_page]==20){ echo"selected"; } ?> >20</option></select></form></div>		<?php  }else{if(!isset($_SESSION[login])){?>Please <a href="<?php echo bloginfo('url') ?>/login-page/">Login</a> / <a href="<?php echo bloginfo('url') ?>/register-user/">Register</a> First<?php}else {?>This feature is only for Entrepreneur users.<?php}}?>			
			<?php																																				
				// CONTENT
				//the_content();

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