<?php /* Theme options and options page functions */

// add theme options link to wpadminbar
function magomra_admin_bar_theme_options() {
    global $wp_admin_bar;

	if( !is_admin() ) :
		$theme_options = array(
			'parent' => 'site-name',
			'id' => 'theme_options',
			'title' => 'Theme Options',
			'href' => admin_url( 'themes.php?page=magomra-theme-options' ),
			'meta' => false );
	   	$wp_admin_bar->add_menu( $theme_options );
	endif;
}
if( magomra_option( 'wpadminbar_theme_options' ) )
	add_action( 'wp_before_admin_bar_render', 'magomra_admin_bar_theme_options' );

// gets an option value from the global or db
function magomra_option( $option_name ) {
	global $magomra_options;
	if( !isset( $magomra_options ) ) $magomra_options = get_option( 'magomra-theme-options', magomra_default_options() );
	return ( isset( $magomra_options[$option_name] ) ? $magomra_options[$option_name] : '' ) ;
}

function magomra_register_options() {
// register theme options
	register_setting( 'magomra-theme-options-group', 'magomra-theme-options', 'magomra_sanatize_input' );
}

// sanatize form input
function magomra_sanatize_input( $input ) {
	foreach( $input as $key => $value )
		$input[$key] = trim( $value );

	return $input;
}

// array of options page elements
function magomra_build_options() {
	$struct = array (

// SITE LAYOUT
		array( 
			'name' => 'Layout',
			'desc' => 'Configure how the site displayed to users.',
			'type' => 'section'
		),
		
		// content width
		array( 
			'name' => 'Content width:',
			'id' => 'content_width',
			'desc' => 'Width of the main content area, in pixels.',
			'type' => 'text',
			'default' => '762',
			),
		
		// sidebar width
		array( 
			'name' => 'Sidebar width:',
			'id' => 'sidebar_width',
			'desc' => 'Width of the sidebar, in pixels.',
			'type' => 'text',
			'default' => '252',
			),
		
		// sidebar location
		array( 
			'name' => 'Sidebar location:',
			'id' => 'sidebar_location',
			'desc' => 'Should the sidebar be to the left, right, or not shown?',
			'type' => 'radio',
			'default' => 'r',
			'options' => array( 'l'=> 'left', 'r' => 'right', 'n' => 'no sidebar' )
			),
		
		// title sep character
		array( 
			'name' => 'Title separator character:',
			'id' => 'title_sep_char',
			'desc' => 'The character used to seperate pieces of information in the title.',
			'type' => 'text',
			'default' => '&raquo;'
			),
		
		// body sep character
		array( 
			'name' => 'Body separator character:',
			'id' => 'body_sep_char',
			'desc' => 'The character used to seperate strings of text or links in the body.',
			'type' => 'text',
			'default' => '|'
			),
			
		// footer sep character
		array( 
			'name' => 'Footer separator character:',
			'id' => 'footer_sep_char',
			'desc' => 'The character used to seperate strings of text or links in the footer.',
			'type' => 'text',
			'default' => '&bull;'
			),
		
		// content or excerpt
		array( 
			'name' => 'Use excerpts or full posts?',
			'id' => 'post_excerpt',
			'desc' => 'When listing several posts on an index page, should the post content or the excerpt be displayed?',
			'type' => 'radio',
			'options' => array( 
				'post' => 'use post content', 
				'excerpt' => 'use the excerpt'
			),
			'default' => 'post'
		),
		
	array( 'type' => 'close' ),


// LAYOUT
		array( 
			'name' => 'Entry Layout', 
			'desc' => 'Options for the display of posts and pages.',
			'type' => 'section'
		),
	
		// show authors
		array( 
			'name' => 'Show post author?',
			'id' => 'post_author',
			'desc' => 'Show the name of the post author, name with link to author page, or no author?',
			'type' => 'radio',
			'options' => array( 
				'none' => 'don\'t show', 
				'name_only' => 'name only', 
				'author_link' => 'name &amp; author link' 
			),
			'default' => 'author_link'
		),
	
		// show published dates
		array( 
			'name' => 'Show publication date?',
			'id' => 'published_date',
			'desc' => 'Show the date and/or time a post or page was published?',
			'type' => 'radio',
			'options' => array( 
				'none' => 'don\'t show', 
				'date' => 'date only', 
				'date_time' => 'date and time'
			),
			'default' => 'date'
		),
		
		// show last updated date
		array( 
			'name' => 'Show last updated date?',
			'id' => 'updated_date',
			'desc' => 'Display the date and/or time when each post or page was last updated?',
			'type' => 'radio',
			'options' => array( 
				'none' => 'don\'t show', 
				'date' => 'date only', 
				'date_time' => 'date and time'
			),
			'default' => 'none'
		),
		
		// keep reading text
		array( 
			'name' => 'Post excerpt link text:',
			'id' => 'keep_reading_text',
			'desc' => 'Text to show for the &lt;--more--&gt; link at the end of post excerpts.',
			'type' => 'text',
			'default' => 'Continue reading &raquo;'
			),
		
		array( 'type' => 'close' ),
		
// UTILITY TEXT
	array( 
		'name' => 'Utility Text',
		'desc' => 'Configure what messages are shown to users and edit their syntax.',
		'type' => 'section' ),
		
		// post comment message
		array( 
			'name' => 'Post comment message:',
			'id' => 'post_comment_message',
			'desc' => 'The text to display under the new comment form. Can contain HTML tags. Leave blank for no message.',
			'type' => 'textarea',
			'default' => 'Your email address will <em>never</em> be published.'
			),

	
		array( 'type' => 'close' ),

// CUSTOM CODE
	array( 
		'name' => 'Custom Code',
		'desc' => 'Section to insert custom code to run from various locations within the theme.',
		'type' => 'section'
	),

		// icon area
		array( 
			'name' => 'Enable Icon Area?',
			'id' => 'icon_area',
			'desc' => 'Execute code in a specially styled div in the lower left of the post. Useful for small ratings or social media widgets.',
			'type' => 'checkbox',
			'default' => 0,
			'notice' => 'If this option is enabled, you will have to use the Theme Editor to paste into the <code>index-icon_area.php</code> file. If you need to insert a shortcode here, you can use the format <code>&lt;php do_shortcode(\' [theshortcode] \'); ?&gt;</code> in the icon_area file. (WordPress themes are not permitted to pass custom PHP code through the options page for security reasons, sorry.)'
			),
		
		// remove w3c attributes	
		array( 
			'name' => 'Remove W3C Noncompliant Attributes?',
			'id' => 'w3c_comply',
			'desc' => 'Removes a handful of element attributes that are not W3C compliant',
			'type' => 'checkbox',
			'default' => 0,
			'notice' => 'This will remove W3C noncompliant attributes that normally prevent WordPress blogs from being validated, but may make it more difficult for the visually impaired to experience your content.'
			),

		// header hook
		array( 
			'name' => 'Header code:',
			'id' => 'header_code',
			'desc' => 'Code to be executed right before the &lt;/head&gt; tag.',
			'type' => 'textarea',
			'default' => ''
			),
	
	// footer hook
		array( 
			'name' => 'Footer code:',
			'id' => 'footer_code',
			'desc' => 'Code to be executed right before the &lt;/body&gt; tag.',
			'type' => 'textarea',
			'default' => ''
			),

		// after attachment image hook
		array( 
			'name' => 'After attachment code:',
			'id' => 'attachment_code',
			'desc' => 'Code to be executed on attachment pages, between the description and view previous/next.',
			'type' => 'textarea',
			'default' => ''
			),

		// stylesheet hook
		array( 
			'name' => 'Custom CSS:',
			'id' => 'css_code',
			'desc' => 'Style sheet information to be enqueued in WordPress.',
			'type' => 'textarea',
			'default' => ''
			),
	
	array( 'type' => 'close' ),

// EDITING
	array( 
		'name' => 'Editing',
		'desc' => 'Configure backend administrator options for editing.',
		'type' => 'section'
		),
	
		// hide edit link
		array(
			'name' => 'Hide the post "Edit" links shown to administrators?',
			'id' => 'edit_link',
			'desc' => 'Select or hide the administrator edit links from individual posts.',
			'type' => 'checkbox',
			'default' => 0,
			),
		
		// add "theme options" to wpadminbar
		array(
		'name' => 'Add the "Theme Options" link to the Admin Bar?',
		'id' => 'wpadminbar_theme_options',
		'desc' => 'Adds a link to this page to the WP-Admin Bar when logged in as an administrator and not on the dashboard.',
		'type' => 'checkbox',
		'default' => 1,
	),
	
	array( 'type' => 'close' )
	);

return $struct; 
}

// returns array of default options
function magomra_default_options() {
	$default_options = array();
	
	$struct = magomra_build_options();
	foreach( $struct as $key => $value )
		if( isset( $value['default'] ) ) 
			$default_options = array_merge( $default_options, array( $value['id'] => $value['default'] ) );

	return $default_options;
}

//create menu link in Appearance menu
function magomra_create_menu() {
	add_theme_page( 'Magomra Theme Options', 'Theme Options', 'edit_theme_options', 'magomra-theme-options', 'magomra_options_page' );
}

// draw options page
function magomra_options_page() {
	global $magomra_options;
		
	// RESET
	if( array_key_exists( 'reset', $_POST ) && $_POST['reset'] = 'reset' ) {
		
		delete_option( 'magomra-theme-options' ); 	
		add_option( 'magomra-theme-options', magomra_default_options(), NULL, true );
		
		$magomra_options = magomra_default_options();
		echo '<div class="updated settings-error"><p><strong>Magomra theme options reset to defaults.</strong></p></div>';
	}

	// UPDATE
	elseif( isset( $_REQUEST['settings-updated'] ) )
		echo '<div class="updated settings-error"><p><strong>Magomra theme options updated.</strong></p></div>';

?>

<div class="wrap">
<?php screen_icon(); ?><h2>Magomra Theme Options</h2>
<form method="post" action="options.php">

<?php 
settings_fields( 'magomra-theme-options-group' ); 
$struct = magomra_build_options();

foreach( $struct as $item ) {

if( isset( $item['id']) ) $item_id = $item['id'];

switch ( $item['type'] ) {

case 'section' : ?>

<h3 class="title" title="<?php echo $item['desc']; ?>"><?php echo $item['name']; ?></h3>
<table class="form-table">
<tbody>

<?php break; case 'text': ?>

	<tr valign="top">
		<th scope="row"><label for="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" title="<?php echo $item['desc']; ?>"><?php echo $item['name']; ?></label></th>
		<td><input class="regular-text code" name="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" id="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" type="<?php echo $item['type']; ?>" value="<?php echo magomra_option( $item_id ); ?>" /></td>
		<td><?php if( isset( $item['notice'] ) ) echo '<p class="description">' . $item['notice'] . '</span>'; ?></td>
	</tr>

<?php break; case 'textarea': ?>

	<tr valign="top">
		<th scope="row">
		<label for="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" title="<?php echo $item['desc']; ?>"><?php echo $item['name']; ?></label></th>
		<td>
		<textarea class="large-text code" name="magomra-theme-options[<?php echo $item_id; ?>]" cols="" rows=""><?php echo magomra_option( $item_id ) ?></textarea>
		<?php if( isset( $item['notice'] ) ) echo '<p class="description">' . $item['notice']	 . '</p>'; ?></td>
	</tr>

<?php break; case 'select': ?>

	<tr valign="top">
		<th scope="row">
		<label for="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" title="<?php echo $item['desc']; ?>"><?php echo $item['name']; ?></label></th>
		<td><select name="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" id="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>">
		<?php foreach( $item['options'] as $suboption ) { ?>
				<option <?php if ( magomra_option( $item_id ) == $suboption ) { echo 'selected="selected"'; } ?>><?php echo $suboption; ?></option>
		<?php } ?>
		</select><?php if( isset( $item['notice'] ) ) echo '<p class="description">' . $item['notice']	 . '</span>'; ?>
		</td>
	</tr>

<?php break; case "radio": ?>

	<tr valign="top">
		<th scope="row"><label for="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" title="<?php echo $item['desc']; ?>"><?php echo $item['name']; ?></label></th>
		<td><?php 
		foreach ( $item['options'] as $key=>$suboption ) {
			if( magomra_option( $item_id ) ) {
				if( $key == magomra_option( $item_id ) ) { $checked = 'checked="checked"'; }
				else { $checked = NULL; }
			} 
			else {
				if( $key == $item['default'] ) { $checked = 'checked="checked"'; }
				else { $checked = NULL; }
			} ?>
			
			<p><input type="radio" id="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" name="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $suboption; ?></p>
		<?php } if( isset( $item['notice'] ) ) echo '<p class="description">' . $item['notice']	 . '</span>'; ?>
		</td>
		</tr>

<?php break; case "checkbox": ?>

	<?php if( magomra_option( $item_id ) ) $checked = 'checked="checked"'; else $checked = NULL; ?>

<tr valign="top">
		<td>&nbsp;</td>
		<td>
		<label for="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" title="<?php echo $item['desc']; ?>">
			<input type="checkbox" name="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" id="<?php echo 'magomra-theme-options[' . $item_id . ']'; ?>" value="1" <?php echo $checked; ?> />
		<?php echo $item['name']; ?></label>
<?php if( isset( $item['notice'] ) ) echo '<p class="description">' . $item['notice']	 . '</p>'; ?></td>
	</td>
	</tr>

<?php break;

case "close": ?>

</tbody>
</table>

<?php break;
	}
}
?>
	<p class="submit">
		<input class="button button-primary" type="submit" value="Save All Changes" />
		<input type="hidden" name="save" value="save" />
	</p>
	</form>

	<form method="post" action="">
		<p class="submit">
			<input class="button button-secondary" type="submit" value="Reset to Defaults" />
			<input type="hidden" name="reset" value="reset" />
		</p>
	</form>

<hr />

<!--
<form method="post" action="">
<h3>Images</h3>
<p class="description">Make sure you save any changes you made to settings before uploading a new image!</span>

<table class="form-table">
<tbody>
	<tr valign="top">
		<th scope="row"><label for="favicon" title="Upload a favicon for your blog.">Upload favicon:</label></th>
		<td><input name="favicon" id="favicon" type="file" /></td>
	</tr>
</tbody>
</table>

<p class="submit">
	<input class="button button-primary" type="submit" name="upload_images" value="Save Images" />
</p>
</form>-->

</div><!-- /wrap -->

<?php 
} 

// Hooks & Filters
add_action( 'admin_init', 'magomra_register_options' ); // register theme settings
add_action( 'admin_menu', 'magomra_create_menu' ); // add link
?>