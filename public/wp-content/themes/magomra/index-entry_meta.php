<?php /* meta-entry
displays the meta information selected in the theme options at the top of each entry
returns comment instead of empty div if nothing to show
*/

	$magomra_text_ssep = ' ' . magomra_option( 'body_sep_char' ) . ' ';

	// check if we have anything to show
	if( magomra_option( 'post_author' ) != 'none' 
	|| magomra_option( 'published_date' ) != 'none' 
	|| magomra_option( 'updated_date' ) != 'none' ) {

	echo '<div class="entry-meta">';

	// author
	if( magomra_option( 'post_author' ) != 'none' ) {
		
		$magomra_flipper = 1; // switch to know if we need a leading seperator or not
		
		// author_link or name_only
		$magomra_p1 = $magomra_p3 = $magomra_p4 = $magomra_p5 = ''; 
		if( magomra_option( 'post_author' ) == 'author_link' ) { 
			$magomra_p1 = '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '" title="View all posts by ';
			$magomra_p3 = '" rel="author">';
			$magomra_p4 = get_the_author();
			$magomra_p5 = '</a>';
		}

		printf( '<span class="entry-meta-pre entry-pre">By </span><span class="entry-meta-item entry-item">%1$s%2$s%3$s%4$s%5$s</span>', $magomra_p1, get_the_author(), $magomra_p3, $magomra_p4, $magomra_p5 );	
	}

	// published date
	if( magomra_option( 'published_date' ) != 'none' ) { 

		if( $magomra_flipper ) echo $magomra_text_ssep; $magomra_flipper = 1; // check if flipped and flip
		
		// date or date_time
		$magomra_p1 = get_the_date();
		
		if( magomra_option( 'published_date' ) == 'date_time' ) 
			$magomra_p2 = ' at ' . get_the_time();
		else $magomra_p2 = '';
		
		
		printf( '<span class="entry-meta-pre entry-pre">Published </span><span class="entry-meta-item entry-item">%1$s%2$s</span>', $magomra_p1, $magomra_p2 ); 
	}

	// last updated date
	if( magomra_option( 'updated_date' ) != 'none' ) { 
		
		if( $magomra_flipper ) echo $magomra_text_ssep; $magomra_flipper = 1; // check if flipped and flip
		
		// date or date_time
		$magomra_p1 = get_the_modified_date();
		if( magomra_option( 'updated_date' ) == 'date_time' ) // date format from WP options
			$magomra_p2 = ' at ' . get_the_modified_time();	
		else $magomra_p2 = '';
		
		printf( '<span class="entry-meta-pre entry-pre">Last Updated </span><span class="entry-meta-item entry-item">%1$s%2$s</span>', $magomra_p1, $magomra_p2 ); 
	}
	
	// edit post link
	if( !magomra_option( 'edit_link' ) )
		edit_post_link( 'Edit', $magomra_text_ssep . '<span class="edit-link">', '</span>'); 
	
	echo '</div><!-- /entry-meta -->';	
}

else echo '<!-- no entry-meta -->';
?>