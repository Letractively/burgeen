<?phpsession_start();
$first_name_error=1;  // 1 is error and 0 is correct$password_error=1;$contact_email_error=1;$pakage_error=1;include ("database.php");
/*
Template Name: Template Edit Profile
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>
<head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/register.css' /></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><!-- pakage selection --><script>$(document).ready(function(){ $("#upgrade_pakage").click(function(){$("#pakage").slideToggle();$("#pakage").css("display","block");});	$("#free").click(function(){if($("#free").is(':checked')) {$("#user_plan").val('free');}});	$("#basic").click(function(){ if($("#basic").is(':checked')) {$("#user_plan").val("basic");}});	$("#pro").click(function(){ if($("#pro").is(':checked')) {$("#user_plan").val("pro");}});});	</script><?phpif(isset($_GET[first_name]) and $_GET[first_name]==''){ $first_name_error=1;?><script>$(document).ready(function(){$("#first_name").css("border-color","red");	alert('username cannot be empty');});	</script><?php}else{$first_name_error=0; //no error}?><?phpif(isset($_GET[user_password]) and $_GET[user_password]==''){ $password_error=1;?><script>$(document).ready(function(){$("#user_password").css("border-color","red");alert('password cannot be empty');	});	</script><?php}else{$password_error=0; //no error}?><?phpif(isset($_GET[contact_email]) and $_GET[contact_email]==''){ $contact_email_error=1;?><script>$(document).ready(function(){$("#contact_email").css("border-color","red");alert('email cannot be empty');	});	</script><?php}else{$contact_email_error=0; //no error}?><?phpif(isset($_GET[user_plan]) and $_GET[user_plan]==''){ $pakage_error=1;?><script>$(document).ready(function(){$("#user_plan").css("border-color","red");alert('user plan(pakage) cannot be empty');	});	</script><?php}else{$pakage_error=0; //no error}if($pakage_error==0 and $contact_email_error==0 and $password_error==0 and $first_name_error==0 and isset($_GET[first_name]) and isset($_GET[user_password]) and isset($_GET[contact_email]) and isset($_GET[type_pakage]))  //no error{				$q_update= "update user set first_name='$_GET[first_name]', last_name='$_GET[last_name]', password='$_GET[user_password]', contact_email='$_GET[contact_email]', phone_number='$_GET[phone_number]', pakage='$_GET[type_pakage]', payment_method='$_GET[payment_method]' where username='$_SESSION[username]'";			$hq_update	= mysql_db_query($DataBase,$q_update);			?>			<script>			window.alert('update successfully');			window.location.href='http://127.0.0.1/wordpress2/';			</script>			<?php}?>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">									
			<?php	if($_SESSION[login]=='success')	{	?>						<?php //get data from database to be shown in the edit page ?>						<?php						$q_get_data= "select first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{							?>						<div id="wrapper">			<Center>			<form action="" method="get" name="edit_profile" id="edit_profile" class="login-form" >			<div class="header">			<h1><?php _e('Edit Profile', APP_TD); ?></h1>						</div>										<div class="content">					<p>						First Name *<br/>						<input type="text" class="input username" name="first_name" id="first_name" value="<?php echo $first_name ?>" style="" />					</p>														<p>						Last Name<br/>						<input type="text" class="input username" name="last_name" id="last_name" value="<?php  echo $last_name ?>" />					</p>										<p>						Password *<br/>						<input type="password" class="input username" name="user_password" id="user_password" value="<?php echo $password ?>" />					</p>										<p>						Contact Email *<br/>						<input type="email" class="input username" name="contact_email" id="contact_email" value="<?php  echo $contact_email ?>" />					</p>										<p>						Phone Number<br/>						<input type="number" class="input username" name="phone_number" id="phone_number" value="<?php  echo $phone_number ?>" />					</p>										<!--<p>						Website Link<br/>						<input type="text" class="input username" name="website_link" id="website_link" value="<?php   ?>" />					</p>-->										<p>						Your Plan *, <a id="upgrade_pakage" name="upgrade_pakage">upgrade now</a><br/>						<input type="text" class="input username" name="user_plan" id="user_plan" value="<?php  echo $pakage ?>"  disabled />					</p>										<div id="pakage" name="pakage" style="display:none">					<Table>					<Tr>					<Td>					pakage 1</br>					........</br>					........</br>					</td>					<td>					pakage 2</br>					........</br>					........</br>					</td>					<Td>					pakage 3</br>					........</br>					........</br>					</td>					</tr>					<tr>					<Td>										<input type="radio" name="type_pakage" id="free" value="free" <?php if($pakage=='free') { ?>  checked <?php } ?>   />Free							</td>					<td>					<input type="radio" name="type_pakage" id="basic" value="basic" <?php if($pakage=='basic') { ?>  checked <?php } ?> />Basic					</td>					<Td>					<input type="radio" name="type_pakage" id="pro" value="pro"  <?php if($pakage=='pro') { ?>  checked <?php } ?>  />Pro					</td>					</tr>					</table>					</div>										<p>						Payment Method : <?php if($payment_method=='') echo"No Payment"; else echo $payment_method ?><br/>							<select id="entrepreneur_country" name="payment_method" id="payment_method" style="width:150px; height:25px; font-size:15px">							<option value="no_payment">NO PAYMENT</option>							<option value="visa_card">VISA CARD</option>							<option value="master_card">MASTER CARD</option>							<option value="paypal">PAYPAL</option>							</select>									</p>				</div>					<div class="footer">												<input type="submit" class="button" name="update_profile" id="update_profile" value="<?php _e('UPDATE NOW &rarr;', APP_TD); ?>" onclick="" />											</div>							</form>								</div>			<?php 			}			}else {			echo "error.. login first!!";			}			?>			
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