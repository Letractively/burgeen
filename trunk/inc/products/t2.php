<?php

	// P R O D U C T S   A R C H I V E

		$counter = 1;

		if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();   

			// GET CUSTOM DATA
			$custom = get_post_custom($post->ID);

			$price = $custom['price'][0];
			$price_old = $custom['price_old'][0];

			$button_current = $custom['button_current'][0];
			$button = $custom['button'][0];
			$button_tagline = $custom['button_tagline'][0];
			$button_url = $custom['button_url'][0];
			$direct_url = $custom['direct_url'][0];
			$custom_button = $custom['custom_button'][0];

			$before_button = $custom['before_button'][0];
			$after_button = $custom['after_button'][0];

			$demo_button = ($custom['demo_button'][0]) ? ($custom['demo_button'][0]) : __('Live demo','pandathemes');
			$demo_url = $custom['demo_url'][0];
			$label = $custom['label'][0];

			$desc = $custom['desc'][0];

			$src = ($custom['i1'][0]) ? $custom['i1'][0] : $template_url.'/images/no_photo.gif';


			// DISPLAY ITEM

			if ($counter == 2) :

				$zebra = ' class="t2-prod t2-holder"'; $counter = 1;

			else :

				$zebra = ' class="t2-prod"'; $counter++;

			endif;

			$out = '<div' . $zebra . '>';


				// IMAGE


					$out .= '<div class="fl w600">';

						// For multisite WordPress
						global $blog_id;
						if (isset($blog_id) && $blog_id > 1) {
							$imageParts = explode('/files/', $src);
							if (isset($imageParts[1])) {
								$path = '/blogs.dir/'.$blog_id.'/files/'.$imageParts[1];
							}
						}
	
						// For default WordPress
						else {
							$path = $src;
						}
	
						// Display image
						if ($src) : $out .= '<a class="relative block learn-more-hover" href="'.get_permalink().'"><span>'.__('Learn more &raquo;','pandathemes').'</span><img class="block br3" src="'.$template_url.'/timthumb.php?src='.$path.'&h=auto&w=600&zc=1&q=90&a=t" width="600" alt="'.get_the_title().'" /></a>'; endif;

					$out .= '</div>';


				// RIGTH SIDE

					$out .= '<div class="fr br3 relative pr-bar">';
					
	
						// Title
						$out .= '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
						
						if ($label) : $out .= '<span class="lbl block f11 lh10 t2-lbl">'.$label.'</span> '; endif;


						// Price
						if ($price) :

							$out .= '<div class="t2-price-holder">';

								$out .= '<span class="a">'.$price.'</span>';
			
								if ($price_old) : $out .= '&nbsp; <span class="b"><strike>'.$price_old.'</strike></span>'; endif;

							$out .= '</div>';

						else :

							$out .= '<div class="mb1e"><!-- --></div>';

						endif;

		
						// Short description
						$out .= ($desc) ? '<p>'.$desc.'</p>' : '';
		
		
						// Reviews
						if ($reviews == 'yes') :
		
							if ( get_average_ratings($post->ID) ) :
		
								$out .= '
									<span id="rating-total" class="h20 inline-block" style="background-position:0 -'.get_average_ratings($post->ID).'px;">&nbsp;</span>
									<a class="ntd f11" href="'.get_permalink().'">'.$panda_pr['tab_rews'].'</a>
									<div class="h20"><!-- --></div>
								';
		
							endif;
		
						endif;
		
		
						// Buttons
						$out .= '<div class="t1-button-holder t2-button-holder">';
							if ($demo_url) : $out .= '<a href="' . $template_url . '/go.php?' . $demo_url . '" class="t1-livedemo" target="_blank"><span>' . $demo_button . '</span></a>'; endif;
							$w = ($demo_url) ? '' : ' w100i';
							$out .= '<a href="' . get_permalink() . '" class="t1-details' . $w . '"><span>' . __('Learn more','pandathemes') . '</span></a>';
						$out .= '<div class="clear"><!-- --></div></div>';


					$out .= '</div>';


			$out .= '<div class="clear"><!-- --></div></div><div class="h25"><!-- --></div>';

			echo $out;


		endwhile;
		endif;

		echo '<div class="clear"><!-- --></div>';

?>