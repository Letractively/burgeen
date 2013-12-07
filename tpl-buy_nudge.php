<?php session_start(); include('database.php');
/*
Template Name: Template BUY NUDGE
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" ><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_investor/" title="" ><span>Search Investor</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/upgrade_plan/" title=""><span><font color=red>Upgrade Plan Now</font></span></a></li>   <li><a href="<?php echo bloginfo('url')?>/buy_nudge/" title="" class="current"><span><font color=red>Buy Nudge</font></span></a></li>    </ul>    </div>    </div>
	<Script>$(document).ready(function(){$("#select_plan").click(function(){$("#div_plan").slideToggle();});$("#payment").click(function(){$("#div_payment").slideToggle();});   function isNumber (o) {  return ! isNaN (o-0);}    $("#credit_card_number").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>16) {     $(this).val(txtVal.substring(0,16) ) } if(!isNumber(txtVal)) {     $(this).val('') }});     $("#vcc_number").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>3) {     $(this).val(txtVal.substring(0,3) ) } if(!isNumber(txtVal)) {     $(this).val('') }});      $("#month").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>2) {     $(this).val(txtVal.substring(0,2) ) } if(!isNumber(txtVal)) {     $(this).val('') }});    $("#year").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>4) {     $(this).val(txtVal.substring(0,4) ) } if(!isNumber(txtVal)) {     $(this).val('') }});	$("#upgrade_form").submit(function() {error_cc=1;error_vcc=1;error_month=1;error_year=1;error_plan=1;	cc_number = $("#credit_card_number").val();	if($("#credit_card_number").val() == '' || cc_number.length<16)	{	$("#credit_card_number").css("border-color","red");	error_cc=1;	}		if($("#credit_card_number").val() != '' && cc_number.length==16)	{	$("#credit_card_number").css("border-color","rgb(212,212,212)");	error_cc=0;	}		vcc = $("#vcc_number").val();	if($("#vcc_number").val() == '' || vcc.length<3)	{	$("#vcc_number").css("border-color","red");	error_vcc=1;	}		if($("#vcc_number").val() != '' && vcc.length==3)	{	$("#vcc_number").css("border-color","rgb(212,212,212)");	error_vcc=0;	}		month = $("#month").val();	if($("#month").val() == '' || month.length<2)	{	$("#month").css("border-color","red");	error_month=1;	}		if($("#month").val() != '' && month.length==2)	{	$("#month").css("border-color","rgb(212,212,212)");	error_month=0;	}		year = $("#year").val();	if($("#year").val() == '' || year.length<4)	{	$("#year").css("border-color","red");	error_year=1;	}		if($("#year").val() != '' && year.length==4)	{	$("#year").css("border-color","rgb(212,212,212)");	error_year=0;	}	if($('#5_nudge').not(':checked') && $('#10_nudge').not(':checked') && $('#20_nudge').not(':checked') ) 	{	$("#a_5_nudge").css("color","red");		$("#a_10_nudge").css("color","red");	$("#a_20_nudge").css("color","red");	error_plan=1;	}	if($('#5_nudge').is(':checked') || $('#10_nudge').is(':checked') || $('#20_nudge').is(':checked') ) 	{	$("#a_5_nudge").css("color","black");		$("#a_10_nudge").css("color","black");	$("#a_20_nudge").css("color","black");	error_plan=0;	}if(error_plan==0 && error_year==0 && error_month==0 && error_vcc==0 && error_cc==0){return true;}else{return false;}});});</script>	
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>"><?php$q_cek= "select nudge from user where user_id='$_SESSION[user_id]'";$hq_cek= mysql_db_query($DataBase,$q_cek);while(list($nudge) = mysql_fetch_row($hq_cek)){?>				<center><h2>Buy Nudge</h2></center><br><Table><tr><td>Your Nudge Now : <b><?php echo $nudge; ?></b></td></tr></table><?php } ?><form action="<?php echo bloginfo('template_url') ?>/buy_nudge.php" method="POST" name="upgrade_form" id="upgrade_form"   ><table><br><tr>
<td><input type="submit" id="select_plan"  value="                                                                                                                        SELECT PAKAGE                                                                                                             "  /></td></tr><table id="div_plan"><tr><td width=500px><center><b>Nudge Plan 1</b></td><td width=500px><center><b>Nudge Plan 2</b></td><td width=500px><center><b>Nudge Plan 3</b></td></tr><tr><td width=500px><center>Free 5 Nudge</td><td width=500px><center>Free 10 Nudge</td><td width=500px><center>Free 20 Nudge</td></tr><tr><td><center><input type="radio" name="plan" id="5_nudge" value="5_nudge"/><a id="a_5_nudge">$10</a></td><td><center><input type="radio" name="plan" id="10_nudge" value="10_nudge"/><a id="a_10_nudge">$20</a></td><td><center><input type="radio" name="plan" id="20_nudge" value="20_nudge"/><a id="a_20_nudge">$40</a></td></tr><tr></tr>		</table>	<tr><td><input type="submit" id="payment"  value="                                                                                                                        SELECT PAYMENT                                                                                                             "  /></td></tr><table id="div_payment"><tr><td width="1000px"><center><img src="<?php echo bloginfo('template_url') ?>/images/visa.jpg" height="70px" width="100px" style="" /></td></tr><tr><td width="1000px"><center>Credit Card Number:<input type="text" class="input username" name="credit_card_number" id="credit_card_number" value="" style="width:150px; height:20px; font-size:15px" /></td></tr><tr><td><center>VCC:<input type="text" class="input username" name="vcc_number" id="vcc_number" value="" style="width:50px; height:20px; font-size:15px" />Exp:<input type="text" class="input username" name="month" id="month" value="" style="width:50px; height:20px; font-size:15px" />/<input type="text" class="input username" name="year" id="year" value="" style="width:50px; height:20px; font-size:15px" /></td></tr></table><br>		<center><input type="submit" align="center" name="upgrade" id="upgrade" value="UPGRADE" style="height:40px;  font-size:13pt" /></center>			</form>									
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