<?php

/**
 * BuddyPress - Create Achivement
 */

	get_header( 'buddypress' );

	// GET CUSTOM SIDEBAR
	$sidebar = get_post_meta($post->ID, 'sidebar_value', true); ?>

		<div id="content">

			<div class="padder contentbox wfull">
	
			<form class="achievement-edit-form standard-form" method="post" action="<?php dpa_achievements_permalink(); ?>/<?php echo DPA_SLUG_CREATE ?>">
	
				<h3><?php _e( 'Create Achievement', 'dpa' ); ?> &nbsp;<a class="button" href="<?php dpa_achievements_permalink(); ?>"><?php _e( 'Achievements Directory', 'dpa' ); ?></a></h3>

				<?php do_action( 'dpa_before_create_achievement' ); ?>
	
				<div id="item-nav">

					<div class="item-list-tabs no-ajax" id="achievement-single">

						<ul>

							<?php

								if ( !dpa_is_create_achievement_page() ) : bp_get_options_nav(); endif;

								do_action( 'achievement_options_nav' );

							?>

						</ul>

					</div>

				</div><!-- #item-nav -->
	
				<div class="item-body" id="achievements-create-body">

					<?php

						do_action( 'dpa_before_create_achievement_body' );
	
						if ( bp_is_active( 'groups' ) || is_multisite() && bp_is_active( 'blogs' ) ) :

							echo '<noscript><p>' . __( "Some of the Action options below may not be relevant to the type or event of the Achievement.", 'dpa' ) . '</p></noscript>';

						endif;

						echo '<p>' . __( "After you create the Achievement, you'll be able to choose a picture for it.", 'dpa' ) . '</p>';
		
						do_action( 'template_notices' );
		
						dpa_load_template( array( 'achievements/_addedit.php' ) );
		
						wp_nonce_field( 'achievement-create' );
		
						do_action( 'dpa_after_create_achievement_body' );

					?>
	
				</div><!-- .item-body -->
	
				<?php do_action( 'dpa_after_create_achievement' ); ?>
	
			</form>
	
			</div><!-- end padder contentbox w620 -->

			<div class="clear h40"><!-- --></div>

		</div><!-- #content -->

<?php get_footer( 'buddypress' ); ?>