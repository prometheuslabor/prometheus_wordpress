<?php
//update_option('siteurl','http://localhost//*...*/public');
//update_option('home','http://localhost//*...*//public');

//wp_register_script('textfill', get_bloginfo('stylesheet_directory').'/js/textfill.js', array('jquery'));
//wp_enqueue_script('textfill');

if ( function_exists('register_sidebar') ) {
	register_sidebar( array(
		'name' => __( 'Above Header'),
		'id' => 'header_above',
		'description' => __( 'Place content above the header of your site', 'prometheus-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s pull-right" style="margin-right: 20px;">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Header Left'),
		'id' => 'header_left',
		'description' => __( 'Place content to the left of the header of your site', 'prometheus-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s span3">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Header Center'),
		'id' => 'header_content',
		'description' => __( 'Place content in the middle of the header of your site (usually in conjunction with disabling header text)', 'prometheus-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Header Right'),
		'id' => 'header_right',
		'description' => __( 'Place content to the right of the header of your site', 'prometheus-wp' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s span3">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Front Page Slideshow'),
		'id' => 'slideshow',
		'description' => __( 'Place a slideshow in the front page of your site', 'prometheus-wp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Front Page Feature'),
		'id' => 'feature',
		'description' => __( 'Place a widget in the featured position front page of your site', 'prometheus-wp' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s jtextfill">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

function prometheus_wp_scripts()
{
   wp_enqueue_script('twitter-bootstrap-hover-dropdown', get_stylesheet_directory_uri() . '/js/twitter-bootstrap-hover-dropdown.min.js',array('jquery'),'1.0',false);
   wp_enqueue_script('tw-hover-dropdown-activate', get_stylesheet_directory_uri() . '/js/hover.js',array('jquery'),'1.0',true);
   wp_enqueue_script('jquery-placeholder', get_stylesheet_directory_uri() . '/js/jquery.placeholder.min.js',array('jquery'),'1.0',false);
   wp_enqueue_script('jq-placeholder-activate', get_stylesheet_directory_uri() . '/js/placeholders.js',array('jquery'),'1.0',true);
   wp_enqueue_script('textfill', get_stylesheet_directory_uri() . '/js/textfill.js',array('jquery'),'1.0',false);

}

add_action('wp_enqueue_scripts','prometheus_wp_scripts');

if ( ! function_exists( 'prometheus_wp_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author,
* comment and edit link
*
* @author	Konstantin Obenland
* @since	1.0.0 - 05.02.2012
*
* @return	void
*/
function prometheus_wp_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a>', 'the-bootstrap' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'the-bootstrap' ), get_the_author() ) ),
			get_the_author()
	);
	if ( comments_open() AND ! post_password_required() ) { ?>
		<span class="sep"> | </span>
		<span class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'the-bootstrap' ) . '</span>', __( '<strong>1</strong> Reply', 'the-bootstrap' ), __( '<strong>%</strong> Replies', 'the-bootstrap' ) ); ?>
		</span>
		<?php
	}
	edit_post_link( __( 'Edit', 'the-bootstrap' ), '<span class="sep">&nbsp;</span><span class="edit-link label">', '</span>' );
}
endif;

function prometheus_wp_customize_register( $wp_customize )
{
	$wp_customize->add_setting( 'prometheus_wp_show_colophon' , array(
	    'default'     => true,
	    'transport'   => 'refresh',
	) );

	$wp_customize->add_section( 'prometheus_wp' , array(
	    'title'      => __('Prometheus Theme','prometheus_wp'),
	    'priority'   => 30,
	) );

	$wp_customize->add_control( 'prometheus_wp_show_colophon', array(
		'label'		=>	__( 'Show Prometheus colophon.', 'prometheus-wp' ),
		'section'	=>	'prometheus_wp',
		'settings'	=>	'prometheus_wp_show_colophon',
		'type'		=>	'checkbox',
	) );
}
add_action( 'customize_register', 'prometheus_wp_customize_register' );

function rdpw($array) { print '<script type="text/javascript">console.dir(';
	print json_encode($array);
	print ');</script>';
}

?>
