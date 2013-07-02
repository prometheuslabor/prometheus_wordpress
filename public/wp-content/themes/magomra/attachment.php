<?php get_header(); ?>

<div id="content">
<?php while ( have_posts() ) : the_post() ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php // safely get post title (ATTACHMENT VERSION)
			$magomra_parent_title = get_the_title( $post->post_parent );
			if( empty( $magomra_parent_title ) ) $magomra_parent_title = '(no title)';

		printf( '<h2 class="entry-title"><span class="entry-title-pre"><a href="%1$s" title="Permalink to %3$s" rel="bookmark">From %4$s</a></span>: <a href="%2$s" title="Permalink to this %5$s from %3$s" rel="bookmark">%3$s</a></h2>',
			get_permalink( $post->post_parent ),
			get_permalink(),
			$magomra_parent_title,
			( is_page( $post->post_parent ) ? 'Page' : 'Post' ),
			( wp_attachment_is_image() ? 'image' : 'file' ) );
		?>
 
		<?php get_template_part( 'index', 'entry_meta' ); ?>
 
		<div class="entry-content">
			<?php 
						
				printf( '<p>&laquo; Return to <a href="%5$s" title="Return to %3$s">%3$s</a></p><p class="attachment aligncenter"><a href="%1$s" title="%2$s from %3$s" rel="attachment">%4$s</a></p>', 
					wp_get_attachment_url( $post->ID ),
					get_the_title(),
					get_the_title( $post->post_parent ),
					wp_get_attachment_image( $post->ID, 'large', true ),
					get_permalink( $post->post_parent )				
				);
			?>
		<div class="attachment-caption"><?php the_excerpt(); ?></div>
		
		<?php if( magomra_option( 'attachment_code' ) ) echo '<div class="gallery-include aligncenter">' . magomra_option( 'attachment_code' ) . '</div>'; ?>
					
		</div><!-- /entry-content -->
 
			<div class="entry-content-footer">
				<div class="gallery-navigation">
					<div class="gallery-navigation-prev gallery-navigation"><?php previous_image_link( false, '&laquo; Previous Image') ?></div>
					<div class="gallery-navigation-next gallery-navigation"><?php next_image_link( false, 'Next Image &raquo;') ?></div>
					
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>
				
			</div>
 
		<div class="entry-utility">
                    <?php printf( 'Bookmark the <a href="%1$s" title="Permalink to %2$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%3$s" title="Comments RSS to %2$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.',
                        get_permalink(),
                        the_title_attribute( 'echo=0' ),
                        get_post_comments_feed_link() ); ?>
 
<?php 
	if( $post->comment_status == 'open'  &&  $post->ping_status == 'open' ) 
		$magomra_comment_status = '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or <a class="trackback-link" href="' . get_trackback_url() . '" title="Trackback URL for your post" rel="trackback">leave a trackback</a>.';
		
	elseif ( $post->comment_status != 'open'  &&  $post->ping_status == 'open' ) 
		$magomra_comment_status = 'Comments are closed, but you can <a class="trackback-link" href="' . get_trackback_url() . '" title="Trackback URL for your post" rel="trackback">leave a trackback</a>.';

	elseif ( $post->comment_status == 'open'  &&  $post->ping_status != 'open' ) 
		$magomra_comment_status = 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.';
		
	elseif ( $post->comment_status != 'open'  &&  $post->ping_status != 'open' ) 
		$magomra_comment_status = 'Both comments and trackbacks are currently closed.';
	
	echo $magomra_comment_status;		
					
// edit post link
	if( !magomra_option( 'edit_link' ) )
		edit_post_link( 'Edit', ' ' . magomra_option( 'body_sep_char' ) . ' ' . '<span class="edit-link">', '</span>'); ?>
                    </div><!-- .entry-utility -->
	</div><!-- /.entry ?>-->

<?php endwhile; ?>




		<?php comments_template( '', true ); ?>

</div><!-- /content -->

<?php get_footer(); ?>