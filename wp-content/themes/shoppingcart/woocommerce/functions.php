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
    $value = get_post_meta( $post->ID, 'landing_page',  true );
    $files = scandir(get_template_directory().'/p_detail_landing');
    ?>
    <p>
        <label for="landing_page">Landing Page : </label>
        <select name='landing_page' id='landing_page'>
            <option value=''>Chọn</option>
            <?php foreach ($files as $file):?>
            <?php if (!is_dir($file)): ?>
            <option value='<?php echo $file?>'<?php echo $file === $value ? " selected='selected'" : "";?>><?php echo $file?></option>
            <?php endif;?>
            <?php endforeach;?>
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