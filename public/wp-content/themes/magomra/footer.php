<?php if( magomra_option( 'sidebar_location' ) == 'r' ) get_sidebar(); ?>
	<div class="clear"></div>
</div><!-- /container -->

<div id="footer">
	<span class="footer-pre">Powered by </span><a href="http://wordpress.org" class="footer-link">WordPress</a>
	<span class="footer-sep"> <?php echo magomra_option( 'footer_sep_char' ); ?> </span>
	<span class="footer-link-em">Magomra</span> Theme (by <a class="footer-link" href="http://shinraholdings.com">Shinra Web Holdings</a>)
</div><!-- /footer -->

<?php magomra_code_insert( 'footer_code' ); ?>
<?php wp_footer(); ?>

</body>
</html>