<?php

/**
 * BuddyPress - Achivements
 */

	get_header( 'buddypress' );

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true);

	do_action( 'dpa_before_directory_achievements_content' ); ?>

		<div id="content">

			<div class="padder contentbox <?php if ($sidebar == 'No sidebar') : echo'wfull'; else : echo'w720'; endif; ?>">
	
			<?php do_action( 'bp_before_directory_groups' ); ?>
	
			<form action="" method="post" id="achievements-directory-form" class="dir-form">
	
				<h3><?php _e( 'Achievements Directory', 'dpa' ) ?><?php if ( dpa_permission_can_user_create() ) : ?> &nbsp;<a class="button" href="<?php dpa_achievements_permalink() ?>/<?php echo DPA_SLUG_CREATE ?>"><?php _e( 'Create an Achievement', 'dpa' ) ?></a><?php endif; ?></h3>
	
				<?php do_action( 'dpa_before_directory_achievements_content' ); ?>
	
				<div id="group-dir-search" class="dir-search" role="search">
	
					<?php dpa_directory_achievements_search_form(); ?>
	
				</div><!-- #group-dir-search -->
	
				<?php do_action( 'template_notices' ); ?>

				<div id="item-nav">

					<div class="item-list-tabs" role="navigation">
	
						<ul>
	
							<li class="selected" id="achievements-all">

								<a href="<?php dpa_achievements_permalink() ?>"><?php printf( __( 'All Achievements <span>%s</span>', 'dpa' ), dpa_get_total_achievement_count() ) ?></a>

							</li>
	
							<?php
	
								if ( is_user_logged_in() && bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>
	
									<li id="achievements-personal">

										<a href="<?php echo bp_loggedin_user_domain() . DPA_SLUG . '/' . DPA_SLUG_MY_ACHIEVEMENTS ?>"><?php printf( __( 'My Achievements <span>%s</span>', 'dpa' ), dpa_get_total_achievement_count_for_user() ) ?></a>

									</li><?php
	
								endif;
	
								do_action( 'dpa_achievements_directory_achievement_types' );
	
							?>

						</ul>
	
					</div><!-- .item-list-tabs -->

				</div>

				<div class="item-list-tabs" id="subnav" role="navigation">

					<ul>

						<?php do_action( 'bp_groups_directory_group_types' ); ?>

						<li id="achievements-order-select" class="last filter">
	
							<?php _e( 'Order By:', 'dpa' ) ?>
							<select>
								<option value="alphabetical"><?php _e( 'Alphabetical', 'dpa' ) ?></option>
								<option value="eventcount"><?php _e( 'Event Count', 'dpa' ) ?></option>
								<option value="newest"><?php _e( 'Newest', 'dpa' ) ?></option>
								<option value="points"><?php _e( 'Points', 'dpa' ) ?></option>
								<?php do_action( 'dpa_achievements_directory_order_options' ) ?>
							</select>

						</li>

					</ul>

				</div>
	
				<div id="achievements-dir-list" class="achievements dir-list">
	
					<?php

						do_action( 'template_notices' );

						dpa_load_template( array( 'achievements/achievements-loop.php' ) );

					?>
	
				</div><!-- #groups-dir-list -->
	
				<?php

					do_action( 'dpa_directory_achievements_content' );
	
					wp_nonce_field( 'directory_achievements', '_wpnonce-achievements-filter' );
	
					do_action( 'dpa_after_directory_achievements_content' );

				?>
	
			</form><!-- #groups-directory-form -->
	
			</div><!-- end padder contentbox w620 -->

				<?php
					// SIDEBAR
					include(TEMPLATEPATH.'/inc/sidebar_buddy.php');
				?>

			<div class="clear"><!-- --></div>

		</div><!-- #content -->

	</div>

	<?php

get_footer( 'buddypress' ); ?>