<?php /* Function for printing parts of the theme template */

/* =PRINT POST TITLE
-------------------------------------------------------------- */
function magomra_post_title( $post_id=null, $class=null ) {
	$default_class = 'entry-title';
	if( empty( $post_id ) ) $post_id = get_the_ID(); // default ID
	
	if( is_array( $class ) )
		$class = implode( ' ', magomra_trim_array( $class ) );

	$class = $default_class . ' ' . trim( $class );
	
	$permalink = get_permalink( $post_id );
	$post_title = get_the_title( $post_id );
	$post_title_clean = esc_attr( strip_tags( $post_title ) );

		
	if( empty( $post_title_clean ) ) {
		$post_title_clean = 'this post';
		$post_title = '<em>(no title)</em>';
	}

	printf( '<h2 class="%1$s"><a href="%2$s" title="Permalink to &ldquo;%3$s&rdquo;" rel="bookmark">%4$s</a></h2>', 
	$class, $permalink, $post_title_clean, $post_title );
}


/* =GET ATTACHMENT DATA
-------------------------------------------------------------- */
function magomra_get_attachment( $attachment_id=null ) {
	if( empty( $attachment_id ) ) $attachment_id = get_the_ID(); // use current id if none
	if( !wp_attachment_is_image( $attachment_id ) ) return false; // check if image
	
	$attachment = get_post( $attachment_id ); // get attachment
	
	if( !$attachment ) return false;
	else return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'id' => $attachment->ID,
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'parent_id' => $attachment->post_parent,
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}

/* =PRINT FEATURED IMAGE
-------------------------------------------------------------- */
function magomra_the_post_thumbnail( $post_id=null ) {
	$post_id = ( $post_id === null ? get_the_ID() : $post_id );
	
	if( !has_post_thumbnail( $post_id ) ) return false;
	
	// post data
	$permalink = get_permalink( $post_id );
	$post_title = esc_attr( get_the_title( $post_id ) );

	// thumb data
	$thumb_id = get_post_thumbnail_id( $post_id );
	$thumb_html = get_the_post_thumbnail( $post_id, 'medium', array( 'class' => 'post-thumbnail' ) );
	$thumb = magomra_get_attachment( $thumb_id );
		if( !empty( $thumb['caption'] ) ) $caption = $thumb['caption'];
		elseif( !empty( $thumb['description'] ) ) $caption = $thumb['description'];
		elseif( !empty( $thumb['title'] ) ) $caption = $thumb['title'];
		else $caption = $post_title;

	printf( '<div id="post-thumbnail-%1$s" class="wp-caption alignleft"><a href="%2$s" title="Continue reading &quot;%3$s&quot;">%4$s</a><p class="wp-caption-text">%5$s</p></div>',
	$thumb_id, $permalink, $post_title, $thumb_html, $caption );
}

/* =INDEX PAGE TYPE
-------------------------------------------------------------- */
function magomra_special_index( $post ) { 
	if( is_category( $post ) ) { // category
		$title = 'Category';
		$item =  single_cat_title( '', false );
		$message = 'You are now browsing all items filed in the "%8$s" category.';
	}

	elseif( is_tag( $post ) ) { // tag
		$title = 'Tag'; 
		$item = single_tag_title( '', false );
		$message = 'You are now browsing all items tagged with "%8$s."';
	}

	elseif( is_author() ) { // author
		$title = 'Author'; 
		$item = get_the_author();
		$message = 'You are now browsing all items authored by %8$s.'; 
	}
	
	elseif( is_month() || is_day() ) { // archives (month or day)
		$title = 'Archives'; 
		$item = substr( single_month_title(', ', false ), 2 );
		$message = 'You are now browsing the archives for items from %8$s.';
	}

	elseif( is_year() ) { // archive (year)
		$title = 'Archives'; 
		$item = get_the_date( 'Y');
		$message = 'You are now browsing the archives for posts from the year %8$s.'; 
	}
	
	elseif( is_search() ) { // search
		$title = 'Search'; 
		$item = get_search_query();
		$message= 'You are now browsing our search results for "%8$s."';
	}

	else return false;
	
	// print content
	printf( '%1$s%2$s<li class="%6$s">%1$s%2$s%2$s<h2 class="%7$s">%3$s%4$s%5$s</h2>%2$s%2$s<p>' . $message . '</p>%1$s</li>',
		"\n", // line break
		"\t", // tab
		'&laquo; ', // before title
		$title, // title
		' Index', // after title
		'widget magomra-index-type-widget', // widget classes
		'widget-title magomra-index-type', // title classes
		esc_attr( $item )
	); 
}


/* =PRINT INDEX NAVIGATION LINKS
-------------------------------------------------------------- */
function magomra_index_nav( $older_text='&laquo; Older', $newer_text='Newer &raquo;' ) {
	$older = get_next_posts_link( $older_text );
	$newer = get_previous_posts_link( $newer_text );
	
	if( !empty( $older ) ) echo '<div class="post-navigation-next">' . $older . '</div>';
	if( !empty( $newer ) ) echo '<div class="post-navigation-prev">' . $newer  . '</div>'; 
}

/* =PRINT NAVIGATION MENUS
-------------------------------------------------------------- */
function magomra_nav_menu( $menu_id ) {
	if( $menu_id === 0 || $menu_id == 'primary' ) // main navigation menu
		$args = array(
			'theme_location'	=> 'navigation_menu_primary',
			'container'			=> false,
			'container_id'		=> '',
			'conatiner_class'	=> '',
			'menu_class'		=> 'menu main-menu menu-depth-0 menu-even', 
			'echo'				=> true,
			'fallback_cb'		=> 'magomra_nav_fallback', // show skinned wp_list_pages by default
			'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'				=> 10, 
			'walker'			=> new magomra_walker_nav_menu
		);

	// secondary navigation menu
	elseif( $menu_id === 1 || $menu_id == 'secondary' )
		$args = array(
			'theme_location'	=> 'navigation_menu_secondary',
			'container'			=> 'div',
			'container_id'		=> 'top-navigation-secondary',
			'conatiner_class'	=> 'top-navigation',
			'menu_class'		=> 'menu main-menu menu-depth-0 menu-even', 
			'echo'				=> true,
			'fallback_cb'		=> false, // not shown by default
			'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'				=> 2, 
			'walker'			=> new magomra_walker_nav_menu
		);
	
	wp_nav_menu( $args );
}

/* =PRINT NAVIGATION MENUS (FALLBACK)
-------------------------------------------------------------- */

function magomra_nav_fallback() {
	$args = array( 'echo'=>0, 'title_li'=>'', 'depth'=>10, 'walker' => new magomra_walker_page );
	echo '
		<ul class="menu main-menu menu-depth-0 menu-even">' . 
			wp_list_pages( $args ) .
		'</ul>
';
}

/* =COMMENTS CALLBACK
-------------------------------------------------------------- */
function magomra_custom_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
?>
<title></title>


	<li id="comment-<?php comment_ID() ?>" <?php comment_class( 'response' ) ?>>
        <div class="comment-author response-author"><?php magomra_commenter_link() ?></div>
        <div class="comment-meta">
			<span class="comment-meta-span">
			<?php printf( 'Posted %1$s at %2$s | <a href="%3$s" title="Permalink to this comment">Permalink</a>',
		         get_comment_date(),
		         get_comment_time(),
		         '#comment-' . get_comment_ID() );
		         edit_comment_link( 'Edit', ' | <span class="edit-link">', '</span>'); ?>
			</span>
		</div>

<?php if( !$comment->comment_approved ) echo '<span class="unapproved">Your comment is awaiting moderation.'; ?>

		<div class="comment-content">
			<?php comment_text() ?>
        </div>
        
		<?php // echo the comment reply link
		if( $args['type'] == 'all' || get_comment_type() == 'comment' ) {
		     $extra_args = array(
				 'reply_text' => __( 'Reply', 'magomra-theme' ),
		         'login_text' => __( 'Log in to reply.', 'magomra-theme' ),
		         'depth' => $depth,
		         'before' => '<div class="comment-reply">',
		         'after' => '</div>'
			);
						 
			comment_reply_link( array_merge( $args, $extra_args ) );
		}
}

/* =PINGS CALLBACK
-------------------------------------------------------------- */
function magomra_custom_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; 
?>
	
	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    	<div class="trackback-author">
			<?php printf( 'By %1$s on %2$s at %3$s',
				get_comment_author_link(),
				get_comment_date(),
				get_comment_time() );
				edit_comment_link( 'Edit', ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'
			); ?>
		</div>
		
<?php if ( !$comment->comment_approved ) echo '<span class="unapproved">Your trackback is awaiting moderation.'; ?>

		<div class="comment-content">
		     <?php comment_text() ?>
		 </div>
<?php 
}

/* =COMMENTS AVATAR
-------------------------------------------------------------- */
function magomra_commenter_link() {
	$commenter = get_comment_author_link();
	if( ereg( '<a[^>]* class=[^>]+>', $commenter ) )
		$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	else		
		$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}


/* =PRINTS DEFAULT SIDEBAR
-------------------------------------------------------------- */
function magomra_default_sidebar() {
	
	// sidebar area args to pass
	$args = array( 
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	);
	
	// widgets to add
	$widgets = array(
		array( 'widget' => 'WP_Widget_Search', 'instance' => '' ),
		array( 'widget' => 'WP_Widget_Meta', 'instance' => array( 'title' => 'Login' ) ),
		array( 'widget' => 'WP_Widget_Categories', 'instance' => array( 'hierarchical' => 1, 'count' => 1 ) ), 
		array( 'widget' => 'WP_Widget_Calendar', 'instance' => array( 'title' => 'Calendar' ) ),
		array( 'widget' => 'WP_Widget_Tag_Cloud', 'instance' => array( 'title' => 'Tags' ) ),
		array( 'widget' => 'WP_Widget_Archives', 'instance' => array( 'dropdown' => 1 ) ),
		array( 'widget' => 'WP_Widget_Pages', 'instance' => '' ),
		array( 'widget' => 'WP_Widget_Recent_Posts', 'instance' => array( 'number' => 5 ) ),
		array( 'widget' => 'WP_Widget_Recent_Comments', 'instance' => array( 'number' => 5 ) )
	);

	foreach( $widgets as $widget )
		the_widget( $widget['widget'], $widget['instance'], $args );
}


/* =CONDITIONAL SHOW EDIT LINK
-------------------------------------------------------------- */
function magomra_edit_post_link() {
	if( !magomra_option( 'edit_link' ) )
		edit_post_link( 'Edit', ' ' . magomra_option( 'body_sep_char' ) . ' ' . '<span class="edit-link">', '</span>');
}


/* =PRINTS OPTIONAL RAW CODE
-------------------------------------------------------------- */
function magomra_code_insert( $option_slug, $before=null, $after=null ) {
	$code = trim( magomra_option( $option_slug ) );
	if( !empty( $code ) )
		echo 
		"\r\n" . '<!-- ' . $option_slug . ' inserted by theme -->' . 
		"\r\n" . $before .
		"\r\n" . magomra_option( $option_slug ) . 
		"\r\n" . $after;
}


/* =ENQUEUES STYLESHEETS
-------------------------------------------------------------- */
function magomra_enqueue_styles() {
	$options = array( 
		'c' => magomra_option( 'content_width' ), 
		's' => magomra_option( 'sidebar_width' ),
		'l' => magomra_option( 'sidebar_location' ),
		'h' => get_header_image(),
		'b' => get_background_color(),
		't' => get_header_textcolor(),
		'w' => get_custom_header()->width,
		'e' => get_custom_header()->height,
		'a' => ( is_user_logged_in() ? 1 : 0 )
	);
	$css = '?css=' . urlencode( serialize( $options ) );

	wp_enqueue_style( 'magomra_style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'magomra_style_dynamic', get_stylesheet_directory_uri() . '/style.php' . $css, 'magomra_style' );	
}


/* =ENQUEUES SCRIPTS
-------------------------------------------------------------- */

function magomra_admin_css() {
	wp_enqueue_style( 'magomra_style_admin', get_stylesheet_directory_uri() . '/style-admin.css' );
}

add_action( 'admin_init', 'magomra_admin_css' );
?>