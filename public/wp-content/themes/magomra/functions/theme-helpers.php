<?php /* Cute helper functions and functions that should be in WordPress but aren't */

/* =CHECK WP VERSION (makes sure it has sufficient comparison decimals)
-------------------------------------------------------------- */
function magomra_is_wp_version( $is_ver ) {
	$wp_ver = explode( '.', get_bloginfo( 'version' ) );
	$is_ver = explode( '.', $is_ver );
	for( $i=0; $i<=count( $is_ver ); $i++ )
		if( !isset( $wp_ver[$i] ) ) array_push( $wp_ver, 0 );

	foreach( $is_ver as $i => $is_val )
		if( $wp_ver[$i] < $is_val ) return false;
	return true;
}


/* =TRIM ARRAY
-------------------------------------------------------------- */
function magomra_trim_array( $array, $charlist=null ) {
	foreach( $array as $key => $value ) 
		$array[$key] = trim( $value, $charlist );
	
	return $array;
}

/* =PLURALIZE
-------------------------------------------------------------- */
function magomra_plural( $count, $noun, $echo=true, $irregular_suffix=false ) {
	if( $count !== 1 ) $suffix = ( $irregular_suffix ? $irregular_suffix : 's' ); // special suffix
	else $suffix = '';
	
	$output = $count . ' ' . $noun . $suffix;
	
	if( $echo ) echo $output; 
	else return $output;
}

/* =W3C VALIDATION LINK
-------------------------------------------------------------- */
function magomra_w3c_validator_url( $path=null, $args=null ) {
	$defaults = array(
		'group_errors' => 1,
		'show_source' => 1,
		'html_tidy' => 1,
		'show_outline' => 1,
		'validate_error_pages' => 0,
		'verbose' => 1,
		'use_wp_charset' => 1
		);

	$args = wp_parse_args( ( $args ? $args : array() ), $defaults );
		$uri = urlencode( get_site_url( str_replace( get_site_url(), '', $path ) ) );
		$charset = ( $args['use_wp_charset'] ? strtolower( get_bloginfo( 'charset' ) ) : '%28detect+automatically%29' );
		$doctype = '%28detect+automatically%29';
		$group = $args['group_errors'];
		$ss = $args['show_source'];
		$st = $args['html_tidy'];
		$outline = $args['show_outline'];
		$No200 = $args['validate_error_pages'];
		$verbose = $args['verbose'];
	
	$output = "http://validator.w3.org/check?uri=$uri&charset=$charset&doctype=$doctype&group=$group&ss=$ss&st=$st&outline=$outline&No200=$No200&verbose=$verbose";

	return $output;
}

?>