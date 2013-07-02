<?php get_header(); ?>

<div id="content">

<?php if ( have_posts() ) : ?>               

<?php while ( have_posts() ) : the_post() ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo 'Permalink to ' . the_title_attribute( 'echo=false' ); ?>" rel="bookmark"><?php $magomra_post_title = the_title( null, null, false ); echo ( empty( $magomra_post_title ) ) ? '(no title)' : $magomra_post_title; ?></a></h2>
 
				<?php get_template_part( 'index', 'entry_meta' ); ?>
 
		<div class="entry-content">
			<?php magomra_the_post_thumbnail(); ?>
			<?php if( magomra_option( 'post_excerpt' ) == 'post' ) the_content( magomra_option( 'keep_reading_text' ) ); 
			else the_excerpt(); ?>
		</div><!-- /entry-content -->

		<div class="entry-content-footer">
			<?php if( magomra_option( 'icon_area' ) ) { ?>
				<div class="magomra-icon-box"><?php get_template_part( 'index', 'icon_area' ); ?></div><?php } ?>
			<?php wp_link_pages( 'before=<div class="page-link">Pages: &after=</div>' ); ?>
		</div>
 
		<div class="entry-utility">
			<span class="meta-pre">Posted in </span>
			<span class="meta-categories"><?php echo get_the_category_list(', '); ?></span>
			<span class="meta-sep"> | </span>
			<?php the_tags( '<span class="meta-pre">Tagged </span><span class="tag-links">', ', ', '</span><span class="meta-sep"> | </span>' ) ?>
			<span class="comments-link"><?php comments_popup_link( 'Leave a comment', '1 Comment', '% Comments' ); ?> </span>
			<?php // edit post link
	if( !magomra_option( 'edit_link' ) )
		edit_post_link( 'Edit', ' ' . magomra_option( 'body_sep_char' ) . ' ' . '<span class="edit-link">', '</span>'); ?>
		</div><!-- /entry-utility -->
	</div><!-- /post-<?php the_ID(); ?>-->

<?php endwhile; ?>

<?php else : ?>
<div id="content">
				<div id="post-0" class="search error-404 hentry">
                	<h2 class="entry-title">Nothing Found</h2>
		            <div class="entry-content">
                    	<p>Sorry, but we were unable to find what you were searching for. Care to try some different keywords?</p>
						<?php get_search_form(); ?>
                
					</div><!-- .entry-content -->
	            </div><!-- #post-0 -->
				
            </div><!-- #content -->

<?php endif; ?>

		<?php magomra_index_nav(); ?>

</div><!-- /content -->

<?php get_footer(); ?>