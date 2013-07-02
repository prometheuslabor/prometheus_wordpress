<?php get_header(); ?>

<div id="content">
<?php while ( have_posts() ) : the_post() ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo 'Permalink to ' . the_title_attribute( 'echo=false' ); ?>" rel="bookmark"><?php $magomra_post_title = the_title( null, null, false ); echo ( empty( $magomra_post_title ) ) ? '(no title)' : $magomra_post_title; ?></a></h2>
 
				<?php get_template_part( 'index', 'entry_meta' ); ?>
 
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- /entry-content -->
		<div class="entry-content-footer"><?php wp_link_pages( 'before=<div class="page-link">Pages: &after=</div>' ); ?></div>
 
		<div class="entry-utility">
                    <?php printf( '%1$sBookmark the <a href="%2$s" title="Permalink to %3$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%4$s" title="Comments RSS to %3$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.',
                        get_the_tag_list( 'This entry was tagged ', ', ', '. ' ),
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
					
<?php
			// edit post link
	if( !magomra_option( 'edit_link' ) )
		edit_post_link( 'Edit', ' ' . magomra_option( 'body_sep_char' ) . ' ' . '<span class="edit-link">', '</span>'); ?>
                    </div><!-- .entry-utility -->
	</div><!-- //.entry-->

<?php endwhile; ?>

		<?php comments_template( '', true ); ?>

</div><!-- /content -->

<?php get_footer(); ?>