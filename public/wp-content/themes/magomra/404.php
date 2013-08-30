<?php get_header(); ?>

<?php the_post(); ?>

			<div id="content">
				<div id="post-0" class="error-404 hentry">
                	<h2 class="entry-title">Not Found</h2>
		            <div class="entry-content">
                    	<p>Sorry, but we were unable to find what you were looking for. Perhaps searching will help.</p>
						<?php get_search_form(); ?>
                
					</div><!-- .entry-content -->
	            </div><!-- #post-0 -->
				
            </div><!-- #content -->

<?php get_footer(); ?>