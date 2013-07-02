(function($){
	//main background color
	var initLayout = function() {
		var hash = window.location.hash.replace('#', '');
		var currentTab = $('ul.navigationTabs a')
							.bind('click', showTab)
							.filter('a[rel=' + hash + ']');
		if (currentTab.size() == 0) {
			currentTab = $('ul.navigationTabs a:first');
		}
		showTab.apply(currentTab.get(0));

/*/////////////////////////////////////////////////////////////////
 * COLOR SELECTOR JQUERY START
 *////////////////////////////////////////////////////////////////
 
 
    /////////////////////////////////////////////////////////////
	//BACKGROUND SETTINGS THEME OPTIONS PANEL
	/////////////////////////////////////////////////////////////
	
	
//START: main background color
//if user clicks on the color picker
		$('#colorSelector').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#main_background_color_db #colorpicks').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector div').css('backgroundColor', '#' + hex);
                $('#main_background_color_db #colorpicks').val('#'+hex);				
								
			}
	
		});
		
//if user clicks on the text box
$('#main_background_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#main_background_color_db #colorpicks').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector div').css('backgroundColor', '#' + hex);
                $('#main_background_color_db #colorpicks').val('#'+hex);				
								
			}
		
			
})

.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector div').css('backgroundColor', this.value);
	
});	
//END

//START: header background color
//if user clicks on the color picker			
		
		$('#colorSelector1').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#main_headerbackground_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector1 div').css('backgroundColor', '#' + hex);
                $('#main_headerbackground_color_db #colorpicks').val('#'+hex);				
								
			}
		});
	
//if user clicks on the text box
		$('#main_headerbackground_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#main_headerbackground_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector1 div').css('backgroundColor', '#' + hex);
                $('#main_headerbackground_color_db #colorpicks').val('#'+hex);				
								
			}
		})

.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector1 div').css('backgroundColor', this.value);
	
});	
//END		
	
//START: footer background color
//if user clicks on the color picker		
		
		$('#colorSelector2').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#main_footerbackground_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector2 div').css('backgroundColor', '#' + hex);	
                $('#main_footerbackground_color_db #colorpicks').val('#'+hex);				
								
			}
		});
//if user clicks on the text box		
		$('#main_footerbackground_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#main_footerbackground_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector2 div').css('backgroundColor', '#' + hex);	
                $('#main_footerbackground_color_db #colorpicks').val('#'+hex);				
								
			}
		})		
		
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector2 div').css('backgroundColor', this.value);
	
});	
//END	

    /////////////////////////////////////////////////////////////
	//FONT COLOR SETTINGS THEME OPTIONS PANEL
	/////////////////////////////////////////////////////////////

//START: site title color
//if user clicks on the color picker	

		$('#colorSelector3').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#site_title_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector3 div').css('backgroundColor', '#' + hex);	
				$('#site_title_color_db #colorpicks').val('#'+hex);				
								
			}
		});
//if user clicks on the text box
		$('#site_title_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#site_title_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector3 div').css('backgroundColor', '#' + hex);	
				$('#site_title_color_db #colorpicks').val('#'+hex);				
								
			}
		})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector3 div').css('backgroundColor', this.value);
	
});	
//END	

//START: site title hover color
		
		$('#colorSelector4').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#site_title_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector4 div').css('backgroundColor', '#' + hex);				
				$('#site_title_hover_color_db #colorpicks').val('#'+hex);								
			}
		});
//if user clicks on the text box		
		$('#site_title_hover_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#site_title_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector4 div').css('backgroundColor', '#' + hex);				
				$('#site_title_hover_color_db #colorpicks').val('#'+hex);								
			}
		})		
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector4 div').css('backgroundColor', this.value);
	
});	
//END
		
//START: site description color	
		
		$('#colorSelector5').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#site_description_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector5 div').css('backgroundColor', '#' + hex);				
				$('#site_description_color_db #colorpicks').val('#'+hex);								
			}
		});
//if user clicks on the text box
		$('#site_description_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#site_description_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector5 div').css('backgroundColor', '#' + hex);				
				$('#site_description_color_db #colorpicks').val('#'+hex);								
			}
		})
		
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector5 div').css('backgroundColor', this.value);
	
});	
//END		
		
//START: site description hover color		
		
		$('#colorSelector6').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#site_description_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector6 div').css('backgroundColor', '#' + hex);				
				$('#site_description_hover_color_db #colorpicks').val('#'+hex);								
			}
		});
//if user clicks on the text box		
		$('#site_description_hover_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#site_description_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector6 div').css('backgroundColor', '#' + hex);				
				$('#site_description_hover_color_db #colorpicks').val('#'+hex);								
			}
		})		
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector6 div').css('backgroundColor', this.value);
	
});	
//END		
		
//START: article title color		
		
		$('#colorSelector7').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#article_title_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector7 div').css('backgroundColor', '#' + hex);				
				$('#article_title_color_db #colorpicks').val('#'+hex);								
			}
		});
//if user clicks on the text box			
		$('#article_title_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#article_title_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector7 div').css('backgroundColor', '#' + hex);				
				$('#article_title_color_db #colorpicks').val('#'+hex);								
			}
		})		
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector7 div').css('backgroundColor', this.value);
	
});	
//END		
		
//START: article hover title color		
		
		$('#colorSelector8').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#article_title_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector8 div').css('backgroundColor', '#' + hex);				
				$('#article_title_hover_color_db #colorpicks').val('#'+hex);								
			}
		});
//if user clicks on the text box		
		$('#article_title_hover_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#article_title_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector8 div').css('backgroundColor', '#' + hex);				
				$('#article_title_hover_color_db #colorpicks').val('#'+hex);								
			}
		})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector8 div').css('backgroundColor', this.value);
	
});	
//END	

		
//START: content font color			
		
		$('#colorSelector9').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#content_font_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector9 div').css('backgroundColor', '#' + hex);	
				$('#content_font_color_db #colorpicks').val('#'+hex);				
								
			}
		});
//if user clicks on the text box	
		$('#content_font_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#content_font_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector9 div').css('backgroundColor', '#' + hex);	
				$('#content_font_color_db #colorpicks').val('#'+hex);				
								
			}
		})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector9 div').css('backgroundColor', this.value);
	
});	
//END

//START: link color	
		
		$('#colorSelector10').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#link_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector10 div').css('backgroundColor', '#' + hex);				
				$('#link_color_db #colorpicks').val('#'+hex);								
			}
		});
//if user clicks on the text box		
		$('#link_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#link_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector10 div').css('backgroundColor', '#' + hex);				
				$('#link_color_db #colorpicks').val('#'+hex);								
			}
		})		
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector10 div').css('backgroundColor', this.value);
	
});	
//END		
		
//START: link hover color			
		
		$('#colorSelector11').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#link_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector11 div').css('backgroundColor', '#' + hex);				
				$('#link_hover_color_db #colorpicks').val('#'+hex);								
			}
		});
//if user clicks on the text box		
		$('#link_hover_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#link_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector11 div').css('backgroundColor', '#' + hex);				
				$('#link_hover_color_db #colorpicks').val('#'+hex);								
			}
		})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector11 div').css('backgroundColor', this.value);
	
});	
//END	
		
//START: menu color		
		
		$('#colorSelector12').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#menu_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector12 div').css('backgroundColor', '#' + hex);				
				$('#menu_color_db #colorpicks').val('#'+hex);								
			}
		});
		
//if user clicks on the text box		
		
		$('#menu_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#menu_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector12 div').css('backgroundColor', '#' + hex);				
				$('#menu_color_db #colorpicks').val('#'+hex);								
			}
		})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector12 div').css('backgroundColor', this.value);
	
});	
//END	
		
//START: menu hover color		
		
		$('#colorSelector13').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(200);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#menu_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector13 div').css('backgroundColor', '#' + hex);				
				$('#menu_hover_color_db #colorpicks').val('#'+hex);								
			}
		});
		
//if user clicks on the text box		

		$('#menu_hover_color_db #colorpicks').ColorPicker({
			color: '#06da56',
			onShow: function (colpkr) {
				//$(colpkr).fadeIn(200);				
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(10);
				return false;
			},
			onSubmit: function(hsb, hex, rgb, el) {				
				$('#menu_hover_color_db input').val('#'+hex);
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector13 div').css('backgroundColor', '#' + hex);				
				$('#menu_hover_color_db #colorpicks').val('#'+hex);								
			}
		})
.bind('keyup', function(){
	$(this).ColorPickerSetColor(this.value);	
	$('#colorSelector13 div').css('backgroundColor', this.value);
	
});	
//END		
		
/*/////////////////////////////////////////////////////////////////
 * COLOR SELECTOR JQUERY END
 *////////////////////////////////////////////////////////////////
	};

	var showTab = function(e) {
		var tabIndex = $('ul.navigationTabs a')
							.removeClass('active')
							.index(this);
		$(this)
			.addClass('active')
			.blur();
		$('div.tab')
			.hide()
				.eq(tabIndex)
				.show();
	};	

	
	EYE.register(initLayout, 'init');
})(jQuery)