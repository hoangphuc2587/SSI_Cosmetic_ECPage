window.onscroll = function() {
    var x = window.pageYOffset;
    if (x > 689) {
        jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "visible");
        jQuery("#masthead #sticky-header-sticky-wrapper #primary-menu li.menu-item-has-children > a").attr('href', 'javascript:void(0)');
    } else {
        jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "hidden");
    }
}
