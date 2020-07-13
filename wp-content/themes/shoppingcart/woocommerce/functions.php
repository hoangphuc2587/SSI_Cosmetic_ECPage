<?php
/**
 * Display all shoppingcart functions and definitions
 *
 * @package Theme Freesia
 * @subpackage ShoppingCart
 * @since ShoppingCart 1.0
 */

 /**
* Making the theme Woocommrece compatible
*/

add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

function my_meta_box_add() {
    add_meta_box( 'landing-page-product-id', 'Landing Page', 'my_meta_box', 'product', 'normal', 'low' );
}

add_action( 'add_meta_boxes', 'my_meta_box_add' );


function my_meta_box( $post ) {
    ?>
    <p>
        <label for="landing_page_product">Landing Page : </label>
        <select name='landing_page_product' id='landing_page_productt'>
            <option value="2.html">Page HTML 1</option>
            <option value="2.html">Page HTML 2</option>
        </select>
    </p>
    <?php
}

add_action('admin_head', 'hide_wooCommerce_activity_panel');

function hide_wooCommerce_activity_panel() {
    echo '<style>
    #woocommerce-activity-panel {
      display: none;
    }
  </style>';
}