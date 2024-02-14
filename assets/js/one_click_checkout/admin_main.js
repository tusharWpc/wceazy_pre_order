
function wceazy_one_click_checkout_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_one_click_checkout").show();

    wceazy_one_click_checkout_init_select2();
    wceazy_one_click_checkout_tab_init();
    wceazy_one_click_checkout_selection_changed();
}


function wceazy_one_click_checkout_init_select2(){
    var wceazy_one_click_checkout_redirect_to_page = jQuery('.wceazy_one_click_checkout_redirect_to_page select')
    var wceazy_one_click_checkout_buy_btn_redirect_on_product = jQuery('.wceazy_one_click_checkout_buy_btn_redirect_on_product select')
    var wceazy_one_click_checkout_buy_btn_position_on_product = jQuery('.wceazy_one_click_checkout_buy_btn_position_on_product select')
    var wceazy_one_click_checkout_buy_btn_redirect_on_product_archive = jQuery('.wceazy_one_click_checkout_buy_btn_redirect_on_product_archive select')
    var wceazy_one_click_checkout_buy_btn_position_on_product_archive = jQuery('.wceazy_one_click_checkout_buy_btn_position_on_product_archive select')
    var wceazy_one_click_checkout_remove_billing_fields = jQuery('.wceazy_one_click_checkout_remove_billing_fields select')
    var wceazy_one_click_checkout_remove_shipping_fields = jQuery('.wceazy_one_click_checkout_remove_shipping_fields select')

    if (wceazy_one_click_checkout_redirect_to_page.data('select2')) { wceazy_one_click_checkout_redirect_to_page.select2('destroy');}
    if (wceazy_one_click_checkout_buy_btn_redirect_on_product.data('select2')) { wceazy_one_click_checkout_buy_btn_redirect_on_product.select2('destroy');}
    if (wceazy_one_click_checkout_buy_btn_position_on_product.data('select2')) { wceazy_one_click_checkout_buy_btn_position_on_product.select2('destroy');}
    if (wceazy_one_click_checkout_buy_btn_redirect_on_product_archive.data('select2')) { wceazy_one_click_checkout_buy_btn_redirect_on_product_archive.select2('destroy');}
    if (wceazy_one_click_checkout_buy_btn_position_on_product_archive.data('select2')) { wceazy_one_click_checkout_buy_btn_position_on_product_archive.select2('destroy');}
    if (wceazy_one_click_checkout_remove_billing_fields.data('select2')) { wceazy_one_click_checkout_remove_billing_fields.select2('destroy');}
    if (wceazy_one_click_checkout_remove_shipping_fields.data('select2')) { wceazy_one_click_checkout_remove_shipping_fields.select2('destroy');}

    wceazy_one_click_checkout_redirect_to_page.select2();
    wceazy_one_click_checkout_buy_btn_redirect_on_product.select2();
    wceazy_one_click_checkout_buy_btn_position_on_product.select2();
    wceazy_one_click_checkout_buy_btn_redirect_on_product_archive.select2();
    wceazy_one_click_checkout_buy_btn_position_on_product_archive.select2();
    wceazy_one_click_checkout_remove_billing_fields.select2();
    wceazy_one_click_checkout_remove_shipping_fields.select2();
}


function wceazy_one_click_checkout_tab_init(){
    jQuery(".wceazy_one_click_checkout_container .coupon_tab_body").hide();
    jQuery(".wceazy_one_click_checkout_container .coupon_tab_body[data-id='tab_general']").show();
    jQuery(".wceazy_one_click_checkout_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_one_click_checkout_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_one_click_checkout_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_one_click_checkout_container .coupon_tab_body").hide();
        jQuery(".wceazy_one_click_checkout_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}


function wceazy_one_click_checkout_selection_changed(){
    if(jQuery(".wceazy_one_click_checkout_enable_redirect_to_cart input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_one_click_checkout_enable_custom_url").show()
        if(jQuery(".wceazy_one_click_checkout_enable_custom_url input[type='checkbox']:checked").length > 0){
            jQuery(".wceazy_one_click_checkout_redirect_to_page").hide()
            jQuery(".wceazy_one_click_checkout_redirect_to_custom_url").show()
        }else{
            jQuery(".wceazy_one_click_checkout_redirect_to_page").show()
            jQuery(".wceazy_one_click_checkout_redirect_to_custom_url").hide()
        }
    }else{
        jQuery(".wceazy_one_click_checkout_enable_custom_url").hide()
        jQuery(".wceazy_one_click_checkout_redirect_to_page").hide()
        jQuery(".wceazy_one_click_checkout_redirect_to_custom_url").hide()
    }



    if(jQuery(".wceazy_one_click_checkout_change_add_to_cart_button_text input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_one_click_checkout_cart_button_text").show()
        jQuery(".wceazy_one_click_checkout_select_options_button_text").show()
        jQuery(".wceazy_one_click_checkout_read_more_button_text").show()
    }else{
        jQuery(".wceazy_one_click_checkout_cart_button_text").hide()
        jQuery(".wceazy_one_click_checkout_select_options_button_text").hide()
        jQuery(".wceazy_one_click_checkout_read_more_button_text").hide()
    }


    if(jQuery(".wceazy_one_click_checkout_enable_buy_now_button_on_product input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_one_click_checkout_buy_btn_label_on_product").show()
        jQuery(".wceazy_one_click_checkout_buy_btn_redirect_on_product").show()
        jQuery(".wceazy_one_click_checkout_buy_btn_position_on_product").show()
        jQuery(".wceazy_one_click_checkout_buy_btn_size_on_product").show()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mt").show()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mb").show()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_ml").show()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mr").show()
    }else{
        jQuery(".wceazy_one_click_checkout_buy_btn_label_on_product").hide()
        jQuery(".wceazy_one_click_checkout_buy_btn_redirect_on_product").hide()
        jQuery(".wceazy_one_click_checkout_buy_btn_position_on_product").hide()
        jQuery(".wceazy_one_click_checkout_buy_btn_size_on_product").hide()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mt").hide()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mb").hide()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_ml").hide()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mr").hide()
    }


    if(jQuery(".wceazy_one_click_checkout_enable_buy_now_button_on_product_archive input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_one_click_checkout_buy_btn_label_on_product_archive").show()
        jQuery(".wceazy_one_click_checkout_buy_btn_redirect_on_product_archive").show()
        jQuery(".wceazy_one_click_checkout_buy_btn_position_on_product_archive").show()
        jQuery(".wceazy_one_click_checkout_buy_btn_size_on_product_archive").show()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mt").show()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mb").show()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_ml").show()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mr").show()
    }else{
        jQuery(".wceazy_one_click_checkout_buy_btn_label_on_product_archive").hide()
        jQuery(".wceazy_one_click_checkout_buy_btn_redirect_on_product_archive").hide()
        jQuery(".wceazy_one_click_checkout_buy_btn_position_on_product_archive").hide()
        jQuery(".wceazy_one_click_checkout_buy_btn_size_on_product_archive").hide()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mt").hide()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mb").hide()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_ml").hide()
        jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mr").hide()
    }
}


function wceazy_one_click_checkout_save() {
    jQuery('.wceazy_one_click_checkout_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_one_click_checkout_bottom_button_section button').prop('disabled', true);
    let jQuerypostData = {

        'disable_cart': jQuery(".wceazy_one_click_checkout_disable_cart input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_single_page': jQuery(".wceazy_one_click_checkout_enable_single_page input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_redirect_to_cart': jQuery(".wceazy_one_click_checkout_enable_redirect_to_cart input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_custom_url': jQuery(".wceazy_one_click_checkout_enable_custom_url input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'redirect_to_page': jQuery(".wceazy_one_click_checkout_redirect_to_page select").val(),
        'redirect_to_custom_url': jQuery(".wceazy_one_click_checkout_redirect_to_custom_url input").val(),
        'disable_continue_shopping_button': jQuery(".wceazy_one_click_checkout_disable_continue_shopping_button input[type='checkbox']:checked").length > 0 ? "yes" : "no",

        /*'enable_product_ajax_to_cart': jQuery(".wceazy_one_click_checkout_enable_product_ajax_to_cart input[type='checkbox']:checked").length > 0 ? "yes" : "no",*/
        'change_add_to_cart_button_text': jQuery(".wceazy_one_click_checkout_change_add_to_cart_button_text input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'cart_button_text': jQuery(".wceazy_one_click_checkout_cart_button_text input").val(),
        'select_options_button_text': jQuery(".wceazy_one_click_checkout_select_options_button_text input").val(),
        'read_more_button_text': jQuery(".wceazy_one_click_checkout_read_more_button_text input").val(),

        'enable_buy_now_button_on_product': jQuery(".wceazy_one_click_checkout_enable_buy_now_button_on_product input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        /*'buy_btn_label_on_product': jQuery(".wceazy_one_click_checkout_buy_btn_label_on_product input").val(),
        'buy_btn_redirect_on_product': jQuery(".wceazy_one_click_checkout_buy_btn_redirect_on_product select").val(),
        'buy_btn_position_on_product': jQuery(".wceazy_one_click_checkout_buy_btn_position_on_product select").val(),*/
        'buy_btn_size_on_product': jQuery(".wceazy_one_click_checkout_buy_btn_size_on_product input").val(),
        'buy_now_btn_product_mt': jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mt input").val(),
        'buy_now_btn_product_mb': jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mb input").val(),
        'buy_now_btn_product_ml': jQuery(".wceazy_one_click_checkout_buy_now_btn_product_ml input").val(),
        'buy_now_btn_product_mr': jQuery(".wceazy_one_click_checkout_buy_now_btn_product_mr input").val(),

        'enable_buy_now_button_on_product_archive': jQuery(".wceazy_one_click_checkout_enable_buy_now_button_on_product_archive input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        /*'buy_btn_label_on_product_archive': jQuery(".wceazy_one_click_checkout_buy_btn_label_on_product_archive input").val(),
        'buy_btn_redirect_on_product_archive': jQuery(".wceazy_one_click_checkout_buy_btn_redirect_on_product_archive select").val(),
        'buy_btn_position_on_product_archive': jQuery(".wceazy_one_click_checkout_buy_btn_position_on_product_archive select").val(),*/
        'buy_btn_size_on_product_archive': jQuery(".wceazy_one_click_checkout_buy_btn_size_on_product_archive input").val(),
        'buy_now_btn_product_archive_mt': jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mt input").val(),
        'buy_now_btn_product_archive_mb': jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mb input").val(),
        'buy_now_btn_product_archive_ml': jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_ml input").val(),
        'buy_now_btn_product_archive_mr': jQuery(".wceazy_one_click_checkout_buy_now_btn_product_archive_mr input").val(),

        'buy_now_btn_color': jQuery(".wceazy_one_click_checkout_buy_now_btn_color input").val(),
        'buy_now_btn_bg_color': jQuery(".wceazy_one_click_checkout_buy_now_btn_bg_color input").val(),
        /*'buy_now_btn_hover_color': jQuery(".wceazy_one_click_checkout_buy_now_btn_hover_color input").val(),
        'buy_now_btn_hover_bg_color': jQuery(".wceazy_one_click_checkout_buy_now_btn_hover_bg_color input").val(),
        'buy_now_btn_ptpb': jQuery(".wceazy_one_click_checkout_buy_now_btn_ptpb input").val(),
        'buy_now_btn_plpr': jQuery(".wceazy_one_click_checkout_buy_now_btn_plpr input").val(),
        'buy_now_btn_border_radius': jQuery(".wceazy_one_click_checkout_buy_now_btn_border_radius input").val(),*/

        'remove_order_comment': jQuery(".wceazy_one_click_checkout_remove_order_comment input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'remove_coupon_form': jQuery(".wceazy_one_click_checkout_remove_coupon_form input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        /*'remove_policy_text': jQuery(".wceazy_one_click_checkout_remove_policy_text input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'remove_terms_condition': jQuery(".wceazy_one_click_checkout_remove_terms_condition input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'remove_billing_fields': jQuery(".wceazy_one_click_checkout_remove_billing_fields select").val().join(","),
        'remove_shipping_fields': jQuery(".wceazy_one_click_checkout_remove_shipping_fields select").val().join(","),*/


    };



    let jQuerypost_data = {'action': 'wceazy_one_click_checkout_save', 'data': jQuerypostData};

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                jQuery('.wceazy_one_click_checkout_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_one_click_checkout_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery('.wceazy_one_click_checkout_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_one_click_checkout_bottom_button_section button').prop('disabled', false);
            }
        }
    });
}


