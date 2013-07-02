<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package views_base
 */

get_header(); ?>

		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Access denied', 'views_base' ); ?></h1>
				</header>

				<div class="entry-content">

<?php if ( !is_user_logged_in() ) { ?>
					<p><?php _e( 'If this page exists, you may have to log in to see it.', 'views_base' ); ?></p>
        <p>Need an account? <a href="/wp-login.php?action=register">Register here.</a></br>
        Forgot your password? <a href="/wp-login.php?action=lostpassword">Get a new one here.</a></p>
<?php wp_login_form( $args );} ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->

<?php get_footer(); exit; ?>
