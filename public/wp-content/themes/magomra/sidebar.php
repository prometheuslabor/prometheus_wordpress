<ul id="sidebar">
	<?php if( !is_single() ) magomra_special_index( $post ); ?>
	<?php if( !dynamic_sidebar( 'main_sidebar' ) ) magomra_default_sidebar(); ?>
</ul>