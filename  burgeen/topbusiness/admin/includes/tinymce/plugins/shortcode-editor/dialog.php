<html xmlns="http://www.w3.org/1999/xhtml">

<?php

	define('DOING_AJAX', true);

	require_once('../../../../../../../../wp-load.php');

	$sc = array (

		// NAVIGATION
		'Navigation' => array(

			'button' => array(
				'alt'			=> __('B U T T O N  :  A buttons with any color and any size. Borders can be rounded by your choice.','pandathemes'),
				'attributes'	=> array(
					'url'			=> __('Target URL e.g. http://google.com','pandathemes'),
					'bg'			=> __('Background color e.g. 336699','pandathemes'),
					'bg_hover'		=> __('Background color by hover e.g. 000000','pandathemes'),
					'color'			=> __('Text color e.g. FFFFFF','pandathemes'),
					'color_hover'	=> __('Text color by hover e.g. CCCCCC','pandathemes'),
					'size'			=> __('Font size in pixels e.g. 16','pandathemes'),
					'radius'		=> __('Border radius in pixels e.g. 5','pandathemes'),
					'tooltip'		=> __('Tooltip e.g. Hello World!','pandathemes'),
					'target'		=> __('Target window e.g. blank','pandathemes')
				)
			),

			'bbutton' => array(
				'alt'			=> __('B I G   B U T T O N  :  A buttons with the specified colors and taglines.','pandathemes'),
				'attributes'	=> array(
					'url'			=> __('Target URL e.g. http://google.com','pandathemes'),
					'bg'			=> __('Background color e.g. 336699','pandathemes'),
					'tooltip'		=> __('Tooltip e.g. Hello World!','pandathemes'),
					'target'		=> __('Target window e.g. blank','pandathemes')
				)
			),

			'toggle' => array(
				'alt'			=> __('T O G G L E  :  Allows you to hide the part of content with toggle.','pandathemes'),
				'attributes'	=> array(
					'title'			=> __('Toggle title e.g. Click me!','pandathemes'),
					'status'		=> __('Status by loading e.g. open','pandathemes'),
					'style'			=> __('Toggle style e.g. 2 (by default: 1)','pandathemes')
				)
			)

		),

		// FEATURED
		'Featured' => array(

			'fieldset' => array(
				'alt'			=> __('F I E L D S E T  :  Allows to highlight selected content.','pandathemes'),
				'attributes'	=> array(
					'w'				=> __('Width e.g. 200px, 50%, 7em etc.','pandathemes'),
					'h'				=> __('Height e.g. 200px','pandathemes'),
					'm'				=> __('Margin by left & right sides e.g. 25px, 5%, 3em etc.','pandathemes'),
					'align'			=> __('Align e.g. left -or- right -or- center','pandathemes'),
					'text'			=> __('Text align inside the fieldset e.g. left -or- right -or- center','pandathemes'),
					'legend'		=> __('Legend e.g. Take a look!','pandathemes'),
					'icon'			=> __('An icon before legend e.g. asterisk_orange.png Another 250+ icons you will find on website http://topbusiness.pandathemes.com/shortcodes/icons/','pandathemes')
				)
			),
	
			'pbox' => array(
				'alt'			=> __('P R I C I N G   B O X  :  A stylish pricing boxes.','pandathemes'),
				'attributes'	=> array(
					'w'				=> __('Width e.g. 200px, 50%, 7em etc.','pandathemes'),
					'h'				=> __('Height e.g. 200 (numbers only)','pandathemes'),
					'm'				=> __('Margin by left & right sides in pixels e.g. 25','pandathemes'),
					'align'			=> __('Align e.g. left -or- right -or- center','pandathemes'),
					'bg'			=> __('Background color e.g. 336699','pandathemes'),
					'title'			=> __('The title of pricing box e.g. Product Name','pandathemes'),
					'price'			=> __('The title of pricing box e.g. 35 USD  -or-  <strong>9.95</strong> usd <small>/ month</small>  -or-  <sup>$</sup> <strong>9.95</strong> <small>/ mo.</small>','pandathemes'),
					'button'		=> __('Text button e.g. Buy Now (be default: Purchase)','pandathemes'),
					'tagline'		=> __('The button tagline e.g. Product Name (by default: The title of pricing box)','pandathemes'),
					'url'			=> __('Target URL e.g. http://google.com','pandathemes')
				)
			),
	
			'note' => array(
				'alt'			=> __('N O T E  :  Alarms & important messages.','pandathemes'),
				'attributes'	=> array(
					'type'			=> __('The kind of note e.g. alert, tip, pin, help, flag, no, yes (by default: pin)','pandathemes')
				)
			),
	
			'marker' => array(
				'alt'			=> __('M A R K E R  :  Allows to highlight selected text.','pandathemes'),
				'attributes'	=> array(
					'color'			=> __('Marker color e.g. #BEDB00, yellow, blue, green, gray, orange etc.','pandathemes')
				)
			)

		),

		// TYPOGRAPHY
		'Typography' => array(

			'quote' => array(
				'alt'			=> __('Q U O T E  :  Blockquote with authors name, tagline and photo.','pandathemes'),
				'attributes'	=> array(
					'w'				=> __('Width by pixels e.g. 200','pandathemes'),
					'm'				=> __('Margin by left & right sides in pixels e.g. 25','pandathemes'),
					'bg'			=> __('Background color e.g. 336699','pandathemes'),
					'color'			=> __('Text color e.g. FFFFFF','pandathemes'),
					'align'			=> __('Align e.g. left -or- right -or- center','pandathemes'),
					'cite'			=> __('Blockquote author e.g. John Doe','pandathemes'),
					'subcite'		=> __('Tagline e.g. CEO, Company Name','pandathemes'),
					'pic'			=> __('Userpic from library by ID e.g. 1, 2, 3 , 4 , 5 , 6 or 7','pandathemes'),
					'src'			=> __('Custom userpic from selected image e.g. http://yoursite.com/image.jpg','pandathemes')
				)
			),
	
			'dropcap' => array(
				'alt'			=> __('D R O P C A P  :  A first letter as drop cap.','pandathemes'),
				'attributes'	=> array(
					'size'			=> __('Font size in pixels e.g. 48','pandathemes'),
					'bg'			=> __('Background color e.g. 336699','pandathemes'),
					'color'			=> __('Text color e.g. FFFFFF','pandathemes')
				)
			)

		),

		// DESIGN
		'Design' => array(

			'sidebar' => array(
				'alt'			=> __('S I D E B A R  :  Any sidebar on any place of page.','pandathemes'),
				'attributes'	=> array(
					'w'				=> __('Width e.g. 200px, 50%, 7em etc.','pandathemes'),
					'm'				=> __('Margin by left & right sides in pixels e.g. 25','pandathemes'),
					'align'			=> __('Align e.g. left -or- right -or- center','pandathemes'),
					'name'			=> __('Sidebar name e.g. Side 1','pandathemes')
				)
			),
	
			'divider' => array(
				'alt'			=> __('D I V I D E R  :  Horizontal divider.','pandathemes'),
				'attributes'	=> ''
			),
	
			'line' => array(
				'alt'			=> __('L I N E  :  Horizontal line.','pandathemes'),
				'attributes'	=> ''
			),
	
			'icon' => array(
				'alt'			=> __('I C O N  :  Allows to attach the 16px icon to any text.','pandathemes'),
				'attributes'	=> array(
					'name'			=> __('Icons name e.g. accept.png Another 250+ icons you will find on website http://topbusiness.pandathemes.com/shortcodes/icons/','pandathemes'),
					'src'			=> __('Custom icon e.g. http://yoursite.com/icon.png','pandathemes'),
					'url'			=> __('Target URL e.g. http://google.com','pandathemes'),
					'target'		=> __('Target window e.g. blank','pandathemes'),
					'tooltip'		=> __('Tooltip e.g. Hello World!','pandathemes')
				)
			),

			'email' => array(
				'alt'			=> __('E M A I L  :  An advanced mailto link.','pandathemes'),
				'attributes'	=> array(
					'to'			=> __('Target email address e.g. mailbox@website.tld','pandathemes'),
					'name'			=> __('Icons name e.g. accept.png Another 250+ icons you will find on website http://topbusiness.pandathemes.com/shortcodes/icons/','pandathemes'),
					'src'			=> __('Custom icon e.g. http://yoursite.com/icon.png','pandathemes'),
					'tooltip'		=> __('Tooltip e.g. Hello World!','pandathemes')
				)
			),

			'icon60' => array(
				'alt'			=> __('I C O N  6 0  :  An animated 32px icon with text.','pandathemes'),
				'attributes'	=> array(
					'w'				=> __('Width e.g. 200px, 50%, 7em etc.','pandathemes'),
					'm'				=> __('Margins e.g. 10px','pandathemes'),
					'size'			=> __('Font size in pixels e.g. 24. By default is 16.','pandathemes'),
					'ico'			=> __('Icons ID (1-28) e.g. 5. Take a look icons at http://topbusiness.pandathemes.com/shortcodes/icon60/','pandathemes'),
					'src'			=> __('Custom icon e.g. http://yoursite.com/icon.png','pandathemes'),
					'url'			=> __('Target URL e.g. http://google.com','pandathemes'),
					'target'		=> __('Target window e.g. blank','pandathemes'),
					'bg'			=> __('Background of placeholder','pandathemes'),
					'bg_hover'		=> __('Background of placeholder by mouse hover','pandathemes'),
					'color'			=> __('Text color','pandathemes'),
					'color_hover'	=> __('Text color by mouse hover','pandathemes'),
					'bg_ico'		=> __('Background of icon','pandathemes'),
					'bg_ico_hover'	=> __('Background of icon by mouse hover','pandathemes'),
					'class'			=> __('Custom class of link wrapper','pandathemes')
				)
			)

		),

		// CONTENT
		'Content' => array(

			'posts' => array(
				'alt'			=> __('P O S T S  :  A recent & related posts with thumbnails & metas. Custom size & crop area of thumbs. List & grid views. Unlimited times per page.','pandathemes'),
				'attributes'	=> array(
					'w'				=> __('Width e.g. 200px, 50%, 9em etc.','pandathemes'),
					'm'				=> __('Margins by left & right sides in pixels e.g. 25','pandathemes'),
					'align'			=> __('Alignment e.g. left -or- right -or- center','pandathemes'),
					'grid'			=> __('Grid view. Set the number of columns e.g. 3 (Default: NULL, same as list view)','pandathemes'),
					'type'			=> __('Posts type e.g. recent -or- related','pandathemes'),
					'cat'			=> __('Posts categories by comma e.g. 9,1,20 etc.','pandathemes'),
					'qty'			=> __('Posts quantity e.g. 5','pandathemes'),
					'orderby'		=> __('Sort retrieved posts by parameter e.g. date, rand, ID, title, modified, comment_count, menu_order','pandathemes'),
					'order'			=> __('Designates the ascending or descending order e.g. DESC -or- ASC','pandathemes'),
					'title'			=> __('Post titles enabled e.g. yes -or- no','pandathemes'),
					'titletag'		=> __('Post titles tag e.g. h3, h4, strong etc.','pandathemes'),
					'date'			=> __('Post date enabled e.g. yes (Default: NULL), (Disabled)','pandathemes'),
					'postedin'		=> __('Post categories e.g. yes (Default: NULL), (Disabled)','pandathemes'),
					'tags'			=> __('Post tags e.g. yes (Default: NULL), (Disabled)','pandathemes'),
					'comments'		=> __('Post comments counter e.g. yes (Default: NULL), (Disabled)','pandathemes'),
					'excerpt'		=> __('Post excerpt e.g. yes (Default: NULL), (Disabled)','pandathemes'),
					't'				=> __('Post thumbnail & thumb alignment e.g. left -or- right -or- center. (Default: none)','pandathemes'),
					'tw'			=> __('Thumbnail width in pixels e.g. 150 (Default: 100)','pandathemes'),
					'th'			=> __('Thumbnail height in pixels e.g. 150 (Default: 100)','pandathemes'),
					'crop'			=> __('Thumbnail crop area e.g. top (Default: NULL, same as by center)','pandathemes'),
					'button'		=> __('Read More button e.g. no -or- Learn More, Details etc. (Default: Read More), (Enabled). This parameter has two destinations: A) Button will be displayed in case the button attribute is not no. B) Button text.','pandathemes'),
					'offset'		=> __('Number of post to displace or pass over e.g. 1 (Default: 0)','pandathemes')
				)
			),
	
			'posts2' => array(
				'alt'			=> __('P O S T S #2  :  A recent posts as slider with thumbnails & metas. Custom size & crop area of thumbs. Different transitions. Autoplay. Autoheight. Unlimited times per page.','pandathemes'),
				'attributes'	=> array(
					'w'				=> __('Width in pixels e.g. 600 (Default: 560)','pandathemes'),
					'cat'			=> __('Posts categories by comma e.g. 9,1,20 etc.','pandathemes'),
					'qty'			=> __('Posts quantity e.g. 5','pandathemes'),
					'orderby'		=> __('Sort retrieved posts by parameter e.g. date, rand, ID, title, modified, comment_count, menu_order','pandathemes'),
					'order'			=> __('Designates the ascending or descending order e.g. DESC -or- ASC','pandathemes'),
					'titletag'		=> __('Post titles tag e.g. h3, h4, strong etc.','pandathemes'),
					'crop'			=> __('Thumbnails crop area e.g. top (Default: NULL, same as by center)','pandathemes'),
					't'				=> __('Post thumbnail & thumb alignment e.g. right (Default: left)','pandathemes'),
					'float'			=> __('Sliders floating e.g. left -or- right (Default: NULL, same as none)','pandathemes'),
					'date'			=> __('Post date enabled e.g. no (Default: NULL), (Enabled)','pandathemes'),
					'excerpt'		=> __('Post excerpt e.g. no (Default: NULL), (Enabled)','pandathemes'),
					'button'		=> __('Read More button e.g. no -or- Learn More, Details etc. (Default: Read More), (Enabled). This parameter has two destinations: A) Button will be displayed in case the button attribute is not no. B) Button text.','pandathemes'),
					'transition'	=> __('Kind of transition e.g. ptd (no transition), ptf (fade), ptfv (fade vertical), ptv (slide vertical), pth (slide horizontal), pto (overlay vertical), (Default: ptf)','pandathemes'),
					'autoplay'		=> __('Autoplay in seconds e.g. 5 (Default: NULL), (Disabled)','pandathemes'),
					'offset'		=> __('Number of post to displace or pass over e.g. 1 (Default: 0)','pandathemes')
				)
			),
	
			'products' => array(
				'alt'			=> __('P R O D U C T S  :  A list of products. Grid view.','pandathemes'),
				'attributes'	=> array(
					'qty'			=> __('Products quantity e.g. 8 (Default: 4)','pandathemes'),
					'orderby'		=> __('Sort retrieved posts by parameter e.g. date, rand, ID, title, modified, comment_count, menu_order','pandathemes'),
					'order'			=> __('Designates the ascending or descending order e.g. DESC -or- ASC','pandathemes')
				)
			),
	
			'img' => array(
				'alt'			=> __('I M G  :  Short way to insert large image without manual resizing. Automatic resize. Automatic lightbox. Crop selection. Caption allowed. Unlimited times per page.','pandathemes'),
				'attributes'	=> array(
					'src'			=> __('Image source e.g. http://yoursite.com/image.jpg','pandathemes'),
					'w'				=> __('Width in pixels e.g. 200 (Default: 100)','pandathemes'),
					'h'				=> __('Height in pixels e.g. 200 (Default: 100)','pandathemes'),
					'crop'			=> __('Crop area e.g. top (Default: NULL, same as by center)','pandathemes'),
					'title'			=> __('Image title e.g. My cat Tomas','pandathemes'),
					'alt'			=> __('Alternative text (caption) e.g. It likes to sleep on my desk.','pandathemes'),
					'align'			=> __('Alignment e.g. left -or- right -or- center','pandathemes')
				)
			),
	
			'hidden' => array(
				'alt'			=> __('H I D D E N  :  A part of content available for registered visitors only.','pandathemes'),
				'attributes'	=> ''
			),
	
			'visible' => array(
				'alt'			=> __('V I S I B L E  :  A part of content available for non-logged visitors only.','pandathemes'),
				'attributes'	=> ''
			)

		),

		// MISC
		'Misc' => array(

			'pages' => array(
				'alt'			=> __('P A G E S  :  A list of pages','pandathemes'),
				'attributes'	=> array(
					'exclude'			=> __('Exclude pages selected by IDs e.g. 9,40,1,51','pandathemes'),
					'include'			=> __('Display pages only selected by IDs e.g. 9,40,1,51','pandathemes')
				)
			),
	
			'categories' => array(
				'alt'			=> __('C A T E G O R I E S  :  A list of categories','pandathemes'),
				'attributes'	=> array(
					'exclude'			=> __('Exclude categories selected by IDs e.g. 9,40,1,51','pandathemes'),
					'include'			=> __('Display categories only selected by IDs e.g. 9,40,1,51','pandathemes')
				)
			),
	
			'archives' => array(
				'alt'			=> __('A R C H I V E S  :  A list of archives.','pandathemes'),
				'attributes'	=> ''
			),
	
			'tweet' => array(
				'alt'			=> __('T W E E T  :  Twitter button.','pandathemes'),
				'attributes'	=> ''
			),
	
			'like' => array(
				'alt'			=> __('L I K E  :  Facebook LIKE button.','pandathemes'),
				'attributes'	=> ''
			),

			'clear' => array(
				'alt'			=> __('C L E A R  :  Preventing of floating. Custom vertical space.','pandathemes'),
				'attributes'	=> array(
					'h'				=> __('Custom height in pixels e.g. 25','pandathemes')
				)
			)

		)

	);

?>

	<head>

		<title><?php _e('Insert or Edit Shortcode','pandathemes') ?></title>
	
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
		
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/jquery/jquery.js"></script>
		<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>

		<script language="javascript" type="text/javascript">
			tinyMCE.addI18n("en.shortcode_editor", {
				insert : 'Insert',
				update: 'Update'
			});
		</script>

		<script language="javascript" type="text/javascript">

			var jq = jQuery.noConflict();

				jq.selectFirstOption = function(){

					// HELP
					jq('#helplink').click(function(){
						jq('#help').css({top:0, opacity: 0}).animate({opacity: 1},250);
						return false;
					});

					jq('#ok_button').click(function(){
						jq('#help').css({top:0}).animate({top:-310},500);
						return false;
					});

					// TABS
					jq('.kul li').each(function(){
						
						jq(this).click(function(){
	
							var li = jq(this);
				
								li.parent().children('.kcurrent').removeClass('kcurrent');
								li.addClass('kcurrent');
				
							var liIndex = li.prevAll().length;
							var ktabs = li.parent().next('.ktabs');
				
								ktabs.children('.block').removeClass('block');
								ktabs.children().eq(liIndex).addClass('block');
				
						})
				
					});

					// add and select the empty list
					jq('<option disabled="disabled">select</option>').prependTo('#gse_new_prop_name');
					jq('#gse_new_prop_name option:first').attr('selected','selected');
				}

				jq.addOptionToDom = function(value){
					var cclass, option = jq('#gse_new_prop_name option').remove();
						
					if(value){
						if(value == 'auto') 
							value = document.getElementById('gse_tag').value;
						else 
							removeAllSelectedOptions('gse_properties');
						
						document.getElementById('gse_remove_prop').disabled = true;
						
						// added to dom
						
						jq.each(option, function(i,v){
							if(jq(v).is('.option-'+value)){
								jq(v).appendTo('#gse_new_prop_name');
							}
						});
						jq.selectFirstOption();
						
					} else {
						jq.selectFirstOption();
						
						jq('#gse_tag').live('change',function(){ 
							cclass = jq(this).val();
							
							// plugin specific
							removeAllSelectedOptions('gse_properties');
							document.getElementById('gse_remove_prop').disabled = true;
							
							// remove all from dom
							jq('#gse_new_prop_name option').remove();
							
							// added to dom
							jq.each(option, function(i,v){
								if(jq(v).is('.option-'+cclass)){
									jq(v).appendTo('#gse_new_prop_name');
								}
							});
							jq.selectFirstOption();
							
						});	
					}
				
				}


			window.onload = function() {

				jq('form:eq(0)').live('submit',function() {

					//tinyMCEPopup.execCommand('mceInsertContent', true, makeShortcode());
					
					var shortcodeToAdd =  makeShortcode();
					tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodeToAdd);
					
					tinyMCEPopup.close();

					return false;

				});

				document.getElementById('gse_new_prop_name').onkeydown = document.getElementById('gse_new_prop_value').onkeydown = function(e) {

						if ( (e.keyCode ? e.keyCode : e.charCode) == 13 ) { 

							if ( document.getElementById('gse_npn_label').style.display == 'none' ) updateProperty(); 

							else addProperty(); 

							return false; 

						}

				};

				jq('#gse_new_prop_add').live('click',function(e) {

					addProperty();

				});

				jq('#shortcode_close').live('click',function() {

					tinyMCEPopup.close();

				});

				jq('#gse_properties').live('change',function() {

					checkProperty();

				});

				jq('#gse_uncheck_prop').live('click',function(e) {

					uncheckProperties();

				});

				jq('#gse_remove_prop').live('click',function(e) {

					removeProperties();

					uncheckProperties();

				});
				
				var
					scont = tinyMCEPopup.editor.selection.getContent(),
					tager = parent.gse_shortcode_er;
					
					// if IE use selection from parameter url
					if(jq.browser.msie) {
						var IEselection = unescape(location.search.substr(1).split(";")[0].split('=')[1].split('&')[0]);
							scont = IEselection;
					}
					// console.log(IEselection);
						
					if ( scont ) {

						var test = tager.exec(scont); // the test works fine only one in each two times, why?

						if ( !test ) test = tager.exec(scont); // this fixes the problem, but not explains ...

						if ( test ) {

							var
								tag = test[1],
								props = test[2] || '',
								cont = test[4] || '',
								b = document.getElementById('shortcode_submit');
							
							jq.addOptionToDom(tag);
							selectOption('gse_tag', tag);

							setProperties(props);
							
							jq('#gse_content').html(cont);

							b.value = tinyMCEPopup.getLang('shortcode_editor.update');

							b.disabled = false;

							document.getElementById('gse_tag').disabled = true; // shortcode tag is not editable
							
						} 
					} else {	
						
						jq.addOptionToDom();
							
					}

				document.getElementById('gse_tag').focus();

			};


			
			function setProperties(props) {

				var parts = props.split(/\"/), p = [];

				for ( var i = 0; i < parts.length; i += 2 ) {

					var n = parts[i].replace(/^\s+|\s+$/g, '').replace('=', ''), v = parts[i+1];

					if ( n == 'sc_id' ) document.getElementById(n).value = v;

					else if ( n && v ) addOption('gse_properties', n+': '+v, n+'='+v);

				}

			}



			function uncheckProperties() {
				
				jq.addOptionToDom('auto');
				
				selectOption('gse_properties', '', true);

				document.getElementById('gse_new_prop_name').value = document.getElementById('gse_new_prop_value').value = '';

				document.getElementById('gse_remove_prop').disabled = document.getElementById('gse_uncheck_prop').disabled = true;

				document.getElementById('gse_npa_label').style.display = 'none'; 

				document.getElementById('gse_npn_label').style.display = 'inline'; 
				
				jq('#gse_new_prop_add').die('click');
				
				jq('#gse_new_prop_add').live('click' ,function() { addProperty(); }); 

				document.getElementById('gse_new_prop_name').focus();

			}



			function addProperty() {

				var
					n = document.getElementById('gse_new_prop_name'),
					v = document.getElementById('gse_new_prop_value');

				if ( !n.value ) return n.focus();

				if ( !v.value ) return v.focus();

				addOption('gse_properties', n.value+': '+v.value, n.value+'='+v.value);

				n.value = v.value = '';

					n.focus();

			}



			function updateProperty() {

				var
					n = document.getElementById('gse_new_prop_name'),
					v = document.getElementById('gse_new_prop_value'),
					sel = document.getElementById('gse_properties');

				if ( !n.value ) return n.focus();

				if ( !v.value ) return v.focus();

				sel.options[sel.selectedIndex].innerHTML = n.value+': '+v.value;

				sel.options[sel.selectedIndex].value = n.value+'='+v.value;

				uncheckProperties();

			}



			function removeProperties() {

				removeSelectedOptions('gse_properties');

				document.getElementById('gse_remove_prop').disabled = true;

			}



			// Select a tag
			function setTag() {

				document.getElementById('shortcode_submit').disabled = document.getElementById('gse_tag').selectedIndex == 0;

			}



			function checkProperty() {

				var
					sel = document.getElementById('gse_properties'),
					selected = sel.selectedIndex;

				document.getElementById('gse_remove_prop').disabled = document.getElementById('gse_uncheck_prop').disabled = (selected == -1);

					if ( selected > -1 ) {

						var pair = sel.options[selected].value.split('=');

						document.getElementById('gse_new_prop_name').value = pair[0]; 

						document.getElementById('gse_new_prop_value').value = pair[1];

						document.getElementById('gse_npa_label').style.display = 'inline'; 

						document.getElementById('gse_npn_label').style.display = 'none'; 
						
						jq('#gse_new_prop_add').die('click');
						
						jq('#gse_new_prop_add').live('click' ,function() { updateProperty(); }); 

					}

			}



			function addOption(sid, label, val) {

				var
					sel = document.getElementById(sid),
					opt = document.createElement('option');

				opt.text = label;

				opt.value = val;

				try { sel.add(opt, null); }

				catch(e) { sel.add(opt); } // IE only

			}



			function removeSelectedOptions(sid) {

				var sel = document.getElementById(sid);

				for ( var i = sel.length - 1; i >= 0; i-- ) {

					if ( sel.options[i].selected ) sel.remove(i);

				}
			}
			
			
			function removeAllSelectedOptions(sid) {

				var sel = document.getElementById(sid);

				for ( var i = sel.length - 1; i >= 0; i-- ) {

					sel.remove(i);

				}
			}



			// Detect created shortcode
			function selectOption(sid, val, uncheck) {
				
				var sel = document.getElementById(sid);

				if ( uncheck ) sel.selectedIndex = -1;

				for ( var i = 0; i < sel.options.length; i++ ) {

					if ( sel.options[i].value == val ) sel.options[i].selected = true;

				}
				
				// fix for opera
				jq('#'+sid+' option[value="'+val+'"]').attr('selected',true);

			}



			function makeShortcode(cod) {

				var
					tag = document.getElementById('gse_tag').value, 
					props = document.getElementById('gse_properties').options, 
					cont = document.getElementById('gse_content').value, 
					scid = 0, 
					code = '['+tag;

				if ( props.length ) {

					for ( var i = 0; i < props.length; i++ ) code += ' '+props[i].value.replace('=', '="')+'"';

				}

				var scid = document.getElementById('sc_id').value;

				if ( !scid ) scid = tinyMCEPopup.editor.plugins.shortcode_editor.getId();

					code += ' sc_id="'+scid+'"]';

				if ( cont ) code += cont+'[/'+tag+']';

					tinyMCEPopup.editor.plugins.shortcode_editor.cache(scid, code);
				
				return cod ? code : tinyMCEPopup.editor.plugins.shortcode_editor.toHTML(code);

/*				var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;

				if (is_chrome) {

					return cod ? code : tinyMCEPopup.close();

				} else {

					return cod ? code : tinyMCEPopup.editor.plugins.shortcode_editor.toHTML(code);

				};
*/
			}

		</script>

		<style type="text/css">

			* {
				font-family:Verdana,Arial;
				font-size:11px !important;
				}

			form {
				padding:0;
				margin:0;
				}

			select,
			input,
			textarea {
				padding:2px;
				border-radius:3px;
				}

			#gse_properties {
				width:100%;
				height:8em;
				}
	
			.small {
				width:100px;
				}
	
			.autow {
				width:auto;
				}
	
			#gse_remove_prop,
			#gse_uncheck_prop {
				float:right;
				margin:0 0 0 5px;
				}
	
			#gse_tag {
				margin:0;
				padding:3px;
				width:130px;
				float:left;
				}

			#gse_content {
				width:100%;
				height:155px;
				}

			.sc-button {
				border:1px solid #bbb; 
				margin:0; 
				padding:2px 5px;
				font-size:11px;
				color:#000;
				cursor:pointer;
				-webkit-border-radius:3px;
				border-radius:3px;
				background-color: #eee; /* Fallback */
				background-image: -ms-linear-gradient(bottom, #ddd, #fff); /* IE10 */
				background-image: -moz-linear-gradient(bottom, #ddd, #fff); /* Firefox */
				background-image: -o-linear-gradient(bottom, #ddd, #fff); /* Opera */
				background-image: -webkit-gradient(linear, left bottom, left top, from(#ddd), to(#fff)); /* old Webkit */
				background-image: -webkit-linear-gradient(bottom, #ddd, #fff); /* new Webkit */
				background-image: linear-gradient(bottom, #ddd, #fff); /* proposed W3C Markup */		
			}

			.sc-button[disabled="disabled"],
			.sc-button[disabled="disabled"]:hover {
				color:#888;
				border:1px solid #bbb;
				cursor:default;
				}

			#shortcode_close,
			#shortcode_submit,
			#ok_button {
				border: 1px solid #bbb; 
				margin:0; 
				padding:0 0 1px;
				font-weight:bold;
				font-size: 11px;
				width:100px; 
				height:24px;
				color:#000;
				cursor:pointer;
				-webkit-border-radius: 3px;
				border-radius: 3px;
				background-color: #eee; /* Fallback */
				background-image: -ms-linear-gradient(bottom, #ddd, #fff); /* IE10 */
				background-image: -moz-linear-gradient(bottom, #ddd, #fff); /* Firefox */
				background-image: -o-linear-gradient(bottom, #ddd, #fff); /* Opera */
				background-image: -webkit-gradient(linear, left bottom, left top, from(#ddd), to(#fff)); /* old Webkit */
				background-image: -webkit-linear-gradient(bottom, #ddd, #fff); /* new Webkit */
				background-image: linear-gradient(bottom, #ddd, #fff); /* proposed W3C Markup */
			}

			.sc-button:hover,
			.sc-button:focus,
			#shortcode_close:hover,
			#shortcode_close:focus,
			#shortcode_submit:hover,
			#shortcode_submit:focus,
			#ok_button:hover {
				border: 1px solid #555;
			}

			fieldset {
				margin:0 0 10px;
				padding:5px 10px 10px;
				border:1px solid #CCC;
				border-radius:2px;
				position:relative;
				}

			.clear {
				clear:both;
				}

			.h10 {
				height:10px;
				}

			/*-- TABS -----------------------------------------------*/

			.kul {
				list-style:none;
				padding:0;
				margin:0;
				}
			
			.kul li {
				float:left;
				margin:0 2px -1px 0;
				padding:3px 10px;
				font-size:10px;
				display:block;
				cursor:pointer;
				border:1px solid #919B9C;
				border-top-left-radius:2px;
				border-top-right-radius:2px;
				background-color: #eee; /* Fallback */
				background-image: -ms-linear-gradient(bottom, #ddd, #fff); /* IE10 */
				background-image: -moz-linear-gradient(bottom, #ddd, #fff); /* Firefox */
				background-image: -o-linear-gradient(bottom, #ddd, #fff); /* Opera */
				background-image: -webkit-gradient(linear, left bottom, left top, from(#ddd), to(#fff)); /* old Webkit */
				background-image: -webkit-linear-gradient(bottom, #ddd, #fff); /* new Webkit */
				background-image: linear-gradient(bottom, #ddd, #fff); /* proposed W3C Markup */
				}
			
			li.kcurrent,
			.kul li:hover {
				background:#FFF;
				border-bottom:1px solid #FFF;
				cursor:pointer;
				}
			
			.ktabs {
				clear:both;
				border:1px solid #919B9C;
				margin:0 0 10px;
				padding:10px;
				background:#FFF;
				border-radius:2px;
				border-top-left-radius:0;
				min-height:157px;
				}
			
			.ktabs .kt {
				display:none;
				}

			.ktabs .block {
				display:block;
				}

			#helplink {
				float:right;
				margin:3px 0 0 0;
				}

			#help {
				width:375px;
				height:310px;
				background:#F1F1F1;
				top:-310px;
				left:0;
				position:absolute;
				z-index:1000;
			}

			#h {
				position:relative;
				padding:30px 25px 25px 25px;
			}

			.ul {
				margin:0 25px 3em 0;
			}

			.ul li {
				margin:0 0 1em 0;
			}

			.block {
				display:block;
			}

			.none {
				display:none;
				}

		</style>

	</head>

	<body>

		<div id="help">
			<div id="h">
				<ul class="ul">
					<li><?php _e('Each shortcode &amp; each attribute has a tooltip with short instruction of usage. Take a look that.','pandathemes') ?></li>
					<li><?php _e('For the best experience take a look an examples of usage. Live-demo allow to see <a target="_blank" href="http://topbusiness.pandathemes.com/shortcodes/">all shortcodes</a> in action.','pandathemes') ?></li>
					<li><?php _e('A double-level shortcodes like a <a target="_blank" href="http://topbusiness.pandathemes.com/shortcodes/content/slider/">Slider</a> or <a target="_blank" href="http://topbusiness.pandathemes.com/shortcodes/navigation/tabs/">Tabs</a> do not included into this editor. You need to use that by manually, however it is not difficult :)','pandathemes') ?></li>
				</ul>
				<div style="text-align:center;"><input type="submit" id="ok_button" value="Ok" /></div>
			</div>
		</div>

		<form action="" method="post" id="shortcode_dialog">

			<fieldset><legend><?php _e('Shortcode','pandathemes') ?></legend>

				<select id="gse_tag" attr="gse_tag" name="gse_tag" onChange="setTag()">
	
					<option value="0"><?php _e('Select one','pandathemes') ?></option>
	
					<?php
	
						$out = '';
	
						foreach ($sc as $group => $shortcode) {
						
							$out .= '<option disabled> </option><option disabled> ' . $group . ' </option>';
						
							foreach ($shortcode as $name => $alt) {
	
								$out .= '<option value="' . $name . '" title="' . $alt['alt'] . '">&nbsp; ' . $name . '</option>';
	
							}
						
						}
	
						echo $out;
	
					?>
	
				</select>

				<a id="helplink" href="#"><?php _e('Help','pandathemes') ?></a>

				<div class="clear"><!-- --></div>

			</fieldset>

			<ul class="kul kul-auto">
				<li class="kcurrent">Attibutes</li>
				<li>Content</li>
			</ul>
			
			<div class="ktabs ktabs-auto">
		
				<div class="kt block">

					<select id="gse_new_prop_name">
	
						<?php
	
							$out = '';
	
							foreach ($sc as $group => $shortcode) {
							
								foreach ($shortcode as $name => $attributes) {
	
									foreach ($attributes as $attr => $desc) {
	
										foreach ($desc as $value => $v) {
	
											$out .= '<option class="option-' . $name . '" value="' . $value . '" title="' . $v . '">' . $value . '</option>';
	
										}
	
									}
	
								}
							
							}
	
							echo $out;
	
						?>
	
					</select>
	
					<input type="text" id="gse_new_prop_value" />
	
					<input class="sc-button" type="button" id="gse_new_prop_add" value="<?php _e('Apply','pandathemes') ?>" class="autow" />

					<div class="clear h10"><!-- --></div>

					<select id="gse_properties" size="8"></select>

					<div class="clear h10"><!-- --></div>

					<input class="sc-button" type="button" id="gse_uncheck_prop" value="<?php _e('Uncheck','pandathemes') ?>" disabled="disabled" />
					<input class="sc-button" type="button" id="gse_remove_prop" value="<?php _e('Remove','pandathemes') ?>" disabled="disabled" />

					<div class="clear"><!-- --></div>

				</div>
		
				<div class="kt">
					<textarea id="gse_content" name="gse_content"></textarea>
				</div>
		
			</div>

			<div style="float:left;"><input type="button" id="shortcode_close" value="<?php _e('Cancel','pandathemes') ?>" /></div>
			<div style="float:right;"><input type="submit" id="shortcode_submit" value="{#shortcode_editor.insert}" disabled="disabled" /></div>
	
			<input type="hidden" id="sc_id" />

		</form>

	</body>

</html>