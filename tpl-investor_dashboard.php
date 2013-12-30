<?phpsession_start();
include('database.php');
/*
Template Name: Template Investor dashboard
*/

	get_header();

	if (have_posts()) : while (have_posts()) : the_post(); 

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	?>	<head><link rel='stylesheet' type='text/css' href='<?php echo bloginfo('template_url') ?>/dashboard.css' /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/investor_dashboard/" title="" class="current"><span>Dashboard</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_proposal/" title="" ><span>Search Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/investment_criteria/" title="" ><span>Investment Criteria</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>       </ul>    </div>    </div>
<?phpif($_GET[error_message]=='yes'){echo "<font color=red>that entrepreneur does not have enough nudge balance..!!</font>";}?><script>$(document).ready(function(){ $("#proposal_bookmarked").click(function(){$("#div_proposal_bookmarked").css("display","block");$("#div_investor_bookmarked").css("display","none");$("#div_entrepreneur_bookmarked").css("display","none");$("#div_send_nudge").css("display","none");$("#div_receive_nudge").css("display","none");});	 $("#send_nudge").click(function(){$("#div_proposal_bookmarked").css("display","none");$("#div_investor_bookmarked").css("display","none");$("#div_entrepreneur_bookmarked").css("display","none");$("#div_send_nudge").css("display","block");$("#div_receive_nudge").css("display","none");});	 $("#receive_nudge").click(function(){$("#div_proposal_bookmarked").css("display","none");$("#div_investor_bookmarked").css("display","none");$("#div_entrepreneur_bookmarked").css("display","none");$("#div_send_nudge").css("display","none");$("#div_receive_nudge").css("display","block");});	});	</script>
	<div id="content">

		<div class="contentbox <?php
			if ($sidebar == 'No sidebar') :

				echo'wfull';

			elseif ($sidebar == 'Buddy Sidebar') :

				echo'w720';

			else :

				echo'w620';

			endif; ?>">			<div id="wrapper">			<hr>	<table>	<tr>	<?php			$q_get_data= "select date,exp_date,user_type,image,message,first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($date,$exp_date,$user_type,$image,$message,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{	?>	<td width="200px">	<?php  	if($image=='')			{	?><img src="<?php echo bloginfo('template_url')?>/images/no_image.gif" width="150" height="150" /><?php				}else{ 	?>	<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />	<?php   }   ?>	</td>	<td>	Welcome <b><?php echo $first_name." ".$last_name  ?></br></br></b>			<Table>	<Tr>	<td>Status</td>	<td><?php echo $user_type ?></td>	</tr>	<tr>	<td>Register Date</td>	<td><?php echo date("d-m-Y / G:i:s", strtotime($date)); ?></td>	</tr>	<tr>	<td>Expired Date</td>	<td><?php echo date("d-m-Y / G:i:s", strtotime($exp_date)); ?></td>	</tr>	</td>	</table>	</td>	</tr>	</table>			<hr><hr><hr>	<div id="content">		<div id="menu">			<ul>				<li><a href="#" title="Bookmarked Proposal" id="proposal_bookmarked" class="active">Bookmarked Proposal(s)</a></li>				<li><a href="#" title="Received Nudge" id="receive_nudge">Received Nudge(s)</a></li>				<li><a href="#" title="Sent Nudge" id="send_nudge">Sent Nudge(s)</a></li>							</ul>		</div>		<div id="div_proposal_bookmarked" style="display:block">		<div id="main">				<table border=1 style="">			<Tr>		<Td>		<b><font style="font-size:15px">Company Name Proposal</font></b>		</td>		<Td>		<b><font style="font-size:15px">Status</font></b>		</td>		<Td>		<b><font style="font-size:15px">Proposal Date</font></b>		</td>		<Td>		<b><font style="font-size:15px">View Detail</font></b>		</td>		<Td>		<b><font style="font-size:15px">Un-Bookmark</font></b>		</td>		</tr>		<?php			$q_get_proposal_bookmark= "select proposal.company_name,proposal.date,proposal.proposal_id from proposal,bookmark where proposal.proposal_id=bookmark.proposal_id and bookmark.investor_id = '$_SESSION[user_id]' and bookmark.status='bookmark'";			$hq_get_proposal_bookmark= mysql_db_query($DataBase,$q_get_proposal_bookmark);			//echo $q_get_proposal_bookmark;			while(list($company_name,$date,$proposal_id) = mysql_fetch_row($hq_get_proposal_bookmark))			{												?>		<tr>		<?					?>		<td>		<?php echo $company_name ?>		</td>				<td>		Active		</td>		<td>		<?php echo $date  ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/view_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/bookmark_process.php?proposal_id=<?php echo $proposal_id ?>&status=un-bookmark" >		Un-Bookmark		</a>		</td>		<?php			}		?>						</tr>		</table>						</div>		</div>				<div id="div_receive_nudge" style="display:none">		<div id="main">				<table>			<Tr>		<td>		<b><font style="font-size:15px">Name of the Entrepreneur</font></b>		</td>		<Td>		<b><font style="font-size:15px">Company Name Proposal</font></b>		</td>		<Td>		<b><font style="font-size:15px">Date</font></b>		</td>		<Td>		<b><font style="font-size:15px">Status</font></b>		</td>		<Td>		<b><font style="font-size:15px">View</font></b>		</td>				</tr>		<?php			$q_receive_nudge= "select distinct proposal.proposal_id,nudge.entrepreneur_id,nudge.investor_id,user.first_name,user.last_name,proposal.company_name,nudge.date,nudge.status from nudge,user,proposal where user.user_id=nudge.entrepreneur_id and nudge.entrepreneur_id=proposal.user_id and nudge.investor_id='$_SESSION[user_id]' and nudge.receiver='investor' and proposal.proposal_id=nudge.proposal_id";			$hq_receive_nudge= mysql_db_query($DataBase,$q_receive_nudge);			//echo $q_receive_nudge;			while(list($proposal_id,$entrepreneur_id,$investor_id,$first_name,$last_name,$company_name,$date,$status) = mysql_fetch_row($hq_receive_nudge))			{												?>		<tr>		<?					?>		<td>		<?php echo $first_name." ".$last_name; ?>		</td>				<td>		<?php echo $company_name;  ?>		</td>		<td>		<?php echo date("d-m-Y / G:i:s", strtotime($date)); ?>		</td>		<td>		<?php echo $status; ?>		</td>		<td>		<?php  if($status=='accepted'){  ?>		<a href="<?php echo bloginfo('template_url')?>/view_proposal.php?proposal_id=<?php echo $proposal_id; ?>"><img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img></a>		<?php  } ?>				<?php  if($status=="pending"){ ?>		<a href="<?php echo bloginfo('template_url') ?>/investor_nudge.php?status=accept&investor_id=<?php echo $investor_id ?>&entrepreneur_id=<?php echo $entrepreneur_id ?>&proposal_id=<?php echo $proposal_id ?>">Accept</a> || <a href="<?php echo bloginfo('template_url') ?>/investor_nudge.php?status=reject&entrepreneur_id=<?php echo $entrepreneur_id ?>&investor_id=<?php echo $investor_id ?>" onclick="alert('Rejected, next can be deleted');">Reject</a>		<?php  }else if($status=="rejected"){ ?>		<a href="<?php echo bloginfo('template_url') ?>/investor_nudge.php?status=delete&entrepreneur_id=<?php echo $entrepreneur_id ?>&investor_id=<?php echo $investor_id ?>" onclick="alert('Nudge has been deleted..!!');">Delete</a>		<?php } ?>		</td>				<?php			}		?>				</tr>		</table>						</div>		</div>				<div id="div_send_nudge" style="display:none">		<div id="main">				<table>			<Tr>		<td>		<b><font style="font-size:15px">Name of the Entrepreneur</font></b>		</td>		<Td>		<b><font style="font-size:15px">Company Name Proposal</font></b>		</td>		<Td>		<b><font style="font-size:15px">Date</font></b>		</td>		<Td>		<b><font style="font-size:15px">Status</font></b>		</td>		</td>		<Td>		<b><font style="font-size:15px">View</font></b>		</td>		<Td>				</td>		</tr>		<?php			$q_send_nudge= "select nudge.investor_id,nudge.proposal_id,user.first_name,user.last_name,proposal.company_name,nudge.date,nudge.status from user,proposal,nudge where user.user_id=proposal.user_id and nudge.investor_id='$_SESSION[user_id]' and nudge.proposal_id=proposal.proposal_id and nudge.sender='investor'";			$hq_send_nudge= mysql_db_query($DataBase,$q_send_nudge);			//echo $q_get_proposal_bookmark;			while(list($investor_id,$proposal_id,$first_name,$last_name,$company_name,$date,$status) = mysql_fetch_row($hq_send_nudge))			{												?>		<tr>		<td>		<?php echo $first_name." ".$last_name; ?>		</td>				<td>		<?php echo $company_name; ?>		</td>		<td>		<?php echo date("d-m-Y / G:i:s", strtotime($date));  ?>		</td>		<td>		<?php echo $status; ?>		</td>		<td>		<?php  if($status=='accepted'){  ?>		<a href="<?php echo bloginfo('template_url')?>/view_proposal.php?proposal_id=<?php echo $proposal_id; ?>"><img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img></a>		<?php  } ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/entrepreneur_nudge.php?investor_id=<?php echo $investor_id ?>&proposal_id=<?php echo $proposal_id ?>&status=delete" >		Delete/Cancel		</a>		</td>		<?php			}		?>				<?php			}			?>		</tr>		</table>						</div>		</div>	</div></div>
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