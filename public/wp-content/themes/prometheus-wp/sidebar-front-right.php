<?php
/** sidebar-front-right.php
 *
 * @author		Morris Singer
 * @package		Prometheus_WP
 * @since		1.0.0
 */

tha_sidebars_before(); ?>
<section id="secondary-front-right" class="secondary widget-area span3" role="complementary">
	<?php tha_sidebar_top();
	
	if ( ! dynamic_sidebar( 'front-right' ) ) {
		the_widget( 'WP_Widget_Archives', array(
			'count'		=>	0,
			'dropdown'	=>	0
		), array(
			'before_widget'	=>	'<aside id="archives" class="widget well widget_archives">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h3 class="widget-title">',
			'after_title'	=>	'</h3>',
		) );
		the_widget( 'WP_Widget_Meta', array(), array(
			'before_widget'	=>	'<aside id="meta" class="widget well widget_meta">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h3 class="widget-title">',
			'after_title'	=>	'</h3>',
		) );
	} // end sidebar widget area
	
	tha_sidebar_bottom(); ?>
</section><!-- #secondary .widget-area -->
<?php tha_sidebars_after();


/* End of file ancilliary_sidebar.php */
/* Location: ./wp-content/themes/prometheus_wp/ancilliary_sidebar.php */