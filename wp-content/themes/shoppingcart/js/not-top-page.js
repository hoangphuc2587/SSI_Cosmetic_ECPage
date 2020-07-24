jQuery(document).ready(function(){
	jQuery("#masthead #sticky-header-sticky-wrapper #sticky-header").addClass("show-nav-un-toppage");
	jQuery("#masthead #sticky-header-sticky-wrapper").addClass("is-sticky");
});
window.onscroll = function() {
    jQuery("#masthead #sticky-header-sticky-wrapper #sticky-header").addClass("show-nav-un-toppage");
	jQuery("#masthead #sticky-header-sticky-wrapper").addClass("is-sticky");
}
