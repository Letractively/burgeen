<?php if ( !defined( 'ABSPATH' ) ) : exit; endif;session_start();
include('database.php');
	global
		$theme_options,
		$panda_sl,
		$panda_he;

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html <?php language_attributes(); ?>>

	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="distribution" content="global" />
		<title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<link rel="Shortcut Icon" href="<?php echo $theme_options['favicon']; ?>" type="image/x-icon" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<?php
			do_action('styles');
			do_action('ie');
			wp_head();
			do_action('google_fonts');
			echo $theme_options['google_analytics'];
		?>
	</head>

	<body <?php body_class(); ?>>
	
		<div id="site-wrapper">
	
			<?php
				// Notice for visitors
				if ($panda_he['notice'] == 'enable') : echo '<div id="quick-notice">' . $panda_he['notice_data'] . '</div>'; endif;
			?>
		
			<div id="topbg"><!-- --></div>
		
			<div id="headwrapper">
		
				<div id="header">
			
					<?php
					// LOGO
					$logo_type = $theme_options['logo_type'];
			
						// Image logo
						if ($logo_type == 'Image') : ?>
							<div id="logo" class="fl div-as-table">
								<div>
									<div>
										<h1 id="imglogo" class="logo"><a href="<?php echo get_option('home'); ?>"><img src="<?php echo $theme_options['logo'] ?>" alt="<?php bloginfo('title'); ?>"/></a></h1>
									</div>
								</div>
							</div>
							<?php ;
			
						// Text logo
						elseif ($logo_type == 'Text') : ?>
							<div id="logo" class="fl div-as-table">
								<div>
									<div>
										<?php
											$logo = ($theme_options['sitename']) ? $theme_options['sitename'] : get_bloginfo('name');
											$desc = ($theme_options['sitedesc']) ? $theme_options['sitedesc'] : get_bloginfo('description');
											echo '<h1 class="logo"><a href="'.get_option('home').'">'.$logo.'</a></h1> &nbsp;'.$desc;
										?>
									</div>
								</div>
							</div>
							<?php ;
			
						// Default
						else : ?>
							<div id="logo" class="fl div-as-table">
								<div>
									<div>
										<?php
											$logo = get_bloginfo('name');
											$desc = get_bloginfo('description');
											echo '<h1 class="logo"><a href="'.get_option('home').'">'.$logo.'</a></h1> &nbsp;'.$desc;
										?>
									</div>
								</div>
							</div>
						<?php ;
			
						endif;
															
						// Search form (LOGIN)
						if ($panda_he['searchform'] == 'enable') : ?>
							<div id="hsearch" class="hmisc fr div-as-table"><?php if($_SESSION[login]=='' or $_SESSION[login]=='failed') { ?>							
<form id="login_form"  method="POST" action="<?php echo bloginfo('template_url') ?>/login_process.php">    <p >       Login:        <input type="text" name="username" id="username" placeholder="Username" style="width:80px">    </p>    <p >               <input type="password" name="user_password" id="user_password" placeholder="Password" style="width:80px">		&nbsp;&nbsp;    </p>               <input type="submit" name="submit" value="Sign In" style="position: absolute; left: 105px; "><br><br><br>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		New User? <a href="<?php echo bloginfo('url')?>/register-user/">Sign Up</a></br>		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		Forgot Password? <a href="<?php echo bloginfo('url')?>/forgot_password/">Here</a>   	</form><?php }else{$q_profile= "select first_name,last_name from user where username = '$_SESSION[username]'";$hq_profile= mysql_db_query($DataBase,$q_profile);while(list($first_name,$last_name) = mysql_fetch_row($hq_profile)){echo "</br>";echo "Welcome <b>".$first_name." ".$last_name."</b> &nbsp&nbsp&nbsp";}?></br><a href='<?php echo bloginfo('url')?>/edit-profile/'>Edit Profile</a></br><a href='<?php echo bloginfo('template_url') ?>/logout.php'>Logout</a> || <?php  if($_SESSION[user_type]=='entrepreneur') { ?>  <a href='<?php echo bloginfo('url')?>/entrepreneur_dashboard'>My Dashboard</a> <?php }else{ ?> <a href='<?php echo bloginfo('url')?>/investor_dashboard'>My Dashboard</a> <?php } ?>					<?php }   ?>							</div>
							<?php ;
						endif;
			
						// Lifestream
						if ($panda_he['lifestream'] == 'enable') : ?>
							<div id="hlifestream" class="hmisc fr div-as-table">
								<div>
									<?php
										// SOCIAL NETWORKS
										if ($panda_he['lifestream'] == 'enable') : $icount = 0;
			
											echo '<div id="icons">';
											
												$arr = array(
													'rss',
													'twitter',
													'deviantart',
													'digg',
													'facebook',
													'flickr',
													'lastfm',
													'linkedin',
													'myspace',
													'picasa',
													'reddit',
													'reddit',
													'skype',
													'stumbleupon',
													'technorati',
													'youtube',
													'vimeo',
													'blogger',
													'delicious',
													'designfloat',
													'designmoo'
												);
			
												foreach ($arr as $value) :
			
													if ($panda_he['life_'.$value]) :
			
														echo '<a href="'.$panda_he['life_'.$value].'" target="_blank" rel="nofollow"><img class="tooltip" title="'.$value.'" src="'.get_bloginfo('template_url').'/images/icons/'.$value.'_16.png" alt=""/></a>';
			
													endif;
			
												endforeach;
			
											// Lifestream custom
											if ($panda_he['lifestream_custom']) : echo $panda_he['lifestream_custom']; endif;
			
											echo '</div><!-- end icons -->';
			
										endif;
									?>
								</div>
							</div>
							<?php ;
						endif;
			
						// Custom data on header
						if ($panda_he['hcustom'] == 'enable') : ?>
							<div id="hcustom" class="hmisc fr div-as-table">
								<div>
									<div>
										<?php echo do_shortcode($panda_he['hcustom_data']) ?>
									</div>
								</div>
							</div>
							<?php ;
						endif;
						?>
			
					<div class="clear"><!-- --></div>
			
				</div><!-- end header -->
		
				<div id="menuwrapper">
		
					<?php

					// MAIN MENU
						wp_nav_menu(array(
							'theme_location'	=> 'primary-menu',
							'sort_column'		=> 'menu_order',
							'container_class'	=> 'menubox',
							'menu_class'		=> 'top-menu',
							'echo'				=> true,
							'depth'				=> 0,
							'fallback_cb'		=> 'karina_fallback_menu',
							'context'			=> 'frontend',
							'walker'			=> new kclass_megamenu_walker()
							)
						);

						// Message on the menu bar
						$out = $panda_he['topmessage'] ? '<div id="topmess">' . $panda_he['topmessage'] . '</div>' : '';
						echo $out;

						// Drop-down menu
						wp_nav_menu(array(
							'theme_location' 	=> 'primary-menu',
							'echo'				=> true,
							'container_class'	=> 'selectElement',
							'menu_class'		=> 'dropdown-menu',
							'depth'				=> 0,
							'fallback_cb'		=> 'dropdown_fallback_menu',
							'items_wrap'     	=> '<select id="selectElement"><option value="#">' . __('Select a page &crarr;','pandathemes') . '</option>%3$s</select>',
							'walker'        	=> new Walker_Nav_Menu_Dropdown()
						));

					?>					
					
					<div class="clear"><!-- --></div>
			
				</div>
		
			</div>

			<div id="sub1"><!-- shadow --></div>

			<div id="layout">
		
			<?php
				// SLIDER - CUSTOM POST TYPE
				include(TEMPLATEPATH."/inc/slider/slider.php");
			?>