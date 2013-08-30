<?php
/**
 * The theme class.
 *
 * @package views_base
 */
class class_base_theme
{
// default sidebars
	var $sidebar_array = array(
		'second_sidebar'		=>	'Second Sidebar',
		'header_sidebar_left'		=>	'Left Header Sidebar',
		'header_sidebar_right'		=>	'Right Header Sidebar',
		'masthead_sidebar'		=>	'Masthead Sidebar',
		'first_sidebar'			=>	'First Sidebar',
		'center_header_sidebar'	=>	'Center Header Sidebar',
		'center_foot_sidebar'	=>	'Center Foot Sidebar',
		'foot_sidebar_1'		=>	'Foot Sidebar 1',
		'foot_sidebar_2'		=>	'Foot Sidebar 2',
		'foot_sidebar_3'		=>	'Foot Sidebar 3',
	),
// Theme Options Name in database
	$options_name = '',
// Theme Options array in theme options
	$options_arr = array(),
// Theme options page name
	$option_page = 'theme_options',
// Font Size Options in the Theme options page
	$site_title_font_size_options = array(
		'14px' => 'font-size:14px; font-size:1.4rem;',
		'22px' => 'font-size:22px; font-size:2.2rem;',
		'30px' => 'font-size:30px; font-size:3.0rem;',			
		'32px' => 'font-size:32px; font-size:3.2rem;',
		'48px' => 'font-size:48px; font-size:4.8rem;',
		'60px' => 'font-size:60px; font-size:6.0rem;',
		'72px' => 'font-size:72px; font-size:7.2rem;',
		'92px' => 'font-size:92px; font-size:9.2rem;',
	),
	$site_description_font_size_options = array(
		'12px' => 'font-size:12px; font-size: 1.2rem;',
		'14px' => 'font-size:14px; font-size: 1.4rem;',
		'18px' => 'font-size:18px; font-size: 1.8rem;',
		'22px' => 'font-size:22px; font-size: 2.2rem;',
		'28px' => 'font-size:28px; font-size: 2.8rem;',
		'32px' => 'font-size:32px; font-size: 3.2rem;',
		'40px' => 'font-size:40px; font-size: 4.0rem;',
	),
	$article_title_font_size_options = array(
		'12px' => 'font-size:12px; font-size: 1.2rem;',
		'14px' => 'font-size:14px; font-size: 1.4rem;',
		'18px' => 'font-size:18px; font-size: 1.8rem;',
		'22px' => 'font-size:22px; font-size: 2.2rem;',
		'28px' => 'font-size:28px; font-size: 2.8rem;',
		'30px' => 'font-size:32px; font-size: 3.0rem;',
		'40px' => 'font-size:40px; font-size: 4.0rem;',
	),
// Font Family Options in the Theme options page
	$font_family_options = array(
		'Georgia'			=> 'Georgia, serif',
		'Times New Roman'	=> '"Times New Roman", Times, serif',
		'Arial'				=> 'Arial, Helvetica, sans-serif',
		'Helvetica Neue'	=> '"Helvetica Neue",Helvetica,Arial,sans-serif',
		'Lucida Grande'		=> '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		'Tahoma'			=> 'Tahoma, Geneva, sans-serif',
		'Verdana'			=> 'Verdana, Geneva, sans-serif',
		'Impact'			=> 'Impact, Charcoal, sans-serif',
	),
// Sidebar need to be counted in middle_switch
	$middle_switch_arr = array(
		'first_sidebar', 
		'second_sidebar'
	);
	
/**
 * sidebar_action_bar in wp-admin widget
 */
	
	function __construct()
	{
	
	//CHECK FOR USER REQUEST FOR THEME OPTIONS PANEL RESET TO DEFAULTS SETTINGS
	if(isset($_REQUEST['resetrequestactivated']))
    {
	//reset to defaults	
	$wpoption_name_in_database='theme_mods_'.get_stylesheet();
	delete_option('cssfileisloaded');
	delete_option('csscharlimit_basetheme');	
	delete_option($wpoption_name_in_database);
			
    //redirect to reset =true
	header("Location: themes.php?page=theme_options&reset=true");
    }
    
	// Theme Options array in theme options
		$this->options_arr = array
		(
			// $section_id	=> array('title' => $section_title, 'callback' => $callback, 'page' => $page, 'fields' = array()),
		    //START OF CUSTOM LOGO, FAVICON AND TRACKING CODE
			//GENERAL SETTINGS IN THEME OPTIONS PANEL
			'logo_favicon'	=>	array(
				'title' => __('', 'views_base'), 
				'callback' => 'layout_section_logo_favicon', 
				'page' => $this->option_page,
				'fields' => array(
				// $option_id	=>	array('title' => $option_title, 'callback' => $callback, 'args'	=>	array(),'sanitation' => $sanitation),
					'site_description_position'	=>	array(
					    'title' => __('Site Description Position', 'views_base'),
						'callback' => 'layout_select',
						'args' => array(
						'default_value'	=>	0,
						'options'	=>	array(
						0 => __('Next to site title', 'views_base'),
						1 => __('Below site title', 'views_base'),
						),
						),
						'sanitation' => 'intval',
				   ),
				   		'custom_logo'	=>	array(
						'title' => __('Custom Logo', 'views_base'), 
						'callback' => 'layout_file', 
						'args' => array(
							'default_value'	=> '',
						),
						'sanitation' => 'esc_url',
					),
					'custom_favicon'	=>	array(
						'title' => __('Custom Favicon', 'views_base'), 
						'callback' => 'layout_favicon', 
						'args' => array(
							'default_value'	=>	'',
						),
						'sanitation' => 'esc_url',
					),
					'custom_js'	=>	array(
						'title' => __('Custom Analytics Code', 'views_base'),
						'callback'	=>	'layout_textarea',
						'args' => array(
							'default_value'	=>	'',
						),
						'sanitation' => 'esc_html',
						),		

				),
			),
			//START revision: separate logo from background
			//BACKGROUND SETTINGS IN THEME OPTIONS PANEL
			'background_images'	=>	array(
				'title' => __('', 'views_base'),
				'callback' => 'layout_section_background_images',
				'page' => $this->option_page,
				'fields' => array(
						'main_background_color'	=>	array(
								'title' => __('Choose the main background color', 'views_base'),
								'callback' => 'layout_color',
								'args' => array(
										'default_value'	=>	'',
								),
								'sanitation' => 'esc_attr',
						),
     					'enable_main_background_image'	=>	array(
	        					'title' => __('Enable background Image', 'views_base'), 
	        					'callback'	=>	'layout_backgroundimage_checkbox', 
					        	'args' => array(
					    		'default_value'	=>	0,
					    		'text'	=>	__('Use uploaded image', 'views_base')
						),
						'sanitation' => 'intval',
					    ),
						'main_background'	=>	array(
								'title' => __('Main Background', 'views_base'),
								'callback' => 'layout_background_image',
								'args' => array(
										'default_value'	=>	'',
								),
								'sanitation' => 'esc_url',
						),
						'header_background_color'	=>	array(
								'title' => __('Header Background Color', 'views_base'),
								'callback' => 'layout_color',
								'args' => array(
										'default_value'	=>	'',
								),
								'sanitation' => 'esc_attr',
						),
     					'enable_header_background_image'	=>	array(
	        					'title' => __('Enable header background image', 'views_base'), 
	        					'callback'	=>	'layout_backgroundimage_checkbox', 
					        	'args' => array(
					    		'default_value'	=>	0,
					    		'text'	=>	__('Use uploaded image', 'views_base')
						),
						'sanitation' => 'intval',
					    ),						
					    'header_background'	=>	array(
						'title' => __('Header Background', 'views_base'),
								'callback' => 'layout_header_background_image',
								'args' => array(
										'default_value'	=>	'',
								),
								'sanitation' => 'esc_url',
						),
						'footer_background_color'	=>	array(
								'title' => __('Footer Background Color', 'views_base'),
								'callback' => 'layout_color',
								'args' => array(
										'default_value'	=>	'',
								),
								'sanitation' => 'esc_attr',
						),
     					'enable_footer_background_image'	=>	array(
	        					'title' => __('Enable footer background image', 'views_base'), 
	        					'callback'	=>	'layout_backgroundimage_checkbox', 
					        	'args' => array(
					    		'default_value'	=>	0,
					    		'text'	=>	__('Use uploaded image', 'views_base')
						),
						'sanitation' => 'intval',
					    ),						
						'footer_background'	=>	array(
								'title' => __('Footer Background', 'views_base'),
								'callback' => 'layout_footer_background_image',
								'args' => array(
										'default_value'	=>	'',
								),
								'sanitation' => 'esc_url',
						),	
		
			    ),
			),

			//END
	        //NEED TO CREATE A NEW ARRAY FOR FONT COLORS
	        //START
			//COLOR SETTINGS IN THE THEME OPTIONS PANEL
				'font_colors'	=>	array(
						'title' => __('', 'views_base'),
						'callback' => 'layout_section_font_colors',
						'page' => $this->option_page,
						'fields' => array(
   						'site_title_color'	=>	array(
								'title' => __('Site title color', 'views_base'),
								'callback' => 'layout_color',
								'args' => array(
										'default_value'	=>	'#067DB8',
								),
								'sanitation' => 'esc_attr',
						),
								'site_title_hover_color'	=>	array(
										'title' => __('Site title hover color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#005580',
										),
										'sanitation' => 'esc_attr',
								),
								'site_description_color'	=>	array(
										'title' => __('Site description color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#A4A2A2',
										),
										'sanitation' => 'esc_attr',
								),								
								'site_description_hover_color'	=>	array(
										'title' => __('Site description hover color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'',
										),
										'sanitation' => 'esc_attr',
								),								
								'article_title_color'	=>	array(
										'title' => __('Article title color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#191919',
										),
										'sanitation' => 'esc_attr',
								),								
								'article_title_hover_color'	=>	array(
										'title' => __('Article title hover color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#005580',
										),
										'sanitation' => 'esc_attr',
								),								
								'content_font_color'	=>	array(
										'title' => __('Content font color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#444444',
										),
										'sanitation' => 'esc_attr',
								),								
								'link_color'	=>	array(
										'title' => __('Link color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#0088CC',
										),
										'sanitation' => 'esc_attr',
								),								
								'link_hover_color'	=>	array(
										'title' => __('Link hover color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#005580',
										),
										'sanitation' => 'esc_attr',
								),								
								'menu_color'	=>	array(
										'title' => __('Menu color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#858585',
										),
										'sanitation' => 'esc_attr',
								),								
								'menu_hover_color'	=>	array(
										'title' => __('Menu hover color', 'views_base'),
										'callback' => 'layout_color',
										'args' => array(
												'default_value'	=>	'#111111',
										),
										'sanitation' => 'esc_attr',
								),								

						),
				),
				
			//END OF FONT COLOR ARRAY
			//TYPE SETTINGS SECTION IN
			//THEME OPTIONS PANEL			
			'font_options'	=>	array(
				'title' => __('', 'views_base'), 
				'callback' => 'layout_section_font_options', 
				'page' => $this->option_page,
				'fields' => array(
					'site_title_font_family'	=>	array(
						'title' => __('Site Title Font Family', 'views_base'), 
						'callback' => 'layout_font_select', 
						'args' => array(
							'default_value'	=>	'Georgia',
							'options'	=>	$this->font_family_options,
						),
						'sanitation' => 'esc_attr',
					),
					'site_title_font_size'	=>	array(
						'title' => __('Site Title Font Size', 'views_base'), 
						'callback' => 'layout_font_select', 
						'args' => array(
							'default_value'	=>	'30px',
							'options'	=>	$this->site_title_font_size_options,
						),
						'sanitation' => 'esc_attr',
					),
					'site_title_style'	=>	array(
						'title' => __('Site Title Style', 'views_base'), 
						'callback' => 'layout_select', 
						'args' => array(
							'default_value'	=>	'normal',
							'options'	=>	array(
								'normal' => __('normal', 'views_base'),
								'italic' => __('italic', 'views_base'),
								'bold' => __('bold', 'views_base'),
								'oblique' => __('oblique', 'views_base'),								
							),
						),
						'sanitation' => 'esc_attr',
					),
					'site_description_font_family'	=>	array(
						'title' => __('Site Description Font Family', 'views_base'), 
						'callback' => 'layout_font_select', 
						'args' => array(
							'default_value'	=>	'Georgia',
							'options'	=>	$this->font_family_options,
						),
						'sanitation' => 'esc_attr',
					),
					'site_description_font_size'	=>	array(
						'title' => __('Site Description Font Size', 'views_base'), 
						'callback' => 'layout_font_select', 
						'args' => array(
							'default_value'	=>	'14px',
							'options'	=>	$this->site_description_font_size_options,
						),
						'sanitation' => 'esc_attr',
					),
					'site_description_style'	=>	array(
						'title' => __('Site Description Style', 'views_base'), 
						'callback' => 'layout_select', 
						'args' => array(
							'default_value'	=>	'italic',
							'options'	=>	array(
								'normal' => __('normal', 'views_base'),
								'italic' => __('italic', 'views_base'),
								'bold' => __('bold', 'views_base'),
								'oblique' => __('oblique', 'views_base'),
								
							),
						),
						'sanitation' => 'esc_attr',
					),
					'article_font_family'	=>	array(
						'title' => __('Article Font Family', 'views_base'), 
						'callback' => 'layout_font_select', 
						'args' => array(
							'default_value'	=>	'Georgia',
							'options'	=>	$this->font_family_options,
						),
						'sanitation' => 'esc_attr',
					),
					'article_font_size'	=>	array(
						'title' => __('Article Font Size', 'views_base'), 
						'callback' => 'layout_font_select', 
						'args' => array(
							'default_value'	=>	'30px',
							'options'	=>	$this->article_title_font_size_options,
						),
						'sanitation' => 'esc_attr',
					),
					'article_font_style'	=>	array(
						'title' => __('Article Font Style', 'views_base'), 
						'callback' => 'layout_select', 
						'args' => array(
							'default_value'	=>	'normal',
							'options'	=>	array(
								'normal' => __('normal', 'views_base'),
								'italic' => __('italic', 'views_base'),
								'bold' => __('bold', 'views_base'),
								'oblique' => __('oblique', 'views_base'),
								
							),
						),
						'sanitation' => 'esc_attr',
					),					
					'content_font_family'	=>	array(
						'title' => __('Content Font Family', 'views_base'), 
						'callback' => 'layout_font_select', 
						'args' => array(
							'default_value'	=>	'Helvetica Neue',
							'options'	=>	$this->font_family_options,
						),
						'sanitation' => 'esc_attr',
					),
					'content_font_size'	=>	array(
						'title' => __('Content Font Size', 'views_base'), 
						'callback' => 'layout_font_select', 
						'args' => array(
							'default_value'	=>	'14px',
							'options'	=>	$this->site_description_font_size_options,
						),
						'sanitation' => 'esc_attr',
					),
					'content_font_style'	=>	array(
						'title' => __('Content Font Style', 'views_base'), 
						'callback' => 'layout_select', 
						'args' => array(
							'default_value'	=>	'normal',
							'options'	=>	array(
								'normal' => __('normal', 'views_base'),
								'italic' => __('italic', 'views_base'),
								'bold' => __('bold', 'views_base'),
								'oblique' => __('oblique', 'views_base'),
								
							),
						),
						'sanitation' => 'esc_attr',
					),
                //END
				),
			),
			//NEW SPACING SETTINGS SECTION IN
			//THEME OPTIONS PANEL
			'spacing_options'	=>	array(
				'title' => __('', 'views_base'), 				
				'callback' => 'layout_section_spacing_options', 
				'page' => $this->option_page,
				'fields' => array(
					'site_title_margin_top'	=>	array(
						'title' => __('Site Title Margin Top', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_title_margin_right'	=>	array(
						'title' => __('Site Title Margin Right', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0.5',
						),
						'sanitation' => 'floatval',
					),
					'site_title_margin_bottom'	=>	array(
						'title' => __('Site Title Margin Bottom', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_title_margin_left'	=>	array(
						'title' => __('Site Title Margin Left', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_description_margin_top'	=>	array(
						'title' => __('Site Description Margin Top', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_description_margin_right'	=>	array(
						'title' => __('Site Description Margin Right', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_description_margin_bottom'	=>	array(
						'title' => __('Site Description Margin Bottom', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_description_margin_left'	=>	array(
						'title' => __('Site Description Margin Left', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_title_padding_top'	=>	array(
						'title' => __('Site Title Padding Top', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_title_padding_right'	=>	array(
						'title' => __('Site Title Padding Right', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_title_padding_bottom'	=>	array(
						'title' => __('Site Title Padding Bottom', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_title_padding_left'	=>	array(
						'title' => __('Site Title Padding Left', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_description_padding_top'	=>	array(
						'title' => __('Site Description Padding Top', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0.5',
						),
						'sanitation' => 'floatval',
					),
					'site_description_padding_right'	=>	array(
						'title' => __('Site Description Padding Right', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_description_padding_bottom'	=>	array(
						'title' => __('Site Description Padding Bottom', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
					'site_description_padding_left'	=>	array(
						'title' => __('Site Description Padding Left', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'0',
						),
						'sanitation' => 'floatval',
					),
				),
			),
			//SOCIAL NETWORKS THEME OPTIONS
			'social_networks'	=>	array(
				'title' => __('', 'views_base'), 
				'callback' => 'layout_section_social_networks', 
				'page' => $this->option_page,
				'fields' => array(
					'social_icons'	=>	array(
						'title' => __('Social Icons', 'views_base'), 
						'callback' => 'layout_radio', 
						'args' => array(
							'default_value'	=>	'none',
							'options'	=>	array(
								'none' => __('None', 'views_base'),
								'default' => __('Default icons', 'views_base'),
								'baidu_share' => __('Baidu Share', 'views_base'),
							),
						),
						'sanitation' => 'esc_attr',
					),
					'social_icons_facebook'	=>	array(
						'title' => __('Facebook', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(							
							'default_value'	=>	'http://facebook.com/icanlocalize',
							'size'	=> 50,
						),
						'sanitation' => 'esc_url',
					),
					'social_icons_twitter'	=>	array(
						'title' => __('Twitter', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'http://twitter.com/icanlocalize',
							'size'	=> 50,
						),
						'sanitation' => 'esc_url',
					),
					'social_icons_linkedin'	=>	array(
						'title' => __('Linkedin', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'http://linkedin.com/icanlocalize',
							'size'	=> 50,
						),
						'sanitation' => 'esc_url',
					),
					'social_icons_google_plus'	=>	array(
						'title' => __('Google+', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'http://plus.google.com/icanlocalize',
							'size'	=> 50,
						),
						'sanitation' => 'esc_url',
					),
					'social_icons_flickr'	=>	array(
						'title' => __('Flickr', 'views_base'), 
						'callback' => 'layout_text', 
						'args' => array(
							'default_value'	=>	'http://flickr.com/icanlocalize',
							'size'	=> 50,
						),
						'sanitation' => 'esc_url',
					),
					'enable_facebook'	=>	array(
						'title' => __('Enable Facebook', 'views_base'), 
						'callback' => 'layout_socialnetworking_checkbox', 
						'args' => array(
							'default_value'	=>	0,
						),
						'sanitation' => 'intval',
					),
					'enable_twitter'	=>	array(
						'title' => __('Enable Twitter', 'views_base'), 
						'callback' => 'layout_socialnetworking_checkbox', 
						'args' => array(
							'default_value'	=>	0,
						),
						'sanitation' => 'intval',
					),
					'enable_linkedin'	=>	array(
						'title' => __('Enable Linkedin', 'views_base'), 
						'callback' => 'layout_socialnetworking_checkbox', 
						'args' => array(
							'default_value'	=>	0,
						),
						'sanitation' => 'intval',
					),
					'enable_google_plus'	=>	array(
						'title' => __('Enable Google+', 'views_base'), 
						'callback' => 'layout_socialnetworking_checkbox', 
						'args' => array(
							'default_value'	=>	0,
						),
						'sanitation' => 'intval',
					),
					'enable_flickr'	=>	array(
						'title' => __('Enable Flickr', 'views_base'), 
						'callback' => 'layout_socialnetworking_checkbox', 
						'args' => array(
							'default_value'	=>	0,
						),
						'sanitation' => 'intval',
					),					
					'baidu_share_code'	=>	array(
						'title' => __('Baidu Share Code', 'views_base'), 
						'callback' => 'layout_textarea', 
						'args' => array(
							'default_value'	=> 	sprintf('
<!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
        <span class="bds_more">%1$s</span>
        <a class="bds_qzone"></a>
        <a class="bds_tsina"></a>
        <a class="bds_tqq"></a>
        <a class="bds_renren"></a>
		<a class="shareCount"></a>
    </div>
<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->', __('Share To', 'views_base')),
						),
						'sanitation' => 'esc_html',
					),
				)
			),
			//CREATE A NEW CUSTOM CODE THEME OPTIONS
			//COMBINE CUSTOM CSS AND CUSTOM FOOTER			
			'custom_code'	=>	array(
				'title' => __('', 'views_base'), 
				'callback' => 'layout_section_custom_code', 
				'page' => $this->option_page, 
        			'fields' => array(
        			'enable_custom_css_fromdb'	=>	array(
        							'title' => __('Enable loading of CSS from database', 'views_base'),
        							'callback' => 'layout_radio_customcssdb',
        							'args' => array(
        									'default_value'	=>	'no',
        									'options'	=>	array(
        											'no' => __('Load the theme CSS files', 'views_base'),
        											'yes' => __('Load CSS that I edit', 'views_base'),        											
        									),
        							),
        							'sanitation' => 'esc_attr',
        				), 
   					
					'enable_custom_css'	=>	array(
						'title' => __('Enable Custom CSS', 'views_base'), 
						'callback'	=>	'layout_checkbox', 
						'args' => array(
							'default_value'	=>	0,
							'text'	=>	__('Enable custom css', 'views_base')
						),
						'sanitation' => 'intval',
					),
					'custom_css'	=>	array(
						'title' => __('Custom CSS', 'views_base'), 
						'callback'	=>	'layout_textarea_custom_css', 
						'args' => array(
							'default_value'	=>	'',
						),
						'sanitation' => 'esc_html',
					),
					'custom_footer'	=>	array(
						'title' => __('Custom Footer', 'views_base'), 
						'callback'	=>	'layout_textarea', 
						'args' => array(
							'default_value'	=>	__('Powered by <a href="http://wp-types.com/documentation/views-inside/views-base-theme/">Views Base</a> &copy; 2012', 'views_base'),
						),
						'sanitation' => 'esc_html',
					),

				)
			),
		);
	
		add_action( 'after_setup_theme', array(&$this, 'after_setup_theme') );
		add_action( 'widgets_init', array(&$this, 'widgets_init') );
		add_action( 'admin_menu', array(&$this, 'admin_menu') );
		add_action( 'admin_init', array(&$this, 'admin_init') );
		add_action( 'wp_head', array(&$this, 'add_custom_css') );
		add_action( 'wp_head', array(&$this, 'mobilemenu_js') );
		add_action( 'wp_enqueue_scripts', array(&$this, 'views_base_scripts') );
		add_filter( 'wp_page_menu_args', array(&$this, 'wp_page_menu_args') );
		add_filter( 'body_class', array(&$this, 'body_class') );
		add_action( 'get_sidebar', array(&$this, 'get_sidebar') );
		add_action( 'views_base_footer', array(&$this, 'add_custom_footer') );
		add_action( 'views_base_after_footer', array(&$this, 'add_custom_js') );
		add_action( 'views_base_options', array(&$this, 'theme_options_form') );
		add_action( 'wp_head', array(&$this, 'custom_header_styles') );
		add_filter( 'middle_switch', array(&$this, 'middle_switch'), 10, 2 );
	}

	
/**
 * after setup theme
 */

	function after_setup_theme() 
	{
		// Load languages
		load_theme_textdomain( 'views_base', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to <head>.
		add_theme_support( 'automatic-feed-links' );
		
		// Add support for a variety of post formats
		add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'gallery', 'video', 'audio', 'chat' ) );
		
		// Add support for custom background.
		//add_custom_background();
		//work until 3.4.
		add_theme_support( 'custom-background');
		
		//Add callback for custom TinyMCE editor stylesheets.
		add_editor_style();
		
		// Add support for a custom header image.
		$header_args = array(
			'flex-width'	=> true,
			'width'	=> 1200,
			'flex-width'	=> true,
			'height'	=> 300,
			'header-text'	=> false,
			'default-image' => get_template_directory_uri() . '/images/header/default_header.jpg',
		);
		// work until 3.4
		add_theme_support( 'custom-header', $header_args );
		
		// The default header image size
/* 		define( 'HEADER_IMAGE_WIDTH', '1200' );
		define( 'HEADER_IMAGE_HEIGHT', '300' );
		define( 'HEADER_IMAGE', '%s/images/header/default_header.jpg'); // %s is the template dir uri
		add_custom_image_header( 
			array(&$this, 'header_style'),
			array(&$this, 'admin_header_style'),
			array(&$this, 'admin_header_image')
		); */
		
		// This theme uses wp_nav_menu() in some location.
		register_nav_menus( 
			array(
				'primary' => __( 'Primary Menu', 'views_base' ),
				'footer' => __( 'Footer Menu', 'views_base' ),
				)
		);
		
		// The default header text color
		define( 'HEADER_TEXTCOLOR', '444' );
		
		// Add custom image size for featured image use, displayed on "standard" posts.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
	}
	
/**
 * add a sidebar in wp-admin widget
 */
	function add_sidebar($sidebar_id = '') {
		if($sidebar_id == '' || !isset($this->sidebar_array[$sidebar_id])) return;
		register_sidebar( array(
			'name' => __( $this->sidebar_array[$sidebar_id], 'views_base' ),
			'id' => $sidebar_id,
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => "</section>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
		
/**
 * load all sidebars in wp-admin widget
 */
	function widgets_init()
	{
		if(sizeof($this->sidebar_array)<1)return; 
		foreach($this->sidebar_array as $k => $v)
		{
			$this->add_sidebar($k);
		}
	}
		
/**
 * admin_menu
 */
	function admin_menu()
	{
		$page = add_theme_page( __('Manage Theme Options', 'views_base'), __('Theme Options', 'views_base'), 'edit_theme_options', $this->option_page, array(&$this, 'theme_options'));
        add_action('admin_print_styles-' . $page, array(&$this, 'admin_styles'));
		
	}
			
/**
 * Print theme options form
 */
	function theme_options_form()
	{
		?>
 <div class="metabox-holder">
    <div id="optionsframework">
    <form method="post" action="<?php echo admin_url('options.php');?>" id="theme_options_form">
		<ul class="nav-tab-wrapper">
        <li class="nav-tab-list">
        <a href="#of-option-generalsettings" title="General Settings" class="nav-tab" id="of-option-generalsettings-tab"><?php _e('General Settings','views_base');?></a>
        </li>
        <li class="nav-tab-list">
        <a href="#of-option-backgroundsettings" title="Background Settings" class="nav-tab" id="of-option-backgroundsettings-tab"><?php _e('Background Settings','views_base');?></a>
        </li>
        <li class="nav-tab-list">
        <a href="#of-option-colorsettings" title="Color Settings" class="nav-tab" id="of-option-colorsettings-tab"><?php _e('Color Settings','views_base');?></a>
        </li>
        <li class="nav-tab-list">
        <a href="#of-option-typesetting" title="Type Setting" class="nav-tab" id="of-option-typesetting-tab"><?php _e('TypeSetting','views_base');?></a>
        </li>
        <li class="nav-tab-list">
        <a href="#of-option-spacing" title="Spacing" class="nav-tab" id="of-option-spacing-tab"><?php _e('Spacing','views_base');?></a>
        </li>
        <li class="nav-tab-list">
        <a href="#of-option-socialnetworks" title="Social Networks" class="nav-tab" id="of-option-socialnetworks-tab"><?php _e('Social Networks','views_base');?></a>
        </li>
        <li class="nav-tab-list">
        <a href="#of-option-customcode" title="Custom Code" class="nav-tab" id="of-option-customcode-tab"><?php _e('Custom Code','views_base');?></a>
        </li>          
		</ul>
		<div class="content">
			<?php 
			//do_settings_sections( $page);
			do_settings_sections( 'theme_options' );			
			//hidden fields
			settings_fields( 'theme_options' );			
			?>
		
		</div>
		<div id="submitbuttonviews">    
            <input id="basethemesubmitbutton" type="submit" value="Save Changes" class="button-primary" id="submit" name="submit">            			
		</form><form id="resetformtheme_options" method="post" action=""><input type="submit" class="button" id="resetbutton" value="Reset" onclick="return confirm( '<?php print esc_js('Are you sure? This will revert to default settings and your own theme settings will be lost!'); ?>' );" name="reset"> 
            <input type="hidden" name="resetrequestactivated" value="reset" /></form>           	
		</div>	
		
	</div>
</div>
		<?php
	}
			
/**
 * Add Custom CSS to wp-head
 */
	function add_custom_css()
	{
		$enable = get_theme_mod('enable_custom_css');
		$css = get_theme_mod('custom_css');
		if ($enable == 1 && !empty($css)) 
		{		
		//revision to write to a css file
		//path to custom css file
		$themecustomcsspath= get_template_directory() . '/custom.css';
		//add changes from svn
		$css_adjusted=htmlspecialchars_decode($css, ENT_QUOTES);
        //write the css		
		@file_put_contents($themecustomcsspath, $css_adjusted);
		//output the external stylesheet
		echo "<link rel='stylesheet' href='".get_template_directory_uri()."/custom.css' type='text/css' media='all' />";
			
		}
	}
			
/**
 * Add Custom footer to action: views_base_footer
 */
	function add_custom_footer()
	{
		$str = get_theme_mod('custom_footer');
		if (!empty($str)) 
		{
		// reverse to plain html
		//register for translation
		$footertextcustom=htmlspecialchars_decode($str, ENT_QUOTES);
		if (function_exists('icl_register_string')) {
				icl_register_string('views_base', 'custom_footer_text',$footertextcustom);
		}
		if (!function_exists('icl_t')) {
			
			$footertextcustomtranslated=$footertextcustom;
		
		} else {
			
			$footertextcustomtranslated=icl_t('views_base', 'custom_footer_text',$footertextcustom);
		}			
		
		?>
		
		<div class="custom_footer"><?php echo $footertextcustomtranslated;?></div>
		<?php
		}
	}
	
/**
 * Add Custom js code in footer to action: views_base_footer
 */
	function add_custom_js()
	{
		$js = get_theme_mod('custom_js');
		if (!empty($js)) 
		{
		// reverse to plain html
			echo htmlspecialchars_decode($js, ENT_QUOTES);
		}
	}
		
/**
 * theme options page layout
 */
	function theme_options()
	{
		?>
		 <div class="heading-options">
            <div class="viewsicon"><img src="<?php echo get_template_directory_uri().'/images/viewsicon.png';?>"></div><div class="heading_views"><h1><?php _e('Views Base Theme Options', 'views_base'); ?></h1></div>
            
        </div>
        <div class="views_nav_tab">
            <a class="nav-tab nav-tab-active" href="<?php echo admin_url('themes.php?page=theme_options');?>"><?php _e('Theme Settings','views_base');?></a><a id="help_documentation" class="nav-tab" target="_blank" href="http://wp-types.com/documentation/views-inside/views-base-theme/"><?php _e('Help and Documentation','views_base');?></a>
            <div id="containerlaterversion">
               
               <div id="viewsbaselatest">Views Base v 1.2</div>
            </div>
		</div>
		<div class="iframe_documentation">
		<iframe style="display:none;" id="framex" src="" scrolling="auto" width="100%" height="7500"></iframe>
		<img style="display:none;" id="pageisstillloading" src="<?php echo get_template_directory_uri().'/images/ajax-loader.gif';?>" />
		</div>
		<div class="wrap">
		    <div id="header">		
		    <div id="groupthisheaders">		    
                  <div id="of-option-generalsettings" class="group"><img src="<?php echo get_template_directory_uri().'/images/generalsettings.png';?>" alt="General Settings" /></div>
                  <div id="of-option-backgroundsettings" class="group"><img src="<?php echo get_template_directory_uri().'/images/backgroundsettings.png';?>" alt="Background Settings" /></div>
                  <div id="of-option-colorsettings" class="group"><img src="<?php echo get_template_directory_uri().'/images/colorsettings.png';?>" alt="Color Settings" /></div>
                  <div id="of-option-typesetting" class="group"><img src="<?php echo get_template_directory_uri().'/images/typesetting.png';?>" alt="Type Setting" /></div>
                  <div id="of-option-spacing" class="group"><img src="<?php echo get_template_directory_uri().'/images/spacing.png';?>" alt="Spacing" /></div>
                  <div id="of-option-socialnetworks" class="group"><img src="<?php echo get_template_directory_uri().'/images/socialnetworks.png';?>" alt="Social Networks" /></div>
                  <div id="of-option-customcode" class="group"><img src="<?php echo get_template_directory_uri().'/images/customcss.png';?>" alt="Custom CSS" /></div>
            </div>
            <div id="uppersubmitbutton">
            <input type="submit" form="resetformtheme_options" value="Reset" onclick="return confirm( '<?php print esc_js('Are you sure? This will revert to default settings and your own theme settings will be lost!!'); ?>' );" class="button" name="reset" id="resetbutton">
            <input id="basethemesubmitbutton" type="submit" form="theme_options_form" value="Save Changes" class="button-primary" name="submit">
            </div>
            <div style="clear:both;"></div>
            </div>
		<?php do_action('views_base_options');?>
		</div>		   
		<?php
	}
	
/**
 * Enqueue scripts for front-end.
 */
	function views_base_scripts() 
	{
		//For reference: wp_enqueue_script( $handle,$src,$deps,$ver,$in_footer ); 
		wp_enqueue_script( 'mobilemenu', get_template_directory_uri() . '/javascripts/jquery.mobilemenu.js', array( 'jquery' ));
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/javascripts/modernizr.js', array("jquery"));
		
	}
	
/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 */
	function wp_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
	
/**
 * Extends the default WordPress body class to denote a full-width layout.
 *
 * Used in full-width page template.
 *
 */
	function body_class( $classes ) {
		if ( is_page_template( 'full-width' ) )
			$classes[] = 'full-width';
		return $classes;
	}

/**
 * Sanitize options input.
 * @param array $input need be Sanitized.
 *
 */
	function options_sanitize($input = array())
	{
		$sanitize_arr = $this->sanitize_arr();
		$res = array();
		foreach($input as $k => $v)
		{
			if(isset($sanitize_arr[$k]))
			{
			// default esc_html sanitize
                if ($k=='custom_css') {
                	 $cssfileisnowloaded= get_option('cssfileisloaded');
                     if ($cssfileisnowloaded=='yes') {
                     	    //css file is now loaded
                     	    //get css limits
                    	    $sizeofcustomcss_checked= get_option('csscharlimit_basetheme');
                        	
                        	//accurate counting
                        	$v_one = str_replace("\r\n", "\n",$v);
                        	$v_two = str_replace("\r", "\n", $v_one);
                        	
                        	//measure the size of submitted CSS
                        	$postedsizecss=strlen($v_two);
                        	                        	
                        	    if($postedsizecss>$sizeofcustomcss_checked) {
                        	    //do nothing and redirect                        	    
                        	    	header("Location: themes.php?page=theme_options&cancelled=true"); 
                        	    	die();                       	    	
                        	    } else {
                        	    //value OK	
                        	    $tmp = esc_html($v);
                        	    }
                       } else {
                       //CSS file is not yet loaded
                       //do things normally
                       	$tmp = esc_html($v);        					        
        			   }	
                } else {
                //not custom css do things normally
                $tmp = esc_html($v);
                }
            // use wordpress default sanitize method
				if(function_exists ($sanitize_arr[$k]))
				{
					$tmp = $sanitize_arr[$k]($v);
				}
			// use sanitize methods in this class
				else if(method_exists ($this, $sanitize_arr[$k]))
				{
					$tmp = $this->$sanitize_arr[$k]($v);
				}
				$pre	= get_theme_mod($k);

				if($pre != $tmp)
				{ 	
                      
					set_theme_mod($k, $tmp);
		           
				}
								
				if(isset($_REQUEST['action'])&&strtolower($_REQUEST['action'])=='update')
				{
					do_action( 'update_theme_mod_' . $k, $tmp, $k);
				}				
				continue;
                         }
			$res[$k] = $v;
		}
		//Settings are done
		//Now add controls for CSS switch
		
		//Enable custom css from dB?
		$enablecustomcssfromdb = get_theme_mod('enable_custom_css_fromdb');		
		$cssfileisloaded=get_option('cssfileisloaded');		
		
		if (($enablecustomcssfromdb=='yes') && (!($cssfileisloaded=='yes'))) {
			
			//Check whether the CSS file has already been loaded before		
	
			//Copy files from parent style.css and child style.css to dB
		
			//path to parent CSS
			$parentcsspath= get_template_directory() .'/style.css';
		
			//path to child css
			$childcsspath= get_stylesheet_directory().'/style.css';
		
			//get parent CSS data
			$parentcssdata=file_get_contents($parentcsspath);
		
			//get child css data
			$childcssdata=file_get_contents($childcsspath);
		
			//prepare data
			$finalcssdata= '/*CSS OF PARENT THEME*/'.$parentcssdata.'/*CSS OF CHILD THEME*/'.$childcssdata;
			//write the css to the database
		
			set_theme_mod('enable_custom_css',1);
			set_theme_mod('custom_css', $finalcssdata);
			add_option('cssfileisloaded','yes');
			
			//define the limits of css characters
			$finalcssdata = str_replace("\r\n", "\n",$finalcssdata);
			$finalcssdataa = str_replace("\r", "\n", $finalcssdata);
			$sizeofcustomcss= strlen($finalcssdata);
			$limit_css=0.05 *$sizeofcustomcss+ $sizeofcustomcss;			

			//now add this as options
			add_option('csscharlimit_basetheme',$limit_css);

		} elseif (($enablecustomcssfromdb=='no') && ($cssfileisloaded=='yes')) {
			
			set_theme_mod('custom_css', '');
			set_theme_mod('enable_custom_css',0);
			delete_option('cssfileisloaded');
			delete_option('csscharlimit_basetheme');
		} else {
			
			set_theme_mod('enable_custom_css',1);
		
		}
		
		return $res;
	}
	
/**
 * Get all options name which need be Sanitized.
 *
 */
	function sanitize_arr()
	{
		$res = array();
		$options_arr = $this->options_arr;
		foreach($this->options_arr as $ks => $vs)
		{
			if(isset($vs['fields']))
			{
				foreach($vs['fields'] as $kf => $vf)
				{
					if(isset($vf['sanitation']))
					{
						$res[$kf] = $vf['sanitation'];
					}
				}
			}
		}
		return $res;
	}

/**
 * admin init.
 *
 */
	function admin_init() 
	{

		$this->options_name = "theme_options_" . get_option( 'stylesheet' );
		// For reference: register_setting( $option_group, $option_name, $sanitize_callback );
		register_setting( $this->option_page, $this->options_name, array(&$this, 'options_sanitize') ); 
		
		if(sizeof($this->options_arr)>0)
		{
			foreach($this->options_arr as $ks => $vs)
			{
				// For reference: add_settings_section( $id, $title, $callback, $page );
					add_settings_section( $ks, $vs['title'], array(&$this, $vs['callback']), $vs['page'] );
				if(isset($vs['fields'])&&sizeof($vs['fields'])>0)
				{
					foreach($vs['fields'] as $kf => $vf)
					{
						$args = $vf['args'];
						$args['label_for'] = $kf;
						// For reference: add_settings_field( $id, $title, $callback, $page, $section, $args );
						add_settings_field( 
							$kf, 
							$vf['title'], 
							array(&$this, $vf['callback']), 
							$vs['page'],
							$ks,
							$args
						);
					}
				}
			}
		}

	}
	

/**
 *
 * This is the function print logo and favicon layout section. 
 *
 */
	function layout_section_logo_favicon()
	{
		?>
		<div id="of-option-generalsettings" class="general_settings_jquery">
		<h3 id="logo_upload"><?php _e('Logo Upload', 'views_base')?></h3>
		<?php _e('<p id="firstborderlogoupload">Upload your Logo by clicking the "Upload image" button.<p>', 'views_base');?>	
		<div id='layout_section_logo_favicon_customcontent' style="display:none;">	
		<div id="site_description_div">
		       <div id="site_description_text">Site Description Position</div>
		       <div id="site_description_value"><p abbr="site_description_position"></p></div>
        </div>
		<!-- preview logo -->
        <div id="image_custom_logo_prev">
        <img id="custom_logo_prevs" src="<?php echo get_theme_mod('custom_logo');?>" />  
        </div>
		<!-- upload logo button -->
        <div id="custom_logo_uploader_button">
             <p abbr="custom_logo">&nbsp;</p>
        </div>
        <div id="spacerfavicon"></div>
        <h3 id="favicon_upload"><?php _e('Favicon Upload', 'views_base')?></h3>
        <?php _e('<p id="firstborderlogoupload">Upload your Favicon by clicking the "Upload image" button.<p>', 'views_base');?>
        <!-- preview favicon -->
		<div id="image_favicon_prev">
        <img id="favicon_prevs" src="<?php echo get_theme_mod('custom_favicon');?>" />
        </div>
		<!-- upload logo button -->
        <div id="custom_favicon_uploader_button">
       <p abbr="custom_favicon">&nbsp;</p>
        </div>
        <div id="spacertrackingcode"></div>
        <h3 id="tracking_code"><?php _e('Tracking Code', 'views_base')?></h3>
        <?php _e('<p id="trackingcodep">Insert your tracking code - e.g Google Analytics in the input box below. </p>', 'views_base');?>
        <div id="custom_js_textboxarea"> 
       <p abbr="custom_js">&nbsp;</p>	
       </div>
       <div id="spacersubmitbutton"></div>
       </div>
		<?php
	}
//START REVISION:SEPARATE LOGO FROM BACKUP
	function layout_section_background_images()
	{
		?>	</div>
		    <div id="of-option-backgroundsettings-tab" class="background_images_jquery">		    
		    <h3 id="logo_upload"><?php _e('Main Background', 'views_base')?></h3>
            <?php _e('<p id="firstbordermainbackground">Select the main background color, or upload your image.</p>', 'views_base');?>
            <div id='layout_section_background_images_customcontent' style="display:none;">
		       <div id="main_background_color_form">
		        <div id="main_background_color_text"><?php _e('Choose the background color','views_base');?></div>
		        <div id="main_background_color_db">
		        		<div id="colorSelector" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
		        <p abbr="main_background_color">&nbsp;</p>
		        </div>
		    </div>
		    <div id="main_background_image_form">
		        <div id="main_background_image_text"><?php _e('Custom background image upload','views_base');?></div>
						    <div id="enablebackgroundimagecheckbox">
			                <p id="enable_custom_bimagep" abbr="enable_main_background_image">&nbsp;</p>
                           </div>	
        
    		<div id="image_background_upload">
                <img id="backgroundimage_prevs" src="<?php echo get_theme_mod('main_background');?>" />  
            </div>		        
		        <div id="centerthistool">
		        <p abbr="main_background">&nbsp;</p>
		        </div>
		        
		    </div>
		    <div id="spacerheaderbackground"></div>
		    <h3 id="favicon_upload"><?php _e('Header Background', 'views_base')?></h3>
		    <?php _e('<p id="firstbordermainbackground">Select the header background color, or upload your image.</p>', 'views_base');?>
            <div id="main_background_color_form">
		        <div id="main_background_color_text"><?php _e('Choose the header background color','views_base');?></div>
		        <div id="main_headerbackground_color_db">
		        		<div id="colorSelector1" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
		        <p abbr="header_background_color">&nbsp;</p>
		        </div>
		    </div>
		    <div id="main_background_image_form">
		        <div id="main_background_image_text"><?php _e('Custom Header background image upload','views_base');?></div>
						    <div id="enableheaderbackgroundimagecheckbox">
			                <p id="enable_custom_himagep" abbr="enable_header_background_image">&nbsp;</p>
                           </div>
				<div id="header_background_image_upload">
                <img id="headerbackgroundimage_prevs" src="<?php echo get_theme_mod('header_background');?>" />  
                </div>    

			    <div id="centerthistool">
		        <p abbr="header_background">&nbsp;</p>
		        </div>	        
				
		    </div>  
		    <div id="spacerheaderbackground"></div>
		    <h3 id="favicon_upload"><?php _e('Footer Background', 'views_base')?></h3>
		    <?php _e('<p id="firstbordermainbackground">Select the footer background color, or upload your image.</p>', 'views_base');?>
            <div id="main_background_color_form">
		        <div id="main_background_color_text"><?php _e('Choose the Footer background color','views_base');?></div>
		        <div id="main_footerbackground_color_db">
		        		<div id="colorSelector2" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
		        <p abbr="footer_background_color">&nbsp;</p>
		        </div>
		    </div>
		    <div id="main_background_image_form">
		        <div id="main_background_image_text"><?php _e('Custom Footer background image upload','views_base');?></div>
						    <div id="enablefooterbackgroundimagecheckbox">
			                <p id="enable_custom_fimagep" abbr="enable_footer_background_image">&nbsp;</p>
                           </div>
				<div id="footer_background_image_upload">
                <img id="footerbackgroundimage_prevs" src="<?php echo get_theme_mod('footer_background');?>" />  
                </div>	
		        
		        <div id="centerthistool">
		        <p abbr="footer_background">&nbsp;</p>
		        </div>
				
		        
				
		    </div> 	
		   	<div id="spacerheaderbackground"></div><p id="anotherspaceratend"></p>	    
		       
		    </div>
		    <?php
	}

//END
	/**
	 *
	 * This is the function that font options layout section.
	 *
	 */
//NEW FUNCTION FOR FONT COLORS
	function layout_section_font_colors()
	{
		?>
		      </div>
		      <div id="of-option-colorsettings-tab" class="font_color_jquery">
		      <h3 id="logo_upload"><?php _e('Font Color Settings', 'views_base')?></h3> 
		      <?php _e('<p id="firstborderfontcolors">Create your own color scheme by using the color pickers below.</p>', 'views_base');?> 
		      <div id='layout_section_font_colors_customcontent' style="display:none;"> 
<table width="100%">
<tr>
<td id="adjustertd">
		       <div id="site_title_color_form">
		        <div id="site_title_color_text"><?php _e('Site title color','views_base');?></div>
		        <div id="site_title_color_db">
		        		<div id="colorSelector3" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
		        <p abbr="site_title_color">&nbsp;</p>
		        </div>
		      </div>
</td>
<td>
		       <div id="site_title_hover_color_form">
		        <div id="site_title_hover_color_text"><?php _e('Site title hover color','views_base');?></div>
		        <div id="site_title_hover_color_db">
		        		<div id="colorSelector4" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
		        <p abbr="site_title_hover_color">&nbsp;</p>
		        </div>
		      </div>
</td>
</tr>
</table> 
<div id="spacerfontcolortables"></div>		      
<table width="100%">
<tr>
<td id="adjustertd">
		       <div id="site_description_color_form">
		        <div id="site_description_color_text"><?php _e('Site description color','views_base');?></div>
		        <div id="site_description_color_db">
		        		<div id="colorSelector5" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
		        <p abbr="site_description_color">&nbsp;</p>
		        </div>
		      </div>
</td>
<td>
		       <div id="site_description_hover_color_form">
		        <div id="site_description_hover_color_text"><?php _e('Site description hover color','views_base');?></div>
		        <div id="site_description_hover_color_db">
		        		<div id="colorSelector6" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
		        <p abbr="site_description_hover_color">&nbsp;</p>
		        </div>
		      </div>
</td>
</tr>
</table>
<div id="spacerfontcolortables1"></div>
<table width="100%">
<tr>
<td id="adjustertd">
		       <div id="article_title_color_form">
		        <div id="article_title_color_text"><?php _e('Article title color','views_base');?></div>
		        <div id="article_title_color_db">
		        		<div id="colorSelector7" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
                <p abbr="article_title_color">&nbsp;</p>
		        </div>
		      </div>
</td>
<td>
		       <div id="article_title_hover_color_form">
		        <div id="article_title_hover_color_text"><?php _e('Article title hover color','views_base');?></div>
		        <div id="article_title_hover_color_db">
		        		<div id="colorSelector8" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
                <p abbr="article_title_hover_color">&nbsp;</p>
		        </div>
		      </div>
</td>
</tr>
</table>
<div id="spacerfontcolortables2"></div>	 		      
<table width="100%">
<tr>
<td id="adjustertd">
		       <div id="content_font_color_form">
		        <div id="content_font_color_text"><?php _e('Content font color','views_base');?></div>
		        <div id="content_font_color_db">
		        		<div id="colorSelector9" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
                <p abbr="content_font_color">&nbsp;</p>
		        </div>
		      </div>
</td>
<td>
</td>
</tr>
</table>
<div id="spacerfontcolortables3"></div>	
<table width="100%">
<tr>
<td id="adjustertd">
		       <div id="link_color_form">
		        <div id="link_color_text"><?php _e('Link color','views_base');?></div>
		        <div id="link_color_db">
		        		<div id="colorSelector10" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
                <p abbr="link_color">&nbsp;</p>
		        </div>
		      </div>
</td>
<td>
		       <div id="link_hover_color_form">
		        <div id="link_hover_color_text"><?php _e('Link hover color','views_base');?></div>
		        <div id="link_hover_color_db">
		        		<div id="colorSelector11" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
                <p abbr="link_hover_color">&nbsp;</p>
		        </div>
		      </div>
</td>
</tr>
</table>
<div id="spacerfontcolortables4"></div>
<table width="100%">
<tr>
<td id="adjustertd">
		       <div id="menu_color_form">
		        <div id="menu_color_text"><?php _e('Menu color','views_base');?></div>
		        <div id="menu_color_db">
		        		<div id="colorSelector12" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
                <p abbr="menu_color">&nbsp;</p>
		        </div>
		      </div>
</td>
<td>
		       <div id="menu_hover_color_form">
		        <div id="menu_hover_color_text"><?php _e('Menu hover color','views_base');?></div>
		        <div id="menu_hover_color_db">
		        		<div id="colorSelector13" style="float:left;">
					     <div style="background-color: #83D6A2"></div>			                 
				    	</div>
                <p abbr="menu_hover_color">&nbsp;</p>
		        </div>
		      </div>
</td>
</tr>
</table>
<div id="spacerfontcolortablesend"></div>
<p id="anotherspaceratend"></p>		      
		      </div>
				<?php
			}

//END
	function layout_section_font_options()
	{
		?>
	      </div>
	      <div id="of-option-typesetting-tab" class="font_types_jquery">
	      <h3 id="logo_upload"><?php _e('Site title font', 'views_base')?></h3> 
	      <?php _e('<p id="firstbordertypesettings">Setup the Site Title font, size and styling settings.</p>', 'views_base');?>  
          <div id='layout_section_typesetting_customcontent' style="display:none;">

<table width="100%">
<tr>
<td width="40%">
<div id="sitetitlefontfamily">
<?php _e('Browse font library', 'views_base')?> <p abbr="site_title_font_family">&nbsp;</p>
</div>
</td>
<td>
<div id="sitetitlefontsize">
<?php _e('Font size', 'views_base')?> <p abbr="site_title_font_size">&nbsp;</p> 
</div>
</td>
<td>
<div id="sitetitlestyling">
<?php _e('Styling', 'views_base')?> <p abbr="site_title_style">&nbsp;</p>
</div>
</td>
</tr>
</table>		  
<p id="fontpreviewsitetitlefont"><?php _e('Font Preview', 'views_base')?></p>
<div id="fontpreview_sitetitlefont">
     <div id="titlefontprev_container">
            <div id="titlefontprev">The quick brown fox jumps over the lazy dog</div>
     </div>
</div>
<div id="spacerfonttitlepreview"></div>

	      <h3 id="logo_upload"><?php _e('Site description font', 'views_base')?></h3> 
	      <?php _e('<p id="secondborderfonttypesettings">Setup the Site Description font, size and styling settings.</p>', 'views_base');?>  
<table width="100%">
<tr>
<td width="40%">
<div id="sitedescriptionfontfamily">
<?php _e('Browse font library', 'views_base')?> <p abbr="site_description_font_family">&nbsp;</p>
</div>
</td>
<td>
<div id="sitedescriptionfontsize">
<?php _e('Font size', 'views_base')?> <p abbr="site_description_font_size">&nbsp;</p> 
</div>
</td>
<td>
<div id="sitedescriptionstyling">
<?php _e('Styling', 'views_base')?> <p abbr="site_description_style">&nbsp;</p>
</div>
</td>
</tr>
</table>	
<p id="fontpreviewsitedescriptionfont"><?php _e('Font Preview', 'views_base')?></p>
<div id="fontpreview_sitedesciptionfont">
     <div id="descriptionfontprev_container">
            <div id="desciptionfontprev">The quick brown fox jumps over the lazy dog</div>
     </div>
</div>
<div id="spacerfontdescriptionpreview"></div> 	

	      <h3 id="logo_upload"><?php _e('Article title font', 'views_base')?></h3> 
	      <?php _e('<p id="thirdborderfonttypesettings">Setup the Article title font, size and styling settings.</p>', 'views_base');?>  
<table width="100%">
<tr>
<td width="40%">
<div id="articletitlefontfamily">
<?php _e('Browse font library', 'views_base')?> <p abbr="article_font_family">&nbsp;</p>
</div>
</td>
<td>
<div id="articletitlefontsize">
<?php _e('Font size', 'views_base')?> <p abbr="article_font_size">&nbsp;</p>  
</div>
</td>
<td>
<div id="articletitlestyling">
<?php _e('Styling', 'views_base')?> <p abbr="article_font_style">&nbsp;</p>
</div>
</td>
</tr>
</table>	  
<p id="fontpreviewarticletitlefont"><?php _e('Font Preview', 'views_base')?></p> 
<div id="fontpreview_articletitlefont">
     <div id="articletitlefontprev_container">
            <div id="articletitlefontprev">The quick brown fox jumps over the lazy dog</div>
     </div>
</div>
<div id="spacerfontarticletitlepreview"></div>
	      <h3 id="logo_upload"><?php _e('Content font', 'views_base')?></h3> 
	      <?php _e('<p id="fourthborderfonttypesettings">Setup the Content font, size and styling settings.</p>', 'views_base');?>  
		  
<table width="100%">
<tr>
<td width="40%">
<div id="contentfontfamily">
<?php _e('Browse font library', 'views_base')?> <p abbr="content_font_family">&nbsp;</p>
</div>
</td>
<td>
<div id="contentfontsize">
<?php _e('Font size', 'views_base')?> <p abbr="content_font_size">&nbsp;</p>  
</div>
</td>
<td>
<div id="contentfontstyling">
<?php _e('Styling', 'views_base')?> <p abbr="content_font_style">&nbsp;</p> 
</div>
</td>
</tr>
</table>	 
<p id="fontpreviewcontentfont"><?php _e('Font Preview', 'views_base')?></p> 
<div id="fontpreview_contentfont">
     <div id="contentfontprev_container">
            <div id="contentfontprev">The quick brown fox jumps over the lazy dog</div>
     </div>
</div>
<div id="spacerfontcontentfontpreview"></div>
<p id="anotherspaceratend"></p>	
	    </div>
			<?php
		}
//FUNCTIONS FOR SPACING LAYOUT SECTIONS IN THEME OPTIONS		
	function layout_section_spacing_options()
	{
		?>
	      </div>
	      <div id="of-option-spacing-tab" class="font_spacing_jquery">
	      <h3 id="logo_upload"><?php _e('Margin settings (em)', 'views_base')?></h3> 
	      <?php _e('<p id="firstborderspacingsettings">Customize the margin settings.</p>', 'views_base');?>  
         <div id='layout_section_spacing_customcontent' style="display:none;">
<div id="marginsettingsdiv">
<table width="100%">
<tr>
<th></th>
<th id="headingmarginsettings" class="headermargintop"><?php _e('TOP', 'views_base')?></th>
<th id="headingmarginsettings" class="headermarginbottom"><?php _e('BOTTOM', 'views_base')?></th>
<th id="headingmarginsettings" class="headermarginleft"><?php _e('LEFT', 'views_base')?></th>
<th id="headingmarginsettings" class="headermarginright"><?php _e('RIGHT', 'views_base')?></th>
</tr>
<tr id="datarowmarginsettings">
<td id="rownamemarginsettings"><?php _e('Site Title', 'views_base')?></td>
<td><div id="marginsettings_entry" abbr="site_title_margin_top">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_title_margin_bottom">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_title_margin_left">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_title_margin_right">&nbsp;</div></td>
</tr>
<tr id="datarowmarginsettings">
<td id="rownamemarginsettings"><?php _e('Description', 'views_base')?></td>
<td><div id="marginsettings_entry" abbr="site_description_margin_top">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_description_margin_bottom">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_description_margin_left">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_description_margin_right">&nbsp;</div></td>
</tr>
</table> 
</div>
<div id="spacermarginsettings"></div>
<h3 id="logo_upload"><?php _e('Padding settings (em)', 'views_base')?></h3>	
<?php _e('<p id="secondborderspacingsettings">Customize the padding settings.</p>', 'views_base');?>   
<div id="paddingsettingsdiv">
<table width="100%">
<tr>
<th></th>
<th id="headingmarginsettings" class="headermargintop"><?php _e('TOP', 'views_base')?></th>
<th id="headingmarginsettings" class="headermarginbottom"><?php _e('BOTTOM', 'views_base')?></th>
<th id="headingmarginsettings" class="headermarginleft"><?php _e('LEFT', 'views_base')?></th>
<th id="headingmarginsettings" class="headermarginright"><?php _e('RIGHT', 'views_base')?></th>
</tr>
<tr id="datarowmarginsettings">
<td id="rownamemarginsettings"><?php _e('Site Title', 'views_base')?></td>
<td><div id="marginsettings_entry" abbr="site_title_padding_top">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_title_padding_bottom">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_title_padding_left">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_title_padding_right">&nbsp;</div></td>
</tr>
<tr id="datarowmarginsettings">
<td id="rownamemarginsettings"><?php _e('Description', 'views_base')?></td>
<td><div id="marginsettings_entry" abbr="site_description_padding_top">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_description_padding_bottom">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_description_padding_left">&nbsp;</div></td>
<td><div id="marginsettings_entry" abbr="site_description_padding_right">&nbsp;</div></td>
</tr>
</table> 
</div>
<div id="spacermarginpaddingsend"></div>
<p id="anotherspaceratend"></p>	
	    </div>
			<?php
	}
/**
 *
 * This is the function print social networks layout section. 
 *
 */
	function layout_section_social_networks()
	{
		?>
		 </div>
		 <div id="of-option-socialnetworks-tab" class="socialnetwork_jquery">
	      <h3 id="logo_upload"><?php _e('Social Networks', 'views_base')?></h3> 
	      <?php _e('<p id="firstbordersocialnetworks">Add your social networks in the header area</p>', 'views_base');?>  
		<div id='layout_section_socialnetworks_customcontent' style="display:none;">
		<div id="icontablesocialnetwork" abbr="social_icons">&nbsp;</div>
<div id="socialnetworkoptionsurl">
<table width="94%">
<tr id="datarowsocialnetworking">

<td id="rownamesocialnetworksoptions"><?php _e('Facebook', 'views_base')?></td>
<td><span abbr="enable_facebook"></span></td>
<td><div id="socialnetworksettings_entry" abbr="social_icons_facebook">&nbsp;</div></td>

</tr>
<tr id="datarowsocialnetworking">

<td id="rownamesocialnetworksoptions"><?php _e('Twitter', 'views_base')?></td>
<td><span abbr="enable_twitter"></td>
<td><div id="socialnetworksettings_entry" abbr="social_icons_twitter">&nbsp;</div></td>

</tr>
<tr id="datarowsocialnetworking">

<td id="rownamesocialnetworksoptions"><?php _e('Linkedin', 'views_base')?></td>
<td><span abbr="enable_linkedin"></td>
<td><div id="socialnetworksettings_entry" abbr="social_icons_linkedin">&nbsp;</div></td>

</tr>
<tr id="datarowsocialnetworking">

<td id="rownamesocialnetworksoptions"><?php _e('Google+', 'views_base')?></td>
<td><span abbr="enable_google_plus"></td>
<td><div id="socialnetworksettings_entry" abbr="social_icons_google_plus">&nbsp;</div></td>

</tr>
<tr id="datarowsocialnetworking">

<td id="rownamesocialnetworksoptions"><?php _e('Flickr', 'views_base')?></td>
<td><span abbr="enable_flickr"></td>
<td><div id="socialnetworksettings_entry" abbr="social_icons_flickr">&nbsp;</div></td>

</tr>
</table>
</div> 
<div id="spacersocialnetworksmiddle"></div> 
<p id="baidusharecodetext"><?php _e('Baidu Share Code', 'views_base')?></p>
<div id="baidusharecodetextarea">
<p abbr="baidu_share_code">&nbsp;</p>
</div>
<div id="spacersocialnetworkend"></div>
<p id="anotherspaceratendsocialnetwork"></p>	

</div>
		<?php
	}
	
	/**
	 *
	 * This is the function that custom css layout section.
	 *
	 */
	//CREATE A NEW FUNCTION layout_section_custom_code
	//COMBINE THE LAYOUT OF CUSTOM_CSS AND CUSTOM_FOOTER
	function layout_section_custom_code()
	{
		?>  </div>
		<div id="of-option-customcode-tab" class="customcss_jquery">
	      <h3 id="logo_upload"><?php _e('Custom CSS', 'views_base')?></h3> 
	      <?php _e('<p id="firstbordercustomcode">Insert custom CSS styling in the input box below.</p>', 'views_base');?>  			
            <div id='layout_section_customcode_customcontent' style="display:none;">
		    <div id="enablecssloadingfromdb">
			<p id="enable_custom_codep" abbr="enable_custom_css_fromdb">&nbsp;</p>
             </div>            
		    <div id="enablecustomcssoption">
			<p id="enable_custom_codep" abbr="enable_custom_css">&nbsp;</p>
             </div>			
		    <div id="custom_css_textarea">
		    <div id="outputtextcount"></div>
			<p abbr="custom_css">&nbsp;</p>
			</div>
		<div id="spacercustomcodemiddle"></div>
	      <h3 id="logo_upload"><?php _e('Custom footer', 'views_base')?></h3> 
	      <?php _e('<p id="secondbordercustomcode">Print credits and copyright Plain HTML in the footer area.</p>', 'views_base');?>  			
		    <div id="custom_footer_textarea">
			<p abbr="custom_footer">&nbsp;</p> 
			</div>
			</div>
			<div id="spacercustomcodeend"></div>
            <p id="anotherspaceratendsocialnetwork"></p>		
			<?php
	}
    function dummy()
    {
    ?>      </div>
	<?php
    }	
/** 
 *
 * This is the function that adds our Default Layout checkbox. 
 * @param array $args Optional. Override the defaults.
 */
	function layout_checkbox($args = array()) 
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$enable = intval(get_theme_mod($args['label_for'], $default_value));
		$option_name = $this->options_name . '[' . $label_for . ']';
		$text = '';
		if(isset($args['text'])) $text = $args['text'];
		?>
		<div id="<?php echo $args['label_for']?>">
		<?php
		//Bug fix for checkbox that will still be checked despited being unchecked after saving changes
		if ($enable==0) {
		$logiccustomcss="";
		} else {
		$logiccustomcss="checked='yes'";
		}
		?>
		<input type="hidden" name="<?php echo $option_name;?>" value="0" />
		<div id="checkbox_actual"><input name="<?php echo $option_name;?>" type="checkbox" value="1" <?php echo $logiccustomcss;?>  /></div><div id="checkbox_text"><?php echo $text;?></div>
		</div>
		<?php
	}

//CUSTOM CHECKBOX FOR ENABLING BACKGROUND IMAGES

	function layout_backgroundimage_checkbox($args = array()) 
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$enable = intval(get_theme_mod($args['label_for'], $default_value));
		$option_name = $this->options_name . '[' . $label_for . ']';
		$text = '';
		if(isset($args['text'])) $text = $args['text'];
		?>
		<div id="<?php echo $args['label_for']?>">
		<?php
		//Bug fix for checkbox that will still be checked despited being unchecked after saving changes
		if ($enable==0) {
		$logicimage="";
		} else {
		$logicimage="checked='yes'";
		}
		?>
		<input type="hidden" name="<?php echo $option_name;?>" value="0" />
		<div id="checkbox_actual"><input name="<?php echo $option_name;?>" type="checkbox" value="1" <?php echo $logicimage;?>  /></div><div id="checkbox_text"><?php echo $text;?></div>
		</div>
		<?php
	}
	
//CUSTOM CHECKBOX FOR SOCIAL NETWORKS

	function layout_socialnetworking_checkbox($args = array()) 
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$enable = intval(get_theme_mod($args['label_for'], $default_value));
		$option_name = $this->options_name . '[' . $label_for . ']';
		$text = '';
		if(isset($args['text'])) $text = $args['text'];
		?>
		<div id="<?php echo $args['label_for']?>">
		<?php
		//Bug fix for checkbox that will still be checked despited being unchecked after saving changes
		if ($enable==0) {
		$logicsocial="";
		} else {
		$logicsocial="checked='yes'";
		}
		?>
		<input type="hidden" name="<?php echo $option_name;?>" value="0" />
		<input name="<?php echo $option_name;?>" type="checkbox" value="1" <?php echo $logicsocial;?> /></div><div id="checkbox_text"><?php echo $text;?>
		</div>
		<?php
	}	
/**
 *
 * This is the function that adds our Default Layout textarea. 
 * @param array $args Optional. Override the defaults.
 */
	function layout_textarea($args=array()) 
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>">
		<textarea name="<?php echo $option_name;?>" rows="10" cols="50" class="large-text code"><?php echo $value;?></textarea>
		</div>
		<?php
	}
	function layout_textarea_custom_css($args=array())
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
	
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
	
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
			<div id="<?php echo $args['label_for']?>">
			<textarea id="customcsstextarea" name="<?php echo $option_name;?>" rows="10" cols="50" class="large-text code"><?php echo $value;?></textarea>
			</div>
			<?php
		}	
/**
 *
 * This is the function that adds our Default Layout for file upload. 
 * @param array $args Optional. Override the defaults.
 */
	//REFERENCE REVISION FOR ADDING FUNCTIONS FOR BACKGROUND COLORS INSTEAD OF IMAGES
	function layout_file($args=array()) 
	{	
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>" class="media_uploader_button">
		<input id="logo_url" type="hidden" name="<?php echo $option_name?>" value="<?php echo $value?>">
				<a id="upload_logo_button" title="Upload image" class="thickbox" href="#"><img src="<?php echo get_template_directory_uri().'/images/uploadimage.png';?>" /></a>
		</div>
		<?php
	}
	function layout_favicon($args=array()) 
	{	
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>" class="media_uploader_button">
		<input id="favicon_url" type="hidden" name="<?php echo $option_name?>" value="<?php echo $value?>">
				<a id="upload_favicon_ico" title="Upload image" class="thickbox" href="#"><img src="<?php echo get_template_directory_uri().'/images/uploadimage.png';?>" /></a>
		</div>
		<?php
	}
	function layout_background_image($args=array()) 
	{	
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>" class="media_uploader_button">
		<input id="background_image_urlupload" type="hidden" name="<?php echo $option_name?>" value="<?php echo $value?>">
				<a id="upload_background_image_now" title="Upload image" class="thickbox" href="#"><img src="<?php echo get_template_directory_uri().'/images/uploadimage.png';?>" /></a>
		</div>
		<?php
	}
	function layout_header_background_image($args=array()) 
	{	
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>" class="media_uploader_button">
		<input id="headerbackground_image_urlupload" type="hidden" name="<?php echo $option_name?>" value="<?php echo $value?>">
				<a id="upload_headerbackground_image_now" title="Upload image" class="thickbox" href="#"><img src="<?php echo get_template_directory_uri().'/images/uploadimage.png';?>" /></a>
		</div>
		<?php
	}
	function layout_footer_background_image($args=array()) 
	{	
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>" class="media_uploader_button">
		<input id="footerbackground_image_urlupload" type="hidden" name="<?php echo $option_name?>" value="<?php echo $value?>">
				<a id="upload_footerbackground_image_now" title="Upload image" class="thickbox" href="#"><img src="<?php echo get_template_directory_uri().'/images/uploadimage.png';?>" /></a>
		</div>
		<?php
	}
//START COLOR PICKER FUNCTION
	function layout_color($args=array())
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
	
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
	
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
			<div id="<?php echo $args['label_for']?>">
			     <div>
				    	<div> 	
			            <input type="text" id="colorpicks" name="<?php echo $option_name?>" value="<?php echo $value?>">
			            </div>
			    </div>
			</div>
			<?php
	}
//END	
/**
 *
 * This is the function that adds our Default Layout for select upload. 
 * @param array $args Optional. Override the defaults.
 */
	function layout_select($args=array()) 
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		
		$options = array();
		if(isset($args['options'])&&sizeof($args['options'])>0) $options = $args['options'];
		
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>">
		<select name="<?php echo $option_name?>">
		<?php 
		foreach($options as $k => $v)
		{
			?>
			<option value="<?php echo $k;?>" <?php selected( $k, $value, 1 ); ?>><?php echo $v;?></option>
			<?php
		}?>
		</select>
		</div>
		<?php
	}
		
/**
 *
 * This is the function that adds our Default Layout for font select menu. 
 * @param array $args Optional. Override the defaults.
 */
	function layout_font_select($args=array()) 
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		
		$options = array();
		if(isset($args['options'])&&sizeof($args['options'])>0) $options = $args['options'];
		
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>">
		<select name="<?php echo $option_name?>">
		<?php 
		foreach($options as $k => $v)
		{
			?>
			<option value="<?php echo esc_attr($k);?>" <?php selected( $k, $value, 1 ); ?>><?php echo $k;?></option>
			<?php
		}?>
		</select>
		</div>
		<?php
	}
	
/**
 *
 * This is the function that adds our Default Layout for radio upload. 
 * @param array $args Optional. Override the defaults.
 */
	function layout_radio($args=array()) 
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		
		$options = array();
		if(isset($args['options'])&&sizeof($args['options'])>0) $options = $args['options'];
		
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		?>
		<div id="<?php echo $args['label_for']?>"><table width="81%"><tr>
		<?php 
		foreach($options as $k => $v)
		{
			?>
			<td id="<?php echo $label_for.'_radio';?>"><input name="<?php echo $option_name?>" type="radio" value="<?php echo $k;?>" <?php checked( $k, $value, 1 ); ?> /></td><td id="<?php echo $label_for.'_value';?>"><?php echo $v;?></td>
			<?php
		}?></tr></table>
		</div>
		<?php
	}

	function layout_radio_customcssdb($args=array())
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
	
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
	
		$options = array();
		if(isset($args['options'])&&sizeof($args['options'])>0) $options = $args['options'];
	
		$option_name = $this->options_name . '[' . $label_for . ']';
	    
		$value = get_theme_mod($args['label_for'], $default_value);
				
		?>		
			<div id="<?php echo $args['label_for']?>"><table width="81%"><tr>
			<?php 
			foreach($options as $k => $v)
			{
				?>
				<td id="<?php echo $label_for.'_radio';?>"><input name="<?php echo $option_name?>" type="radio" value="<?php echo $k;?>" <?php checked( $k, $value, 1 ); ?> /></td><td id="<?php echo $label_for.'_value';?>"><?php echo $v;?></td>
				<?php
			}?></tr></table>
			</div>
			<?php
		}
/**
 *
 * This is the function that adds our Default Layout text. 
 * @param array $args Optional. Override the defaults.
 */
	function layout_text($args=array()) 
	{
		if(!isset($args['label_for'])||$args['label_for']=='') return;
		$label_for = $args['label_for'];
		
		$default_value = '';
		if(isset($args['default_value'])) $default_value = $args['default_value'];
		$option_name = $this->options_name . '[' . $label_for . ']';
		
		$value = get_theme_mod($args['label_for'], $default_value);
		
		$size = '';
		if(isset($args['size'])) $size = 'size="' . $args['size'] . '"';
		
		$prepend = '';
		if(isset($args['prepend'])) $prepend = $args['prepend'];
		?>
		<div id="<?php echo $args['label_for']?>">
		<?php echo $prepend;?><input type="text" name="<?php echo $option_name;?>" <?php echo $size;?> value="<?php echo $value;?>" />
		</div>
		<?php
	}
	
/**
* Load sidebar template.
*
* Includes the sidebar template for a theme or if a name is specified then a
* specialised sidebar will be included.
* Get sitebar action. 
* @param string $name The name of the specialised sidebar.
*/
	function get_sidebar($name = null) 
	{
		$templates = array();
		if ( isset($name) )
			$templates[] = "sidebar-{$name}.php";
		//default sidebar file
		$templates[] = 'sidebar.php';
		
		// locate sidebar template file
		$_template_file  = locate_template($templates);
		
		if('' != $_template_file )
		{
			global $posts, $post, $wp_did_header, $wp_did_template_redirect, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;
			if ( is_array( $wp_query->query_vars ) )
			{
				extract( $wp_query->query_vars, EXTR_SKIP );
			}
			require( $_template_file );
		}
		// replace default wordpress function get_sidebar
		return;
	}
	
/**
 * Styles the header image and text displayed on the blog
 *
 * get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank'), or any hex value
 */
	function header_style() {
		// If no custom options for text are set, let's bail
		if ( HEADER_TEXTCOLOR == get_header_textcolor() )
			return;
		// If we get this far, we have custom styles.
		?>
		<style type="text/css">
		<?php
			// Has the text been hidden?
			if ( 'blank' == get_header_textcolor() ) :
		?>
			.site-title,
			.site-description {
				position: absolute !important;
				clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text, use that.
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo get_header_textcolor(); ?> !important;
			}
		<?php endif; ?>
		</style>
		<?php
	}

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header().
 */
	function admin_header_style() 
	{
		?>
		<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#headimg h2 {
			line-height: 1.6;
			margin: 0;
			padding: 0;
		}
		#headimg h1 {
			font-size: 30px;
		}
		#headimg h1 a {
			text-decoration: none;
		}
		#headimg h2 {
			font: normal 14px/1.8 "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", sans-serif;
			margin-bottom: 24px;
		}
		#headimg img {
		}
		</style>
		<?php
	}

/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() .
 */
	function admin_header_image() 
	{ 
		?>
		<div id="headimg">
			<?php
			if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
				$style = ' style="display:none;"';
			else
				$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
			?>
			<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></h2>
			<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
			<?php endif; ?>
		</div>
		<?php 
	}
/**
 * Switch class of div "wptypes-middle", if no sidebarsor or just one
 */
	function middle_switch($default='', $middle_switch_arr=array()) {
		$res = $default;
		$sidebars = $this->middle_switch_arr;
		if(count($middle_switch_arr)>0)
		{
			$sidebars = $middle_switch_arr;
		}
		$num = 0;
		$class_array = array('','two_colomn','three_colomn');
		foreach($sidebars as $v)
		{
			if(is_active_sidebar( $v ))
			{
				$num ++;
			}
		}
		if(isset($class_array[$num]))
		{
			$res = $class_array[$num];
		}
		return $res;
	}

/**
 * Switch to mobile menu for devices
 */
	function mobilemenu_js()
	{
		?>
		<script>
			jQuery(document).ready(function(){
					jQuery('.mainmenu').mobileMenu();
			});
		</script>
	<?php 
	}
	
/**
 * print js and css in admin side
 */
	function admin_styles ()
	{
		//Wordpress core scripts and styles including custom admin scripts
		wp_enqueue_script( 'views_base_admin', get_template_directory_uri() .'/javascripts/admin.js', array( 'jquery', 'thickbox', 'media-upload' ) ); 
		wp_enqueue_style('thickbox');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('media-upload');
		//Load framework JS and CSS theme options style
		wp_enqueue_style('admin-style', get_template_directory_uri() . '/admin-css/admin-style.css');
		wp_enqueue_script('options-custom', get_template_directory_uri() . '/javascripts/options-custom.js', array('jquery'));
		//Load custom radio button CSS
		wp_enqueue_style('radiobutton-customcss', get_template_directory_uri() . '/admin-css/form.css');
		//Load custom  JS for radio button
		wp_enqueue_script('radiobutton-customjs', get_template_directory_uri() . '/javascripts/custom-form-elements.js', array('jquery'));
		//Load color picker JS and CSS
		wp_enqueue_style('color-picker-style', get_template_directory_uri() . '/admin-css/colorpicker.css');
		wp_enqueue_style('color-picker-layout-style', get_template_directory_uri() . '/admin-css/layout.css');
		wp_enqueue_script('color-picker-js', get_template_directory_uri() . '/javascripts/colorpicker.js', array('jquery'));
		wp_enqueue_script('color-picker-eye-js', get_template_directory_uri() . '/javascripts/eye.js', array('jquery'));
		wp_enqueue_script('color-picker-utils-js', get_template_directory_uri() . '/javascripts/utils.js', array('jquery'));
		wp_enqueue_script('color-picker-layout-js', get_template_directory_uri() . '/javascripts/layout.js', array('jquery'));
				
		//add localize JS
		
		//CSS file is loaded
		$useralreadyenablecssdb= get_option('cssfileisloaded');
		if ($useralreadyenablecssdb=='yes') {
        $cssfileloadedtrue='yes';
        } else {
        $cssfileloadedtrue='no';
        }

        //Custom CSS is not empty
        $customcsscontentdb = get_theme_mod('custom_css');
        
        if ($customcsscontentdb=='') {
        $customcssisempty= 'yes';
        } else {
        $customcssisempty= 'no';
        }
        
        //Theme options already set and containing settings
        $themeoption_name_in_database=get_option('theme_mods_'.get_stylesheet());
        
        if ($themeoption_name_in_database) {
        $themeoptionsare_set='yes';
        } else {
        $themeoptionsare_set='no';	
        }
        
        //Get size of Custom CSS string
        if ($useralreadyenablecssdb=='yes') {

        $limit=get_option('csscharlimit_basetheme');
        
        } else {
        $limit=0;        
        }
		wp_localize_script('views_base_admin', 'localize_script_basetheme',
				array(
						'cssfileloadedistrue' => $cssfileloadedtrue,
						'customcssisempty' => $customcssisempty,
						'themeoptions_are_set' => $themeoptionsare_set,
						'charlimitsofcss' =>$limit,
						
				      )
		);
		
	
	}
/**
 * print custom header style
 */
	function custom_header_styles ()
	{
		?>
		<link rel="shortcut icon" href="<?php echo get_theme_mod('custom_favicon', $this->get_default_value('custom_favicon'));?>" type="image/x-icon" />
		
		<?php
		//assigning styles to a custom css file
		
		//FINALIZING #header-container custom style
		
		//logic for showing header background image instead of color
		
		$mainbackgroundimagelogic= get_theme_mod('enable_header_background_image');


			if ($mainbackgroundimagelogic==0) {
            //header background image is disabled, show background color
			
            $mainbackgroundoutput= 'background-color: '.get_theme_mod('header_background_color').';'; 
            
			}
			else {
            //header background image enabled, show background image
								
			$mainbackgroundoutput= 'background-image:url('.get_theme_mod('header_background').');';
			}
        
        $header_containercustomstyle= '#header-container{'.$mainbackgroundoutput.'}';
		
		//FINALIZING #main-container custom style				
			
			//logic for showing background image instead of color
			$mainbackgroundimagelogic= get_theme_mod('enable_main_background_image');
			if ($mainbackgroundimagelogic==0) {
            //main background image is disabled, show background color
			
            $mainbackgroundlogicout= 'background-color: '.get_theme_mod('main_background_color').';';
            
			} else {
            //background image enabled, show background image
						
			$mainbackgroundlogicout= 'background-image:url('.get_theme_mod('main_background').');';
			}
        $main_containercustomstyle=	'#main-container{'.$mainbackgroundlogicout.'}';		
		
		//FINALIZING #footer-container custom style     	
			
			//logic for showing footer background image instead of color
			$footerbackgroundimagelogic= get_theme_mod('enable_footer_background_image');
			if ($footerbackgroundimagelogic==0) {
            //footer background image is disabled, show background color
						
            $footerbackgroundlogic='background-color: '.get_theme_mod('footer_background_color').';';			
            
			} else {
            //footer background image enabled, show background image
						
			$footerbackgroundlogic='background-image:url('.get_theme_mod('footer_background').');';
			}
            				
		$footer_containercustomstyle='#footer-container{'.$footerbackgroundlogic.'}';		
		
		//FINALIZING .site-header hgroup h1 custom style
        
		//this one is echoed directly
		$currenttitlefontsizevaluex='font-size: '.get_theme_mod('site_title_font_size').';';
		$fontfamily_site_headerhgrouph1='font-family:'.@$this->font_family_options[get_theme_mod('site_title_font_family')].';';		
		//font-style,bold logic
				$fontstyleimplemented_2= get_theme_mod('site_title_style');
				if ($fontstyleimplemented_2=='bold') {
				//use font weight instead of font style
					
                $fontstylingaspect_site_headerhgrouph1= 'font-weight:'.get_theme_mod('site_title_style').';';	
				
				} else {
				//use font style
								
				$fontstylingaspect_site_headerhgrouph1='font-style:'.get_theme_mod('site_title_style').';';
                
                }
        $margin_site_headerhgrouph1= 'margin:'.get_theme_mod('site_title_margin_top', $this->get_default_value('site_title_margin_top')).'em'.' '.get_theme_mod('site_title_margin_right', $this->get_default_value('site_title_margin_right')).'em'.' '.get_theme_mod('site_title_margin_bottom', $this->get_default_value('site_title_margin_bottom')).'em'.' '.get_theme_mod('site_title_margin_left', $this->get_default_value('site_title_margin_left')).'em;';
		
		$padding_site_headerhgrouph1= 'padding: '.get_theme_mod('site_title_padding_top', $this->get_default_value('site_title_padding_top')).'em'.' '.get_theme_mod('site_title_padding_right', $this->get_default_value('site_title_padding_right')).'em'.' '.get_theme_mod('site_title_padding_bottom', $this->get_default_value('site_title_padding_bottom')).'em'.' '.get_theme_mod('site_title_padding_left', $this->get_default_value('site_title_padding_left')).'em;';
			    
		$site_headerhgrouph1='.site-header hgroup h1{'.$currenttitlefontsizevaluex.$fontfamily_site_headerhgrouph1.$fontstylingaspect_site_headerhgrouph1.$margin_site_headerhgrouph1.$padding_site_headerhgrouph1.'}';	

        //FINALIZING .site-header hgroup h1 a:hover
		
		$site_header_hgrouph1ahover='.site-header hgroup h1 a:hover{color:'.get_theme_mod('site_title_hover_color').';}';

       //FINALIZING .site-header hgroup h1 a
	   
	    $site_header_hgrouph1a= '.site-header hgroup h1 a {color: '.get_theme_mod('site_title_color').';}'; 

       //FINALIZING site-descriptionpadding a:hover
	   
        $site_descriptionpaddingahover= '.site-descriptionpadding a:hover{color: '.get_theme_mod('site_description_hover_color').';}';
			
       //FINALIZING .site-descriptionpadding

        $site_description_padding_color='.site-descriptionpadding{color: '.get_theme_mod('site_description_color').';}'; 

       //FINALIZING header.entry-header .entry-title a:hover

		$headerentryheaderahover='header.entry-header .entry-title a:hover {color: '.get_theme_mod('article_title_hover_color').';}';

       //FINALIZING header.entry-header .entry-title a
        
	    $headerentryheadertitlea_color='color: '.get_theme_mod('article_title_color').';';
		$headerentryheadertitlea_fontfamily='font-family: '.@$this->font_family_options[get_theme_mod('article_font_family')].';';   				
		$headerentryheadertitlea_fontsize='font-size: '.get_theme_mod('article_font_size').';';		 

				//font-style,bold logic
				$fontstyleimplemented_20= get_theme_mod('article_font_style');
				if ($fontstyleimplemented_20=='bold') {
				//use font weight instead of font style
								
                $headerentryheadertitlea_fontstylistic= 'font-weight: '.get_theme_mod('article_font_style').';}';				
				
				} else {
				//use font style
								
				$headerentryheadertitlea_fontstylistic= 'font-style: '.get_theme_mod('article_font_style').';}';
                
                }
                					
        $headerentryheadertitlea='header.entry-header .entry-title a {'.$headerentryheadertitlea_color.$headerentryheadertitlea_fontfamily.$headerentryheadertitlea_fontsize.$headerentryheadertitlea_fontstylistic;			


      //FINALIZING header.entry-header .entry-title
        
	    $headerentryheadertitlex_color='color: '.get_theme_mod('article_title_color').';';
		$headerentryheadertitlex_fontfamily='font-family: '.@$this->font_family_options[get_theme_mod('article_font_family')].';';   				
		$headerentryheadertitlex_fontsize='font-size: '.get_theme_mod('article_font_size').';';		 

				//font-style,bold logic
				$fontstyleimplemented_25= get_theme_mod('article_font_style');
				if ($fontstyleimplemented_25=='bold') {
				//use font weight instead of font style
								
                $headerentryheadertitlex_fontstylistic= 'font-weight: '.get_theme_mod('article_font_style').';}';				
				
				} else {
				//use font style
								
				$headerentryheadertitlex_fontstylistic= 'font-style: '.get_theme_mod('article_font_style').';}';
                
                }
                					
        $headerentryheadertitlex='header.entry-header h1.entry-title{'.$headerentryheadertitlex_color.$headerentryheadertitlex_fontfamily.$headerentryheadertitlex_fontsize.$headerentryheadertitlex_fontstylistic;

//header.entry-header .entry-title
 //FINALIZING div.entry-content p
        
		$diventrycontentp_color='color: '.get_theme_mod('content_font_color').';';
        $diventrycontentp_fontfamily='font-family: '.@$this->font_family_options[get_theme_mod('content_font_family')].';';
        $diventrycontentp_fontsize='font-size:'.get_theme_mod('content_font_size').';';		
				
				//font-style,bold logic
				$fontstyleimplemented_1= get_theme_mod('content_font_style');
				if ($fontstyleimplemented_1=='bold') {
				//use font weight instead of font style
				
				$diventrycontentp_fontstylics='font-weight: '.get_theme_mod('content_font_style').';}';
				
				} else {
				//use font style
				
				$diventrycontentp_fontstylics='font-style: '.get_theme_mod('content_font_style').';}';
				                
                }
                				
		$diventrycontentp='div.entry-content p {'.$diventrycontentp_color.$diventrycontentp_fontfamily.$diventrycontentp_fontsize.$diventrycontentp_fontstylics;

		//FINALIZING a:visited

        $avisitedlink='a:visited {color: '.get_theme_mod('link_color').';}';

		//FINALIZING a:hover

		$avisitedlinkhover='a:hover {color: '.get_theme_mod('link_hover_color').';}';

		//FINALIZING .entry-meta a:hover
		
		$entrymetaahover='.entry-meta a:hover {color: '.get_theme_mod('link_hover_color').';}'; 			
		
        //FINALIZING footer[role="contentinfo"] a:hover
		
		$footercontentinfohover='footer[role="contentinfo"] a:hover {color: '.get_theme_mod('link_hover_color').';}';

		//FINALIZING nav.footer-navigation ul li a:hover  
		
        $navfooterulliahover='nav.footer-navigation ul li a:hover {color: '.get_theme_mod('link_hover_color').';}';

        //FINALIZING a        
		$astandardlink='a {color: '.get_theme_mod('link_color').';}';  
					
        //FINALIZING .entry-meta a	

		$entrymetaaxlink= '.entry-meta a {color: '.get_theme_mod('link_color').';}'; 			

		$footerrolecontainax='footer[role="contentinfo"] a {color: '.get_theme_mod('link_color').';}'; 
		
        $navfooternavigationulliax='nav.footer-navigation ul li a {color: '.get_theme_mod('link_color').';}'; 
				
        $navmainnavigationahoverx='nav.main-navigation li a:hover {color: '.get_theme_mod('menu_hover_color').';}';
		
		$navmainnavigationliax='nav.main-navigation li a {color: '.get_theme_mod('menu_color').';}';
					
        //FINALIZING .site-header hgroup h2
        
		$siteheaderhgrouph2x_fontfamily='font-family: '.@$this->font_family_options[get_theme_mod('site_description_font_family')].';';
        $siteheaderhgrouph2x_fontsize='font-size: '.get_theme_mod('site_description_font_size').';';		
				
				//font-style,bold logic
				$fontstyleimplemented_3= get_theme_mod('site_description_style');
				if ($fontstyleimplemented_3=='bold') {
				//use font weight instead of font style
				
                $siteheaderhgrouph2x_fontstylistics='font-weight:'.get_theme_mod('site_description_style').';font-style:normal;';				
				
				} else {
				//use font style
								
				$siteheaderhgrouph2x_fontstylistics='font-style:'.get_theme_mod('site_description_style').';';
				}
		$siteheaderhgrouph2x_fontcolor='color: '.get_theme_mod('site_description_color').';'; 
        $siteheaderhgrouph2x_margin='margin: '.get_theme_mod('site_description_margin_top', $this->get_default_value('site_description_margin_top')).'em'.' '.get_theme_mod('site_description_margin_right', $this->get_default_value('site_description_margin_right')).'em'.' '.get_theme_mod('site_description_margin_bottom', $this->get_default_value('site_description_margin_bottom')).'em'.' '.get_theme_mod('site_description_margin_left', $this->get_default_value('site_description_margin_left')).'em;';
        $siteheaderhgrouph2x_padding='padding: '.get_theme_mod('site_description_padding_top', $this->get_default_value('site_description_padding_top')).'em'.' '.get_theme_mod('site_description_padding_right', $this->get_default_value('site_description_padding_right')).'em'.' '.get_theme_mod('site_description_padding_bottom', $this->get_default_value('site_description_padding_bottom')).'em'.' '.get_theme_mod('site_description_padding_left', $this->get_default_value('site_description_padding_left')).'em;}';

        $siteheaderhgrouph2x='.site-header hgroup h2{'.$siteheaderhgrouph2x_fontfamily.$siteheaderhgrouph2x_fontsize.$siteheaderhgrouph2x_fontstylistics.$siteheaderhgrouph2x_fontcolor.$siteheaderhgrouph2x_margin.$siteheaderhgrouph2x_padding;		

        //FINALIZING .site-header hgroup h3
					
		$siteheaderhgrouph3x_fontsize='font-size: '.get_theme_mod('site_description_font_size').';';
        $siteheaderhgrouph3x_fontfamily='font-family: '.@$this->font_family_options[get_theme_mod('site_description_font_family')].';';				
		$siteheaderhgrouph3x_fontsizex='font-size: '.get_theme_mod('site_description_font_size').';';				
				
				//font-style,bold logic
				$fontstyleimplemented_4= get_theme_mod('site_description_style');
				if ($fontstyleimplemented_4=='bold') {
				//use font weight instead of font style
				
				$siteheaderhgrouph3x_fontstylistics='font-weight:'.get_theme_mod('site_description_style').';';
				
				} else {
				//use font style
									
				$siteheaderhgrouph3x_fontstylistics='font-style:'.get_theme_mod('site_description_style').';';
                
                }
        $siteheaderhgrouph3x_fontcolor='color: '.get_theme_mod('site_description_color').';';  
        $siteheaderhgrouph3x_margin='margin: '.get_theme_mod('site_description_margin_top', $this->get_default_value('site_description_margin_top')).'em'.' '.get_theme_mod('site_description_margin_right', $this->get_default_value('site_description_margin_right')).'em'.' '.get_theme_mod('site_description_margin_bottom', $this->get_default_value('site_description_margin_bottom')).'em'.' '.get_theme_mod('site_description_margin_left', $this->get_default_value('site_description_margin_left')).'em;';         		
		$siteheaderhgrouph3x_padding='padding: '.get_theme_mod('site_description_padding_top', $this->get_default_value('site_description_padding_top')).'em'.' '.get_theme_mod('site_description_padding_right', $this->get_default_value('site_description_padding_right')).'em'.' '.get_theme_mod('site_description_padding_bottom', $this->get_default_value('site_description_padding_bottom')).'em'.' '.get_theme_mod('site_description_padding_left', $this->get_default_value('site_description_padding_left')).'em;}';		
				
		$siteheaderhgrouph3x='.site-header hgroup h3{'.$siteheaderhgrouph3x_fontsize.$siteheaderhgrouph3x_fontfamily.$siteheaderhgrouph3x_fontsizex.$siteheaderhgrouph3x_fontstylistics.$siteheaderhgrouph3x_fontcolor.$siteheaderhgrouph3x_margin.$siteheaderhgrouph3x_padding;			
	
		//Writing to a custom css file
		$themecustomcsspath= get_template_directory() . '/customheadercss.css';

		$datatowrite=$header_containercustomstyle.$main_containercustomstyle.$footer_containercustomstyle.$site_headerhgrouph1.$site_header_hgrouph1ahover.$site_header_hgrouph1a.$site_descriptionpaddingahover.$site_description_padding_color.$headerentryheaderahover.$headerentryheadertitlea.$headerentryheadertitlex.$diventrycontentp.$avisitedlink.$avisitedlinkhover.$entrymetaahover.$footercontentinfohover.$navfooterulliahover.$astandardlink.$entrymetaaxlink.$footerrolecontainax.$navfooternavigationulliax.$navmainnavigationahoverx.$navmainnavigationliax.$siteheaderhgrouph2x.$siteheaderhgrouph3x;
	
		@file_put_contents($themecustomcsspath, $datatowrite);
		$cssfromdd_enabled=get_theme_mod('enable_custom_css_fromdb');
		if ($cssfromdd_enabled=='yes') {
		
		} else {
		?>
		
		<link rel='stylesheet' href='<?php echo get_template_directory_uri().'/customheadercss.css'; ?>' type='text/css' media='all' />		
		<?php
		}
	}
	
/**
 * Get theme option default_value
 * @param string $name The name of the specialised theme option.
 */
	function get_default_value($name='')
	{
		$res = false;
		foreach($this->options_arr as $ks => $vs)
		{
			if(isset($vs['fields'])&&sizeof($vs['fields'])>0)
			{
				foreach($vs['fields'] as $kf => $vf)
				{
					if($kf == $name)
					{
						if(isset($vf['args']['default_value']))
						{
							$res = $vf['args']['default_value'];
							return $res;
						}
					}
				}
			}
		}
		return $res;
	}
	
/**
 * Get theme option current value
 * @param string $name The name of the specialised theme option.
 */
	function get_current_value($name='')
	{
		$res = false;
		$key = $this->get_default_value($name);
		if(get_theme_mod($name, $key))
		{
			$key = get_theme_mod($name, $key);
		}
		foreach($this->options_arr as $ks => $vs)
		{
			if(isset($vs['fields'])&&sizeof($vs['fields'])>0)
			{
				foreach($vs['fields'] as $kf => $vf)
				{
					if($kf == $name)
					{
						if(isset($vf['args']['options'])&&isset($vf['args']['options'][$key]))
						{
							$res = $vf['args']['options'][$key];
							return $res;
						}
					}
				}
			}
		}
		return $res;
	}
}
?>
