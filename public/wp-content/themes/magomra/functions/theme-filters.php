<?php /* WordPress filter functions */

/* =CUSTOM HEADER CALLBACK
-------------------------------------------------------------- */
function magomra_preview_header_cb() { 
	// variables
	$text_color = get_header_textcolor();
	$header_img = get_header_image();
	$bg_color = get_background_color();
	$height = 140;
	$width = 1040;
		
	// header
	if( !empty( $header_img ) ) {
		$style = ( empty( $header_img ) ? '' : 'background-image:url(\'' . $header_img . '\'); background-position:top center; background-repeat:no-repeat; background-size: ' . $width . 'px ' . $height . ' px;' );	
	}
	
	// header text color
	$color = ( $text_color != 'blank' && !empty( $text_color ) ? 'color: #' . $text_color . ';text-decoration:none;text-shadow: 1px 1px 2px #000;' : 'visibility: hidden;' );
	
	// show text
	$show_text = ( $text_color == 'blank' || empty( $text_color ) ? false : true );
 ?>
 	<div id="fake-header" style="font: 12px/1.65em Geneva, Tahoma, sans-serif; background-image:url('<?php echo trailingslashit( get_stylesheet_directory_uri() ); ?>img/bg_lines_dark.jpg'); background-repeat: repeat; height:140px; width:100%;">
		<div id="fake-branding" style="<?php echo $style; ?>">
		
			<h1 id="site-title" style="font-size: 26px; line-height: 28px; padding-left:24px;"><a href="#" style="<?php echo $color; ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="site-description" style="font-size: 16px; line-height: 18px; padding-left:24px;"><span style="<?php echo $color; ?>"><?php bloginfo( 'description' ); ?></span></h2>
			<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>
<?php
}


/* =SEARCHFORM FILTER
-------------------------------------------------------------- */
function magomra_searchform_filter( $form ) { 
	if( magomra_option( 'w3c_comply' ) ) 
		$form = str_replace( ' role="search"', '', $form );

	return $form;
}

/* =TITLE FILTER
-------------------------------------------------------------- */
function magomra_title_filter( $title, $sep, $seplocation ) {
	$ssep = ' ' . $sep . ' '; // $ssep = padded $sep
	$pre = $num = '';

	// get special index page type (if any)
	if( !is_single() ) { 
		if( is_category() ) $pre = $ssep . 'Category';
		elseif( is_tag() ) $pre = $ssep . 'Tag';
		elseif( is_author() ) $pre = $ssep . 'Author';
		elseif( is_year() || is_month() || is_day() ) $pre = $ssep . 'Archives';
	}

	// get the page number
	if( get_query_var( 'paged' ) ) $num = $ssep . 'page ' . get_query_var( 'paged' ); // on index
	elseif( get_query_var( 'page' ) ) $num = $ssep . 'page ' . get_query_var( 'page' ); // on single
	else $num = '';

	// concoct and return title
	return get_bloginfo( 'name' ) . $pre . $title . $num;
}

/* =BLOGROLL FILTER
-------------------------------------------------------------- */
function magomra_blogroll_filter( $bookmarks, $classes='blogroll-item' ) {
	if( is_array( $classes ) )
		$classes = implode( ' ', magomra_trim_array( $classes ) );

	return preg_replace('/<li>/','<li class="' . trim( $classes ) . '">', $bookmarks );
}

/* =WP_LIST_PAGES WALKER
-------------------------------------------------------------- */
class magomra_walker_page extends Walker_Page {
	
	function start_lvl( &$output, $depth ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1 ); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			'menu-depth-' . $display_depth,
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >= 2 ? 'sub-sub-menu' : '' )
		);
		
		$class_names = implode( ' ', $classes );
		
		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
	
	function end_lvl ( &$output, $depth ) {
		$output .= '</ul>' . "\n";
	}
	
	function start_el( &$output, $page, $depth, $args, $current_page ) {
		$indent = ( $depth ? str_repeat( "\t", $depth ) : '' ); // code indent
		extract( $args, EXTR_SKIP ); // extract args
		
		// css classes
		$classes = array(
			'menu-item', 
			'menu-item-'. $page->ID,
			'menu-item-depth-' . $depth, 
			( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' )
		);
		
		$link_classes = array(
			'menu-link',
			( $depth == 0 ? 'main-menu-link' : 'sub-menu-link' )
		);
		
		// build html
		$class_names = esc_attr( implode( ' ', apply_filters( 'page_css_class', $classes, $page ) ) );
		$link_class_names = implode( ' ', $link_classes );
	    $output .= sprintf( 
			'%1$s<li class="%2$s"><a href="%3$s" title="%4$s" class="%7$s">%5$s%4$s%6$s</a>', 
			$indent, // 1
			$class_names, // 2
			get_page_link( $page->ID ), // 3
			esc_attr( apply_filters( 'the_title', $page->post_title ) ), // 4
			$link_before, // 5
			$link_after, // 6
			$link_class_names //7
		);
	}
}

/* =NAV_MENU WALKER
-------------------------------------------------------------- */
class magomra_walker_nav_menu extends Walker_Nav_Menu {
    
	// add classes to ul sub-menus
	function start_lvl( &$output, $depth ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'sub-menu',
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >=2 ? 'sub-sub-menu' : '' ),
			'menu-depth-' . $display_depth
			);
		$class_names = implode( ' ', $classes );
		
		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

	// add main/sub classes to li's and links
	 function start_el( &$output, $item, $depth, $args ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		
		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
		
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s', 
			$args->before,
			$attributes,
			$args->link_before,

			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// custom excerpt text
function magomra_excerpt_more( $more ) {
	return '<span class="excerpt-more"> [&hellip;]</span>';
}
add_filter( 'excerpt_more', 'magomra_excerpt_more' );


// custom excerpt length
add_filter( 'excerpt_length', create_function( '', 'return ' . 72 . ';' ) );

/* =HOOKS AND FILTERS
-------------------------------------------------------------- */
add_filter( 'get_search_form', 'magomra_searchform_filter' );
add_filter( 'wp_title', 'magomra_title_filter', 10, 3 );
add_filter( 'wp_list_bookmarks', 'magomra_blogroll_filter', 10, 1);
?>