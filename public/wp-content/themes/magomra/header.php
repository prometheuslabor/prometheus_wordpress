<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title( magomra_option( 'title_sep_char' ) ); ?></title>
<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<?php magomra_enqueue_styles(); ?>

<!--[if IE 7]>
<link rel="stylesheet" href="<?php echo trailingslashit( get_stylesheet_directory_uri() ); ?>browser-ie7.css" type="text/css" />
<![endif]-->

<?php if( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php magomra_code_insert( 'css_code', '<style type="text/css">', '</style>' ); ?>
<?php magomra_code_insert( 'header_code' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<?php $magomra_header_textcolor = get_header_textcolor(); ?>
<div id="header">

	<div id="branding">
		<h1 id="site-title"<?php echo ( empty( $magomra_header_textcolor ) || $magomra_header_textcolor == 'blank' ? ' style="display: none; class="assistive-text"' : '' ); ?>><a href="<?php echo home_url(); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 id="site-description"<?php echo ( empty( $magomra_header_textcolor ) || $magomra_header_textcolor == 'blank' ? ' style="display: none; class="assistive-text"' : '' ); ?>><?php bloginfo( 'description' ); ?></h2>
		
		<div id="top-navigation-primary" class="top-navigation">
			<?php magomra_nav_menu( 'primary' ); ?>
			<div id="top-navigation-divider"></div>
		</div>
	</div><!-- /#branding -->
	

	<?php magomra_nav_menu( 'secondary' ); ?>

</div><!-- /#header -->	

<div id="container">
<?php if( magomra_option( 'sidebar_location' ) == 'l' ) get_sidebar(); ?>