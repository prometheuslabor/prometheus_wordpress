<?php

require_once('class_base_theme_child.php');

function replace_sidebar_headers() {
  $sidebars = array ('first_sidebar', 'second_sidebar', 'header_sidebar_right');
  foreach ($sidebars as $key) {
    unregister_sidebar($key);
      switch ($key) {
	case 'first_sidebar':
	  $name = "First Sidebar";
	  break;
	case 'second_sidebar':
	  $name = "Second Sidebar";
	  break;
	case 'header_sidebar_right':
	  $name = "Right Header Sidebar";
	  break;
      }
      register_sidebar( array(
        'name' => __( $name, 'views_base' ),
        'id' => $key,
        'before_widget' => '<div class="dropshadowboxes-container dropshadowboxes-center"><section id="%1$s" class="widget %2$s"><div class="widget-content">',
        'after_widget' => '</div></section></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      ) );
  }

}

add_action ( 'widgets_init', 'replace_sidebar_headers', 11 );

function change_post_order(){
        if ('contractor' == get_post_type()){
            global $wp_query;
            $args = array_merge( $wp_query->query, array( 'orderby' => 'title','order' => 'ASC' ) );
            query_posts( $args );
    }
}
add_action('thesis_hook_before_content','change_post_order');

add_action('template_redirect', 'check_permissions');
function check_permissions(){
  global $wp_query,$post,$wpdb;
  $path = trim($_SERVER['REQUEST_URI'],'/');
  if ( !is_user_logged_in() ) {
    switch($path) {
      case 'members':
        status_header( 403 );
        get_template_part( 403 );
    }
  }

  if ( empty($post) ){
    if( !empty($wp_query->query_vars['name'] )){ //If Permalink Settings set to: Post name
      $mypost = $wpdb->get_row($wpdb->prepare("SELECT wp_posts.* FROM wp_posts WHERE 1=1 AND wp_posts.post_name = '%s'",$wp_query->query_vars['name']));
      if ( !empty($mypost->ID) ){
        if (!current_user_can('read_post', $mypost->ID)){
          status_header( 403 );
          get_template_part( 403 );
        }
      }
    }
    else if( !empty($wp_query->query_vars['p'] )){ //If Permalink Settings set to: Default
      $mypost = $wpdb->get_row($wpdb->prepare("SELECT wp_posts.* FROM wp_posts WHERE 1=1 AND wp_posts.ID = '%s'",$wp_query->query_vars['p']));
      if ( !empty($mypost->ID) ){
        if (!current_user_can('read_post', $mypost->ID)){
          status_header( 403 );
          get_template_part( 403 );
        }
      }
    }
  }
}

if ( ! function_exists( 'views_base_posted_on' ) ) :
function views_base_posted_on( $return = false ) {
        $date = '<span class="story-date"><span class="story-month"><span class="date-display-single">' . 
           esc_attr( get_the_date( 'M' ) ) . '</span></span><br />';
        $date .= '<span class="story-day"><span class="date-display-single">' .
           esc_attr( get_the_date( 'j') ) . '</span></span></span>';
	$out = sprintf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>' . $date . '</time></a>', 'views_base' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) )
		//esc_html( get_the_date() ),
		//views_base_posted_by( true )
	);
	if ( $return )
		return $out;
	echo $out;
}
endif;


if ( ! function_exists( 'views_base_posted_by' ) ) :
function views_base_posted_by( $return = false ) {
	//Show author info for blog posts only
	$out = null;
	if(get_post_type() != 'post')return $out;
	$out = sprintf( __( '<span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span>', 'views_base' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'views_base' ), get_the_author() ) ),
		get_the_author()
	);
	if ( $return )
		return $out;

	echo $out;
}
endif;


if ( ! function_exists( 'views_base_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own views_base_entry_meta() to override in a child theme.
 *
 * @uses views_base_posted_on()
 */
function views_base_entry_meta() {
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( __( ', ', 'views_base' ) );

	/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list( '', __( ', ', 'views_base' ) );

	if ( '' != $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'views_base' );
	} elseif ( '' != $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s.', 'views_base' );
	} else {
		$utility_text = __( 'This entry was posted.', 'views_base' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		views_base_posted_on( true )
	);
}
endif;

function post_thumbnail_caption($output = 'true') {
        if ( $thumb = get_post_thumbnail_id() ) {
                if ($output == 'true') {
			echo get_post( $thumb )->post_excerpt;
                } else {
			return get_post( $thumb )->post_excerpt;
                }
        }
}
