
function wceazy_frequently_bought_init(host) {
    wceazy_hide_all()
    jQuery("#wceazy_frequently_bought").show();

    wceazy_frequently_bought_tab_init();
}

function wceazy_frequently_bought_copy_shortcode() {
    'use strict';

    var temp = jQuery("<input>");
    jQuery("body").append(temp);
    temp.val(jQuery(".wceazy_frequently_bought_copy_shortcode").text()).select();
    document.execCommand("copy");
    temp.remove();
    alert("Shortcode Copied to Clipboard")
}


function wceazy_frequently_bought_tab_init() {
    jQuery(".wceazy_frequently_bought_container .coupon_tab_body").hide();
    jQuery(".wceazy_frequently_bought_container .coupon_tab_body[data-id='tab_general']").show();
    jQuery(".wceazy_frequently_bought_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_frequently_bought_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_frequently_bought_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_frequently_bought_container .coupon_tab_body").hide();
        jQuery(".wceazy_frequently_bought_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}



function wceazy_frequently_bought_save() {
    jQuery('.wceazy_frequently_bought_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_frequently_bought_bottom_button_section button').prop('disabled', true);
    let jQuerypostData = {

        'show_search_filter': jQuery(".wceazy_frequently_bought_show_search_filter input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_price_filter': jQuery(".wceazy_frequently_bought_show_price_filter input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_frequently_bought': jQuery(".wceazy_frequently_bought_show_frequently_bought input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_category_filter': jQuery(".wceazy_frequently_bought_show_category_filter input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_stock_filter': jQuery(".wceazy_frequently_bought_show_stock_filter input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'sidebar_position': jQuery(".wceazy_frequently_bought_sidebar_position select").val(),

        'product_per_page': jQuery(".wceazy_frequently_bought_product_per_page input").val(),
        'add_to_cart_btn_text': jQuery(".wceazy_frequently_bought_add_to_cart_btn_text input").val(),
        'select_options_btn_text': jQuery(".wceazy_frequently_bought_select_options_btn_text input").val(),
        'stock_out_btn_text': jQuery(".wceazy_frequently_bought_stock_out_btn_text input").val(),
        'prev_btn_text': jQuery(".wceazy_frequently_bought_prev_btn_text input").val(),
        'next_btn_text': jQuery(".wceazy_frequently_bought_next_btn_text input").val(),

        'search_filter_label_text': jQuery(".wceazy_frequently_bought_search_filter_label_text input").val(),
        'search_filter_placeholder_text': jQuery(".wceazy_frequently_bought_search_filter_placeholder_text input").val(),

        'price_filter_label_text': jQuery(".wceazy_frequently_bought_price_filter_label_text input").val(),
        'price_filter_min_placeholder_text': jQuery(".wceazy_frequently_bought_price_filter_min_placeholder_text input").val(),
        'price_filter_max_placeholder_text': jQuery(".wceazy_frequently_bought_price_filter_max_placeholder_text input").val(),

        'frequently_bought_label_text': jQuery(".wceazy_frequently_bought_frequently_bought_label_text input").val(),
        'frequently_bought_and_up_text': jQuery(".wceazy_frequently_bought_frequently_bought_and_up_text input").val(),
        'frequently_bought_show_5_star_rating': jQuery(".wceazy_frequently_bought_frequently_bought_show_5_star_rating input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'frequently_bought_show_4_star_rating': jQuery(".wceazy_frequently_bought_frequently_bought_show_4_star_rating input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'frequently_bought_show_3_star_rating': jQuery(".wceazy_frequently_bought_frequently_bought_show_3_star_rating input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'frequently_bought_show_2_star_rating': jQuery(".wceazy_frequently_bought_frequently_bought_show_2_star_rating input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'frequently_bought_show_1_star_rating': jQuery(".wceazy_frequently_bought_frequently_bought_show_1_star_rating input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'frequently_bought_show_0_star_rating': jQuery(".wceazy_frequently_bought_frequently_bought_show_0_star_rating input[type='checkbox']:checked").length > 0 ? "yes" : "no",

        'category_filter_label_text': jQuery(".wceazy_frequently_bought_category_filter_label_text input").val(),

        'stock_filter_label_text': jQuery(".wceazy_frequently_bought_stock_filter_label_text input").val(),
        'stock_filter_in_stock_text': jQuery(".wceazy_frequently_bought_stock_filter_in_stock_text input").val(),
        'stock_filter_out_stock_text': jQuery(".wceazy_frequently_bought_stock_filter_out_stock_text input").val(),


    };



    let jQuerypost_data = { 'action': 'wceazy_frequently_bought_save', 'data': jQuerypostData };

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                jQuery('.wceazy_frequently_bought_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_frequently_bought_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery('.wceazy_frequently_bought_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_frequently_bought_bottom_button_section button').prop('disabled', false);
            }
        }
    });
}


