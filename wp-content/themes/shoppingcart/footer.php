<?php
/**
 * The template for displaying the footer.
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

$shoppingcart_settings = shoppingcart_get_theme_options(); ?>
</div><!-- end #content -->
<!-- Footer Start ============================================= -->
<footer id="colophon" class="site-footer" role="contentinfo">
<?php

$footer_column = $shoppingcart_settings['shoppingcart_footer_column_section'];
	if( is_active_sidebar( 'shoppingcart_footer_1' ) || is_active_sidebar( 'shoppingcart_footer_2' ) || is_active_sidebar( 'shoppingcart_footer_3' ) || is_active_sidebar( 'shoppingcart_footer_4' )) { ?>
	<div class="widget-wrap">
		<div class="wrap">
			<div class="widget-area">
				<div class="f-wa-left">
					<div class="fwal-logo"><a href="<?php echo home_url(); ?>">
						<img src="<?php echo home_url() . '/wp-content/themes/shoppingcart/images/logo_main_menu.png' ?>" alt="img" /></a></div>
					<div class="fwal-name">CARICO CO.,LTD</div>
					<div class="fwal-addr">579 Yonezu-cho, Minami-ku, Hamamatsu-city,<br>Shizuoka, Japan</div>
				</div>
				<div class="f-wa-right">
					<div>Hướng dẫn mua hàng</div>
					<div class="fwar-table">
						<ul>
							<li><a href="#"><i class='fa fa-angle-right'></i>Mua hàng</a></li>
							<li><a href="#"><i class='fa fa-angle-right'></i>Đổi trả hàng</a></li>
						</ul>
						<ul class="fwart-ul2">
							<li><a href="#"><i class='fa fa-angle-right'></i>Phí vận chuyển</a></li>
							<li><a href="#"><i class='fa fa-angle-right'></i>Về Carico</a></li>
						</ul>
						<div></div>
					</div>
				</div>
			</div> <!-- end .widget-area -->
		</div><!-- end .wrap -->
	</div> <!-- end .widget-wrap -->
	<?php } ?>
	<div class="site-info">
	<div class="wrap">
			<img src="<?php echo home_url().'/wp-content/themes/shoppingcart/images/footer_bct.png'; ?>" alt="img" />
			<div style="clear:both;"></div>
		</div> <!-- end .wrap -->
	</div> <!-- end .site-info -->
	<?php
		$disable_scroll = $shoppingcart_settings['shoppingcart_scroll'];
		if($disable_scroll == 0):?>
			<button type="button" class="go-to-top" type="button">
				<span class="screen-reader-text"><?php esc_html_e('Go to top','shoppingcart'); ?></span>
				<span class="icon-bg"></span>
				<span class="back-to-top-text"><i class="fa fa-angle-up"></i></span>
				<i class="fa fa-angle-double-up back-to-top-icon"></i>
			</button>
	<?php endif; ?>
	<div class="page-overlay"></div>
</footer> <!-- end #colophon -->
</div><!-- end .site-content-contain -->
</div><!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>