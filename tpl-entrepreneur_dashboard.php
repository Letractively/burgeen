<?phpsession_start();include ("database.php");/*Template Name: Template Entrepreneur dashboard*/	get_header();	if (have_posts()) : while (have_posts()) : the_post(); 	// GET CUSTOM SIDEBAR	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);	?><head><link rel='stylesheet' type='text/css' href="<?php echo bloginfo('template_url') ?>/dashboard.css" /><link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url') ?>/main_dashboard.css"/></head>	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><script type="text/javascript" src="http://www.google.com/jsapi"></script><script type="text/javascript" src="<?php echo bloginfo('template_url') ?>/js/script.js"></script><br><br>    <div id="dolphincontainer">    <div id="dolphinnav">    <ul>    <li><a href="<?php echo bloginfo('url')?>/entrepreneur_dashboard/" title="" class="current"><span>Dashboard</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/add_proposal/" title="" ><span>Add Proposal</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_investor/" title="" ><span>Search Investor</span></a></li>	<li><a href="<?php echo bloginfo('url')?>/search_partner/" title="" ><span>Search Partner</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/edit-profile/" title=""><span>Profile</span></a></li>    <li><a href="<?php echo bloginfo('url')?>/upgrade_plan/" title=""><span><font color=red>Upgrade Plan Now</font></span></a></li>	<li><a href="<?php echo bloginfo('url')?>/buy_nudge/" title="" ><span><font color=red>Buy Nudge</font></span></a></li>    </ul>    </div>    </div><?php//error message here..if($_GET[error_message]=='yes'){echo "<font color=red>Please Create Proposal First..!! Then you can Nudge others...</font>";}?><script>$(document).ready(function(){ $("#active_proposal").click(function(){$("#div_active_proposal").css("display","block");$("#div_non_active_proposal").css("display","none");$("#div_interested_investor").css("display","none");$("#div_receive_nudge").css("display","none");$("#div_send_nudge").css("display","none");});	 $("#non_active_proposal").click(function(){$("#div_non_active_proposal").css("display","block");$("#div_interested_investor").css("display","none");$("#div_active_proposal").css("display","none");$("#div_receive_nudge").css("display","none");$("#div_send_nudge").css("display","none");});	 $("#interested_investor").click(function(){$("#div_interested_investor").css("display","block");$("#div_non_active_proposal").css("display","none");$("#div_active_proposal").css("display","none");$("#div_receive_nudge").css("display","none");$("#div_send_nudge").css("display","none");});	 $("#receive_nudge").click(function(){$("#div_interested_investor").css("display","none");$("#div_non_active_proposal").css("display","none");$("#div_active_proposal").css("display","none");$("#div_receive_nudge").css("display","block");$("#div_send_nudge").css("display","none");});	 $("#send_nudge").click(function(){$("#div_interested_investor").css("display","none");$("#div_non_active_proposal").css("display","none");$("#div_active_proposal").css("display","none");$("#div_receive_nudge").css("display","none");$("#div_send_nudge").css("display","block");});	});	</script>	<div id="content">		<div class="contentbox <?php			if ($sidebar == 'No sidebar') :				echo'wfull';			elseif ($sidebar == 'Buddy Sidebar') :				echo'w720';			else :				echo'w620';			endif; ?>">						<div id="wrapper">			<hr>	<table>	<tr>	<?php			$q_get_data= "select nudge,date,exp_date,user_type,image,message,first_name,last_name,password,contact_email,phone_number,pakage,payment_method from user where username = '$_SESSION[username]'";			$hq_get_data= mysql_db_query($DataBase,$q_get_data);			//echo $q_get_data;			while(list($nudge,$register_date,$exp_date,$user_type,$image,$message,$first_name,$last_name,$password,$contact_email,$phone_number,$pakage,$payment_method) = mysql_fetch_row($hq_get_data))			{				?>	<td width="200px">	<?php  	if($image=='')			{	?><img src="<?php echo bloginfo('template_url')?>/images/no_image.gif" width="150" height="150" /><?php				}else{ 	?>	<img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" width="150" height="150" />	<?php   }   ?>	</td>	<td>	Welcome <b><?php echo $first_name." ".$last_name;  ?></b></br></br>		<Table>	<tr>	<Td>Status</td>	<td><b><?php if($user_type=='entrepreneur'){echo "Entrepreneur"; } ?></b></td>	</tr>		<?php if($_SESSION[user_type]=='entrepreneur'){  ?>	<tr>	<td>Package/Plan</td>	<td><b><? if($pakage=='z_novice'){echo "Novice"; }else{ if($package=='global pro') { echo "Global Pro"; }  }  ?></b>  <a href="<?php echo bloginfo('url')?>/upgrade_plan/"><?php if($pakage!='global pro'){ ?><font color=red>Upgrade Now</font><?php } ?></a> </td>	</tr>	<tr>	<td>Invoice</td>	<td><a href="<?php echo bloginfo('template_url') ?>/pdf.php">Print</a></td>	</tr>	<tr>	<td>Register Date</td>	<Td><font><b><?php echo date("d-m-Y / G:i:s", strtotime($register_date)); ?></b></font></td>	</tr>	<tr>	<td>Expiry Date</td>	<td><font><b>-</b></font></td>	</tr>	<tr>	<td>Number of Nudge(s)</td>	<td><font><b><?php echo $nudge; ?></b></font>&nbsp;&nbsp;<a href="<?php echo bloginfo('url') ?>/buy_nudge">Buy Nudge Now</a></td>	<tr>	</table>	<?php 	$_SESSION[nudge]=$nudge;	}  	?>									</td>	</tr>	</table>			<hr><hr><hr>	<div id="content">		<div id="menu">			<ul>				<li><a href="#" title="Active Proposal" id="active_proposal" class="active">Active Proposal</a></li>				<li><a href="#" title="Disactive Proposal" id="non_active_proposal">Deactivated Proposal</a></li>				<li><a href="#" title="Interested Investor" id="interested_investor">Interested Investor</a></li>				<li><a href="#" title="Received Nudge" id="receive_nudge">Received Nudge</a></li>				<li><a href="#" title="Sent Nudge" id="send_nudge">Sent Nudge</a></li>			</ul>		</div>		<div id="div_active_proposal" style="display:block">		<div id="main">				<table border=1 style="">			<Tr>		<Td>		<b><font style="font-size:15px">Company Name Proposal</font></b>		</td>		<Td>		<b><font style="font-size:15px">Viewer</font></b>		</td>		<Td>		<b><font style="font-size:15px">Status</font></b>		</td>		<Td>		<b><font style="font-size:15px">Proposal Date</font></b>		</td>		<Td>		<b><font style="font-size:15px">View</font></b>		</td>		<Td>		<b><font style="font-size:15px">Update</font></b>		</td>		<Td>		<b><font style="font-size:15px">Privacy</font></b>		</td>		</tr>		<?php			$q_get_proposal= "select proposal_id,company_name,status,date,viewer,privacy from proposal where user_id = '$_SESSION[user_id]' and status='active'";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);			//echo $q_get_data;			while(list($proposal_id,$company_name,$status,$date,$viewer,$privacy) = mysql_fetch_row($hq_get_proposal))			{												?>		<tr>		<?					?>		<td>		<?php echo $company_name ?>		</td>		<td>		<?php echo $viewer; ?>		</td>		<td>		<?php echo $status." ||" ?> <a href="<?php echo bloginfo('template_url') ?>/non_active_proposal.php?proposal_id=<?php echo $proposal_id ?>" >Deactivated</a>		</td>		<td>		<?php echo date("d-m-Y / G:i:s", strtotime($date));  ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/view_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/update_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/update.gif"> </img>		</a>		</td>		<td>		<?php if($privacy=='yes'){ ?>		<?php echo $privacy." ||" ?> <a href="<?php echo bloginfo('template_url') ?>/privacy_proposal.php?proposal_id=<?php echo $proposal_id ?>&privacy=no" >No</a>		<?php }else{ ?>		<a href="<?php echo bloginfo('template_url') ?>/privacy_proposal.php?proposal_id=<?php echo $proposal_id ?>&privacy=yes" >Yes</a> || <?php echo $privacy; ?> 		<?php } ?>		</td>		<?php			}		?>				<?php			}			?>		</tr>		</table>						</div>		</div>		<div id="div_non_active_proposal" style="display:none">		<div id="main">				<table border=1 style="">			<Tr>		<Td>		<b><font style="font-size:15px">Company Name Proposal</font></b>		</td>		<Td>		<b><font style="font-size:15px">Viewer</font></b>		</td>		<Td>		<b><font style="font-size:15px">Status</font></b>		</td>		<Td>		<b><font style="font-size:15px">Proposal Date</font></b>		</td>		<td>		<b><font style="font-size:15px">Delete</font></b>		</td>		</tr>		<?			$q_get_proposal= "select viewer,proposal_id,company_name,status,date from proposal where user_id = '$_SESSION[user_id]' and (status='non-active' or status='Reach Limit Viewer')";			$hq_get_proposal= mysql_db_query($DataBase,$q_get_proposal);			//echo $q_get_data;			while(list($viewer,$proposal_id,$company_name,$status,$date) = mysql_fetch_row($hq_get_proposal))			{		?>		<tr>				<td>		<?php echo $company_name ?>		</td>		<td>		<?php echo $viewer; ?>		</td>		<td>		<?php echo "Deactivated ||" ?> 		<?php		if($status=='non-active')		{		?>		<a href="<?php echo bloginfo('template_url') ?>/active_proposal.php?proposal_id=<?php echo $proposal_id ?>" >Active</a>		<?php		}		?>		</td>		<td>		<?php echo date("d-m-Y / G:i:s", strtotime($date));  ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/delete_proposal.php?proposal_id=<?php echo $proposal_id ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/delete.gif"> </img>		</a>		</td>				</tr>		<?php			}		?>		</table>									</div>		</div>		<div id="div_interested_investor" style="display:none">		<div id="main">				<table border=1 style="">			<tr>		<Td>		<b><font style="font-size:15px">Name of the Investor</font></b>		</td>		<td>		<b><font style="font-size:15px">Proposal Name/Title (Company Name)</font></b>		</td>		<td>		<b><font style="font-size:15px">Date</font></b>		</td>		<td>		<b><font style="font-size:15px">View Investor Profile</font></b>		</td>		</tr>		<?php   				$q_get_interested_investor= "select user.first_name,user.last_name,proposal.company_name,proposal.date,interested_investor.investor_id from user,proposal,interested_investor where interested_investor.investor_id=user.user_id and interested_investor.proposal_id=proposal.proposal_id and interested_investor.entrepreneur_id = '$_SESSION[user_id]' and interested_investor.status='like'";			$hq_get_interested_investor= mysql_db_query($DataBase,$q_get_interested_investor);			//echo $q_get_interested_investor;			while(list($first_name,$last_name,$company_name,$date,$investor_id) = mysql_fetch_row($hq_get_interested_investor))			{			?>		<tr>		<td>		<?php echo $first_name." ".$last_name; ?>		</td>		<td>		<?php echo $company_name; ?>		</td>		<td>		<?php echo date("d-m-Y / G:i:s", strtotime($date)); ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/view_investor.php?investor_id=<?php echo $investor_id; ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		</td>		</tr>		<?php } ?>		</table>												</div>		</div>		<div id="div_receive_nudge" style="display:none">		<div id="main">					<table>			<tr>		<Td>		<b><font style="font-size:15px">Name of the Investor</font></b>		</td>				<td>		<b><font style="font-size:15px">Date</font></b>		</td>		<td>		<b><font style="font-size:15px">View Investor Profile</font></b>		</td>		<td>		<b><font style="font-size:15px">Status</font></b>		</td>		<td>				</td>		</tr>		<?php   				$q_nudge= "select investment_criteria.investment_criteria_id,nudge.status,nudge.proposal_id,user.first_name,user.last_name,nudge.date,nudge.investor_id from nudge,user,investment_criteria where investment_criteria.investor_id=user.user_id and nudge.investor_id=user.user_id and nudge.entrepreneur_id='$_SESSION[user_id]' and nudge.receiver='entrepreneur'";			$hq_nudge= mysql_db_query($DataBase,$q_nudge);			//echo $q_nudge;			while(list($investment_id,$status,$proposal_id,$first_name,$last_name,$date,$investor_id) = mysql_fetch_row($hq_nudge))			{			?>		<tr>		<td>		<?php echo $first_name." ".$last_name; ?>		</td>				<td>		<?php echo date("d-m-Y / G:i:s", strtotime($date)); ?>		</td>		<td>		<?php if($status=='accepted'){ ?>		<a href="<?php echo bloginfo('template_url') ?>/view_investor.php?investor_id=<?php  echo $investor_id; ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		<?php } ?>		</td>		<td>		<?php echo $status; ?>		</td>		<td>		<?php  if($status=="pending" and $_SESSION[nudge]>0){ ?>		<a href="<?php echo bloginfo('template_url') ?>/entrepreneur_nudge.php?status=accept&proposal_id=<?php echo $proposal_id ?>&investor_id=<?php echo $investor_id ?>&investment_id=<?php echo $investment_id; ?>" onclick="alert('Accepted, now you can browse their detail investor profile');">Accept</a> || <a href="<?php echo bloginfo('template_url') ?>/entrepreneur_nudge.php?status=reject&proposal_id=<?php echo $proposal_id ?>&investor_id=<?php echo $investor_id ?>" onclick="alert('Rejected, next can be deleted');">Reject</a>		<?php  }else if($status=="pending" and $_SESSION[nudge]==0){ ?>		<a href="<?php echo bloginfo('url')?>/buy_nudge/" title=""><span><font color=red>Purchase Nudge</font></span></a>				<?php }else if($status=="rejected"){ ?>		<a href="<?php echo bloginfo('template_url') ?>/entrepreneur_nudge.php?status=delete&proposal_id=<?php echo $proposal_id ?>&investor_id=<?php echo $investor_id ?>" onclick="alert('Nudge has been deleted..!!');">Delete</a>		<?php } ?>		</td>		</tr>		<?php } ?>		</table>												</div>		</div>		<div id="div_send_nudge" style="display:none">		<div id="main">				<table border=1 style="">			<tr>		<Td>		<b><font style="font-size:15px">Name of the Investor</font></b>		</td>				<td>		<b><font style="font-size:15px">Date</font></b>		</td>		<td>		<b><font style="font-size:15px">View Investor Profile</font></b>		</td>		<td>		<b><font style="font-size:15px">Status</font></b>		</td>		<td>				</td>		</tr>		<?php   				$q_send_nudge= "select distinct user.first_name,user.last_name,nudge.date,user.user_id,nudge.status from user,nudge where user.user_id=nudge.investor_id and nudge.entrepreneur_id='$_SESSION[user_id]' and nudge.sender='entrepreneur'";			$hq_send_nudge= mysql_db_query($DataBase,$q_send_nudge);			//echo $q_send_nudge;			while(list($first_name,$last_name,$date,$investor_id,$status) = mysql_fetch_row($hq_send_nudge))			{			?>		<tr>		<td>		<?php echo $first_name." ".$last_name; ?>		</td>		<td>		<?php echo date("d-m-Y / G:i:s", strtotime($date)); ?>		</td>		<td>		<?php if($status=='accepted'){ ?>		<a href="<?php echo bloginfo('template_url') ?>/view_investor.php?investor_id=<?php  echo $investor_id; ?>" >		<img src="<?php echo bloginfo('template_url') ?>/images/view.gif" > </img>		</a>		<?php } ?>		</td>		<td>		<?php echo $status; ?>		</td>		<td>		<a href="<?php echo bloginfo('template_url') ?>/investor_nudge.php?entrepreneur_id=<?php echo $_SESSION[user_id]; ?>&investor_id=<?php echo $investor_id ?>&status=delete" >		Delete/Cancel		</a>		</td>		</tr>		<?php } ?>		</table>												</div>		</div>	</div></div>																										<?php				// CONTENT				//the_content();				echo '<div class="clear h20"><!-- --></div>';								// PAGINATION				wp_link_pages(array('before' => '<p><strong>'.__( 'Pages','pandathemes' ).':</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));								// COMMENTS ETC.				if ( $theme_options['pages_metas'] == 'enable' ) : comments_template(); endif;	endwhile;		else : echo '<div class="contentbox w620"><h2>404</h2><p>'.__('Sorry, no posts matched your criteria.','pandathemes').'</p>';	endif; ?>	</div> <!-- end_of_contentbox -->		<?php			// SIDEBAR			if ($sidebar == 'Buddy Sidebar') :				include(TEMPLATEPATH.'/inc/sidebar_buddy.php');			else :				include(TEMPLATEPATH.'/inc/sidebar.php');			endif;	get_footer();?>