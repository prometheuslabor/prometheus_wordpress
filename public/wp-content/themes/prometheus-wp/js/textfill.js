jQuery(document).ready(function($) {
    var title = jQuery(".textwidget").parent().find("h3");
    var boundingHeight = jQuery("#feature").height() - title.height();
    var textHeight = jQuery("#feature .textwidget p").height();

    if (textHeight > boundingHeight) {
        // Make some adjustments to try to fit the text in the box.
        var title = jQuery(".textwidget").parent().find("h3");
        var text = jQuery("#feature .textwidget p");
        title.attr("style", "font-size: 40px !important; margin: 0 0 5px 0;");
        text.attr("style", "font-size: 14px !important; line-height: 22px !important;");
        var textHeight = jQuery("#feature .textwidget p").height();

        if (jQuery("#feature .textwidget p").height() > boundingHeight) {
            text.text(text.text().split(". ")[0]+".");
        }
    }
});
