<?php

	do_action( 'bp_before_profile_loop_content' );

	if ( bp_has_profile() ) :

		while ( bp_profile_groups() ) : bp_the_profile_group();

			if ( bp_profile_group_has_fields() ) :

				do_action( 'bp_before_profile_field_content' ); ?>
	
				<div class="bp-widget <?php bp_the_profile_group_slug(); ?>">
	
					<h5><?php bp_the_profile_group_name(); ?></h5>
	
					<table class="profile-fields">
	
						<?php

							while ( bp_profile_fields() ) : bp_the_profile_field();

								if ( bp_field_has_data() ) : ?>
		
									<tr<?php bp_field_css_class(); ?>>
		
										<td class="label"><?php bp_the_profile_field_name(); ?></td>
		
										<td class="data"><?php bp_the_profile_field_value(); ?></td>
		
									</tr><?php

								endif;

								do_action( 'bp_profile_field_item' );

							endwhile;

						?>
	
					</table>

				</div>
	
				<?php do_action( 'bp_after_profile_field_content' );
	
			endif;
	
		endwhile;

		do_action( 'bp_profile_field_buttons' );

	endif;

	do_action( 'bp_after_profile_loop_content' );

?>