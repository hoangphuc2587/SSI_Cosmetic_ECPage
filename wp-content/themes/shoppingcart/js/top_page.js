jQuery(document).ready(function(){
    jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display", "none");
    //jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "hidden");

    jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > a").click(function(){
        var menu_display = jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display");
        if(menu_display == "block") {
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display", "none");
        } else {
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display", "block");
        }
    });
});

window.onscroll = function() {
    var x = window.pageYOffset;
    if (x > 689) {
        jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "visible");
    } else {
        jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "hidden");
    }
}
