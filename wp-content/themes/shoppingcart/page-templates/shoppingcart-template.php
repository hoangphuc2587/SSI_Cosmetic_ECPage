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

<div class="product-widget-box">
	<div class="wrap wrap-area-store-list">
		<h3 class="area-store-list-title">DANH SÁCH CỬA HÀNG</h3>
		<div class="shoppingcart-grid-widget-wrap five-column-grid area-store-list">
            <?php
               	query_posts(array(
					'post_type' => 'stores',
					'post_status' => 'publish',
					'order'     => 'ASC',
					'meta_key' => 'order',
					'orderby' => 'meta_value_num',
				))
            ?>

			<?php while (have_posts()) : the_post(); ?>
				<?php
				  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
				  $link = get_post_meta(get_the_ID() , 'url' , true);				
				?>
				<div class="shoppingcart-grid-product">

				<div class="asl-wrap-item">
					<figure class="sc-grid-store-img">
						<a href="javascript:void(0)" style="cursor: auto;">
							<img src="<?php echo $featured_img_url; ?>" alt="img">
						</a>
					</figure>
					<div class="si-name"><i class="fa fa-heart ml"></i>&nbsp;&nbsp;<?php the_title(); ?>&nbsp;&nbsp;<i class="fa fa-heart"></i></div>
					<div class="si-cont">
						<div class="sic-addr">
							<img src="<?php echo home_url().'/wp-content/themes/shoppingcart/images/icon_map_marker.png'; ?>" alt="img" />
							<?php echo get_the_content(); ?>
						</div>
						<div class="sic-ws">
							<img src="<?php echo home_url().'/wp-content/themes/shoppingcart/images/icon_globe.png'; ?>" alt="img" />
							<a href="<?php echo $link;?>"><?php echo $link; ?></a>
						</div>
					</div>
				</div>


				</div>
			<?php endwhile; ?>
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