<?php

	do_action( 'bp_before_profile_loop_content' );

	$ud = get_userdata( bp_displayed_user_id() );

	do_action( 'bp_before_profile_field_content' ); ?>

	<div class="bp-widget wp-profile">

		<h5><?php bp_is_my_profile() ? _e( 'My Profile', 'buddypress' ) : printf( __( "%s's Profile", 'buddypress' ), bp_get_displayed_user_fullname() ); ?></h5>

		<table class="wp-profile-fields">

			<?php

				if ( $ud->display_name ) : ?>

					<tr id="wp_displayname">
						<td class="label"><?php _e( 'Name', 'buddypress' ); ?></td>
						<td class="data"><?php echo $ud->display_name; ?></td>
					</tr><?php

				endif;

				if ( $ud->user_description ) : ?>

					<tr id="wp_desc">
						<td class="label"><?php _e( 'About Me', 'buddypress' ); ?></td>
						<td class="data"><?php echo $ud->user_description; ?></td>
					</tr><?php

				endif;

				if ( $ud->user_url ) : ?>

					<tr id="wp_website">
						<td class="label"><?php _e( 'Website', 'buddypress' ); ?></td>
						<td class="data"><?php echo make_clickable( $ud->user_url ); ?></td>
					</tr><?php

				endif;

				if ( $ud->jabber ) : ?>

					<tr id="wp_jabber">
						<td class="label"><?php _e( 'Jabber', 'buddypress' ); ?></td>
						<td class="data"><?php echo $ud->jabber; ?></td>
					</tr><?php

				endif;

				if ( $ud->aim ) : ?>

					<tr id="wp_aim">
						<td class="label"><?php _e( 'AOL Messenger', 'buddypress' ); ?></td>
						<td class="data"><?php echo $ud->aim; ?></td>
					</tr><?php

				endif;

				if ( $ud->yim ) : ?>

					<tr id="wp_yim">
						<td class="label"><?php _e( 'Yahoo Messenger', 'buddypress' ); ?></td>
						<td class="data"><?php echo $ud->yim; ?></td>
					</tr><?php

				endif;

			?>

		</table>

	</div>

<?php

	do_action( 'bp_after_profile_field_content' );

	do_action( 'bp_profile_field_buttons' );

	do_action( 'bp_after_profile_loop_content' );

?>