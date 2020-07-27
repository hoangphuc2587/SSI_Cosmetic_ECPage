if (screen.width > 767)
{
    window.onscroll = function() {
        var x = window.pageYOffset;
        if (x > 689) {
            jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "visible");
            jQuery("#masthead #sticky-header-sticky-wrapper #primary-menu li.menu-item-has-children > a").attr('href', 'javascript:void(0)');
        } else {
            jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "hidden");
        }
    }
}
else
{
    jQuery(document).ready(function(){
        jQuery("#masthead #sticky-header-sticky-wrapper").css("visibility", "visible");
        jQuery("#masthead #sticky-header-sticky-wrapper #sticky-header").addClass("show-nav-un-toppage");
        jQuery("#masthead #sticky-header-sticky-wrapper").addClass("is-sticky");
    });
    window.onscroll = function() {
        jQuery("#masthead #sticky-header-sticky-wrapper #sticky-header").addClass("show-nav-un-toppage");
        jQuery("#masthead #sticky-header-sticky-wrapper").addClass("is-sticky");
    }
}