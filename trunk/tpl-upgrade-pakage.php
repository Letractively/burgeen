<?php session_start(); include('database.php');
/*
Template Name: Template Upgrade Pakage
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" ><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_investor/" title="" ><span>Search Investor</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_partner/" title="" ><span>Search Partner</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/upgrade_plan/" title="" class="current"><span><font color=red>Upgrade Plan Now</font></span></a></li>	<li><a href="<?php echo bloginfo('url')?>/buy_nudge/" title="" ><span><font color=red>Buy Nudge</font></span></a></li>       </ul>    </div>    </div>
	<Script>$(document).ready(function(){$("#select_plan").click(function(){$("#div_plan").slideToggle();});$("#payment").click(function(){$("#div_payment").slideToggle();});   function isNumber (o) {  return ! isNaN (o-0);}    $("#credit_card_number").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>16) {     $(this).val(txtVal.substring(0,16) ) } if(!isNumber(txtVal)) {     $(this).val('') }});     $("#vcc_number").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>3) {     $(this).val(txtVal.substring(0,3) ) } if(!isNumber(txtVal)) {     $(this).val('') }});      $("#month").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>2) {     $(this).val(txtVal.substring(0,2) ) } if(!isNumber(txtVal)) {     $(this).val('') }});    $("#year").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>4) {     $(this).val(txtVal.substring(0,4) ) } if(!isNumber(txtVal)) {     $(this).val('') }});	$("#upgrade_form").submit(function() {error_cc=1;error_vcc=1;error_month=1;error_year=1;error_plan=1;	cc_number = $("#credit_card_number").val();	if($("#credit_card_number").val() == '' || cc_number.length<16)	{	$("#credit_card_number").css("border-color","red");	error_cc=1;	}		if($("#credit_card_number").val() != '' && cc_number.length==16)	{	$("#credit_card_number").css("border-color","rgb(212,212,212)");	error_cc=0;	}		vcc = $("#vcc_number").val();	if($("#vcc_number").val() == '' || vcc.length<3)	{	$("#vcc_number").css("border-color","red");	error_vcc=1;	}		if($("#vcc_number").val() != '' && vcc.length==3)	{	$("#vcc_number").css("border-color","rgb(212,212,212)");	error_vcc=0;	}		month = $("#month").val();	if($("#month").val() == '' || month.length<2)	{	$("#month").css("border-color","red");	error_month=1;	}		if($("#month").val() != '' && month.length==2)	{	$("#month").css("border-color","rgb(212,212,212)");	error_month=0;	}		year = $("#year").val();	if($("#year").val() == '' || year.length<4)	{	$("#year").css("border-color","red");	error_year=1;	}		if($("#year").val() != '' && year.length==4)	{	$("#year").css("border-color","rgb(212,212,212)");	error_year=0;	}	if($('#pro').not(':checked') && $('#global_pro').not(':checked') ) 	{	$("#a_pro").css("color","red");		$("#a_global_pro").css("color","red");	error_plan_1=1;	}	if($('#global_pro_extend').not(':checked') ) 	{		$("#a_global_pro_extend").css("color","red");	error_plan_2=1;	}		if($('#pro').is(':checked') || $('#global_pro').is(':checked') ) 	{	$("#a_pro").css("color","black");		$("#a_global_pro").css("color","black");	error_plan_2=0;	}	if($('#global_pro_extend').is(':checked') ) 	{	$("#a_global_pro_extend").css("color","black");			error_plan_1=0;	}if(((error_plan_1==0 && error_plan_2==1) || (error_plan_1==1 && error_plan_2==0)) && error_year==0 && error_month==0 && error_vcc==0 && error_cc==0){return true;}else{return false;}});});</script>	
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>"><?php$q_cek= "select pakage from user where user_id='$_SESSION[user_id]'";$hq_cek= mysql_db_query($DataBase,$q_cek);while(list($pakage) = mysql_fetch_row($hq_cek)){$plan=$pakage;}?>			<?php if($plan=='global pro'){ echo"you have purchased global pro pakage, no more pakage. thx"; }else{ ?>			<center><h2>Upgrade Your Plan and get the benefit</h2></center><br><Table><tr><td>Your Plan Now : <b><?php if($plan=='z_novice'){echo "Novice"; }else{ echo $plan; } ?></b></td></tr></table><form action="<?php echo bloginfo('template_url') ?>/upgrade_pakage_process.php" method="POST" name="upgrade_form" id="upgrade_form"   ><table><br><tr>
<td><input type="submit" id="select_plan"  value="                                                                                                                        SELECT PAKAGE                                                                                                             "  /></td></tr><table id="div_plan"><tr><?php  if($plan=='z_novice'){ ?><td width=500px><center><b>PRO</b></td><td width=500px><center><b>GLOBAL PRO</b></td><?php }else if($plan=='pro'){ ?><td width=1000px><center><b>GLOBAL PRO</b></td><?php  }  ?></tr><tr><?php  if($plan=='z_novice'){ ?><td width=500px><center>Unlimited Proposal Viewer</td><td width=500px><center>Unlimited Proposal Viewer</td><?php }else if($plan=='pro'){ ?><td width=1000px><center>Unlimited Proposal Viewer</td><?php  }  ?></tr><tr><?php  if($plan=='z_novice'){ ?><td width=500px><center>Upload Photo Support</td><td width=500px><center>Upload Photo Support</td><?php }else if($plan=='pro'){ ?><td width=1000px><center>Upload Photo Support</td><?php  }  ?></tr><tr><?php  if($plan=='z_novice'){ ?><td width=500px><center>Free 25 Nudge</td><td width=500px><center>Free 50 Nudge</td><?php }else if($plan=='pro'){ ?><td width=1000px><center>Add Free 50 Nudge more</td><?php  }  ?></tr><tr><?php  if($plan=='z_novice'){ ?><td width=500px><center>Semi Complete Contact Detail (Email, Address, Company)</td><td width=500px><center>Complete Contact Detail (Including Email, Phone, Fax, website, Social Media, print page,etc)</td><?php }else if($plan=='pro'){ ?><td width=1000px><center>Complete Contact Detail (Including Email, Phone, Fax, website, Social Media, print page,etc)</td><?php  }  ?></tr><tr><?php  if($plan=='z_novice'){ ?><td><center><input type="radio" name="plan" id="pro" value="pro"/><a id="a_pro">$99</a></td><td><center><input type="radio" name="plan" id="global_pro" value="global pro"/><a id="a_global_pro">$199</a></td><?php }else if($plan=='pro'){ ?><td><center><input type="radio" name="plan" id="global_pro_extend" value="global pro extend"/><a id="a_global_pro_extend">$100</a></td><?php  }  ?></tr><tr></tr>		</table>	<tr><td><input type="submit" id="payment"  value="                                                                                                                        SELECT PAYMENT                                                                                                             "  /></td></tr><table id="div_payment"><tr><td width="1000px"><center><img src="<?php echo bloginfo('template_url') ?>/images/visa.jpg" height="70px" width="100px" style="" /></td></tr><tr><td width="1000px"><center>Credit Card Number:<input type="text" class="input username" name="credit_card_number" id="credit_card_number" value="" style="width:150px; height:20px; font-size:15px" /></td></tr><tr><td><center>VCC:<input type="text" class="input username" name="vcc_number" id="vcc_number" value="" style="width:50px; height:20px; font-size:15px" />Exp:<input type="text" class="input username" name="month" id="month" value="" style="width:50px; height:20px; font-size:15px" />/<input type="text" class="input username" name="year" id="year" value="" style="width:50px; height:20px; font-size:15px" /></td></tr></table><br>		<center><input type="submit" align="center" name="upgrade" id="upgrade" value="UPGRADE" style="height:40px;  font-size:13pt" /></center>			</form>									
			<?php}
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