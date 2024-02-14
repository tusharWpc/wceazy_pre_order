
function wceazy_product_sticky_bar_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_product_sticky_bar").show();

    wceazy_product_sticky_bar_init_select2();
    wceazy_product_sticky_bar_tab_init();
}


function wceazy_product_sticky_bar_init_select2(){
    var wceazy_product_sticky_bar_show_in = jQuery('.wceazy_product_sticky_bar_show_in select')
    var wceazy_product_sticky_bar_disabled_products = jQuery('.wceazy_product_sticky_bar_disabled_products select')
    var wceazy_product_sticky_bar_product_image_shape = jQuery('.wceazy_product_sticky_bar_product_image_shape select')

    if (wceazy_product_sticky_bar_show_in.data('select2')) { wceazy_product_sticky_bar_show_in.select2('destroy');}
    if (wceazy_product_sticky_bar_disabled_products.data('select2')) { wceazy_product_sticky_bar_disabled_products.select2('destroy');}
    if (wceazy_product_sticky_bar_product_image_shape.data('select2')) { wceazy_product_sticky_bar_product_image_shape.select2('destroy');}

    wceazy_product_sticky_bar_show_in.select2();
    wceazy_product_sticky_bar_disabled_products.select2();
    wceazy_product_sticky_bar_product_image_shape.select2();
}


function wceazy_product_sticky_bar_tab_init(){
    jQuery(".wceazy_product_sticky_bar_container .coupon_tab_body").hide();
    jQuery(".wceazy_product_sticky_bar_container .coupon_tab_body[data-id='tab_settings']").show();
    jQuery(".wceazy_product_sticky_bar_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_product_sticky_bar_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_product_sticky_bar_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_product_sticky_bar_container .coupon_tab_body").hide();
        jQuery(".wceazy_product_sticky_bar_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}



function wceazy_product_sticky_bar_save() {
    jQuery('.wceazy_product_sticky_bar_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_product_sticky_bar_bottom_button_section button').prop('disabled', true);
    let jQuerypostData = {
        'is_enable': jQuery(".wceazy_product_sticky_bar_is_enable input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_on_desktop': jQuery(".wceazy_product_sticky_bar_show_on_desktop input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_on_mobile': jQuery(".wceazy_product_sticky_bar_show_on_mobile input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_in': jQuery(".wceazy_product_sticky_bar_show_in select").val(),
        'show_only_scroll': jQuery(".wceazy_product_sticky_bar_show_only_scroll input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'scroll_pixels': jQuery(".wceazy_product_sticky_bar_scroll_pixels input").val(),
        'product_review': jQuery(".wceazy_product_sticky_bar_product_review input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'product_review_count': jQuery(".wceazy_product_sticky_bar_product_review_count input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        /*'disabled_products': jQuery(".wceazy_product_sticky_bar_disabled_products select").val().join(","),*/
        'enable_qty_input': jQuery(".wceazy_product_sticky_bar_enable_qty_input input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_variable_product': jQuery(".wceazy_product_sticky_bar_enable_variable_product input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_product_image': jQuery(".wceazy_product_sticky_bar_show_product_image input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_stock': jQuery(".wceazy_product_sticky_bar_show_stock input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'hidebar_outofstock': jQuery(".wceazy_product_sticky_bar_hidebar_outofstock input[type='checkbox']:checked").length > 0 ? "yes" : "no",

        'height': jQuery(".wceazy_product_sticky_bar_height input").val(),
        'product_image_shape': jQuery(".wceazy_product_sticky_bar_product_image_shape select").val(),
        /*'product_title_color': jQuery(".wceazy_product_sticky_bar_product_title_color input").val(),
        'product_rating_color': jQuery(".wceazy_product_sticky_bar_product_rating_color input").val(),
        'product_rating_count_color': jQuery(".wceazy_product_sticky_bar_product_rating_count_color input").val(),
        'product_price_color': jQuery(".wceazy_product_sticky_bar_product_price_color input").val(),*/
        'product_price_font_size': jQuery(".wceazy_product_sticky_bar_product_price_font_size input").val(),
        /*'btn_bg_color': jQuery(".wceazy_product_sticky_bar_btn_bg_color input").val(),
        'btn_font_color': jQuery(".wceazy_product_sticky_bar_btn_font_color input").val(),*/
        'btn_font_size': jQuery(".wceazy_product_sticky_bar_btn_font_size input").val(),
        /*'btn_border_color': jQuery(".wceazy_product_sticky_bar_btn_border_color input").val(),*/
        'btn_border_width': jQuery(".wceazy_product_sticky_bar_btn_border_width input").val(),
        /*'btn_bg_hover_color': jQuery(".wceazy_product_sticky_bar_btn_bg_hover_color input").val(),
        'btn_border_hover_color': jQuery(".wceazy_product_sticky_bar_btn_border_hover_color input").val(),
        'btn_font_hover_color': jQuery(".wceazy_product_sticky_bar_btn_font_hover_color input").val(),
        'btn_padding_left_right': jQuery(".wceazy_product_sticky_bar_btn_padding_left_right input").val(),
        'btn_padding_top_bottom': jQuery(".wceazy_product_sticky_bar_btn_padding_top_bottom input").val(),*/

    };

    let jQuerypost_data = {'action': 'wceazy_product_sticky_bar_save', 'data': jQuerypostData};

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                jQuery('.wceazy_product_sticky_bar_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_product_sticky_bar_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery('.wceazy_product_sticky_bar_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_product_sticky_bar_bottom_button_section button').prop('disabled', false);
            }
        }
    });
}


