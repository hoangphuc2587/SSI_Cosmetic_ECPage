<?php
/**
 * This template to displays woocommerce page
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

get_header();
	$shoppingcart_settings = shoppingcart_get_theme_options();
	global $shoppingcart_content_layout;
	if( $post ) {
		$layout = get_post_meta( get_queried_object_id(), 'shoppingcart_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	} ?>
<div class="wrap">
    <?php if(is_shop()) { ?>
        <div id="primary-full" class="content-area product-list-page">
            <main id="main" class="site-main" role="main">
                <?php woocommerce_content(); ?>
            </main><!-- end #main -->
        </div> <!-- #primary -->
    <?php } elseif(is_product()) { ?>
        <div id="primary" class="content-area primary-product-detail">
            <main id="main" class="site-main" role="main">
                <?php woocommerce_content(); ?>
            </main><!-- end #main -->
        </div> <!-- #primary -->
	<?php } else { ?>
		<div id="primary-full" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php woocommerce_content(); ?>
            </main><!-- end #main -->
		</div> <!-- #primary -->
	<?php } ?>

<?php
if( 'default' == $layout ) { //Settings from customizer
	if((is_home() || is_front_page())&&($shoppingcart_settings['shoppingcart_sidebar_layout_options'] != 'nosidebar') && ($shoppingcart_settings['shoppingcart_sidebar_layout_options'] != 'fullwidth')){ ?>
<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Secondary', 'shoppingcart' ); ?>">
	<?php }
}
	if( 'default' == $layout ) { //Settings from customizer
		if((is_home() || is_front_page())&&($shoppingcart_settings['shoppingcart_sidebar_layout_options'] != 'nosidebar') && ($shoppingcart_settings['shoppingcart_sidebar_layout_options'] != 'fullwidth')): ?>
		<?php dynamic_sidebar( 'shoppingcart_woocommerce_sidebar' ); ?>
</aside><!-- end #secondary -->
<?php endif;
	}
?>
</div><!-- end .wrap -->

<?php
if($product) {
    $check_landing_iframe = get_post_meta($product->get_id(), 'landing_page', true);
    if (is_product() && $check_landing_iframe != "") { ?>

        <div class="iframe-container">
            <iframe id="iFrame1" name="temp_iframe"
                    onload='javascript:(function(o){o.style.height=o.contentWindow.document.body.scrollHeight+"px";}(this));'
                    src="<?php echo home_url(); ?>/wp-content/themes/shoppingcart/p_detail_landing/<?php echo $check_landing_iframe; ?>"
                    title="Tsubuporon Night Pack"></iframe>
        </div>

    <?php }
}
?>

<?php
get_footer();
?>