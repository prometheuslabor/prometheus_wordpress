<?php get_header(); ?>

<div id="content">
<?php while ( have_posts() ) : the_post() ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php // safely get post title
		$magomra_title_attribute = the_title_attribute( array( 'echo' => false ) );
		$magomra_post_title = get_the_title();
		
			if( empty( $magomra_title_attribute ) ) {
				$magomra_title_attribute = 'this post';
				$magomra_post_title = '(no title)';
			}

		printf( '<h2 class="entry-title"><a href="%1$s" title="Permalink to %2$s" rel="bookmark">%3$s</a></h2>',
			get_permalink(),
			$magomra_title_attribute,
			$magomra_post_title ); 
		?>
 
		<?php get_template_part( 'index', 'entry_meta' ); ?>
 
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- /entry-content -->
 		<div class="entry-content-footer">
		<?php if( magomra_option( 'icon_area' ) ) : ?>
				<div class="magomra-icon-box">
				<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
					<?php get_template_part( 'index', 'icon_area' ); ?>
				</div>
			<?php endif; ?>
		<?php wp_link_pages( 'before=<div class="page-link">Pages: &after=</div>' ); ?>
		<div class="clear"></div>
		</div>
		<div class="entry-utility">
                    <?php printf( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.',
                        get_the_category_list( ', ' ),
                        get_the_tag_list( ' and tagged ', ', ', '' ),
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
?>		
					
<?php // edit post link
	if( !magomra_option( 'edit_link' ) )
		edit_post_link( 'Edit', ' ' . magomra_option( 'body_sep_char' ) . ' ' . '<span class="edit-link">', '</span>'); ?>
                    </div><!-- .entry-utility -->
	</div><!-- /post-<?php the_ID(); ?>-->

<?php endwhile; ?>

		<?php comments_template( '', true ); ?>

		<?php next_post_link( '<div class="post-navigation-next">%link</div>', '&laquo; %title' ); ?>
		<?php previous_post_link( '<div class="post-navigation-prev">%link</div>', '%title &raquo;' ); ?>

</div><!-- /content -->

<?php get_footer(); ?>