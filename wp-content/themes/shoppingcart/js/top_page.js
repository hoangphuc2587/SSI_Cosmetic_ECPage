jQuery(document).ready(function(){
    jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 li.menu-item-has-children > a").attr('href', 'javascript:void(0)');
    jQuery("#masthead #site-branding #site-detail .stm-menu-lv1 .menu-item-has-children > ul").css("display", "none");

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

    jQuery("#masthead .top-header .header-catalog-menu-wrap .catalog-menu-box .catalog-menu-wrap nav.catalog-menu ul.cat-nav-menu  li.menu-item-has-children > a").attr("href", "javascript:void(0)");

jQuery('.area-store-list').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    nextArrow: '<i class="fa fa-chevron-circle-right"></i>',
    prevArrow: '<i class="fa fa-chevron-circle-left"></i>',
    responsive: [
    {
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false
        }
    },
    {
        breakpoint: 768,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    },
    {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

});
