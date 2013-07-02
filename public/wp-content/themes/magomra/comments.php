            <div id="comments">
<?php
    $req = get_option( 'require_name_email' ); // Checks if fields are required.

    if( post_password_required() ) :
?>
                <div class="nopassword">This post is password protected. Enter the password to view any comments.<?php // add this text to options ?></div>
            </div><!-- .comments -->
<?php
        return;
    endif;
?>
 
<?php if( have_comments() ) : ?>
 
<?php
$magomra_ping_count = $magomra_comment_count = 0;
foreach ( $comments as $comment )
    ( get_comment_type() == "comment" ? $magomra_comment_count++ : $magomra_ping_count++ );


if( !empty( $comments_by_type['comment'] ) ) : ?>
 
                <div id="comments-list" class="responses">
                    <div id="comments-title-container" class="responses-title-container">
						<h3 id="comments-title" class="responses-title">
							<?php magomra_plural( $magomra_comment_count, 'Comment' ); ?>
						</h3>
						
						<div id="comments-nav-above" class="comments-navigation">
							<?php $magomra_total_pages = get_comment_pages_count(); 
							if( $magomra_total_pages > 1 ) paginate_comments_links(); ?>
						</div>
						
						<div class="clear"></div>
						
					</div><!-- ./comments-title-container -->
               
				<ol><?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'magomra_custom_comments' ) ); ?></ol>
 
				<?php $magomra_total_pages = get_comment_pages_count(); 
				if( $magomra_total_pages > 1 ) : ?>

					<div class="comments-footer">
						<div id="comments-nav-below" class="comments-navigation">
					   		<?php paginate_comments_links(); ?>
						</div><!-- #comments-nav-below -->
					</div>
				
				<?php endif; ?>                  
 
		</div><!-- #comments-list .comments -->
 
<?php endif; // end if ( $comment_count ) ?>
 
<?php if( !empty($comments_by_type['pings' ]) ) : ?>
 
                <div id="trackbacks-list" class="trackbacks responses">
                    <div class="responses-title-container">
						<h3 class="responses-title"><?php magomra_plural( $magomra_ping_count, 'Trackback'); ?></h3>
						<div class="clear"></div>
					</div>
 
                    <ol><?php wp_list_comments(array( 'type' => 'pings', 'callback' => 'magomra_custom_pings' )); ?></ol>            
 
                </div><!-- #trackbacks-list .comments -->          
 
<?php endif // end if ( $ping_count ) */ ?>
<?php endif // end if ( $comments ) */ ?>
 
            </div><!-- #comments -->
			
<?php 
$magomra_comment_form_args = array(
	'comment_notes_after' => '<div id="comment_after">' . magomra_option( 'post_comment_message' ) . '</div>',
	'comment_field' => '<p class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" name="comment" cols="45" rows="8"' . ( magomra_option( 'w3c_comply' ) ? '' : ' aria-required="true"' ) . '></textarea></p>' // w3c rules
);
			comment_form( $magomra_comment_form_args ); ?>