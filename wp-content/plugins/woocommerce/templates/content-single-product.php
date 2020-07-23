<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<?php woocommerce_breadcrumb(); ?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
		<div class="sum-pro-desc">
            <ul class="spd-lv1">
				<li>
					<div class="spd-row">
						<div class="spdr-left"><i class="fa fa-heart"></i>Trọng lượng</div>
						<div class="spdr-right"><?php echo $product->get_weight(); ?></div>
					</div>
				</li>
				<li>
					<div class="spd-row">
						<div class="spdr-left"><i class="fa fa-heart"></i>Liều lượng sử dụng</div>
						<div class="spdr-right"><?php echo $product->get_dosage(); ?></div>
					</div>
				</li>
				<li>
					<div class="spd-row">
						<div class="spdr-left"><i class="fa fa-heart"></i>Nơi sản xuất</div>
						<div class="spdr-right"><?php echo $product->get_manufacture(); ?></div>
					</div>
				</li>
				<li>
					<div class="spd-row">
						<div class="spdr-left"><i class="fa fa-heart"></i>Công dụng</div>
						<div class="spdr-right"><?php echo $product->get_uses(); ?></div>
					</div>
				</li>
				<li class="spd-has-child">
					<div class="spd-row">
						<div class="spdr-left"><i class="fa fa-heart"></i>Cách sử dụng</div>
						<div class="spdr-right"><i class="fa fa-angle-down"></i></div>
					</div>
					<ul class="content-hide spd-lv2-csd">
                        <?php
                           $arr_usage = array_values(array_filter(explode(PHP_EOL, $product->get_usage()))) ;
                           foreach ($arr_usage as $key => $value):
                        ?>
						<li>
							<div class="csd-wrap">
								<div class="lv2-csd-left"><span class="csd-type-list"><?php echo ($key + 1) < 10 ? '0'.($key+1) : ($key+1)?></span></div>
								<div class="lv2-csd-right">
									<?php echo $value;?>
								</div>
							</div>
						</li>
                        <?php endforeach; ?>
					</ul>
				</li>
				<li class="spd-has-child">
					<div class="spd-row">
						<div class="spdr-left"><i class="fa fa-heart"></i>Thành phần</div>
						<div class="spdr-right"><i class="fa fa-angle-down"></i></div>
					</div>
					<div class="content-hide thanh-phan">
                    <?php echo $product->get_component(); ?>
					</div>
				</li>
				<li class="spd-has-child">
					<div class="spd-row">
						<div class="spdr-left"><i class="fa fa-heart"></i>Lưu ý</div>
						<div class="spdr-right"><i class="fa fa-angle-down"></i></div>
					</div>
					<ul class="content-hide spd-lv2-ly">
                        <?php
                           $arr_note = array_values(array_filter(explode(PHP_EOL, $product->get_note()))) ;
                           foreach ($arr_note as $key => $value):
                        ?>
                        <li><?php echo $value;?></li>
                        <?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
