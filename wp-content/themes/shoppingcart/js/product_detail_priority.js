jQuery(document).ready(function(){

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery > a.woocommerce-product-gallery__trigger")
    .css('display', 'none');

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport")
    .append('<a href="#" class="woocommerce-product-gallery__trigger">zoom</a>');

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport")
    .append('<img class="pdetail-nav-l" src="/wp-content/themes/shoppingcart/images/pdetail_nav_l.png" alt="img" />');

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport")
    .append('<img class="pdetail-nav-r" src="/wp-content/themes/shoppingcart/images/pdetail_nav_r.png" alt="img" />');

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport .pdetail-nav-r").click(function(){
        var active_img = jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-control-nav").find("img.flex-active");
        jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-control-nav img").removeClass("flex-active");
        if(active_img.parent().next().children("img").attr("src") == undefined) {
            active_img.addClass("flex-active");
        } else {
            active_img.parent().next().children("img").addClass("flex-active");

            var ele_tran = jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport figure");
            var cur_tran = getTranslate3dX(ele_tran);
            cur_tran = parseInt(cur_tran) - 622;
            ele_tran.css('transform','translate3d('+cur_tran+'px, 0px, 0px)');
        }
    });

    jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport .pdetail-nav-l").click(function(){
        var active_img = jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-control-nav").find("img.flex-active");
        jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-control-nav img").removeClass("flex-active");
        if(active_img.parent().prev().children("img").attr("src") == undefined) {
            active_img.addClass("flex-active");
        } else {
            active_img.parent().prev().children("img").addClass("flex-active");

            var ele_tran = jQuery("#content .primary-product-detail #main .product .woocommerce-product-gallery .flex-viewport figure");
            var cur_tran = getTranslate3dX(ele_tran);
            cur_tran = parseInt(cur_tran) + 622;
            ele_tran.css('transform','translate3d('+cur_tran+'px, 0px, 0px)');
        }
    });

});

function getTranslate3dX(el){
    var matrix = el.css('transform').replace(/[^0-9\-.,]/g, '').split(',');
    var x = matrix[12] || matrix[4];
    //var y = matrix[13] || matrix[5];

    return x;
};