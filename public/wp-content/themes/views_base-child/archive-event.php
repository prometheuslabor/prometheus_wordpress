<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package views_base
 */

get_header(); ?>
<div class="wptypes_body">
	<?php get_sidebar('header_sidebar'); ?>
	<div class="wptypes_center">
		<div class="wptypes_middle <?php echo $class_base_theme->middle_switch()?>">
			<?php get_sidebar('center_header_sidebar'); ?>
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<h1 class="archive-title"><?php
				if ( is_day() ) {
					printf( __( 'Daily Archives: %s', 'views_base' ), '<span>' . get_the_date() . '</span>' );
				} elseif ( is_month() ) {
					printf( __( 'Monthly Archives: %s', 'views_base' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'views_base' ) ) . '</span>' );
				} elseif ( is_year() ) {
					printf( __( 'Yearly Archives: %s', 'views_base' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'views_base' ) ) . '</span>' );
				} elseif ( is_tag() ) {
					printf( __( 'Tag Archives: %s', 'views_base' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					// Show an optional tag description
					$tag_description = tag_description();
					if ( $tag_description )
						echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
				} elseif ( is_category() ) {
					printf( __( 'Category Archives: %s', 'views_base' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					// Show an optional category description
					$category_description = category_description();
					if ( $category_description )
						echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
				} else {
					_e( 'Upcoming Events', 'views_base' );
				}
			?></h1>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			views_base_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->

			<?php get_sidebar('center_foot_sidebar'); ?>
		</div>
		<?php get_sidebar('first_sidebar'); ?>
		<?php get_sidebar('second_sidebar'); ?>
	</div>
	<?php get_sidebar('foot_sidebar'); ?>
</div>
<?php get_footer(); ?>
