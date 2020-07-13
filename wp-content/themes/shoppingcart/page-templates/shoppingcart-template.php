<?php
/**
 * Template Name: ShoppingCart Template
 *
 * Displays the contact page template.
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */
$shoppingcart_settings = shoppingcart_get_theme_options();

get_header(); ?>

<div class="product-widget-box">
	<div class="product-widget-wrap">
		<div class="wrap">
		<?php 
		if (is_active_sidebar('shoppingcart_template')):

			dynamic_sidebar('shoppingcart_template');

		endif;

		if ( have_posts() ) {
			the_post();

			the_content (); 
			
		}  ?>
		</div> <!-- end .wrap -->
	</div> <!-- end .shoppingcart-grid-widget-wrap -->
</div> <!-- end .product-widget-box -->

<div class="area-store-list">
	<div class="asl-wrap">
		<div class="asl-title">DANH SÁCH CỬA HÀNG</div>
		<div class="asl-row">
			<?php for($i=0; $i<4; $i++) { ?>
			<div class="aslr-col">
				<div class="store-item">
					<div class="si-img">
						<img src="<?php echo home_url().'/wp-content/themes/shoppingcart/images/home_store.png' ?>" alt="img" />
					</div>
					<div class="si-name"><i class="fa fa-heart"></i>&nbsp;&nbsp;SHOP BONITA&nbsp;&nbsp;<i class="fa fa-heart"></i></div>
					<div class="si-cont">
						<div class="sic-addr">
							<img src="<?php echo home_url().'/wp-content/themes/shoppingcart/images/icon_map_marker.png'; ?>" alt="img" />&nbsp;&nbsp;
							389A Lý Thái Tổ, Phường 09, Quận 10, Thành phố Hồ Chí Minh</div>
						<div class="sic-ws">
							<img src="<?php echo home_url().'/wp-content/themes/shoppingcart/images/icon_globe.png'; ?>" alt="img" />&nbsp;&nbsp;
							http://bonitashop.vn/
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php

if(class_exists('woocommerce')){

	if($shoppingcart_settings['shoppingcart_display_featured_brand'] =='below-widget') {
		do_action('shoppingcart_display_front_page_product_brand'); // Display just before footer column
	}

}

if( is_active_sidebar( 'shoppingcart_template_footer_col_1' ) || is_active_sidebar( 'shoppingcart_template_footer_col_2' ) || is_active_sidebar( 'shoppingcart_template_footer_col_3' ) || is_active_sidebar( 'shoppingcart_template_footer_col_4' )) { ?>

	<div class="shoppingcart-template-footer-column">
		<div class="wrap">
			<div class="sc-template-footer-wrap">

				<?php
					for($i =1; $i<= 4; $i++){
						if ( is_active_sidebar( 'shoppingcart_template_footer_col_'.$i ) ) : ?>
							<div class="sc-footer-column">

								<?php dynamic_sidebar( 'shoppingcart_template_footer_col_'.$i ); ?>

							</div>

						<?php endif;
					}
				?>
			</div> <!-- end .sc-template-footer-wrap -->
		</div> <!-- end .wrap -->
	</div> <!-- end .shoppingcart-template-footer-column -->
<?php }
get_footer();