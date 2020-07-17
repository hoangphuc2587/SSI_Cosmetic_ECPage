jQuery(document).ready(function ($) {
    var xhr_fsw = null;

    try {
        jQuery(".__fsw_city, .__fsw_district, .__fsw_ward").select2({
            language: {
                noResults: function () {
                    return fsw.l10n.no_results;
                },
            },
            escapeMarkup: function (markup) {
                return markup;
            }
        });

        jQuery(document).on('updated_wc_div', function () {
            jQuery(".__fsw_city, .__fsw_district, .__fsw_ward").select2({
                language: {
                    noResults: function () {
                        return fsw.l10n.no_results;
                    },
                },
                escapeMarkup: function (markup) {
                    return markup;
                }
            });
        });
    } catch (e) {
        console.log('Select2 library not loading');
    }

    if (jQuery('.__fsw_city').length > 0) {
        jQuery(document).on('change', '.__fsw_city', function () {

            // Checkout page
            var parent = jQuery(this).closest('.woocommerce-billing-fields');

            if (parent.length === 0) {
                parent = jQuery(this).closest('.woocommerce-shipping-fields');
            }

            // My Account Addresses
            if (parent.length === 0) {
                parent = jQuery(this).closest('.field-wrapper');
            }

            if (parent.length === 0) {
                parent = jQuery(this).closest('.woocommerce-address-fields');
            }

            if (parent.length === 0) {
                parent = jQuery(this).closest('.woocommerce');
            }

            if (parent.length) {
                parent.find('.__fsw_district').html('<option>' + fsw.l10n.loading + '</option>');
                parent.find('.__fsw_ward').html('<option>' + fsw.l10n.loading + '</option>').attr('disabled', 'disabled');

                if (xhr_fsw && xhr_fsw.readyState != 4) {
                    xhr_fsw.abort();
                }
                xhr_fsw = jQuery.ajax({
                    type: 'POST',
                    url: '?fsw-ajax=update_district',
                    data: {
                        city_id: jQuery(this).val(),
                    },
                }).done(function (result) {
                    parent.find('.__fsw_district').html(result).select2('close');
                });
            } else {
                console.log('Cannot get parent element!')
            }
        });
    }

    if (jQuery('.__fsw_district').length > 0) {
        jQuery(document).on('change', '.__fsw_district', function () {

            // Checkout page
            var parent = jQuery(this).closest('.woocommerce-billing-fields');

            if (parent.length === 0) {
                parent = jQuery(this).closest('.woocommerce-shipping-fields');
            }

            // My Account Addresses
            if (parent.length === 0) {
                parent = jQuery(this).closest('.field-wrapper');
            }

            if (parent.length === 0) {
                parent = jQuery(this).closest('.woocommerce-address-fields');
            }

            if (parent.length === 0) {
                parent = jQuery(this).closest('.woocommerce');
            }

            if (parent.length) {
                parent.find('.__fsw_ward').removeAttr('disabled').html('<option>' + fsw.l10n.loading + '</option>');

                if (xhr_fsw && xhr_fsw.readyState != 4) {
                    xhr_fsw.abort();
                }
                xhr_fsw = jQuery.ajax({
                    type: 'POST',
                    url: '?fsw-ajax=update_ward',
                    data: {
                        district_id: jQuery(this).val(),
                    }
                }).done(function (result) {
                    parent.find('.__fsw_ward').html(result).select2('close');
                });
            } else {
                console.log('Cannot get parent element!')
            }
        });
    }
});