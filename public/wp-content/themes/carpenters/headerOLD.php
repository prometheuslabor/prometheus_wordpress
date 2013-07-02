<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


<!-- :::::::::: Cufon - BookmanOldStyle Bold :::::::::: -->
<script type="text/javascript" src="<?php bloginfo( 'template_url' ) ?>/js/cufon.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ) ?>/js/bookman_600.font.js"></script>

<script type="text/javascript">
	Cufon.replace('.site-title');
	Cufon.replace('#footer');
</script>

<!--[if IE 7]>	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/iestyle.css" />
<![endif]-->
<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/ie6style.css" />
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="bgdiv">
	<div id="header">
	
		<!--Begin Pages Navigation Bar-->
		<div id="pages">
			<a href="<?php bloginfo('url'); ?>"><?php $logo = (get_option('wooden_logo') <> '') ? get_option('wooden_logo') : get_bloginfo('template_directory').'/images/logo.png'; ?>
				<img src="<?php echo esc_url($logo); ?>" alt="Logo" class="logo"/></a>
			<img src="<?php bloginfo('template_directory'); ?>/images/nav-line-<?php echo esc_attr(get_option('wooden_color_scheme')); ?>.gif" alt="logo" style="float: left; margin-left: 15px; margin-top: 8px;" />
			
			<?php $menuClass = '';
			$primaryNav = '';
			if (function_exists('wp_nav_menu')) {
				$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'depth' => 1, 'echo' => false ) ); 
			};
			if ($primaryNav == '') { ?>
				<ul class="<?php echo $menuClass; ?>">
					<?php if (get_option('wooden_home_link') == 'on') { ?>
						<li class="page_item"><a href="<?php bloginfo('url'); ?>"><?php esc_html_e('Home','Wooden') ?></a></li>
					<?php }; ?>

					<?php if (get_option('wooden_swap_navbar') == 'false') { ?>
						<?php show_page_menu($menuClass,false,false); ?>
					<?php } else { ?>
						<?php show_categories_menu($menuClass,false); ?>
					<?php } ?>
				</ul>
			<?php }
			else echo($primaryNav); ?>

		</div>
		<!--End Pages Navigation Bar-->
		
		<div style="clear: both;"></div>
	</div>
	
	<div id="wrapper2">
		<!--Site Title-->
		<div class="site-title">
			CARPENTERS LOCAL UNION 156<br>
			OREGON & SW WASHINGTON
		</div>
		<!--Begin Search Bar-->
		<div class="search_bg">
			<div id="search">
				<form method="get" action="<?php echo home_url(); ?>" style="padding:0px 0px 0px 0px; margin:0px 0px 0px 0px">
					<input type="text"  name="s" value="<?php echo esc_attr( get_search_query() ); ?>"/>
					<input type="image" class="input" src="<?php bloginfo('template_directory'); ?>/images/search.gif" value="submit"/>
				</form>
			</div>
		</div>
		<!--End Search Bar-->