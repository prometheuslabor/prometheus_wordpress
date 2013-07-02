<?php
// theme includes
$magomra_includes = array( 
	'/functions/theme-options.php', 
	'/functions/theme-template.php', 
	'/functions/theme-filters.php', 
	'/functions/theme-helpers.php',	
);

foreach( $magomra_includes as $magomra_value ) 
	require_once( get_template_directory() . $magomra_value );
		
// theme support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background', array( 'default-color' => 'ddd' ) );
add_theme_support( 'custom-header', array(
	'random-default' => false,
	'flex-height' => false,
	'height' => 140,
	'flex-width' => false,
	'width' => 1044,
	'default-text-color' => 'fff',
	'header-text' => true,
	'uploads' => true,
	'admin-preview-callback' => 'magomra_preview_header_cb' ) );

// content width
if ( !isset( $content_width ) ) $content_width = ( magomra_option( 'content_width' ) - 30 );

// editor style
add_editor_style( 'editor-style.css' ); // EDITOR STYLE


// register dynamic sidebar
function magomra_register_sidebar(){
	$args = array(
		'name'          => 'Main Sidebar',
		'id'			=> 'main_sidebar',
		'description'   => 'The main sidebar.',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>' 
	);
	
	register_sidebar( $args );
}

// register nav_menu
function magomra_register_menus() {
	register_nav_menu( 'navigation_menu_primary', 'Main Top Navigation Menu' );
	register_nav_menu( 'navigation_menu_secondary', 'Secondary Top Navigation Menu' );
}

// HOOKS AND FILTERS
add_action( 'widgets_init', 'magomra_register_sidebar' );
add_action( 'after_setup_theme', 'magomra_register_menus' );

?>
