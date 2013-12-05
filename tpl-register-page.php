<?php

/*
Template Name: Template Register Page
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>	<?php	include ("database.php");	?>
<head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/register.css' /></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script>$(document).ready(function(){$("#terms_condition").click(function(){$("#div_terms_condition").slideToggle();});  $("#registration_button").click(function(){	$("#div_registration").slideToggle();	$("#div_registration").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_payment_method").css("display","none");    $("#div_confirm").css("display","none");	  });  $("#select_plan_button").click(function(){    $("#div_select_plan").slideToggle();	$("#div_select_plan").css("display","block");	$("#div_registration").css("display","none");	$("#div_payment_method").css("display","none");	$("#div_confirm").css("display","none");		  });  $("#payment_method_button").click(function(){    $("#div_payment_method").slideToggle();	$("#div_payment_method").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_registration").css("display","none");	$("#div_confirm").css("display","none");  });  $("#confirm_button").click(function(){    $("#div_confirm").slideToggle();	$("#div_confirm").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_registration").css("display","none");	$("#div_payment_method").css("display","none");  });    //next method      $("#next_select_plan").click(function(){	var n = $("#next_select_plan").val();		//document.write(n);		if(n == 'next step 2') 		//step 2 (entrepreneur) or step 4 (investor)		{		//check all the form must be filled		if($("#username_register").val() == '')	{	$("#username_register").css("border-color","red");	}	if($("#first_name").val() == '')	{	$("#first_name").css("border-color","red");	}	if($("#password_user").val() =='')	{	$("#password_user").css("border-color","red");	}	if($("#contact_email").val() =='')	{	$("#contact_email").css("border-color","red");	}	if($('#entrepreneur').not(':checked') && $('#investor').not(':checked')) 	{		$("#radio_button_td").css("border","1px solid red");	}	if($('#terms').not(':checked'))	{	 $("#term_condition").css("color","red");	}		if($("#username_register").val() != '')	{	$("#username_register").css("border-color","rgb(212,212,212)");	}	if($("#first_name").val() != '')	{	$("#first_name").css("border-color","rgb(212,212,212)");	}	if($("#password_user").val() !='')	{	$("#password_user").css("border-color","rgb(212,212,212)");	}	if($("#contact_email").val() !='')	{	$("#contact_email").css("border-color","rgb(212,212,212)");	}	if($('#entrepreneur').is(':checked') || $('#investor').is(':checked')) 	{		$("#radio_button_td").css("border","rgb(243,243,243)");	}	if($('#terms').is(':checked'))	{	 $("#term_condition").css("color","black");	}		if($("#first_name").val() != '' && $("#password_user").val() !='' && $("#contact_email").val() !='' && $('#terms').is(':checked') && $('#entrepreneur').is(':checked') )	{	$("#plan_pakage_confirm").val('');	$("#back_method").show();	 $("#select_plan_button").css("color","blue");	 $("#registration_button").css("color","black");	 $("#payment_method_button").css("color","black");	 $("#confirm_button").css("color","black");	$("#next_select_plan").val('next step 3');	$("#back_method").val('back step 1');	$("#div_select_plan").slideToggle();	$("#div_select_plan").css("display","block");	$("#div_registration").css("display","none");	$("#div_payment_method").css("display","none");	$("#div_confirm").css("display","none");	}else if($("#first_name").val() != '' && $("#password_user").val() !='' && $("#contact_email").val() !='' && $('#terms').is(':checked') && $('#investor').is(':checked') )	{	$("#plan_pakage_confirm").val('FREE');	$("#back_method").show();	$("#select_plan_button").css("color","black");	 $("#registration_button").css("color","black");	 $("#payment_method_button").css("color","black");	 $("#confirm_button").css("color","blue");	$("#next_select_plan").hide();	$("#back_method").val('back step 1');	 $("#div_confirm").slideToggle();	$("#div_confirm").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_registration").css("display","none");	$("#div_payment_method").css("display","none");		//confirm page		if($('#entrepreneur').is(':checked')) 	{	var role = $("#entrepreneur").val();	$("#type_user_confirm").val(role);	}	if($('#investor').is(':checked')) 	{	var role = $("#investor").val();	$("#type_user_confirm").val(role);	}		var first_name = $("#first_name").val();	$("#first_name_confirm").val(first_name);	var last_name = $("#last_name").val();	$("#last_name_confirm").val(last_name);	var password = $("#password_user").val();	$("#password_confirm").val(password);		var contact_email = $("#contact_email").val();	$("#contact_email_confirm").val(contact_email);	var phone_number = $("#phone_number").val();	$("#phone_number_confirm").val(phone_number);		if($('#novice').is(':checked')) 	{	var standart_pakage = $("#novice").val();	$("#plan_pakage_confirm").val(standart_pakage);	}	if($('#pro').is(':checked')) 	{	var silver_pakage = $("#pro").val();	$("#plan_pakage_confirm").val(silver_pakage);	}	if($('#global_pro').is(':checked')) 	{	var gold_pakage = $("#global_pro").val();	$("#plan_pakage_confirm").val(gold_pakage);	}	}			}	if(n == 'next step 3')	{	if($('#novice').is(':checked'))	{		$("#select_plan_button").css("color","black");	 $("#registration_button").css("color","black");	 $("#payment_method_button").css("color","black");	 $("#confirm_button").css("color","blue");	$("#next_select_plan").hide();	$("#back_method").val('back step 2');	 $("#div_confirm").slideToggle();	$("#div_confirm").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_registration").css("display","none");	$("#div_payment_method").css("display","none");		//confirm page		if($('#entrepreneur').is(':checked')) 	{	var role = $("#entrepreneur").val();	$("#type_user_confirm").val(role);	}	if($('#investor').is(':checked')) 	{	var role = $("#investor").val();	$("#type_user_confirm").val(role);	}		var first_name = $("#first_name").val();	$("#first_name_confirm").val(first_name);	var last_name = $("#last_name").val();	$("#last_name_confirm").val(last_name);	var password = $("#password_user").val();	$("#password_confirm").val(password);		var contact_email = $("#contact_email").val();	$("#contact_email_confirm").val(contact_email);	var phone_number = $("#phone_number").val();	$("#phone_number_confirm").val(phone_number);		if($('#novice').is(':checked')) 	{	var standart_pakage = $("#novice").val();	$("#plan_pakage_confirm").val(standart_pakage);	}	if($('#pro').is(':checked')) 	{	var silver_pakage = $("#pro").val();	$("#plan_pakage_confirm").val(silver_pakage);	}	if($('#global_pro').is(':checked')) 	{	var gold_pakage = $("#global_pro").val();	$("#plan_pakage_confirm").val(gold_pakage);	}	}else	{	$("#select_plan_button").css("color","black");	 $("#registration_button").css("color","black");	 $("#payment_method_button").css("color","blue");	 $("#confirm_button").css("color","black");	$("#next_select_plan").val('next step 4');	$("#back_method").val('back step 2');	$("#div_payment_method").slideToggle();	$("#div_payment_method").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_registration").css("display","none");	$("#div_confirm").css("display","none");	}	}		if(n == 'next step 4')	{		if($('#novice').not(':checked')) 	{	cc_number = $("#credit_card_number").val();	if($("#credit_card_number").val() == '' || cc_number.length<16)	{	$("#credit_card_number").css("border-color","red");	}		if($("#credit_card_number").val() != '' && cc_number.length==16)	{	$("#credit_card_number").css("border-color","rgb(212,212,212)");	}		vcc = $("#vcc_number").val();	if($("#vcc_number").val() == '' || vcc.length<3)	{	$("#vcc_number").css("border-color","red");	}		if($("#vcc_number").val() != '' && vcc.length==3)	{	$("#vcc_number").css("border-color","rgb(212,212,212)");	}		month = $("#month").val();	if($("#month").val() == '' || month.length<2)	{	$("#month").css("border-color","red");	}		if($("#month").val() != '' && month.length==2)	{	$("#month").css("border-color","rgb(212,212,212)");	}		year = $("#year").val();	if($("#year").val() == '' || year.length<4)	{	$("#year").css("border-color","red");	}		if($("#year").val() != '' && year.length==4)	{	$("#year").css("border-color","rgb(212,212,212)");	}		if($("#year").val() != '' && cc_number.length==16 && $("#month").val() != '' && vcc.length==3 && $("#vcc_number").val() != '' && month.length==2 && $("#credit_card_number").val() != '' && year.length==4)	{	$("#select_plan_button").css("color","black");	 $("#registration_button").css("color","black");	 $("#payment_method_button").css("color","black");	 $("#confirm_button").css("color","blue");	$("#next_select_plan").hide();	$("#back_method").val('back step 3');	 $("#div_confirm").slideToggle();	$("#div_confirm").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_registration").css("display","none");	$("#div_payment_method").css("display","none");	}		}else	{			$("#select_plan_button").css("color","black");	 $("#registration_button").css("color","black");	 $("#payment_method_button").css("color","black");	 $("#confirm_button").css("color","blue");	$("#next_select_plan").hide();	$("#back_method").val('back step 3');	 $("#div_confirm").slideToggle();	$("#div_confirm").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_registration").css("display","none");	$("#div_payment_method").css("display","none");	}	//confirm page		if($('#entrepreneur').is(':checked')) 	{	var role = $("#entrepreneur").val();	$("#type_user_confirm").val(role);	}	if($('#investor').is(':checked')) 	{	var role = $("#investor").val();	$("#type_user_confirm").val(role);	}		var first_name = $("#first_name").val();	$("#first_name_confirm").val(first_name);	var last_name = $("#last_name").val();	$("#last_name_confirm").val(last_name);	var password = $("#password_user").val();	$("#password_confirm").val(password);		var contact_email = $("#contact_email").val();	$("#contact_email_confirm").val(contact_email);	var phone_number = $("#phone_number").val();	$("#phone_number_confirm").val(phone_number);		if($('#novice').is(':checked')) 	{	var standart_pakage = $("#novice").val();	$("#plan_pakage_confirm").val(standart_pakage);	}	if($('#pro').is(':checked')) 	{	var silver_pakage = $("#pro").val();	$("#plan_pakage_confirm").val(silver_pakage);	}	if($('#global_pro').is(':checked')) 	{	var gold_pakage = $("#global_pro").val();	$("#plan_pakage_confirm").val(gold_pakage);	}			}		  });       //back method       $("#back_method").click(function(){	var n = $("#back_method").val();		//document.write(n);		if(n == 'back step 2')	{	$("#select_plan_button").css("color","blue");	 $("#registration_button").css("color","black");	 $("#payment_method_button").css("color","black");	 $("#confirm_button").css("color","black");	$("#back_method").val('back step 1');	$("#next_select_plan").show();	$("#next_select_plan").val('next step 3');	$("#div_select_plan").slideToggle();	$("#div_select_plan").css("display","block");	$("#div_registration").css("display","none");	$("#div_payment_method").css("display","none");	$("#div_confirm").css("display","none");		}	if(n == 'back step 3')	{	$("#next_select_plan").show();	$("#select_plan_button").css("color","black");	 $("#registration_button").css("color","black");	 $("#payment_method_button").css("color","blue");	 $("#confirm_button").css("color","black");	$("#back_method").val('back step 2');	$("#next_select_plan").val('next step 4');	$("#div_payment_method").slideToggle();	$("#div_payment_method").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_registration").css("display","none");	$("#div_confirm").css("display","none");	}		if(n == 'back step 1')	{	$("#back_method").hide();	$("#next_select_plan").show();	$("#select_plan_button").css("color","black");	 $("#registration_button").css("color","blue");	 $("#payment_method_button").css("color","black");	 $("#confirm_button").css("color","black");	$("#back_method").val('First step');	$("#next_select_plan").val('next step 2');	 $("#div_registration").slideToggle();	$("#div_registration").css("display","block");	$("#div_select_plan").css("display","none");	$("#div_payment_method").css("display","none");    $("#div_confirm").css("display","none");	}		  });      function isNumber (o) {  return ! isNaN (o-0);}    $("#credit_card_number").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>16) {     $(this).val(txtVal.substring(0,16) ) } if(!isNumber(txtVal)) {     $(this).val('') }});     $("#vcc_number").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>3) {     $(this).val(txtVal.substring(0,3) ) } if(!isNumber(txtVal)) {     $(this).val('') }});      $("#month").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>2) {     $(this).val(txtVal.substring(0,2) ) } if(!isNumber(txtVal)) {     $(this).val('') }});    $("#year").keyup(function(e){txtVal = $(this).val();   if(isNumber(txtVal) && txtVal.length>4) {     $(this).val(txtVal.substring(0,4) ) } if(!isNumber(txtVal)) {     $(this).val('') }});	   });</script>	
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">						<?php			if($_SESSION[login]!='success')			{			?>						<div id="wrapper">					<Table align=center width="50%" id="step" name="step">			<tr>			<td>						<input type="submit" class="button" id="registration_button"  value="Registration" disabled="disabled" style="color:blue"/>			</td>			<td>						<input type="submit" id="select_plan_button"  value="Select Plan" disabled="disabled"/>			</td>			<td>						<input type="submit" class="button" id="payment_method_button"  value="Payment Method" disabled="disabled"/>			</td>			<td>						<input type="submit" class="button" id="confirm_button"  value="Confirm" disabled="disabled"/>			</td>			</tr>			</table>									<Center>			<form action="<?php echo bloginfo('template_url') ?>/register_process.php" method="POST" name="registerform" id="login-form" class="login-form">			<div id="div_registration" style="display:block">			<div class="header">						<h1>Registration</h1>			<span>Investor will get 1 year expired date account</span>			</div>														<table id="radio_button" name="radio_button" border=1 ">							<td1 id="radio_button_td">								<input type="radio" name="account_type" id="entrepreneur" value="entrepreneur" style="background-color:red"  />I am an Entrepreneur<br>								<input type="radio" name="account_type" id="investor" value="investor"/>I am an Investor</br>																</td1>							</table>											<div class="content">			<p>				First Name *<br/>				<input type="text" class="input username" name="first_name" id="first_name" value="" />			</p>			<p>				Last Name<br/>				<input type="text" class="input username" name="last_name" id="last_name" value="" />			</p>						<p>				Username *<br/>				<input type="text" class="input username" name="username" id="username_register" value="" />			</p>			<p>						Enter a password *<br/>						<input type="password" class="input username" name="password_user" id="password_user" value="" />			</p>			<p>				Contact Email *<br/>				<input type="email" class="input username" name="contact_email" id="contact_email" value="" />			</p>																			<p>						Phone Number<br/>						<input type="number" class="input username" name="phone_number" id="phone_number" value="" />					</p>											<input type="checkbox" name="terms" value="yes" id="terms"/> <label for="terms" name="term_condition" id="term_condition" style=""><?php _e('I accept the ', APP_TD); ?><a id="terms_condition"  name="terms_condition" target="_blank">terms &amp; conditions</a></label>					<div id=div_terms_condition name=div_terms_condition>										<textarea style="height: 80px;" disabled >Entrepreneur:&#13;&#10;1. I have read and agree to the Website Terms of Use, Acceptable Use Policy and Refund Policy.&#13;&#10;2. I understand that Burgeen Ltd can in no way be held responsible for what takes place once contact with an investor has been established.&#13;&#10;3. I understand that it is my sole responsibility to do due diligence on any of the investors I deal with.&#13;&#10;&#13;&#10;Investor:&#13;&#10;Please note, company listings on this site are only suitable for accredited investors who are familiar with and willing to accept the high risk associated with private investments. Any Investor who intends to utilize this website must be an accredited, qualified or sophisticated investor according to local or national regulations that apply. There has been no investigation to the accuracy of any information or terms contained herein. There may be errors in the information posted on this site and we strongly suggest that you seek legal advice prior to commencement of any potential transaction. All content on this site is strictly for informational purposed only and does not constitute business, financial, investment, hedging, trading, legal, regulatory, tax or accounting advice or services. Buergeen Ltd and its affiliated companies are not a registered broker or dealer or any other regulated entity. Buegeen Ltd and its affiliated companies do not sell or offer to sell any securities and no information contained on this site is intended to constitute or to be interpreted as any such offer. Any investor requesting to contact a company listed within the site, does so at his/her own risk and is solely responsible for conducting any legal, accounting or due diligence review. Any investor who registers must be an accredited investor according to the Securities and Futures Act: i. an individual: A. whose net personal assets exceed in value S$2 million (or its equivalent in a foreign currency) or such other amount as the Authority may prescribe in place of the first amount; or B. whose income in the preceding 12 months is not less than $300,000 (or its equivalent in a foreign currency) or such other amount as the Authority may prescribe in place of the first amount; ii. a corporation with net assets exceeding $10 million in value (or its equivalent in a foreign currency) or such other amount as the Authority may prescribe, in place of the first amount, as determined by: A. the most recent audited balance-sheet of the corporation; or B. where the corporation is not required to prepare audited accounts regularly, a balance-sheet of the corporation certified by the corporation as giving a true and fair view of the state of affairs of the corporation as of the date of the balance-sheet, which date shall be within the preceding 12 months; I have read and agree to the Website Terms of Use and Acceptable Use Policy.										</textarea>										</div>					</div>																				</div>			<div id="div_select_plan" style="display:none" >			<div class="header">			<table>			<tr>			<td>			<h1>Novice:</h1>			<p>*Unlimited Viewer</p>			<p>*Able to Upload Profile Picture</p>			<p>*No Nudge</p>			</td>			<td>			<h1>Pro:</h1>			<p>*Unlimited Viewer</p>			<p>*Able to Upload Profile Picture</p>			<p>*Free 10 Nudge</p>			</td>			<td>			<h1>Global Pro:</h1>			<p>*Unlimited Viewer</p>			<p>*Able to Upload Profile Picture</p>			<p>*Free 20 Nudge</p>			</td>			</tr>			<tr>			<td>			<input type="radio" name="plan" id="novice" value="novice"/>S$ 0<br></td>			<td>			<input type="radio" name="plan" id="pro" value="pro"/>S$ 99<br></td>			<td>			<input type="radio" name="plan" id="global_pro" value="global pro"/>S$ 199<br><td>					</tr>						</table>			</div>						</div>			<div id="div_payment_method" style="display:none">													<select id="payment" name="payment" style="width:150px; height:25px; font-size:15px">							<option value="visa">Visa/Master Card</option>														</select></br></br> <img src="<?php echo bloginfo('template_url') ?>/images/visa.jpg" height="70px" width="100px" /> </br></br>				Credit Card Number:				<input type="text" class="input username" name="credit_card_number" id="credit_card_number" value="" style="width:150px; height:20px; font-size:15px" />				</br>VCC:<input type="text" class="input username" name="vcc_number" id="vcc_number" value="" style="width:50px; height:20px; font-size:15px" />				Exp:<input type="text" class="input username" name="month" id="month" value="" style="width:50px; height:20px; font-size:15px" />/				<input type="text" class="input username" name="year" id="year" value="" style="width:50px; height:20px; font-size:15px" />			</br>			</br>						</div>			<div id="div_confirm" style="display:none">						<h1>Confirm Page</h1>									Type Account :			<input type="text" class="input username" name="type_user_confirm" id="type_user_confirm" value="" disabled />			</br>			First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			<input type="text" class="input username" name="first_name_confirm" id="first_name_confirm" value="" disabled />			</br>			Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			<input type="text" class="input username" name="last_name_confirm" id="last_name_confirm" value="" disabled />			</br>			Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			<input type="text" class="input username" name="passowrd_confirm" id="password_confirm" value="" disabled />			</br>			Contact Email:&nbsp;			<input type="text" class="input username" name="contact_email_confirm" id="contact_email_confirm" value="" disabled />			</br>			Phone Number:			<input type="text" class="input username" name="phone_number_confirm" id="phone_number_confirm" value="" disabled />			</br>			</br>			Selected Plan:			<input type="text" class="input username" name="plan_pakage_confirm" id="plan_pakage_confirm" value="" disabled />			</br>						</br>			<input type="submit" class="button" name="submit"  value="SUBMIT" id="submit" onclick=""/>			</div>						</form>			<div id="div_footer" class="footer">						<table>						<tr><Td><input type="submit" class="button" name="back"  value="first step" id="back_method" onclick="" style="display:none"/></td><td>						<input type="submit" class="button" name="next"  value="next step 2" id="next_select_plan" onclick=""/></td></tr>						</table>											</div>													</div>			<?php			}else{			echo "login already.!! can't register new user.";						}			?>									
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