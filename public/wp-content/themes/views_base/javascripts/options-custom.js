/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */
jQuery(document).ready(function($) {
	
	// Fade out the save message
	$('.fade').delay(1000).fadeOut(1000);
	
	// Color Picker
	$('.colorSelector').each(function(){
		var Othis = this; //cache a copy of the this variable for use inside nested function
		var initialColor = $(Othis).next('input').attr('value');
		$(this).ColorPicker({
		color: initialColor,
		onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
		},
		onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
		},
		onChange: function (hsb, hex, rgb) {
		$(Othis).children('div').css('backgroundColor', '#' + hex);
		$(Othis).next('input').attr('value','#' + hex);
	}
	});
	}); //end color picker
	
	// Switches option sections
	$('.group').hide();
	var activetab = '';
	if (typeof(localStorage) != 'undefined' ) {
		activetab = localStorage.getItem("activetab");		
	}
	if (activetab != '' && $(activetab).length ) {
		$(activetab).fadeIn();			
	} else {		
		$('.group:first').fadeIn();
				
	}
	$('.group .collapsed').each(function(){
		$(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).hasClass('last')) {
					$(this).removeClass('hidden');
						return false;
					}
				$(this).filter('.hidden').removeClass('hidden');
			});
	});
	
	if (activetab != '' && $(activetab + '-tab').length ) {
		$(activetab + '-tab').addClass('nav-tab-active');
	}
	else {
		$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
	}	
		
		
//ACTIVE TAB LOGIC on PAGE RELOAD

//condition1 on theme activation active tab is null, show general settings

if (activetab===null) {
	//SHOW THE GENERAL SETTINGS TAB ON RELOAD
	$('.general_settings_jquery').fadeIn();
	$('.background_images_jquery').hide();
	$('.font_color_jquery').hide();
	$('.font_types_jquery').hide();
	$('.font_spacing_jquery').hide();
	$('.socialnetwork_jquery').hide();
	$('.customcss_jquery').hide();	
	
    //MAKE GENERAL SETTINGS THE DEFAULT TAB ON PAGE RELOAD	
	//THE REST IS INACTIVE
	$('#of-option-generalsettings-tab').addClass('nav-tab-active');
    $('#of-option-backgroundsettings-tab').removeClass('nav-tab-active');		
    $('#of-option-colorsettings-tab').removeClass('nav-tab-active');
    $('#of-option-typesetting-tab').removeClass('nav-tab-active');
    $('#of-option-spacing-tab').removeClass('nav-tab-active');
    $('#of-option-socialnetworks-tab').removeClass('nav-tab-active');
    $('#of-option-customcode-tab').removeClass('nav-tab-active');

    //MAKE GENERAL SETTINGS THE DEFAULT HEADER ON PAGE RELOAD
    //HIDE THE REST
	$('#groupthisheaders #of-option-generalsettings').fadeIn();
    $('#groupthisheaders #of-option-backgroundsettings').hide();		
    $('#groupthisheaders #of-option-colorsettings').hide();
    $('#groupthisheaders #of-option-typesetting').hide();
    $('#groupthisheaders #of-option-spacing').hide();
    $('#groupthisheaders #of-option-socialnetworks').hide();
    $('#groupthisheaders #of-option-customcode').hide();	

//condition2, loading on general settings 
} else if(activetab=='#of-option-generalsettings') {

	//SHOW THE GENERAL SETTINGS TAB ON RELOAD
	$('.general_settings_jquery').fadeIn();
	$('.background_images_jquery').hide();
	$('.font_color_jquery').hide();
	$('.font_types_jquery').hide();
	$('.font_spacing_jquery').hide();
	$('.socialnetwork_jquery').hide();
	$('.customcss_jquery').hide();	
	
    //MAKE GENERAL SETTINGS THE DEFAULT TAB ON PAGE RELOAD	
	//THE REST IS INACTIVE
	$('#of-option-generalsettings-tab').addClass('nav-tab-active');
    $('#of-option-backgroundsettings-tab').removeClass('nav-tab-active');		
    $('#of-option-colorsettings-tab').removeClass('nav-tab-active');
    $('#of-option-typesetting-tab').removeClass('nav-tab-active');
    $('#of-option-spacing-tab').removeClass('nav-tab-active');
    $('#of-option-socialnetworks-tab').removeClass('nav-tab-active');
    $('#of-option-customcode-tab').removeClass('nav-tab-active');

    //MAKE GENERAL SETTINGS THE DEFAULT HEADER ON PAGE RELOAD
    //HIDE THE REST
	$('#groupthisheaders #of-option-generalsettings').fadeIn();
    $('#groupthisheaders #of-option-backgroundsettings').hide();		
    $('#groupthisheaders #of-option-colorsettings').hide();
    $('#groupthisheaders #of-option-typesetting').hide();
    $('#groupthisheaders #of-option-spacing').hide();
    $('#groupthisheaders #of-option-socialnetworks').hide();
    $('#groupthisheaders #of-option-customcode').hide();	

//condition3, loading on background settings
} else if(activetab=='#of-option-backgroundsettings') {

	//background settings fadein
	$('.general_settings_jquery').hide();
	$('.background_images_jquery').fadeIn();
	$('.font_color_jquery').hide();
	$('.font_types_jquery').hide();
	$('.font_spacing_jquery').hide();
	$('.socialnetwork_jquery').hide();
	$('.customcss_jquery').hide();	
	
	//background settings active tab
	$('#of-option-generalsettings-tab').removeClass('nav-tab-active');
    $('#of-option-backgroundsettings-tab').addClass('nav-tab-active');		
    $('#of-option-colorsettings-tab').removeClass('nav-tab-active');
    $('#of-option-typesetting-tab').removeClass('nav-tab-active');
    $('#of-option-spacing-tab').removeClass('nav-tab-active');
    $('#of-option-socialnetworks-tab').removeClass('nav-tab-active');
    $('#of-option-customcode-tab').removeClass('nav-tab-active');

	//background settings header fadein
	$('#groupthisheaders #of-option-generalsettings').hide();
    $('#groupthisheaders #of-option-backgroundsettings').fadeIn();		
    $('#groupthisheaders #of-option-colorsettings').hide();
    $('#groupthisheaders #of-option-typesetting').hide();
    $('#groupthisheaders #of-option-spacing').hide();
    $('#groupthisheaders #of-option-socialnetworks').hide();
    $('#groupthisheaders #of-option-customcode').hide();

//condition4, loading on color settings
} else if(activetab=='#of-option-colorsettings') {

	//color settings fadein
	$('.general_settings_jquery').hide();
	$('.background_images_jquery').hide();
	$('.font_color_jquery').fadeIn();
	$('.font_types_jquery').hide();
	$('.font_spacing_jquery').hide();
	$('.socialnetwork_jquery').hide();
	$('.customcss_jquery').hide();	
	
	//color settings active tab
	$('#of-option-generalsettings-tab').removeClass('nav-tab-active');
    $('#of-option-backgroundsettings-tab').removeClass('nav-tab-active');		
    $('#of-option-colorsettings-tab').addClass('nav-tab-active');
    $('#of-option-typesetting-tab').removeClass('nav-tab-active');
    $('#of-option-spacing-tab').removeClass('nav-tab-active');
    $('#of-option-socialnetworks-tab').removeClass('nav-tab-active');
    $('#of-option-customcode-tab').removeClass('nav-tab-active');

	//color settings header fadein
	$('#groupthisheaders #of-option-generalsettings').hide();
    $('#groupthisheaders #of-option-backgroundsettings').hide();		
    $('#groupthisheaders #of-option-colorsettings').fadeIn();
    $('#groupthisheaders #of-option-typesetting').hide();
    $('#groupthisheaders #of-option-spacing').hide();
    $('#groupthisheaders #of-option-socialnetworks').hide();
    $('#groupthisheaders #of-option-customcode').hide();

//condition5, loading on typesetting	
} else if(activetab=='#of-option-typesetting') {

	//type settings fadein
	$('.general_settings_jquery').hide();
	$('.background_images_jquery').hide();
	$('.font_color_jquery').hide();
	$('.font_types_jquery').fadeIn();
	$('.font_spacing_jquery').hide();
	$('.socialnetwork_jquery').hide();
	$('.customcss_jquery').hide();	
	
	//type settings active tab
	$('#of-option-generalsettings-tab').removeClass('nav-tab-active');
    $('#of-option-backgroundsettings-tab').removeClass('nav-tab-active');		
    $('#of-option-colorsettings-tab').removeClass('nav-tab-active');
    $('#of-option-typesetting-tab').addClass('nav-tab-active');
    $('#of-option-spacing-tab').removeClass('nav-tab-active');
    $('#of-option-socialnetworks-tab').removeClass('nav-tab-active');
    $('#of-option-customcode-tab').removeClass('nav-tab-active');

	//type settings header fadein
	$('#groupthisheaders #of-option-generalsettings').hide();
    $('#groupthisheaders #of-option-backgroundsettings').hide();		
    $('#groupthisheaders #of-option-colorsettings').hide();
    $('#groupthisheaders #of-option-typesetting').fadeIn();
    $('#groupthisheaders #of-option-spacing').hide();
    $('#groupthisheaders #of-option-socialnetworks').hide();
    $('#groupthisheaders #of-option-customcode').hide();

//condition6, loading on spacing
} else if(activetab=='#of-option-spacing') {

	//spacing settings fadein
	$('.general_settings_jquery').hide();
	$('.background_images_jquery').hide();
	$('.font_color_jquery').hide();
	$('.font_types_jquery').hide();
	$('.font_spacing_jquery').fadeIn();
	$('.socialnetwork_jquery').hide();
	$('.customcss_jquery').hide();	
	
	//spacing settings active tab
	$('#of-option-generalsettings-tab').removeClass('nav-tab-active');
    $('#of-option-backgroundsettings-tab').removeClass('nav-tab-active');		
    $('#of-option-colorsettings-tab').removeClass('nav-tab-active');
    $('#of-option-typesetting-tab').removeClass('nav-tab-active');
    $('#of-option-spacing-tab').addClass('nav-tab-active');
    $('#of-option-socialnetworks-tab').removeClass('nav-tab-active');
    $('#of-option-customcode-tab').removeClass('nav-tab-active');

	//spacing settings header fadein
	$('#groupthisheaders #of-option-generalsettings').hide();
    $('#groupthisheaders #of-option-backgroundsettings').hide();		
    $('#groupthisheaders #of-option-colorsettings').hide();
    $('#groupthisheaders #of-option-typesetting').hide();
    $('#groupthisheaders #of-option-spacing').fadeIn();
    $('#groupthisheaders #of-option-socialnetworks').hide();
    $('#groupthisheaders #of-option-customcode').hide();

//condition7, loading on social networks
} else if(activetab=='#of-option-socialnetworks') {

	//social settings fadein
	$('.general_settings_jquery').hide();
	$('.background_images_jquery').hide();
	$('.font_color_jquery').hide();
	$('.font_types_jquery').hide();
	$('.font_spacing_jquery').hide();
	$('.socialnetwork_jquery').fadeIn();
	$('.customcss_jquery').hide();	
	
	//social settings active tab
	$('#of-option-generalsettings-tab').removeClass('nav-tab-active');
    $('#of-option-backgroundsettings-tab').removeClass('nav-tab-active');		
    $('#of-option-colorsettings-tab').removeClass('nav-tab-active');
    $('#of-option-typesetting-tab').removeClass('nav-tab-active');
    $('#of-option-spacing-tab').removeClass('nav-tab-active');
    $('#of-option-socialnetworks-tab').addClass('nav-tab-active');
    $('#of-option-customcode-tab').removeClass('nav-tab-active');

	//social settings header fadein
	$('#groupthisheaders #of-option-generalsettings').hide();
    $('#groupthisheaders #of-option-backgroundsettings').hide();		
    $('#groupthisheaders #of-option-colorsettings').hide();
    $('#groupthisheaders #of-option-typesetting').hide();
    $('#groupthisheaders #of-option-spacing').hide();
    $('#groupthisheaders #of-option-socialnetworks').fadeIn();
    $('#groupthisheaders #of-option-customcode').hide();

//condition8, loading on custom css
} else if(activetab=='#of-option-customcode') {  

	//custom css settings fadein
	$('.general_settings_jquery').hide();
	$('.background_images_jquery').hide();
	$('.font_color_jquery').hide();
	$('.font_types_jquery').hide();
	$('.font_spacing_jquery').hide();
	$('.socialnetwork_jquery').hide();
	$('.customcss_jquery').fadeIn();	
	
	//custom css settings active tab
	$('#of-option-generalsettings-tab').removeClass('nav-tab-active');
    $('#of-option-backgroundsettings-tab').removeClass('nav-tab-active');		
    $('#of-option-colorsettings-tab').removeClass('nav-tab-active');
    $('#of-option-typesetting-tab').removeClass('nav-tab-active');
    $('#of-option-spacing-tab').removeClass('nav-tab-active');
    $('#of-option-socialnetworks-tab').removeClass('nav-tab-active');
    $('#of-option-customcode-tab').addClass('nav-tab-active');

	//custom css settings header fadein
	$('#groupthisheaders #of-option-generalsettings').hide();
    $('#groupthisheaders #of-option-backgroundsettings').hide();		
    $('#groupthisheaders #of-option-colorsettings').hide();
    $('#groupthisheaders #of-option-typesetting').hide();
    $('#groupthisheaders #of-option-spacing').hide();
    $('#groupthisheaders #of-option-socialnetworks').hide();
    $('#groupthisheaders #of-option-customcode').fadeIn();

}
	
	$('#of-option-generalsettings-tab').click(function(evt) {
		//USER SELECTED GENERAL SETTINGS TAB
		$('.general_settings_jquery').fadeIn();	
		$('.background_images_jquery').hide();
		$('.font_color_jquery').hide();
		$('.font_types_jquery').hide();
		$('.font_spacing_jquery').hide();
		$('.socialnetwork_jquery').hide();
		$('.customcss_jquery').hide();
		evt.preventDefault();
	});
	
	$('#of-option-backgroundsettings-tab').click(function(evt) {
		//USER SELECTED BACKGROUND SETTINGS TAB
		$('.general_settings_jquery').hide();
		$('.background_images_jquery').fadeIn();
		$('.font_color_jquery').hide();	
		$('.font_types_jquery').hide();
		$('.font_spacing_jquery').hide();
		$('.socialnetwork_jquery').hide();
		$('.customcss_jquery').hide();
		evt.preventDefault();
	});
	$('#of-option-colorsettings-tab').click(function(evt) {
		//USER SELECTED FONT COLORS TAB
		$('.general_settings_jquery').hide();
		$('.background_images_jquery').hide();
		$('.font_color_jquery').fadeIn();
		$('.font_types_jquery').hide();
		$('.font_spacing_jquery').hide();
		$('.socialnetwork_jquery').hide();
		$('.customcss_jquery').hide();
		evt.preventDefault();
	});
	$('#of-option-typesetting-tab').click(function(evt) {
		//USER SELECTED FONT TYPES TAB
		$('.general_settings_jquery').hide();
		$('.background_images_jquery').hide();
		$('.font_color_jquery').hide();
		$('.font_types_jquery').fadeIn();
		$('.font_spacing_jquery').hide();
		$('.socialnetwork_jquery').hide();
		$('.customcss_jquery').hide();
		evt.preventDefault();
	});
	$('#of-option-spacing-tab').click(function(evt) {
		//USER SELECTED FONT SPACING TAB
		$('.general_settings_jquery').hide();
		$('.background_images_jquery').hide();
		$('.font_color_jquery').hide();
		$('.font_types_jquery').hide();
		$('.font_spacing_jquery').fadeIn();
		$('.socialnetwork_jquery').hide();
		$('.customcss_jquery').hide();
		evt.preventDefault();
	});	
	$('#of-option-socialnetworks-tab').click(function(evt) {
		//USER SELECTED SOCIAL NETWORKS TAB
		$('.general_settings_jquery').hide();
		$('.background_images_jquery').hide();
		$('.font_color_jquery').hide();
		$('.font_types_jquery').hide();
		$('.font_spacing_jquery').hide();
		$('.socialnetwork_jquery').fadeIn();
		$('.customcss_jquery').hide();
		evt.preventDefault();
	});
	$('#of-option-customcode-tab').click(function(evt) {
		//USER SELECTED CUSTOM CODE 
		$('.general_settings_jquery').hide();
		$('.background_images_jquery').hide();
		$('.font_color_jquery').hide();
		$('.font_types_jquery').hide();
		$('.font_spacing_jquery').hide();
		$('.socialnetwork_jquery').hide();
		$('.customcss_jquery').fadeIn();
		evt.preventDefault();
	});		
	//END
	
	//REVISED HIDING SHOWING OF OPTIONS
	/*$(function () {
		var tabContainers = $('div.tabs > div');
		tabContainers.hide().filter(':of-option-generalsettings').show();
		
		$('div.tabs ul.nav-tab-wrapper a').click(function () {
			tabContainers.hide();
			tabContainers.filter(this.hash).show();
			$('div.tabs ul.nav-tab-wrapper a').removeClass('selected');
			$(this).addClass('selected');
			return false;
		}).filter(':of-option-generalsettings').click();
	});
	*/
	//jQuery for Help and documentation
	//hide the iframe content first when not clicked	
/*	
	$('.iframe_documentation').hide();	
		$('#help_documentation').click(function(evt) {
		//USER WANTS TO READ HELP AND DOCUMENTATION OF VIEWS BASE 
		//hide wrap first
		$('.wrap').hide();		
		//show iframe content
		$('.iframe_documentation').show();
		//then load iframe
		$("#framex").hide();
		$('#pageisstillloading').show();		
		$("#framex").attr("src", "http://wp-types.com/documentation/views-inside/views-base-theme/");
		evt.preventDefault();
	});

$('#framex').load(function() {
    $('#framex').show()
    $('#pageisstillloading').hide();
});
*/
	
	$('.nav-tab-wrapper a').click(function(evt) {
		$('.nav-tab-wrapper a').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active').blur();
		var clicked_group = $(this).attr('href');		
		if (typeof(localStorage) != 'undefined' ) {
			localStorage.setItem("activetab", $(this).attr('href'));
		} 
		$('.group').hide();
		$(clicked_group).fadeIn();		
		evt.preventDefault();
		
	});
           					
	$('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($(this).attr('checked')) {
			$(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).filter('.last').length) {
					$(this).addClass('hidden');
					return false;		
					}
				$(this).addClass('hidden');
			});
           					
		}
	}
	
	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');		
	});
		
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

		 		
});	