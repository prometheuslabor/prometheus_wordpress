<?php 
$offset = 72000;
header( 'Content-type: text/css' ); 
header( 'Cache-Control: must-revalidate' );
header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', time() + $offset ) . ' GMT' );

$option = unserialize( urldecode( $_GET['css'] ) );
$sidebar_location = ( isset( $option['l'] ) ? $option['l'] : 'r' );
$content_width = ( isset( $option['c'] ) ? $option['c'] : 762 );
$sidebar_width = ( isset( $option['s'] ) ? $option['s'] : 252 );
$header_image = ( isset( $option['h'] ) ? $option['h'] : false );
$header_width = ( isset( $option['w'] ) ? $option['w'] : 140 );
$header_height = ( isset( $option['e'] ) ? $option['e'] : 1040 );
$text_color = ( isset( $option['t'] ) ? $option['t'] : 'blank' );
if( empty( $text_color ) ) $text_color = 'blank';
$bgcolor = ( isset( $option['b'] ) ? $option['b'] : 'ddd' );
$logged_in = ( isset( $option['a'] ) ? $option['a'] : false );

$container_width = ( $content_width + $sidebar_width + 30 );
?>
@charset "utf-8";
/*
Dynamically generated stylesheet 
Variables: <?php print_r( $option );?> 
Last Cached: <?php echo date( 'D, d M Y H:i:s' ); ?>
*/

html,
body {
	background-color: #<?php echo $bgcolor; ?>;
}

<?php if( !empty( $header_image ) ) : ?>
#branding {
	background: transparent url('<?php echo $header_image; ?>') repeat-y scroll top center;
	background-size: 1040px 140px;
}
<?php endif; ?>

#branding h1 a,
#branding h2 {
	color: #<?php echo $text_color; ?>;
	text-decoration: none;
	text-shadow: 1px 1px 2px #000;
}
#top-navigation-primary {
	top: <?php echo ( $logged_in ? 140 : 119 ); ?>px;
}
#container {
	width: <?php echo $container_width; ?>px;
}
#content {
	width: <?php echo $content_width; ?>px;
}
#sidebar {
	margin<?php if( $sidebar_location == 'l' ) : ?>-right: 30px<?php elseif( $sidebar_location == 'r' ) : ?>-left: 30px<?php else : ?>-: 0<?php endif; ?>;
	width: <?php echo $sidebar_width; ?>px;
}
.widget {
	overflow: hidden;
	max-width: <?php echo $sidebar_width - 2; ?>px;
}
.widget > * {
	max-width: <?php echo $sidebar_width - 16; ?>px;
}
.entry-content > * {
	max-width: <?php echo $content_width - 32; ?>px;
}
.wp-caption {
	max-width: <?php echo $content_width - 32 - 12; ?>px;
}
.wp-caption *,
.wp-caption img {
	max-width: <?php echo $content_width - 32 - 24; ?>px;
}
