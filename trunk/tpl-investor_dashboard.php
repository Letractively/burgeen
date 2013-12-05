<?phpsession_start();
include('database.php');
/*
Template Name: Template Investor dashboard
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?><head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/investor_dashboard/" title="" class="current"><span>Dashboard</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_proposal/" title="" ><span>Search Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investment_criteria/" title="" ><span>Investment Criteria</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>       </ul>    </div>    </div>
<script>$(document).ready(function(){ $("#proposal_bookmarked").click(function(){$("#div_proposal_bookmarked").css("display","block");$("#div_investor_bookmarked").css("display","none");$("#div_entrepreneur_bookmarked").css("display","none");$("#div_send_nudge").css("display","none");$("#div_receive_nudge").css("display","none");});	 $("#send_nudge").click(function(){$("#div_proposal_bookmarked").css("display","none");$("#div_investor_bookmarked").css("display","none");$("#div_entrepreneur_bookmarked").css("display","none");$("#div_send_nudge").css("display","block");$("#div_receive_nudge").css("display","none");});	 $("#receive_nudge").click(function(){$("#div_proposal_bookmarked").css("display","none");$("#div_investor_bookmarked").css("display","none");$("#div_entrepreneur_bookmarked").css("display","none");$("#div_send_nudge").css("display","none");$("#div_receive_nudge").css("display","block");});	});	</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<div id="wrapper">			<hr>	<table>	<tr>	<?php			$q_get_data= "select date,exp_date,user_type,image,message,first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($date,$exp_date,$user_type,$image,$message,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{	?>	<td width="200px">	<?php  	if($image=='')			{	?><img src="<?php echo bloginfo('template_url')?>/images/no_image.gif" width="150" height="150" /><?php				}else{ 	?>	<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />	<?php   }   ?>	</td>	<td>	Welcome, </br><?php echo $first_name." ".$last_name  ?></br></br>	Status : <?php echo $user_type ?>	</br>	</br>	Register Date : <?php echo $date ?>	</br>	Expired Date : <?php echo $exp_date ?>	</td>	</tr>	</table>			<hr><hr><hr>	<div id="content">		<div id="menu">			<ul>				<li><a href="#" title="Proposal Bookmarked" id="proposal_bookmarked" class="active">Proposal Bookmarked</a></li>				<li><a href="#" title="Receive Nudge" id="receive_nudge">Receive Nudge</a></li>				<li><a href="#" title="Send Nudge" id="send_nudge">Send Nudge</a></li>							</ul>		</div>		<div id="div_proposal_bookmarked" style="display:block">		<div id="main">		List of Proposal that you have Bookmarked						<table border=1 style="">			<Tr>		<Td>		Company Name Proposal		</td>		<Td>		Status		</td>		<Td>		Proposal Date		</td>		<Td>		View Detail		</td>		<Td>		Un-Bookmark		</td>		</tr>		<?php			$q_get_proposal_bookmark= "select proposal.company_name,proposal.date,proposal.proposal_id from proposal,bookmark where proposal.proposal_id=bookmark.proposal_id and bookmark.investor_id = '$_SESSION[user_id]' and bookmark.status='bookmark'";			$hq_get_proposal_bookmark= mysql_db_query($DataBase,$q_get_proposal_bookmark);			//echo $q_get_proposal_bookmark;			while(list($company_name,$date,$proposal_id) = mysql_fetch_row($hq_get_proposal_bookmark))			{												?>		<tr>		<?					?>		<td>		<?php echo $company_name ?>		</td>				<td>		Active		</td>		<td>		<?php echo $date  ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/view_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/bookmark_process.php?proposal_id=<?php echo $proposal_id ?>&status=un-bookmark" >		Un-Bookmark		</a>		</td>		<?php			}		?>						</tr>		</table>						</div>		</div>				<div id="div_receive_nudge" style="display:none">		<div id="main">		Receive Nudge						<table>			<Tr>		<td>		Entrepreneur Name		</td>		<Td>		Company Name Proposal		</td>		<Td>		Date		</td>		<Td>		Status		</td>		<Td>		View		</td>		<Td>				</td>		</tr>		<?php			$q_receive_nudge= "select proposal.proposal_id,nudge.entrepreneur_id,nudge.investor_id,user.first_name,user.last_name,proposal.company_name,nudge.date,nudge.status from nudge,user,proposal where user.user_id=nudge.entrepreneur_id and user.user_id=proposal.user_id and investor_id!='accept' and nudge.investor_id='$_SESSION[user_id]' and nudge.receiver='investor'";			$hq_receive_nudge= mysql_db_query($DataBase,$q_receive_nudge);			//echo $q_receive_nudge;			while(list($proposal_id,$entrepreneur_id,$investor_id,$first_name,$last_name,$company_name,$date,$status) = mysql_fetch_row($hq_receive_nudge))			{												?>		<tr>		<?					?>		<td>		<?php echo $first_name." ".$last_name; ?>		</td>				<td>		<?php echo $company_name;  ?>		</td>		<td>		<?php echo $date; ?>		</td>		<td>		<?php echo $status; ?>		</td>		<td>		<?php  if($status=='accept'){  ?>		<a href="<?php echo bloginfo('template_url')?>/view_proposal.php?proposal_id=<?php echo $proposal_id; ?>"><img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img></a>		<?php  } ?>		</td>				<td>		<?php  if($status=="pending"){ ?>		<a href="<?php echo bloginfo('template_url') ?>/investor_nudge.php?status=accept&investor_id=<?php echo $investor_id ?>&entrepreneur_id=<?php echo $entrepreneur_id ?>&proposal_id=<?php echo $proposal_id ?>" onclick="alert('Accepted, now you can browse their detail investor profile');">Accept</a> || <a href="<?php echo bloginfo('template_url') ?>/investor_nudge.php?status=reject&entrepreneur_id=<?php echo $entrepreneur_id ?>&investor_id=<?php echo $investor_id ?>" onclick="alert('Rejected, next can be deleted');">Reject</a>		<?php  }else if($status=="reject"){ ?>		<a href="<?php echo bloginfo('template_url') ?>/investor_nudge.php?status=delete&entrepreneur_id=<?php echo $entrepreneur_id ?>&investor_id=<?php echo $investor_id ?>" onclick="alert('Nudge has been deleted..!!');">Delete</a>		<?php } ?>		</td>				<?php			}		?>				</tr>		</table>						</div>		</div>				<div id="div_send_nudge" style="display:none">		<div id="main">		Send Nudge						<table>			<Tr>		<td>		Entrepreneur Name		</td>		<Td>		Company Name Proposal		</td>		<Td>		Date		</td>		<Td>		Status		</td>		</td>		<Td>		View		</td>		<Td>				</td>		</tr>		<?php			$q_send_nudge= "select nudge.investor_id,nudge.proposal_id,user.first_name,user.last_name,proposal.company_name,nudge.date,nudge.status from user,proposal,nudge where user.user_id=proposal.user_id and nudge.investor_id='$_SESSION[user_id]' and nudge.proposal_id=proposal.proposal_id and nudge.sender='investor'";			$hq_send_nudge= mysql_db_query($DataBase,$q_send_nudge);			//echo $q_get_proposal_bookmark;			while(list($investor_id,$proposal_id,$first_name,$last_name,$company_name,$date,$status) = mysql_fetch_row($hq_send_nudge))			{												?>		<tr>		<td>		<?php echo $first_name." ".$last_name; ?>		</td>				<td>		<?php echo $company_name; ?>		</td>		<td>		<?php echo $date;  ?>		</td>		<td>		<?php echo $status; ?>		</td>		<td>		<?php  if($status=='accept'){  ?>		<a href="<?php echo bloginfo('template_url')?>/view_proposal.php?proposal_id=<?php echo $proposal_id; ?>"><img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img></a>		<?php  } ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/entrepreneur_nudge.php?investor_id=<?php echo $investor_id ?>&proposal_id=<?php echo $proposal_id ?>&status=delete" >		Delete/Cancel		</a>		</td>		<?php			}		?>				<?php			}			?>		</tr>		</table>						</div>		</div>	</div></div>
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