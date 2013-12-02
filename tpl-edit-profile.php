<?php   session_start();
$first_name_error=1;  // 1 is error and 0 is correct$password_error=1;$contact_email_error=1;$pakage_error=1;include ("database.php");
/*
Template Name: Template Edit Profile
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>
<head><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/profile.css" /><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/register.css' /><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><?php if($_SESSION[user_type]=='entrepreneur') {?><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" ><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_investor/" title="" ><span>Search Investor</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title="" class="current"><span>Profile</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/upgrade_plan/" title=""><span><font color=red>Upgrade Plan Now</font></span></a></li>       </ul>    </div>    </div><?php}else if($_SESSION[user_type]=='investor') {?><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/investor_dashboard/" title="" ><span>Dashboard</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_proposal/" title="" ><span>Search Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investment_criteria/" title="" ><span>Investment Criteria</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title="" class="current"><span>Profile</span></a></li>       </ul>    </div>    </div><?php}?><!-- pakage selection --><script>$(document).ready(function(){$("#div_view_profile").css("display","none");$("#edit_profile_button").click(function(){$("#div_edit_profile").slideToggle();$("#div_view_profile").css("display","none");$("#edit_profile_button").css("color","blue");$("#view_profile_button").css("color","black");});$("#view_profile_button").click(function(){$("#div_view_profile").slideToggle();$("#div_edit_profile").css("display","none");$("#view_profile_button").css("color","blue");$("#edit_profile_button").css("color","black");});});	</script><?phpif(isset($_POST[first_name]) and $_POST[first_name]==''){ $first_name_error=1;?><script>$(document).ready(function(){$("#first_name").css("border-color","red");	alert('username cannot be empty');});	</script> <?php }else {  //no error $first_name_error=0;  } ?><?phpif(isset($_POST[contact_email]) and $_POST[contact_email]==''){ $contact_email_error=1;?><script>$(document).ready(function(){$("#contact_email").css("border-color","red");alert('email cannot be empty');	});	</script><?php}else{//no error $contact_email_error=0; }?><?php//no errorif($contact_email_error==0 and $first_name_error==0 and isset($_POST[first_name]) and isset($_POST[contact_email]))  {if(isset($width) and isset($height)){	list($width, $height) = getimagesize($_FILES['userfile']['tmp_name']);}if(isset($_POST['update_profile']) && $_FILES['userfile']['size'] > 0 && $_FILES['userfile']['type'] =='image/jpeg' && $width<=200 && $height<=200){$fileName = $_FILES['userfile']['name'];$tmpName = $_FILES['userfile']['tmp_name'];$fileSize = $_FILES['userfile']['size'];$fileType = $_FILES['userfile']['type'];$fp = fopen($tmpName, 'r');$content = fread($fp, filesize($tmpName));$content = addslashes($content);fclose($fp);if(!get_magic_quotes_gpc()){$fileName = addslashes($fileName);}			$q_update= "update user set message='$_POST[message]',image='$content',first_name='$_POST[first_name]', last_name='$_POST[last_name]', contact_email='$_POST[contact_email]', phone_number='$_POST[phone_number]' where username='$_SESSION[username]'";			$hq_update	= mysql_db_query($DataBase,$q_update);			//echo $q_update;			?>			<script>			window.alert('update successfully');			<?php			if($_SESSION[user_type]=='entrepreneur')			{			?>			window.location.href='<?php echo bloginfo('url')?>/entrepreneur_dashboard/';			<?php			}else{			?>			window.location.href='<?php echo bloginfo('url')?>/investor_dashboard/';			<?php			}			?>			</script>			<?php}else if($_FILES['userfile']['type']!='image/jpeg' and $_FILES['userfile']['type']!=''){?><script>window.alert('ERROR, Image must be JPEG format...!');</script><?php}else if(($width>200 or $height>200) and $width!=0 and $heigh!=0){echo $width.$height;?><script>window.alert('ERROR, Maximal dimention of image is 200x200 pixel...!');</script><?php}else{			$q_update= "update user set message='$_POST[message]',first_name='$_POST[first_name]', last_name='$_POST[last_name]', contact_email='$_POST[contact_email]', phone_number='$_POST[phone_number]' where username='$_SESSION[username]'";			$hq_update	= mysql_db_query($DataBase,$q_update);						?>			<script>			window.alert('update successfully');			<?php			if($_SESSION[user_type]=='entrepreneur')			{ 			?>			window.location.href='<?php echo bloginfo('url')?>/entrepreneur_dashboard/';			<?php			}else{			?>			window.location.href='<?php echo bloginfo('url')?>/investor_dashboard/';			<?php			}			?>			</script>						<?php}}?>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">									
			<?php	if($_SESSION[login]=='success')	{	?>						<?php //get data from database to be shown in the edit page ?>																														<?php						$q_get_data= "select message,first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($message,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{							?>						<Table>			<tr>			<td>			<input type="submit"  id="edit_profile_button" name="edit_profile_button"  value="                                             Edit Profile                                              "  style="color:blue;"/>			</td>			<td>			<input type="submit" id="view_profile_button" name="view_profile_button"  value="                                                    View Profile                                                 " />			</td>									</tr>			</table>						<div id="div_edit_profile" name="div_edit_profile" >				<div id="wrapper">			<Center>			<form action="" method="POST" name="edit_profile" id="edit_profile" class="login-form" enctype="multipart/form-data" >			<div class="header">			<h1><?php _e('Edit Profile', APP_TD); ?></h1>						</div>																<div class="content">					<p>						Upload Profile Image (<b>JPG Only max 200x200 pixel</b>) <br/>						<input type="hidden" name="MAX_FILE_SIZE" value="2000000">						<input name="userfile" type="file" id="userfile" accept="image/*">											</p>																First Name *<br/>						<input type="text" class="input username" name="first_name" id="first_name" value="<?php echo $first_name ?>" style="" />											</br>Last Name<br/>						<input type="text" class="input username" name="last_name" id="last_name" value="<?php  echo $last_name ?>" />											</br>Contact Email *<br/>						<input type="email" class="input username" name="contact_email" id="contact_email" value="<?php  echo $contact_email ?>" />											</br>Phone Number<br/>						<input type="number" class="input username" name="phone_number" id="phone_number" value="<?php  echo $phone_number ?>" />									<!--<p>						Website Link<br/>						<input type="text" class="input username" name="website_link" id="website_link" value="<?php   ?>" />					</p>-->																					<p>						Reset Password <a href="<?php echo bloginfo('url')?>/reset-password">click here</a><br/>						<!--<input type="password" class="input username" name="user_password" id="user_password" value="<?php echo $password ?>" />-->					</p>					<p>						About Me :						<Textarea style="height: 80px;" id="message" name="message" ><?php echo $message ?></textarea>					</p>				</div>					<div class="footer">												<input type="submit" class="button" name="update_profile" id="update_profile" value="<?php _e('UPDATE NOW &rarr;', APP_TD); ?>" onclick="" />											</div>				</div>							</form>								</div>			<div id="div_view_profile" name="div_view_profile" >				<!-- user profile -->			<?php			//get the data from database			$q_get_data= "select message,image,username,user_type,first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($message,$image,$username,$user_type,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{															?>						<div id="content" class="clearfix">			<section id="left">			<div id="userStats" class="clearfix">				<div class="pic">					<a href="#"><img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" /></a>				</div>								<div class="data">					<h1><?php echo $first_name." ".$last_name ?></h1>					User type: <?php  echo $user_type ?></br>					User name: <?php echo $username ?></br>					Email    : <?php echo $contact_email ?></br>					Phone    : <?php echo $phone_number ?></br>														</div>							</div>						<h1>About Me:</h1>			<p><?php echo $message; ?></p>			</section>					</div>			<?php			}			?>						</div>			<?php 			}			}else {			echo "error.. login first!!";			}			?>			
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