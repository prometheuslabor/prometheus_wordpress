<?php get_header(); ?>
<div id="content">

<?php while ( have_posts() ) : the_post() ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php magomra_post_title(); ?>
		<?php get_template_part( 'index', 'entry_meta' ); ?>

		<div class="entry-content">
			<?php magomra_the_post_thumbnail(); ?>
			<?php if( magomra_option( 'post_excerpt' ) == 'post' ) the_content( magomra_option( 'keep_reading_text' ) ); 
			else the_excerpt(); ?>
		</div><!-- /entry-content -->
		
		<div class="entry-content-footer">
			<?php if( magomra_option( 'icon_area' ) ) : ?><div class="magomra-icon-box"><?php get_template_part( 'index', 'icon_area' ); ?></div><?php endif; ?>
			<?php wp_link_pages( 'before=<div class="page-link">Pages: &after=</div>' ); ?>
			<div class="clear"></div>
		</div>
 
		<div class="entry-utility">
			<span class="meta-pre">Posted in </span>
			<span class="meta-categories"><?php echo get_the_category_list(', '); ?></span>
			<span class="meta-sep"> | </span>
			<?php the_tags( '<span class="meta-pre">Tagged </span><span class="tag-links">', ', ', '</span><span class="meta-sep"> | </span>' ) ?>
			<span class="comments-link"><?php comments_popup_link( 'Leave a comment', '1 Comment', '% Comments' ); ?> </span>
			<?php magomra_edit_post_link(); ?>
		</div><!-- /entry-utility -->
	</div><!-- /post-<?php the_ID(); ?>-->

<?php endwhile; ?>

	<?php magomra_index_nav(); ?>
</div><!-- /content -->
<?php get_footer(); ?>