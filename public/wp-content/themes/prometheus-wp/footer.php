			</div><!-- #page -->
		</div><!-- .container -->
<?php
/** footer.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */

		tha_footer_before(); ?>
		<footer id="colophon" role="contentinfo" class="span12">
			<?php tha_footer_top(); ?>
			<div id="page-footer" class="clearfix">
				<?php wp_nav_menu( array(
					'container'			=>	'nav',
					'container_class'	=>	'subnav',
					'theme_location'	=>	'footer-menu',
					'menu_class'		=>	'credits nav nav-pills pull-left',
					'depth'				=>	3,
					'fallback_cb'		=>	'the_bootstrap_credits',
					'walker'			=>	new The_Bootstrap_Nav_Walker,
				) );
				?>
				<?php if (get_theme_mod('prometheus_wp_show_colophon')) : ?>
					<br />
					<div class="prometheus-colophon">
						Site union-made by: <br />
						<img src="http://prometheuslabor.com/union_made.gif" alt ="Labor Union Websites | Prometheus Labor" title="Labor Union Websites | Prometheus Labor" /> <br />
						<a href="http://prometheuslabor.com" title="Labor Union Websites | Prometheus Labor">Prometheus Labor Union Websites</a>
					</div>
				<?php endif; ?>
			</div><!-- #page-footer .well .clearfix -->
			<?php tha_footer_bottom(); ?>
		</footer><!-- #colophon -->
		<?php tha_footer_after(); ?>

	<!-- <?php printf( __( '%d queries. %s seconds.', 'the-bootstrap' ), get_num_queries(), timer_stop(0, 3) ); ?> -->
	<?php wp_footer(); ?>
	</body>
</html>
<?php


/* End of file footer.php */
/* Location: ./wp-content/themes/the-bootstrap/footer.php */