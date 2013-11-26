<?php if ( !defined( 'ABSPATH' ) ) : exit; endif;

	$panda_ty = get_option('panda_ty');
	$panda_st = get_option('panda_st');

	require_once(TEMPLATEPATH.'/styles/style.php');
	$template_url = get_bloginfo('template_url');

?>
<form action="" enctype="multipart/form-data" method="post" class="themeform">
<input type="hidden" id="panda_ty_action" name="panda_ty_action" value="save">
<div class="icon32" id="icon-themes"><br></div>
<div class="wrap pb14"><h2><?php _e('Theme settings','pandathemes'); ?> / <small><?php _e('Typography','pandathemes'); ?></small> <input type="submit" class="button add-new-h2" value="Update" name="cp_save"/></h2></div>
<input type="hidden" name="tab" value="<?php echo $panda_ty['tab']; ?>" id="input-tab" />

<div class="adminarea">

    <!-- tabs -->
    <ul class="tab-navigation">
		<li><a href="#" title="general"><?php _e('Titles','pandathemes') ?></a></li>
		<li><a href="#" title="ty_content"><?php _e('Content','pandathemes') ?></a></li>
    </ul>
    <div class="clear" style="height:1%; border-top:3px solid #6d6d6d;"></div>

    <div id="tabbed-content">

   <!----------------------------------------------------------------------------
								G E N E R A L   P A G E
	----------------------------------------------------------------------------->
    <div id="general">

		<fieldset class="panda-admin-fieldset"><legend><?php _e('Titles','pandathemes') ?></legend>
		<table><tr>
			<td class="size17">
				<?php _e('Select the group','pandathemes') ?>
			</td>
			<td>

				<input type="radio" value="default" name="titles_font_group" id="default_font_group" <?php if ( ! $panda_ty['titles_font_group'] || $panda_ty['titles_font_group'] == 'default' ) : echo 'checked="checked"'; endif; ?> />
				<label class="label-tab<?php if ( $panda_ty['titles_font_group'] == 'default') : echo ' label-selected'; endif; ?>" for="default_font_group"> <?php _e('System','pandathemes') ?></label>
				
				<input type="radio" value="cufon" name="titles_font_group" id="cufon_font_group" <?php if ( $panda_ty['titles_font_group'] == 'cufon' ) : echo 'checked="checked"'; endif; ?> />
				<label class="label-tab<?php if ( $panda_ty['titles_font_group'] == 'cufon' ) : echo ' label-selected'; endif; ?>" for="cufon_font_group"> <?php _e('Cufon','pandathemes') ?></label>

				<input type="radio" value="google" name="titles_font_group" id="google_font_group" <?php if ( $panda_ty['titles_font_group'] == 'google' ) : echo 'checked="checked"'; endif; ?> />
				<label class="label-tab<?php if ( $panda_ty['titles_font_group'] == 'google' ) : echo ' label-selected'; endif; ?>" for="google_font_group"> <?php _e('Google web fonts','pandathemes') ?></label>

			</td>
		</tr></table>

		<div class="clear h20"><!-- --></div>

		<table class="default_font_group"><tr>
			<td class="size17">
				<span><?php _e('System fonts','pandathemes') ?></span>
			</td>
			<td>
				<select name="titles_font">
					<?php $font = $panda_ty['titles_font']; ?>
					<option value="select" <?php if ( $font == 'select') : echo 'selected'; endif; ?>>- <?php _e('select','pandathemes') ?> -</option>
					<?php
						$arr = array('Lucida Grande','Arial','Tahoma','Verdana','Times New Roman','Georgia');
						foreach ($arr as $value) {
						
							$out = '<option value="'.$value.'"';
								if ( $font == $value ) : $out .= ' selected'; endif;
								$out .= '>';
							$out .= $value;
							$out .= ' &nbsp;</option>';

							echo $out;
						};
					?>
				</select>
				<small><?php _e('A list with the common fonts to all versions of Windows and their Mac equivalents, useful when creating websites.','pandathemes') ?></span></small>
			</td>
		</tr></table>

		<table class="cufon_font_group">
			<tr>
				<td class="size17">
					<span><?php _e('Cufon fonts','pandathemes') ?></span>
				</td>
				<td>
				<div><!-- DO NOT REMOVE THIS DIV -->
					<input type="text" name="cufon_panda" value="<?php echo $panda_ty['cufon_panda'] ?>" class="input input-panda size40 fl" size="40" />
					<input type="text" name="cufon_panda_current" value="<?php echo $panda_ty['cufon_panda_current'] ?>" class="input input-panda-current none size8 fl" size="8" />
					<img class="browse-button" src="<?php echo $template_url ?>/admin/graphics/font_button.gif" alt="Browse">
					<div class="preview-panda">
						<div class="pa-window">
							<div class="pa-wrapper">
								<div class="pa-preview" id="pa-cufon">
									<!-- preview items -->
								</div>
								<div class="pa-list">
									<ol>
										<li alt="Qlassik_TB-cufon.js">Qlassik</li>
										<li alt="ColaborateLight_400.font.js">Colaborate</li>
										<li alt="Sansation_300.font.js">Sansation</li>
										<li alt="GoodDog_400.font.js">GoodDog</li>
										<li alt="Walkway_Bold_400.font.js">Walkway</li>
										<li alt="Marketing_Script_400.font.js">Marketing Script</li>
										<li alt="Daniel_400.font.js">Daniel</li>
										<li alt="Fertigo_Pro_400.font.js">Fertigo</li>
										<li alt="Days_400.font.js">Days</li>
										<li alt="Veggieburger_300.font.js">Veggieburger</li>
									</ol>
								</div>
							</div>
							<div class="pa-controls">
								<input type="button" class="button-primary add-new-h2 apply-button-panda" value="<?php _e('Apply font','pandathemes') ?>" />
								<span class="button add-new-h2 cancel-button-panda"><?php _e('Cancel','pandathemes') ?></span>
							</div>
						</div>
					</div>
				</div><!-- END DIV -->
				<small><?php _e('Cufon is the fast text replacement with canvas and VML - no Flash or images required.','pandathemes') ?></span></small>
				<div class="clear h20"><!-- --></div>
				</td>
			</tr>
			<tr>
				<td class="size17">
					<span><?php _e('Cufon custom font','pandathemes') ?></span>
				</td>
				<td>
					<input type="text" name="cufon_custom" value="<?php echo $panda_ty["cufon_custom"] ?>" class="input size60" id="custom-cufon-input" size="60"  />
					<a class="thickbox button select-image" id="custom-cufon" href="media-upload.php&type=image&TB_iframe=1&width=640&height=469"><?php _e('Browse','pandathemes') ?></a>
					<small>
						<?php _e('NOTE! This input field takes precedence over the previous.','pandathemes') ?><br/>
						<?php _e('You can start to use your own Cufon font at any time. Just put here a full path to your font','pandathemes') ?>
						<?php _e('e.q.','pandathemes') ?> <code>http://yoursite.com/Cufon.font.name.js</code>
					</small>
					<div class="clear h20"><!-- --></div>
				</td>
			</tr>
			<tr>
				<td class="size17">
					<span><?php _e('Cufon classes','pandathemes') ?></span>
				</td>
				<td>
					<input type="text" name="cufon_classes" value="<?php echo $panda_ty["cufon_classes"] ?>" class="input size100" size="80"  />
					<small>
						<?php _e('In case you need to apply Cufon for an additional elements please enter the new classes by comma e.g. <code>.newclass, .onemore, .somethingelse</code>','pandathemes') ?><br/>

					</small>
				</td>
			</tr>
		</table>

		<table class="google_font_group">
			<tr>
				<td class="size17">
					<span><?php _e('Google fonts','pandathemes') ?></span>
				</td>
				<td>
				<div><!-- DO NOT REMOVE THIS DIV -->
					<input type="text" name="google_panda" value="<?php echo $panda_ty['google_panda'] ?>" class="input input-panda size40 fl" size="40" />
					<input type="hidden" name="google_panda_family" value="<?php echo $panda_ty['google_panda_family'] ?>" class="input-panda-data" />
					<input type="text" name="google_panda_current" value="<?php echo $panda_ty['google_panda_current'] ?>" class="input input-panda-current none size8 fl" size="8" />
					<img class="browse-button" src="<?php echo $template_url ?>/admin/graphics/font_button.gif" alt="Browse">
					<div class="preview-panda">
						<div class="pa-window">
							<div class="pa-wrapper">
								<div class="pa-preview" id="pa-google">
									<!-- preview items -->
								</div>
								<div class="pa-list">
									<ol>
										<li alt="Droid+Sans">Droid Sans</li>
										<li alt="Droid+Serif">Droid Serif</li>
										<li alt="Lobster">Lobster</li>
										<li alt="Yanone+Kaffeesatz">Yanone Kaffeesatz</li>
										<li alt="Pacifico">Pacifico</li>
										<li alt="Oswald">Oswald</li>
										<li alt="Copse">Copse</li>
										<li alt="Luckiest+Guy">Luckiest Guy</li>
										<li alt="Wire+One">Wire One</li>
										<li alt="Nunito">Nunito</li>
										<li alt="Philosopher">Philosopher</li>
										<li alt="Neuton">Neuton</li>
										<li alt="Old+Standard+TT">Old Standard TT</li>
										<li alt="Indie+Flower">Indie Flower</li>
										<li alt="Sue+Ellen+Francisco">Sue Ellen Francisco</li>
										<li alt="Carter+One">Carter One</li>
										<li alt="Francois+One">Francois One</li>
										<li alt="News+Cycle">News Cycle</li>
										<li alt="Cuprum">Cuprum</li>
										<li alt="Metrophobic">Metrophobic</li>
									</ol>
								</div>
							</div>
							<div class="pa-controls">
								<input type="button" class="button-primary add-new-h2 apply-button-panda" value="<?php _e('Apply font','pandathemes') ?>" />
								<span class="button add-new-h2 cancel-button-panda"><?php _e('Cancel','pandathemes') ?></span>
							</div>
						</div>
					</div>
				</div><!-- END DIV -->
				<small><?php _e('Google web fonts are web safe fonts, which can be added to your website.','pandathemes') ?></small>
				<div class="clear h20"><!-- --></div>
				</td>
			</tr>
			<tr>
				<td class="size17">
					<span><?php _e('Google font','pandathemes') ?></span>
				</td>
				<td>
					<input type="text" name="google_custom" value="<?php echo stripslashes($panda_ty['google_custom']) ?>" class="input size100" size="80" />
					<small>
						<?php _e('NOTE! This input field takes precedence over the previous.','pandathemes') ?><br/>
						<?php _e('You can start to use another <a target="_blank" href="http://www.google.com/webfonts">Google font</a> at any time. 
						Just put here a codeline of the Google font you would like to use on your website.','pandathemes') ?> 
						<?php _e('e.q.','pandathemes') ?> <code>&lt;link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'></code>
					</small>
					<div class="clear h20"><!-- --></div>
				</td>
			</tr>
			<tr>
				<td class="size17">
					<span><?php _e('Google font family','pandathemes') ?></span>
				</td>
				<td>
					<input type="text" name="google_panda_family_custom" value="<?php echo $panda_ty['google_panda_family_custom'] ?>" class="input size40" size="40" />
					<small>
						<?php _e('In case you have set Google custom font you neet to enter the font family name.','pandathemes') ?>
						<?php _e('e.q.','pandathemes') ?> <code>Droid Serif</code>
					</small>
					<div class="clear h20"><!-- --></div>
				</td>
			</tr>
			<tr>
				<td class="size17">
					<span><?php _e('Google classes','pandathemes') ?></span>
				</td>
				<td>
					<input type="text" name="google_classes" value="<?php echo $panda_ty["google_classes"] ?>" class="input size100" size="80"  />
					<small>
						<?php _e('In case you need to apply Google web font for an additional elements please enter the new classes by comma e.g. <code>.newclass, .onemore, .somethingelse</code>','pandathemes') ?><br/>

					</small>
				</td>
			</tr>
		</table>


		<div class="clear h30"><!-- --></div>


		<table><tr>
			<td class="size17">
				<span style="font-size:<?php if ($panda_ty['h1_size']!='select') {echo $panda_ty['h1_size'];} else {echo '24';} ?>px">H1</span>
			</td>
			<td>
				<div class="color-thumb" id="h1_color_thumb" style="background-color:#<?php if ($panda_ty['h1_color']<>'') {echo $panda_ty['h1_color'];} else {echo 'EEE';} ?>;"><!-- COLOR THUMB --></div>
				<input type="text" name="h1_color" id="h1_color" value="<?php echo $panda_ty['h1_color'] ?>" class="input fl" size="8" /> &nbsp;
				<select name="h1_size">
					<option value="select" <?php if ($panda_ty['h1_size']=='select'):?> selected <?php endif; ?>>- <?php _e('default','pandathemes') ?> -&nbsp;</option>
					<?php
						$arr = array(11,12,13,14,15,16,17,18,20,22,24,26,28,30,36,40,48);
						foreach ($arr as $value) {
							$out = '<option value="'.$value.'"';
							if ($panda_ty['h1_size']==$value) { $out .= ' selected ' ;};
							$out .= '>'.$value.' px</option>';
							echo $out;
						};
					?>
				</select>
				<small><?php _e('Select a color and font size of website title','pandathemes') ?></small>
			</td>
		</tr></table>

		<div class="clear h20"><!-- --></div>

		<table><tr>
			<td class="size17">
				<span style="font-size:<?php if ($panda_ty['h2_size']!='select') {echo $panda_ty['h2_size'];} else {echo '20';} ?>px">H2</span>
			</td>
			<td>
				<div class="color-thumb" id="h2_color_thumb" style="background-color:#<?php if ($panda_ty['h2_color']<>'') {echo $panda_ty['h2_color'];} else {echo 'EEE';} ?>;"><!-- COLOR THUMB --></div>
				<input type="text" name="h2_color" id="h2_color" value="<?php echo $panda_ty['h2_color'] ?>" class="input fl" size="8" /> &nbsp;
				<select name="h2_size">
					<option value="select" <?php if ($panda_ty['h2_size']=='select'):?> selected <?php endif; ?>>- <?php _e('default','pandathemes') ?> -&nbsp;</option>
					<?php
						$arr = array(11,12,13,14,15,16,17,18,20,22,24,26,28,30,36,40,48);
						foreach ($arr as $value) {
							$out = '<option value="'.$value.'"';
							if ($panda_ty['h2_size']==$value) { $out .= ' selected ' ;};
							$out .= '>'.$value.' px</option>';
							echo $out;
						};
					?>
				</select>
				<small><?php _e('Select a color and font size of heading','pandathemes') ?> H2</small>
			</td>
		</tr></table>

		<div class="clear h20"><!-- --></div>

		<table><tr>
			<td class="size17">
				<span style="font-size:<?php if ($panda_ty['h3_size']!='select') {echo $panda_ty['h3_size'];} else {echo '18';} ?>px">H3</span>
			</td>
			<td>
				<div class="color-thumb" id="h3_color_thumb" style="background-color:#<?php if ($panda_ty['h3_color']<>'') {echo $panda_ty['h3_color'];} else {echo 'EEE';} ?>;"><!-- COLOR THUMB --></div>
				<input type="text" name="h3_color" id="h3_color" value="<?php echo $panda_ty['h3_color'] ?>" class="input fl" size="8" /> &nbsp;
				<select name="h3_size">
					<option value="select" <?php if ($panda_ty['h3_size']=='select'):?> selected <?php endif; ?>>- <?php _e('default','pandathemes') ?> -&nbsp;</option>
					<?php
						$arr = array(11,12,13,14,15,16,17,18,20,22,24,26,28,30,36,40,48);
						foreach ($arr as $value) {
							$out = '<option value="'.$value.'"';
							if ($panda_ty['h3_size']==$value) { $out .= ' selected ' ;};
							$out .= '>'.$value.' px</option>';
							echo $out;
						};
					?>
				</select>
				<small><?php _e('Select a color and font size of heading','pandathemes') ?> H3</small>
			</td>
		</tr></table>

		<div class="clear h20"><!-- --></div>

		<table><tr>
			<td class="size17">
				<span style="font-size:<?php if ($panda_ty['h4_size']!='select') {echo $panda_ty['h4_size'];} else {echo '16';} ?>px">H4</span>
			</td>
			<td>
				<div class="color-thumb" id="h4_color_thumb" style="background-color:#<?php if ($panda_ty['h4_color']<>'') {echo $panda_ty['h4_color'];} else {echo 'EEE';} ?>;"><!-- COLOR THUMB --></div>
				<input type="text" name="h4_color" id="h4_color" value="<?php echo $panda_ty['h4_color'] ?>" class="input fl" size="8" /> &nbsp;
				<select name="h4_size">
					<option value="select" <?php if ($panda_ty['h4_size']=='select'):?> selected <?php endif; ?>>- <?php _e('default','pandathemes') ?> -&nbsp;</option>
					<?php
						$arr = array(11,12,13,14,15,16,17,18,20,22,24,26,28,30,36,40,48);
						foreach ($arr as $value) {
							$out = '<option value="'.$value.'"';
							if ($panda_ty['h4_size']==$value) { $out .= ' selected ' ;};
							$out .= '>'.$value.' px</option>';
							echo $out;
						};
					?>
				</select>
				<small><?php _e('Select a color and font size of heading','pandathemes') ?> H4</small>
			</td>
		</tr></table>

		<div class="clear h20"><!-- --></div>

		<table><tr>
			<td class="size17">
				<span style="font-size:<?php if ($panda_ty['h5_size']!='select') {echo $panda_ty['h5_size'];} else {echo '14';} ?>px">H5</span>
			</td>
			<td>
				<div class="color-thumb" id="h5_color_thumb" style="background-color:#<?php if ($panda_ty['h5_color']<>'') {echo $panda_ty['h5_color'];} else {echo 'EEE';} ?>;"><!-- COLOR THUMB --></div>
				<input type="text" name="h5_color" id="h5_color" value="<?php echo $panda_ty['h5_color'] ?>" class="input fl" size="8" /> &nbsp;
				<select name="h5_size">
					<option value="select" <?php if ($panda_ty['h5_size']=='select'):?> selected <?php endif; ?>>- <?php _e('default','pandathemes') ?> -&nbsp;</option>
					<?php
						$arr = array(11,12,13,14,15,16,17,18,20,22,24,26,28,30,36,40,48);
						foreach ($arr as $value) {
							$out = '<option value="'.$value.'"';
							if ($panda_ty['h5_size']==$value) { $out .= ' selected ' ;};
							$out .= '>'.$value.' px</option>';
							echo $out;
						};
					?>
				</select>
				<small><?php _e('Select a color and font size of heading','pandathemes') ?> H5</small>
			</td>
		</tr></table>

		<div class="clear h20"><!-- --></div>

		<table><tr>
			<td class="size17">
				<span style="font-size:<?php if ($panda_ty['h6_size']!='select') {echo $panda_ty['h6_size'];} else {echo '13';} ?>px">H6</span>
			</td>
			<td>
				<div class="color-thumb" id="h6_color_thumb" style="background-color:#<?php if ($panda_ty['h6_color']<>'') {echo $panda_ty['h6_color'];} else {echo 'EEE';} ?>;"><!-- COLOR THUMB --></div>
				<input type="text" name="h6_color" id="h6_color" value="<?php echo $panda_ty['h6_color'] ?>" class="input fl" size="8" /> &nbsp;
				<select name="h6_size">
					<option value="select" <?php if ($panda_ty['h6_size']=='select'):?> selected <?php endif; ?>>- <?php _e('default','pandathemes') ?> -&nbsp;</option>
					<?php
						$arr = array(11,12,13,14,15,16,17,18,20,22,24,26,28,30,36,40,48);
						foreach ($arr as $value) {
							$out = '<option value="'.$value.'"';
							if ($panda_ty['h6_size']==$value) { $out .= ' selected ' ;};
							$out .= '>'.$value.' px</option>';
							echo $out;
						};
					?>
				</select>
				<small><?php _e('Select a color and font size of heading','pandathemes') ?> H6</small>
			</td>
		</tr></table>

		</fieldset>

   	</div><!-- end General -->


   <!----------------------------------------------------------------------------
								C O N T E N T   P A G E
	----------------------------------------------------------------------------->
    <div id="ty_content">

		<fieldset class="panda-admin-fieldset"><legend><?php _e('Content','pandathemes') ?></legend>
		<table><tr>
			<td class="size17">
				<span><?php _e('Font family','pandathemes') ?></span>
			</td>
			<td>
				<select name="font" class="fl">
					<?php $font = $panda_ty['font']; ?>
					<option value="select" <?php if ( $font == 'select') : echo 'selected'; endif; ?>>- <?php _e('select','pandathemes') ?> -</option>
					<?php
						$arr = array('Lucida Grande','Arial','Tahoma','Verdana','Times New Roman','Georgia');
						foreach ($arr as $value) {
						
							$out = '<option value="'.$value.'"';
								if ( $font == $value ) : $out .= ' selected'; endif;
								$out .= '>';
							$out .= $value;
							$out .= ' &nbsp;</option>';

							echo $out;
						};
					?>
				</select> &nbsp;
				<select name="font_size">
					<option value="select" <?php if ($panda_ty['font_size']=='select'):?> selected <?php endif; ?>>- <?php _e('default','pandathemes') ?> -&nbsp;</option>
					<?php
						$arr = array(10,11,12,13,14,15,16,17,18);
						foreach ($arr as $value) {
							$out = '<option value="'.$value.'"';
							if ($panda_ty['font_size']==$value) { $out .= ' selected ' ;};
							$out .= '>'.$value.' px</option>';
							echo $out;
						};
					?>
				</select>
				<small><?php _e('Select a common font family and font size.','pandathemes') ?></small>
			</td>
		</tr></table>

		<div class="clear h20"><!-- --></div>

		<table><tr>
			<td class="size17">
				<span><?php _e('Links','pandathemes') ?></span>
			</td>
			<td>
				<div class="color-thumb" id="links_color_thumb" style="background-color:#<?php if ($panda_ty['links_color']<>'') {echo $panda_ty['links_color'];} else {echo 'EEE';} ?>;"><!-- COLOR THUMB --></div>
				<input type="text" name="links_color" id="links_color" value="<?php echo $panda_ty['links_color'] ?>" class="input" size="8" />
				<small><?php _e('Select a color of links.','pandathemes') ?></small>
			</td>
		</tr></table>

		<div class="clear h20"><!-- --></div>

		<table><tr>
			<td class="size17">
				<span><?php _e('Links by hover','pandathemes') ?></span>
			</td>
			<td>
				<div class="color-thumb" id="links_hover_color_thumb" style="background-color:#<?php if ($panda_ty['links_hover_color']<>'') {echo $panda_ty['links_hover_color'];} else {echo 'EEE';} ?>;"><!-- COLOR THUMB --></div>
				<input type="text" name="links_hover_color" id="links_hover_color" value="<?php echo $panda_ty['links_hover_color'] ?>" class="input" size="8" />
				<small><?php _e('Select a color of links by hover.','pandathemes') ?></small>
			</td>
		</tr></table>
		</fieldset>

   	</div><!-- end Content -->

</div>               
<p class="submit align-center update-settings" style="display:none;"><input type="submit" class="button-primary" value="<?php _e('Update settings','pandathemes') ?>" name="cp_save"/></p>
</div><!-- end adminarea -->
</form>