jQuery( document ).ready( function( $ ) {
	$('.thickbox').click( function() {
		img_loc = $(this).prev('input');
	});
	window.send_to_editor = function(html) {
		imgurl = $('img',html).attr('src');
		img_loc.val(imgurl);
		tb_remove();
	}
	$("[abbr]").each(function(index, value){
		$(this).html($('#'+$(this).attr('abbr')).html());
	});
	//layout_section_logo_favicon custom content
	
	$("#layout_section_logo_favicon_customcontent").show();
	$("#layout_section_logo_favicon_customcontent ~ table:first").remove();
	
	//layout_section_background_images custom content
	
	$("#layout_section_background_images_customcontent").show();	
	$("#layout_section_background_images_customcontent ~ table:first").remove();
	
	//layout section for font colors
	$("#layout_section_font_colors_customcontent").show();	
	$("#layout_section_font_colors_customcontent ~ table:first").remove();	
	
	//layout section for typesetting
	$("#layout_section_typesetting_customcontent").show();	
	$("#layout_section_typesetting_customcontent ~ table:first").remove();		

    //layout section for spacing
	$("#layout_section_spacing_customcontent").show();	
	$("#layout_section_spacing_customcontent ~ table:first").remove();	
	
	//layout section for social networks
	$("#layout_section_socialnetworks_customcontent").show();	
	$("#layout_section_socialnetworks_customcontent ~ table:first").remove();		

    //layout section for custom code
	$("#layout_section_customcode_customcontent").show();	
	$("#layout_section_customcode_customcontent ~ table:first").remove();		

	//social networking
	$("#enable_facebook").closest('tr').remove();
	$("#enable_twitter").closest('tr').remove();
	$("#enable_linkedin").closest('tr').remove();
	$("#enable_google_plus").closest('tr').remove();
	$("#enable_flickr").closest('tr').remove();
	

//UPDATED IMAGE UPLOADING FUNCTION FOR CUSTOM LOGO
//START
	$('#upload_logo_button').click(function() {
		tb_show('Upload image', 'media-upload.php?type=image&post_id=0&TB_iframe=1', false);

	window.send_to_editor = function(html) {
		var image_url = $('img',html).attr('src');	
		$('#logo_url').val(image_url);	      		
		tb_remove();
		$('#image_custom_logo_prev img').attr('src',image_url);		
        $('#image_custom_logo_prev img').css('max-width','519px');
		$('#image_custom_logo_prev img').css('padding-left','5px');	
		$('#image_custom_logo_prev img').css('padding-right','5px');	
		$('#image_custom_logo_prev img').css('padding-bottom','5px');	
		$('#image_custom_logo_prev img').css('padding-top','5px');	
		$('#image_custom_logo_prev img').css('border','1px solid #CCC');	
		
	}
	
		return false;
	});	
//END	


//UPDATED IMAGE UPLOADING FUNCTION FOR FAVICON
//START
	$('#upload_favicon_ico').click(function() {
		tb_show('Upload image', 'media-upload.php?type=image&post_id=0&TB_iframe=1', false);

	window.send_to_editor = function(html) {
		var favicon_url = $('img',html).attr('src');	
		$('#favicon_url').val(favicon_url);	      		
		tb_remove();
		$('#image_favicon_prev img').attr('src',favicon_url);		
        $('#image_favicon_prev img').css('max-width','519px');
		$('#image_favicon_prev img').css('padding-left','5px');	
		$('#image_favicon_prev img').css('padding-right','5px');	
		$('#image_favicon_prev img').css('padding-bottom','5px');	
		$('#image_favicon_prev img').css('padding-top','5px');	
		$('#image_favicon_prev img').css('border','1px solid #CCC');	
	
	}
	
		return false;
	});	
//END

//UPDATED BACKGROUND IMAGE UPLOADING FUNCTION 
//START
	$('#upload_background_image_now').click(function() {
		tb_show('Upload image', 'media-upload.php?type=image&post_id=0&TB_iframe=1', false);

	window.send_to_editor = function(html) {
		var backgroundimage_url = $('img',html).attr('src');
		$('#background_image_urlupload').val(backgroundimage_url);	      		
		tb_remove();
        //NEW: enabled upload image checkbox, for user to check
		$('#enablebackgroundimagecheckbox input').attr("disabled",false);
		
		$('#image_background_upload img').attr('src',backgroundimage_url);		
        $('#image_background_upload img').css('max-width','519px');
		$('#image_background_upload img').css('padding-left','5px');	
		$('#image_background_upload img').css('padding-right','5px');	
		$('#image_background_upload img').css('padding-bottom','5px');	
		$('#image_background_upload img').css('padding-top','5px');	
		$('#image_background_upload img').css('border','1px solid #CCC');

	}	
		return false;
		
	});	
//END

//UPDATED HEADER BACKGROUND IMAGE UPLOADING FUNCTION 
//START
	$('#upload_headerbackground_image_now').click(function() {
		tb_show('Upload image', 'media-upload.php?type=image&post_id=0&TB_iframe=1', false);

	window.send_to_editor = function(html) {
		var headerbackgroundimage_url = $('img',html).attr('src');	
		$('#headerbackground_image_urlupload').val(headerbackgroundimage_url);	      		
		tb_remove();
        //NEW: enabled upload image checkbox, for user to check
		$('#enableheaderbackgroundimagecheckbox input').attr("disabled",false);
		
		$('#header_background_image_upload img').attr('src',headerbackgroundimage_url);		
        $('#header_background_image_upload img').css('max-width','519px');
		$('#header_background_image_upload img').css('padding-left','5px');	
		$('#header_background_image_upload img').css('padding-right','5px');	
		$('#header_background_image_upload img').css('padding-bottom','5px');	
		$('#header_background_image_upload img').css('padding-top','5px');	
		$('#header_background_image_upload img').css('border','1px solid #CCC');	
	
	}
	
		return false;
	});	
//END

//UPDATED FOOTER BACKGROUND IMAGE UPLOADING FUNCTION 
//START
	$('#upload_footerbackground_image_now').click(function() {
		tb_show('Upload image', 'media-upload.php?type=image&post_id=0&TB_iframe=1', false);

	window.send_to_editor = function(html) {
		var footerbackgroundimage_url = $('img',html).attr('src');	
		$('#footerbackground_image_urlupload').val(footerbackgroundimage_url);	      		
		tb_remove();
        //NEW: enabled upload image checkbox, for user to check
		$('#enablefooterbackgroundimagecheckbox input').attr("disabled",false);
		
		$('#footer_background_image_upload img').attr('src',footerbackgroundimage_url);		
        $('#footer_background_image_upload img').css('max-width','519px');
		$('#footer_background_image_upload img').css('padding-left','5px');	
		$('#footer_background_image_upload img').css('padding-right','5px');	
		$('#footer_background_image_upload img').css('padding-bottom','5px');	
		$('#footer_background_image_upload img').css('padding-top','5px');	
		$('#footer_background_image_upload img').css('border','1px solid #CCC');	
	
	}
	
		return false;
	});	
//END

//ASSIGN PROPER COLORS TO PICKER IF SET DURING LOADING

//main background color
var mainbackgroundcolorload= $('#main_background_color_db #colorpicks').val();
$('#colorSelector div').css('backgroundColor',mainbackgroundcolorload);

//header background color
var headerbackgroundcolorload= $('#main_headerbackground_color_db #colorpicks').val();
$('#colorSelector1 div').css('backgroundColor',headerbackgroundcolorload);

//footer background color

var footerbackgroundcolorload= $('#main_footerbackground_color_db #colorpicks').val();
$('#colorSelector2 div').css('backgroundColor',footerbackgroundcolorload);

//Site title font color

var sitetitlefontcolorload= $('#site_title_color_db #colorpicks').val();
$('#colorSelector3 div').css('backgroundColor',sitetitlefontcolorload);

//Site title hover color

var sitetitlehovercolorload= $('#site_title_hover_color_db #colorpicks').val();
$('#colorSelector4 div').css('backgroundColor',sitetitlehovercolorload);

//Site description color

var sitedescriptioncolorload= $('#site_description_color_db #colorpicks').val();
$('#colorSelector5 div').css('backgroundColor',sitedescriptioncolorload);

//Site description hover color

var sitedescriptionhovercolorload= $('#site_description_hover_color_db #colorpicks').val();
$('#colorSelector6 div').css('backgroundColor',sitedescriptionhovercolorload);

//Article title color

var articlefontcolorload= $('#article_title_color_db #colorpicks').val();
$('#colorSelector7 div').css('backgroundColor',articlefontcolorload);

//Article title hover color

var articlefonthovercolorload= $('#article_title_hover_color_db #colorpicks').val();
$('#colorSelector8 div').css('backgroundColor',articlefonthovercolorload);

//Content font color

var contentfontcolorload= $('#content_font_color_db #colorpicks').val();
$('#colorSelector9 div').css('backgroundColor',contentfontcolorload);

//Link color

var linkfontcolorload= $('#link_color_db #colorpicks').val();
$('#colorSelector10 div').css('backgroundColor',linkfontcolorload);

//Link hover color

var linkfonthovercolorload= $('#link_hover_color_db #colorpicks').val();
$('#colorSelector11 div').css('backgroundColor',linkfonthovercolorload);

//Menu color

var menufontcolorload= $('#menu_color_db #colorpicks').val();
$('#colorSelector12 div').css('backgroundColor',menufontcolorload);

//Menu hover color

var menufonthovercolorload= $('#menu_hover_color_db #colorpicks').val();
$('#colorSelector13 div').css('backgroundColor',menufonthovercolorload);

//jQuery for automatically resizing images after saving changes

//get the default logo image URL from the textbox
default_image_url= $('#logo_url').val();

//resize them after saving changes
if (default_image_url) {
//logo default jquery
        $('#image_custom_logo_prev img').attr('src',default_image_url);
        $('#image_custom_logo_prev img').css('max-width','519px');
		$('#image_custom_logo_prev img').css('padding-left','5px');	
		$('#image_custom_logo_prev img').css('padding-right','5px');	
		$('#image_custom_logo_prev img').css('padding-bottom','5px');	
		$('#image_custom_logo_prev img').css('padding-top','5px');	
		$('#image_custom_logo_prev img').css('border','1px solid #CCC');
}

//get the default favicon URL from the textbox
default_favicon_url= $('#favicon_url').val();

//resize them after saving changes
if (default_favicon_url) {
//favicon default 
        $('#image_favicon_prev img').attr('src',default_favicon_url);
        $('#image_favicon_prev img').css('max-width','519px');
		$('#image_favicon_prev img').css('padding-left','5px');	
		$('#image_favicon_prev img').css('padding-right','5px');	
		$('#image_favicon_prev img').css('padding-bottom','5px');	
		$('#image_favicon_prev img').css('padding-top','5px');	
		$('#image_favicon_prev img').css('border','1px solid #CCC');
}

//get the main background image URL from the textbox
default_mainbackgroundimage_url= $('#background_image_urlupload').val();

//resize them after saving changes
if (default_mainbackgroundimage_url) {
//background image default 	
		$('#image_background_upload img').attr('src',default_mainbackgroundimage_url);		
        $('#image_background_upload img').css('max-width','519px');
		$('#image_background_upload img').css('padding-left','5px');	
		$('#image_background_upload img').css('padding-right','5px');	
		$('#image_background_upload img').css('padding-bottom','5px');	
		$('#image_background_upload img').css('padding-top','5px');	
        $('#image_background_upload img').css('border','1px solid #CCC');	
}	

//get the header background image URL from the textbox

default_headerbackgroundimage_url= $('#headerbackground_image_urlupload').val();

//resize them after saving changes

if (default_headerbackgroundimage_url) {
//header background image default 	

		$('#header_background_image_upload img').attr('src',default_headerbackgroundimage_url);		
        $('#header_background_image_upload img').css('max-width','519px');
		$('#header_background_image_upload img').css('padding-left','5px');	
		$('#header_background_image_upload img').css('padding-right','5px');	
		$('#header_background_image_upload img').css('padding-bottom','5px');	
		$('#header_background_image_upload img').css('padding-top','5px');	
		$('#header_background_image_upload img').css('border','1px solid #CCC');
	
}

//get the footer background image URL from the textbox

default_footerbackgroundimage_url= $('#footerbackground_image_urlupload').val();

if (default_footerbackgroundimage_url) {
//header background image default 	

		$('#footer_background_image_upload img').attr('src',default_footerbackgroundimage_url);		
        $('#footer_background_image_upload img').css('max-width','519px');
		$('#footer_background_image_upload img').css('padding-left','5px');	
		$('#footer_background_image_upload img').css('padding-right','5px');	
		$('#footer_background_image_upload img').css('padding-bottom','5px');	
		$('#footer_background_image_upload img').css('padding-top','5px');	
		$('#footer_background_image_upload img').css('border','1px solid #CCC');
	
}

//DATA VALIDATION FOR UPLOADED IMAGE

//main background image validation

var mainbackgroundimagestatus= $('#background_image_urlupload').val();

if (mainbackgroundimagestatus) { 
$('#enablebackgroundimagecheckbox input').attr("disabled",false);
} else {
$('#enablebackgroundimagecheckbox input').attr("disabled",true);
}

//header background image validation

var headerbackgroundimagestatus= $('#headerbackground_image_urlupload').val();

if (headerbackgroundimagestatus) { 
$('#enableheaderbackgroundimagecheckbox input').attr("disabled",false);
} else {
$('#enableheaderbackgroundimagecheckbox input').attr("disabled",true);
}

//footer background image validation

var footerbackgroundimagestatus= $('#footerbackground_image_urlupload').val();

if (footerbackgroundimagestatus) { 
$('#enablefooterbackgroundimagecheckbox input').attr("disabled",false);
} else {
$('#enablefooterbackgroundimagecheckbox input').attr("disabled",true);
}

//FONT PREVIEW jQuery functions

//START SITE TITLE FONT
$('#sitetitlefontfamily select, #sitetitlefontsize select, #sitetitlestyling select').change(function() {

var sitetitlefontfamilyx= $('#sitetitlefontfamily select').val();
var sitetitlefontsizex= $('#sitetitlefontsize select').val();
var sitetitlefontstylex= $('#sitetitlestyling select').val();

//true fonts logic

if (sitetitlefontfamilyx=='Georgia') {

sitetitlefontfamilyx_true='Georgia, serif';

} else if(sitetitlefontfamilyx=='Times New Roman') {

sitetitlefontfamilyx_true='"Times New Roman", Times, serif';

} else if(sitetitlefontfamilyx=='Arial') {

sitetitlefontfamilyx_true='Arial, Helvetica, sans-serif';

} else if(sitetitlefontfamilyx=='Helvetica Neue') {

sitetitlefontfamilyx_true='"Helvetica Neue",Helvetica,Arial,sans-serif';

} else if(sitetitlefontfamilyx=='Lucida Grande') {

sitetitlefontfamilyx_true='"Lucida Sans Unicode", "Lucida Grande", sans-serif';

} else if(sitetitlefontfamilyx=='Tahoma') {

sitetitlefontfamilyx_true='Tahoma, Geneva, sans-serif';

} else if(sitetitlefontfamilyx=='Verdana') {

sitetitlefontfamilyx_true='Verdana, Geneva, sans-serif';

} else if(sitetitlefontfamilyx=='Impact') {

sitetitlefontfamilyx_true='Impact, Charcoal, sans-serif';

}

//invoke css PREVIEW

if (sitetitlefontstylex=='bold') {

$('#titlefontprev').css('font-family',sitetitlefontfamilyx_true);
$('#titlefontprev').css('font-size',sitetitlefontsizex);
$('#titlefontprev').css('font-weight',sitetitlefontstylex);
$('#titlefontprev').css('font-style','');
$('#titlefontprev').css('line-height','1.1');

} else {

$('#titlefontprev').css('font-family',sitetitlefontfamilyx_true);
$('#titlefontprev').css('font-size',sitetitlefontsizex);
$('#titlefontprev').css('font-style',sitetitlefontstylex);
$('#titlefontprev').css('font-weight','');
$('#titlefontprev').css('line-height','1.1');

}

});

//invoke css for site title font in reload
var sitetitlefontfamilyz= $('#sitetitlefontfamily select').val();
var sitetitlefontsizez= $('#sitetitlefontsize select').val();
var sitetitlefontstylez= $('#sitetitlestyling select').val();

//true fonts logic

if (sitetitlefontfamilyz=='Georgia') {

sitetitlefontfamilyz_true='Georgia, serif';

} else if(sitetitlefontfamilyz=='Times New Roman') {

sitetitlefontfamilyz_true='"Times New Roman", Times, serif';

} else if(sitetitlefontfamilyz=='Arial') {

sitetitlefontfamilyz_true='Arial, Helvetica, sans-serif';

} else if(sitetitlefontfamilyz=='Helvetica Neue') {

sitetitlefontfamilyz_true='"Helvetica Neue",Helvetica,Arial,sans-serif';

} else if(sitetitlefontfamilyz=='Lucida Grande') {

sitetitlefontfamilyz_true='"Lucida Sans Unicode", "Lucida Grande", sans-serif';

} else if(sitetitlefontfamilyz=='Tahoma') {

sitetitlefontfamilyz_true='Tahoma, Geneva, sans-serif';

} else if(sitetitlefontfamilyz=='Verdana') {

sitetitlefontfamilyz_true='Verdana, Geneva, sans-serif';

} else if(sitetitlefontfamilyz=='Impact') {

sitetitlefontfamilyz_true='Impact, Charcoal, sans-serif';

}

//invoke css
if (sitetitlefontstylez=='bold') {

$('#titlefontprev').css('font-family',sitetitlefontfamilyz_true);
$('#titlefontprev').css('font-size',sitetitlefontsizez);
$('#titlefontprev').css('font-weight',sitetitlefontstylez);
$('#titlefontprev').css('font-style','');
$('#titlefontprev').css('line-height','1.1');

} else {

$('#titlefontprev').css('font-family',sitetitlefontfamilyz_true);
$('#titlefontprev').css('font-size',sitetitlefontsizez);
$('#titlefontprev').css('font-style',sitetitlefontstylez);
$('#titlefontprev').css('font-weight','');
$('#titlefontprev').css('line-height','1.1');

}

//END SITE TITLE FONT

//START SITE DESCRIPTION FONT
$('#sitedescriptionfontfamily select, #sitedescriptionfontsize select, #sitedescriptionstyling select').change(function() {

var sitedescriptionfontfamilyx= $('#sitedescriptionfontfamily select').val();
var sitedescriptionfontsizex= $('#sitedescriptionfontsize select').val();
var sitedescriptionfontstylex= $('#sitedescriptionstyling select').val();

//true fonts logic

if (sitedescriptionfontfamilyx=='Georgia') {

sitedescriptionfontfamilyx_true='Georgia, serif';

} else if(sitedescriptionfontfamilyx=='Times New Roman') {

sitedescriptionfontfamilyx_true='"Times New Roman", Times, serif';

} else if(sitedescriptionfontfamilyx=='Arial') {

sitedescriptionfontfamilyx_true='Arial, Helvetica, sans-serif';

} else if(sitedescriptionfontfamilyx=='Helvetica Neue') {

sitedescriptionfontfamilyx_true='"Helvetica Neue",Helvetica,Arial,sans-serif';

} else if(sitedescriptionfontfamilyx=='Lucida Grande') {

sitedescriptionfontfamilyx_true='"Lucida Sans Unicode", "Lucida Grande", sans-serif';

} else if(sitedescriptionfontfamilyx=='Tahoma') {

sitedescriptionfontfamilyx_true='Tahoma, Geneva, sans-serif';

} else if(sitedescriptionfontfamilyx=='Verdana') {

sitedescriptionfontfamilyx_true='Verdana, Geneva, sans-serif';

} else if(sitedescriptionfontfamilyx=='Impact') {

sitedescriptionfontfamilyx_true='Impact, Charcoal, sans-serif';

}

//invoke css PREVIEW

if (sitedescriptionfontstylex=='bold') {

$('#desciptionfontprev').css('font-family',sitedescriptionfontfamilyx_true);
$('#desciptionfontprev').css('font-size',sitedescriptionfontsizex);
$('#desciptionfontprev').css('font-style','');
$('#desciptionfontprev').css('font-weight',sitedescriptionfontstylex);
$('#desciptionfontprev').css('line-height','1.1');

} else {

$('#desciptionfontprev').css('font-family',sitedescriptionfontfamilyx_true);
$('#desciptionfontprev').css('font-size',sitedescriptionfontsizex);
$('#desciptionfontprev').css('font-style',sitedescriptionfontstylex);
$('#desciptionfontprev').css('font-weight','');
$('#desciptionfontprev').css('line-height','1.1');

}

});

//invoke css for site title font in reload
var sitedescriptionfontfamilyz= $('#sitedescriptionfontfamily select').val();
var sitedescriptionfontsizez= $('#sitedescriptionfontsize select').val();
var sitedescriptionfontstylez= $('#sitedescriptionstyling select').val();

//true fonts logic

if (sitedescriptionfontfamilyz=='Georgia') {

sitedescriptionfontfamilyz_true='Georgia, serif';

} else if(sitedescriptionfontfamilyz=='Times New Roman') {

sitedescriptionfontfamilyz_true='"Times New Roman", Times, serif';

} else if(sitedescriptionfontfamilyz=='Arial') {

sitedescriptionfontfamilyz_true='Arial, Helvetica, sans-serif';

} else if(sitedescriptionfontfamilyz=='Helvetica Neue') {

sitedescriptionfontfamilyz_true='"Helvetica Neue",Helvetica,Arial,sans-serif';

} else if(sitedescriptionfontfamilyz=='Lucida Grande') {

sitedescriptionfontfamilyz_true='"Lucida Sans Unicode", "Lucida Grande", sans-serif';

} else if(sitedescriptionfontfamilyz=='Tahoma') {

sitedescriptionfontfamilyz_true='Tahoma, Geneva, sans-serif';

} else if(sitedescriptionfontfamilyz=='Verdana') {

sitedescriptionfontfamilyz_true='Verdana, Geneva, sans-serif';

} else if(sitedescriptionfontfamilyz=='Impact') {

sitedescriptionfontfamilyz_true='Impact, Charcoal, sans-serif';

}

//invoke css LIVE

if (sitedescriptionfontstylez=='bold') {

$('#desciptionfontprev').css('font-family',sitedescriptionfontfamilyz_true);
$('#desciptionfontprev').css('font-size',sitedescriptionfontsizez);
$('#desciptionfontprev').css('font-weight',sitedescriptionfontstylez);
$('#desciptionfontprev').css('font-style','');
$('#desciptionfontprev').css('line-height','1.1');

} else {

$('#desciptionfontprev').css('font-family',sitedescriptionfontfamilyz_true);
$('#desciptionfontprev').css('font-size',sitedescriptionfontsizez);
$('#desciptionfontprev').css('font-weight','');
$('#desciptionfontprev').css('font-style',sitedescriptionfontstylez);
$('#desciptionfontprev').css('line-height','1.1');

}

//END SITE DESCRIPTION FONT

//START ARTICLE TITLE FONT
$('#articletitlefontfamily select, #articletitlefontsize select, #articletitlestyling select').change(function() {

var articletitlefontfamilyx= $('#articletitlefontfamily select').val();
var articletitlefontsizex= $('#articletitlefontsize select').val();
var articletitlefontstylex= $('#articletitlestyling select').val();

//true fonts logic

if (articletitlefontfamilyx=='Georgia') {

articletitlefontfamilyx_true='Georgia, serif';

} else if(articletitlefontfamilyx=='Times New Roman') {

articletitlefontfamilyx_true='"Times New Roman", Times, serif';

} else if(articletitlefontfamilyx=='Arial') {

articletitlefontfamilyx_true='Arial, Helvetica, sans-serif';

} else if(articletitlefontfamilyx=='Helvetica Neue') {

articletitlefontfamilyx_true='"Helvetica Neue",Helvetica,Arial,sans-serif';

} else if(articletitlefontfamilyx=='Lucida Grande') {

articletitlefontfamilyx_true='"Lucida Sans Unicode", "Lucida Grande", sans-serif';

} else if(articletitlefontfamilyx=='Tahoma') {

articletitlefontfamilyx_true='Tahoma, Geneva, sans-serif';

} else if(articletitlefontfamilyx=='Verdana') {

articletitlefontfamilyx_true='Verdana, Geneva, sans-serif';

} else if(articletitlefontfamilyx=='Impact') {

articletitlefontfamilyx_true='Impact, Charcoal, sans-serif';

}

//invoke css PREVIEW

if (articletitlefontstylex=='bold') {

$('#articletitlefontprev').css('font-family',articletitlefontfamilyx_true);
$('#articletitlefontprev').css('font-size',articletitlefontsizex);
$('#articletitlefontprev').css('font-weight',articletitlefontstylex);
$('#articletitlefontprev').css('font-style','');
$('#articletitlefontprev').css('line-height','1.1');

} else {

$('#articletitlefontprev').css('font-family',articletitlefontfamilyx_true);
$('#articletitlefontprev').css('font-size',articletitlefontsizex);
$('#articletitlefontprev').css('font-style',articletitlefontstylex);
$('#articletitlefontprev').css('font-weight','');
$('#articletitlefontprev').css('line-height','1.1');

}

});

//invoke css for site title font in reload
var articletitlefontfamilyz= $('#articletitlefontfamily select').val();
var articletitlefontsizez= $('#articletitlefontsize select').val();
var articletitlefontstylez= $('#articletitlestyling select').val();

//true fonts logic

if (articletitlefontfamilyz=='Georgia') {

articletitlefontfamilyz_true='Georgia, serif';

} else if(articletitlefontfamilyz=='Times New Roman') {

articletitlefontfamilyz_true='"Times New Roman", Times, serif';

} else if(articletitlefontfamilyz=='Arial') {

articletitlefontfamilyz_true='Arial, Helvetica, sans-serif';

} else if(articletitlefontfamilyz=='Helvetica Neue') {

articletitlefontfamilyz_true='"Helvetica Neue",Helvetica,Arial,sans-serif';

} else if(articletitlefontfamilyz=='Lucida Grande') {

articletitlefontfamilyz_true='"Lucida Sans Unicode", "Lucida Grande", sans-serif';

} else if(articletitlefontfamilyz=='Tahoma') {

articletitlefontfamilyz_true='Tahoma, Geneva, sans-serif';

} else if(articletitlefontfamilyz=='Verdana') {

articletitlefontfamilyz_true='Verdana, Geneva, sans-serif';

} else if(articletitlefontfamilyz=='Impact') {

articletitlefontfamilyz_true='Impact, Charcoal, sans-serif';

}

//invoke css LIVE

if (articletitlefontstylez=='bold') {

$('#articletitlefontprev').css('font-family',articletitlefontfamilyz_true);
$('#articletitlefontprev').css('font-size',articletitlefontsizez);
$('#articletitlefontprev').css('font-style','');
$('#articletitlefontprev').css('font-weight',articletitlefontstylez);
$('#articletitlefontprev').css('line-height','1.1');

} else {

$('#articletitlefontprev').css('font-family',articletitlefontfamilyz_true);
$('#articletitlefontprev').css('font-size',articletitlefontsizez);
$('#articletitlefontprev').css('font-style',articletitlefontstylez);
$('#articletitlefontprev').css('font-weight','');
$('#articletitlefontprev').css('line-height','1.1');

}

//END ARTICLE TITLE

//START CONTENT FONT
$('#contentfontfamily select, #contentfontsize select, #contentfontstyling select').change(function() {

var contentfontfamilyx= $('#contentfontfamily select').val();
var contentfontsizex= $('#contentfontsize select').val();
var contentfontstylex= $('#contentfontstyling select').val();

//true fonts logic

if (contentfontfamilyx=='Georgia') {

contentfontfamilyx_true='Georgia, serif';

} else if(contentfontfamilyx=='Times New Roman') {

contentfontfamilyx_true='"Times New Roman", Times, serif';

} else if(contentfontfamilyx=='Arial') {

contentfontfamilyx_true='Arial, Helvetica, sans-serif';

} else if(contentfontfamilyx=='Helvetica Neue') {

contentfontfamilyx_true='"Helvetica Neue",Helvetica,Arial,sans-serif';

} else if(contentfontfamilyx=='Lucida Grande') {

contentfontfamilyx_true='"Lucida Sans Unicode", "Lucida Grande", sans-serif';

} else if(contentfontfamilyx=='Tahoma') {

contentfontfamilyx_true='Tahoma, Geneva, sans-serif';

} else if(contentfontfamilyx=='Verdana') {

contentfontfamilyx_true='Verdana, Geneva, sans-serif';

} else if(contentfontfamilyx=='Impact') {

contentfontfamilyx_true='Impact, Charcoal, sans-serif';

}

//invoke css PREVIEW

if (contentfontstylex=='bold') {
$('#contentfontprev').css('font-family',contentfontfamilyx_true);
$('#contentfontprev').css('font-size',contentfontsizex);
$('#contentfontprev').css('font-weight',contentfontstylex);
$('#contentfontprev').css('font-style','');
$('#contentfontprev').css('line-height','1.1');
} else {
$('#contentfontprev').css('font-family',contentfontfamilyx_true);
$('#contentfontprev').css('font-size',contentfontsizex);
$('#contentfontprev').css('font-style',contentfontstylex);
$('#contentfontprev').css('font-weight','');
$('#contentfontprev').css('line-height','1.1');
}

});

//invoke css for site title font in reload
var contentfontfamilyz= $('#contentfontfamily select').val();
var contentfontsizez= $('#contentfontsize select').val();
var contentfontstylez= $('#contentfontstyling select').val();

//true fonts logic

if (contentfontfamilyz=='Georgia') {

contentfontfamilyz_true='Georgia, serif';

} else if(contentfontfamilyz=='Times New Roman') {

contentfontfamilyz_true='"Times New Roman", Times, serif';

} else if(contentfontfamilyz=='Arial') {

contentfontfamilyz_true='Arial, Helvetica, sans-serif';

} else if(contentfontfamilyz=='Helvetica Neue') {

contentfontfamilyz_true='"Helvetica Neue",Helvetica,Arial,sans-serif';

} else if(contentfontfamilyz=='Lucida Grande') {

contentfontfamilyz_true='"Lucida Sans Unicode", "Lucida Grande", sans-serif';

} else if(contentfontfamilyz=='Tahoma') {

contentfontfamilyz_true='Tahoma, Geneva, sans-serif';

} else if(contentfontfamilyz=='Verdana') {

contentfontfamilyz_true='Verdana, Geneva, sans-serif';

} else if(contentfontfamilyz=='Impact') {

contentfontfamilyz_true='Impact, Charcoal, sans-serif';

}

//invoke css LIVE

if (contentfontstylez=='bold') {

$('#contentfontprev').css('font-family',contentfontfamilyz_true);
$('#contentfontprev').css('font-size',contentfontsizez);
$('#contentfontprev').css('font-weight',contentfontstylez);
$('#contentfontprev').css('font-style','');
$('#contentfontprev').css('line-height','1.1');

}  else {

$('#contentfontprev').css('font-family',contentfontfamilyz_true);
$('#contentfontprev').css('font-size',contentfontsizez);
$('#contentfontprev').css('font-style',contentfontstylez);
$('#contentfontprev').css('font-weight','');
$('#contentfontprev').css('line-height','1.1');

}
//END CONTENT FONT


$('#basethemesubmitbutton, #submitbuttonviews #basethemesubmitbutton').click(function() {	

//Get the value if CSS file is loaded to database
	
var checkifcssfileisloaded=localize_script_basetheme.cssfileloadedistrue;

//Get the value if custom CSS is not empty in the database

var customcssisnotemptyforediting=localize_script_basetheme.customcssisempty;

//Get the value of the Load CSS radio button options
var valuecustomcss=$('#enable_custom_css_fromdb_radio input:checked').val();

//Get value whether the theme options panel are already set and containing settings

var themeoptionspanelare_defined=localize_script_basetheme.themeoptions_are_set;


if ((checkifcssfileisloaded=='no') && (customcssisnotemptyforediting=='no') && (valuecustomcss=='yes')) {

return confirm('Are you sure you want to overwrite the existing custom CSS in the database?');	

	
}

if ((checkifcssfileisloaded=='yes') && (customcssisnotemptyforediting=='no') && (valuecustomcss=='no')) {

	return confirm('Are you sure you want to do this? This will clear out all changes made on custom CSS code box.');	
		
}

if ((checkifcssfileisloaded=='no') && (customcssisnotemptyforediting=='yes') && (valuecustomcss=='yes') && (themeoptionspanelare_defined=='yes') ) {

	return confirm('Are you sure you want to do this? This setting will override existing CSS in other theme options such as background settings, color, etc.');	
		
}
        
});

//Disable custom CSS checkbox in page load when CSS is loaded from dB

var checkifcssfileisloaded_pageload=localize_script_basetheme.cssfileloadedistrue;

if ((checkifcssfileisloaded_pageload=='yes')) {

	//$('#checkbox_actual input').attr("disabled",true);	
        $('#checkbox_actual input').remove();
        $('#enable_custom_codep #checkbox_text').remove();

    	$('textarea#customcsstextarea').keyup(function(){
    	    //get char limits of parent and child theme CSS
    	    var characterlimitserver= Math.round((localize_script_basetheme.charlimitsofcss)*(0.99));
    	    limits($(this), characterlimitserver);
    	});
		
}

function limits(obj, limit){

	    var text = $(obj).val(); 
	    var length = text.length; 
	    
	    if(length > limit){
	       $(obj).val(text.substr(0,limit));
	     } else { 
	       var charremaining=limit -length; 
	       $('#outputtextcount p').remove();
	       $('#outputtextcount').append("<p id='charactersremainingstyle'>"+charremaining+ " characters remaining!</p>");
	     }
}


	
});
