jQuery(document).ready(function(){

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery > a.woocommerce-product-gallery__trigger")
    .css('display', 'none');

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport")
    .append('<a href="#" class="woocommerce-product-gallery__trigger">zoom</a>');

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport")
    .append('<img class="pdetail-nav-l" src="/wp-content/themes/shoppingcart/images/pdetail_nav_l.png" alt="img" />');

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport")
    .append('<img class="pdetail-nav-r" src="/wp-content/themes/shoppingcart/images/pdetail_nav_r.png" alt="img" />');
    var isMobile = navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i);
    if (!isMobile) {
        jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport .pdetail-nav-r").click(function(e){
            e.preventDefault();
            var active_img = jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-control-nav").find("img.flex-active");              
            if(active_img.parent().next().find("img").attr("src") != undefined) {
                active_img.parent().next().find("img").click();
            }
        });

        jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport .pdetail-nav-l").click(function(e){
            e.preventDefault();
            var active_img = jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-control-nav").find("img.flex-active");
            if(active_img.parent().prev().find("img").attr("src") != undefined) {
                active_img.parent().prev().find("img").click();
            }
        });
    }else{
        jQuery(".pdetail-nav-r").css("display","none");
        jQuery(".pdetail-nav-l").css("display","none");
    }
});
