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

if (!class_exists('FoW_Ajax')) {
    class FoW_Ajax {

        function __construct() {
            self::add_ajax_events();
        }

        public static function add_ajax_events() {
	        add_action( 'init', array(__CLASS__, 'update_district_ajax') );
	        add_action( 'init', array(__CLASS__, 'update_ward_ajax') );
        }


	    public static function update_district_ajax() {
		    if ( ! isset( $_GET['fsw-ajax'] ) || 'update_district' !== $_GET['fsw-ajax'] ) {
			    return;
		    }
		    if (isset($_POST['city_id'])) {
			    $city_id = sanitize_text_field($_POST['city_id']);
			    FoW_Ultility::show_districts_option_by_city_id($city_id);
		    }
		    die();
	    }

	    public static function update_ward_ajax() {
		    if ( ! isset( $_GET['fsw-ajax'] ) || 'update_ward' !== $_GET['fsw-ajax'] ) {
			    return;
		    }
		    if (isset($_POST['district_id'])) {
			    $district_id = sanitize_text_field($_POST['district_id']);
			    FoW_Ultility::show_wards_option_by_district_id($district_id);
		    }
		    die();
	    }
    }

    new FoW_Ajax();
}