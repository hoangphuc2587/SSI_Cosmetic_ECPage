<?php
/**
 * Copyright (c) VietFriend, Inc. and its affiliates. All Rights Reserved
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * @package FriendStore for WooCommerce
 */

defined('ABSPATH') || exit;

if (!function_exists('wcl10n__')) {
    function wcl10n__($string, $textdomain = '', $esc = false) {
        if($esc && in_array($esc, array('html','url', 'attr', 'js', 'textarea', 'sql'))) {
            $esc_function = "esc_{$esc}__";
            return $textdomain ? $esc_function($string, $textdomain) : $esc_function($string);
        } else {
            return $textdomain ? __($string, $textdomain) : __($string);
        }
    }
}
if (!function_exists('wcl10n_e')) {
    function wcl10n_e($string, $textdomain = '', $esc = false) {
        if($esc && in_array($esc, array('html','url', 'attr', 'js', 'textarea', 'sql'))) {
            $esc_function = "esc_{$esc}__";
            echo $textdomain ? $esc_function($string, $textdomain) : $esc_function($string);
        } else {
            echo $textdomain ? __($string, $textdomain) : __($string);
        }
    }
}
if (!function_exists('wcl10n_n')) {
    function wcl10n_n($single, $plural, $number, $textdomain = '') {
        return $textdomain ? _n($single, $plural, $number, $textdomain) : _n($single, $plural, $number);
    }
}

if (!function_exists('is_woocommerce_activated')) {
    function is_woocommerce_activated() {
        return in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins', array()))) ||
            (is_multisite() && array_key_exists('woocommerce/woocommerce.php', get_site_option('active_sitewide_plugins', array())));
    }
}

if (!function_exists('can_shipping_vietnam')) {
    function can_shipping_vietnam() {
        $countries = WC()->countries->get_shipping_countries();
        return is_woocommerce_activated() && isset($countries['VN']);
    }
}

if (!function_exists('is_shipping_vietnam')) {
    function is_shipping_vietnam() {
        $countries = WC()->countries->get_shipping_countries();
        return is_woocommerce_activated() && isset($countries['VN']);
    }
}

if (!function_exists('the_array_search')) {
    function the_array_search($find, $items) {
        foreach ($items as $key => $value) {
            $current_key = $key;
            if (
                $find === $value
                OR (
                    is_array($value)
                    && the_array_search($find, $value) !== false
                )
            ) {
                return $current_key;
            }
        }
        return false;
    }
}

if (!function_exists('convert_to_grams')) {
    function convert_to_grams($weight = 0, $reverse = false) {
        $weight = (float) $weight;
        $weight_unit = get_option('woocommerce_weight_unit');
        if ($weight_unit == 'kg') {
            return (boolean) $reverse ? $weight / 1000 : $weight * 1000;
        } else if ($weight_unit == 'lbs') {
            return (boolean) $reverse ? $weight / 453.59237 : $weight * 453.59237;
        } else if ($weight_unit == 'oz') {
            return (boolean) $reverse ? $weight / 28.3495231 : $weight * 28.3495231;
        }
        return $weight;
    }
}

if (!function_exists('get_parcel_data')) {
    /**
     * $density = m/V
     */
    function get_parcel_data($products, $density = '') {
        $parcel_data = array();
        $total_weight = 0;
        foreach ($products as $product) {
            $product_data = wc_get_product($product['product_id'])->get_data();
            $weight = $product_data['weight'];
            if ($product['quantity'] > 1 && $weight > 0) {
                $weight = $weight * $product['quantity'];
            }
            $total_weight += (float)$weight;
        }

        $dimensions = get_vfoption('dimensions_default', 'fsw_shipping', '25x20x8');
        $dimensions_agrs = explode('x', $dimensions);

        $parcel_data = array(
            "total_weight" => (int)convert_to_grams($total_weight),
            "box_length"   => floatval($dimensions_agrs[0]),
            "box_width"    => floatval($dimensions_agrs[1]),
            "box_height"   => floatval($dimensions_agrs[2]),
        );
        return $parcel_data;
    }
}


// get list track order status
if (!function_exists('track_order_status')) {
    function track_order_status($order_ID = 0) {
        $order_ID = (int) $order_ID;
        if ($order_ID == 0) return false;
        global $wpdb;

        $str = sprintf(wcl10n__('Order status changed from %1$s to %2$s.', 'woocommerce'), 'fsw', '123');
        $check = explode('fsw', $str);

        $notes = $wpdb->get_results("SELECT comment_ID, comment_content, comment_date FROM {$wpdb->prefix}comments 
                      WHERE comment_post_ID={$order_ID} AND comment_type='order_note' AND comment_content LIKE '%{$check[0]}%'
                      ORDER BY comment_ID DESC");

        return $notes;
    }
}