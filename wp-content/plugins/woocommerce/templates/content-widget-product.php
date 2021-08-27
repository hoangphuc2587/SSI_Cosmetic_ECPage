<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; //echo '<pre>'; print_r($product); die;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

$price =  $product->get_price();
$regular_price =  $product->get_regular_price();
$discount = ($regular_price - $price)/$regular_price*100 *(-1);

?>
<div <?php post_class('shoppingcart-grid-product'); ?>>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<figure class="sc-grid-product-img">
		<?php if ( $product->is_on_sale() ) { ?>
			<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale-top">' . $discount . '% &nbsp;</span>', $post, $product ); ?>
		<?php } ?>
		<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>" alt="<?php the_title_attribute();?>">
		<!-- <img src="<?php echo esc_url( $image_attribute[0] ); ?>" alt="<?php the_title_attribute();?>"> -->
		<?php echo $product->get_image(); ?>
		<div class="btn-quick-view">XEM NHANH</div>
		</a>
		<?php  if ( !$product->is_in_stock() ) { ?>
			<div class="badge-sold-out"><span><?php esc_html_e('Out of Stock','shoppingcart'); ?></span></div>
		<?php } ?>
		<!-- <div class="btn-quick-view">XEM NHANH</div> -->
	</figure>

	<div class="sc-grid-product-content">
		<?php if ( $shoppingcart_rating = wc_get_rating_html( $product->get_average_rating() ) ){
			// echo '<div class="woocommerce-product-rating woocommerce">' .wp_kses_post( $shoppingcart_rating ) . ' </div>';
			} ?>

			<h2 style="text-transform: uppercase;" class="sc-grid-product-title"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="sgpc-short"><?php echo strip_tags($product->get_short_description()); ?></div>
			<?php if ( $price_html = $product->get_price_html() ) : ?>
			<span class="price <?php echo $product->is_on_sale() ? 'price-sale' : ''?>">
				<?php echo $price_html; ?>
			</span>
			<?php endif; ?>
	</div> <!-- end .sc-grid-product-content -->

	<!-- <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<span class="product-title"><?php echo wp_kses_post( $product->get_name() ); ?></span>
	</a> -->

	<?php if ( ! empty( $show_rating ) ) : ?>
		<?php // echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php endif; ?>

	<?php // echo $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</div>

