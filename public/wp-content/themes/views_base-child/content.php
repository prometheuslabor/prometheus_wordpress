<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package views_base
 */
?>
	<?php $has_thumbnail = has_post_thumbnail(); ?>
        <?php if ($has_thumbnail) {
		$storycontent_class = 'story-with-thumbnail';
              }
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( is_single() ) : ?>
			<div class="storywrapper" style="float: left; width: 100%">
				<div class="storycontent <?php echo $storycontent_class ?>">
					<div class="storycol" style="margin-right: 20px;">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="entry-content">
							<?php the_content( __( 'Read more <span class="meta-nav">&rArr;</span>', 'views_base' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'views_base' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
					</div>
				</div>
			</div>
			<div class="storydate" style="float:left; width:70px; margin-left: -100%">
					<div class="storycol">
						<div class="entry-meta">
							<?php views_base_posted_on(); ?>
						</div><!-- .entry-meta -->
					</div>
				</div>
			<?php if ($has_thumbnail):  ?>
			<div class="storypic">

				<div class="storycol">
					<?php
						echo '<div class="story-image">';
						echo '<div class="story-image-image">';
						the_post_thumbnail('medium', array('class' => 'alignright', 'alt' => post_thumbnail_caption('false')));
						echo '</div>';
						echo '<div class="story-image-caption">';
						post_thumbnail_caption();
						echo '</div>';
						echo '</div>';
					?>
				</div>
			</div>
			<?php endif; ?>
			</story>

			<?php else : ?>
			<div class="storywrapper" style="float: left; width: 100%">
				<div class="storycontent <?php echo $storycontent_class ?>">
					<div class="storycol" style="margin-right: 20px;">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'views_base' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
						<div class="entry-content">
							<?php the_content( __( 'Read more <span class="meta-nav">&rArr;</span>', 'views_base' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'views_base' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
					</div>
				</div>
			</div>
			<div class="storydate" style="float:left; width:70px; margin-left: -100%">
					<div class="storycol">
						<div class="entry-meta">
							<?php views_base_posted_on(); ?>
						</div><!-- .entry-meta -->
					</div>
				</div>
			<?php if ($has_thumbnail):  ?>
			<div class="storypic" style="float: left; width: 300px; margin-left: -300px">

				<div class="storycol">
					<?php
						echo '<div class="story-image">';
						echo '<div class="story-image-image">';
						the_post_thumbnail('medium', array('class' => 'alignright', 'alt' => post_thumbnail_caption('false')));
						echo '</div>';
						echo '<div class="story-image-caption">';
						post_thumbnail_caption();
						echo '</div>';
						echo '</div>';
					?>
				</div>
			</div>
			<?php endif; ?>
			</story>

			<?php endif; // is_single() ?>
		</header><!-- .entry-header -->

		<footer class="entry-meta">
			<?php views_base_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'views_base' ), '<span class="edit-link">', '</span>' ); ?>

			<?php if ( ! is_single() ) : // Displaying index, archive, search ?>
			<?php if ( comments_open() ) : ?>
			<span class="sep"> | </span>
			<span class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'views_base' ) . '</span>', __( '1 Reply', 'views_base' ), __( '% Replies', 'views_base' ) ); ?>
			</span>
			<?php endif; // comments_open() ?>
			<?php else : // Displaying single posts ?>
			<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
			<div id="author-info">
				<div id="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
				</div><!-- #author-avatar -->
				<div id="author-description">
					<h2><?php printf( __( 'About %s', 'views_base' ), get_the_author() ); ?></h2>
					<?php the_author_meta( 'description' ); ?>
					<div id="author-link">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
							<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'views_base' ), get_the_author() ); ?>
						</a>
					</div><!-- #author-link	-->
				</div><!-- #author-description -->
			</div><!-- #author-info -->
				<?php endif; ?>
			<?php endif; // is_single() ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
<br style="clear: both;" />
