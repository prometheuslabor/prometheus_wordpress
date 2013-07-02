<?php
/** header.php
 *
 * Displays all of the <head> section and everything up till </header>
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0 - 05.02.2012
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<?php tha_head_top(); ?>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<title><?php wp_title( '&laquo;', true, 'right' ); ?></title>
		
		<?php tha_head_bottom(); ?>
		<?php wp_head(); ?>
		<style> html { margin-top: 0 !important;}</style>
		<!--[if lt IE 9]>
			<link rel="stylesheet" type="text/css" href="<?php print get_stylesheet_directory_uri() . '/css/' ?>ie.css" />
		<![endif]-->
	</head>
	
	<body <?php body_class(); ?>>
		<?php tha_header_before(); ?>
		<header id="branding" role="banner" class="span12">
			<?php tha_header_top();
			wp_nav_menu( array(
				'container'			=>	'nav',
				'container_class'	=>	'subnav clearfix',
				'theme_location'	=>	'header-menu',
				'menu_class'		=>	'nav nav-pills pull-right',
				'depth'				=>	3,
				'fallback_cb'		=>	false,
				'walker'			=>	new The_Bootstrap_Nav_Walker,
			) ); ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Above Header') ) : ?>
				<div class="row">
					<div class="span12" id="header-above">
					</div>
				</div>
			<?php endif; ?>

			<?php
				$main_span = 12;
				if ( is_active_sidebar('header_left') ) {
					$main_span -= 3;
				}
				if ( is_active_sidebar('header_right') ) {
					$main_span -= 3;
				}
			?>

			<div class="row">
				<div class="container">
					<?php if ( is_active_sidebar('header_left') ) : ?>
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Left') ) : ?>
							<div class="span3" id="header-left">
							</div>
						<?php endif; ?>
					<?php endif; ?> 

					<hgroup class="span<?php print $main_span; ?>">
						<h1 id="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<span><?php bloginfo( 'name' ); ?></span>
							</a>
						</h1>
						<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>
					
					<?php if ( get_header_image() ) : ?>
					<a id="header-image" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" alt="" class="span<?php print $main_span;?>"/>
					</a>
					<?php endif; // if ( get_header_image() ) ?>

					<?php if ( is_active_sidebar('header_right') ) : ?>
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Header Right') ) : ?>
							<div class="span3" id="header-right">
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>

			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'the-bootstrap' ); ?></h3>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'the-bootstrap' ); ?>"><?php _e( 'Skip to primary content', 'the-bootstrap' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'the-bootstrap' ); ?>"><?php _e( 'Skip to secondary content', 'the-bootstrap' ); ?></a></div>
				<?php if ( has_nav_menu( 'primary' ) OR the_bootstrap_options()->navbar_site_name OR the_bootstrap_options()->navbar_searchform ) : ?>
				<div <?php the_bootstrap_navbar_class(); ?>>
					<div class="navbar-inner">
						<div class="container">
							<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
							<?php if ( the_bootstrap_options()->navbar_site_name ) : ?>
							<span class="brand"><?php bloginfo( 'name' ); ?></span>
							<?php endif;?>
							<div class="nav-collapse">
								<?php wp_nav_menu( array(
									'theme_location'	=>	'primary',
									'menu_class'		=>	'nav',
									'depth'				=>	3,
									'fallback_cb'		=>	false,
									'walker'			=>	new The_Bootstrap_Nav_Walker,
								) ); 
								if ( the_bootstrap_options()->navbar_searchform ) {
									the_bootstrap_navbar_searchform();
								} ?>
						    </div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</nav><!-- #access -->
			<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<nav id="breadcrumb" class="breadcrumb">', '</nav>' );
			}
			tha_header_bottom(); ?>
		</header><!-- #branding --><?php
		tha_header_after();

/* End of file header.php */
/* Location: ./wp-content/themes/the-bootstrap/header.php */
?>
		<div class="container">
			<div id="page" class="hfeed row">
