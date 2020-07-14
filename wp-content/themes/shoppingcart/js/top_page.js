jQuery(document).ready(function(){
    jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 li.menu-item-has-children > a").attr('href', 'javascript:void(0)');
    jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display", "none");
    //jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "hidden");

    jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > a").click(function(){
        var menu_display = jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display");
        if(menu_display == "block") {
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display", "none");
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 > li.menu-item-has-children > a").removeClass("exp-banner-memu");
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 > li.menu-item-has-children").removeClass("current_page_item");
        } else {
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display", "block");
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 > li.menu-item-has-children > a").addClass("exp-banner-memu");
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 > li").removeClass("current_page_item");
            jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 > li.menu-item-has-children").addClass("current_page_item");
        }
    });

    // jQuery(".area-store-list .shoppingcart-grid-product").hover(function(){
    //     jQuery(this).css("background-color", "yellow");
    // });

});

window.onscroll = function() {
    var x = window.pageYOffset;
    if (x > 689) {
        jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "visible");
        jQuery("#masthead #sticky-header-sticky-wrapper #primary-menu li.menu-item-has-children > a").attr('href', 'javascript:void(0)');
    } else {
        jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "hidden");
    }
}
