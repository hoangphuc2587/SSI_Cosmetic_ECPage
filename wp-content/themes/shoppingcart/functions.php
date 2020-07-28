<?php
/**
 * Display all shoppingcart functions and definitions
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

/************************************************************************************************/
if ( ! function_exists( 'shoppingcart_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shoppingcart_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
			$content_width=1170;
	}

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('post-thumbnails');
	add_image_size( 'shoppingcart-product-cat-image', 512, 512, true );
	add_image_size( 'shoppingcart-featured-brand-image', 400, 200, true );
	add_image_size( 'shoppingcart-grid-product-image', 420, 420, true );
	add_image_size( 'shoppingcart-popular-post', 75, 75, true );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'top-menu' => __( 'Top Menu', 'shoppingcart' ),
		'primary' => __( 'Main Menu', 'shoppingcart' ),
		'catalog-menu' => __( 'Catalog Menu', 'shoppingcart' ),
		'social-link'  => __( 'Add Social Icons Only', 'shoppingcart' ),
	) );

	/* 
	* Enable support for custom logo. 
	*
	*/ 
	add_theme_support( 'custom-logo', array(
		'flex-width' => true, 
		'flex-height' => true,
	) );

	add_theme_support( 'gutenberg', array(
			'colors' => array(
				'#f77426',
			),
		) );
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	//Indicate widget sidebars can use selective refresh in the Customizer. 
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Switch default core markup for comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption',
	) );



	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'shoppingcart_custom_background_args', array(
		'default-color' => '#ffffff',
		'default-image' => '',
	) ) );

	add_editor_style( array( 'css/editor-style.css') );

	if ( class_exists( 'WooCommerce' ) ) {

		/**
		 * Load WooCommerce compatibility files.
		 */
			
		require get_template_directory() . '/woocommerce/functions.php';

	}


}
endif; // shoppingcart_setup
add_action( 'after_setup_theme', 'shoppingcart_setup' );

/***************************************************************************************/
function shoppingcart_content_width() {
	if ( is_page_template( 'page-templates/gallery-template.php' ) || is_attachment() ) {
		global $content_width;
		$content_width = 1920;
	}
}
add_action( 'template_redirect', 'shoppingcart_content_width' );

/***************************************************************************************/
if(!function_exists('shoppingcart_get_theme_options')):
	function shoppingcart_get_theme_options() {
	    return wp_parse_args(  get_option( 'shoppingcart_theme_options', array() ), shoppingcart_get_option_defaults_values() );
	}
endif;

/***************************************************************************************/
require get_template_directory() . '/inc/customizer/shoppingcart-default-values.php';
require get_template_directory() . '/inc/settings/shoppingcart-slider-functions.php';
require get_template_directory() . '/inc/settings/shoppingcart-functions.php';
require get_template_directory() . '/inc/settings/shoppingcart-common-functions.php';

/************************ ShoppingCart Sidebar  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/popular-posts.php';

if ( class_exists('woocommerce')) {
	require get_template_directory() . '/inc/widgets/widgets-functions/grid-column-widget.php';
}

/************************ ShoppingCart Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';

function shoppingcart_customize_register( $wp_customize ) {
if(!class_exists('ShoppingCart_Plus_Features')){
	class ShoppingCart_Customize_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
			<a title="<?php esc_html_e( 'Review Us', 'shoppingcart' ); ?>" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/shoppingcart/' ); ?>" target="_blank" id="about_shoppingcart">
			<?php esc_html_e( 'Review Us', 'shoppingcart' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'https://themefreesia.com/theme-instruction/shoppingcart/' ); ?>" title="<?php esc_html_e( 'Theme Instructions', 'shoppingcart' ); ?>" target="_blank" id="about_shoppingcart">
			<?php esc_html_e( 'Theme Instructions', 'shoppingcart' ); ?>
			</a><br/>
			<a href="<?php echo esc_url( 'https://tickets.themefreesia.com/' ); ?>" title="<?php esc_html_e( 'Support Tickets', 'shoppingcart' ); ?>" target="_blank" id="about_shoppingcart">
			<?php esc_html_e( 'Support Tickets', 'shoppingcart' ); ?>
			</a><br/>
		<?php
		}
	}
	$wp_customize->add_section('shoppingcart_upgrade_links', array(
		'title'					=> __('Important Links', 'shoppingcart'),
		'priority'				=> 1000,
	));
	$wp_customize->add_setting( 'shoppingcart_upgrade_links', array(
		'default'				=> false,
		'capability'			=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new ShoppingCart_Customize_upgrade(
		$wp_customize,
		'shoppingcart_upgrade_links',
			array(
				'section'				=> 'shoppingcart_upgrade_links',
				'settings'				=> 'shoppingcart_upgrade_links',
			)
		)
	);
}	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'shoppingcart_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'shoppingcart_customize_partial_blogdescription',
		) );
	}
	
	require get_template_directory() . '/inc/customizer/functions/design-options.php';
	require get_template_directory() . '/inc/customizer/functions/theme-options.php';
	require get_template_directory() . '/inc/customizer/functions/color-options.php' ;
	require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php' ;
	if ( class_exists( 'WooCommerce' ) ) {

		require get_template_directory() . '/inc/customizer/functions/frontpage-features.php' ;

	}
}
if(!class_exists('ShoppingCart_Plus_Features')){
	// Add Upgrade to Plus Button.
	require_once( trailingslashit( get_template_directory() ) . 'inc/upgrade-plus/class-customize.php' );

	/************************ TGM Plugin Activatyion  *****************************/
	require get_template_directory() . '/inc/tgm/tgm.php';
}

/** 
* Render the site title for the selective refresh partial. 
* @see shoppingcart_customize_register() 
* @return void 
*/ 
function shoppingcart_customize_partial_blogname() { 
bloginfo( 'name' ); 
} 

/** 
* Render the site tagline for the selective refresh partial. 
* @see shoppingcart_customize_register() 
* @return void 
*/ 
function shoppingcart_customize_partial_blogdescription() { 
bloginfo( 'description' ); 
}
add_action( 'customize_register', 'shoppingcart_customize_register' );
/******************* ShoppingCart Header Display *************************/
function shoppingcart_header_display(){
	$shoppingcart_settings = shoppingcart_get_theme_options();
	$header_display = $shoppingcart_settings['shoppingcart_header_display'];

	if ($header_display == 'header_logo' || $header_display == 'show_both') {
		shoppingcart_the_custom_logo();
	}
	if ($header_display == 'header_text' || $header_display == 'show_both') {
		echo '<div id="site-detail">';
			if (is_home() || is_front_page()){ ?>
				<h1 id="site-title"> <?php }else{?> <h2 id="site-title"> <?php } ?>
				<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(get_bloginfo('name', 'display'));?>" rel="home">
					<img src="<?php echo home_url() . "/wp-content/themes/shoppingcart/images/logo.png"; ?>" alt="img" />
				</a>
				<?php if(is_home() || is_front_page()){ ?>
				</h1>  <!-- end .site-title -->
				<?php } else { ?> </h2> <!-- end .site-title --> <?php }

				$site_description = get_bloginfo( 'description', 'display' );
				if ($site_description){?>
					<div id="site-description"> <?php bloginfo('description');?> </div> <!-- end #site-description -->
			<?php } ?>

	<div class="site-title-menu">
		<?php
			wp_nav_menu(array('container' => '', 'items_wrap' => '<ul class="stm-menu-lv1">%3$s</ul>'));
		?>
	</div>
	<div class="carico-co-ltd">CARICO CO.,LTD</div>
	<?php echo '</div>'; // end #site-detail
	}
}
add_action('shoppingcart_site_branding','shoppingcart_header_display');

if ( ! function_exists( 'shoppingcart_the_custom_logo' ) ) : 
 	/** 
 	 * Displays the optional custom logo. 
 	 * Does nothing if the custom logo is not available. 
 	 */ 
 	function shoppingcart_the_custom_logo() { 
		if ( function_exists( 'the_custom_logo' ) ) { 
			the_custom_logo(); 
		}
 	} 
endif;

require get_template_directory() . '/inc/front-page/front-page-features.php';

/************** YITH_WCWL *************************************/
if ( function_exists( 'YITH_WCWL' ) ) {
	function shoppingcart_update_wishlist_count(){
		wp_send_json( YITH_WCWL()->count_products() );
	}
	add_action( 'wp_ajax_update_wishlist_count', 'shoppingcart_update_wishlist_count' );
	add_action( 'wp_ajax_nopriv_update_wishlist_count', 'shoppingcart_update_wishlist_count' );
}


/************** Add to cart ajax autoload *************************************/
add_filter( 'woocommerce_add_to_cart_fragments', 'shoppingcart_woocommerce_add_to_cart_fragment' );

function shoppingcart_woocommerce_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
			<div class="sx-cart-views">
				<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="wcmenucart-contents">
					<i class="fa fa-shopping-cart"></i>
					<?php if(WC()->cart->get_cart_contents_count() > 99) { ?>
						<span class="cart-value">99</span>
						<span class="cvalue-plus">+</span>
					<?php } else { ?>
						<span class="cart-value"><?php echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></span>
					<?php } ?>
					Giỏ hàng
				</a>
				<div class="my-cart-wrap">
					<div class="my-cart"><?php esc_html_e('Total', 'shoppingcart'); ?></div>
					<div class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div>
				</div>
			</div>
	<?php

	$fragments['div.sx-cart-views'] = ob_get_clean();

	return $fragments;
}


/************** add contact css *************************************/
function add_contact_css() {
    wp_enqueue_style('contact-css',  get_template_directory_uri() . '/css/contact-style.css');
}
add_action('wp_enqueue_scripts', 'add_contact_css');

/************** add login css *************************************/
function add_login_css() {
    wp_enqueue_style('login-register-css',  get_template_directory_uri() . '/css/login-register-style.css');
}
add_action('wp_enqueue_scripts', 'add_login_css');

/************** redirect to the custom login page *************************************/
function redirect_to_custom_login_page() {
	wp_redirect(site_url() . "/login");
	exit();
}
add_action('wp_logout', 'redirect_to_custom_login_page');

/************** to check phone number valid or not *************************************/
function isPhoneNumber($phone) {
	if (preg_match("/^(03[2-9]|05[6|8|9]|07[0|6-9]|08[1-9]|09[0-9])+([0-9]{7})$/", $phone)) {
		return true;
	}
	return false;
}
add_filter('phone_number_check_valid', 'isPhoneNumber');

/************** to check phone number existing or not *************************************/
function isPhoneNumberExist($phone) {
	$args = array(
		'meta_key'     => 'user_phone',
		'meta_value'   => $phone,
		'meta_compare' => '=',
		'exclude' => array( $current_user_id )
	);
	$user_query = new WP_User_Query( $args );
	// Get the results
	$authors = $user_query->get_results();
	// Check for results
	if (!empty($authors)){
		return true;
	}
	return false;
}
add_filter('phone_number_check_exist', 'isPhoneNumberExist');

/*************** set defaul billing_phone ***********/
add_filter( 'woocommerce_checkout_fields' , 'default_values_checkout_fields' );
function default_values_checkout_fields( $fields ) {
    $current_user_id = get_current_user_id();
    $phone = get_user_meta($current_user_id,'user_phone',true);
    $fields['billing']['billing_phone']['default'] = $phone;
    return $fields;
}

//*************** sort custom **********/
function custom_woocommerce_product_sorting( $orderby ) {
    unset($orderby["popularity"]);
    unset($orderby["rating"]);
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "custom_woocommerce_product_sorting", 20 );

/************ add filter price *****************/
add_action("woocommerce_before_shop_loop","custom_abc");
function custom_abc(){
    echo do_shortcode('[do_widget id=woocommerce_price_filter-1]');
}

/*************** add css in shop page **********/
function add_custom_css() {
    if( is_shop() || is_product_category()) :
        wp_enqueue_style( 'shop', get_template_directory_uri() . '/css/custom.css',false,'1.1');
    endif;
}
add_action('wp_enqueue_scripts', 'add_custom_css');
//*********** remove add to cart
add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt', 5);
add_action( 'woocommerce_after_shop_loop_item', function(){
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
}, 1 );
//********* custom product itemn
function add_img_wrapper_start() {
    echo '<div class="archive-imgae-wrap">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_start', 5, 2 );

function add_img_wrapper_close() {
    echo '<div class="btn-quick-view">XEM NHANH</div></div>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_img_wrapper_close', 12, 2 );



add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'VND': $currency_symbol = ''; break;
    }
    return $currency_symbol;
}

add_action( 'woocommerce_thankyou', 'bbloomer_checkout_save_user_meta');

function bbloomer_checkout_save_user_meta( $order_id ) {

    $order = wc_get_order( $order_id );
    foreach( $order->get_used_coupons() as $coupon_code ){
        // Retrieving the coupon ID
        $coupon_post_obj = get_page_by_title($coupon_code, OBJECT, 'shop_coupon');
        $coupon_id       = $coupon_post_obj->ID;
        update_post_meta( $coupon_id, 'used_coupon', 'yes' );
    }

}


/************** add order css *************************************/
function add_order_css() {
    wp_enqueue_style('order-css',  get_template_directory_uri() . '/css/order-style.css');
    if(is_checkout()|| is_cart()){
        wp_enqueue_style('checkout',  get_template_directory_uri() . '/css/checkout.css');

    }
}
add_action('wp_enqueue_scripts', 'add_order_css');

///////////////// custom order ///////////////

 add_filter("woocommerce_coupon_is_valid","plugin_coupon_validation",10,2);

 function plugin_coupon_validation($result,$coupon) {

     if($coupon->get_used_coupon() == true){
         return false;
     }

     return true;
  }


 add_filter("woocommerce_coupon_error","plugin_coupon_error_message",10,3);

 function plugin_coupon_error_message($err,$err_code,$coupon) {
         if( empty($coupon) ) {
             return "Vui lòng nhập mã giảm giá.";

         }

      if($coupon->get_used_coupon() == true){
     	return "Mã giảm giá \" ".$coupon->code."\" đã hết lượt sử dụng.";

        }


     return $err ;
  }

  // hide coupon
 function hide_coupon_field_on_cart( $enabled ) {
     if(is_checkout()){
         $enabled = false;
     }
 	$applied_coupons = WC()->cart->get_applied_coupons();

     if( sizeof($applied_coupons) > 0 ) {
         foreach ($applied_coupons as $item){
             WC()->cart->remove_coupon( $item->code );

         }
         $enabled = false;
     }

 	return $enabled;
 }
 add_filter( 'woocommerce_coupons_enabled', 'hide_coupon_field_on_cart' );



 add_action('woocommerce_after_checkout_validation',
 	'validation_after_checkout_validation');

 function validation_after_checkout_validation( ) {
    $applied_coupons = WC()->cart->get_applied_coupons();
    foreach ($$applied_coupons as $coupon) {
    		if($coupon->get_used_coupon() == true){
    			wc_add_notice( __( "Mã giảm giá \" ".$coupon->code."\" đã hết lượt sử dụng.", 'woocommerce' ), 'error' );

    		}
    }

 }

 /* Custom Post Type Start */
function create_posttype() {
	register_post_type( 'stores',
	// CPT Options
	array(
	  'labels' => array(
	   'name' => __( 'stores' ),
	   'singular_name' => __( 'Stores' )
	  ),
	  'public' => true,
	  'has_archive' => false,
	  'rewrite' => array('slug' => 'store'),
	 )
	);

	register_post_type( 'contacts',
	// CPT Options
	array(
	  'labels' => array(
	   'name' => __( 'contacts' ),
	   'singular_name' => __( 'Contacts' )
	  ),
	  'public' => true,
	  'has_archive' => false,
	  'rewrite' => array('slug' => 'contact'),
	 )
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

function cw_post_type_stores() {

$supports = array(
'title', // post title
'editor', // post content
'thumbnail', // featured images
'custom-fields', // custom fields
);

$labels = array(
'name' => _x('Cửa hàng', 'plural'),
'singular_name' => _x('Cửa hàng', 'singular'),
'menu_name' => _x('Cửa hàng', 'admin menu'),
'name_admin_bar' => _x('stores', 'admin bar'),
'add_new' => _x('Thêm mới', 'add new'),
'add_new_item' => __('Thêm mới cửa hàng'),
'new_item' => __('Thêm cửa hàng'),
'edit_item' => __('Sửa cửa hàng'),
'view_item' => __('Xem cửa hàng'),
'all_items' => __('Tất cả cửa hàng'),
'search_items' => __('Tìm kiếm cửa hàng'),
'not_found' => __('Không tìm thấy dữ liệu.'),
);

$args = array(
'supports' => $supports,
'labels' => $labels,
'public' => true,
'query_var' => true,
'rewrite' => array('slug' => 'stores'),
'has_archive' => true,
'hierarchical' => false,
);
register_post_type('stores', $args);
}
add_action('init', 'cw_post_type_stores');

/*Custom Post type end*/



/* Custom Post Type Start */

function cw_post_type_contacts() {

$supports = array(
'title', // post title
'editor', // post content
'custom-fields', // custom fields
);

$labels = array(
'name' => _x('Liên hệ', 'plural'),
'singular_name' => _x('Liên hệ', 'singular'),
'menu_name' => _x('Liên hệ', 'admin menu'),
'name_admin_bar' => _x('contacts', 'admin bar'),
'add_new' => _x('Thêm mới', 'add new'),
'add_new_item' => __('Thêm mới liên hệ'),
'new_item' => __('Thêm liên hệ'),
'edit_item' => __('Sửa liên hệ'),
'view_item' => __('Xem liên hệ'),
'all_items' => __('Tất cả liên hệ'),
'search_items' => __('Tìm kiếm liên hệ'),
'not_found' => __('Không tìm thấy dữ liệu.'),
);

$args = array(
'supports' => $supports,
'labels' => $labels,
'public' => true,
'query_var' => true,
'rewrite' => array('slug' => 'contacts'),
'has_archive' => true,
'hierarchical' => false,
);
register_post_type('contacts', $args);
}
add_action('init', 'cw_post_type_contacts');

/*Custom Post type end*/
// Add the custom columns to the book post type:
add_filter( 'manage_stores_posts_columns', 'set_custom_edit_stores_columns' );
function set_custom_edit_stores_columns($columns) {
    $columns = array(
        'cb' => $columns['cb'],
        'image' => __( 'Hình ảnh' ),
        'store_name' => __( 'Tên cửa hàng' ),
        'content' => __( 'Địa chỉ' ),
        'url' => __( 'URL' ),
    );

    return $columns;
}

add_action( 'manage_stores_posts_custom_column', 'smashing_stores_column', 10, 2);
function smashing_stores_column( $column, $post_id ) {
    // Image column
    if ( 'content' === $column ) {
        echo get_the_content(null, false, $post_id);
    }
    else if ( 'url' === $column ) {
        echo get_post_meta($post_id, 'url', true);
    }
    else if ( 'image' === $column ) {
        echo get_the_post_thumbnail( $post_id, array(80, 80) );
    }
    else if ( 'store_name' === $column ) {
        echo get_the_title($post_id);
    }
}


add_filter( 'manage_contacts_posts_columns', 'set_custom_edit_contacts_columns' );
function set_custom_edit_contacts_columns($columns) {
    $columns = array(
        'cb' => $columns['cb'],
        'name' => __( 'Họ tên' ),
        'phone' => __( 'Số điện thoại' ),
        'email' => __( 'Email' ),
        'content' => __( 'Nội dung câu hỏi' ),
    );

    return $columns;
}

add_action( 'manage_contacts_posts_custom_column', 'smashing_contacts_column', 10, 2);
function smashing_contacts_column( $column, $post_id ) {
    // Image column
    if ( 'content' === $column ) {
        echo get_the_content(null, false, $post_id);
    }
    else if ( 'name' === $column ) {
        echo get_post_meta($post_id, 'name', true);
    }
    else if ( 'phone' === $column ) {
        echo get_post_meta($post_id, 'phone', true);
    }
    else if ( 'email' === $column ) {
        echo get_the_title($post_id);
    }
}

add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){
	unset( $menu_links['downloads'] ); // remove downloads
	return $menu_links;
}

add_action( 'woocommerce_after_shop_loop_item_title', 'remove_review_star', 4 );
function remove_review_star(){
    global $product;

    if( ! ( $product->get_review_count() > 0 ) ) {
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    }

}
add_filter( 'woocommerce_short_description', 'filter_woocommerce_short_description', 10, 1 );
function filter_woocommerce_short_description( $post_excerpt ) {
    if(!$post_excerpt){
        $post_excerpt = '<div class="woocommerce-product-details__short-description"><p></p></div>';

    }


    return $post_excerpt;
}