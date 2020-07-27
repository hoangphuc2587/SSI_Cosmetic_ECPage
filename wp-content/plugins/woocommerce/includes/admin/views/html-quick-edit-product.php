<?php
/**
 * Admin View: Quick Edit Product
 *
 * @package admin.
 */

defined( 'ABSPATH' ) || exit;
?>

<fieldset class="inline-edit-col-left">
	<div id="woocommerce-fields" class="inline-edit-col">

		<h4><?php esc_html_e( 'Product data', 'woocommerce' ); ?></h4>

		<?php do_action( 'woocommerce_product_quick_edit_start' ); ?>

		<div class="price_fields">
			<label>
				<span class="title"><?php esc_html_e( 'Price', 'woocommerce' ); ?></span>
				<span class="input-text-wrap">
					<input type="text" name="_regular_price" class="text wc_input_price regular_price" placeholder="<?php esc_attr_e( 'Regular price', 'woocommerce' ); ?>" value="">
				</span>
			</label>
			<br class="clear" />
		</div>
		<?php do_action( 'woocommerce_product_quick_edit_end' ); ?>

		<input type="hidden" name="woocommerce_quick_edit" value="1" />
		<input type="hidden" name="woocommerce_quick_edit_nonce" value="<?php echo esc_attr( wp_create_nonce( 'woocommerce_quick_edit_nonce' ) ); ?>" />
	</div>
</fieldset>
