jQuery(document).ready(function(){

    jQuery("#content .primary-product-detail #main .product .summary .sum-pro-desc ul.spd-lv1 li.spd-has-child .spd-row").click(function(){
        var status_show = jQuery(jQuery(this).siblings(".content-hide")).css("display");
        if(status_show == "none") {
            jQuery(jQuery(this).siblings(".content-hide")).css("display", "block");
            jQuery(jQuery(this).find(".spdr-right")).html('<i class="fa fa-angle-up"></i>');
        } else {
            jQuery(jQuery(this).siblings(".content-hide")).css("display", "none");
            jQuery(jQuery(this).find(".spdr-right")).html('<i class="fa fa-angle-down"></i>');
        }
    });

});