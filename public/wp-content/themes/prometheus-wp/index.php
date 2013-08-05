<?php
/** index.php
 *
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 05.02.2012
 */

get_header(); ?>

<?php if (is_front_page()) :?>
	<?php if(get_theme_mod('prometheus_wp_show_slideshow_feature')) :?>
		<section class="front-content">
			<div class="span6" id="slideshow">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front Page Slideshow') ) : ?>
				<?php endif; ?>
			</div>
			<div class="span6" id="feature">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Front Page Feature') ) : ?>
				<?php endif; ?>
			</div>
			<div class="clearfix"></div>
		</section>
	<?php else :?>
		<div style="height: 40px;"></div>
	<?php endif; ?>
<?php endif; ?>


<? if (is_front_page() && (get_option('prometheus_wp_front_page_layout') == 'three_column')) : ?>
	<?php get_sidebar('front-left'); ?>
		<section id="primary" class="span6">
			<?php tha_content_before(); ?>
			<div id="content" role="main">
				<?php tha_content_top();
				
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( '/partials/content', get_post_format() );
					}
					the_bootstrap_content_nav( 'nav-below' );
				}
				else {
					get_template_part( '/partials/content', 'not-found' );
				}
			
				tha_content_bottom(); ?>
			</div><!-- #content -->
			<?php tha_content_after(); ?>
		</section><!-- #primary -->
	<?php get_sidebar('front-right'); ?>
<? elseif (is_front_page() && (get_option('prometheus_wp_front_page_layout') == 'three_features')) : ?>
	<section class="span4">
		<div class="home-featured">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Featured Left') ) : ?>
			<?php endif; ?>	
		</div>
	</section>
	<section class="span4">
		<div class="home-featured">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Featured Center') ) : ?>
			<?php endif; ?>	
		</div>
	</section>
	<section class="span4" >
		<div class="home-featured">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Featured Right') ) : ?>
			<?php endif; ?>	
		</div>
	</section>
<? else : ?>

	<section id="primary" class="span8">
		<?php tha_content_before(); ?>
		<div id="content" role="main">
			<?php tha_content_top();
			
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					get_template_part( '/partials/content', get_post_format() );
				}
				the_bootstrap_content_nav( 'nav-below' );
			}
			else {
				get_template_part( '/partials/content', 'not-found' );
			}
		
			tha_content_bottom(); ?>
		</div><!-- #content -->
		<?php tha_content_after(); ?>
	</section><!-- #primary -->
	<?php get_sidebar(); ?>

<? endif; ?>


<?php

get_footer();


/* End of file index.php */
/* Location: ./wp-content/themes/the-bootstrap/index.php */