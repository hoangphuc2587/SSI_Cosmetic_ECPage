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
        var listInHCM = [1442, 1443 ,1444, 1446, 1447, 1452, 1457, 1462];       
        var listRoundHCM = [204 ,205, 211, 239];
        var city_id = parseInt(jQuery("#billing_state").val());
        var district_id = parseInt(jQuery("#billing_city").val());
        var fee_20_k = "20.000";
        var fee_30_k = "30.000";
        var fee_35_k = "35.000";        
        var total_order = parseInt(jQuery("#total_price").html().replaceAll(".",""));       
        setTimeout(
          function() 
          {
            //do something special
            if (city_id != ""){
                if (city_id == 202){
                    if (listInHCM.includes(district_id)){
                        jQuery("#fee_shipping").html(fee_20_k);
                        var total_order_ship = total_order + parseInt(fee_20_k.replaceAll(".",""));
                        jQuery("#total_price").html(number_format(total_order_ship , 0 , ',', '.'));
                        jQuery("#free_shipping").val(fee_20_k.replaceAll(".",""));
                    }else{
                        jQuery("#fee_shipping").html(fee_30_k);
                        var total_order_ship = total_order + parseInt(fee_30_k.replaceAll(".",""));
                        jQuery("#total_price").html(number_format(total_order_ship , 0 , ',', '.'));
                        jQuery("#free_shipping").val(fee_30_k.replaceAll(".",""));
                    }                
                }
                else if (listRoundHCM.includes(city_id)){
                    jQuery("#fee_shipping").html(fee_30_k);
                    var total_order_ship = total_order + parseInt(fee_30_k.replaceAll(".",""));
                    jQuery("#total_price").html(number_format(total_order_ship , 0 , ',', '.'));
                    jQuery("#free_shipping").val(fee_30_k.replaceAll(".",""));
                }
                else{
                    jQuery("#fee_shipping").html(fee_35_k);
                    var total_order_ship = total_order + parseInt(fee_35_k.replaceAll(".",""));
                    jQuery("#total_price").html(number_format(total_order_ship , 0 , ',', '.')); 
                    jQuery("#free_shipping").val(fee_35_k.replaceAll(".",""));
                }    
            }    
          }, 2000);

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
                var city_id = parseInt(jQuery(this).val());
                xhr_fsw = jQuery.ajax({
                    type: 'POST',
                    url: '?fsw-ajax=update_district',
                    data: {
                        city_id: city_id,
                    },
                }).done(function (result) {                    
                    parent.find('.__fsw_district').html(result).select2('close'); 
                    jQuery("#fee_shipping").html(0);
                    jQuery("#total_price").html(number_format(total_order , 0 , ',', '.'));
                    if (city_id != 202){
                        if (listRoundHCM.includes(city_id)){
                            jQuery("#fee_shipping").html(fee_30_k);
                            var total_order_ship = total_order + parseInt(fee_30_k.replaceAll(".",""));
                            jQuery("#total_price").html(number_format(total_order_ship , 0 , ',', '.'));
                            jQuery("#free_shipping").val(fee_30_k.replaceAll(".",""));
                        }
                        else{
                            jQuery("#fee_shipping").html(fee_35_k);
                            var total_order_ship = total_order + parseInt(fee_35_k.replaceAll(".",""));
                            jQuery("#total_price").html(number_format(total_order_ship , 0 , ',', '.'));
                            jQuery("#free_shipping").val(fee_35_k.replaceAll(".",""));
                        }
                    }
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
                var city_id = parseInt(jQuery("#billing_state").val());
                var district_id = parseInt(jQuery(this).val());
                xhr_fsw = jQuery.ajax({
                    type: 'POST',
                    url: '?fsw-ajax=update_ward',
                    data: {
                        district_id: jQuery(this).val(),
                    }
                }).done(function (result) {                    
                    if (city_id == 202){
                        if (listInHCM.includes(district_id)){
                            jQuery("#fee_shipping").html(fee_20_k);
                            var total_order_ship = total_order + parseInt(fee_20_k.replace(".",""));
                            jQuery("#total_price").html(number_format(total_order_ship , 0 , ',', '.'));
                            jQuery("#free_shipping").val(fee_20_k.replace(".",""));

                        }
                        else{
                            jQuery("#fee_shipping").html(fee_30_k);
                            var total_order_ship = total_order + parseInt(fee_30_k.replace(".",""));
                            jQuery("#total_price").html(number_format(total_order_ship , 0 , ',', '.'));
                            jQuery("#free_shipping").val(fee_30_k.replace(".",""));
                        }     
                    }                       
                    parent.find('.__fsw_ward').html(result).select2('close');
                });
            } else {
                console.log('Cannot get parent element!')
            }
        });
    }
});


function number_format (number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}