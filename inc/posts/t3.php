<div class="item it3">

	<?php
	
	// T H U M B N A I L

		// Dimentions
		$w = '560';
		$h = $theme_options['square_thumbs']=='enable' ? $w : '280';
		$a = $theme_options['thumbs_crop_top']=='enable' ? '&a=t' : '';

		// Check featured image from URL
		$feat_img = get_post_meta($post->ID, 'feat_img_value', true);

		if ($feat_img) :

			$src = $feat_img;
			$path = $src;

		else :

			// Get image source
			$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'Full Size');
			$src = ($src) ? $src[0] : '';
	
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
			};

		endif;

			// Display image
			if ($src) : $out = '<a class="relative block learn-more-hover" href="' . get_permalink($post->ID) . '"><span>'.__('Learn more &raquo;','pandathemes').'</span><img class="t3" src="' . get_bloginfo('template_url') . '/timthumb.php?src=' . $path . '&amp;h=' . $h . '&amp;w=' . $w . '&amp;zc=1&amp;q=90'. $a . '" width="' . $w . '" alt="' . get_the_title($post->ID) . '" /></a>'; else : $out = ''; endif;
		
		echo $out;

	?>

	<div class="t3-right fr">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php edit_post_link( __( 'edit','pandathemes' ), '<span class="f13"> - ', '</span>' ) ?></h3>
		<?php echo '<p>'.get_the_excerpt().'<span class="btwrap"><a class="button" href="'.get_permalink().'"><span>'.__( 'Read More','pandathemes' ).'</span></a></span></p>';?>
	</div>

	<?php	// METAS
	if ($theme_options['post_metas']=='enable') : ?>
		<div class="t3-left fl">
			<div class="l">
				<span class="ico tim"><?php the_time( get_option('date_format') ); ?></span>
					<?php	// COMMENTS
					if ($theme_options['post_comments']=='enable') : ?>
						<span class="ico com"><?php comments_popup_link(__('Leave a reply','pandathemes'), __('1 Comment','pandathemes'), __('% Comments','pandathemes')); ?></span>
						<?php
					endif; ?>
				<span class="ico cat"><?php the_category(', ') ?></span>
			</div>
			<div class="m"><?php the_tags('<span class="ico tag"> ', ', ', '</span>'); ?></div>
		</div>
		<?php
	endif; ?>

	<div class="clear" style="height:35px;"><!-- --></div>
</div><!-- end item -->