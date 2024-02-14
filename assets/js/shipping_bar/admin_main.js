
function wceazy_shipping_bar_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_shipping_bar").show();

    wceazy_shipping_bar_init_select2();
    wceazy_shipping_bar_init_icon_field(host);
    wceazy_shipping_bar_tab_init();
    wceazy_shipping_bar_selection_changed();
}


function wceazy_shipping_bar_init_select2(){
    var wceazy_shipping_bar_shipping_zone = jQuery('.wceazy_shipping_bar_shipping_zone select')
    var wceazy_shipping_bar_dont_show_pages = jQuery('.wceazy_shipping_bar_dont_show_pages select')
    var wceazy_shipping_bar_exclude_products = jQuery('.wceazy_shipping_bar_exclude_products select')
    var wceazy_shipping_bar_position_cart_subtotal = jQuery('.wceazy_shipping_bar_position_cart_subtotal select')
    var wceazy_shipping_bar_position_checkout_subtotal = jQuery('.wceazy_shipping_bar_position_checkout_subtotal select')
    var wceazy_shipping_bar_position = jQuery('.wceazy_shipping_bar_position select')
    var wceazy_shipping_bar_msg_text_align = jQuery('.wceazy_shipping_bar_msg_text_align select')

    if (wceazy_shipping_bar_shipping_zone.data('select2')) { wceazy_shipping_bar_shipping_zone.select2('destroy');}
    if (wceazy_shipping_bar_dont_show_pages.data('select2')) { wceazy_shipping_bar_dont_show_pages.select2('destroy');}
    if (wceazy_shipping_bar_exclude_products.data('select2')) { wceazy_shipping_bar_exclude_products.select2('destroy');}
    if (wceazy_shipping_bar_position_cart_subtotal.data('select2')) { wceazy_shipping_bar_position_cart_subtotal.select2('destroy');}
    if (wceazy_shipping_bar_position_checkout_subtotal.data('select2')) { wceazy_shipping_bar_position_checkout_subtotal.select2('destroy');}
    if (wceazy_shipping_bar_position.data('select2')) { wceazy_shipping_bar_position.select2('destroy');}
    if (wceazy_shipping_bar_msg_text_align.data('select2')) { wceazy_shipping_bar_msg_text_align.select2('destroy');}

    wceazy_shipping_bar_shipping_zone.select2();
    wceazy_shipping_bar_dont_show_pages.select2();
    wceazy_shipping_bar_exclude_products.select2();
    wceazy_shipping_bar_position_cart_subtotal.select2();
    wceazy_shipping_bar_position_checkout_subtotal.select2();
    wceazy_shipping_bar_position.select2();
    wceazy_shipping_bar_msg_text_align.select2();
}


function wceazy_shipping_bar_selection_changed(){
    if(jQuery(".wceazy_shipping_bar_allow_disappear_time input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_shipping_bar_disappear_time").show()
    }else{
        jQuery(".wceazy_shipping_bar_disappear_time").hide()
    }
}

function wceazy_shipping_bar_layout_auto_fill(){
    var layout_value = jQuery(".wceazy_shipping_bar_layout select").val()
    if(layout_value == "1"){
        jQuery(".wceazy_shipping_bar_bg input").val("#0A9663")
        jQuery(".wceazy_shipping_bar_padding_top input").val("10")
        jQuery(".wceazy_shipping_bar_padding_bottom input").val("10")
        jQuery(".wceazy_shipping_bar_padding_left_right input").val("120")
        jQuery(".wceazy_shipping_bar_msg_text_color input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_msg_link_text_color input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_msg_font_size input").val("16")
        jQuery(".wceazy_shipping_bar_msg_text_align select").val("center")
        jQuery(".wceazy_shipping_bar_remove_icon_color input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_remove_icon_size input").val("16")
        jQuery(".wceazy_shipping_bar_progress_margin_top input").val("5")
        jQuery(".wceazy_shipping_bar_progress_bar_bg input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_progress_color input").val("#000000")
        jQuery(".wceazy_shipping_bar_progress_text_color input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_progress_font_size input").val("15")
        jQuery(".wceazy_shipping_bar_progress_border_radius input").val("20")
    }else if(layout_value == "2"){
        jQuery(".wceazy_shipping_bar_bg input").val("#580A96")
        jQuery(".wceazy_shipping_bar_padding_top input").val("10")
        jQuery(".wceazy_shipping_bar_padding_bottom input").val("0")
        jQuery(".wceazy_shipping_bar_padding_left_right input").val("0")
        jQuery(".wceazy_shipping_bar_msg_text_color input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_msg_link_text_color input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_msg_font_size input").val("16")
        jQuery(".wceazy_shipping_bar_msg_text_align select").val("center")
        jQuery(".wceazy_shipping_bar_remove_icon_color input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_remove_icon_size input").val("16")
        jQuery(".wceazy_shipping_bar_progress_margin_top input").val("10")
        jQuery(".wceazy_shipping_bar_progress_bar_bg input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_progress_color input").val("#000000")
        jQuery(".wceazy_shipping_bar_progress_text_color input").val("#ffffff")
        jQuery(".wceazy_shipping_bar_progress_font_size input").val("15")
        jQuery(".wceazy_shipping_bar_progress_border_radius input").val("0")
    }

}


function wceazy_shipping_bar_init_icon_field(host){
    var wceazy_shipping_bar_remove_icon = jQuery('.wceazy_shipping_bar_remove_icon')



    jQuery(wceazy_shipping_bar_remove_icon).find(".icon_field_item").unbind("click");
    jQuery(wceazy_shipping_bar_remove_icon).find(".icon_field_item").bind("click", function () {
        jQuery(wceazy_shipping_bar_remove_icon).find(".icon_field_item").removeClass('active');
        jQuery(this).addClass('active');
    });


    jQuery(wceazy_shipping_bar_remove_icon).find(".icon_1").css("background", "transparent url("+host+"assets/img/modules/shipping_bar/delete_icon_1.svg) no-repeat center center / 16px")
    jQuery(wceazy_shipping_bar_remove_icon).find(".icon_2").css("background", "transparent url("+host+"assets/img/modules/shipping_bar/delete_icon_2.svg) no-repeat center center / 16px")
    jQuery(wceazy_shipping_bar_remove_icon).find(".icon_3").css("background", "transparent url("+host+"assets/img/modules/shipping_bar/delete_icon_3.svg) no-repeat center center / 16px")
    jQuery(wceazy_shipping_bar_remove_icon).find(".icon_4").css("background", "transparent url("+host+"assets/img/modules/shipping_bar/delete_icon_4.svg) no-repeat center center / 16px")
    jQuery(wceazy_shipping_bar_remove_icon).find(".icon_5").css("background", "transparent url("+host+"assets/img/modules/shipping_bar/delete_icon_5.svg) no-repeat center center / 16px")



}


function wceazy_shipping_bar_tab_init(){
    jQuery(".wceazy_shipping_bar_container .coupon_tab_body").hide();
    jQuery(".wceazy_shipping_bar_container .coupon_tab_body[data-id='tab_general']").show();
    jQuery(".wceazy_shipping_bar_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_shipping_bar_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_shipping_bar_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_shipping_bar_container .coupon_tab_body").hide();
        jQuery(".wceazy_shipping_bar_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}



function wceazy_shipping_bar_save() {
    jQuery('.wceazy_shipping_bar_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_shipping_bar_bottom_button_section button').prop('disabled', true);
    let jQuerypostData = {

        'enable_shipping_bar': jQuery(".wceazy_shipping_bar_enable_shipping_bar input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'display_desktop': jQuery(".wceazy_shipping_bar_display_desktop input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'display_mobile': jQuery(".wceazy_shipping_bar_display_mobile input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'shipping_zone': jQuery(".wceazy_shipping_bar_shipping_zone select").val(),
        /*'dont_show_pages': jQuery(".wceazy_shipping_bar_dont_show_pages select").val().join(","),
        'exclude_products': jQuery(".wceazy_shipping_bar_exclude_products select").val().join(","),*/

        'show_in_cart': jQuery(".wceazy_shipping_bar_show_in_cart input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'position_cart_subtotal': jQuery(".wceazy_shipping_bar_position_cart_subtotal select").val(),
        'show_in_checkout': jQuery(".wceazy_shipping_bar_show_in_checkout input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'position_checkout_subtotal': jQuery(".wceazy_shipping_bar_position_checkout_subtotal select").val(),
        'cart_checkout_headline': jQuery(".wceazy_shipping_bar_cart_checkout_headline input").val(),
        /*'cart_checkout_progress_bar_bg': jQuery(".wceazy_shipping_bar_cart_checkout_progress_bar_bg input").val(),
        'cart_checkout_progress_color': jQuery(".wceazy_shipping_bar_cart_checkout_progress_color input").val(),
        'cart_checkout_progress_text_color': jQuery(".wceazy_shipping_bar_cart_checkout_progress_text_color input").val(),*/

        /*'zero_order_amount_msg': jQuery(".wceazy_shipping_bar_zero_order_amount_msg textarea").val(),
        'partial_order_amount_msg': jQuery(".wceazy_shipping_bar_partial_order_amount_msg textarea").val(),
        'completed_order_amount_msg': jQuery(".wceazy_shipping_bar_completed_order_amount_msg textarea").val(),*/

        /*'initial_delay': jQuery(".wceazy_shipping_bar_initial_delay input").val(),
        'allow_disappear_time': jQuery(".wceazy_shipping_bar_allow_disappear_time input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'disappear_time': jQuery(".wceazy_shipping_bar_disappear_time input").val(),*/

        'position': jQuery(".wceazy_shipping_bar_position select").val(),
        'layout': jQuery(".wceazy_shipping_bar_layout select").val(),
        /*'bg': jQuery(".wceazy_shipping_bar_bg input").val(),*/
        'padding_top': jQuery(".wceazy_shipping_bar_padding_top input").val(),
        'padding_bottom': jQuery(".wceazy_shipping_bar_padding_bottom input").val(),
        'padding_left_right': jQuery(".wceazy_shipping_bar_padding_left_right input").val(),
        /*'msg_text_color': jQuery(".wceazy_shipping_bar_msg_text_color input").val(),
        'msg_link_text_color': jQuery(".wceazy_shipping_bar_msg_link_text_color input").val(),*/
        'msg_font_size': jQuery(".wceazy_shipping_bar_msg_font_size input").val(),
        'msg_text_align': jQuery(".wceazy_shipping_bar_msg_text_align select").val(),
        'remove_icon': jQuery(".wceazy_shipping_bar_remove_icon .icon_field_item.active").attr("data-value"),
        /*'remove_icon_color': jQuery(".wceazy_shipping_bar_remove_icon_color input").val(),*/
        'remove_icon_size': jQuery(".wceazy_shipping_bar_remove_icon_size input").val(),
        'enable_progress_bar': jQuery(".wceazy_shipping_bar_enable_progress_bar input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'progress_margin_top': jQuery(".wceazy_shipping_bar_progress_margin_top input").val(),
        /*'progress_bar_bg': jQuery(".wceazy_shipping_bar_progress_bar_bg input").val(),
        'progress_color': jQuery(".wceazy_shipping_bar_progress_color input").val(),
        'progress_text_color': jQuery(".wceazy_shipping_bar_progress_text_color input").val(),*/
        'progress_font_size': jQuery(".wceazy_shipping_bar_progress_font_size input").val(),
        'progress_border_radius': jQuery(".wceazy_shipping_bar_progress_border_radius input").val(),



    };



    let jQuerypost_data = {'action': 'wceazy_shipping_bar_save', 'data': jQuerypostData};

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                jQuery('.wceazy_shipping_bar_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_shipping_bar_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery('.wceazy_shipping_bar_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_shipping_bar_bottom_button_section button').prop('disabled', false);
            }
        }
    });
}


